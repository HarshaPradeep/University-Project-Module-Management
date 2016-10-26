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
            <h2>Group Profile - Member</h2>

            <ol class="breadcrumb">

            </ol>

        </div>
        <div class="col-lg-2">

        </div>
    </div>

@endsection


@section('content')


    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">

            <br>
            <div style="float: left;margin-left: 20px;">
                <img alt="image" class="img-circle" src="img/leaderImage.png" height="70px" width="70px"/>
            </div>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <div style="float: left;margin-left: 50px">
                <table>
                    <tbody>
                    <tr><td><b>Group Leader:    </b></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td> {{$leaderMail->name}}<td></tr>
                    <tr><td><b>Group ID :   </b></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>{{ $groupId }}</td></tr>
                    @if($project!=NULL)
                        <tr><td><b>Project Title :   </b></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>{{ $project->title }}</td></tr>
                        <tr><td><b>Project Status :   </b></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>{{ $project->status }}</td></tr>
                        @if($supervisor!=NULL)
                            <tr><td><b>Supervisor :   </b></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>{{ $supervisor->name }}</td></tr>
                        @endif
                    @endif

                    <tbody>

                </table>

            </div>

            <br><br>
            <div></div>

            <br><br>


            {{--editpfLeader--}}


            <div id="maincontainer">

                {{--profile Edit--}}
                <div class="row">
                    <br>
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
                                    <div> @if(Session::has('flash_message'))
                                            <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
                                        @endif
                                        @if (Session::has('error'))
                                            <div class="alert alert-danger"><span class="glyphicon glyphicon-remove"></span>{{ Session::get('error') }}</div>
                                        @endif
                                    </div>
                                </form>
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
                                                <div>
                                                <tbody>
                                                <tr><td><b>Name :   </b></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td> {{$grp->name}}<td></tr>
                                                <tr><td><b>Email :   </b></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>{{ $grp->email }}</td></tr>
                                                <tr><td><b>Phone :   </b></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>{{ $grp->phone }}</td></tr>
                                                <tr><td><b>Course :   </b></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>{{ $grp->courseField }}</td></tr>
                                                <tr><td><b>Role :   </b></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>{{ $grp->role }}</td></tr>
                                                </div>
                                                </tbody>
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

                    </div>

                </div>

            </div>

            <br/>
            <br/>
            &nbsp;&nbsp;&nbsp;&nbsp;



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