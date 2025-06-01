@extends('admin.layout.default')
@section('content')
    <div class="row page-titles mx-0 mb-3">
        <div class="d-flex justify-content-between align-items-center">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item fs-5 fw-500">
                    <a href="#">Workplace</a>
                </li>
                <li class="breadcrumb-item fs-5 fw-500">
                    <span class="text-dark">Add New</span>
                </li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">

        @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif

        <div class="row">
            <div class="col-12">
                <div class="card border-0">
                    <div class="card-body box-shadow">
                        <form action="{{ route('admin.workplace.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-4">
                                <div class="form-group col-md-12">
                                    <label for="name">Name
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="Name" required value="{{ $workplace->name ?? '' }}">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="title">Description
                                        <span class="text-danger">*</span>
                                    </label>
                                    <textarea class="form-control" name="description" placeholder="Description" id="description" rows="5"
                                        required>{{ $workplace->description ?? '' }}</textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="image">Image
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="file" class="form-control" name="image" id="image">
                                    <img src="{{ @helper::image_path($workplace->image) }}" alt="" class="img-fluid hw-50 rounded mt-2">
                                </div>
                            </div>
                            <div class="text-end">
                                <a href="{{ route('admin.workplace.add') }}" class="btn btn-danger">Cancel</a>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
