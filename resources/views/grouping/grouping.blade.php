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
            <h2>Form group</h2>
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

            {{--<button class="btn btn-primary" id="invteBtn" type="button" rel="tooltip" title="Invite Members"
                    onclick="inviteMembers()" disabled><span class="glyphicon glyphicon-envelope"></span>Invite</button>
            <button class="btn btn-warning" id="rstBtn" rel="tooltip" title="Reset" type="reset" disabled><span class="glyphicon glyphicon-refresh"></span>Reset</button>--}}


            {{--<div id="maincontainer">--}}

                {{--<div id="contentwrapper">--}}
                    {{--<div id="maincolumn">--}}
                        {{--<div class="text" style="float: left">--}}
                            {{--<hr/>--}}


                            {{--@foreach ($students as $key=>$stu)--}}
                                {{--<label>--}}
                                    {{--<input class="single-checkbox" type="checkbox" id="student_names[]"--}}
                                           {{--name="student_names[]" value= "{{$stu->regId}}" onClick="addToList(this,'txt1');" />--}}
                                    {{--<span><b>{{$stu->name}}</b> - <i>{{$stu->email}}</i> - <i>{{$stu->regId}}</i></span>--}}

                                {{--</label><br/>--}}
                            {{--@endforeach--}}

                            {{--<br clear="both" />--}}

                            {{--<label id="invitations" style="display: none;" value="{{$invCount}}">{{$invCount}}</label>--}}

                            {{--<label id="members" style="display: none;" value="{{$memberCount}}">{{$memberCount}}</label>--}}

                        {{--</div>--}}
                    {{--</div>  <div class="col-lg-10" style="float: right">--}}
                        {{--<textarea  name="txt1" id="txt1" style="width:370px;height:200px;font-size:20px; margin: -255px 21px -26px 453px; resize: none;" rows="3" readonly> </textarea>--}}

                    {{--</div>--}}

                {{--</div>--}}

            {{--</div>--}}
            {{--</fieldset>--}}


            {!! Form::open(array('url'=>'invite','method'=>'POST',
            'class'=>'wizard-big', 'id'=>'inviteform', 'enctype'=>'multipart/form-data' )) !!}
            <fieldset>
                <br>
                <img alt="image" class="img-circle" src="img/leaderImage.png" height="70px" width="70px"/>

                <b>Group Leader : </b> {{$leaderName}}

                &nbsp;&nbsp;&nbsp;&nbsp;

                <button class="btn btn-primary" id="invteBtn" type="button"
                        onclick="inviteMembers()" disabled>Invite All</button>
                <button class="btn btn-warning" id="rstBtn" type="reset" disabled>Reset</button>

                <div id="maincontainer">
                    <font color="red">*You can send requests up-to 5 members only</font>
                    <div id="contentwrapper">
                        <div id="maincolumn">
                            <div class="text" style="float: left">
                                <hr/>
                                <label id="invitations" style="display: none;" value="{{$invCount}}">{{$invCount}}</label>

                                <label id="members" style="display: none;" value="{{$memberCount}}">{{$memberCount}}</label>

                                @if($invCount<5)

                                @foreach ($students as $key=>$stu)
                                    <label>
                                        <input class="single-checkbox" type="checkbox" id="student_names[]"
                                               name="student_names[]" value= "{{$stu->regId}}" onClick="addToList(this,'txt1');" />
                                        <span><b>{{$stu->name}}</b> - <i>{{$stu->email}}</i> - <i>{{$stu->regId}}</i></span>

                                    </label><br/>
                                @endforeach

                                @endif
                                <br clear="both" />



                            </div>
                        </div>  <div class="col-lg-10" style="float: right">
                            <textarea  name="txt1" id="txt1" style="width:370px;height:200px;font-size:20px; margin: -255px 21px -26px 453px; resize: none;" rows="3" readonly> </textarea>

                        </div>

                    </div>

                </div>
            </fieldset>
            {!! Form::close() !!}
            <br/>
            <br/>

            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="table-responsive">
                    <h2>Sent Requests:</h2>
                    <table id="invitatin_table" class="table table-hover ">
                        <thead>
                        <tr>
                            <th>Member Name</th>
                            <th>Member Mail</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach ($invitations as $inv)

                            <tr>
                                <td class="text-primary" style="display: none;">{{ $inv->id }}</td>
                                <td>{{ $inv->name }}</td>
                                <td>{{ $inv->email }}</td>
                                <?php
                                $status_colors = array('Pending' => '#ff6c00', 'Rejected' => '#f44336', 'Accepted' => '#1ab394');
                                ?>
                                <td style="color:<?php echo $status_colors[$inv->status];?> ">{{ $inv->status }}</td>
                                <td style="display: none;">{{ $inv->notification_id }}</td>
                                @if($inv->status  == "Pending")
                                    <td>

                                        {!! Form::open(array('url'=>'deleteMemberRequest','method'=>'POST',
                                                                        'class'=>'wizard-big', 'id'=>'cancelRequestform', 'enctype'=>'multipart/form-data' )) !!}
                                        <fieldset>
                                            <button type="button"
                                                    class="btn btn-sm btn-warning" rel="tooltip" title="Cancel Request"
                                                    onclick="cancelRequest()"><span class="glyphicon glyphicon-ban-circle"></span></button>
                                            <input id="deleteRequest" type="hidden" name="deleteRequest" value="{{$inv->notification_id}}">
                                        </fieldset>
                                        {!! Form::close() !!}

                                    </td>
                                @endif
                                @if($inv->status  == "Accepted")
                                    <td>
                                        {!! Form::open(array('url'=>'deleteMember','method'=>'POST',
                                                                        'class'=>'wizard-big', 'id'=>'deleteMemberform', 'enctype'=>'multipart/form-data' )) !!}
                                        <fieldset>
                                            <button type="button"
                                                    class="btn btn-sm btn-primary" rel="tooltip" title="Remove Member"
                                                    onclick="removeMember()"><span class="glyphicon glyphicon-remove"></span></button>
                                            <input id="deleteMember" type="hidden" name="deleteMember" value="{{$inv->notification_id}}">
                                        </fieldset>
                                        {!! Form::close() !!}
                                    </td>
                                @endif
                                @if($inv->status  == "Rejected")
                                    <td>
                                    {!! Form::open(array('url'=>'deleteMemberRequest','method'=>'POST',
                                            'class'=>'wizard-big', 'id'=>'deleteRejectedform', 'enctype'=>'multipart/form-data' )) !!}
                                    <fieldset>
                                    <button type="button"
                                    class="btn btn-sm btn-danger" rel="tooltip" title="Delete Request"
                                    onclick="deleteRejected()"><span class="glyphicon glyphicon-trash"></span></button>
                                    <input id="deleteRequest" type="hidden" name="deleteRequest" value="{{$inv->notification_id}}">
                                        </fieldset>
                                        {!! Form::close() !!}
                                    </td>
                                    @endif

                            </tr>
                        @endforeach

            </tbody>
            </table>
        </div>

    </div>


    </div>

    </div>



    <link rel="stylesheet" type="text/css" href="http://skfox.com/jqExamples/jq14_jqui172_find_bug/jq132/css/ui-lightness/jquery-ui-1.7.2.custom.css" />
    <script language="JavaScript" type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
    <script language="JavaScript" type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>

    <script>

        $(document).ready(function(){
            $("[rel=tooltip]").tooltip({ placement: left});
        });

        /*function for resetting*/
        function clearMembers() {
            var atLeastOneIsChecked = $('input[name="student_names[]"]:checked').length > 0;
            if (atLeastOneIsChecked == true) {
                swal({
                            title: "Are you sure?",
                            text: "Do You want to clear all selected candidates ??",
                            type: "warning", showCancelButton: true,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Yes, clear it!",
                            closeOnConfirm: false
                        },

                        function (isConfirm) {

                            if (isConfirm) {
                                document.getElementById("inviteform").reset();
                                swal("Success!", "Inviting selected members was cancelled.", "success");




                            }
                            else {
                                swal("Cancelled", "Your selections are safe :)", "error");
                            };


                        }
                )

            }
        }

        /*inviting members*/
        /*function inviteMembers() {
         swal({
         title: "Are you sure?",
         text: "Do You want to invite these selected candidates ??",
         type: "warning", showCancelButton: true,
         confirmButtonColor: "#DD6B55",
         confirmButtonText: "Yes, invite them!",
         closeOnConfirm: false},

         function (isConfirm) {

         if (isConfirm)
         {
         var atLeastOneIsChecked = $('input[name="student_names[]"]:checked').length > 0;

         var max = 5;

         var selected =  parseInt(document.getElementById('invitations').innerHTML);
         var members =  parseInt(document.getElementById('members').innerHTML);

         if(atLeastOneIsChecked == false){

         swal("Failed", "Select members to invite.", "error");

         }
         else if(selected >= max || members >= max+1)
         {
         swal("Failed", "You have invited 3 members already", "error");
         }

         else
         {
         swal("Success!", "Inviting selected members was success.", "success");
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
         }*/


        function inviteMembers() {

            swal({
                        title: "Are you sure?",
                        text: "Do You want to invite these selected candidates ??",
                        type: "warning", showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes, invite them!",
                        closeOnConfirm: false},

                    function (isConfirm) {

                        if (isConfirm)
                        {
                            var atLeastOneIsChecked = $('input[name="student_names[]"]:checked').length > 0;

                            var max = 5;

                            var selected =  parseInt(document.getElementById('invitations').innerHTML);
                            var members =  parseInt(document.getElementById('members').innerHTML);

                            if(atLeastOneIsChecked == false){

                                swal("Failed", "Select members to invite.", "error");

                            }

                            else if(selected > max || members > max+1)
                            {
                                swal("Failed", "You have invited 5 members already", "error");
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

        /*delete sent group invitations*/
        function deleteRejected(){

            swal({   title: "Are you sure?",
                        text: "Do You want to delete the sent request??",
                        type: "warning",   showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes!",
                        cancelButtonText: "No!",
                        closeOnConfirm: true,
                        closeOnCancel: true },
                    function(isConfirm){

                        if (isConfirm) {
                            swal("Success!", "Deleted the rejected list.", "success");
                            document.getElementById("deleteRejectedform").submit();
                        }

                    });

        }

        /*cancel sent group invitations*/
        function cancelRequest(){

            swal({   title: "Are you sure?",
                        text: "Do You want to cancel the sent request??",
                        type: "warning",   showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes!",
                        cancelButtonText: "No!",
                        closeOnConfirm: true,
                        closeOnCancel: true },
                    function(isConfirm){

                        if (isConfirm) {
                            swal("Success!", "The request was cancelled.", "success");
                            document.getElementById("cancelRequestform").submit();
                        }

                    });

        }

        /*remove the group member*/
        function removeMember(){

            swal({   title: "Are you sure?",
                        text: "Do You want to remove this member from your group??",
                        type: "warning",   showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes!",
                        cancelButtonText: "No!",
                        closeOnConfirm: true,
                        closeOnCancel: true },
                    function(isConfirm){

                        if (isConfirm) {
                            swal("Success!", "Member was deleted.", "success");
                            document.getElementById("deleteMemberform").submit();
                        }

                    });

        }

        /*adding names to text area*/
        function addToList(checkObj, outputObjID)
         {
         var max = 5;

         var selected =  parseInt(document.getElementById('invitations').innerHTML);
         var members =  parseInt(document.getElementById('members').innerHTML);
         var current = $("input:checked").length;

//         if(selected+members+current>max)
//         {
//         document.getElementById("invteBtn").disabled = true;
//         document.getElementById("rstBtn").disabled = true;
//         }
//         else
//         {

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
//         }


         return;

         }


        function countChecked() {
            var current = $("input:checked").length;
            var selected = parseInt($("#invitations").text());
            var members = parseInt($("#members").text());
            var max = 5;
//            alert(members);
            if(members==0){
                //alert(current+selected+members);
                if (current+selected+members>=max)
                {
                    swal("This is it", "You have selected the maximum number of invitees for the moment", "warning");
                    $(':checkbox:not(:checked)').prop('disabled', true);
                }
                else
                {
                    $(':checkbox:not(:checked)').prop('disabled', false);
                    document.getElementById("invteBtn").disabled = false;
                    document.getElementById("rstBtn").disabled = false;
                }
            }else if(members>0){
                //alert(current+selected+members);

                if (current+selected+members-1==max)
                {
                    swal("This is it", "You have selected the maximum number of invitees for the moment", "warning");
                    $(':checkbox:not(:checked)').prop('disabled', true);
                }
                else
                {
                    $(':checkbox:not(:checked)').prop('disabled', false);
                    document.getElementById("invteBtn").disabled = false;
                    document.getElementById("rstBtn").disabled = false;
                }
            }else{
                //alert(current+selected+members);

                $(':checkbox:not(:checked)').prop('disabled', true);
                document.getElementById("invteBtn").disabled = false;
                document.getElementById("rstBtn").disabled = false;
            }

        }
        $(":checkbox").click(countChecked);



    </script>
@endsection