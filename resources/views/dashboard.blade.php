<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>GShopper - Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{ asset('front_end/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('front_end/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-2 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark" href="">FAQs</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Help</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Support</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-dark pl-2" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="{{ route('index') }}" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">G</span>Shopper</h1>
                </a>
            </div>
            <div class="col-lg-6 col-6 text-left">
            </div>
            <div class="col-lg-3 col-6 text-right">
                <a href="" class="btn border">
                    <i class="fas fa-heart text-primary"></i>
                    <span class="badge">0</span>
                </a>
                <a href="{{ route('cartproducts') }}" class="btn border">
                    <i class="fas fa-shopping-cart text-primary"></i>
                    <span class="badge">{{ $count ?? 0 }}</span>
                </a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <div class="container-fluid mb-5">
        <div class="row border-top px-xl-5">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="{{ route('index') }}" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">G</span>Shopper</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="{{ route('index') }}" class="nav-item nav-link">Home</a>
                            <a href="{{ route('allproduct') }}" class="nav-item nav-link">Shop</a>
                            <a href="{{ route('cartproducts') }}" class="nav-item nav-link">Shopping Cart</a>
                            <a href="" class="nav-item nav-link">Contact</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0">
                            <a href="{{ route('dashboard') }}" class="nav-item nav-link active">
                                <i class="fas fa-user mr-1"></i>Dashboard
                            </a>
                            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                @csrf
                                <button type="submit" class="nav-item nav-link btn btn-link" style="border: none; background: none; padding: 0.5rem 1rem;">
                                    <i class="fas fa-sign-out-alt mr-1"></i>Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->

    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 200px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">My Dashboard</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{ route('index') }}">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Dashboard</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Dashboard Content Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold text-primary">
                            <i class="fas fa-shopping-bag mr-2"></i> My Orders
                        </h6>
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fas fa-check-circle mr-2"></i>
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        @if($orders->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover text-center">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Products</th>
                                            <th>Shipping Address</th>
                                            <th>Payment Method</th>
                                            <th>Total Amount</th>
                                            <th>Order Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders as $order)
                                        <tr>
                                            <td class="font-weight-bold align-middle">#{{ $order->id }}</td>
                                            <td class="text-left align-middle" style="font-size: 0.9rem;">
                                                @foreach($order->orderItems as $item)
                                                    <div class="mb-3 pb-3 border-bottom" style="border-color: #e3e6f0 !important;">
                                                        <div class="d-flex align-items-center mb-2">
                                                            @if($item->product && $item->product->product_image)
                                                            <img src="{{ asset('products/'.$item->product->product_image) }}" 
                                                                 alt="{{ $item->product->product_title ?? 'Product' }}" 
                                                                 style="width: 60px; height: 60px; object-fit: cover; border-radius: 4px; margin-right: 10px;">
                                                            @else
                                                            <div style="width: 60px; height: 60px; background: #e3e6f0; border-radius: 4px; margin-right: 10px; display: flex; align-items: center; justify-content: center;">
                                                                <i class="fas fa-image text-muted"></i>
                                                            </div>
                                                            @endif
                                                            <div class="flex-grow-1">
                                                                <div class="font-weight-bold mb-1">{{ $item->product->product_title ?? 'N/A' }}</div>
                                                                <div class="text-muted small">
                                                                    <span class="mr-2"><strong>Qty:</strong> {{ $item->quantity }}</span>
                                                                    @if($item->color)
                                                                    <span class="mr-2"><strong>Color:</strong> {{ $item->color }}</span>
                                                                    @endif
                                                                    @if($item->size)
                                                                    <span class="mr-2"><strong>Size:</strong> {{ $item->size }}</span>
                                                                    @endif
                                                                    <span class="text-primary"><strong>Price:</strong> ${{ number_format($item->price, 2) }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </td>
                                            <td class="text-left align-middle" style="font-size: 0.9rem;">
                                                <div class="mb-1"><strong>Email:</strong> {{ $order->email }}</div>
                                                <div class="mb-1"><strong>Mobile:</strong> {{ $order->mobile_no }}</div>
                                                <div class="mb-1"><strong>Address:</strong> {{ $order->address_line1 }}</div>
                                                @if($order->address_line2)
                                                <div class="mb-1">{{ $order->address_line2 }}</div>
                                                @endif
                                                <div class="mb-1"><strong>City:</strong> {{ $order->city }}, {{ $order->state }}</div>
                                                @if($order->zip_code)
                                                <div class="mb-1"><strong>ZIP:</strong> {{ $order->zip_code }}</div>
                                                @endif
                                                @if($order->country)
                                                <div><strong>Country:</strong> {{ $order->country }}</div>
                                                @endif
                                            </td>
                                            <td class="font-weight-bold align-middle">{{ $order->payment_method }}</td>
                                            <td class="font-weight-bold align-middle">
                                                <div>Subtotal: ${{ number_format($order->subtotal, 2) }}</div>
                                                <div>Shipping: ${{ number_format($order->shipping, 2) }}</div>
                                                <div class="text-primary"><strong>Total: ${{ number_format($order->total, 2) }}</strong></div>
                                            </td>
                                            <td class="font-weight-bold align-middle">{{ $order->created_at->format('M d, Y') }}</td>
                                            <td class="align-middle">
                                                @php
                                                    $status = $order->status ?? 'pending';
                                                    $badgeClass = $status == 'completed' ? 'success' : ($status == 'cancelled' ? 'danger' : 'warning');
                                                @endphp
                                                <span class="badge badge-{{ $badgeClass }}">{{ ucfirst($status) }}</span>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-3">
                                {{ $orders->links() }}
                            </div>
                        @else
                            <div class="text-center py-5">
                                <i class="fas fa-shopping-bag fa-3x text-muted mb-3"></i>
                                <h5 class="text-muted">No orders found</h5>
                                <p class="text-muted">You haven't placed any orders yet.</p>
                                <a href="{{ route('allproduct') }}" class="btn btn-primary mt-3">
                                    <i class="fas fa-shopping-cart mr-2"></i>Start Shopping
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Dashboard Content End -->

    <!-- Footer Start -->
    <div class="container-fluid bg-secondary text-dark mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <a href="{{ route('index') }}" class="text-decoration-none">
                    <h1 class="mb-4 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border border-white px-3 mr-1">G</span>Shopper</h1>
                </a>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i> Rejiche , Mahdia , TN</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>oussamagrimida1970@gmail.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+216 99753130</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-12 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Newsletter</h5>
                        <form action="">
                            <div class="form-group">
                                <input type="text" class="form-control border-0 py-4" placeholder="Your Name" required="required" />
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control border-0 py-4" placeholder="Your Email"
                                    required="required" />
                            </div>
                            <div>
                                <button class="btn btn-primary btn-block border-0 py-3" type="submit">Subscribe Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top border-light mx-xl-5 py-4">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-dark">
                    &copy; <a class="text-dark font-weight-semi-bold" href="#">G Shopper</a>
                </p>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('front_end/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('front_end/js/main.js') }}"></script>
</body>

</html>
