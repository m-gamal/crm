<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
</head>

<table class="example-datatable table table-vcenter table-condensed table-bordered">
    <thead>
    <tr>
        <th class="text-center">Name</th>
        <th class="text-center">Class</th>
        <th class="text-center">Specialty</th>
        <th class="text-center">Email</th>
        <th class="text-center">Clinic Tel.</th>
        <th class="text-center">Medical Rep.</th>
        <th class="text-center">Status</th>
    </tr>
    </thead>
    <tbody>
    @if(count($customers) > 0)
        @foreach($customers as $singleCustomer)
            <tr>
                <td class="text-center" style="font-family: DejaVu Sans, sans-serif;">
                    {{$singleCustomer->name}}
                </td>
                <td class="text-center">{{$singleCustomer->class}}</td>
                <td class="text-center">{{$singleCustomer->specialty}}</td>
                <td class="text-center">{{$singleCustomer->email}}</td>
                <td class="text-center">{{$singleCustomer->clinic_tel}}</td>
                <td class="text-center" style="font-family: DejaVu Sans, sans-serif;">{{$singleCustomer->mr->name}}</td>
                <td class="text-center"><p class="label {{$singleCustomer->active == "Active" ? 'label-success' : 'label-danger'}}">{{$singleCustomer->active}}</p></td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>