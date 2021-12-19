<nav class="main-header navbar navbar-expand navbar-white navbar-light navbar-fixed">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="javascript:void(0)" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('home') }}" class="nav-link">Home</a>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> 4 new messages
                    <span class="float-right text-muted text-sm">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> 8 friend requests
                    <span class="float-right text-muted text-sm">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> 3 new reports
                    <span class="float-right text-muted text-sm">2 days</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item dropdown"
            style=" width:auto; min-width: 180px; margin:1px; padding:2px; height:40px; background-color:#CCCCCC; border-radius:20px; box-shadow:1px 1px 2px #333;">
            <a class="nav-link" data-toggle="dropdown" href="javascript:void(0)" style="margin-bottom: 10px;"
               aria-expanded="false">
                <img class="" src="http://202.4.109.116:8088/erppro/public/images/People Icon.png"
                     style=" float:right; margin-top:-6px; border-radius:100px; box-shadow:1px 1px 2px #666; height:35px; width:35px;"
                     alt="User Image">
                <span class=""
                      style="float: left; cursor:pointer; color:#666666;line-height: normal; font-size: 12px; font-weight: bold; font-size-adjust:normal;"> {{ auth()->user()->name?? '' }}
                </span>
                <span
                    style="float:left;margin:2px; padding:2px; margin-top:30%px; margin-bottom:30%px; cursor:pointer; color:#666666; text-align:center;line-height: normal; font-size: 12px; overflow-wrap:break-word;font-size-adjust:normal;">
                </span>
            </a>

            <ul class="dropdown-menu"
                style="margin-left: 15px; padding: 5px; background-color: rgb(204, 204, 204); left: 0px; right: inherit;">
                <a class="nav-link" data-toggle="dropdown" href="#" style="margin-bottom: 10px;">
                    <li class="user-header">
                        <div align="center">
                            <img src="http://202.4.109.116:8088/erppro/public/images/People Icon.png"
                                 class=" img-circle" alt="User Image" width="80" height="80">
                        </div>
                        <p align="center">

                            <small>
                                {{ auth()->user()->name?? '' }}
                            </small>
                        </p>
                    </li>
                    <!-- Menu Footer-->
                </a>
                <li class="user-footer"><a class="nav-link" data-toggle="dropdown" href="#"
                                           style="margin-bottom: 10px;">
                    </a>
                    <div class="pull-right" style="margin:2px;">
                        <a class="nav-link" data-toggle="dropdown" href="#" style="margin-bottom: 10px;">
                        </a><a href="javascript:void(0)" class="">&nbsp;</a>
                    </div>
                    <hr>
                    <div class="pull-right" style="margin:2px;" align="center">
                        <a href="{{ route('user.logout') }}" class="btn btn-default btn-flat" style="color:#CC0000; background-color:#EEE;
                        border-radius:
                        5px;">Logout</a>
                    </div>
                </li>
            </ul>

        </li>
    </ul>
</nav>
