<h2>
    from {{$date_from}}
</h2>

<h2>
    to {{$date_to}}
</h2>
<div class="table-responsive">
    <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
        <thead>
        <tr>
            <th class="text-center">Date</th>
            <th class="text-center">Doctor</th>
            <th class="text-center">Follow Up</th>
            <th class="text-center">Feedback</th>
            <th class="text-center">Double Visits</th>
            <th class="text-center">Total Product Sold Price</th>
        </tr>
        </thead>
        <tbody>
        @if(count($searchResult) > 0)
            @foreach($searchResult as $singleReport)
                <tr>
                    <td class="text-center">{{$singleReport->date}}</td>
                    <td class="text-center">{{$singleReport->doctor->name}}</td>
                    <td class="text-center">{{$singleReport->follow_up}}</td>
                    <td class="text-center">{{$singleReport->feedback}}</td>
                    <td class="text-center">{{!empty($singleReport->double_visit_manager_id) ? $singleReport->double_visit_manager_id : 'N/A'}}</td>
                    <td class="text-center">{{$singleReport->total_sold_products_price}}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
</div>