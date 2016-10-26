@extends('masterpages.master_student')

@section('cssLinks')
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8">

<link href="{{ asset('public_assets/css/animate.css') }}" rel="stylesheet">
<link href="{{ asset('public_assets/css/bootstrap-formhelpers.css') }}" rel="stylesheet">
<link href="{{ asset('public_assets/css/bootstrap-formhelpers.min.css') }}" rel="stylesheet">

@endsection

@section('title')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Update Defect</h2>
        <ol class="breadcrumb">

        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
@endsection

@section('content')

@if (Session::has('message_error'))
<div class="alert alert-danger" role="alert" id="divAlert" style="font-size: 14px">
    {{ Session::get('message_error') }}
</div>
@elseif(Session::has('message_success'))
<div class="alert alert-success" role="alert" id="divAlert" style="font-size: 14px">
    <span class="glyphicon glyphicon-envelope"></span> {{Session::get('message_success') }}
</div>
@endif



<div class="row" style="padding-left: 14px">
    <div class="col-lg-6">
        <form id="form1" name="form1" method="post" action="" >


            <div class="form-group">
                <input name="entertask" class="form-control" placeholder="Enter Defect" type="text" required>
            </div>

            <div class="form-group">
                <textarea name="desc" class="form-control" rows="3" placeholder="Enter description" required></textarea>
            </div>

            <div class="form-group">
                <input name="plantof" class="form-control" placeholder="Plan to finish" required>
            </div>

            <div class="form-group">
                <label>Defect State</label>
                <div class="radio">
                    <label>
                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" >Not Start
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Start
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">Finish
                    </label>
                </div>

                <div class="form-group">
                    <input name="start" class="form-control" placeholder="Start Date" >
                </div>

                <div class="form-group">
                    <input name="end" class="form-control" placeholder="End Date" >
                </div>

                <div class="form-group">
                    <input name="spenthours" class="form-control" placeholder="Spent Hours" >
                </div>

            </div>

            <div class="summernote"></div>

            <div class="form-group">
                <div class="col-md-4">
                    <button onclick="added()" name="addNotice" id="adda"class="btn btn-w-m btn-primary">Submit</button>
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

                </div>
            </div>
            <input type="reset" name="Submit2" value="Reset" class="btn btn-w-m btn-primary">

        </form>
    </div>
</div>


@endsection


@section('ValidationJavaScript')
<script src="//cdn.ckeditor.com/4.5.4/standard/ckeditor.js"></script>
<script>
    $(document).ready(function () {
        $('.summernote').ckeditor();
    });
</script>



@endsection