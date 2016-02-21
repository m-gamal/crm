
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />    
</head>


<body>
@foreach($plans as $singlePlan)
    <div class="table-responsive">
        <table class="table table-vcenter table-condensed table-bordered">
            <tbody>
            <tr>
                <td  style="font-family: DejaVu Sans, sans-serif;">{{$singlePlan->date}}</td>
            </tr>
            <tr>
                <td  style="font-family: DejaVu Sans, sans-serif;">
                <h2>{{$singlePlan->comment}}</h2>
                </td>
            </tr>
            @foreach((array)json_decode($singlePlan->doctors) as $singleDoctor)
                <tr>
                    <td style="font-family: DejaVu Sans, sans-serif;">{{\App\Customer::findOrFail($singleDoctor)->name}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endforeach
</body>
</html>