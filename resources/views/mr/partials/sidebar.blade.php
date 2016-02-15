<div id="sidebar">
    <!-- Wrapper for scrolling functionality -->
    <div id="sidebar-scroll">
        <!-- Sidebar Content -->
        <div class="sidebar-content">
            <!-- User Info -->
            <div class="sidebar-section sidebar-user clearfix sidebar-nav-mini-hide">
                <div class="sidebar-user-avatar">
                    <a href="#">
                        @if(\Auth::user()->id)
                        <img src="{{URL::asset('img/avatar/'.\Auth::user()->id)}}" alt="avatar">
                        @else
                            <img src="{{URL::asset('img/placeholders/avatars/avatar2.jpg')}}" alt="avatar">
                        @endif
                    </a>
                </div>
                <div class="sidebar-user-name">{{\Auth::user()->name}}</div>
                <div class="sidebar-user-links">
                    <a href="{{URL::route('mrProfile')}}" data-toggle="tooltip" data-placement="bottom" title="Edit Profile"><i class="fa fa-user"></i></a>
                    <a href="{{URL::route('mrInbox')}}" data-toggle="tooltip" data-placement="bottom" title="Messages"><i class="gi gi-envelope"></i></a>
                    <a href="{{URL::route('logout')}}" data-toggle="tooltip" data-placement="bottom" title="Logout"><i class="gi gi-exit"></i></a>
                </div>
            </div>
            <!-- END User Info -->


            <!-- Sidebar Navigation -->
            <ul class="sidebar-nav">
                <li id="dashboard">
                    <a href="{{URL::route('mr')}}">
                        <i class="gi gi-stopwatch sidebar-nav-icon"></i>
                        <span class="sidebar-nav-mini-hide">Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-header">
                    <span class="sidebar-header-title">Your Line</span>
                </li>
                <li id="details">
                    <a href="{{URL::route('singleLine', Config::get('app.current_month'))}}">
                        <i class="fa fa-search sidebar-nav-icon"></i>
                        <span class="sidebar-nav-mini-hide"> Details <i>for {{Config::get('app.current_month')}}</i></span>
                    </a>
                </li>

                <li id="plan">
                    <a href="{{URL::route('plans')}}">
                        <i class="fa fa-calendar sidebar-nav-icon"></i>
                        <span class="sidebar-nav-mini-hide">Plans</span>
                    </a>
                </li>

                <li id="report">
                    <a href="{{URL::route('reports')}}">
                        <i class="fa fa-file-o sidebar-nav-icon"></i>
                        <span class="sidebar-nav-mini-hide">Reports</span>
                    </a>
                </li>
                <li id="distributor">
                    <a href="{{URL::route('mrDistributors')}}">
                        <i class="fa fa-street-view sidebar-nav-icon"></i>
                        <span class="sidebar-nav-mini-hide">Distributions</span>
                    </a>
                </li>
                <li id="line_history">
                    <a href="{{URL::route('lineHistory')}}">
                        <i class="fa fa-history sidebar-nav-icon"></i>
                        <span class="sidebar-nav-mini-hide">History</span>
                    </a>
                </li>

                <li class="sidebar-header">
                    <span class="sidebar-header-title">Search</span>
                </li>
                
                <li id="sales_search">
                    <a href="{{URL::route('salesSearch')}}">
                        <i class="fa fa-money sidebar-nav-icon"></i>
                        <span class="sidebar-nav-mini-hide">Sales</span>
                    </a>
                </li>

                <li id="reports_search">
                    <a href="{{URL::route('reportSearch')}}">
                        <i class="fa fa-files-o sidebar-nav-icon"></i>
                        <span class="sidebar-nav-mini-hide">Reports</span>
                    </a>
                </li>

                <li id="plans_search">
                    <a href="{{URL::route('planSearch')}}">
                        <i class="fa fa-calendar sidebar-nav-icon"></i>
                        <span class="sidebar-nav-mini-hide">Plans</span>
                    </a>
                </li>

                {{--<li id="coverage">--}}
                    {{--<a href="#">--}}
                        {{--<i class="fa fa-pie-chart sidebar-nav-icon"></i>--}}
                        {{--<span class="sidebar-nav-mini-hide">Coverages</span>--}}
                    {{--</a>--}}
                {{--</li>--}}

                <li class="sidebar-header">
                    <span class="sidebar-header-title">Requests</span>
                </li>
                <li id="expense_report">
                    <a href="{{URL::route('expensesReports')}}">
                        <i class="fa fa-credit-card sidebar-nav-icon"></i>
                        <span class="sidebar-nav-mini-hide">Expenses Reports</span>
                    </a>
                </li>

                <li id="leave_request">
                    <a href="{{URL::route('leaveRequests')}}">
                        <i class="fa fa-sign-out sidebar-nav-icon"></i>
                        <span class="sidebar-nav-mini-hide">Leave Requests</span>
                    </a>
                </li>

                <li id="service_request">
                    <a href="{{URL::route('servicesRequests')}}">
                        <i class="fa fa-star sidebar-nav-icon"></i>
                        <span class="sidebar-nav-mini-hide">Services Requests</span>
                    </a>
                </li>
            </ul>
            <!-- END Sidebar Navigation -->
        </div>
        <!-- END Sidebar Content -->
    </div>
    <!-- END Wrapper for scrolling functionality -->
</div>