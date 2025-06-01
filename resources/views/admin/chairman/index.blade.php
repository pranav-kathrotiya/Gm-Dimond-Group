@extends('admin.layout.default')
@section('content')
    <div class="row page-titles mx-0 mb-3">
        <div class="d-flex justify-content-between align-items-center">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item fs-5 fw-500">
                    <a href="{{ route('admin.chairman.index') }}">Chairman</a>
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
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($chairmansdata as $key => $value)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->description }}</td>
                                            <td><img src="{{ helper::image_path($value->image) }}"
                                                    class="img-fluid hw-50 rounded" alt="">
                                            </td>
                                            <td>
                                                @if ($value->is_available == 1)
                                                    <button class="btn btn-sm btn-success rounded-4" tooltip="Active"
                                                        onclick="StatusUpdate('{{ $value->id }}','2','{{ route('admin.chairman.status') }}')">
                                                        <i class="fa-sharp fa-solid fa-check"></i>
                                                    </button>
                                                @else
                                                    <button class="btn btn-sm btn-danger rounded-4" tooltip="Inactive"
                                                        onclick="StatusUpdate('{{ $value->id }}','1','{{ route('admin.chairman.status') }}')">
                                                        <i class="fa-sharp fa-solid fa-xmark"></i>
                                                    </button>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.chairman.edit', $value->id) }}" tooltip="Edit"
                                                    class="btn btn-sm btn-info rounded-4">
                                                    <i class="fa-solid fa-pen-to-square text-white"></i></a>
                                                <button class="btn btn-sm btn-danger rounded-4" tooltip="Delete"
                                                    onclick="Delete('{{ $value->id }}','{{ route('admin.chairman.delete') }}')">
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
