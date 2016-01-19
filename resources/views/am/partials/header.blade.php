<header class="navbar navbar-default">
    <!-- Left Header Navigation -->
    <ul class="nav navbar-nav-custom">
        <!-- Main Sidebar Toggle Button -->
        <li>
            <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar');this.blur();">
                <i class="fa fa-bars fa-fw"></i>
            </a>
        </li>
        <!-- END Main Sidebar Toggle Button -->
    </ul>
    <!-- END Left Header Navigation -->

    <!-- Right Header Navigation -->
    <ul class="nav navbar-nav-custom pull-right">
        <!-- Alternative Sidebar Toggle Button -->
        <li>
            <a href="javascript:void(0)" data-toggle="dropdown" class="dropdown-toggle">
                <i class="fa fa-bell fa-2x" @if($amPendingRequests ==1 ) style="color:red; font-size: 18px;" @endif></i>
            </a>
            <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                <li>
                    <div class="alert alert-info alert-alt">
                        <a href="{{URL::route('amPendingPlans')}}">
                            <i class="fa fa-calendar"></i> Review {{$amCountPendingPlans}} Pending Plans
                        </a>
                    </div>

                    <div class="alert alert-info alert-alt">
                        <a href="{{URL::route('amPendingLeaveRequests')}}">
                            <i class="fa fa-sign-out"></i> Review {{$amCountPendingLeaveRequests}} Pending Leave Request
                        </a>
                    </div>

                    <div class="alert alert-info alert-alt">
                        <a href="{{URL::route('amPendingServicesRequests')}}">
                            <i class="fa fa-reply"></i> Review {{$amCountPendingServicesRequest}} Pending Service Request
                        </a>
                    </div>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript:void(0)" data-toggle="dropdown" class="dropdown-toggle">
                <i class="fa fa-envelope" style="font-size: 18px;"></i>
                <span class="label label-primary label-indicator animation-floating">1</span>
            </a>
            <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                <li>
                    <div class="alert alert-success alert-alt">
                        <small>5 min ago</small><br>
                        <i class="fa fa-envelope"></i> New Message !
                    </div>
                </li>
            </ul>
        </li>

        <!-- User Dropdown -->
        <li class="dropdown">
            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                <img src="{{URL::asset('img/placeholders/avatars/avatar2.jpg')}}" alt="avatar">
                <i class="fa fa-angle-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                <li>
                    <a href="{{URL::route('lock')}}"><i class="fa fa-lock fa-fw pull-right"></i> Lock</a>
                    <a href="#"><i class="fa fa-ban fa-fw pull-right"></i> Logout</a>
                </li>
            </ul>
        </li>
        <!-- END User Dropdown -->
    </ul>
    <!-- END Right Header Navigation -->
</header>