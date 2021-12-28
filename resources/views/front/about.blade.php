@extends('front.app')

@section('title', 'About Me')

@section('content')
<div id="colorlib-page">
    @include('front.nav')
    <div id="colorlib-main">
        <section class="ftco-about img ftco-section ftco-no-pt ftco-no-pb" id="about-section">
        <div class="container-fluid px-0">
            <div class="row d-flex">
                <div class="col-md-6 d-flex">
                    <div class="img d-flex align-self-stretch align-items-center js-fullheight" style="background-image:url({{ asset('mark-pro.jpg') }});">
                    </div>
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <div class="text px-4 pt-5 pt-md-0 px-md-4 pr-md-5 ftco-animate">
                <h2 class="mb-4">I am <span>Baraka Mark Bright</span> a Ugandan Web Developer</h2>
                <p>
                    I love solving complex and interesting problems. I seize every opportunity to increase my knowledge and seek to be a better version of myself everyday.
                     I seize every opportunity to increase my knowledge and become a better programmer. I also love sharing the little skills I know to people.
                </p>
                <h5 class="text-muted text-center">Coding is my favorite hobby.</h5>
                <p>Check my profile here: <a href="https://www.mbbaraka.github.io">https://www.mbbaraka.github.io</a></p>
            </div>
            </div>
        </div>
        </div>
    </section>
    </div><!-- END COLORLIB-MAIN -->
</div><!-- END COLORLIB-PAGE -->
@endsection
