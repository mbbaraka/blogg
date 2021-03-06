<div class="col-xl-4 sidebar ftco-animate bg-light pt-5">
    <div class="sidebar-box pt-md-4">
    <form action="#" class="search-form">
        <div class="form-group">
        <span class="icon icon-search"></span>
        <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
        </div>
    </form>
    </div>
    <div class="sidebar-box ftco-animate">
        <h3 class="sidebar-heading">Categories</h3>
    <ul class="categories">
        @php
            $categories = App\Models\Category::get();
        @endphp
        @foreach ($categories as $item)
        <li><a href="{{ route('category.posts', $item->slug) }}">{{ $item->title }} <span>({{ $item->posts->count() }})</span></a></li>
        @endforeach
    </ul>
    </div>

    <div class="sidebar-box ftco-animate">
    <h3 class="sidebar-heading">Popular Articles</h3>
        @foreach ($popular as $item)
        <div class="block-21 mb-4 d-flex">
            <a class="blog-img mr-4" style="background-image: url({{ asset('storage/posts/'.$item->post->featured_image) }});"></a>
            <div class="text">
            <h3 class="heading"><a href="{{ route('single.post', $item->post->slug) }}">{{ $item->post->title }}</a></h3>
            <div class="meta">
                <div><a href="#"><span class="icon-calendar"></span> {{ date('M d, Y', strtotime($item->post->created_at)) }}</a></div>
                <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                <div><a href="#"><span class="icon-chat"></span> {{ $item->post->comments->count() }}</a></div>
            </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="sidebar-box subs-wrap img py-4" style="background-image: url(images/bg_1.jpg);">
        <div class="overlay"></div>
        <h3 class="mb-4 sidebar-heading">Newsletter</h3>
        <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia</p>
        <form action="#" class="subscribe-form">
            <div class="form-group">
            <input type="text" class="form-control" placeholder="Email Address">
            <input type="submit" value="Subscribe" class="mt-2 btn btn-white submit">
            </div>
        </form>
    </div>

    <div class="sidebar-box ftco-animate">
        <h3 class="sidebar-heading">Archives</h3>
    <ul class="categories">
        <li><a href="#">Decob14 2018 <span>(10)</span></a></li>
        <li><a href="#">September 2018 <span>(6)</span></a></li>
        <li><a href="#">August 2018 <span>(8)</span></a></li>
        <li><a href="#">July 2018 <span>(2)</span></a></li>
        <li><a href="#">June 2018 <span>(7)</span></a></li>
        <li><a href="#">May 2018 <span>(5)</span></a></li>
    </ul>
    </div>


    <div class="sidebar-box ftco-animate">
    <h3 class="sidebar-heading">Paragraph</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut.</p>
    </div>
</div><!-- END COL -->
