@extends('admin.layout.default')
@section('content')
    <div class="row page-titles mx-0 mb-3">
        <div class="d-flex justify-content-between align-items-center">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item fs-5 fw-500">
                    <a href="{{ route('admin.testimonials.index') }}">Testimonial</a>
                </li>
                <li class="breadcrumb-item fs-5 fw-500">
                    <span class="text-dark">Update</span>
                </li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card border-0">
                    <div class="card-body box-shadow">
                        <form action="{{ route('admin.testimonials.update', $testimonials->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-4">
                                <div class="form-group col-md-6">
                                    <label for="name">Name
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ $testimonials->name }}" placeholder="Name" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="designation">Designation
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="designation" id="designation" value="{{ $testimonials->designation }}" placeholder="Designation" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="description">Description
                                        <span class="text-danger">*</span>
                                    </label>
                                    <textarea class="form-control" name="description" id="description" placeholder="Description" rows="5"
                                        required>{{ $testimonials->description }}</textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="image">Image
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="file" class="form-control" name="image" id="image">
                                    <img src="{{ @helper::image_path($testimonials->image) }}" alt=""
                                        class="img-fluid hw-50 rounded mt-2">
                                </div>
                            </div>
                            <div class="text-end">
                                <a href="{{ route('admin.testimonials.index') }}" class="btn btn-danger">Cancel</a>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
