@extends('layouts.app')

@section('title', 'Categories')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            @include('layouts.nav')
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ (request()->routeIs('categories')) ? 'Categories' : '' }}
                    <span class="float-right"><button data-target="#modal" data-toggle="modal" class="btn btn-sm btn-success">Add New</button></span>
                </div>

                <div class="card-body">

                    <table class="table table-responsive-sm">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Category Name</th>
                                <th>No. of Posts</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $key => $item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->posts }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-light"><span class="fa fa-edit">Edit</span></button>
                                        <button type="button" class="btn btn-light"><span class="fa fa-eye">View</span></button>
                                        <button type="button" class="btn btn-light"><span class="fa fa-trash">Delete</span></button>
                                    </div>
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
{{--  modal  --}}
<div id="modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Add New Category</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Category Title <sup class="text-danger">*</sup></label>
                        <input id="title" required class="form-control @error('title') is-invalid @enderror" type="text" name="title" value="{{ old('title') }}">
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image">Featured Image <sup class="text-danger">*</sup></label>
                        <input id="image" required class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}" type="file" name="image">
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
