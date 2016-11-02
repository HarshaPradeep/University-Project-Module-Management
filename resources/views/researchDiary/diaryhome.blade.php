
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
        <h2>Project Diary</h2>
        <ol class="breadcrumb">

        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
@endsection


@section('content')

                                <!-- /.row -->
                                    <div class="col-sm-12">
                                        <div class="row">

                                            <div class="col-lg-3 col-md-6">
                                                <div class="panel panel-primary">
                                                    <div class="panel-heading">
                                                        <div class="row">
                                                            <div class="col-xs-3">
                                                                <i class="fa fa-bar-chart-o fa-5x"></i>
                                                            </div>
                                                            <div class="col-xs-9 text-right">
                                                                <div class="huge">12</div>
                                                                <div>Data Analysis!</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="#">
                                                        <div class="panel-footer">
                                                            <span class="pull-left">View Details</span>
                                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                                                        <div class="col-lg-3 col-md-6">
                                                <div class="panel panel-primary">
                                                    <div class="panel-heading">
                                                        <div class="row">
                                                            <div class="col-xs-3">
                                                                <i class="fa fa-tasks fa-5x"></i>
                                                            </div>
                                                            <div class="col-xs-9 text-right">
                                                                <div class="huge">26</div>
                                                                <div>Tasks And Schedules!</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="#">
                                                        <div class="panel-footer">
                                                            <a href="/tasks"><span class="pull-left">View Details</span></a>
                                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                                    <div class="col-lg-3 col-md-6">
                                                        <div class="panel panel-primary">
                                                            <div class="panel-heading">
                                                                <div class="row">
                                                                    <div class="col-xs-3">
                                                                        <i class="fa fa-clock-o fa-5x"></i>
                                                                    </div>
                                                                    <div class="col-xs-9 text-right">
                                                                        <div class="huge">124</div>
                                                                        <div>Time Log!</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <a href="#">
                                                                <div class="panel-footer">
                                                                    <span class="pull-left">View Details</span>
                                                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-6">
                                                        <div class="panel panel-primary">
                                                            <div class="panel-heading">
                                                                <div class="row">
                                                                    <div class="col-xs-3">
                                                                        <i class="fa fa-bug fa-5x"></i>
                                                                    </div>
                                                                    <div class="col-xs-9 text-right">
                                                                        <div class="huge">13</div>
                                                                        <div>Defects Log!</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                        <a href="#">
                            <div class="panel-footer">
                                <a href="/defects"><span class="pull-left">View Details</span></a>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">



                   <!-- /.panel -->


       <div id="collapse1" class="ibox-content">
            <ul class="list-group" style="height: 320px">
            <li class="list-group-item" style="float: left">
                <div class="text-center">
                    
                            <canvas id="cpie" height="200" width="470"></canvas>
                        </div>
                
            </li>

            <li class="list-group-item" style="float: right">
                
                <div class="text-center">
                            <canvas id="cpie1" height="200" width="470"></canvas>
                        </div>
                
            </li>
        </ul>
      </div>




@endsection


@section('ValidationJavaScript')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">

$(document).ready(function () {
        var pdata = [
            {
                value: 300,
                color: "#46BFBD",
                highlight: "#5AD3D1",
                label: "A [90-100]"
            },
            {
                value: 100,
                color: "#FDB45C",
                highlight: "#FFC870",
                label: "B [80-89]"
            },
            {
                value: 100,
                color: "#FDB45C",
                highlight: "#FFC870",
                label: "C [70-79]"
            },
            {
                value: 100,
                color: "#FDB45C",
                highlight: "#FFC870",
                label: "D [60-69]"
            },
            {
                value: 50,
                color:"#F7464A",
                highlight: "#FF5A5E",
                label: "F [0-59]"
            }
        ];
            var chartOptions = {

                    };
        var cpie = document.getElementById("cpie").getContext("2d");
        new Chart(cpie).Pie(pdata, chartOptions);

        //////////////////////////////////////////////////////////////////////

        var pdata = [
            {
                value: 300,
                color: "#46BFBD",
                highlight: "#5AD3D1",
                label: "A [90-100]"
            },
            {
                value: 100,
                color: "#FDB45C",
                highlight: "#FFC870",
                label: "B [80-89]"
            },
            {
                value: 100,
                color: "#FDB45C",
                highlight: "#FFC870",
                label: "C [70-79]"
            },
            {
                value: 100,
                color: "#FDB45C",
                highlight: "#FFC870",
                label: "D [60-69]"
            },
            {
                value: 50,
                color:"#F7464A",
                highlight: "#FF5A5E",
                label: "F [0-59]"
            }
        ];
            var chartOptions = {

                    };
        var cpie = document.getElementById("cpie1").getContext("2d");
        new Chart(cpie).Pie(pdata, chartOptions);
});

</script>

@endsection
