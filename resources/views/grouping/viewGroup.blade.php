@extends('masterpages.master_rpc')
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
            <h2>Edit group</h2>
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

            &nbsp;&nbsp;&nbsp;&nbsp;



                &nbsp;&nbsp;&nbsp;&nbsp;


                <div id="maincontainer">

                    <div id="contentwrapper">

                        <div id="maincolumn">

                            <h3><b>Group ID :</b> {{$groupId}}</h3>
                            <div style="float: left; margin-left: 836px;margin-top: 0">
                                {!! Form::open(array('url'=>'groupDelete','method'=>'POST',
                                'class'=>'wizard-big', 'id'=>'groupDeleteform', 'enctype'=>'multipart/form-data' )) !!}
                                <fieldset>
                                    <button type="button"
                                            class="btn btn-danger" rel="tooltip" title="DELETE group"
                                            onclick="deleteGroup()"><span class="glyphicon glyphicon-trash"></span></button>
                                    <input id="groupID" type="hidden" name="groupID" value="{{$groupId}}">
                                </fieldset>
                                {!! Form::close() !!}

                            </div>
                            @if($group->status == "Open")
                            <div style="/*float: left;*/ margin-left: 200px;margin-top: -35px">
                                {!! Form::open(array('url'=>'updateStatus','method'=>'POST',
                                'class'=>'wizard-big', 'id'=>'updateStatusform', 'enctype'=>'multipart/form-data' )) !!}
                                <fieldset>
                                    <button type="button"
                                            class="btn btn-warning" rel="tooltip" title="Close group"
                                            onclick="updateStatus()"><span class="glyphicon glyphicon-check"></span></button>
                                    <input id="groupID" type="hidden" name="groupID" value="{{$groupId}}">
                                </fieldset>
                                {!! Form::close() !!}

                            </div>
                            @endif
                            <h5><b>Group status :</b> {{$group->status}}</h5>
                            @if($project!=NULL)
                                <h5><b>Project Title :</b> {{ $project->title }}</h5>
                                <h5><b>Project Status :</b> {{ $project->status }}</h5>
                                <h5><b>Supervisor :</b> {{$supervisor->name}}</h5>
                            @endif

                            <table class="table table-hover no-margins">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Registration ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Course Field</th>
                                    <th>Role</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr style="color:#DC143C">
                                    <td><img alt="image" class="img-circle" src="{{ URL::to('/img/avatars/' . $groupLeader->avatar) }}" height="70px" width="70px"/></td>
                                    <td>{{ $groupLeader->regId }}</td>
                                    <td>{{ $groupLeader->name }}</td>
                                    <td>{{ $groupLeader->email }}</td>
                                    <td>{{ $groupLeader->phone }}</td>
                                    <td>{{ $groupLeader->courseField }}</td>
                                    <td>{{ $groupLeader->role }}</td>
                                    <td></td>
                                </tr>
                            @foreach( $groupMembers as $grp )


                                <tr>
                                    <td><img alt="image" class="img-circle" src="{{ URL::to('/img/avatars/' . $grp->avatar) }}" height="70px" width="70px"/></td>
                                    <td>{{ $grp->regId }}</td>
                                    <td>{{ $grp->name }}</td>
                                    <td>{{ $grp->email }}</td>
                                    <td>{{ $grp->phone }}</td>
                                    <td>{{ $grp->courseField }}</td>
                                    <td>{{ $grp->role }}</td>

                                    <td>
                                        <form action="{{ url('task/'.$grp->email) }}" method="POST" >
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" id="delete-member-{{ $grp->email }}" rel="tooltip" title="Remove Member"class="btn btn-warning" >
                                                <span class="glyphicon glyphicon-remove"></span></button>
                                        </form>
                                    </td>
                                </tr>

                                @endforeach
                                </tbody>
                                </table>

                        </div>

                        <div>


                        </div>

                </div>


                <br/>
                <br/>
            </div>
            <div style="margin-left: 60px; margin-top: 0;">
                <h2>Available student pool:</h2><br>
                {!! Form::open(array('url'=>'addToGroup','method'=>'POST',
                'class'=>'wizard-big', 'id'=>'inviteform', 'enctype'=>'multipart/form-data' )) !!}
                <fieldset>
                    <div style="float: left">
                    @foreach ($students as $key=>$stu)
                        <label>
                            <input class="single-checkbox" type="checkbox" id="student_names[]"
                                   name="student_names[]" value= "{{$stu->regId}}" onClick="addToList(this,'txt1');" />
                            <span>{{$stu->name}} - <i>{{$stu->email}}</i> - <i>{{$stu->regId}}</i> -<i>{{$stu->courseField}}</i></span>

                        </label><br/>
                    @endforeach
                        </div>
                    <div style="margin-top: 0px;">
                        <textarea  name="txt1" id="txt1" style="width:370px;height:200px;font-size:20px; resize: none;" rows="3" readonly> </textarea>
                    </div>
                    <input id="groupID" type="hidden" name="groupID" value="{{$groupId}}">
                    <div style="margin-top: 0;">
                        <button class="btn btn-primary" id="invteBtn" type="button"
                                onclick="inviteMembers()" >Add</button>
                        <button class="btn btn-warning" id="rstBtn" type="reset" >Reset</button>
                    </div>
                </fieldset>
                {!! Form::close() !!}
            </div>
        </div>


    </div>

    @endsection


    <link rel="stylesheet" type="text/css" href="http://skfox.com/jqExamples/jq14_jqui172_find_bug/jq132/css/ui-lightness/jquery-ui-1.7.2.custom.css" />
    <script language="JavaScript" type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
    <script language="JavaScript" type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>

    <script>

        $(document).ready(function(){
            $("[rel=tooltip]").tooltip({ placement: left});
        });



        /*function for resetting*/
        function deleteGroup() {

            swal({
                        title: "Are you sure?",
                        text: "Do You want delete this group ??",
                        type: "warning", showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes!",
                        closeOnConfirm: false
                    },

                    function (isConfirm) {

                        if (isConfirm) {

                            swal("Success!", "Group is deleted.", "success");
                            document.getElementById("groupDeleteform").submit();

                        }/*
                         else {
                         swal("Cancelled", "Your selections are safe :)", "error");
                         };*/


                    }
            )


        }

        /*function for resetting*/
        function updateStatus()
        {

            swal({
                        title: "Are you sure?",
                        text: "Do you want to CLOSE the group ??",
                        type: "warning", showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes!",
                        closeOnConfirm: false
                    },

                    function (isConfirm) {

                        if (isConfirm) {

                            swal("Success!", "Group's status is updated into 'Closed'.", "success");
                            document.getElementById("updateStatusform").submit();

                        }


                    }
            )


        }

        /*adding names to text area*/
        function addToList(checkObj, outputObjID)
        {


            var count = 0;
            var checkGroup = checkObj.form[checkObj.name];
            var checkGroupLen = checkGroup.length;
            var valueList = new Array();
            for (var i=0; i<checkGroupLen; i++)
            {
                if (checkGroup[i].checked)
                {
                    valueList[valueList.length] = checkGroup[i].value;
                }
            }
            document.getElementById(outputObjID).value = valueList.join('\r\n');


            var isTxtAreaFilled = $.trim( $('#txt1').val() );
            if(isTxtAreaFilled) {

                document.getElementById("invteBtn").disabled = false;
                document.getElementById("rstBtn").disabled = false;

            }else{

                document.getElementById("invteBtn").disabled = true;
                document.getElementById("rstBtn").disabled = true;
            }

            return;

        }

        function inviteMembers() {

            swal({
                        title: "Are you sure?",
                        text: "Do you want to add these selected candidates ??",
                        type: "warning", showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes, add them!",
                        closeOnConfirm: false},

                    function (isConfirm) {

                        if (isConfirm)
                        {
                            var atLeastOneIsChecked = $('input[name="student_names[]"]:checked').length > 0;

                            if(atLeastOneIsChecked == false){

                                swal("Failed", "Select members to invite.", "error");

                            }

                            else
                            {
                                document.getElementById("invteBtn").disabled = true;
                                document.getElementById("rstBtn").disabled = true;


                                document.getElementById("inviteform").submit();
                            }
                        }
                        else
                        {
                            swal("Failed", "Sending invitations was failed, try again.", "error");
                        };

                    }
            )
        }


    </script>
