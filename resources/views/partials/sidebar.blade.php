<aside class="main-sidebar sidebar-dark-info elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
        <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">SIMEC ERP</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @foreach($menus as $menu)
                    <li class="nav-item">
                        <a href="javascript:void(0)" class="nav-link active"
                           @if($menu->url != '#')
                           onclick="document.getElementById('workplace').src='{{route($menu->url)}}';"
                            @endif
                        >
                            <i class="nav-icon fas fa-circle"></i>
                            <p>
                                {{ $menu->title ?? '' }}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        @if($menu->childs->count()>0)

                            <ul class="nav nav-treeview">
                                @foreach($menu->childs as $subMenu)
                                    <li class="nav-item">
                                        <a href="javascript:void(0);" class="nav-link active"
                                           onclick="document.getElementById('workplace').src='{{route($subMenu->url)}}';">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>{{$subMenu->title}}</p>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>

        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
