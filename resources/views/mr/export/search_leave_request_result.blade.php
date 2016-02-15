<div class="table-responsive">
    <table id="leave-request-search-result" class="table table-vcenter table-condensed table-bordered">
        <thead>
        <tr>
            <th >Month</th>
            <th >Leave Request Date</th>
            <th >Leave Request From</th>
            <th >Leave Request To</th>
            <th >Reason</th>
        </tr>
        </thead>
        <tbody>
        @if(count($leaveRequestSearchResult) > 0)
            @foreach($leaveRequestSearchResult as $singleLeaveRequest)
                <tr>
                    <td>{{$singleLeaveRequest->month}}</td>
                    <td >{{$singleLeaveRequest->date}}</td>
                    <td >{{$singleLeaveRequest->leave_start}}</td>
                    <td >{{$singleLeaveRequest->leave_end}}</td>
                    <td >{{$singleLeaveRequest->reason}}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
</div>