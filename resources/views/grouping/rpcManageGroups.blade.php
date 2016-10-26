@extends('masterpages.master_rpc')

@section('cssLinks')

@endsection

@section('title')


    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Group Manage - LIC</h2>
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

    <div class="wrapper wrapper-content animated fadeInRight">

        <div class="row">
            <div class="col-lg-7" style="height: 750px; overflow: auto;">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Project Details</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <table class="table table-hover no-margins">
                            <thead>
                            <tr>
                                <th>Group ID</th>
                                <th>Group Status</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach( $groups as $grp )
                                <tr>
                                    <?php $routeURL = ''; ?>
                                    <td>{{ $grp->groupID }}</td>
                                        @if($grp->status == "Closed")
                                            <td style="color:#2ecc71 ">{{ $grp->status }}</td>
                                        @elseif ($grp->status == "Open")
                                            <td style="color: #f39c12">{{ $grp->status }}</td>
                                        @endif

                                    <td>
                                        <a href="{{ asset('viewGroup/' . $grp->groupID) }}" class="edit_btn btn btn-primary btn-xs m-l-sm"><span class="glyphicon glyphicon-cog"></span>    Edit</a>

                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>


                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Create a Research Group</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <div style="margin-left: 60px; margin-top: 0;">
                            <h2>Available student pool:</h2><br>
                            <font color="red">*Always select the leader first.</font>
                            <br><br>
                            {!! Form::open(array('url'=>'createGroup','method'=>'POST',
                            'class'=>'wizard-big', 'id'=>'createGroupform', 'enctype'=>'multipart/form-data' )) !!}
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

            </div>
            <div class="col-lg-5">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5> Group Status Statistics </h5>

                        <div ibox-tools></div>
                    </div>
                    <div class="ibox-content">
                        <div class="text-center">
                            <canvas id="doughnutChart1" height="230" width="230"></canvas>
                        </div>
                    </div>
                </div>


                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5> Students Pool Statistics </h5>

                        <div ibox-tools></div>
                    </div>
                    <div class="ibox-content">
                        <div class="text-center">
                            <canvas id="doughnutChart2" height="230" width="230"></canvas>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>


@endsection


@section('ValidationJavaScript')

    <script>
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
                        text: "Do you want create this research group ??",
                        type: "warning", showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes!",
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


                                document.getElementById("createGroupform").submit();
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


    <script>
        $(document).ready(function(){

            var ClosedGroupCount =   '<?php echo $ClosedGroupCount;?>';
            var OpenGroupCount =   '<?php echo $OpenGroupCount;?>';

            var doughnutData1 = [
                {
                    value: parseInt(ClosedGroupCount),
                    color: "#2ecc71",
                    highlight: "#1ab394",
                    label: "Group Status - Closed"
                },
                {
                    value: parseInt(OpenGroupCount),
                    color: "#f39c12",
                    highlight: "#1ab394",
                    label: "Group Status - Open"
                }
                    ];


            var ctx1 = document.getElementById("doughnutChart1").getContext("2d");
            var DoughnutChart1 = new Chart(ctx1).Doughnut(doughnutData1);

            var GroupedStudentCount =   '<?php echo $GroupedStudentCount;?>';
            var SingleStudentCount =   '<?php echo $SingleStudentCount;?>';

            var doughnutData2 = [

                {
                    value: parseInt(GroupedStudentCount),
                    color: "#b5b8cf",
                    highlight: "#1ab394",
                    label: "Already grouped"
                },
                {
                    value: parseInt(SingleStudentCount),
                    color: "#e74c3c",
                    highlight: "#1ab394",
                    label: "Remaining"
                }
            ];


            var ctx2 = document.getElementById("doughnutChart2").getContext("2d");
            var DoughnutChart2 = new Chart(ctx2).Doughnut(doughnutData2);

        });


    </script>

@endsection