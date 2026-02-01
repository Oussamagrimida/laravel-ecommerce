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
                        @php
                            $allCategories = \App\Models\Category::all();
                        @endphp
                        @if($allCategories->count() > 0)
                            @foreach($allCategories as $category)
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
                            <a href="{{route('allproduct')}}" class="nav-item nav-link active">Shop</a>
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
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Our Shop</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{route('index')}}">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shop</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Shop Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-12">
                <form action="{{ route('allproduct') }}" method="GET" id="filterForm">
                    <!-- Gender Filter -->
                    <div class="border-bottom mb-4 pb-4">
                        <h5 class="font-weight-semi-bold mb-4">Filter by Gender</h5>
                        <div class="custom-control custom-radio mb-3">
                            <input type="radio" class="custom-control-input" id="gender-all" name="gender" value="" {{ !request('gender') ? 'checked' : '' }} onchange="document.getElementById('filterForm').submit();">
                            <label class="custom-control-label" for="gender-all">All</label>
                        </div>
                        <div class="custom-control custom-radio mb-3">
                            <input type="radio" class="custom-control-input" id="gender-men" name="gender" value="men" {{ request('gender') == 'men' ? 'checked' : '' }} onchange="document.getElementById('filterForm').submit();">
                            <label class="custom-control-label" for="gender-men">Men</label>
                        </div>
                        <div class="custom-control custom-radio mb-3">
                            <input type="radio" class="custom-control-input" id="gender-women" name="gender" value="women" {{ request('gender') == 'women' ? 'checked' : '' }} onchange="document.getElementById('filterForm').submit();">
                            <label class="custom-control-label" for="gender-women">Women</label>
                        </div>
                    </div>

                    <!-- Category Filter -->
                    @if(isset($categories) && $categories->count() > 0)
                    <div class="border-bottom mb-4 pb-4">
                        <h5 class="font-weight-semi-bold mb-4">Filter by Category</h5>
                        <select name="category" class="form-control" onchange="document.getElementById('filterForm').submit();">
                            <option value="">All Categories</option>
                            @foreach($categories as $category)
                                <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>{{ $category }}</option>
                            @endforeach
                        </select>
                    </div>
                    @endif

                    <!-- Price Filter -->
                    <div class="border-bottom mb-4 pb-4">
                        <h5 class="font-weight-semi-bold mb-4">Filter by Price</h5>
                        <div class="form-group">
                            <label>Min Price</label>
                            <input type="number" name="min_price" class="form-control" value="{{ request('min_price') }}" placeholder="0" step="0.01">
                        </div>
                        <div class="form-group">
                            <label>Max Price</label>
                            <input type="number" name="max_price" class="form-control" value="{{ request('max_price') }}" placeholder="1000" step="0.01">
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Apply</button>
                    </div>
                    
                    <!-- Color Filter -->
                    @if(isset($colors) && $colors->count() > 0)
                    <div class="border-bottom mb-4 pb-4">
                        <h5 class="font-weight-semi-bold mb-4">Filter by Color</h5>
                        <select name="color" class="form-control" onchange="document.getElementById('filterForm').submit();">
                            <option value="">All Colors</option>
                            @foreach($colors as $color)
                                <option value="{{ $color }}" {{ request('color') == $color ? 'selected' : '' }}>{{ ucfirst($color) }}</option>
                            @endforeach
                        </select>
                    </div>
                    @endif

                    <!-- Size Filter -->
                    @if(isset($sizes) && $sizes->count() > 0)
                    <div class="mb-5">
                        <h5 class="font-weight-semi-bold mb-4">Filter by Size</h5>
                        <select name="size" class="form-control" onchange="document.getElementById('filterForm').submit();">
                            <option value="">All Sizes</option>
                            @foreach($sizes as $size)
                                <option value="{{ $size }}" {{ request('size') == $size ? 'selected' : '' }}>{{ $size }}</option>
                            @endforeach
                        </select>
                    </div>
                    @endif

                    <!-- Preserve search and sort -->
                    @if(request('search'))
                        <input type="hidden" name="search" value="{{ request('search') }}">
                    @endif
                    @if(request('sort_by'))
                        <input type="hidden" name="sort_by" value="{{ request('sort_by') }}">
                    @endif

                    <button type="submit" class="btn btn-primary btn-block mb-3">Apply Filters</button>
                    <a href="{{ route('allproduct') }}" class="btn btn-secondary btn-block">Clear Filters</a>
                </form>
            </div>
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-12">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <form action="{{ route('allproduct') }}" method="GET" class="d-flex" style="width: 100%;">
                                <div class="input-group" style="max-width: 400px;">
                                    <input type="text" name="search" class="form-control" placeholder="Search by name" value="{{ request('search') }}">
                                    <div class="input-group-append">
                                        <button type="submit" class="input-group-text bg-transparent text-primary" style="cursor: pointer;">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- Preserve filter values -->
                                @if(request('gender'))
                                    <input type="hidden" name="gender" value="{{ request('gender') }}">
                                @endif
                                @if(request('category'))
                                    <input type="hidden" name="category" value="{{ request('category') }}">
                                @endif
                                @if(request('min_price'))
                                    <input type="hidden" name="min_price" value="{{ request('min_price') }}">
                                @endif
                                @if(request('max_price'))
                                    <input type="hidden" name="max_price" value="{{ request('max_price') }}">
                                @endif
                                @if(request('color'))
                                    <input type="hidden" name="color" value="{{ request('color') }}">
                                @endif
                                @if(request('size'))
                                    <input type="hidden" name="size" value="{{ request('size') }}">
                                @endif
                                @if(request('sort_by'))
                                    <input type="hidden" name="sort_by" value="{{ request('sort_by') }}">
                                @endif
                            </form>
                            <div class="dropdown ml-4">
                                <button class="btn border dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                    Sort by: {{ request('sort_by') == 'price_low' ? 'Price: Low to High' : (request('sort_by') == 'price_high' ? 'Price: High to Low' : (request('sort_by') == 'name_asc' ? 'Name: A-Z' : (request('sort_by') == 'name_desc' ? 'Name: Z-A' : 'Latest'))) }}
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                                    @php
                                        $currentUrl = request()->fullUrl();
                                        $sortUrl = function($sort) use ($currentUrl) {
                                            $url = parse_url($currentUrl);
                                            parse_str($url['query'] ?? '', $params);
                                            $params['sort_by'] = $sort;
                                            return $url['path'] . '?' . http_build_query($params);
                                        };
                                    @endphp
                                    <a class="dropdown-item" href="{{ $sortUrl('latest') }}">Latest</a>
                                    <a class="dropdown-item" href="{{ $sortUrl('price_low') }}">Price: Low to High</a>
                                    <a class="dropdown-item" href="{{ $sortUrl('price_high') }}">Price: High to Low</a>
                                    <a class="dropdown-item" href="{{ $sortUrl('name_asc') }}">Name: A-Z</a>
                                    <a class="dropdown-item" href="{{ $sortUrl('name_desc') }}">Name: Z-A</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    @foreach($products as $product)
                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-3" style="height: 100%;">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0" style="height: 200px;">
                                <img class="img-fluid w-100 h-100" style="object-fit: cover;"
                                     src="{{asset('products/'.$product->product_image)}}" 
                                     alt="{{$product->product_title}}">
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-2 pb-2">
                                <h6 class="text-truncate mb-2" style="font-size: 0.9rem;">{{$product->product_title}}</h6>
                                <div class="d-flex justify-content-center">
                                    <h6 style="font-size: 1rem; font-weight: bold;">${{number_format($product->product_price, 2)}}</h6>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border p-2">
                                <a href="{{route('product_details' , $product->id)}}" class="btn btn-sm text-dark p-0" style="font-size: 0.75rem;"><i class="fas fa-eye text-primary mr-1"></i>View</a>
                                <a href="{{route('product_details' , $product->id)}}" class="btn btn-sm text-dark p-0" style="font-size: 0.75rem;"><i class="fas fa-shopping-cart text-primary mr-1"></i>Cart</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @if($products->count() == 0)
                    <div class="col-12">
                        <div class="alert alert-info text-center">
                            <h5>No products found</h5>
                            <p>Try adjusting your filters or search terms.</p>
                        </div>
                    </div>
                    @endif
                    <div class="col-12 pb-1">
                        @if($products->hasPages())
                        <nav aria-label="Page navigation">
                          {{ $products->links() }}
                        </nav>
                        @endif
                    </div>
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->
  
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