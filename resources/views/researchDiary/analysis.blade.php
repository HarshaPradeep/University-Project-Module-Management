
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
        <h2>Data Analysis</h2>
    </div>
</div>
@endsection


@section('content')

                                <!-- Menus -->
                                    <div class="col-sm-12">
                                        <div class="row">

                                            <div class="col-lg-3 col-md-6">
                                                <div class="panel panel-primary">
                                                    <div class="panel-heading">
                                                        <div class="row">
                                                            <div class="col-xs-3">
                                                                <i class="fa fa-clock-o fa-5x"></i>
                                                            </div>
                                                            <div class="col-xs-9 text-right">
                                                                <div class="huge">124</div>
                                                                    <div>Task Allocations!</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <a href="/diaryhome">
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
                                                                <i class="fa fa-bar-chart-o fa-5x"></i>
                                                            </div>
                                                            <div class="col-xs-9 text-right">
                                                                <div class="huge">12</div>
                                                                <div>Data Analysis!</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="/analysis">
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
                                                                <div>Tasks Schedule!</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="/tasks">
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
                                                                        <div>Defects Schedule!</div>
                                                                    </div>
                                                                </div>
                                                            </div>
															<a href="/defects">
																<div class="panel-footer">
																	<span class="pull-left">View Details</span>
																	<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
																	<div class="clearfix"></div>
																</div>
															</a>
														</div>
													</div>
												</div>
            <!--End of Menus -->
	

	 <!--Pia charts-->
	<div class="row">
    

		<div id="collapse1" class="ibox-content">
            <ul class="list-group" style="height: 450px">
			<div class="col-lg-6">
            <li class="list-group-item">
                <div class="text-center">
                    <h1>Tasks</h1>
					<br>
                    <canvas id="cpie" height="350" width="350"></canvas>
                </div>
            </li>
			</div>
			<div class="col-lg-6">
            <li class="list-group-item">
                <div class="text-center">
					<h1>Defects</h1>
					<br>
                    <canvas id="cpie1" height="350" width="350"></canvas>
                </div>        
            </li>
			</div>
			</ul>
		</div>
		</div>
 <!--End of Pie charts-->
		
@endsection


@section('ValidationJavaScript')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">


$(document).ready(function () {


        //var data = getData();

       // console.log(data);

		 <!--Task chart-->
        var pdata = [
            {
                value: 3,
                color: "#46BFBD",
                highlight: "#5AD3D1",
                label: "Not Start"
            },
            {
                value: 4,
                color: "#FDB45C",
                highlight: "#FFC870",
                label: "Start"
            },
            {
                value:4,
                color:"#F7464A",
                highlight: "#FF5A5E",
                label: "Finish"
            }
        ];

        var chartOptions = {

                    };
        var cpie = document.getElementById("cpie").getContext("2d");
        new Chart(cpie).Pie(pdata, chartOptions);

         <!-- Defect chart -->

        //var data = getData();
      //  console.log(data.start);

        var pdata = [
            {
                value: 3,
                color: "#46BFBD",
                highlight: "#5AD3D1",
                label: "Not Start"
            },
            {
                value: 5,
                color: "#FDB45C",
                highlight: "#FFC870",
                label: "Start"
            },
            {
                value: 4,
                color:"#F7464A",
                highlight: "#FF5A5E",
                label: "Finish"
            }
        ];
            var chartOptions = {

                    };
        var cpie1 = document.getElementById("cpie1").getContext("2d");
        new Chart(cpie1).Pie(pdata, chartOptions);
});



    function getData(){
        $.ajax({
            type: "POST",
            url:"analysis/getdata",
            success: function (data) {
                console.log(data);
                console.log(data.start);
                return data;
            }

        });
    }



</script>

@endsection
