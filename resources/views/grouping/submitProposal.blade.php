@extends('masterpages.master_student')
@section('css_links')


    <link href="{{asset('public_assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <!-- Toastr style -->
    <link href="{{asset('public_assets/css/plugins/toastr/toastr.min.css')}}" rel="stylesheet">

    <!-- Gritter -->
    <link href="{{asset('public_assets/js/plugins/gritter/jquery.gritter.css')}}" rel="stylesheet">


    <link href="{{ asset('public_assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public_assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('public_assets/css/plugins/iCheck/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('public_assets/css/plugins/steps/jquery.steps.css') }}" rel="stylesheet">
    <link href="{{ asset('public_assets/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('public_assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('public_assets/css/animate.css')}}" rel="stylesheet">
    <link href="{{ asset('public_assets/css/plugins/summernote/summernote.css')}}" rel="stylesheet">
    <link href="{{ asset('public_assets/css/plugins/summernote/summernote-bs3.css')}}" rel="stylesheet">

@endsection
@section('title')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Submit Project Charter</h2>
            <ol class="breadcrumb">

            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>

@endsection


@section('content')



    @if(Session::has('flash_message'))
        <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
    @endif



    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">



            {!! Form::open(array('url'=>'grpSubmit','method'=>'POST',
            'class'=>'wizard-big', 'id'=>'grpSubmitform', 'enctype'=>'multipart/form-data' )) !!}
            <fieldset>
                <br>
                <h1>Supervisor</h1>

                    <h2>Supervisor Type</h2>
                    <div class="row">
                        <div class="col-lg-6">

                            <div class="form-group">
                                <label class="col-lg-2 control-label">Type</label>
                                <div class="col-md-6">
                                    <div class="radio"><label> <input type="radio" value="none" name="supervisortype" id="radioSupervisorNone" checked="checked" onclick="displayInternalSupervisor(1)">None</label></div>
                                    <div class="radio"><label> <input type="radio" value="internal" name="supervisortype" id="radioSupervisorInternal" onclick="displayInternalSupervisor(2)" >Internal</label></div>
                                    <div class="radio"><label> <input type="radio" value="external" name="supervisortype" id="radioSupervisorExternal" onclick="displayInternalSupervisor(3)" >External Client</label></div>
                                </div>
                            </div>

                            <div class="form-group" id="divInternalSupervisor" >
                                <div class="col-md-6">
                                    <label>Internal Supervisors</label>
                                    <select id="selectInternalSupervisors" class="form-control" name="internalsupervisor">
                                        @foreach($supervisors as $supervisor)
                                            <option value="{{$supervisor->id}}">{{ $supervisor->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>


                <h1>External Client</h1>

                    <h2>External Client Information (Optional)</h2>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" id="supervisorName" name="supervisorName" value="{{ old('supervisorName') }}" placeholder="Client Name" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Attached Organization</label>
                                <input type="text" id="supervisorInstitute" name="supervisorInstitute" value="{{ old('supervisorInstitute') }}" placeholder="Attached Organization" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Designation</label>
                                <input type="text" id="supervisorDesignation" name="supervisorDesignation" value="{{ old('supervisorDesignation') }}" placeholder="Designation" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Address</label>
                                <input type="textarea" id="supervisorAddress" name="supervisorAddress" value="{{ old('supervisorAddress') }}" placeholder="Address of Client" class="form-control">
                            </div>
                        </div>


                        <div class="col-lg-6">
                            <div class="form-group" id="telDiv">
                                <label>Telephone Number</label>
                                <input type="text" id="supervisorTelephone" name="supervisorTelephone" value="{{ old('supervisorTelephone') }}" onkeypress='validateSupTel(event)' placeholder="Client Telephone Number" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Fax Number</label>
                                <input type="text" id="supervisorFax" name="supervisorFax" value="{{ old('supervisorFax') }}" onkeypress='validateSupFax(event)' placeholder="Client Fax Number" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" id="supervisorEmail" name="supervisorEmail" value="{{ old('supervisorEmail') }}" placeholder="Client Email" class="form-control">
                            </div>
                        </div>
                    </div>


                <h1>Project</h1>

                    <h2>Project Details</h2>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Project Title</label>
                            <input type="text" id="projectTitle" name="projectTitle" placeholder="Project Title" class="form-control required">
                        </div>

                        <div class="form-group">
                            <label>Upload Project Charter</label>
                            <input id="txtFile" name="txtFile" id="txtFile" type="file" class="form-control required"/>

                        </div>
                        <label>Enter a short description of your project here</label>
                <textarea id="projectDescription" name="projectDescription" rows="4" cols="50" value="{{ old('projectDescription') }}" class="form-control required"  >
                </textarea>

                        <div class="form-group">
                            <input id="acceptTerms" name="acceptTerms" value="{{ old('acceptTerms') }}" type="checkbox" class="required"
                                   onclick="checkSubmit(this,'submitProposalbt')"> <label for="acceptTerms">I agree with the</label><a> Terms and Conditions.</a>
                        </div>
                        <div>
                            <input id="groupID" type="hidden" name="groupID" value="{{$groupId}}">
                            <button class="btn btn-warning" id="rstBtn" type="reset" >Reset</button>
                            <button type="button"
                                    name="submitProposalbt" id="submitProposalbt"
                                    class="btn btn-primary" rel="tooltip" title="Submit the Charter Document"
                                    onclick="submitProposal()" disabled>Submit</button>
                        </div>
                    </div>



            </fieldset>
            {!! Form::close() !!}


            <br/>
            <br/>


    </div>

    </div>

@endsection

    <link rel="stylesheet" type="text/css" href="http://skfox.com/jqExamples/jq14_jqui172_find_bug/jq132/css/ui-lightness/jquery-ui-1.7.2.custom.css" />
    <script language="JavaScript" type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
    <script language="JavaScript" type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>





@section('ValidationJavaScript')

        <!-- bootbox code -->
    <script src="{{ asset('public_assets/css/style.css') }}"></script>
    <script src="{{ asset('js/plugins/iCheck/icheck.min.js') }}"></script>

        <script type="text/javascript">
            function checkSubmit(ele, id) {
                x = document.getElementById(id);
                if (ele.checked == true) x.disabled = false;
                else x.disabled = true;
            }
        </script>

        <script>
        $(document).ready(function(){
            $("[rel=tooltip]").tooltip({ placement: left});
        });

        $(document).ready(function () {

            displayInternalSupervisor(1);

            $("#wizard").steps();
            $("#form").steps({
                bodyTag: "fieldset",
                onStepChanging: function (event, currentIndex, newIndex)
                {
                    // Always allow going backward even if the current step contains invalid fields!
                    if (currentIndex > newIndex)
                    {
                        return true;
                    }

                    var form = $(this);

                    // Clean up if user went backward before
                    if (currentIndex < newIndex)
                    {
                        // To remove error styles
                        $(".body:eq(" + newIndex + ") label.error", form).remove();
                        $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                    }

                    // Disable validation on fields that are disabled or hidden.
                    form.validate().settings.ignore = ":disabled,:hidden";

                    // Start validation; Prevent going forward if false
                    return form.valid();
                },
                onStepChanged: function (event, currentIndex, priorIndex)
                {
                    // Suppress (skip) "Warning" step if the user is old enough.
                    if (currentIndex === 2 && Number($("#age").val()) >= 18)
                    {
                        $(this).steps("next");
                    }

                    // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
                    if (currentIndex === 2 && priorIndex === 3)
                    {
                        $(this).steps("previous");
                    }
                },
                onFinishing: function (event, currentIndex)
                {
                    var form = $(this);

                    // Disable validation on fields that are disabled.
                    // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                    form.validate().settings.ignore = ":disabled";

                    // Start validation; Prevent form submission if false
                    return form.valid();
                },
                onFinished: function (event, currentIndex)
                {
                    var form = $(this);
                    form.submit();
                    // Submit form input

//                    //alert(form.serialize());
//
//                    var userName =document.getElementById('username').value;
//                    var password =document.getElementById('password').value;
//                    var fullName =document.getElementById('fullname').value;
//                    var email =document.getElementById('email').value;
//                    var role =document.getElementById('role').value;
//                    var designation =document.getElementById('designation').value;
//
//                    //var freeSlotID = $(this).find("#freeslotid").text();
//
//
//                    var postData = {
//                        'username' : userName,
//                        'email' : email,
//                        'password' : password,
//                        'designation' : designation,
//                        'role' : role,
//                        'fullname' : fullName
//                    };
//
//                    $.ajax({
//                        type: "GET",
//                        url: "/addUserNewAccount",
//                        data: postData,
//                        //assign the var here
//                        success: function(data){
////alert("heee")
//                            swal("Added!", "Your "+data+"'th Free Slot has been deleted from database.", "success");
//                            document.location.reload();
//
//                        },
//                        error : function(data){
//                            alert( "error "+data);
//                        },
//                        complete : function($result){
//                            // alert( "Completed "+$result);
//                        }


//                    });

                }
            }).validate({
                errorPlacement: function (error, element)
                {
                    element.before(error);
                },
                rules: {
                    confirm: {
                        equalTo: "#password"
                    }
                }
            });
        });
    </script>

    <script>
        function phonenumber(inputtxt)
        {
            var phoneno = /^\d{10}$/;
            if (inputtxt.value.match(phoneno))
            {
                return true;
            }
            else
            {
                alert("Not a valid Phone Number");
                return false;
            }
        }
    </script>


    <script>





        function displayInternalSupervisor(option) {
            if (option == 1 || option == 3) {
                document.getElementById('divInternalSupervisor').style.display = 'none';
            }

            else if (option == 2) {
                document.getElementById('divInternalSupervisor').style.display = 'block';
            }
        }
    </script>

    <script src="{{asset('public_assets/js/plugins/sweetalert/sweetalert.min.js')}}"></script>



    <script>

        function validate(evt) {

            var theEvent = evt || window.event;
            var key = theEvent.keyCode || theEvent.which;
            key = String.fromCharCode(key);
            var regex = /[0-9]|\./;
            if (!regex.test(key)) {
                theEvent.returnValue = false;

                if (theEvent.preventDefault) {
                    //   $('#telDiv').addClass('has-error');
                    theEvent.preventDefault();
                }
            } else {
                //  $('#telDiv').removeClass().addClass('form-group has-success');
            }

            $("#telephone").attr('maxlength', '10');

        }


        function validateSupTel(evt) {

            var theEvent = evt || window.event;
            var key = theEvent.keyCode || theEvent.which;
            key = String.fromCharCode(key);
            var regex = /[0-9]|\./;
            if (!regex.test(key)) {
                theEvent.returnValue = false;

                if (theEvent.preventDefault) {
                    // $('#sTelDiv').addClass('has-error');
                    theEvent.preventDefault();
                }
            } else {
                // $('#sTelDiv').removeClass().addClass('form-group has-success');
            }

            $("#supervisorTelephone").attr('maxlength', '10');

        }

        function validateSupFax(evt) {

            var theEvent = evt || window.event;
            var key = theEvent.keyCode || theEvent.which;
            key = String.fromCharCode(key);
            var regex = /[0-9]|\./;
            if (!regex.test(key)) {
                theEvent.returnValue = false;

                if (theEvent.preventDefault) {
                    // $('#sTelDiv').addClass('has-error');
                    theEvent.preventDefault();
                }
            } else {
                // $('#sTelDiv').removeClass().addClass('form-group has-success');
            }

            $("#supervisorFax").attr('maxlength', '10');

        }
    </script>
@endsection
<script>
    /*function for submitting*/
    function submitProposal() {

        swal({
                    title: "Are you sure?",
                    text: "Do You want to submit the project details ??",
                    type: "warning", showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes!",
                    closeOnConfirm: false
                },

                function (isConfirm) {

                    if (isConfirm) {

                        //swal("Success!", "Project detail is submitted.", "success");
                        document.getElementById("grpSubmitform").submit();

                    }/*
                     else {
                     swal("Cancelled", "Your selections are safe :)", "error");
                     };*/


                }
        )


    }
    </script>