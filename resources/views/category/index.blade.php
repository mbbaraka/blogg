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
                                <td>{{ $item->posts->count() }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a class="btn btn-light" href="#edit{{ $item->id }}" data-toggle="modal"><span class="fa fa-edit">Edit</span></a>
                                        <a href="{{ route('category.posts', $item->slug) }}" target="_blank" class="btn btn-light"><span class="fa fa-eye">View</span></a>
                                        <a onclick="confirm('Are you sure you want to delete?')" href = "{{ route('category.delete', $item->id) }}" class="btn btn-light"><span class="fa fa-trash">Delete</span></a>
                                    </div>

                                    <div id="edit{{ $item->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="my-modal-title">Edit Category</h5>
                                                    <button class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('category.update', $item->id) }}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="title">Category Title <sup class="text-danger">*</sup></label>
                                                            <input id="title" required class="form-control @error('title') is-invalid @enderror" type="text" name="title" value="{{ $item->title }}">
                                                            @error('title')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="image">Featured Image <sup class="text-danger">*</sup></label><br>
                                                            <img src="{{ asset('storage/categories/'.$item->image) }}" class="img-fluid mb-2" alt="" width="100px" height="70px">
                                                            <br><small>To change an image please upload from the field below</small>
                                                            <input id="image" class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}" type="file" name="image">
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
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $categories->links() }}

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
