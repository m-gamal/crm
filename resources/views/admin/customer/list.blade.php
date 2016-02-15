@extends('admin.layouts.master')
@section('title')
All Customers
@endsection

@section('content')
    <!-- Begin Breadcrumb -->
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{URL::route('/')}}">Dashboard</a></li>
        <li><a href="{{URL::route('customers')}}">All Customers</a></li>
    </ul>
    <!-- END Breadcrumb -->

    <!-- Datatables Content -->
    <div class="block full">
        <div class="block-title">
            <div class="block-options pull-right">
                <a href="{{URL::route('adminExportCustomerSearch', 'xlsx')}}">
                    <img src="{{URL::asset('img/excel.png')}}" alt="">
                </a>
                |
                <a href="{{URL::route('adminExportCustomerSearch', 'pdf')}}">
                    <img src="{{URL::asset('img/pdf.png')}}" alt="">
                </a>
            </div>
            <h2>
                <strong>All</strong> Customers
                <a href="{{URL::route('addCustomer')}}" class="label label-success" title="Add New Customers">+</a>
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
            <table class="example-datatable table table-vcenter table-condensed table-bordered">
                <thead>
                <tr>
                    <th class="text-center">Name</th>
                    <th class="text-center">Class</th>
                    <th class="text-center">Specialty</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Clinic Tel.</th>
                    <th class="text-center">Medical Rep.</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                @if(count($customers) > 0)
                @foreach($customers as $singleCustomer)
                <tr>
                    <td class="text-center">
                        <a href="{{URL::route('adminSingleDoctor', $singleCustomer->id)}}">
                            {{$singleCustomer->name}}
                        </a>
                    </td>
                    <td class="text-center">{{$singleCustomer->class}}</td>
                    <td class="text-center">{{$singleCustomer->specialty}}</td>
                    <td class="text-center">{{$singleCustomer->email}}</td>
                    <td class="text-center">{{$singleCustomer->clinic_tel}}</td>
                    <td class="text-center">{{$singleCustomer->mr->name}}</td>
                    <td class="text-center"><p class="label {{$singleCustomer->active == "Active" ? 'label-success' : 'label-danger'}}">{{$singleCustomer->active}}</p></td>
                    <td class="text-center">
                        <div class="btn-group">
                            <a href="{{URL::route('editCustomer', $singleCustomer->id)}}" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a>
                            <a data-toggle="modal" data-target="#customer_{{$singleCustomer->id}}" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                        </div>
                    </td>
                </tr>

                <div class="modal fade" id="customer_{{$singleCustomer->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            {!!
                            Form::open([
                            'route' => ['doDeleteCustomer', $singleCustomer->id],
                            'role' => 'form',
                            'method' => 'post',
                            ])
                            !!}
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel"><i><strong>Confirm the deletion</strong></i> </h4>
                            </div>
                            <div class="modal-body">
                                <h4 class="modal-title" id="myModalLabel">Are sure to delete <strong>{{$singleCustomer->name}}</strong> ? </h4>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary" data-dismiss="modal">No</button>
                                <button type="submit" class="btn btn-danger">Yes</button>
                            </div>
                            {!!Form::close()!!}
                        </div>
                    </div>
                </div>
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