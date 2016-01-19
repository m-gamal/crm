@extends('mr.layouts.master')
@section('title')
    Add New Report
@endsection

@section('content')
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{URL::route('/')}}">Dashboard</a></li>
        <li><a href="{{URL::route('addReport')}}">Add New Report</a></li>
    </ul>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <!-- Basic Form Elements Block -->
            <div class="block">
                <!-- Basic Form Elements Title -->
                <div class="block-title">
                    <h2><strong>Add New </strong> Report</h2>
                </div>
                <!-- END Form Elements Title -->

                <!-- Basic Form Elements Content -->

                {!!
                Form::open([
                'route' 	=> 	'doAddReport',
                'role' 		=> 	'form',
                'method' 	=> 	'post',
                'class'		=>	'form-horizontal form-bordered',
                'files'     =>  true
                ])
                !!}

                    @if(Session::has('message'))
                        <div class="form-group">
                            <div class="alert alert-success alert-dismissable">
                                <i class="fa fa-check"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <b> Success : </b> {{ Session::get('message') }}
                            </div>
                        </div>
                    @endif
                    <div class="form-group">
                        <label class="col-md-2 control-label">Year</label>
                        <div class="col-md-10">
                            <input type="text" name="year" id="year" class="form-control" value="{{date('Y')}}" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Month</label>
                        <div class="col-md-10">
                            <input type="text" name="month" id="month" class="form-control" value="{{date('M')}}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Date</label>
                        <div class="col-md-10">
                            <input type="text" id="date" name="date" class="form-control input-datepicker"
                                   data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" readonly>
                        </div>
                        @if($errors->has('date'))
                            <div class="alert alert-danger">
                                <i class="fa fa-warning"></i>
                                <strong>Error :</strong> {{$errors->first('date')}}
                            </div>
                        @endif
                    </div>

                    @if ($doctorId == '')
                    <div class="form-group">
                        <label class="col-md-2 control-label">Description Name</label>
                        <div class="col-md-10">
                            <select name="description_name" id="description_name" class="form-control select-chosen">
                                <option value="">Select Description Name</option>
                                @foreach($description_names as $singleDescriptionName)
                                    <option value="{{$singleDescriptionName->description_name}}">
                                        {{$singleDescriptionName->description_name}}
                                    </option>
                                @endforeach
                            </select>
                            @if($errors->has('description_name'))
                                <div class="alert alert-danger">
                                    <i class="fa fa-warning"></i>
                                    <strong>Error :</strong> {{$errors->first('description_name')}}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Doctor</label>
                        <div class="col-md-10">
                            <select name="doctor" id="doctors_list" class="form-control select-chosen">
                            </select>
                            @if($errors->has('doctor'))
                                <div class="alert alert-danger">
                                    <i class="fa fa-warning"></i>
                                    <strong>Error :</strong> {{$errors->first('doctor')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    @else
                    <div class="form-group">
                        <label class="col-md-2 control-label">Doctor</label>
                        <div class="col-md-10">
                            <select name="doctor" id="doctors_list" class="form-control select-chosen">
                                <option value="">Select Doctor</option>
                                @foreach($doctors as $singleDoctor)
                                    <option value="{{$singleDoctor->id}}"
                                    @if($singleDoctor->id == $doctorId) selected="selected" @endif>{{$singleDoctor->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('doctor'))
                                <div class="alert alert-danger">
                                    <i class="fa fa-warning"></i>
                                    <strong>Error :</strong> {{$errors->first('doctor')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    @endif

                    <div class="form-group">
                        <label class="col-md-2 control-label">Promoted Products</label>
                        <div class="col-md-10">
                            <select name="promoted_products[]" class="form-control select-chosen" multiple>
                                @foreach($products as $singleProduct)
                                    <option value="{{$singleProduct->id}}">{{$singleProduct->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('promoted_products'))
                                <div class="alert alert-danger">
                                    <i class="fa fa-warning"></i>
                                    <strong>Error :</strong> {{$errors->first('promoted_products')}}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Samples Products</label>
                        <div class="col-md-10">
                            <select name="samples_products[]" class="form-control select-chosen" multiple>
                                @foreach($products as $singleProduct)
                                    <option value="{{$singleProduct->id}}">{{$singleProduct->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('samples_products'))
                                <div class="alert alert-danger">
                                    <i class="fa fa-warning"></i>
                                    <strong>Error :</strong> {{$errors->first('samples_products')}}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Gifts</label>
                        <div class="col-md-10">
                            <select name="gifts[]" class="form-control select-chosen" multiple>
                                @foreach($gifts as $singleGift)
                                    <option value="{{$singleGift->id}}">{{$singleGift->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('gifts'))
                                <div class="alert alert-danger">
                                    <i class="fa fa-warning"></i>
                                    <strong>Error :</strong> {{$errors->first('gifts')}}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group" id="sold_product_form">
                        <label class="col-md-2 control-label">Sold Products</label>
                        <div class="col-md-7">
                            <select name="sold_product" id="sold_product" class="form-control select-chosen">
                                <option value="">Select Product</option>
                                @foreach($products as $singleProduct)
                                    <option value="{{$singleProduct->id}}">{{$singleProduct->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('sold_product'))
                                <div class="alert alert-danger">
                                    <i class="fa fa-warning"></i>
                                    <strong>Error :</strong> {{$errors->first('sold_product')}}
                                </div>
                            @endif
                        </div>

                        <div class="col-md-3">
                            <input type="text" id="quantity" name="quantity" class="form-control" placeholder="Quantity">
                            @if($errors->has('quantity'))
                                <div class="alert alert-danger">
                                    <i class="fa fa-warning"></i>
                                    <strong>Error :</strong> {{$errors->first('quantity')}}
                                </div>
                            @endif
                        </div>

                        <div class="col-md-offset-2 col-md-10">
                            <a id="new_sold_product" class="control-label" href="#">
                                <i class="fa fa-plus"></i>
                                Add another sold product
                            </a>
                        </div>
                    </div>

                    {{--<div class="form-group">--}}
                        {{--<label class="col-md-2 control-label">Total Sold Products Price</label>--}}
                        {{--<div class="col-md-10">--}}
                            {{--<input type="text" id="total_sold_products_price" class="form-control" value="" disabled>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    <div class="form-group">
                        <label class="col-md-2 control-label">Feedback</label>
                        <div class="col-md-10">
                            <textarea name="feedback" rows="5" class="form-control"></textarea>
                            @if($errors->has('feedback'))
                                <div class="alert alert-danger">
                                    <i class="fa fa-warning"></i>
                                    <strong>Error :</strong> {{$errors->first('feedback')}}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Follow Up</label>
                        <div class="col-md-10">
                            <textarea name="follow_up" rows="5" class="form-control"></textarea>
                            @if($errors->has('follow_up'))
                                <div class="alert alert-danger">
                                    <i class="fa fa-warning"></i>
                                    <strong>Error :</strong> {{$errors->first('follow_up')}}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Double Visit with</label>
                        <div class="col-md-10">
                            <select name="manager" class="form-control select-chosen">
                                <option value="">Select Manager</option>
                                <option value="manager_1">Manager 1</option>
                                <option value="manager_2">Manager 2</option>
                                <option value="manager_3">Manager 3</option>
                            </select>
                            @if($errors->has('manager'))
                                <div class="alert alert-danger">
                                    <i class="fa fa-warning"></i>
                                    <strong>Error :</strong> {{$errors->first('manager')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group form-actions">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Submit</button>
                            <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>
                        </div>
                    </div>
                    <!-- END Select Components Content -->
                {!! Form::close() !!}
                <!-- END Basic Form Elements Content -->
            </div>
            <!-- END Basic Form Elements Block -->
        </div>
    </div>

    <!-- Hidden Section -->
    <div id="new_sold_product_form" style="display: none;">
        <label class="col-md-2 control-label">Sold Product</label>
        <div class="col-md-7">
            <select  name="extra_sold_products[]" class="extra_sold_products form-control">
                <option value="">Select Product</option>
                @foreach($products as $singleProduct)
                    <option value="{{$singleProduct->id}}">{{$singleProduct->name}}</option>
                @endforeach
            </select>
            @if($errors->has('extra_sold_products'))
                <div class="alert alert-danger">
                    <i class="fa fa-warning"></i>
                    <strong>Error :</strong> {{$errors->first('extra_sold_products')}}
                </div>
            @endif
        </div>

        <div class="col-md-3">
            <input type="text" name="extra_quantity[]" class="extra_quantity form-control" placeholder="Quantity">
            @if($errors->has('extra_quantity'))
                <div class="alert alert-danger">
                    <i class="fa fa-warning"></i>
                    <strong>Error :</strong> {{$errors->first('extra_quantity')}}
                </div>
            @endif
        </div>
    </div>
@endsection

@section('custom_footer_scripts')
    <script>$('#report').addClass('active');</script>
    <script>
        var price;
        var quantity ;
        var total_price;

        var extra_price ;
        var extra_quantity;


        var total = 0; 

        $('#sold_product').change(function () {
            $.ajax({
                url: "/mr/ajax-product-price/",
                method : 'GET',
                data:   { id: $(this).val() },
                success: function (response) {
                    price = response;
                },
                error: function (msg) {
                    console.log(msg.responseText);
                }
            });
        });

        $("#quantity").keyup(function(){
            if ($(this).val() != null) {
                quantity = $(this).val ();

                total_price = quantity *price;

                $('#total_sold_products_price').val(total_price);
            }
        });

        $('#new_sold_product').click(function(event){
        $("#sold_product_form").append($("#new_sold_product_form").html());
        $('#sold_product').trigger('chosen:updated');
        $('.extra_sold_products').change(function () {
            $.ajax({
                url: "/mr/ajax-product-price/",
                method : 'GET',
                data:   { id: $(this).val() },
                success: function (response) {
                    extra_price = response;
                },
                error: function (msg) {
                    console.log(msg.responseText);
                }
            });
        });

        $(".extra_quantity").keyup(function(){
            if ($(this).val() != null) {
                extra_quantity = $(this).val();

                if (total != null) {
                    total = total + extra_quantity * extra_price;
                } else {
                    total = extra_quantity * extra_price;
                }
                $('#total_sold_products_price').val(total);
            }
        });
        total = total + total_price;
        event.preventDefault();
        });
    </script>

    <script src="{{URL::asset('js/mr/add_report.js')}}"></script>
    <script>
    $('#date').datepicker('setDate', new Date());
    </script>
@endsection