@extends('admin.layout.default')
@section('content')
    <div class="row page-titles mx-0 mb-3">
        <div class="d-flex justify-content-between align-items-center">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item fs-5 fw-500">
                    <a href="{{ route('admin.core_values.index') }}">Core Values</a>
                </li>
            </ol>
            {{-- <a href="{{ request()->url() . '/add' }}" class="btn btn-primary">Add New</a> --}}
        </div>
    </div>
    <div class="container-fluid">
        @if (Session::has('cor_success'))
            <div class="alert alert-success">
                {{ Session::get('cor_success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card border-0">
                    <div class="card-body box-shadow">
                        <form action="{{ route('admin.core_values.core_description_store') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-4">
                                <div class="form-group col-md-12">
                                    <label for="description">Description
                                        <span class="text-danger">*</span>
                                    </label>
                                    <textarea class="form-control" name="core_value_description" id="core_value_description"
                                        placeholder="Description" rows="5"
                                        required>{{ $core_description->core_value_description ?? ''}}</textarea>
                                </div>
                            </div>
                            <div class="text-end">
                                <a href="{{ route('admin.core_values.index') }}" class="btn btn-danger">Cancel</a>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row page-titles mx-0 mb-3 mt-5">
        <div class="d-flex justify-content-between align-items-center">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item fs-5 fw-500">
                    {{-- <a href="{{ route('admin.core_values.index') }}">Core Values</a> --}}
                </li>
            </ol>
            <a href="{{ request()->url() . '/add' }}" class="btn btn-primary">Add New</a>
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
                        <div class="table-responsive" id="table-display">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>Sr no</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($core_valuesdata as $key => $value)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $value->title }}</td>
                                            <td>{{ $value->description }}</td>
                                            <td><img src="{{ helper::image_path($value->image) }}"
                                                    class="img-fluid hw-50 rounded" alt="">
                                            </td>
                                            <td>
                                                @if ($value->is_available == 1)
                                                    <button class="btn btn-sm btn-success rounded-4" tooltip="Active"
                                                        onclick="StatusUpdate('{{ $value->id }}','2','{{ route('admin.core_values.status') }}')">
                                                        <i class="fa-sharp fa-solid fa-check"></i>
                                                    </button>
                                                @else
                                                    <button class="btn btn-sm btn-danger rounded-4" tooltip="Inactive"
                                                        onclick="StatusUpdate('{{ $value->id }}','1','{{ route('admin.core_values.status') }}')">
                                                        <i class="fa-sharp fa-solid fa-xmark"></i>
                                                    </button>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.core_values.edit', $value->id) }}" tooltip="Edit"
                                                    class="btn btn-sm btn-info rounded-4">
                                                    <i class="fa-solid fa-pen-to-square text-white"></i></a>
                                                <button class="btn btn-sm btn-danger rounded-4" tooltip="Delete"
                                                    onclick="Delete('{{ $value->id }}','{{ route('admin.core_values.delete') }}')">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
