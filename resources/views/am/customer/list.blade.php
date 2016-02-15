@extends('am.layouts.master')
@section('title')
All Customers
@endsection

@section('content')
    <!-- Begin Breadcrumb -->
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{URL::route('/')}}">Dashboard</a></li>
        <li><a href="{{URL::route('amCustomers')}}">All Customers</a></li>
    </ul>
    <!-- END Breadcrumb -->

    <!-- Datatables Content -->
    <div class="block full">
        <div class="block-title">
            <div class="block-options pull-right">
                <a href="{{URL::route('amExportCustomerSearch', 'xlsx')}}">
                    <img src="{{URL::asset('img/excel.png')}}" alt="">
                </a>
                |
                <a href="{{URL::route('amExportCustomerSearch', 'pdf')}}">
                    <img src="{{URL::asset('img/pdf.png')}}" alt="">
                </a>
            </div>
            <h2>
                <strong>All</strong> Customers
            </h2>

        </div>

        @if(Session::has('message'))
            <div class="alert alert-success alert-dismissable">
                <i class="fa fa-check"></i>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <b> Success : </b> {{ Session::get('message') }}
            </div>
        @endif

        <div class="table-responsive">
            <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                <thead>
                <tr>
                    <th class="text-center">Name</th>
                    <th class="text-center">Class</th>
                    <th class="text-center">Specialty</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Clinic Tel.</th>
                    <th class="text-center">Medical Rep.</th>
                    <th class="text-center">Status</th>
                </tr>
                </thead>
                <tbody>
                @if(count($customers) > 0)
                @foreach($customers as $singleCustomer)
                <tr>
                    <td class="text-center">
                        <a href="{{URL::route('amSingleDoctor', $singleCustomer->id)}}">
                            {{$singleCustomer->name}}
                        </a>
                    </td>
                    <td class="text-center">{{$singleCustomer->class}}</td>
                    <td class="text-center">{{$singleCustomer->specialty}}</td>
                    <td class="text-center">{{$singleCustomer->email}}</td>
                    <td class="text-center">{{$singleCustomer->clinic_tel}}</td>
                    <td class="text-center">{{$singleCustomer->mr->name}}</td>
                    <td class="text-center"><p class="label {{$singleCustomer->active == "Active" ? 'label-success' : 'label-danger'}}">{{$singleCustomer->active}}</p></td>
                </tr>
                @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
    <!-- END Datatables Content -->

@endsection

@section('custom_footer_scripts')
<script>$('#customer').addClass('active');</script>
<script src="{{URL::asset('js/pages/tablesDatatables.js')}}"></script>
<script>$(function(){ TablesDatatables.init(); });</script>
@endsection