@if(count($productsTarget) > 0)
@foreach($productsTarget as $singleProductTarget)
<div class="modal fade" id="months_target_{{$singleProductTarget->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><i><strong>Months Target</strong></i> </h4>
            </div>
            <div class="modal-body">
                <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                    <thead>
                    <tr>
                        <th class="text-center">Month</th>
                        <th class="text-center">Target</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($singleProductTarget->months_target as $month=>$target)
                    <tr>
                        <td class="text-center">
                            {{$month}}
                        </td>
                        <td class="text-center">
                            {{$target}}
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="target_{{$singleProductTarget->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {!!
            Form::open([
            'route' =>  array('doDeleteProductsTarget', $singleProductTarget->id),
            'role' => 'form',
            'method' => 'post',
            ])
            !!}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><i><strong>Confirm the deletion</strong></i> </h4>
            </div>
            <div class="modal-body">
                <h4 class="modal-title" id="myModalLabel">Are sure to delete this target ? </h4>
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