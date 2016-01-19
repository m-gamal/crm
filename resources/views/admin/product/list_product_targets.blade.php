@extends('admin.layouts.master')
@section('title')
All Products Targets
@endsection

@section('content')
    <!-- Begin Breadcrumb -->
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{URL::route('/')}}">Dashboard</a></li>
        <li><a href="{{URL::route('adminListProductTarget')}}">All Products Target</a></li>
    </ul>
    <!-- END Breadcrumb -->

    <!-- Datatables Content -->
    <div class="block full">
        <div class="block-title">
            <h2>
                <strong>All</strong> Products Targets
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
            <table  class="example-datatable table table-vcenter table-condensed table-bordered">
                <thead>
                <tr>
                    <th class="text-center">Year</th>
                    <th class="text-center">Product</th>
                    <th class="text-center">Months Target</th>
                </tr>
                </thead>
                <tbody>
                @if($productTargets)
                @foreach($productTargets as $singleProductTarget)
                <tr>
                    <td class="text-center">
                        {{$singleProductTarget->year}}
                    </td>
                    <td class="text-center">
                        <a href="{{URL::route('adminListAreaTarget', $singleProductTarget->id)}}">
                            {{$singleProductTarget->product->name}}
                        </a>
                    </td>

                    <td class="text-center">
                        <a data-toggle="modal" data-target="#months_target_{{$singleProductTarget->id}}" class="btn btn-xs btn-info">
                            Months Target List
                        </a>
                    </td>
                </tr>
                @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>

    @if($productTargets)
    @foreach($productTargets as $singleProductTarget)
        <div class="modal fade" id="months_target_{{$singleProductTarget->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"><i><strong>Month Targets</strong></i> </h4>
                    </div>
                    <div class="modal-body">
                        <table id="products_target" class="table table-vcenter table-condensed table-bordered">
                            <thead>
                            <tr>
                                <th class="text-center">Month</th>
                                <th class="text-center">Target</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($singleProductTarget->months_target)
                                <tr>
                                    <td class="text-center">Jan</td>
                                    <td class="text-center">{{$singleProductTarget->months_target->jan}}</td>
                                </tr>

                                <tr>
                                    <td class="text-center">Feb</td>
                                    <td class="text-center">{{$singleProductTarget->months_target->feb}}</td>
                                </tr>

                                <tr>
                                    <td class="text-center">Mar</td>
                                    <td class="text-center">{{$singleProductTarget->months_target->mar}}</td>
                                </tr>

                                <tr>
                                    <td class="text-center">Apr</td>
                                    <td class="text-center">{{$singleProductTarget->months_target->apr}}</td>
                                </tr>

                                <tr>
                                    <td class="text-center">May</td>
                                    <td class="text-center">{{$singleProductTarget->months_target->may}}</td>
                                </tr>

                                <tr>
                                    <td class="text-center">Jun</td>
                                    <td class="text-center">{{$singleProductTarget->months_target->jun}}</td>
                                </tr>

                                <tr>
                                    <td class="text-center">Jul</td>
                                    <td class="text-center">{{$singleProductTarget->months_target->jul}}</td>
                                </tr>

                                <tr>
                                    <td class="text-center">Aug</td>
                                    <td class="text-center">{{$singleProductTarget->months_target->aug}}</td>
                                </tr>

                                <tr>
                                    <td class="text-center">Sep</td>
                                    <td class="text-center">{{$singleProductTarget->months_target->sep}}</td>
                                </tr>

                                <tr>
                                    <td class="text-center">Oct</td>
                                    <td class="text-center">{{$singleProductTarget->months_target->oct}}</td>
                                </tr>

                                <tr>
                                    <td class="text-center">Nov</td>
                                    <td class="text-center">{{$singleProductTarget->months_target->nov}}</td>
                                </tr>

                                <tr>
                                    <td class="text-center">Dec</td>
                                    <td class="text-center">{{$singleProductTarget->months_target->dec}}</td>
                                </tr>

                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    @endif
    <!-- END Datatables Content -->
@endsection

@section('custom_footer_scripts')
<script>$('#products_target').addClass('active');</script>
<script>

</script>
<script>$('#target').addClass('active');</script>
<script src="{{URL::asset('js/pages/tablesDatatables.js')}}"></script>
<script>$(function(){ TablesDatatables.init(); });</script>
@endsection