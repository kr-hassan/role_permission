
<header>
    <div class="info">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="column">Working Hours Monday - Friday <span class="id-color"><strong>08:00-16:00</strong></span></div>
                    <div class="column">Toll Free <span class="id-color"><strong>1800.899.900</strong></span></div>
                    <!-- social icons -->
                    <div class="column social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-rss"></i></a>
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                        <a href="#"><i class="fa fa-envelope-o"></i></a>
                    </div>
                    <!-- social icons close -->
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- logo begin -->
                <div id="logo">
                    <a href="{{route('home')}}">
                        <img class="logo" src="{{ asset('frontend/images/logo.png') }}" alt="">
                    </a>
                </div>
                <!-- logo close -->

                <!-- small button begin -->
                <span id="menu-btn"></span>
                <!-- small button close -->

                <!-- mainmenu begin -->
                <nav>
                    <ul id="mainmenu">
                        <li>
                            <a href="{{route('home')}}">Home<span></span></a>
                        </li>
                        <li>
                            <a href="{{route('about_us')}}">About Us<span></span></a>
                        </li>
                        <li>
                            <a href="{{ route('project') }}">Projects</a>
                            <ul>
                                <li>
                                    <a href="{{ route('ongoing_project') }}">Ongoing</a>
                                </li>
                                <li>
                                    <a href="{{ route('completed_project') }}">Completed</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('service') }}">Services</a>
                        </li>
                        <li>
                            <a href="{{ route('product') }}">Shop</a>
                        </li>
                        <li>
                            <a href="{{ route('gallery') }}">Gallery</a>
                        </li>
                        <li>
                            <a href="{{ route('contact') }}">Contact</a>
                        </li>
                    </ul>
                </nav>
                <!-- mainmenu close -->
            </div>
        </div>
    </div>
</header>
