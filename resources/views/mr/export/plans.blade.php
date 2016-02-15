<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
@foreach($plans as $singlePlan)
    <div class="table-responsive">
        <table class="table table-vcenter table-condensed table-bordered">
            <tbody>
            <tr>
                <td>{{$singlePlan->date}}</td>
            </tr>
            <tr>
                <td>{{$singlePlan->comment}}</td>
            </tr>
            @foreach((array)json_decode($singlePlan->doctors) as $singleDoctor)
                <tr>
                    <td>{{\App\Customer::findOrFail($singleDoctor)->name}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endforeach
</body>
</html>