<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;

class AdminController extends Controller
{
    public function addCategory(){
        return view('admin.addcategory');
    }
    public function postAddCategory(Request $request){
        $category=new Category();
        $category->category=$request->category;
        $category->save();
        return redirect()->back()->with('message' , 'Category added successfully');
    }

    public function viewCategory(){
        $categories=Category::all();
        return view('admin.viewcategory' , compact('categories'));
    }

    public function deleteCategory($id){
        $category = Category::findOrfail($id);

        $category->delete();

        return redirect()->back()->with('deleteCategorymessage' , 'Category deleted successfully');

    }
    public function updateCategory($id){
        $category = Category::findOrfail($id);
        return view('admin.updatecategory' , compact('category'));

    }
    public function editCategory(Request $request , $id){
        $category = Category::findOrfail($id);
        $category->category=$request->category;
        $category->save();
        return redirect()->back()->with('editmessage' , 'Category updated successfully');
    }
    public function addProduct(){
        $categories = Category::all();
        return view('admin.addproduct' , compact('categories'));
    }
    public function postAddProduct(Request $request){
        $product = new Product();

        $product->product_title=$request->product_title;
        $product->product_description=$request->product_description;
        $product->product_quantity=$request->product_quantity;
        $product->product_size=$request->product_size;
        $product->product_color=$request->product_color;
        $product->product_price=$request->product_price;
        $product->gender=$request->product_gender ?? 'men';

        $image = $request->product_image;
        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();

            $product->product_image=$imagename;
        }
        
        $product->product_category=$request->product_category;
        $product->save();

        if($image && $product->save()){
            $request->product_image->move('products',$imagename);
        }

        return redirect()->back()->with('product_message' , 'Product added successfully');
    }
    
     public function viewProduct(){
        $products = Product::paginate(2);
        return view('admin.viewproduct' , compact('products'));
    }

    public function deleteProduct($id){

        $product = Product::findOrfail($id);
        $image_path = 'products/'.$product->product_image;
        if(file_exists($image_path)){
            unlink($image_path);
        }
        $product->delete();

        return redirect()->back()->with('deleteProductmessage' , 'Product deleted successfully');

    }
    public function updateProduct($id){
        $products = Product::findOrfail($id);
        $categories = Category::all();
        return view('admin.updateproduct' , compact('products' , 'categories'));
    }
    public function editProduct(Request $request , $id){
        $product = Product::findOrfail($id);

        $product->product_title=$request->product_title;
        $product->product_description=$request->product_description;
        $product->product_quantity=$request->product_quantity;
        $product->product_size=$request->product_size;
        $product->product_color=$request->product_color;
        $product->product_price=$request->product_price;
        $product->gender=$request->product_gender ?? 'men';

        $image = $request->product_image;
        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $image_path = 'products/'.$product->product_image;
            if(file_exists($image_path)){
                unlink($image_path);
            }
            $product->product_image=$imagename;
        }
        
        $product->product_category=$request->product_category;
        $product->save();

        if($image && $product->save()){
            $request->product_image->move('products',$imagename);
        }

        return redirect()->route('admin.viewproduct')
         ->with('editProductmessage', 'Product updated successfully');
    }
    public function searchProduct(Request $request){
        $searchText = $request->search;
        $products = Product::where('product_title' , 'LIKE' , "%$searchText%")
                            ->orwhere('product_category' , 'LIKE' , "%$searchText%")
                            ->orwhere('product_description' , 'LIKE' , "%$searchText%")                  
                            ->paginate(2);
        return view('admin.viewproduct' , compact('products'));
    }
    public function viewOrder(){
        $orders = Order::with('user', 'orderItems.product')->paginate(10);
        return view('admin.vieworder', compact('orders'));
    }
}   
