<h2>
    {{$emp}}
</h2>
<div class="table-responsive">
    <table id="plan-search-result" class="table table-vcenter table-condensed table-bordered">
        <thead>
        <tr>
            <th >Month</th>
            <th >Date</th>
            <th >Doctor</th>
        </tr>
        </thead>
        <tbody>
        @if(count($planSearchResult) > 0)
            @foreach($planSearchResult as $singlePlan)
                <tr>
                    <td >{{$singlePlan->month}}</td>
                    <td >{{$singlePlan->date}}</td>
                    <td >
                        @foreach((array)json_decode($singlePlan->doctors) as $singleDoctor)
                            <label class="label label-success">
                                {{\App\Customer::findOrFail($singleDoctor)->name}}
                            </label>
                        @endforeach
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
</div>