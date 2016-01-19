@extends('admin.layouts.master')
@section('title')
Territory Targets
@endsection

@section('content')
    <!-- Begin Breadcrumb -->
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{URL::route('/')}}">Dashboard</a></li>
        <li><a href="{{URL::route('adminListProductTarget')}}">Targets</a></li>
    </ul>
    <!-- END Breadcrumb -->

    <!-- Datatables Content -->
    <div class="block full">
        <div class="block-title">
            <h2>
                <strong>Territory</strong> Targets
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
                    <th class="text-center">Territory</th>
                    <th class="text-center">Percent</th>
                    <th class="text-center">Months Target</th>
                </tr>
                </thead>
                <tbody>
                @if($territoryTargets)
                @foreach($territoryTargets as $singleTerritoryTarget)
                <tr>
                    <td class="text-center">
                        {{$singleTerritoryTarget->territory->name}}
                    </td>
                    <td class="text-center">
                        {{$singleTerritoryTarget->percent}}
                    </td>

                    <td class="text-center">
                        <a data-toggle="modal" data-target="#months_target_{{$singleTerritoryTarget->id}}" class="btn btn-xs btn-info">
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

    @if($territoryTargets)
    @foreach($territoryTargets as $singleTerritoryTarget)
        <div class="modal fade" id="months_target_{{$singleTerritoryTarget->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                            @if($singleTerritoryTarget->months_target)
                                <tr>
                                    <td class="text-center">Jan</td>
                                    <td class="text-center">{{$singleTerritoryTarget->months_target->jan}}</td>
                                </tr>

                                <tr>
                                    <td class="text-center">Feb</td>
                                    <td class="text-center">{{$singleTerritoryTarget->months_target->feb}}</td>
                                </tr>

                                <tr>
                                    <td class="text-center">Mar</td>
                                    <td class="text-center">{{$singleTerritoryTarget->months_target->mar}}</td>
                                </tr>

                                <tr>
                                    <td class="text-center">Apr</td>
                                    <td class="text-center">{{$singleTerritoryTarget->months_target->apr}}</td>
                                </tr>

                                <tr>
                                    <td class="text-center">May</td>
                                    <td class="text-center">{{$singleTerritoryTarget->months_target->may}}</td>
                                </tr>

                                <tr>
                                    <td class="text-center">Jun</td>
                                    <td class="text-center">{{$singleTerritoryTarget->months_target->jun}}</td>
                                </tr>

                                <tr>
                                    <td class="text-center">Jul</td>
                                    <td class="text-center">{{$singleTerritoryTarget->months_target->jul}}</td>
                                </tr>

                                <tr>
                                    <td class="text-center">Aug</td>
                                    <td class="text-center">{{$singleTerritoryTarget->months_target->aug}}</td>
                                </tr>

                                <tr>
                                    <td class="text-center">Sep</td>
                                    <td class="text-center">{{$singleTerritoryTarget->months_target->sep}}</td>
                                </tr>

                                <tr>
                                    <td class="text-center">Oct</td>
                                    <td class="text-center">{{$singleTerritoryTarget->months_target->oct}}</td>
                                </tr>

                                <tr>
                                    <td class="text-center">Nov</td>
                                    <td class="text-center">{{$singleTerritoryTarget->months_target->nov}}</td>
                                </tr>

                                <tr>
                                    <td class="text-center">Dec</td>
                                    <td class="text-center">{{$singleTerritoryTarget->months_target->dec}}</td>
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