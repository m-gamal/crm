<table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
    <thead>
        <tr class="text-center">
            <th>Emp</th>
            <td class="text-center">{{$singleReport->emp->name}}</td>
        </tr>

        <tr class="text-center">
            <th>Date</th>
            <td class="text-center">{{$singleReport->date}}</td>
        </tr>
        <tr class="text-center">
            <th>Doctor</th>
            <td class="text-center">{{$singleReport->doctor->name}}</td>
        </tr>
        <tr class="text-center">
            <th>Promoted Products</th>
            @if($singleReport->promotedProducts)
                @foreach($singleReport->promotedProducts as $singleProduct)
                    <td class="label label-info">
                        {{$singleProduct->product->name}}
                    </td>
                @endforeach
            @endif
        </tr>
        <tr class="text-center">
            <th>Sample Products</th>
            @if($singleReport->sampleProducts)
                @foreach($singleReport->sampleProducts as $singleProduct)
                    <td class="label label-info">
                        {{$singleProduct->product->name}}
                    </td>
                @endforeach
            @endif
        </tr>
        <tr class="text-center">
            <th>Sold Products</th>
            @if($singleReport->soldProducts)
                @foreach($singleReport->soldProducts as $singleProduct)
                    <td class="label label-info">
                        {{$singleProduct->product->name}} [{{$singleProduct->quantity}} Units]
                    </td>
                @endforeach
            @endif
        </tr>
        <tr class="text-center">
            <th>Gifts</th>
            @if($singleReport->gift)
                @foreach($singleReport->gift as $singleGift)
                    <td class="label label-info">
                        {{$singleGift->gift->name}}
                    </td>
                @endforeach
            @endif
        </tr>
        <tr class="text-center">
            <th>Total Sold Products Price</th>
            <td class="text-center">{{$singleReport->total_sold_products_price}}</td>
        </tr>
        <tr class="text-center">
            <th>Feedback</th>
            <td class="text-center">{{$singleReport->feedback}}</td>
        </tr>
        <tr class="text-center">
            <th>Follow Up</th>
            <td class="text-center">{{$singleReport->follow_up}}</td>
        </tr>
        <tr class="text-center">
            <th>Double Visit</th>
            <td class="text-center">
                {!! $singleReport->double_visit_manger_id != NULL ? $singleReport->double_visit_manger_id : "<i>N/A</i>" !!}
            </td>
        </tr>
    </thead>
</table>