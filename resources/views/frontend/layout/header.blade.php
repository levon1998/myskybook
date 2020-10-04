<div class="site-header header-2 mb--20 d-none d-lg-block">
    <div class="header-middle pt--10 pb--10">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <a href="index.html" class="site-brand">
                        <img src="{{ asset('/frontend/image/logo.png') }}" alt="">
                    </a>
                </div>
                <div class="col-lg-9">
                    <div class="header-search-block">
                        <input type="text" placeholder="Search your dream book">
                        <button>Search</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom bg-primary">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <nav class="category-nav white-nav  ">
                        <div>
                            <a href="javascript:void(0)" class="category-trigger"><i
                                        class="fa fa-bars"></i>Browse
                                categories</a>
                            <ul class="category-menu">
                                <li class="cat-item">
                                    <a href="#">Arts & Photography</a>
                                </li>
                                <li class="cat-item">
                                    <a href="#">Biographies</a>
                                </li>
                                <li class="cat-item">
                                    <a href="#">Business & Money</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header-phone color-white">
                        <div class="icon">
                            <i class="fas fa-headphones-alt"></i>
                        </div>
                        <div class="text">
                            <p class="m-2">Free Support 24/7</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="main-navigation flex-lg-right">
                        <ul class="main-menu menu-right main-menu--white li-last-0">
                            <li class="menu-item">
                                <a href="javascript:void(0)">
                                    <i class="fas fa-book"></i> Books
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="javascript:void(0)">
                                    About
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="javascript:void(0)">
                                    Contact
                                </a>
                            </li>
                            @if (Auth::check())
                                <li class="menu-item has-children">
                                    <a href="#">My Account <i class="fas fa-angle-down"></i></a>
                                    <ul class="sub-menu">
                                        <li><a href="#">My Account</a></li>
                                        <li><a href="#">Order History</a></li>
                                        <li>
                                            <a href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="site-mobile-menu">
    <header class="mobile-header d-block d-lg-none pt--10 pb-md--10">
        <div class="container">
            <div class="row align-items-sm-end align-items-center">
                <div class="col-md-4 col-7">
                    <a href="index.html" class="site-brand">
                        <img src="{{ asset('/frontend/image/logo.png') }}" alt="">
                    </a>
                </div>
                <div class="col-md-5 order-3 order-md-2">
                    <nav class="category-nav   ">
                        <div>
                            <a href="javascript:void(0)" class="category-trigger"><i
                                        class="fa fa-bars"></i>Browse
                                categories</a>
                            <ul class="category-menu">
                                <li class="cat-item">
                                    <a href="#">Arts & Photography</a>
                                </li>
                                <li class="cat-item">
                                    <a href="#">Biographies</a>
                                </li>
                                <li class="cat-item">
                                    <a href="#">Business & Money</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="col-md-3 col-5  order-md-3 text-right">
                    <div class="mobile-header-btns header-top-widget">
                        <ul class="header-links">
                            <li class="sin-link">
                                <a href="cart.html" class="cart-link link-icon"><i class="ion-bag"></i></a>
                            </li>
                            <li class="sin-link">
                                <a href="javascript:" class="link-icon hamburgur-icon off-canvas-btn"><i
                                            class="ion-navicon"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--Off Canvas Navigation Start-->
    <aside class="off-canvas-wrapper">
        <div class="btn-close-off-canvas">
            <i class="ion-android-close"></i>
        </div>
        <div class="off-canvas-inner">
            <!-- search box start -->
            <div class="search-box offcanvas">
                <form>
                    <input type="text" placeholder="Search Here">
                    <button class="search-btn"><i class="ion-ios-search-strong"></i></button>
                </form>
            </div>
            <div class="mobile-navigation">
                <!-- mobile menu navigation start -->
                <nav class="off-canvas-nav">
                    <ul class="mobile-menu main-mobile-menu">
                        <li class="menu-item">
                            <a href="javascript:void(0)">
                                Books
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="javascript:void(0)">
                                About
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="javascript:void(0)">
                                Contact
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <nav class="off-canvas-nav">
                <ul class="mobile-menu menu-block-2">
                    <li class="menu-item-has-children">
                        <a href="#">My Account <i class="fas fa-angle-down"></i></a>
                        <ul class="sub-menu">
                            <li><a href="">My Account</a></li>
                            <li><a href="">Order History</a></li>
                            <li><a href="">Transactions</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <div class="off-canvas-bottom">
                <div class="contact-list mb--10">
                    <a href="" class="sin-contact"><i class="fas fa-envelope"></i>examle@handart.com</a>
                </div>
                <div class="off-canvas-social">
                    <a href="#" class="single-icon"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="single-icon"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="single-icon"><i class="fas fa-rss"></i></a>
                    <a href="#" class="single-icon"><i class="fab fa-youtube"></i></a>
                    <a href="#" class="single-icon"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="single-icon"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </aside>
</div>
<div class="sticky-init fixed-header common-sticky">
    <div class="container d-none d-lg-block">
        <div class="row align-items-center">
            <div class="col-lg-4">
                <a href="index.html" class="site-brand">
                    <img src="{{ asset('/frontend/image/logo.png') }}" alt="">
                </a>
            </div>
            <div class="col-lg-8">
                <div class="main-navigation flex-lg-right">
                    <ul class="main-menu menu-right ">
                        <li class="menu-item">
                            <a href="javascript:void(0)">
                                <i class="fas fa-book"></i> Books
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="javascript:void(0)">
                                About
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="javascript:void(0)">
                                Contact
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>