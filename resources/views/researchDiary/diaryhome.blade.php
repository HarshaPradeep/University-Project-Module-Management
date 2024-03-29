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
        <h2>Task Allocations</h2>
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
                                                    <a href="/tasks"">
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
<form>
<div class="wrapper wrapper-content animated fadeInUp">
<div class="col-lg-12" style="text-align:center;">
                    <div class="ibox">
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="m-b-md">
                                        <h3> <font color="black" align="left">Project Task Allocations</font> </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="row" align="left">
                                <div class="col-lg-10"><font color="black">
                                    <dl class="dl-horizontal" >
									<h3>____________________________________________________________________________________________________</h3>
									<br>
                                    @foreach($rp as $entry)
                                    <dt> Date</dt> <dd>{{$entry->date}}</dd><br>

                                    <dt>Task Allocation</dt> <dd>{{$entry->task_allocation}}</dd>
									<h3>____________________________________________________________________________________________________</h3>
									<br>


                                    @endforeach

                                    </dl></font>
                                </div>
                                </div>
                                </div>

                                </div>
</div>
                                </div>


  </form>


@endsection