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
            <h2>Update Task</h2>
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
        <div class="col-lg-8">
            <form id="form1" name="form1" method="post" action="/tupdate/{{ $task[0]->id }}" >


                <div class="form-group">
                    <input name="entertask" class="form-control" value="{{ $task[0]->task }}" type="text" required>
                </div>

                <div class="form-group">
                    <textarea name="desc" class="form-control" rows="3">{{ $task[0]->description }}</textarea>
                </div>

                <div class="form-group">
                    <input name="plantof" class="form-control" value="{{ $task[0]->plantofinish }}" required>
                </div>

                <div class="form-group">
                    <label>Task State</label>
                    <div class="radio" >

                        @if($task[0]->state == "Start")

                            <div class="form-group">
                                <label>
                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="Not Start" >Not Start
                                </label>
                            </div>
                            <div class="form-group">
                                <label>
                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="Start" checked>Start
                                </label>
                            </div>
                            <div class="form-group">
                                <label>
                                    <input type="radio" name="optionsRadios" id="optionsRadios3" value="Finish" >Finish
                                </label>
                            </div>

                        @elseif($task[0]->state == "Not Start")

                            <div class="form-group">
                                <label>
                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="Not Start" checked>Not Start
                                </label>
                            </div>
                            <div class="form-group">
                                <label>
                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="Start">Start
                                </label>
                            </div>
                            <div class="form-group">
                                <label>
                                    <input type="radio" name="optionsRadios" id="optionsRadios3" value="Finish" >Finish
                                </label>
                            </div>

                        @elseif($task[0]->state == "Finish")

                            <div class="form-group">
                                <label>
                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="Not Start" >Not Start
                                </label>
                            </div>
                            <div class="form-group">
                                <label>
                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="Start" >Start
                                </label>
                            </div>
                            <div class="form-group">
                                <label>
                                    <input type="radio" name="optionsRadios" id="optionsRadios3" value="Finish" checked>Finish
                                </label>
                            </div>

                        @endif

                    </div>

                </div>


                <div class="form-group" id="start_date">
                    <input name="start" class="form-control" value="{{ $task[0]->sdate }}" >
                </div>

                <div class="form-group" id="end_date">
                    <input name="end" class="form-control" value="{{ $task[0]->edate }}" >
                </div>

                <div class="form-group" id="spent_hours">
                    <input name="spenthours" class="form-control" value="{{ $task[0]->hours }}" >
                </div>



                <div class="summernote"></div>

                <div class="form-group">
                    
					<div class="col-md-8" style="padding-left:100px;">
                        <button onclick="updateTask('{{ $task[0]->id }}')" name="addNotice" id="adda"class="btn btn-w-m btn-primary">Update</button>
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

                    </div>
                
                <input type="reset" name="Submit2" value="Reset" class="btn btn-w-m btn-primary">
			</div>
            </form>
        </div>
    </div>


@endsection


@section('ValidationJavaScript')
    <script src="//cdn.ckeditor.com/4.5.4/standard/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.summernote').ckeditor();
        });



        $("#optionsRadios1").change(function() {
            if(this.checked) {
                $("#start_date").children().prop('disabled',true);
                $("#end_date").children().prop('disabled',true);
                $("#spent_hours").children().prop('disabled',true);
            }
        });


        $("#optionsRadios2").change(function() {
            if(this.checked) {
                $("#start_date").children().prop('disabled',false);
                $("#end_date").children().prop('disabled',true);
                $("#spent_hours").children().prop('disabled',true);
            }
        });

        $("#optionsRadios3").change(function() {
            if(this.checked) {
                $("#start_date").children().prop('disabled',false);
                $("#end_date").children().prop('disabled',false);
                $("#spent_hours").children().prop('disabled',false);
            }
        });

    </script>

@endsection