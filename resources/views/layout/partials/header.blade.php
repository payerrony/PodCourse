<header class="header-style-1"> 
    <div class="header-topbar topbar-style-2">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xl-6 col-lg-6 col-md-12">
                   <div class="header-contact text-center text-lg-start d-none d-sm-block">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <span class="text-color me-2"><i class="fa fa-phone-alt"></i></span><a href="tel:+(354) 6800 37849"> +880 1748449890</a>
                            </li>

                            <li class="list-inline-item">
                                <span class="text-color me-2"><i class="fa fa-envelope"></i></span><a href="malito:hello@edumel.com"> support@podcourse.tech</a>
                            </li>
                        </ul>
                        
                   </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-12">
                   <div class="d-sm-flex justify-content-center justify-content-lg-end">
                        <div class="header-socials text-center text-lg-end">
                            <ul class="list-inline">
                                <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fab fa-youtube"></i></a></li>
                            </ul>
                        </div>

                  
                   </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-12">
                   <div class="d-sm-flex justify-content-center justify-content-lg-end">
                      
                        @if (Route::has('login'))
                <div class="header-category-menu d-none d-xl-block">
                    @auth
                    <ul>
                        <li class="has-submenu">
                            <a><i class="fab fa-grunt fa-2x" style="color:#fff"></i></a>
                            
                            
                            <ul class="submenu">
                                
                                <li><a href="{{route('mycourse')}}">Dashboard</a></li>
                                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                                <li><button class="btn btn-sm btn-outline-secondary" type="submit"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</button></li>
                                </form>

                            </ul>
                        </li>
                    </ul>
                    
                    @else
                        <a href="{{ route('login') }}" >Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" >Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            </div>
            </div>
            </div>
        </div>
    </div>

    <div class="header-navbar navbar-sticky">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between">
                <div class="site-logo">
                    <a href="{{route('welcome')}}">
                        <img src="{{asset('/images/logo.png')}}" alt="" class="img-fluid" />
                    </a>
                </div>

                <div class="offcanvas-icon d-block d-lg-none">
                    <a href="#" class="nav-toggler"><i class="fal fa-bars"></i></a> 
                </div>

                <!--<div class="header-category-menu d-none d-xl-block">
                    <ul>
                        <li class="has-submenu">
                            <a href="#"><i class="fa fa-th me-2"></i>Categories</a>
                            <ul class="submenu">
                                
                                <li><a href="#"></a></li>
                                

                            </ul>
                        </li>
                    </ul>
                </div>-->

                <!--<div class="header-search-bar d-none d-xl-block ms-4">
                    <form action="#">
                        <input type="text" class="form-control" placeholder="Search for Course" >
                        <a href="#" class="search-submit"><i class="far fa-search"></i></a>
                    </form>
                 </div>
-->
        

                 <nav class="site-navbar ms-auto">

                    <ul class="primary-menu">
                        <li class="current">
                            <a href="{{route('welcome')}}">Home</a>
                        </li>
                        <li><a href="{{route('about')}}">About</a></li>

                        <li>
                            <a href="{{route('course')}}">Courses</a>
                        </li>

                        
                        <li>
                            <a href="{{route('contact')}}">Contact</a>
                        </li>
                    </ul>

                    <a href="#" class="nav-close"><i class="fal fa-times"></i></a>
                </nav>
            </div>
        </div>
    </div>
</header>