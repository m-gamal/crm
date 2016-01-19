<div id="sidebar">
    <!-- Wrapper for scrolling functionality -->
    <div id="sidebar-scroll">
        <!-- Sidebar Content -->
        <div class="sidebar-content">
            <!-- User Info -->
            <div class="sidebar-section sidebar-user clearfix sidebar-nav-mini-hide">
                <div class="sidebar-user-avatar">
                    <a href="#">
                        <img src="{{URL::asset('img/placeholders/avatars/avatar2.jpg')}}" alt="avatar">
                    </a>
                </div>
                <div class="sidebar-user-name">
                    Admin
                </div>
                <div class="sidebar-user-links">
                    <a href="{{URL::route('adminInbox')}}" data-toggle="tooltip" data-placement="bottom" title="Messages"><i class="gi gi-envelope"></i></a>
                    <!-- Opens the user settings modal that can be found at the bottom of each page (page_footer.html in PHP version) -->
                    <a href="{{URL::route('adminLogout')}}" data-toggle="tooltip" data-placement="bottom" title="Logout"><i class="gi gi-exit"></i></a>
                </div>
            </div>
            <!-- END User Info -->

            <!-- Sidebar Navigation -->
            <ul class="sidebar-nav">
                <li id="dashboard">
                    <a href="{{URL::to('admin/dashboard')}}">
                        <i class="gi gi-stopwatch sidebar-nav-icon"></i>
                        <span class="sidebar-nav-mini-hide">Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-header">
                    <span class="sidebar-header-title">Users</span>
                </li>
                <li id="level">
                    <a href="{{URL::route('levels')}}">
                        <i class="fa fa-sort-amount-asc  sidebar-nav-icon"></i>
                        <span class="sidebar-nav-mini-hide">
                            Levels
                        </span>
                    </a>
                </li>
                <li id="employee">
                    <a href="{{URL::route('employees')}}">
                        <i class="fa fa-users sidebar-nav-icon"></i>
                        <span class="sidebar-nav-mini-hide">Employers</span>
                    </a>
                </li>
                <li id="customer">
                    <a href="{{URL::route('adminSearchCustomer')}}">
                        <i class="fa fa-stethoscope sidebar-nav-icon"></i>
                        <span class="sidebar-nav-mini-hide">Customers</span>
                    </a>
                </li>

                <li class="sidebar-header">
                    <span class="sidebar-header-title">Product</span>
                </li>
                <li id="line">
                    <a href="{{URL::route('lines')}}">
                        <i class="fa fa-street-view sidebar-nav-icon"></i>
                        <span class="sidebar-nav-mini-hide">Lines</span>
                    </a>
                </li>

                <li id="form">
                    <a href="{{URL::route('forms')}}">
                        <i class="fa fa-medkit sidebar-nav-icon"></i>
                        <span class="sidebar-nav-mini-hide">Forms</span>
                    </a>
                </li>

                <li id="product">
                    <a href="{{URL::route('products')}}">
                        <i class="fa fa-cube sidebar-nav-icon"></i>
                        <span class="sidebar-nav-mini-hide">Products</span>
                    </a>
                </li>

                <li id="distributor">
                    <a href="{{URL::route('distributors')}}">
                        <i class="fa fa-street-view sidebar-nav-icon"></i>
                        <span class="sidebar-nav-mini-hide">Distributions</span>
                    </a>
                </li>

                <li id="target">
                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i>
                        <i class="fa fa-wrench sidebar-nav-icon"></i>
                        <span class="sidebar-nav-mini-hide">
                            Target
                        </span>
                    </a>
                    <ul>
                        <li id="set_target">
                            <a href="#" class="sidebar-nav-submenu">
                                <i class="fa fa-angle-left sidebar-nav-indicator"></i>
                                <i class="fa fa-pencil sidebar-nav-icon"></i>
                                Set Target
                            </a>
                            <ul>
                                <li id="set_product_target">
                                    <a href="{{URL::route('setProductTarget')}}">
                                        <i class="fa fa-cube"></i>
                                        Product Target
                                    </a>
                                </li>
                                <li id="set_area_target">
                                    <a href="{{URL::route('setAreaTarget')}}">
                                        <i class="fa fa-road"></i>
                                        Area Target
                                    </a>
                                </li>
                                <li id="set_territory_target">
                                    <a href="{{URL::route('setTerritoryTarget')}}">
                                        <i class="fa fa-building"></i>
                                        Territory Target
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>

                            <a href="{{URL::route('adminListProductTarget')}}">
                                <i class="fa fa-list sidebar-nav-icon"></i>
                                Target
                            </a>
                        </li>
                    </ul>
                </li>


                <li id="gift">
                    <a href="{{URL::route('gifts')}}">
                        <i class="fa fa-gift sidebar-nav-icon"></i>
                        <span class="sidebar-nav-mini-hide">Gifts</span>
                    </a>
                </li>

                <li class="sidebar-header">
                    <span class="sidebar-header-title">Visits</span>
                </li>

                <li id="area">
                    <a href="{{URL::route('areas')}}">
                        <i class="fa fa-road sidebar-nav-icon"></i>
                        <span class="sidebar-nav-mini-hide">Areas</span>
                    </a>
                </li>

                <li id="territory">
                    <a href="{{URL::route('territories')}}">
                        <i class="fa fa-building sidebar-nav-icon"></i>
                        <span class="sidebar-nav-mini-hide">Territories</span>
                    </a>
                </li>

                <li id="visit_class">
                    <a href="{{URL::route('visitsClasses')}}">
                        <i class="fa fa-filter sidebar-nav-icon"></i>
                        <span class="sidebar-nav-mini-hide">Visit Classes</span>
                    </a>
                </li>

                <li class="sidebar-header">
                    <span class="sidebar-header-title">Search</span>
                </li>

                <li id="plans_search">
                    <a href="{{URL::route('adminPlanSearch')}}">
                        <i class="fa fa-calendar sidebar-nav-icon"></i>
                        <span class="sidebar-nav-mini-hide">Plans </span>
                    </a>
                </li>

                <li id="reports_search">
                    <a href="{{URL::route('adminReportSearch')}}">
                        <i class="fa fa-files-o sidebar-nav-icon"></i>
                        <span class="sidebar-nav-mini-hide">Reports</span>
                    </a>
                </li>

                <li id="sales_search">
                    <a href="{{URL::route('adminSalesSearch')}}">
                        <i class="fa fa-money sidebar-nav-icon"></i>
                        <span class="sidebar-nav-mini-hide">Sales</span>
                    </a>
                </li>

                <li id="coverages_search">
                    <a href="{{URL::route('adminCoverageSearch')}}">
                        <i class="fa fa-pie-chart sidebar-nav-icon"></i>
                        <span class="sidebar-nav-mini-hide">Coverage</span>
                    </a>
                </li>

                <li id="line_history">
                    <a href="{{URL::route('adminMRAchievement')}}">
                        <i class="fa fa-history sidebar-nav-icon"></i>
                        <span class="sidebar-nav-mini-hide">MR Achievements</span>
                    </a>
                </li>


                <li class="sidebar-header">
                    <span class="sidebar-header-title">Updates</span>
                </li>
                <li id="expense_report">
                    <a href="{{URL::route('adminExpensesReports')}}">
                        <i class="fa fa-credit-card sidebar-nav-icon"></i>
                        <span class="sidebar-nav-mini-hide">
                            Expenses Reports
                        </span>
                    </a>
                </li>

                <li id="task">
                    <a href="{{URL::route('tasks')}}">
                        <i class="fa fa-tasks sidebar-nav-icon"></i>
                        <span class="sidebar-nav-mini-hide">Tasks</span>
                    </a>
                </li>

                <li id="announcement">
                    <a href="{{URL::route('announcements')}}">
                        <i class="fa fa-bullhorn sidebar-nav-icon"></i>
                        <span class="sidebar-nav-mini-hide">
                            Announcements
                        </span>
                    </a>
                </li>
            </ul>
            <!-- END Sidebar Navigation -->
        </div>
        <!-- END Sidebar Content -->
    </div>
    <!-- END Wrapper for scrolling functionality -->
</div>