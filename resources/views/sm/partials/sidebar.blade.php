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
                    <a href="{{URL::route('smProfile')}}" data-toggle="tooltip" data-placement="bottom" title="Edit Profile"><i class="fa fa-user"></i></a>
                    <a href="{{URL::route('smInbox')}}" data-toggle="tooltip" data-placement="bottom" title="Messages"><i class="gi gi-envelope"></i></a>
                    <a href="{{URL::route('logout')}}" data-toggle="tooltip" data-placement="bottom" title="Logout"><i class="gi gi-exit"></i></a>
                </div>
            </div>
            <!-- END User Info -->


            <!-- Sidebar Navigation -->
            <ul class="sidebar-nav">
                <li id="dashboard">
                    <a href="{{URL::route('sm')}}">
                        <i class="gi gi-stopwatch sidebar-nav-icon"></i>
                        <span class="sidebar-nav-mini-hide">Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-header">
                    <span class="sidebar-header-title">Users</span>
                </li>

                <li id="employee">
                    <a href="{{URL::route('smEmployees')}}">
                        <i class="fa fa-users sidebar-nav-icon"></i>
                        <span class="sidebar-nav-mini-hide">Employees</span>
                    </a>
                </li>
                <li id="customer">
                    <a href="{{URL::route('smSearchCustomer')}}">
                        <i class="fa fa-stethoscope sidebar-nav-icon"></i>
                        <span class="sidebar-nav-mini-hide">Customers</span>
                    </a>
                </li>

                <li class="sidebar-header">
                    <span class="sidebar-header-title">Product</span>
                </li>

                <li id="product">
                    <a href="{{URL::route('smProducts')}}">
                        <i class="fa fa-cube sidebar-nav-icon"></i>
                        <span class="sidebar-nav-mini-hide">Products</span>
                    </a>
                </li>

                <li id="distributor">
                    <a href="{{URL::route('smDistributors')}}">
                        <i class="fa fa-street-view sidebar-nav-icon"></i>
                        <span class="sidebar-nav-mini-hide">Distributions</span>
                    </a>
                </li>


                <li class="sidebar-header">
                    <span class="sidebar-header-title">Visits</span>
                </li>

                <li id="plan">
                    <a href="{{URL::route('smPlans')}}">
                        <i class="fa fa-calendar sidebar-nav-icon"></i>
                        <span class="sidebar-nav-mini-hide">Plans</span>
                    </a>
                </li>
                <li id="report">
                    <a href="{{URL::route('smReports')}}">
                        <i class="fa fa-file sidebar-nav-icon"></i>
                        <span class="sidebar-nav-mini-hide">Reports </span>
                    </a>
                </li>

                <li class="sidebar-header">
                    <span class="sidebar-header-title">Search</span>
                </li>

                <li id="plans_search">
                    <a href="{{URL::route('smPlanSearch')}}">
                        <i class="fa fa-calendar sidebar-nav-icon"></i>
                        <span class="sidebar-nav-mini-hide">Plans </span>
                    </a>
                </li>

                <li id="reports_search">
                    <a href="{{URL::route('smReportSearch')}}">
                        <i class="fa fa-files-o sidebar-nav-icon"></i>
                        <span class="sidebar-nav-mini-hide">Reports</span>
                    </a>
                </li>

                <li id="sales_search">
                    <a href="{{URL::route('smSalesSearch')}}">
                        <i class="fa fa-money sidebar-nav-icon"></i>
                        <span class="sidebar-nav-mini-hide">Sales</span>
                    </a>
                </li>

                <li id="coverages_search">
                    <a href="{{URL::route('smCoverageSearch')}}">
                        <i class="fa fa-pie-chart sidebar-nav-icon"></i>
                        <span class="sidebar-nav-mini-hide">Coverage</span>
                    </a>
                </li>

                <li id="line_history">
                    <a href="{{URL::route('smMRAchievement')}}">
                        <i class="fa fa-history sidebar-nav-icon"></i>
                        <span class="sidebar-nav-mini-hide">MR Achievements</span>
                    </a>
                </li>


                <li class="sidebar-header">
                    <span class="sidebar-header-title">Updates</span>
                </li>
                <li id="expense_report">
                    <a href="{{URL::route('smExpensesReports')}}">
                        <i class="fa fa-credit-card sidebar-nav-icon"></i>
                        <span class="sidebar-nav-mini-hide">
                            Expenses Reports
                        </span>
                    </a>
                </li>

                <li id="leave_request">
                    <a href="{{URL::route('smLeaveRequests')}}">
                        <i class="fa fa-sign-out sidebar-nav-icon"></i>
                        <span class="sidebar-nav-mini-hide">Leave Requests</span>
                    </a>
                </li>

                <li id="service_request">
                    <a href="{{URL::route('smServicesRequests')}}">
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