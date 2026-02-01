@extends('admin.maindesign')

@section('add_product')

{{-- SUCCESS MESSAGE --}}
@if(session('product_message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle mr-2"></i>
        {{ session('product_message') }}
        <button type="button" class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
    </div>
@endif

<div class="card shadow mb-4">
    
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            <i class="fas fa-plus mr-2"></i> Add New Product
        </h6>
    </div>

    <div class="card-body">

        <form action="{{ route('admin.postaddproduct') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- PRODUCT TITLE --}}
            <div class="form-group">
                <label>Product Title</label>
                <input type="text"
                       name="product_title"
                       class="form-control"
                       placeholder="Enter Product Title"
                       required>
            </div>

            {{-- PRODUCT DESCRIPTION --}}
            <div class="form-group">
                <label>Product Description</label>
                <textarea name="product_description"
                          class="form-control"
                          rows="3"
                          placeholder="Enter Product Description"></textarea>
            </div>

            {{-- PRODUCT QUANTITY --}}
            <div class="form-group">
                <label>Product Quantity</label>
                <input type="number"
                       name="product_quantity"
                       class="form-control"
                       placeholder="Enter Product Quantity"
                       required>
            </div>

            {{-- PRODUCT SIZE --}}
            <div class="form-group">
                <label>Product Size</label>
                <input type="text"
                       name="product_size"
                       class="form-control"
                       placeholder="S, M, L, XL">
            </div>

            {{-- PRODUCT COLOR --}}
            <div class="form-group">
                <label>Product Color</label>
                <input type="text"
                       name="product_color"
                       class="form-control"
                       placeholder="Red, Blue, Black...">
            </div>

            {{-- PRODUCT CATEGORY --}}
            <div class="form-group">
                <label>Category</label>
                <select name="product_category"
                        class="form-control"
                        required>
                    <option value="">-- Select Category --</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->category }}">
                                {{ $category->category }}
                            </option>
                        @endforeach
                </select>
            </div>

            {{-- PRODUCT GENDER --}}
            <div class="form-group">
                <label>Gender</label>
                <select name="product_gender"
                        class="form-control"
                        required>
                    <option value="men" selected>Men</option>
                    <option value="women">Women</option>
                </select>
            </div>

            {{-- PRODUCT PRICE --}}
            <div class="form-group">
                <label>Product Price</label>
                <input type="number"
                       step="0.01"
                       name="product_price"
                       class="form-control"
                       placeholder="Enter Product Price"
                       required>
            </div>

            {{-- PRODUCT IMAGE --}}
            <div class="form-group">
                <label>Product Image</label>
                <input type="file"
                       name="product_image"
                       class="form-control-file"
                       required>
            </div>

            {{-- ACTION BUTTONS --}}
            <button type="submit"
                    class="btn btn-success">
                <i class="fas fa-save"></i> Save Product
            </button>

            <a href="{{ route('admin.viewproduct') }}"
               class="btn btn-secondary ml-2">
                <i class="fas fa-arrow-left"></i> View Products
            </a>

        </form>

    </div>

</div>

@endsection
