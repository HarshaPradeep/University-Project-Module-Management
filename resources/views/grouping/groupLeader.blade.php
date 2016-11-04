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
            <h2>Group Profile - Leader</h2>

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

    @if(Session::has('success_proposal'))
        <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('success_proposal') !!}</em></div>
    @endif

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">

                <br>
                <div style="float: left;margin-left: 20px;">
                <img alt="image" class="img-circle" src="img/leaderImage.png" height="70px" width="70px"/>
                </div>
            &nbsp;&nbsp;&nbsp;&nbsp;
                <div style="float: left;margin-left: 50px;margin-top: 20px;">
                    @if($project==NULL)
                        <table>
                        <tbody>
                        <tr><td><b>Group Leader:    </b></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td> {{$leaderMail->name}}<td></tr>
                        <tr><td><b>Group ID :   </b></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>{{ $groupId }}</td></tr>
                        </tbody>
                        </table>
                    <br>
                        {!! Form::open(array('url'=>'navigateProposal','method'=>'POST',
                                        'class'=>'wizard-big', 'id'=>'navigateProposal', 'enctype'=>'multipart/form-data' )) !!}
                        <fieldset>
                            <button type="submit"
                                    class="btn btn-primary" rel="tooltip" title="Submit a group Project Proposal">
                                <span class="glyphicon glyphicon-chevron-right"></span>Submit Project Charter</button>
                            <input id="groupID" type="hidden" name="groupID" value="{{$groupId}}">
                        </fieldset>
                        {!! Form::close() !!}
                    @else

                        <table>
                            <tbody>
                            <tr><td><b>Group Leader:    </b></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td> {{$leaderMail->name}}<td></tr>
                            <tr><td><b>Group ID :   </b></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>{{ $groupId }}</td></tr>
                            <tr><td><b>Project Title :   </b></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>{{ $project->title }}</td></tr>
                            <tr><td><b>Project Status :   </b></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>{{ $project->status }}</td></tr>
                            @if($supervisor!=NULL)
                                <tr><td><b>Supervisor :   </b></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>{{ $supervisor->name }}</td></tr>
                            @endif

                            <tbody>

                        </table>

                    @endif
                </div>

            <br><br>
        <div></div>

