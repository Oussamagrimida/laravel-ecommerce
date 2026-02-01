<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\ProductCart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Category;

class UserController extends Controller
{
    public function index(){
       if(Auth::check() && Auth::user()->user_type=="user"){
            // User dashboard: show their orders
            $orders = Order::where('user_id', Auth::id())
                ->with('orderItems.product')
                ->orderBy('created_at', 'desc')
                ->paginate(10);
            $count = ProductCart::where('user_id', Auth::id())->count();
            return view('dashboard', compact('orders', 'count'));
        }
        else if (Auth::check() && Auth::user()->user_type=="admin"){
            
            $earnings = Order::sum('total');
            $ordersCount = Order::count();
            $productsCount = Product::count();
            $categoriesCount = Category::count();

            return view('admin.dashboard', compact(
                'earnings',
                'ordersCount',
                'productsCount',
                'categoriesCount'
            ));
        }
    }
    public function home(){
        if(Auth::check()){
            $count = ProductCart::where('user_id' , Auth::id())->count();
        }else{
            $count=0;
        }
        $men = Product::where('gender' , 'men')->count();
        $women = Product::where('gender' , 'women')->count();
        $products=Product::latest()->take(4)->get();
        $categories = Category::all();
        return view('index' , compact('products' , 'count' , 'men' , 'women', 'categories'));
    }
    public function productDetails($id){
        if(Auth::check()){
            $count = ProductCart::where('user_id' , Auth::id())->count();
        }else{
            $count=0;
        }
        $products=Product::all();
        $product=Product::find($id);
        $categories = Category::all();
        return view('product_details' , compact('product' , 'products' , 'count', 'categories'));
    }
    public function allProduct(Request $request){
        if(Auth::check()){
            $count = ProductCart::where('user_id' , Auth::id())->count();
        }else{
            $count=0;
        }

        $query = Product::query();

        // Search functionality
        if($request->has('search') && $request->search != ''){
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('product_title', 'LIKE', "%{$search}%")
                  ->orWhere('product_description', 'LIKE', "%{$search}%")
                  ->orWhere('product_category', 'LIKE', "%{$search}%");
            });
        }

        // Gender filter
        if($request->has('gender') && $request->gender != ''){
            $query->where('gender', $request->gender);
        }

        // Category filter
        if($request->has('category') && $request->category != ''){
            $query->where('product_category', $request->category);
        }

        // Price filter
        if($request->has('min_price') && $request->min_price != ''){
            $query->where('product_price', '>=', $request->min_price);
        }
        if($request->has('max_price') && $request->max_price != ''){
            $query->where('product_price', '<=', $request->max_price);
        }

        // Color filter
        if($request->has('color') && $request->color != ''){
            $query->where('product_color', 'LIKE', "%{$request->color}%");
        }

        // Size filter
        if($request->has('size') && $request->size != ''){
            $query->where('product_size', 'LIKE', "%{$request->size}%");
        }

        // Sort functionality
        $sortBy = $request->get('sort_by', 'latest');
        switch($sortBy){
            case 'price_low':
                $query->orderBy('product_price', 'asc');
                break;
            case 'price_high':
                $query->orderBy('product_price', 'desc');
                break;
            case 'name_asc':
                $query->orderBy('product_title', 'asc');
                break;
            case 'name_desc':
                $query->orderBy('product_title', 'desc');
                break;
            case 'latest':
            default:
                $query->latest();
                break;
        }

        $products = $query->paginate(6)->appends($request->query());
        
        // Get unique values for filters
        $categories = Product::distinct()->pluck('product_category')->filter();
        $colors = Product::select('product_color')
            ->whereNotNull('product_color')
            ->where('product_color', '!=', '')
            ->get()
            ->pluck('product_color')
            ->map(function($color) {
                return explode(',', $color);
            })
            ->flatten()
            ->map(function($color) {
                return trim($color);
            })
            ->filter()
            ->unique()
            ->values();
        
        $sizes = Product::select('product_size')
            ->whereNotNull('product_size')
            ->where('product_size', '!=', '')
            ->get()
            ->pluck('product_size')
            ->map(function($size) {
                return explode(',', $size);
            })
            ->flatten()
            ->map(function($size) {
                return trim($size);
            })
            ->filter()
            ->unique()
            ->values();

        return view('allproduct' , compact('products' , 'count', 'categories', 'colors', 'sizes'));
    }
    public function addToCart(Request $request, $id){
        $request->validate([
            'product_size' => 'required',
            'product_color' => 'required',
            'quantity' => 'required|integer|min:1'
        ]);

        $product = Product::find($id);
        
        // Check if product exists
        if(!$product) {
            return redirect()->back()->with('error', 'Product not found');
        }

        // Check available quantity
        $availableQuantity = $product->product_quantity ?? 0;
        $requestedQuantity = $request->quantity;

        if($availableQuantity <= 0) {
            return redirect()->back()->with('error', 'This product is out of stock');
        }

        if($requestedQuantity > $availableQuantity) {
            return redirect()->back()->with('error', "Only {$availableQuantity} items available in stock. You requested {$requestedQuantity}.");
        }
        
        $product_cart = new ProductCart();
        $product_cart->user_id = Auth::id();
        $product_cart->product_id = $id;
        $product_cart->quantity = $requestedQuantity;
        $product_cart->color = $request->product_color;
        $product_cart->size = $request->product_size;

        $product_cart->save();
        return redirect()->back()->with('cart_message', 'Product added to cart successfully');
    }
    public function cartProducts(){
        if(Auth::check()){
            $count = ProductCart::where('user_id' , Auth::id())->count();
            $cart = ProductCart::where('user_id' , Auth::id())->with('product')->get();
        }else{
            $count = 0;
            $cart = collect();
        }
        $categories = Category::all();
        return view('viewcartproducts' , compact('count' , 'cart', 'categories'));
    }
    public function removeCartProduct($id){
        $cartitem = ProductCart::find($id);
        $cartitem->delete();
        return redirect()->back();
    }
    public function checkout(){
        if(Auth::check()){
            $count = ProductCart::where('user_id' , Auth::id())->count();
            $cart = ProductCart::where('user_id' , Auth::id())->with('product')->with('user')->get();
        }else{
            $count = 0;
            $cart = collect();
        }
        $categories = Category::all();
        return view('viewcheckout' , compact('count' , 'cart', 'categories'));
    }
    public function confirmOrder(Request $request){
        // Validate the request
        $request->validate([
            'email' => 'required|email',
            'mobile_no' => 'required|string',
            'address_line1' => 'required|string',
            'address_line2' => 'nullable|string',
            'country' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'zip_code' => 'nullable|string',
            'payment_method' => 'required|string'
        ]);

        // Get cart items for the authenticated user
        $cart = ProductCart::where('user_id', Auth::id())->with('product')->get();
        

        // Calculate totals
        $subtotal = 0;
        foreach($cart as $cartItem) {
            $subtotal += $cartItem->product->product_price * $cartItem->quantity;
        }
        $shipping = $subtotal > 0 ? 10.00 : 0.00;
        $total = $subtotal + $shipping;

        // Create the order
        $order = new Order();
        $order->user_id = Auth::id();
        $order->email = $request->email;
        $order->mobile_no = $request->mobile_no;
        $order->address_line1 = $request->address_line1;
        $order->address_line2 = $request->address_line2;
        $order->country = $request->country;
        $order->city = $request->city;
        $order->state = $request->state;
        $order->zip_code = $request->zip_code;
        $order->payment_method = $request->payment_method;
        $order->subtotal = $subtotal;
        $order->shipping = $shipping;
        $order->total = $total;
        $order->save();

        // Create order items for each cart item and decrease product quantity
        foreach($cart as $cartItem) {
            // Create order item
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $cartItem->product_id;
            $orderItem->quantity = $cartItem->quantity;
            $orderItem->color = $cartItem->color;
            $orderItem->size = $cartItem->size;
            $orderItem->price = $cartItem->product->product_price;
            $orderItem->save();

            // Decrease product quantity by the ordered quantity
            $product = Product::find($cartItem->product_id);
            if($product) {
                $newQuantity = ($product->product_quantity ?? 0) - $cartItem->quantity;
                $product->product_quantity = max(0, $newQuantity);
                $product->save();

            }
        }

        // Delete cart items after order is created
        ProductCart::where('user_id', Auth::id())->delete();

        return redirect()->back()->with('success', 'Order placed successfully!');
    }
}

