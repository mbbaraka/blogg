@extends('front.app')

@section('title', $title)

@section('content')
<div id="colorlib-page">
    @include('front.nav')
    <div id="colorlib-main">
        <section class="ftco-section ftco-no-pt ftco-no-pb">
        <div class="container">
            <div class="row d-flex">
                <div class="col-xl-8 py-5 px-md-5">
                    <div class="row pt-md-4">
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
                    </div><!-- END-->
                    <div class="row">
                        <div class="col">
                            <div class="block-27">
                            <ul>

                                @if ($posts->links())
                                    @if ($posts->onFirstPage())
                                    <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                                        <span aria-hidden="true">&lt;</span>
                                    </li>
                                    @else
                                        <li>
                                            <a href="{{ $posts->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lt;</a>
                                        </li>
                                    @endif
                                    @for ($i = 1; $i <= 3; $i++)
                                        @if ($i == $posts->currentPage())
                                            <li class="active" aria-current="page"><span>{{ $i }}</span></li>
                                        @else
                                            <li><a href="{{ $posts->url($i) }}">{{ $i }}</a></li>
                                        @endif
                                        {{--  <li><a class="@if($posts->currentPage() == $i) active @endif" href="{{ $posts->url($i) }}">{{ $i }}</a></li>  --}}
                                    @endfor

                                    @if ($posts->hasMorePages())
                                        <li>
                                            <a href="{{ $posts->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&gt;</a>
                                        </li>
                                    @else
                                        <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                                            <span aria-hidden="true">&gt;</span>
                                        </li>
                                    @endif
                                @endif
                            </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @include('front.sidebar')
            </div>
        </div>
    </section>
    </div><!-- END COLORLIB-MAIN -->
</div><!-- END COLORLIB-PAGE -->
@endsection
