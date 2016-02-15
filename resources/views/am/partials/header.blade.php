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
                <i class="fa fa-bell fa-2x" @if($mrPendingRequests ==1 ) style="color:red; font-size: 18px;" @endif></i>
            </a>
            <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                <li>
                    <div class="alert alert-info alert-alt">
                        <a href="{{URL::route('amPendingPlans')}}">
                            <i class="fa fa-calendar"></i> Review {{$mrCountPendingPlans}} Pending Plans
                        </a>
                    </div>

                    <div class="alert alert-info alert-alt">
                        <a href="{{URL::route('amPendingLeaveRequests')}}">
                            <i class="fa fa-sign-out"></i> Review {{$mrCountPendingLeaveRequests}} Pending Leave Request
                        </a>
                    </div>

                    <div class="alert alert-info alert-alt">
                        <a href="{{URL::route('amPendingServicesRequests')}}">
                            <i class="fa fa-reply"></i> Review {{$mrCountPendingServicesRequest}} Pending Service Request
                        </a>
                    </div>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript:void(0)" data-toggle="dropdown" class="dropdown-toggle">
                <i class="fa fa-envelope" style="font-size: 18px; @if(count($unread)) color : red; @endif"></i>
                @if(count($unread)) <span class="label label-primary label-indicator animation-floating">{{count($unread)}}</span> @endif
            </a>
            <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                @foreach($unread as $singleMessage)
                    <li>
                        <div class="alert alert-success alert-alt">
                            <a href="{{URL::route('amShowMessage', $singleMessage->id)}}">
                                <small>{{$singleMessage->time}}</small><br>
                                <i class="fa fa-envelope"></i> New Message
                            </a>
                        </div>
                    </li>
                @endforeach
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
                    <a href="{{URL::route('logout')}}"><i class="fa fa-ban fa-fw pull-right"></i> Logout</a>
                </li>
            </ul>
        </li>
        <!-- END User Dropdown -->
    </ul>
    <!-- END Right Header Navigation -->
</header>