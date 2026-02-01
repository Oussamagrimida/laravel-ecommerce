<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>GShopper</title>
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

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('front_end/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('front_end/css/style.css')}}" rel="stylesheet">
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
                <a href="" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">G</span>Shopper</h1>
                </a>
            </div>
            <div class="col-lg-6 col-6 text-left">
                <form action="{{ route('allproduct') }}" method="GET">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search for products" value="{{ request('search') }}">
                        <div class="input-group-append">
                            <button type="submit" class="input-group-text bg-transparent text-primary" style="cursor: pointer;">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 col-6 text-right">
                <a href="" class="btn border">
                    <i class="fas fa-heart text-primary"></i>
                    <span class="badge">0</span>
                </a>
                <a href="{{route('cartproducts')}}" class="btn border">
                    <i class="fas fa-shopping-cart text-primary"></i>
                    <span class="badge">{{$count}}</span>
                </a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                 <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 1;">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 285px">
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link" data-toggle="dropdown">Dresses <i class="fa fa-angle-down float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                                <a href="{{ route('allproduct', ['gender' => 'men']) }}" class="dropdown-item">Men's Dresses</a>
                                <a href="{{ route('allproduct', ['gender' => 'women']) }}" class="dropdown-item">Women's Dresses</a>
                            </div>
                        </div>
                        @if(isset($categories) && $categories->count() > 0)
                            @foreach($categories as $category)
                                <a href="{{ route('allproduct', ['category' => $category->category]) }}" class="nav-item nav-link">{{ $category->category }}</a>
                            @endforeach
                        @endif
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="{{route('index')}}" class="nav-item nav-link ">Home</a>
                            <a href="{{route('allproduct')}}" class="nav-item nav-link">Shop</a>
                            <a href="{{route('cartproducts')}}" class="nav-item nav-link">Shopping Cart</a>
                            <a href="" class="nav-item nav-link">Contact</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0">
                            @if(Auth::check())
                            <a href="{{route('dashboard')}}" class="nav-item nav-link">Dashboard</a>
                            @else
                            <a href="{{route('login')}}" class="nav-item nav-link">Login</a>
                            <a href="{{route('register')}}" class="nav-item nav-link">Register</a>
                            @endif
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Shop Detail</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{route('index')}}">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shop Detail</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->
    @if(session('cart_message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle mr-2"></i>
            {{ session('cart_message') }}
            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-circle mr-2"></i>
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
        </div>
    @endif


 <!-- Shop Detail Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">

            <!-- PRODUCT IMAGE -->
            <div class="col-lg-5 pb-5">
                <div class="border">
                    <img 
                        class="img-fluid w-100" 
                        style="height:400px; object-fit:contain;"
                        src="{{ asset('products/'.$product->product_image) }}" 
                        alt="{{ $product->product_title }}"
                    >
                </div>
            </div>

            <!-- PRODUCT INFO -->
            <div class="col-lg-7 pb-5">

                <h3 class="font-weight-semi-bold">
                    {{ $product->product_title }}
                </h3>

                <!-- STARS -->
                <div class="d-flex mb-3">
                    <div class="text-primary mr-2">
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star-half-alt"></small>
                        <small class="far fa-star"></small>
                    </div>
                    <small class="pt-1">(0 Reviews)</small>
                </div>

                <!-- PRICE -->
                <h3 class="font-weight-semi-bold mb-4">
                    ${{ $product->product_price }}
                </h3>

                <!-- DESCRIPTION -->
                <h5 class="mb-3">Description</h5>
                <p>
                    {{ $product->product_description }}
                </p>

                <!-- ADD TO CART FORM -->
                <form action="{{route('add_to_cart' , $product->id)}}" method="POST">
                    @csrf
                    
                    <!-- SIZES -->
                    <div class="d-flex mb-3">
                        <p class="text-dark font-weight-medium mb-0 mr-3">Sizes: <span class="text-danger">*</span></p>
                        @php
                            $sizes = explode(',', $product->product_size);
                        @endphp

                        @foreach($sizes as $i => $size)
                            <div class="custom-control custom-radio custom-control-inline">
                                <input 
                                    type="radio"
                                    class="custom-control-input"
                                    id="size-{{ $i }}"
                                    name="product_size"
                                    value="{{ trim($size) }}"
                                    required
                                >
                                <label class="custom-control-label" for="size-{{ $i }}">
                                    {{ trim($size) }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    @error('product_size')
                        <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror

                    <!-- COLORS -->
                    <div class="d-flex mb-4">
                        <p class="text-dark font-weight-medium mb-0 mr-3">Colors: <span class="text-danger">*</span></p>
                        @php
                            $colors = explode(',', $product->product_color);
                        @endphp

                        @foreach($colors as $i => $color)
                            <div class="custom-control custom-radio custom-control-inline">
                                <input 
                                    type="radio"
                                    class="custom-control-input"
                                    id="color-{{ $i }}"
                                    name="product_color"
                                    value="{{ trim($color) }}"
                                    required
                                >
                                <label class="custom-control-label" for="color-{{ $i }}">
                                    {{ trim($color) }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    @error('product_color')
                        <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror

                    <!-- QUANTITY + CART -->
                    <div class="d-flex align-items-center mb-4 pt-2">
                        <div class="input-group quantity mr-3" style="width: 130px;">
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-minus" type="button">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>

                            <input 
                                type="text"
                                class="form-control bg-secondary text-center"
                                name="quantity"
                                id="quantity"
                                value="1"
                                required
                                min="1"
                                max="{{ $product->product_quantity ?? 0 }}"
                                data-max="{{ $product->product_quantity ?? 0 }}"
                            >

                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-plus" type="button">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        @if($product->product_quantity > 0)
                            <span class="text-muted mr-3">(available)</span>
                            <button type="submit" class="btn btn-primary px-3">
                                <i class="fa fa-shopping-cart mr-1"></i>
                                Add To Cart
                            </button>
                        @else
                            <button type="button" class="btn btn-secondary px-3" disabled>
                                <i class="fa fa-shopping-cart mr-1"></i>
                                Out of Stock
                            </button>
                        @endif
                    </div>
                    @error('quantity')
                        <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror
                </form>

                <!-- SHARE -->
                <div class="d-flex pt-2">
                    <p class="text-dark font-weight-medium mb-0 mr-2">
                        Share on:
                    </p>

                    <div class="d-inline-flex">
                        <a class="text-dark px-2" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="text-dark px-2" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="text-dark px-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a class="text-dark px-2" href="#"><i class="fab fa-pinterest"></i></a>
                    </div>
                </div>

            </div>
        </div>


        <!-- REVIEWS -->
        <div class="row px-xl-5">
            <div class="col">

                <h4 class="mb-4">Reviews</h4>

                <div class="row">

                    <div class="col-md-6">
                        <p>No reviews yet.</p>
                    </div>

                    <div class="col-md-6">
                        <h5 class="mb-3">Leave a review</h5>
                        <small>Your email address will not be published.</small>

                        <form>
                            <div class="form-group mt-3">
                                <label>Your Review *</label>
                                <textarea class="form-control" rows="4"></textarea>
                            </div>

                            <div class="form-group">
                                <label>Your Name *</label>
                                <input type="text" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Your Email *</label>
                                <input type="email" class="form-control">
                            </div>

                            <button class="btn btn-primary px-3">
                                Submit Review
                            </button>
                        </form>
                    </div>

                </div>

            </div>
        </div>

    </div>
<!-- Shop Detail End -->




    <!-- Products Start -->
    <div class="container-fluid py-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">You May Also Like</span></h2>
        </div>

        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">

                    @foreach($products as $product)
                    <div class="card product-item border-0" style="height: 100%;">
                        
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0" style="height: 200px;">
                            <img 
                                class="img-fluid w-100 h-100" style="object-fit: cover;"
                                src="{{ asset('products/'.$product->product_image) }}" 
                                alt="{{ $product->product_title }}"
                            >
                        </div>

                        <div class="card-body border-left border-right text-center p-0 pt-2 pb-2">
                            <h6 class="text-truncate mb-2" style="font-size: 0.9rem;">
                                {{ $product->product_title }}
                            </h6>

                            <div class="d-flex justify-content-center">
                                <h6 style="font-size: 1rem; font-weight: bold;">${{ number_format($product->product_price, 2) }}</h6>
                            </div>
                        </div>

                        <div class="card-footer d-flex justify-content-between bg-light border p-2">
                            <a href="{{ route('product_details', $product->id) }}" class="btn btn-sm text-dark p-0" style="font-size: 0.75rem;">
                                <i class="fas fa-eye text-primary mr-1"></i>
                                View
                            </a>

                            <a href="{{ route('product_details', $product->id) }}" class="btn btn-sm text-dark p-0" style="font-size: 0.75rem;">
                                <i class="fas fa-shopping-cart text-primary mr-1"></i>
                                Cart
                            </a>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->



   <!-- Footer Start -->
    <div class="container-fluid bg-secondary text-dark mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <a href="" class="text-decoration-none">
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
    <script src="{{asset('front_end/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('front_end/lib/owlcarousel/owl.carousel.min.js')}}"></script>

    <!-- Contact Javascript File -->
    <script src="{{asset('front_end/mail/jqBootstrapValidation.min.js')}}"></script>
    <script src="{{asset('front_end/mail/contact.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('front_end/js/main.js')}}"></script>
</body>

</html>