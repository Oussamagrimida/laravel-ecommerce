@extends('admin.maindesign')

@section('view_product')

{{-- UPDATED MESSAGE --}}
@if(session('editProductmessage'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle mr-2"></i>
        {{ session('editProductmessage') }}
        <button type="button" class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
    </div>
@endif
{{-- DELETE MESSAGE --}}
@if(session('deleteProductmessage'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle mr-2"></i>
        {{ session('deleteProductmessage') }}
        <button type="button" class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
    </div>
@endif

<div class="card shadow mb-4">

    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">
            <i class="fas fa-list mr-2"></i> Products
        </h6>
        <!-- Search -->
        <form 
            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 mw-100 navbar-search"
            action="{{route('admin.searchproduct')}}"
            method="post">
            @csrf
            <div class="input-group">
                <input type="text" name="search" class="form-control bg-light border-0 small" placeholder="Search for...">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-dark">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
        <a href="{{ route('admin.addproduct') }}" class="btn btn-sm btn-primary">
            <i class="fas fa-plus"></i> Add Product
        </a>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover text-center" id="dataTable" width="100%">
                <thead class="thead-dark">
                    <tr>
                        <th>Product Title</th>
                        <th>Product Description</th>
                        <th>Product Quantity</th>
                        <th>Product Size</th>
                        <th>Product Price</th>
                        <th>Product Image</th>
                        <th>Product Category</th>
                        <th width="120">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td class="font-weight-bold">{{ $product->product_title }}</td>
                        <td class="font-weight-bold">{{Str::limit($product->product_description,20)}}</td>
                        <td class="font-weight-bold">{{ $product->product_quantity }}</td>
                        <td class="font-weight-bold">{{ $product->product_size }}</td>
                        <td class="font-weight-bold">{{ $product->product_price }}</td>
                        <td class="font-weight-bold">
                            <img src="{{asset('products/'.$product->product_image)}}" style="width: 250px; height: 250px;" alt="">
                        </td>
                        <td class="font-weight-bold">{{ $product->product_category }}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center">
                            
                                <a href="{{ route('admin.deleteproduct', $product->id) }}"
                                class="btn btn-sm btn-danger mr-2"
                                onclick="return confirm('Delete this product?')">
                                    <i class="fas fa-trash-alt"></i> Delete
                                </a>
                                <a href="{{ route('admin.updateproduct', $product->id) }}"
                                class="btn btn-sm btn-primary">
                                    <i class="fas fa-edit"></i> Update
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

                {{ $products->links() }}
            </table>
        </div>
    </div>

</div>

@endsection
