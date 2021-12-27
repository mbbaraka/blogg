@extends('front.app')

@section('title', 'Home')

@section('content')
<div id="colorlib-page">
    @include('front.nav')
    <div id="colorlib-main">
        <section class="ftco-section ftco-no-pt ftco-no-pb">
        <div class="container">
            <div class="row d-flex">
                <div class="col-lg-8 px-md-5 py-5">
                    <div class="row pt-md-4">
                        <h1 class="mb-3">{{ $post->title }}</h1>
                        <img src="{{ asset('storage/posts/'.$post->featured_image) }}" alt="" class="img-fluid">
                        <div class="meta-wrap pt-2">
                            <p class="meta">
                                <span><i class="icon-calendar mr-2"></i>{{ date('M d, Y', strtotime($post->created_at)) }}</span>
                                <span><a href="single.html"><i class="icon-folder-o mr-2"></i>{{ $post->categories->title }}</a></span>
                                <span><i class="icon-comment2 mr-2"></i>5 Comment</span>
                            </p>
                        </div>
                        <hr>
                        <p>
                            {!! $post->description !!}
                        </p>
                        <div class="tag-widget post-tag-container mb-5 mt-5">
                        <div class="tagcloud">
                            <a href="#" class="tag-cloud-link">Life</a>
                            <a href="#" class="tag-cloud-link">Sport</a>
                            <a href="#" class="tag-cloud-link">Tech</a>
                            <a href="#" class="tag-cloud-link">Travel</a>
                        </div>
                        </div>

                        <div class="about-author d-flex p-4 bg-light">
                        <div class="bio mr-5">
                            <img src="{{ asset('front/images/person_1.jpg') }}" alt="Image placeholder" class="img-fluid mb-4">
                        </div>
                        <div class="desc">
                            <h3>{{ $post->user->name }}</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
                        </div>
                        </div>


                        <div class="pt-5 mt-5">
                        <h3 class="mb-5 font-weight-bold">{{ $comments->count() }} @if($comments->count() <= 1) Comment @else Comments @endif</h3>
                        <ul class="comment-list">
                            @foreach ($comments as $comment)
                            <li class="comment">
                                <div class="vcard bio">
                                    <img src="{{ asset('front/images/person_1.jpg') }}" alt="Image placeholder">
                                </div>
                                <div class="comment-body">
                                    <h3>{{ $comment->author->name }}</h3>
                                    <div class="meta" style="text-transform: capitalize">{{ date('M d, Y', strtotime($comment->created_at)). ' at '. date('h:i:s A', strtotime($comment->created_at)) }}</div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                    @auth
                                        <p><a data-toggle="collapse" href="#content{{ $comment->id }}" aria-expanded="false" aria-controls="contentId" class="reply">Reply</a></p>

                                        <div class="collapse" id="content{{ $comment->id }}">
                                            <div class="comment-form-wrap">
                                                <h3 class="mb-1">Leave a reply</h3>
                                                <form action="{{ route('reply.store', $comment->id) }}" class="p-1 p-md-2 bg-light" method="POST">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="message">Message</label>
                                                        <textarea name="reply" id="message" cols="30" rows="5" class="form-control"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="submit" value="Post Reply" class="btn btn-primary">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    @endauth
                                </div>
                                @if ($comment->replies->count() >= 1)

                                <ul class="children ml-5">
                                    <h5 class="mb-2 font-weight-bold">{{ $comment->replies->count() }} @if($comment->replies->count() <= 1) Reply @else Replies @endif</h5>
                                    @foreach ($comment->replies as $reply)
                                    <li class="comment">
                                        <div class="vcard bio">
                                            <img src="{{ asset('front/images/person_1.jpg') }}" alt="Image placeholder">
                                        </div>
                                        <div class="comment-body">
                                            <h3>{{ $reply->user->name }}</h3>
                                            <div class="meta">{{ date('M d, Y', strtotime($reply->created_at)). ' at '. date('h:i:s A', strtotime($reply->created_at)) }}</div>
                                            <p>
                                                {!! $reply->reply !!}
                                            </p>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                        <!-- END comment-list -->

                        @auth
                        <div class="comment-form-wrap pt-5">
                            <h3 class="mb-5">Leave a comment</h3>
                            <form action="{{ route('comment.store', $post->slug) }}" class="p-3 p-md-5 bg-light" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea name="comment" id="message" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
                                </div>

                            </form>
                        </div>
                        @else
                            @include('front.auth.auth')
                        @endauth
                        </div>
                    </div><!-- END-->
                </div>
                @include('front.sidebar')
            </div>
        </div>
    </section>
    </div><!-- END COLORLIB-MAIN -->
</div><!-- END COLORLIB-PAGE -->
@endsection
