@foreach($doctors as $singleDoctor)
<div class="modal fade" id="bought_products_{{$singleDoctor->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><i><strong>Monthly Bought Products </strong></i> </h4>
            </div>
            <div class="modal-body">
                {{--                                                        {{print_r($MonthlyCustomerProducts[$singleDoctor->id])}}--}}
                <table class="table table-striped table-borderless table-vcenter">
                    <thead>
                    <tr>
                        <th class="text-center">Date</th>
                        <th class="text-center"> Products Bought </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($MonthlyCustomerProducts[$singleDoctor->id] as $key=>$singleDateProducts)
                        <tr>
                            <td class="text-center">{{$singleDateProducts['date']}}</td>
                            <td class="text-center">
                                {{$singleDateProducts['sold_products']}}
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endforeach