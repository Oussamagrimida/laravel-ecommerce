@extends('admin.maindesign')

@section('view_category')

{{-- SUCCESS MESSAGE --}}
@if(session('deleteCategorymessage'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle mr-2"></i>
        {{ session('deleteCategorymessage') }}
        <button type="button" class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
    </div>
@endif


<div class="card shadow mb-4">

    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">
            <i class="fas fa-list mr-2"></i> Categories
        </h6>

        <a href="{{ route('admin.addcategory') }}" class="btn btn-sm btn-primary">
            <i class="fas fa-plus"></i> Add Category
        </a>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover text-center" id="dataTable" width="100%">
                <thead class="thead-dark">
                    <tr>
                        <th>Category ID</th>
                        <th>Category Name</th>
                        <th width="120">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td class="font-weight-bold">{{ $category->category }}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center">
                            
                                <a href="{{ route('admin.deletecategory', $category->id) }}"
                                class="btn btn-sm btn-danger mr-2"
                                onclick="return confirm('Delete this category?')">
                                    <i class="fas fa-trash-alt"></i> Delete
                                </a>
                                <a href="{{route('admin.updatecategory', $category->id)}}"
                                class="btn btn-sm btn-primary">
                                    <i class="fas fa-edit"></i> Update
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection
