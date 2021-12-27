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
                    {{ (request()->routeIs('posts.create')) ? 'Add New Post' : '' }}
                    <span class="float-right"><a class="btn btn-sm btn-primary" href="{{ route('posts') }}">Back to Posts</a></span>
                </div>

                <div class="card-body">
                    <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Post Title <sup class="text-danger">*</sup></label>
                            <input id="title" required class="form-control @error('title') is-invalid @enderror" type="text" name="title" value="{{ old('title') }}">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category">Select Category <sup class="text-danger">*</sup></label>
                            <select name="category" id="category" class="form-control">
                                <option value="">Select Category</option>
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}" style="text-transform: capitalize">{{ $item->title }}</option>
                                @endforeach
                            </select>
                            @error('category')
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
                        <div class="form-group">
                            <label for="featured_text">Featured Text <sup class="text-danger">*</sup></label>
                            <textarea class="form-control @error('featured_text') is-invalid @enderror" name="featured_text" id="featured_text">{{ old('featured_text') }}
                            </textarea>
                            @error('featured_text')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description <sup class="text-danger">*</sup></label>
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description">{{ old('description') }}
                            </textarea>
                            @error('description')
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
</div>

@endsection
