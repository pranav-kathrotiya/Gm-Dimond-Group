@extends('admin.layout.default')
@section('content')
    <div class="row page-titles mx-0 mb-3">
        <div class="d-flex justify-content-between align-items-center">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item fs-5 fw-500">
                    <a href="{{ route('admin.chairman.index') }}">Chairman</a>
                </li>
                <li class="breadcrumb-item fs-5 fw-500">
                    <span class="text-dark">Add New</span>
                </li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card border-0">
                    <div class="card-body box-shadow">
                        <form action="{{ route('admin.chairman.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-4">
                                <div class="form-group col-md-12">
                                    <label for="Name">Name
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="Name" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="title">Description
                                        <span class="text-danger">*</span>
                                    </label>
                                    <textarea class="form-control" name="description" placeholder="Description" id="description" rows="5"
                                        required></textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="image">Image
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="file" class="form-control" name="image[]" id="image" required>
                                </div>
                            </div>
                            <div class="text-end">
                                <a href="{{ route('admin.chairman.index') }}" class="btn btn-danger">Cancel</a>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
