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
        <h2>Defects Schedule</h2>        
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
        
@if (Session::has('message_error'))
<div class="alert alert-danger" role="alert" id="divAlert" style="font-size: 14px">
    {{ Session::get('message_error') }}
</div>
@elseif(Session::has('message_success'))
<div class="alert alert-success" role="alert" id="divAlert" style="font-size: 14px">
    <span class="glyphicon glyphicon-envelope"></span> {{Session::get('message_success') }}
</div>
@endif

<div class="col-sm-12">
<div class="row">
	
	<div class="col-sm-12">

            
            <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Defects log</h5>
            <div class="ibox-tools">

            </div>
        </div>
        <div class="ibox-content">

            <div class="table-responsive">

                <table style="font-size: 13px" class="table table-striped table-bordered table-hover dataTables-example dataTable dtr-inline" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">

                    <thead>
                        <tr role="row">

                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" >Student ID</th>
                            <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending">Defect No</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" >Defect</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" >Description</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" >Plan to Finish</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" >Defect State</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" >Start Date</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" >End Date</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" >Hours</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($Alldefects as $key=>$defectd)
                        <tr>
                            <td> {{ $defectd->studentId }} </td>
                            <td> {{ $defectd->id }} </td>
                            <td> {{ $defectd->defect }} </td>
                            <td> <?php echo wordwrap($defectd->description, 70, "\n", TRUE) ?></td>
                            <td> {{ $defectd->plantofinish }} </td>
                            <td> {{ $defectd->state }} </td>
                            <td> {{ $defectd->sdate }} </td>
                            <td> {{ $defectd->edate }} </td>
                            <td> {{ $defectd->hours }} </td>
                            <td>
                                {!! Form::open(['method' => 'DELETEdef', 'id' => 'deleteForm', 'action' => ['defectsController@destroy', $defectd->id ]]) !!}
                                <center>

                                    {!! Form::button( '<i class="fa fa-trash fa-lg" title="Delete"></i>',
                                    ['onclick' => 'deletedefect()',
                                    'class' => 'delete text-danger deleteForm',
                                    'id' => 'btnDeleteProduct',
                                    'data-id' => $defectd->id ] ) !!}



                        <a href="defects/{{$defectd->id}}"><i class="fa fa-edit fa-lg" title="Delete"></i></a>

                    </center>
                    {!! Form::close() !!}
                    </td>
                    </tr>
                    
                    @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                            <th rowspan="1" colspan="1">Student ID</th>
                            <th rowspan="1" colspan="1">Defect No</th>
                            <th rowspan="1" colspan="1">Defect</th>
                            <th rowspan="1" colspan="1">Description</th>
                            <th rowspan="1" colspan="1">Plan to Finish</th>
                            <th rowspan="1" colspan="1">Defect State</th>
                            <th rowspan="1" colspan="1">Start Date</th>
                            <th rowspan="1" colspan="1">End Date</th>
                            <th rowspan="1" colspan="1">Hours</th>                            
                        </tr>
                    </tfoot>
                </table>

            </div>

        </div>
    </div>
</div>
            
            
	</div>
</div>
	
    <div class="row" style="padding-left: 14px">
	<div class="col-lg-10">
        <h2>Add Defect</h2>
    </div>
    <div class="col-lg-8">
        <form id="form1" name="form1" method="post" action="" >


            <div class="form-group">
                <input name="entertask" class="form-control" placeholder="Enter Defect" type="text" required>
            </div>
            
            <div class="form-group">
			<textarea name="desc" class="form-control" rows="3" placeholder="Enter description" required></textarea>
            </div>
            
			<div class="form-group"> 
                <input name="plantof" class="form-control" placeholder="Plan to finish" required>
            </div>






            <div class="form-group">
                <label>Defect State</label>
                <div class="radio">
                    <label>
                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="Not Start" >Not Start
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="Start">Start
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="optionsRadios" id="optionsRadios3" value="Finish">Finish
                    </label>
                </div>

                <script type="text/javascript">
                    $("#optionsRadios1").click()
                </script>


				<div class="form-group" id="start_date">
                <input name="start" class="form-control" placeholder="Start Date" >
				</div>
				
				<div class="form-group" id="end_date">
                <input name="end" class="form-control" placeholder="End Date" >
				</div>
				
				<div class="form-group" id="spent_hours">
                <input name="spenthours" class="form-control" placeholder="Spent Hours" >
				</div>
				
            </div>
            
            <div class="summernote"></div>

        <div class="form-group">
           <div class="col-md-8" style="padding-left:100px;">
                <button onclick="added()" name="addNotice" id="adda"class="btn btn-w-m btn-primary">Submit</button>
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                 </div>
			
            <input type="reset" name="Submit2" value="Reset" class="btn btn-w-m btn-primary">
               
        </div>
        </form>
    </div>
	</div>
<br>

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


                   function hello() {
                       $(this).click(function(event){
                           event.preventDefault();
                           deletedefect();
                           event.run();
                       });
                   }




    function deletedefect()
    {
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this Defect!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes!",
            cancelButtonText: "Cancel!",
            closeOnConfirm: false,
            closeOnCancel: false},
        function (isConfirm)
        {
            if (isConfirm)
            {
                document.getElementById("deleteForm").submit();
                swal("Deleted!", "Defect is deleted!", "success");
            }
            else
            {
                swal("Cancelled", "Your defect is safe :)", "error");
            }
        });
        return x;
        confirm("Do you want to delete this defect");
    }
    

</script>

@endsection