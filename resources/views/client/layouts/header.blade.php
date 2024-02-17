<!-- Top header start -->
<header class="top-header top-header-3 hidden-xs" id="top">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-7 col-xs-12">
                <div class="list-inline">
                    <a href="tel:1-8X0-666-8X88"><i class="fa fa-phone"></i>Need Support? 1-8X0-666-8X88</a>
                    <a href="tel:info@themevessel.com"><i class="fa fa-envelope"></i>info@themevessel.com</a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-5 col-xs-12">
                <ul class="social-list clearfix pull-right">
                    @if (!Auth::guard('web')->check())
                        <li>
                            <a href="{{ route('login') }}">
                                Login
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}">
                                Register
                            </a>
                        </li>
                    @else
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown">
                                <i class="fa fa-user"></i>
                                {{ Auth::guard('web')->user()->first_name . ' ' . Auth::guard('web')->user()->last_name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-user">
                                <li>
                                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                </li>
                            </ul>
                        </li>
                        <form action="{{ route('logout') }}" id="logout-form" method="post">
                            @csrf
                        </form>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</header>
<!-- Top header end -->

<!-- Main header start -->
<header class="main-header main-header-4">
    <div class="container">
        <nav class="navbar navbar-default">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navigation" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="{{ route('home.index') }}" class="logo">
                    <img src="{{ asset('client/img/logos/logo.png') }}" alt="logo">
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="navbar-collapse collapse" role="navigation" aria-expanded="true" id="app-navigation">
                <ul class="nav navbar-nav">
                    <li class="dropdown active">
                        <a tabindex="0" data-toggle="dropdown" data-submenu="" aria-expanded="false">
                            Menu 1<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Submenu 1</a></li>
                            <li><a href="#">Submenu 2</a></li>
                            <li><a href="#">Submenu 3</a></li>
                            <li><a href="#">Submenu 4</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a tabindex="0" data-toggle="dropdown" data-submenu="" aria-expanded="false">
                            Menu 2<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Submenu 1</a></li>
                            <li><a href="#">Submenu 2</a></li>
                            <li><a href="#">Submenu 3</a></li>
                            <li><a href="#">Submenu 4</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a tabindex="0" data-toggle="dropdown" data-submenu="" aria-expanded="false">
                            Menu 3<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Submenu 1</a></li>
                            <li><a href="#">Submenu 2</a></li>
                            <li><a href="#">Submenu 3</a></li>
                            <li><a href="#">Submenu 4</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a tabindex="0" data-toggle="dropdown" data-submenu="" aria-expanded="false">
                            Menu 4<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Submenu 1</a></li>
                            <li><a href="#">Submenu 2</a></li>
                            <li><a href="#">Submenu 3</a></li>
                            <li><a href="#">Submenu 4</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

            <!-- /.navbar-collapse -->
            <!-- /.container -->
        </nav>
    </div>
</header>
<!-- Main header end -->
