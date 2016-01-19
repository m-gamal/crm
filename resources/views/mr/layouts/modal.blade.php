<!-- Begin Delete Level Modal -->
@foreach($levels as $singleLevel)
    <div class="modal fade" id="level_{{$singleLevel->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                {!!
                Form::open([
                'route' => ['doDeleteLevel', $singleLevel->id],
                'role' => 'form',
                'method' => 'post',
                ])
                !!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><i><strong>Confirm the deletion</strong></i> </h4>
                </div>
                <div class="modal-body">
                    <h4 class="modal-title" id="myModalLabel">Are sure to delete <strong>{{$singleLevel->title}}</strong> ? </h4>
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
<!-- End Delete Level Modal -->