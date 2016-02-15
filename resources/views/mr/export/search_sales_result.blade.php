<h2>
    from {{$date_from}} to {{$date_to}}
</h2>

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
