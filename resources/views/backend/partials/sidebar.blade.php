
<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <a href="{{ route('dashboard') }}">
                <img src="{{ asset('backend/assets/images/logo.png') }}" class="logo-icon" alt="logo icon">
            </a>
        </div>
        <div>
{{--            <h4 class="logo-text">SyS Admin</h4>--}}
        </div>
        <div class="toggle-icon ms-auto"><i class='fas fa-bars'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='fas fa-home'></i>
                </div>
                <div class="menu-title">Master</div>
            </a>
            <ul>
                <li>
                    <a href="#">
                        <div class="sub_parent_icon">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                        <span class="sub_menu_title">User</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('slider') }}">
                        <div class="sub_parent_icon">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                        <span class="sub_menu_title">Slider</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('contact') }}">
                        <div class="sub_parent_icon">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                        <span class="sub_menu_title">Contact Us</span>
                    </a>
                </li>
            </ul>
        </li>
        @if(auth()->user()->id == 1)
        <li>
            <a href="#">
                <div class="parent-icon">
                    <i class='fas fa-user'></i>
                </div>
                <div class="menu-title">User</div>
            </a>
        </li>
        @endif
        <li>
            <a href="{{route('category')}}">
                <div class="parent-icon">
                    <i class='fas fa-home'></i>
                </div>
                <div class="menu-title">Category</div>
            </a>
        </li>
        <li>
            <a href="{{route('slider')}}">
                <div class="parent-icon">
                    <i class='fas fa-home'></i>
                </div>
                <div class="menu-title">Slider</div>
            </a>
        </li>
        <li>
            <a href="{{route('about_us_list')}}">
                <div class="parent-icon">
                    <i class='fas fa-home'></i>
                </div>
                <div class="menu-title">About Us</div>
            </a>
        </li>
        <li>
            <a href="{{route('our_team_list')}}">
                <div class="parent-icon">
                    <i class='fas fa-home'></i>
                </div>
                <div class="menu-title">Our Team</div>
            </a>
        </li>
        <li>
            <a href="#">
                <div class="parent-icon">
                    <i class='fas fa-home'></i>
                </div>
                <div class="menu-title">Service</div>
            </a>
        </li>
        <li>
            <a href="#">
                <div class="parent-icon">
                    <i class='fas fa-home'></i>
                </div>
                <div class="menu-title">Project</div>
            </a>
        </li>
        <li>
            <a href="#">
                <div class="parent-icon">
                    <i class='fas fa-home'></i>
                </div>
                <div class="menu-title">Product</div>
            </a>
        </li>
        <li>
            <a href="#">
                <div class="parent-icon">
                    <i class='fas fa-home'></i>
                </div>
                <div class="menu-title">Gallery</div>
            </a>
        </li>
        <li>
            <a href="#">
                <div class="parent-icon">
                    <i class='fas fa-home'></i>
                </div>
                <div class="menu-title">Review</div>
            </a>
        </li>
        <li>
            <a href="#">
                <div class="parent-icon">
                    <i class='fas fa-home'></i>
                </div>
                <div class="menu-title">Contact</div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='fas fa-trash'></i>
                </div>
                <div class="menu-title">Trash</div>
            </a>
            <ul>
                <li>
                        <a href="#">
                        <div class="sub_parent_icon">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                        <span class="sub_menu_title">User</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="sub_parent_icon">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                        <span class="sub_menu_title">Category</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="sub_parent_icon">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                        <span class="sub_menu_title">Slider</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="sub_parent_icon">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                        <span class="sub_menu_title">Projects</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="sub_parent_icon">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                        <span class="sub_menu_title">Product</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="sub_parent_icon">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                        <span class="sub_menu_title">Our Team</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
    <!--end navigation-->
</div>
