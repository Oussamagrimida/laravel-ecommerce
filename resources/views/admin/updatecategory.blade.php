@extends('admin.maindesign')

@section('update_category')

{{-- SUCCESS MESSAGE --}}
@if(session('editmessage'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle mr-2"></i>
        {{ session('editmessage') }}
        <button type="button" class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
    </div>
@endif

<div class="card shadow mb-4">
    
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            <i class="fas fa-plus mr-2"></i> Update Category
        </h6>
    </div>

    <div class="card-body">

        <form action="{{ route('admin.editcategory' , $category->id ) }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="category">Category Name</label>

                <input
                    type="text"
                    id="category"
                    name="category"
                    class="form-control"
                    value="{{$category->category}}"
                    required>
            </div>

            <button type="submit" class="btn btn-success">
                <i class="fas fa-save"></i> Save Category
            </button>

            <a href="{{ route('admin.viewcategory') }}" class="btn btn-secondary ml-2">
                <i class="fas fa-arrow-left"></i> Back
            </a>

        </form>

    </div>

</div>

@endsection
