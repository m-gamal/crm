<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />    
</head>

<table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
    <thead>
        <tr class="text-center">
            <th>Date</th>
            <td class="text-center">{{$singleReport->date}}</td>
        </tr>
        <tr class="text-center">
            <th>Doctor</th>
            <td class="text-center"  style="font-family: DejaVu Sans, sans-serif;" >{{$singleReport->doctor->name}}</td>
        </tr>
        <tr class="text-center">
            <th>Promoted Products</th>
            @if($singleReport->promotedProducts)
                @foreach($singleReport->promotedProducts as $singleProduct)
                    <td class="label label-info" style="font-family: DejaVu Sans, sans-serif;">
                        {{$singleProduct->product->name}}
                    </td>
                @endforeach
            @endif
        </tr>
        <tr class="text-center">
            <th>Sample Products</th>
            @if($singleReport->sampleProducts)
                @foreach($singleReport->sampleProducts as $singleProduct)
                    <td class="label label-info" style="font-family: DejaVu Sans, sans-serif;">
                        {{$singleProduct->product->name}}
                    </td>
                @endforeach
            @endif
        </tr>
        <tr class="text-center">
            <th>Sold Products</th>
            @if($singleReport->soldProducts)
                @foreach($singleReport->soldProducts as $singleProduct)
                    <td class="label label-info" style="font-family: DejaVu Sans, sans-serif;">
                        {{$singleProduct->product->name}} [{{$singleProduct->quantity}} Units]
                    </td>
                @endforeach
            @endif
        </tr>
        <tr class="text-center">
            <th>Gifts</th>
            @if($singleReport->gift)
                @foreach($singleReport->gift as $singleGift)
                    <td class="label label-info" style="font-family: DejaVu Sans, sans-serif;">
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
            <td class="text-center" style="font-family: DejaVu Sans, sans-serif;">{{$singleReport->feedback}}</td>
        </tr>
        <tr class="text-center">
            <th>Follow Up</th>
            <td class="text-center" style="font-family: DejaVu Sans, sans-serif;">{{$singleReport->follow_up}}</td>
        </tr>
        <tr class="text-center">
            <th>Double Visit</th>
            <td class="text-center" style="font-family: DejaVu Sans, sans-serif;">
                {!! !is_null($singleReport->double_visit_manager_id) ? \App\Employee::findOrFail($singleReport->double_visit_manager_id)->name : "<i>N/A</i>" !!}
            </td>
        </tr>
    </thead>
</table>