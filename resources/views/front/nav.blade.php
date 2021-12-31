<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
    <aside id="colorlib-aside" role="complementary" class="js-fullheight">
        <nav id="colorlib-main-menu" role="navigation">
            <ul>
                <li class="{{ (request()->routeIs('home')) ? 'colorlib-active' : '' }}"><a href="{{ url('/') }}">Home</a></li>
                <li class="{{ (request()->routeIs('about')) ? 'colorlib-active' : '' }}"><a href="{{ route('about') }}">About</a></li>
                <li class="{{ (request()->routeIs('contact')) ? 'colorlib-active' : '' }}"><a href="{{ route('contact') }}">Contact</a></li>
                @auth
                <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                     {{ __('Logout') }}
                 </a>
                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                </li>
                @else
                <li><a href="#login" data-toggle="modal">Login</a></li>
                <li><a href="#register" data-toggle="modal">Register</a></li>
                @endauth
            </ul>
        </nav>

        <div class="colorlib-footer">
            <h1 id="colorlib-logo" class="mb-4"><a href="index.html" style="background-image: url(images/bg_1.jpg);">Andrea <span>Moore</span></a></h1>
            <div class="mb-4">
                <h3>Subscribe for newsletter</h3>
                <form action="#" class="colorlib-subscribe-form">
            <div class="form-group d-flex">
            <div class="icon"><span class="icon-paper-plane"></span></div>
            <input type="text" class="form-control" placeholder="Enter Email Address">
            </div>
            </form>
            </div>
            <p class="pfooter"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> Downloaded from <a href="https://themeslab.org/" target="_blank">Themeslab</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
        </div>
    </aside> <!-- END COLORLIB-ASIDE -->
    @include('front.auth.auth')
