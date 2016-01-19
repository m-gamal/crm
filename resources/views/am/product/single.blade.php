@extends('admin.layouts.master')
@section('title')
    Line
@endsection

@section('content')
        <!-- Line Content -->
    <div class="row">
        <div class="col-sm-3">
            <!-- Quick Month Stats Block -->
            <div class="block">
                <!-- Quick Month Stats Title -->
                <div class="block-title">
                    <h2><i class="gi gi-charts"></i> Quick <strong>Stats</strong></h2>
                </div>
                <!-- END Quick Month Stats Title -->

                <!-- Quick Month Stats Content -->
                <table class="table table-striped table-borderless table-vcenter">
                    <tbody>
                    <tr>
                        <td>
                            <i class="fa fa-road"></i>
                            <strong>Areas</strong>
                        </td>
                        <td>12</td>
                    </tr>
                    <tr>
                        <td>
                            <i class="fa fa-cube"></i>
                            <strong>Products</strong>
                        </td>
                        <td>420</td>
                    </tr>
                    <tr>
                        <td>
                            <i class="fa fa-users"></i>
                            <strong>Employees</strong>
                        </td>
                        <td>970</td>
                    </tr>
                    <tr>
                        <td>
                            <i class="fa fa-pie-chart"></i>
                            <strong>Month Coverage</strong>
                        </td>
                        <td>150</td>
                    </tr>
                    <tr>
                        <td>
                            <i class="fa fa-money"></i>
                            <strong>Month Sales</strong>
                        </td>
                        <td>200</td>
                    </tr>
                    </tbody>
                </table>
                <!-- END Quick Month Stats Content -->
            </div>
            <!-- END Quick Month Stats Block -->
        </div>

        <div class="col-sm-9">
            <div class="block">
                <div class="block-title">
                    <ul class="nav nav-tabs" data-toggle="tabs">
                        <li class="active">
                            <a href="#areas">
                                <i class="fa fa-road"></i>
                                Areas
                            </a>
                        </li>

                        <li>
                            <a href="#employees">
                                <i class="fa fa-users"></i>
                                Employees
                            </a>
                        </li>

                        <li>
                            <a href="#products">
                                <i class="fa fa-cube"></i>
                                Products
                            </a>
                        </li>
                        <li>
                            <a href="#coverage">
                                <i class="fa fa-pie-chart"></i>
                                Coverage
                            </a>
                        </li>
                        <li>
                            <a href="#sales">
                                <i class="fa fa-money"></i>
                                Sales
                            </a>
                        </li>
                        <li>
                            <a href="#history">
                                <i class="fa fa-history"></i>
                                History
                            </a>
                        </li>
                    </ul>
                </div>


                <!-- Tabs Content -->
                <div class="tab-content">
                    <!-- Begin Areas -->
                    <div class="tab-pane active" id="areas">
                        areas
                        <div class="block-content-full">
                            <div class="table-responsive remove-margin-bottom">
                                <table class="table table-striped table-vcenter remove-margin-bottom">
                                    <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th>Status</th>
                                        <th>Source</th>
                                        <th>Title</th>
                                        <th class="text-center">Sender</th>
                                        <th class="text-center"><i class="fa fa-comments"></i></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="text-center">#TCK420</td>
                                        <td><span class="label label-danger">URGENT</span></td>
                                        <td>Forum</td>
                                        <td>
                                            <a href="javascript:void(0)"><strong>How can I create tasks using the advanced guide?</strong></a><br>
                                            <span class="text-muted">1 hour ago by <strong>Carolyn Murray</strong></span>
                                        </td>
                                        <td class="text-center"><img src="{{URL::asset('img/placeholders/avatars/avatar12.jpg')}}" alt="Avatar" class="img-circle"></td>
                                        <td class="text-center"><span class="badge">3</span></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">#TCK419</td>
                                        <td><span class="label label-danger">URGENT</span></td>
                                        <td>Email</td>
                                        <td>
                                            <a href="javascript:void(0)"><strong>I get an error message</strong></a><br>
                                            <span class="text-muted">3 hours ago by <strong>Alexander Martinez</strong></span>
                                        </td>
                                        <td class="text-center"><img src="{{URL::asset('img/placeholders/avatars/avatar11.jpg')}}" alt="Avatar" class="img-circle"></td>
                                        <td class="text-center"><span class="badge">7</span></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">#TCK418</td>
                                        <td><span class="label label-success">OPEN</span></td>
                                        <td>Email</td>
                                        <td>
                                            <a href="javascript:void(0)"><strong>I would like to learn more about the VIP plan</strong></a><br>
                                            <span class="text-muted">1 day ago by <strong>Matthew Stanley</strong></span>
                                        </td>
                                        <td class="text-center"><img src="{{URL::asset('img/placeholders/avatars/avatar1.jpg')}}" alt="Avatar" class="img-circle"></td>
                                        <td class="text-center"><span class="badge">1</span></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">#TCK417</td>
                                        <td><span class="label label-success">OPEN</span></td>
                                        <td>Forum</td>
                                        <td>
                                            <a href="javascript:void(0)"><strong>Can you help me with the installation?</strong></a><br>
                                            <span class="text-muted">2 days ago by <strong>Eugene Griffin</strong></span>
                                        </td>
                                        <td class="text-center"><img src="{{URL::asset('img/placeholders/avatars/avatar2.jpg')}}" alt="Avatar" class="img-circle"></td>
                                        <td class="text-center"><span class="badge">2</span></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">#TCK416</td>
                                        <td><span class="label label-default">CLOSED</span></td>
                                        <td>Contact Form</td>
                                        <td>
                                            <a href="javascript:void(0)"><strong>Thank you for a great service!</strong></a><br>
                                            <span class="text-muted">2 days ago by <strong>Howard Smith</strong></span>
                                        </td>
                                        <td class="text-center"><img src="{{URL::asset('img/placeholders/avatars/avatar3.jpg')}}" alt="Avatar" class="img-circle"></td>
                                        <td class="text-center"><span class="badge">3</span></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">#TCK415</td>
                                        <td><span class="label label-success">OPEN</span></td>
                                        <td>Email</td>
                                        <td>
                                            <a href="javascript:void(0)"><strong>Payment issue</strong></a><br>
                                            <span class="text-muted">1 week ago by <strong>Richard Armstrong</strong></span>
                                        </td>
                                        <td class="text-center"><img src="{{URL::asset('img/placeholders/avatars/avatar4.jpg')}}" alt="Avatar" class="img-circle"></td>
                                        <td class="text-center"><span class="badge">2</span></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">#TCK414</td>
                                        <td><span class="label label-default">CLOSED</span></td>
                                        <td>Forum</td>
                                        <td>
                                            <a href="javascript:void(0)"><strong>What is the best way to back up?</strong></a><br>
                                            <span class="text-muted">1 week ago by <strong>Timothy Wheeler</strong></span>
                                        </td>
                                        <td class="text-center"><img src="{{URL::asset('img/placeholders/avatars/avatar5.jpg')}}" alt="Avatar" class="img-circle"></td>
                                        <td class="text-center"><span class="badge">5</span></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">#TCK413</td>
                                        <td><span class="label label-warning">INVALID</span></td>
                                        <td>Forum</td>
                                        <td>
                                            <a href="javascript:void(0)"><strong>How to create a new account?</strong></a><br>
                                            <span class="text-muted">2 weeks ago by <strong>Emma Weaver</strong></span>
                                        </td>
                                        <td class="text-center"><img src="{{URL::asset('img/placeholders/avatars/avatar6.jpg')}}" alt="Avatar" class="img-circle"></td>
                                        <td class="text-center"><span class="badge">0</span></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">#TCK412</td>
                                        <td><span class="label label-danger">URGENT</span></td>
                                        <td>Contact Form</td>
                                        <td>
                                            <a href="javascript:void(0)"><strong>Pre sale question</strong></a><br>
                                            <span class="text-muted">1 month ago by <strong>Edward Harvey</strong></span>
                                        </td>
                                        <td class="text-center"><img src="{{URL::asset('img/placeholders/avatars/avatar7.jpg')}}" alt="Avatar" class="img-circle"></td>
                                        <td class="text-center"><span class="badge">0</span></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">#TCK411</td>
                                        <td><span class="label label-success">OPEN</span></td>
                                        <td>Email</td>
                                        <td>
                                            <a href="javascript:void(0)"><strong>Can you help me with a plugin?</strong></a><br>
                                            <span class="text-muted">1 month ago by <strong>Tyler Rivera</strong></span>
                                        </td>
                                        <td class="text-center"><img src="{{URL::asset('img/placeholders/avatars/avatar8.jpg')}}" alt="Avatar" class="img-circle"></td>
                                        <td class="text-center"><span class="badge">2</span></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">#TCK410</td>
                                        <td><span class="label label-success">OPEN</span></td>
                                        <td>Forum</td>
                                        <td>
                                            <a href="javascript:void(0)"><strong>Are you available for contract work?</strong></a><br>
                                            <span class="text-muted">2 months ago by <strong>Aaron Gibson</strong></span>
                                        </td>
                                        <td class="text-center"><img src="{{URL::asset('img/placeholders/avatars/avatar9.jpg')}}" alt="Avatar" class="img-circle"></td>
                                        <td class="text-center"><span class="badge">0</span></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">#TCK409</td>
                                        <td><span class="label label-default">CLOSED</span></td>
                                        <td>Email</td>
                                        <td>
                                            <a href="javascript:void(0)"><strong>I would like some assistance with the available plans</strong></a><br>
                                            <span class="text-muted">1 year ago by <strong>Kathy Austin</strong></span>
                                        </td>
                                        <td class="text-center"><img src="{{URL::asset('img/placeholders/avatars/avatar10.jpg')}}" alt="Avatar" class="img-circle"></td>
                                        <td class="text-center"><span class="badge">4</span></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">#TCK408</td>
                                        <td><span class="label label-default">CLOSED</span></td>
                                        <td>Email</td>
                                        <td>
                                            <a href="javascript:void(0)"><strong>How can I use the advanced features?</strong></a><br>
                                            <span class="text-muted">1 year ago by <strong>John Doe</strong></span>
                                        </td>
                                        <td class="text-center"><img src="{{URL::asset('img/placeholders/avatars/avatar16.jpg')}}" alt="Avatar" class="img-circle"></td>
                                        <td class="text-center"><span class="badge">4</span></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="text-center">
                                <ul class="pagination">
                                    <li class="disabled"><a href="javascript:void(0)"><i class="fa fa-chevron-left"></i></a></li>
                                    <li class="active"><a href="javascript:void(0)">1</a></li>
                                    <li><a href="javascript:void(0)">2</a></li>
                                    <li><a href="javascript:void(0)">3</a></li>
                                    <li><a href="javascript:void(0)"><i class="fa fa-chevron-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- END Areas -->

                    <!-- Begin Employees -->
                    <div class="tab-pane" id="employees">
                        employees
                        <div class="block-content-full">
                            <div class="table-responsive remove-margin-bottom">
                                <table class="table table-striped table-vcenter remove-margin-bottom">
                                    <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th>Status</th>
                                        <th>Source</th>
                                        <th>Title</th>
                                        <th class="text-center">Sender</th>
                                        <th class="text-center"><i class="fa fa-comments"></i></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="text-center">#TCK420</td>
                                        <td><span class="label label-danger">URGENT</span></td>
                                        <td>Forum</td>
                                        <td>
                                            <a href="javascript:void(0)"><strong>How can I create tasks using the advanced guide?</strong></a><br>
                                            <span class="text-muted">1 hour ago by <strong>Carolyn Murray</strong></span>
                                        </td>
                                        <td class="text-center"><img src="{{URL::asset('img/placeholders/avatars/avatar12.jpg')}}" alt="Avatar" class="img-circle"></td>
                                        <td class="text-center"><span class="badge">3</span></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">#TCK419</td>
                                        <td><span class="label label-danger">URGENT</span></td>
                                        <td>Email</td>
                                        <td>
                                            <a href="javascript:void(0)"><strong>I get an error message</strong></a><br>
                                            <span class="text-muted">3 hours ago by <strong>Alexander Martinez</strong></span>
                                        </td>
                                        <td class="text-center"><img src="{{URL::asset('img/placeholders/avatars/avatar11.jpg')}}" alt="Avatar" class="img-circle"></td>
                                        <td class="text-center"><span class="badge">7</span></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">#TCK418</td>
                                        <td><span class="label label-success">OPEN</span></td>
                                        <td>Email</td>
                                        <td>
                                            <a href="javascript:void(0)"><strong>I would like to learn more about the VIP plan</strong></a><br>
                                            <span class="text-muted">1 day ago by <strong>Matthew Stanley</strong></span>
                                        </td>
                                        <td class="text-center"><img src="{{URL::asset('img/placeholders/avatars/avatar1.jpg')}}" alt="Avatar" class="img-circle"></td>
                                        <td class="text-center"><span class="badge">1</span></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">#TCK417</td>
                                        <td><span class="label label-success">OPEN</span></td>
                                        <td>Forum</td>
                                        <td>
                                            <a href="javascript:void(0)"><strong>Can you help me with the installation?</strong></a><br>
                                            <span class="text-muted">2 days ago by <strong>Eugene Griffin</strong></span>
                                        </td>
                                        <td class="text-center"><img src="{{URL::asset('img/placeholders/avatars/avatar2.jpg')}}" alt="Avatar" class="img-circle"></td>
                                        <td class="text-center"><span class="badge">2</span></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">#TCK416</td>
                                        <td><span class="label label-default">CLOSED</span></td>
                                        <td>Contact Form</td>
                                        <td>
                                            <a href="javascript:void(0)"><strong>Thank you for a great service!</strong></a><br>
                                            <span class="text-muted">2 days ago by <strong>Howard Smith</strong></span>
                                        </td>
                                        <td class="text-center"><img src="{{URL::asset('img/placeholders/avatars/avatar3.jpg')}}" alt="Avatar" class="img-circle"></td>
                                        <td class="text-center"><span class="badge">3</span></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">#TCK415</td>
                                        <td><span class="label label-success">OPEN</span></td>
                                        <td>Email</td>
                                        <td>
                                            <a href="javascript:void(0)"><strong>Payment issue</strong></a><br>
                                            <span class="text-muted">1 week ago by <strong>Richard Armstrong</strong></span>
                                        </td>
                                        <td class="text-center"><img src="{{URL::asset('img/placeholders/avatars/avatar4.jpg')}}" alt="Avatar" class="img-circle"></td>
                                        <td class="text-center"><span class="badge">2</span></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">#TCK414</td>
                                        <td><span class="label label-default">CLOSED</span></td>
                                        <td>Forum</td>
                                        <td>
                                            <a href="javascript:void(0)"><strong>What is the best way to back up?</strong></a><br>
                                            <span class="text-muted">1 week ago by <strong>Timothy Wheeler</strong></span>
                                        </td>
                                        <td class="text-center"><img src="{{URL::asset('img/placeholders/avatars/avatar5.jpg')}}" alt="Avatar" class="img-circle"></td>
                                        <td class="text-center"><span class="badge">5</span></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">#TCK413</td>
                                        <td><span class="label label-warning">INVALID</span></td>
                                        <td>Forum</td>
                                        <td>
                                            <a href="javascript:void(0)"><strong>How to create a new account?</strong></a><br>
                                            <span class="text-muted">2 weeks ago by <strong>Emma Weaver</strong></span>
                                        </td>
                                        <td class="text-center"><img src="{{URL::asset('img/placeholders/avatars/avatar6.jpg')}}" alt="Avatar" class="img-circle"></td>
                                        <td class="text-center"><span class="badge">0</span></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">#TCK412</td>
                                        <td><span class="label label-danger">URGENT</span></td>
                                        <td>Contact Form</td>
                                        <td>
                                            <a href="javascript:void(0)"><strong>Pre sale question</strong></a><br>
                                            <span class="text-muted">1 month ago by <strong>Edward Harvey</strong></span>
                                        </td>
                                        <td class="text-center"><img src="{{URL::asset('img/placeholders/avatars/avatar7.jpg')}}" alt="Avatar" class="img-circle"></td>
                                        <td class="text-center"><span class="badge">0</span></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">#TCK411</td>
                                        <td><span class="label label-success">OPEN</span></td>
                                        <td>Email</td>
                                        <td>
                                            <a href="javascript:void(0)"><strong>Can you help me with a plugin?</strong></a><br>
                                            <span class="text-muted">1 month ago by <strong>Tyler Rivera</strong></span>
                                        </td>
                                        <td class="text-center"><img src="{{URL::asset('img/placeholders/avatars/avatar8.jpg')}}" alt="Avatar" class="img-circle"></td>
                                        <td class="text-center"><span class="badge">2</span></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">#TCK410</td>
                                        <td><span class="label label-success">OPEN</span></td>
                                        <td>Forum</td>
                                        <td>
                                            <a href="javascript:void(0)"><strong>Are you available for contract work?</strong></a><br>
                                            <span class="text-muted">2 months ago by <strong>Aaron Gibson</strong></span>
                                        </td>
                                        <td class="text-center"><img src="{{URL::asset('img/placeholders/avatars/avatar9.jpg')}}" alt="Avatar" class="img-circle"></td>
                                        <td class="text-center"><span class="badge">0</span></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">#TCK409</td>
                                        <td><span class="label label-default">CLOSED</span></td>
                                        <td>Email</td>
                                        <td>
                                            <a href="javascript:void(0)"><strong>I would like some assistance with the available plans</strong></a><br>
                                            <span class="text-muted">1 year ago by <strong>Kathy Austin</strong></span>
                                        </td>
                                        <td class="text-center"><img src="{{URL::asset('img/placeholders/avatars/avatar10.jpg')}}" alt="Avatar" class="img-circle"></td>
                                        <td class="text-center"><span class="badge">4</span></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">#TCK408</td>
                                        <td><span class="label label-default">CLOSED</span></td>
                                        <td>Email</td>
                                        <td>
                                            <a href="javascript:void(0)"><strong>How can I use the advanced features?</strong></a><br>
                                            <span class="text-muted">1 year ago by <strong>John Doe</strong></span>
                                        </td>
                                        <td class="text-center"><img src="{{URL::asset('img/placeholders/avatars/avatar16.jpg')}}" alt="Avatar" class="img-circle"></td>
                                        <td class="text-center"><span class="badge">4</span></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="text-center">
                                <ul class="pagination">
                                    <li class="disabled"><a href="javascript:void(0)"><i class="fa fa-chevron-left"></i></a></li>
                                    <li class="active"><a href="javascript:void(0)">1</a></li>
                                    <li><a href="javascript:void(0)">2</a></li>
                                    <li><a href="javascript:void(0)">3</a></li>
                                    <li><a href="javascript:void(0)"><i class="fa fa-chevron-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- END Employees -->

                    <!-- Begin Product -->
                    <div class="tab-pane" id="products">
                        products
                        <div class="alert alert-success animation-fadeInQuick">Current Status: <strong>OPEN</strong></div>
                        <a href="javascript:void(0)" class="btn btn-xs btn-default pull-right"><i class="fa fa-check"></i> Flag as Closed</a>
                        <a href="javascript:void(0)" class="btn btn-xs btn-danger"><i class="fa fa-flag"></i> Flag as Urgent</a>
                        <a href="javascript:void(0)" class="btn btn-xs btn-warning"><i class="fa fa-flag"></i> Flag as Invalid</a>
                        <hr>
                        <ul class="media-list media-feed push">
                            <li class="media">
                                <a href="page_ready_user_profile.html" class="pull-left">
                                    <img src="{{URL::asset('img/placeholders/avatars/avatar9.jpg')}}" alt="Avatar" class="img-circle">
                                </a>
                                <div class="media-body">
                                    <p class="push-bit">
                                                            <span class="text-muted pull-right">
                                                                <small>2 hours ago</small>
                                                            </span>
                                        <small><a href="page_ready_user_profile.html">Howard Smith</a> through <a href="javascript:void(0)">Forum</a></small>
                                    </p>
                                    <h4><strong>Can you help me with the installation?</strong></h4>
                                    <p>Hi, I'm having a problem with the installation of the theme, can you help me out? I get the following error message and I don't know what to do:</p>
                                    <div class="alert alert-warning">
                                        <p><i class="fa fa-angle-right"></i> <strong>Error Establishing Database Connection</strong></p>
                                        <p>...</p>
                                    </div>
                                    <p>
                                        <a href="javascript:void(0)" class="btn btn-xs btn-default"><i class="fa fa-support"></i> Ask for Assistance</a>
                                        <a href="javascript:void(0)" class="btn btn-xs btn-default"><i class="fa fa-user"></i> Assign this ticket</a>
                                    </p>
                                </div>
                            </li>


                            <li class="media">
                                <a href="page_ready_user_profile.html" class="pull-left">
                                    <img src="{{URL::asset('img/placeholders/avatars/avatar.jpg')}}" alt="Avatar" class="img-circle">
                                </a>
                                <div class="media-body">
                                    <p class="push-bit">
                                                            <span class="text-muted pull-right">
                                                                <small>1 hour ago</small>
                                                            </span>
                                        <small><a href="page_ready_user_profile.html">Support</a></small>
                                    </p>
                                    <p>Hi Howard and thank you very much for your purchase! There are many reasons this can happen. One is the incorrect information in wp-config.html file. Please open up wp-config.html and ensure that the following are correct:</p>
                                    <ul class="fa-ul push">
                                        <li><i class="fa fa-li fa-check text-success"></i> Database name</li>
                                        <li><i class="fa fa-li fa-check text-success"></i> Database username</li>
                                        <li><i class="fa fa-li fa-check text-success"></i> Database password</li>
                                        <li><i class="fa fa-li fa-check text-success"></i> Database host</li>
                                    </ul>
                                    <p>Learn more about <a href="javascript:void(0)">editing the wp-config.html</a></p>
                                </div>
                            </li>
                            <li class="media">
                                <a href="page_ready_user_profile.html" class="pull-left">
                                    <img src="{{URL::asset('img/placeholders/avatars/avatar9.jpg')}}" alt="Avatar" class="img-circle">
                                </a>
                                <div class="media-body">
                                    <p class="push-bit">
                                                            <span class="text-muted pull-right">
                                                                <small>30 min ago</small>
                                                            </span>
                                        <small><a href="page_ready_user_profile.html">Howard Smith</a></small>
                                    </p>
                                    <p>I'm going to check it out and let you know!</p>
                                    <p>Thanks a lot!</p>
                                </div>
                            </li>
                            <li class="media">
                                <a href="page_ready_user_profile.html" class="pull-left">
                                    <img src="{{URL::asset('img/placeholders/avatars/avatar.jpg')}}" alt="Avatar" class="img-circle">
                                </a>
                                <div class="media-body">
                                    <form action="page_ready_tickets.html#tickets-single" method="post">
                                        <textarea id="tickets-reply" name="tickets-reply" class="form-control" rows="5" placeholder="Enter your reply"></textarea>
                                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-reply"></i> Post Reply</button>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- END Product -->

                    <!-- Begin Coverage -->
                    <div class="tab-pane" id="coverage">
                        coverage
                        <div class="alert alert-success animation-fadeInQuick">Current Status: <strong>OPEN</strong></div>
                        <a href="javascript:void(0)" class="btn btn-xs btn-default pull-right"><i class="fa fa-check"></i> Flag as Closed</a>
                        <a href="javascript:void(0)" class="btn btn-xs btn-danger"><i class="fa fa-flag"></i> Flag as Urgent</a>
                        <a href="javascript:void(0)" class="btn btn-xs btn-warning"><i class="fa fa-flag"></i> Flag as Invalid</a>
                        <hr>
                        <ul class="media-list media-feed push">
                            <li class="media">
                                <a href="page_ready_user_profile.html" class="pull-left">
                                    <img src="{{URL::asset('img/placeholders/avatars/avatar9.jpg')}}" alt="Avatar" class="img-circle">
                                </a>
                                <div class="media-body">
                                    <p class="push-bit">
                                                            <span class="text-muted pull-right">
                                                                <small>2 hours ago</small>
                                                            </span>
                                        <small><a href="page_ready_user_profile.html">Howard Smith</a> through <a href="javascript:void(0)">Forum</a></small>
                                    </p>
                                    <h4><strong>Can you help me with the installation?</strong></h4>
                                    <p>Hi, I'm having a problem with the installation of the theme, can you help me out? I get the following error message and I don't know what to do:</p>
                                    <div class="alert alert-warning">
                                        <p><i class="fa fa-angle-right"></i> <strong>Error Establishing Database Connection</strong></p>
                                        <p>...</p>
                                    </div>
                                    <p>
                                        <a href="javascript:void(0)" class="btn btn-xs btn-default"><i class="fa fa-support"></i> Ask for Assistance</a>
                                        <a href="javascript:void(0)" class="btn btn-xs btn-default"><i class="fa fa-user"></i> Assign this ticket</a>
                                    </p>
                                </div>
                            </li>


                            <li class="media">
                                <a href="page_ready_user_profile.html" class="pull-left">
                                    <img src="{{URL::asset('img/placeholders/avatars/avatar.jpg')}}" alt="Avatar" class="img-circle">
                                </a>
                                <div class="media-body">
                                    <p class="push-bit">
                                                            <span class="text-muted pull-right">
                                                                <small>1 hour ago</small>
                                                            </span>
                                        <small><a href="page_ready_user_profile.html">Support</a></small>
                                    </p>
                                    <p>Hi Howard and thank you very much for your purchase! There are many reasons this can happen. One is the incorrect information in wp-config.html file. Please open up wp-config.html and ensure that the following are correct:</p>
                                    <ul class="fa-ul push">
                                        <li><i class="fa fa-li fa-check text-success"></i> Database name</li>
                                        <li><i class="fa fa-li fa-check text-success"></i> Database username</li>
                                        <li><i class="fa fa-li fa-check text-success"></i> Database password</li>
                                        <li><i class="fa fa-li fa-check text-success"></i> Database host</li>
                                    </ul>
                                    <p>Learn more about <a href="javascript:void(0)">editing the wp-config.html</a></p>
                                </div>
                            </li>
                            <li class="media">
                                <a href="page_ready_user_profile.html" class="pull-left">
                                    <img src="{{URL::asset('img/placeholders/avatars/avatar9.jpg')}}" alt="Avatar" class="img-circle">
                                </a>
                                <div class="media-body">
                                    <p class="push-bit">
                                                            <span class="text-muted pull-right">
                                                                <small>30 min ago</small>
                                                            </span>
                                        <small><a href="page_ready_user_profile.html">Howard Smith</a></small>
                                    </p>
                                    <p>I'm going to check it out and let you know!</p>
                                    <p>Thanks a lot!</p>
                                </div>
                            </li>
                            <li class="media">
                                <a href="page_ready_user_profile.html" class="pull-left">
                                    <img src="{{URL::asset('img/placeholders/avatars/avatar.jpg')}}" alt="Avatar" class="img-circle">
                                </a>
                                <div class="media-body">
                                    <form action="page_ready_tickets.html#tickets-single" method="post">
                                        <textarea id="tickets-reply" name="tickets-reply" class="form-control" rows="5" placeholder="Enter your reply"></textarea>
                                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-reply"></i> Post Reply</button>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- END Coverage -->

                    <!-- Begin Sales -->
                    <div class="tab-pane" id="sales">
                        sales
                        <div class="alert alert-success animation-fadeInQuick">Current Status: <strong>OPEN</strong></div>
                        <a href="javascript:void(0)" class="btn btn-xs btn-default pull-right"><i class="fa fa-check"></i> Flag as Closed</a>
                        <a href="javascript:void(0)" class="btn btn-xs btn-danger"><i class="fa fa-flag"></i> Flag as Urgent</a>
                        <a href="javascript:void(0)" class="btn btn-xs btn-warning"><i class="fa fa-flag"></i> Flag as Invalid</a>
                        <hr>
                        <ul class="media-list media-feed push">
                            <li class="media">
                                <a href="page_ready_user_profile.html" class="pull-left">
                                    <img src="{{URL::asset('img/placeholders/avatars/avatar9.jpg')}}" alt="Avatar" class="img-circle">
                                </a>
                                <div class="media-body">
                                    <p class="push-bit">
                                                            <span class="text-muted pull-right">
                                                                <small>2 hours ago</small>
                                                            </span>
                                        <small><a href="page_ready_user_profile.html">Howard Smith</a> through <a href="javascript:void(0)">Forum</a></small>
                                    </p>
                                    <h4><strong>Can you help me with the installation?</strong></h4>
                                    <p>Hi, I'm having a problem with the installation of the theme, can you help me out? I get the following error message and I don't know what to do:</p>
                                    <div class="alert alert-warning">
                                        <p><i class="fa fa-angle-right"></i> <strong>Error Establishing Database Connection</strong></p>
                                        <p>...</p>
                                    </div>
                                    <p>
                                        <a href="javascript:void(0)" class="btn btn-xs btn-default"><i class="fa fa-support"></i> Ask for Assistance</a>
                                        <a href="javascript:void(0)" class="btn btn-xs btn-default"><i class="fa fa-user"></i> Assign this ticket</a>
                                    </p>
                                </div>
                            </li>


                            <li class="media">
                                <a href="page_ready_user_profile.html" class="pull-left">
                                    <img src="{{URL::asset('img/placeholders/avatars/avatar.jpg')}}" alt="Avatar" class="img-circle">
                                </a>
                                <div class="media-body">
                                    <p class="push-bit">
                                                            <span class="text-muted pull-right">
                                                                <small>1 hour ago</small>
                                                            </span>
                                        <small><a href="page_ready_user_profile.html">Support</a></small>
                                    </p>
                                    <p>Hi Howard and thank you very much for your purchase! There are many reasons this can happen. One is the incorrect information in wp-config.html file. Please open up wp-config.html and ensure that the following are correct:</p>
                                    <ul class="fa-ul push">
                                        <li><i class="fa fa-li fa-check text-success"></i> Database name</li>
                                        <li><i class="fa fa-li fa-check text-success"></i> Database username</li>
                                        <li><i class="fa fa-li fa-check text-success"></i> Database password</li>
                                        <li><i class="fa fa-li fa-check text-success"></i> Database host</li>
                                    </ul>
                                    <p>Learn more about <a href="javascript:void(0)">editing the wp-config.html</a></p>
                                </div>
                            </li>
                            <li class="media">
                                <a href="page_ready_user_profile.html" class="pull-left">
                                    <img src="{{URL::asset('img/placeholders/avatars/avatar9.jpg')}}" alt="Avatar" class="img-circle">
                                </a>
                                <div class="media-body">
                                    <p class="push-bit">
                                                            <span class="text-muted pull-right">
                                                                <small>30 min ago</small>
                                                            </span>
                                        <small><a href="page_ready_user_profile.html">Howard Smith</a></small>
                                    </p>
                                    <p>I'm going to check it out and let you know!</p>
                                    <p>Thanks a lot!</p>
                                </div>
                            </li>
                            <li class="media">
                                <a href="page_ready_user_profile.html" class="pull-left">
                                    <img src="{{URL::asset('img/placeholders/avatars/avatar.jpg')}}" alt="Avatar" class="img-circle">
                                </a>
                                <div class="media-body">
                                    <form action="page_ready_tickets.html#tickets-single" method="post">
                                        <textarea id="tickets-reply" name="tickets-reply" class="form-control" rows="5" placeholder="Enter your reply"></textarea>
                                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-reply"></i> Post Reply</button>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- END Sales -->

                    <!-- Begin History -->
                    <div class="tab-pane" id="history">
                        history
                        <div class="alert alert-success animation-fadeInQuick">Current Status: <strong>OPEN</strong></div>
                        <a href="javascript:void(0)" class="btn btn-xs btn-default pull-right"><i class="fa fa-check"></i> Flag as Closed</a>
                        <a href="javascript:void(0)" class="btn btn-xs btn-danger"><i class="fa fa-flag"></i> Flag as Urgent</a>
                        <a href="javascript:void(0)" class="btn btn-xs btn-warning"><i class="fa fa-flag"></i> Flag as Invalid</a>
                        <hr>
                        <ul class="media-list media-feed push">
                            <li class="media">
                                <a href="page_ready_user_profile.html" class="pull-left">
                                    <img src="{{URL::asset('img/placeholders/avatars/avatar9.jpg')}}" alt="Avatar" class="img-circle">
                                </a>
                                <div class="media-body">
                                    <p class="push-bit">
                                                            <span class="text-muted pull-right">
                                                                <small>2 hours ago</small>
                                                            </span>
                                        <small><a href="page_ready_user_profile.html">Howard Smith</a> through <a href="javascript:void(0)">Forum</a></small>
                                    </p>
                                    <h4><strong>Can you help me with the installation?</strong></h4>
                                    <p>Hi, I'm having a problem with the installation of the theme, can you help me out? I get the following error message and I don't know what to do:</p>
                                    <div class="alert alert-warning">
                                        <p><i class="fa fa-angle-right"></i> <strong>Error Establishing Database Connection</strong></p>
                                        <p>...</p>
                                    </div>
                                    <p>
                                        <a href="javascript:void(0)" class="btn btn-xs btn-default"><i class="fa fa-support"></i> Ask for Assistance</a>
                                        <a href="javascript:void(0)" class="btn btn-xs btn-default"><i class="fa fa-user"></i> Assign this ticket</a>
                                    </p>
                                </div>
                            </li>


                            <li class="media">
                                <a href="page_ready_user_profile.html" class="pull-left">
                                    <img src="{{URL::asset('img/placeholders/avatars/avatar.jpg')}}" alt="Avatar" class="img-circle">
                                </a>
                                <div class="media-body">
                                    <p class="push-bit">
                                                            <span class="text-muted pull-right">
                                                                <small>1 hour ago</small>
                                                            </span>
                                        <small><a href="page_ready_user_profile.html">Support</a></small>
                                    </p>
                                    <p>Hi Howard and thank you very much for your purchase! There are many reasons this can happen. One is the incorrect information in wp-config.html file. Please open up wp-config.html and ensure that the following are correct:</p>
                                    <ul class="fa-ul push">
                                        <li><i class="fa fa-li fa-check text-success"></i> Database name</li>
                                        <li><i class="fa fa-li fa-check text-success"></i> Database username</li>
                                        <li><i class="fa fa-li fa-check text-success"></i> Database password</li>
                                        <li><i class="fa fa-li fa-check text-success"></i> Database host</li>
                                    </ul>
                                    <p>Learn more about <a href="javascript:void(0)">editing the wp-config.html</a></p>
                                </div>
                            </li>
                            <li class="media">
                                <a href="page_ready_user_profile.html" class="pull-left">
                                    <img src="{{URL::asset('img/placeholders/avatars/avatar9.jpg')}}" alt="Avatar" class="img-circle">
                                </a>
                                <div class="media-body">
                                    <p class="push-bit">
                                                            <span class="text-muted pull-right">
                                                                <small>30 min ago</small>
                                                            </span>
                                        <small><a href="page_ready_user_profile.html">Howard Smith</a></small>
                                    </p>
                                    <p>I'm going to check it out and let you know!</p>
                                    <p>Thanks a lot!</p>
                                </div>
                            </li>
                            <li class="media">
                                <a href="page_ready_user_profile.html" class="pull-left">
                                    <img src="{{URL::asset('img/placeholders/avatars/avatar.jpg')}}" alt="Avatar" class="img-circle">
                                </a>
                                <div class="media-body">
                                    <form action="page_ready_tickets.html#tickets-single" method="post">
                                        <textarea id="tickets-reply" name="tickets-reply" class="form-control" rows="5" placeholder="Enter your reply"></textarea>
                                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-reply"></i> Post Reply</button>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- END Product -->
                </div>
                <!-- END Tabs Content -->
            </div>
        </div>
    </div>
    <!-- END Line Content -->
@endsection

@section('custom_footer_scripts')
    <script>$('#line').addClass('active');</script>
    <script src="js/pages/tablesDatatables.js"></script>
    <script>$(function(){ TablesDatatables.init(); });</script>
@endsection