<br><br>
            <div style="float: left; margin-left: 836px;margin-top: 0">
                {!! Form::open(array('url'=>'groupDelete','method'=>'POST',
                'class'=>'wizard-big', 'id'=>'groupDeleteform', 'enctype'=>'multipart/form-data' )) !!}
                <fieldset>
                    <button type="button"
                            class="btn btn-danger" rel="tooltip" title="LEAVE and DELETE group"
                            onclick="deleteGroup()"><span class="glyphicon glyphicon-trash"></span></button>
                    <input id="groupID" type="hidden" name="groupID" value="{{$groupId}}">
                </fieldset>
                {!! Form::close() !!}

            </div>

            {{--editpfLeader--}}


                <div id="maincontainer">

                    {{--profile Edit--}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="ibox">
                                <div class="ibox-title">
                                    <h4>Portfolio</h4>
                                </div>
                                <div class="ibox-content">

                                    <div style="margin-left: 35px;">
                                        <img alt="image" class="img-circle" src="img/avatars/{{$user->avatar}}" height="200px" width="200px"/>
                                    </div>
                                    <div>
                                        <form enctype="multipart/form-data" action="/profile" method="post">
                                            <label>Update Profile Image</label>
                                            <input type="file" name="avatar" id="avatar">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            <div style="margin-left: 283px; margin-top: -27px;">
                                                <input type="submit" class="btn-sm btn-primary">
                                            </div>
                                            <div> @if(Session::has('pro_suc'))
                                                    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('pro_suc') !!}</em></div>
                                                @endif
                                                @if (Session::has('error'))
                                                    <div class="alert alert-danger"><span class="glyphicon glyphicon-remove"></span>{{ Session::get('error') }}</div>
                                                @endif
                                            </div>
                                        </form>
                                    </div>
                                    <div style="float: left; margin-left: 836px;margin-top: 0">


                                    </div>

                                                <div class="social-feed-box">

                                                    <div class="pull-right social-action dropdown">

                                                        <ul class="dropdown-menu m-t-xs">
                                                            <!--                                <li><a href="#">Config</a></li>-->
                                                        </ul>
                                                    </div>
                                                    <div class="social-avatar" style="margin-top: 60px">


                                                            <table>
                                                                <tbody>

                                                                <tr><td><b>Name :   </b></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td> {{$user->name}}<td></tr>
                                                                <tr><td><b>Email :   </b></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>{{ $user->email }}</td></tr>
                                                                <tr><td><b>Phone :   </b></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>{{ $user->phone }}</td></tr>
                                                                <tr><td><b>Course Field :   </b></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>{{ $user->courseField }}</td></tr>
{{--
                                                                <tr><td><b>Role :   </b></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>{{ $user->role }}</td></tr>
--}}
                                                                <tbody>

                                                            </table>



                                                    </div>

                                                </div>

                                            <hr>






                                <!----------End Notices-------------------------------------------------------------------->


                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="ibox">
                                <div class="ibox-title">
                                    <h4>Group Members</h4>
                                </div>
                                @foreach ($groupMembers as $grp)
                                <div class="ibox-content">
                                    <div class="col-lg-12 row animated fadeInDown">

                                        <div style="float: left;">
                                            <img alt="image" class="img-circle" src="img/avatars/{{$grp->avatar}}" height="70px" width="70px"/>
                                        </div>
                                        <div style="float: left;margin-left:  12px">
                                            <table>


                                                <tbody>


                                                <tr><td><b>Name :   </b></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td> {{$grp->name}}<td></tr>
                                                <tr><td><b>Email :   </b></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>{{ $grp->email }}</td></tr>
                                                <tr><td><b>Phone :   </b></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>{{ $grp->phone }}</td></tr>
                                                <tr><td><b>Course :   </b></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>{{ $grp->courseField }}</td></tr>
{{--
                                                <tr><td><b>Role :   </b></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>{{ $groupMembers->role }}</td></tr>
                                            --}}


                                                <tbody>

                                            </table>

                                        </div>


                                    </div>
                                    <br>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>

                    {{--End--Profile Edit--}}


                    <div id="contentwrapper">
                        <div id="maincolumn">
                            <div class="text" style="float: left">
                                <hr/>


                            </div>
                        </div>  <div class="col-lg-10" style="float: right">
                            {{--<textarea  name="txt1" id="txt1" style="width:370px;height:200px;font-size:20px; margin: -255px 21px -26px 453px; resize: none;" rows="3" readonly> </textarea>
--}}
                        </div>

                    </div>

                </div>

            <br/>
            <br/>
            &nbsp;&nbsp;&nbsp;&nbsp;
            {{--<div class="wrapper wrapper-content animated fadeInRight">--}}
                {{--<div class="table-responsive">--}}

                    {{--<table id="invitatin_table" class="table table-hover ">--}}
                        {{--<thead>--}}
                        {{--<tr>--}}
                            {{--<th>Member ID</th>--}}
                            {{--<th>Member Name</th>--}}
                            {{--<th>Member Mail</th>--}}
                            {{--<th>Member Phone</th>--}}
                        {{--</tr>--}}
                        {{--</thead>--}}
                        {{--<tbody>--}}

                        {{--@foreach ($groupMembers as $grp)--}}

                            {{--<tr>--}}
                                {{--<td class="text-primary">{{ $grp->regId }}</td>--}}
                                {{--<td>{{ $grp->name }}</td>--}}
                                {{--<td>{{ $grp->email }}</td>--}}
                                {{--<td>{{ $grp->phone }}</td>--}}

                                    {{--<td>--}}
                                        {{--<button type="button" class="btn btn-sm btn-primary"--}}
                                                {{--rel="tooltip" title="Private Message"--}}
                                                {{--data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-envelope"></span></button>--}}

                                    {{--<!--Request Supervisor Meeting model-->--}}

                                        {{--<div class="modal inmodal in" id="myModal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">--}}
                                            {{--<div class="modal-dialog">--}}
                                                {{--<div class="modal-content animated bounceInRight">--}}
                                                    {{--<div class="modal-header">--}}
                                                        {{--<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>--}}

                                                        {{--<h4 class="modal-title">Request A Supervisor Meeting</h4>--}}
                                                        {{--<small class="font-bold"></small>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="modal-body">--}}

                                                        {{--<div class="form-group" id="data_1">--}}
                                                            {{--<label class="font-noraml">Reason</label>--}}

                                                            {{--<div><input type="text" class="form-control col-md-12" id="txtEventName" name="txtEventName"></div>--}}

                                                        {{--</div>--}}

                                                        {{--<div class="form-group" id="data_1">--}}
                                                            {{--<label class="font-noraml">Date</label>--}}
                                                            {{--<input class="form-control" id="txtEventDate" name="txtEventDate" type="date" min="{{date("Y-m-d")}}">--}}
                                                        {{--</div>--}}

                                                        {{--<div class="form-group" id="data_1">--}}
                                                            {{--<label class="font-noraml">Time</label>--}}
                                                            {{--<div class="bfh-timepicker" id="txtEventTime" name="txtEventTime" data-mode="12h">--}}
                                                            {{--</div>--}}
                                                        {{--</div>--}}

                                                        {{--<div class="form-group" id="data_1">--}}
                                                            {{--<label class="font-noraml">Description</label>--}}

                                                            {{--<textarea  rows="4" cols="50" class="form-control required" id="txtEventDescription" name="txtEventDescription" placeholder="">--}}
                                                            {{--</textarea>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="modal-footer">--}}
                                                        {{--<button type="button" class="btn btn-white" data-dismiss="modal">Close</button>--}}
                                                        {{--<button type="button" class="btn btn-primary" onclick="RequestSupervisorMeeting()">Request Meeting</button>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<!--Request Supervisor Meeting model-->--}}

                                    {{--</td>--}}


                            {{--</tr>--}}
                        {{--@endforeach--}}

                        {{--</tbody>--}}
                    {{--</table>--}}
                {{--</div>--}}

            {{--</div>--}}


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
        function deleteGroup() {

                swal({
                            title: "Are you sure?",
                            text: "Do You want to leave and delete this group ??",
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


        /*message group member*/
        function messageMember(){

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
                            swal("Success!", "Member is deleted.", "success");
                            document.getElementById("deleteMemberform").submit();
                        }

                    });

        }




    </script>
@endsection
