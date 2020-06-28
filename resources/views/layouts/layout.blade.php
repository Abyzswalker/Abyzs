<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Megazine Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />

    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content=""/>
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />

    @include('layouts.style')
</head>

	<body>
@section('sidebar')
    <div id="colorlib-page">
        <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
        <aside id="colorlib-aside" role="complementary" class="js-fullheight">
            @guest
            <a type="button" class="btn btn-outline-dark-sm" href="{{ route ('home') }}">Log In</a>
            <a type="button" class="btn btn-outline-dark-sm" href="{{ route('register') }}">Register</a>
            @else
               <a type="button" class="btn btn-outline-dark-sm"> {{ Auth::user()->name }} </a>
               <a type="button" class="btn btn-outline-dark-sm" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
               </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                </form>
           @endguest
            <h1 id="colorlib-logo"><a href="/">Megazine</a></h1>
            <nav id="colorlib-main-menu" role="navigation">
                <ul>
                    <li class="{{ (request()->is('/')) ? 'colorlib-active' : '' }}"><a href="{{ route ('/') }}">Home</a></li>

                    <li class="{{ (request()->is('style')) ? 'colorlib-active' : '' }}"><a href="{{ route('style.index') }}">Style</a></li>

                    <li class="{{ (request()->is('fashion*')) ? 'colorlib-active' : '' }}"><a href="{{ route('fashion') }}">Fashion</a></li>

                    <li class="{{ (request()->is('travel*')) ? 'colorlib-active' : '' }}"><a href="{{ route ('travel.index') }}">Travel</a></li>

                    <li class="{{ (request()->is('sports*')) ? 'colorlib-active' : '' }}"><a href="{{ route('sports') }}">Sports</a></li>

                    <li class="{{ (request()->is('video*')) ? 'colorlib-active' : '' }}"><a href="{{ route('video') }}">Video</a></li>

                    <li class="{{ (request()->is('archives*')) ? 'colorlib-active' : '' }}"><a href="{{ route('archives') }}">Archives</a></li>
                </ul>
            </nav>


            <div class="colorlib-footer">
                <p><small>&copy; <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --> </span> <span>Demo Images: <a href="https://unsplash.com/" target="_blank">Unsplash.com</a> &amp; <a href="https://www.pexels.com/" target="_blank">Pexels.com</a></span></small></p>
                <ul>
                    <li><a href="#"><i class="icon-facebook2"></i></a></li>
                    <li><a href="#"><i class="icon-twitter2"></i></a></li>
                    <li><a href="#"><i class="icon-instagram"></i></a></li>
                    <li><a href="#"><i class="icon-linkedin2"></i></a></li>
                </ul>
            </div>
        </aside>
    </div>
@show

@yield('content')

@include('layouts.scripts')

    </body>
</html>

