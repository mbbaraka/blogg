@extends('layouts.app')

@section('title', 'Posts')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            @include('layouts.nav')
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ (request()->routeIs('posts')) ? 'Posts' : '' }}
                    <span class="float-right"><a class="btn btn-sm btn-primary" href="{{ route('posts.create') }}">Add New Post</a></span>
                </div>

                <div class="card-body">

                    <table class="table table-responsive-sm">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Post Title</th>
                                <th>Featured Image</th>
                                <th>Category</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $key => $item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->title }}</td>
                                <td>
                                    <img src="{{ asset('storage/posts/'.$item->featured_image) }}" alt="" class="img-fluid" width="100px" height="70px">
                                </td>
                                <td>{{ $item->categories->title }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a class="btn btn-light" href="{{ route('posts.edit', $item->id) }}"><span class="fa fa-edit">Edit</span></a>
                                        <a href="{{ route('single.post', $item->slug) }}" target="_blank" class="btn btn-light"><span class="fa fa-eye">View</span></a>
                                        <a onclick="confirm('Are you sure you want to delete?')" href = "{{ route('posts.delete', $item->id) }}" class="btn btn-light"><span class="fa fa-trash">Delete</span></a>
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

@endsection
