@extends('mr.layouts.master')
@section('title')
All Plans
@endsection

@section('content')
    <!-- Begin Breadcrumb -->
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{URL::route('/')}}">Dashboard</a></li>
        <li><a href="{{URL::route('plans')}}">All Plans</a></li>
    </ul>
    <!-- END Breadcrumb -->

    <div class="row">
        <!-- Input Grid Block -->
        <div class="block">
            <!-- Input Grid Title -->
            <div class="block-title">
                <h2>
                    Planned Visits
                    <a href="{{URL::route('addPlan')}}" class="label label-success" title="Add New Plan">+</a>
                </h2>

            </div>
            <!-- END Input Grid Title -->

            <!-- Input Grid Content -->
            <div class="block block-alt-noborder full">
                <div class="row">
                    <div class="col-md-12">
                        <!-- FullCalendar (initialized in js/pages/compCalendar.js), for more info and examples you can check out http://arshaw.com/fullcalendar/ -->
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
            <!-- END Input Grid Content -->
        </div>
        <!-- END Input Grid Block -->
    </div>
@endsection

@section('custom_footer_scripts')
<script>$('#plan').addClass('active');</script>
<script src="{{URL::asset('js/pages/compCalendar.js')}}"></script>
<script>$(function(){ CompCalendar.init(); });</script>
<script>
    // global app configuration object
    var config = {
        routes: [
            { plan: "{{URL::route('ajaxPlans') }}"}
        ]
    };
</script>
<script src="{{URL::asset('js/mr/plan.js')}}"></script>
@endsection