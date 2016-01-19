@extends('admin.layouts.master')
@section('title')
    Sales Search
@endsection

@section('content')
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{URL::route('/')}}">Dashboard</a></li>
        <li><a href="{{URL::route('adminDoSalesSearch')}}">Sales Search</a></li>
    </ul>

    <!-- Datatables Content -->
    <div class="block full">
        <div class="block-title">
            <div class="block-options pull-right">
                <a href="{{URL::route('adminExportSalesSearch', 'xlsx')}}">
                    <img src="{{URL::asset('img/excel.png')}}" alt="">
                </a>
                |
                <a href="{{URL::route('adminExportSalesSearch', 'pdf')}}">
                    <img src="{{URL::asset('img/pdf.png')}}" alt="">
                </a>
            </div>

            <h2>
                <strong>Sales</strong> Search Result
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
                    <th class="text-center">Product</th>
                    <th class="text-center">Sold Quantity</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($productSales as $product =>$sold_quantity)
                    <tr>
                        <td class="text-center">{{$product}}</td>
                        <td class="text-center">{{$sold_quantity}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- END Datatables Content -->
@endsection

@section('custom_footer_scripts')
    <script>$('#sales_search').addClass('active');</script>
    <script src="{{URL::asset('js/pages/tablesDatatables.js')}}"></script>
    <script>$(function(){ TablesDatatables.init(); });</script>
@endsection