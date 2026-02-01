@extends('admin.maindesign')

@section('update_product')

{{-- SUCCESS MESSAGE --}}
@if(session('editProductmessage'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle mr-2"></i>
        {{ session('editProductmessage') }}
        <button type="button" class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
    </div>
@endif

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            <i class="fas fa-plus mr-2"></i> Update Product
        </h6>
    </div>

    <div class="card-body">

        <form action="{{ route('admin.editproduct' , $products->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- PRODUCT TITLE --}}
            <div class="form-group">
                <label>Product Title</label>
                <input type="text"
                       name="product_title"
                       class="form-control"
                       value="{{ $products->product_title }}"
                       required>
            </div>

            {{-- PRODUCT DESCRIPTION --}}
            <div class="form-group">
                <label>Product Description</label>
                <textarea name="product_description"
                          class="form-control"
                          rows="3">{{ $products->product_description }}</textarea>
            </div>

            {{-- PRODUCT QUANTITY --}}
            <div class="form-group">
                <label>Product Quantity</label>
                <input type="number"
                       name="product_quantity"
                       class="form-control"
                       value="{{ $products->product_quantity }}"
                       placeholder="Enter Product Quantity"
                       required>
            </div>

            {{-- PRODUCT SIZE --}}
            <div class="form-group">
                <label>Product Size</label>
                <input type="text"
                       name="product_size"
                       class="form-control"
                       value="{{ $products->product_size }}"
                       placeholder="S, M, L, XL">
            </div>

            {{-- PRODUCT COLOR --}}
            <div class="form-group">
                <label>Product Color</label>
                <input type="text"
                       name="product_color"
                       class="form-control"
                       value="{{ $products->product_color }}"
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
                        <option value="{{ $category->category }}"
                            {{ $products->product_category == $category->category ? 'selected' : '' }}>
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
                    <option value="men" {{ ($products->gender ?? 'men') == 'men' ? 'selected' : '' }}>Men</option>
                    <option value="women" {{ ($products->gender ?? 'men') == 'women' ? 'selected' : '' }}>Women</option>
                </select>
            </div>

            {{-- PRODUCT PRICE --}}
            <div class="form-group">
                <label>Product Price</label>
                <input type="number"
                       step="0.01"
                       value="{{ $products->product_price }}"
                       name="product_price"
                       class="form-control"
                       placeholder="Enter Product Price"
                       required>
            </div>

            {{-- PRODUCT IMAGE --}}
            <div class="form-group">
                <label>Old Image</label>

                <div class="mb-3">
                    <img src="{{ asset('products/'.$products->product_image) }}"
                         class="img-thumbnail"
                         width="120"
                         height="120">
                </div>

                <label>Add New Image</label>
                <input type="file"
                       name="product_image"
                       class="form-control-file">
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
