@extends('front.app')

@section('title', $category->title)

@section('content')
<div id="color-lib-page">
    @include('front.nav')
    <div id="colorlib-main">
        <section class="ftco-section">
            <div class="container">
                <div class="row px-md-4">
                    @foreach ($posts as $post)
                    <div class="col-md-12">
                        <div class="blog-entry ftco-animate d-md-flex">
                            <a href="{{ route('single.post', $post->slug) }}" class="img img-2" style="background-image: url({{ asset('storage/posts/'.$post->featured_image) }});"></a>
                            <div class="text text-2 pl-md-4">
                            <h3 class="mb-2"><a href="{{ route('single.post', $post->slug) }}">{{ $post->title }}</a></h3>
                            <div class="meta-wrap">
                                                <p class="meta">
                                    <span><i class="icon-calendar mr-2"></i>{{ date('M d, Y', strtotime($post->created_at)) }}</span>
                                    <span><a href="{{ route('category.posts', $post->categories->slug) }}"><i class="icon-folder-o mr-2"></i>{{ $post->categories->title }}</a></span>
                                    <span><i class="icon-comment2 mr-2"></i>{{ $post->comments->count() }} @if($post->comments->count() <= 1) Comment @else Comments @endif</span>
                                </p>
                            </div>
                            <p class="mb-4">{!! Str::limit($post->featured_text, 150, ('...')) !!}</p>
                            <p><a href="{{ route('single.post', $post->slug) }}" class="btn-custom">Read More <span class="ion-ios-arrow-forward"></span></a></p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div><!-- END COLORLIB-MAIN -->
</div>
@endsection
