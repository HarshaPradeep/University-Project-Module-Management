@extends('masterpages.master_rpc')
@section('title')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Final Evaluation Form</h2>
        <ol class="breadcrumb">

        </ol>
    </div>    
    <div class="col-lg-2">

    </div>
</div>

@endsection
@section('content')

@if (count($errors) > 0)
<div class=" alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if(Session::has('success'))
<div class="alert  alert-success">
    {{ Session::get('success') }}
</div>
@endif
<div>
    <form method="post" id="formform">
<div class="ibox-content" style="height: 220px; margin-bottom: 10px">
    <div class=ibox-content" style="width: 400px; float: left">
<!--                   <select name="filter_sup" style="margin-right: 5px; width: 200px; height: 30px">
                        <option selected disabled>--Supervisors--</option>
                            @foreach ($supervisaornames as $key=>$supvisor)
                            <option value={{$supvisor->id}}>{{$supvisor->name}}</option>
                            @endforeach
                           </select>-->

        <select name="selectid" id="stuIDs" onchange="selectStudentDetails()" style="margin-right: 5px; margin-left: 13px; width: 200px; height: 30px">
            <option selected disabled><strong>--Group ID--</strong></option>
            @foreach ($groupids as $key=>$gid)
                        <option value="{{$gid->groupID}}">{{$gid->groupID}}</option>
            @endforeach
    </select>
   
    </div> 
    
    <div class="form-group" style="float: right">
        <label class="col-sm-2 control-label" style="width: 150px">Student Name</label>
                <div class="col-sm-10">
                    <input id="stuname" name="stuname" placeholder="Student Name" type="text" class="form-control" readonly/>
                </div>
        <br>
        <label class="col-sm-2 control-label" style="width: 150px; margin-top: 15px">Student ID</label>
                <div class="col-sm-10">
                    <input id="stuid" name="stuid" placeholder="Student ID" type="text" class="form-control" readonly/>
                </div>
    </div>
    
    <div class="form-group" style="margin-top: 50px; width: 400px">
        <label class="col-sm-2 control-label" style="width: 300px">Project Title</label>
                <div class="col-sm-10">
                    <input id="protitle" name="protitle" placeholder="Project Title" type="text" style="width: 500px" class="form-control" readonly/>
                </div>
    </div>
    
    <div class="form-group" style="margin-top: 120px">
        <label class="col-sm-2 control-label" style="width: 300px">Project ID</label>
                <div class="col-sm-10">
                    <input id="proid" name="proid" placeholder="Project ID" type="text" style="width: 500px" class="form-control" readonly/>
                </div>
    </div>
    
</div>
<div class="ibox-content" style="font-size: 14">
    
<!--    onclick="tabClicked()"-->
    <div id="tabs">
  <!-- Nav tabs -->
  <ul class="nav nav-tabs">
    <li role="presentation" class="active"><a href="#member1" aria-controls="home" role="tab" data-toggle="tab" class="ui-tabs-nav" name="hee">Please Select Group ID</a></li>
    <li role="presentation"><a href="#member2" aria-controls="profile" role="tab" data-toggle="tab" class="ui-tabs-nav"></a></li>
    <li role="presentation"><a href="#member3" aria-controls="messages" role="tab" data-toggle="tab" class="ui-tabs-nav"></a></li>
    <li role="presentation"><a href="#member4" aria-controls="settings" role="tab" data-toggle="tab" class="ui-tabs-nav"></a></li>
    <li role="presentation"><a href="#member5" aria-controls="settings" role="tab" data-toggle="tab" class="ui-tabs-nav" id="remveclz"></a></li>

  </ul>

  <!-- Tab panes -->
  
  <div class="tab-content">
      <div role="tabpanel" class="tab-pane fade in active" id="member1">
<!--          tab content starts from here-->

        <table class="table table-bordered">
            <tbody>
                
                <tr>
                    <td style="width: 1000px"><strong>Proposal Submission</strong> (10%)
                        <br><p style="padding-top: 10px">&emsp; Presentation (5%) 
                        <br>&emsp; Report (5%)
                        
                        </p>
                    
                    </td>
                        
                    <td style="width: 200px">
                        <input type="text" id="finalmarkstab1" placeholder="0" disabled style="width: 80px">
                        <p><input type="text"  style="width: 40px; margin-top: 5px" name="marksforproposalpresenttab1" class="marksforproposaltab1"  > Marks <br>
                        <input type="text"  style="width: 40px; margin-top: 2px" name="marksforproposalreporttab1" class="marksforproposaltab1"  > Marks</p></td>
               </tr>
               
               <tr>
                    <td style="width: 1000px"><strong>SRS Submission</strong> (10%)
                        <br><p style="padding-top: 10px">&emsp; Report (10%)
                        </p></td>

                    <td style="width: 200px">
                        <input type="text" id="finalmarksforsrs" placeholder="0" disabled style="width: 80px">
                        <p><input type="text"  style="width: 40px; margin-top: 5px" name="marksforsrstab1" class="marksforsrs"  > Marks</p></td>
               </tr>
               
               <tr>
                    <td style="width: 1000px"><strong>Prototype</strong> (15%)
                        <br><p style="padding-top: 10px">&emsp; Presentation (15%) 
                        </p></td>

                    <td style="width: 200px">
                        <input type="text" id="finalmarksforprotype" placeholder="0" disabled style="width: 80px">
                        <p><input type="text"  style="width: 40px; margin-top: 5px" name="marksforprototab1" class="marksforprototype"  > Marks</p></td>
               </tr>
               
               <tr>
                    <td style="width: 1000px"><strong>Mid Review</strong> (20%)
                        <br><p style="padding-top: 10px">&emsp; Presentation (10%) 
                        <br>&emsp; Report (10%)</p></td>

                    <td style="width: 200px">
                        <input type="text" id="finalmarksformid" placeholder="0" disabled style="width: 80px">
                        <p><input type="text"  style="width: 40px; margin-top: 5px" name="marksformidpresentab1" class="marksformidreview"  > Marks <br>
                        <input type="text"  style="width: 40px; margin-top: 2px" name="marksfomidreporttab1" class="marksformidreview"> marks</p></td>
               </tr>
               
               <tr>
                    <td style="width: 1000px"><strong>Final Presentation</strong> (15%)
                        <br><p style="padding-top: 10px">&emsp; Presentation (10%) 
                        <br>&emsp; Report (5%)</p></td>

                    <td style="width: 200px">
                        <input type="text" id="finalmarksforpresentation" placeholder="0" disabled style="width: 80px">
                        <p><input type="text"  style="width: 40px; margin-top: 5px" name="marksforfinalpresnttab1" class="marksforfinalpresentation"  > Marks <br>
                        <input type="text"  style="width: 40px; margin-top: 2px" name="marksforfinalreporttab1" class="marksforfinalpresentationsecond"  > Marks</p></td>
               </tr>
               
               <tr>
                    <td style="width: 1000px"><strong>Viva</strong> (15%)
                        <br><p style="padding-top: 10px">&emsp; Viva (15%) </p></td>

                    <td style="width: 200px">
                        <input type="text" id="finalmarksforviva" placeholder="0" disabled style="width: 80px">
                        <p><input type="text"  style="width: 40px; margin-top: 5px" name="marksforvivatab1" class="marksforviva"  > Marks <br></p></td>
               </tr>
               
               <tr>
                    <td style="width: 1000px"><strong>Other Assessment</strong> (15%)
                        <br><p style="padding-top: 11px">&emsp; Research Book (5%)
                        <br>&emsp; Research Paper (5%)
                        <br>&emsp; Website (5%)</p></td>

                    <td style="width: 200px">
                        <input type="text" id="finalmarksforothers" placeholder="0" disabled style="width: 80px">
                        <p><input type="text"  style="width: 40px; margin-top: 5px" name="marksforresearchbooktab1" class="marksforother"  > Marks <br>
                        <input type="text"  style="width: 40px; margin-top: 2px" name="marksforresearchpapertab1" class="marksforother"  > Marks <br>
                        <input type="text"  style="width: 40px; margin-top: 2px" name="marksforwebsitetab1" class="marksforother"  > Marks</p></td>
               </tr>
            </tbody>
        </table>
        <div align="right" style="margin-left: 620px"> <input type="button"style="float: left" value="Get Total" class="save_btn btn btn-primary btn-xl m-l-sm" onclick="getTotal()"></div>
        <div align="right" style="padding-right: 42px">
            
            <input type="text"  placeholder="Total" style="width: 50px; height: 35px" disabled>  
            <input type="text" name="total" id="mem1total" style="width: 50px; ; height: 35px" readonly placeholder="0"> <b>Marks</b></div>
<br>
<div><textarea name="cmntmem0" readonly rows="4" cols="80" placeholder="Comment" id="cmntmem0"></textarea></div><br>
<div><select name="status" required><option> Status </option>
                                            <option> Present </option>
                                            <option> Absent </option></select></div>
        <div align="right" style="padding-right: 180px"> <input type='submit'  class="save_btn btn btn-primary btn-xl m-l-sm" name='editThesisFormMarks' align="right" id="member1sub">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"></div>
<!--    </form>-->
          
      </div>
      
      <div role="tabpanel" class="tab-pane fade in" id="member2">
          
<!--          <form method="post">-->
        <table class="table table-bordered">
            <tbody>
                
                <tr>
                    <td style="width: 1000px"><strong>Proposal Submission</strong> (10%)
                        <br><p style="padding-top: 10px">&emsp; Presentation (5%) 
                        <br>&emsp; Report (5%)
                        
                        </p>
                    
                    </td>
                        
                    <td style="width: 200px">
                        <input type="text" id="finalmarks" placeholder="0" disabled style="width: 80px">
                        <p><input type="text"  style="width: 40px; margin-top: 5px" name="ProjectproposalPresentation" class="marksforproposal"  > Marks <br>
                        <input type="text"  style="width: 40px; margin-top: 2px" name="ProjectproposalPresentation" class="marksforproposal"  > Marks</p></td>
               </tr>
               
               <tr>
                    <td style="width: 1000px"><strong>SRS Submission</strong> (10%)
                        <br><p style="padding-top: 10px">&emsp; Report (10%)
                        </p></td>

                    <td style="width: 200px">
                        <input type="text" id="finalmarksforsrs" placeholder="0" disabled style="width: 80px">
                        <p><input type="text"  style="width: 40px; margin-top: 5px" name="ProjectproposalPresentation" class="marksforsrs"  > Marks</p></td>
               </tr>
               
               <tr>
                    <td style="width: 1000px"><strong>Prototype</strong> (15%)
                        <br><p style="padding-top: 10px">&emsp; Presentation (15%) 
                        </p></td>

                    <td style="width: 200px">
                        <input type="text" id="finalmarksforprotype" placeholder="0" disabled style="width: 80px">
                        <p><input type="text"  style="width: 40px; margin-top: 5px" name="ProjectproposalPresentation" class="marksforprototype"  > Marks</p></td>
               </tr>
               
               <tr>
                    <td style="width: 1000px"><strong>Mid Review</strong> (20%)
                        <br><p style="padding-top: 10px">&emsp; Presentation (10%) 
                        <br>&emsp; Report (10%)</p></td>

                    <td style="width: 200px">
                        <input type="text" id="finalmarksformid" placeholder="0" disabled style="width: 80px">
                        <p><input type="text"  style="width: 40px; margin-top: 5px" name="ProjectproposalPresentation" class="marksformidreview"  > Marks <br>
                        <input type="text"  style="width: 40px; margin-top: 2px" name="ProjectproposalPresentation" class="marksformidreview"> marks</p></td>
               </tr>
               
               <tr>
                    <td style="width: 1000px"><strong>Final Presentation</strong> (15%)
                        <br><p style="padding-top: 10px">&emsp; Presentation (10%) 
                        <br>&emsp; Report (5%)</p></td>

                    <td style="width: 200px">
                        <input type="text" id="finalmarksforpresentation" placeholder="0" disabled style="width: 80px">
                        <p><input type="text"  style="width: 40px; margin-top: 5px" name="ProjectproposalPresentation" class="marksforfinalpresentation"  > Marks <br>
                        <input type="text"  style="width: 40px; margin-top: 2px" name="ProjectproposalPresentation" class="marksforfinalpresentationsecond"  > Marks</p></td>
               </tr>
               
               <tr>
                    <td style="width: 1000px"><strong>Viva</strong> (15%)
                        <br><p style="padding-top: 10px">&emsp; Viva (15%) </p></td>

                    <td style="width: 200px">
                        <input type="text" id="finalmarksforviva" placeholder="0" disabled style="width: 80px">
                        <p><input type="text"  style="width: 40px; margin-top: 5px" name="ProjectproposalPresentation" class="marksforviva"  > Marks <br></p></td>
               </tr>
               
               <tr>
                    <td style="width: 1000px"><strong>Other Assessment</strong> (15%)
                        <br><p style="padding-top: 11px">&emsp; Research Book (5%)
                        <br>&emsp; Research Paper (5%)
                        <br>&emsp; Website (5%)</p></td>

                    <td style="width: 200px">
                        <input type="text" id="finalmarksforothers" placeholder="0" disabled style="width: 80px">
                        <p><input type="text"  style="width: 40px; margin-top: 5px" name="ProjectproposalPresentation" class="marksforother"  > Marks <br>
                        <input type="text"  style="width: 40px; margin-top: 2px" name="ProjectproposalPresentation" class="marksforother"  > Marks <br>
                        <input type="text"  style="width: 40px; margin-top: 2px" name="ProjectproposalPresentation" class="marksforother"  > Marks</p></td>
               </tr>
            </tbody>
        </table>
        <div align="right" style="margin-left: 620px"> <input type="button"style="float: left" value="Get Total" class="save_btn btn btn-primary btn-xl m-l-sm" onclick="getTotal()"></div>
        <div align="right" style="padding-right: 42px">
            
            <input type="text"  placeholder="Total" style="width: 50px; height: 35px" disabled>  
            <input type="text" name="total" id="mem2total" style="width: 50px; ; height: 35px" readonly placeholder="0"> <b>Marks</b></div>
<br>
        <div><textarea name="comment" disabled rows="4" cols="80" placeholder="Comment" id="cmntmem1"></textarea></div><br>
        <div><select name="status" disabled><option> Status </option></select></div>
        <div align="right" style="padding-right: 180px"> <input type='submit'  class="save_btn btn btn-primary btn-xl m-l-sm" name='editThesisFormMarks' align="right" id="member2sub">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"></div>
<!--    </form>-->
          
      </div>
      <div role="tabpanel" class="tab-pane fade in" id="member3">
          
<!--          <form method="post">-->
        <table class="table table-bordered">
            <tbody>
                
                <tr>
                    <td style="width: 1000px"><strong>Proposal Submission</strong> (10%)
                        <br><p style="padding-top: 10px">&emsp; Presentation (5%) 
                        <br>&emsp; Report (5%)
                        
                        </p>
                    
                    </td>
                        
                    <td style="width: 200px">
                        <input type="text" id="finalmarks" placeholder="0" disabled style="width: 80px">
                        <p><input type="text"  style="width: 40px; margin-top: 5px" name="ProjectproposalPresentation" class="marksforproposal"  > Marks <br>
                        <input type="text"  style="width: 40px; margin-top: 2px" name="ProjectproposalPresentation" class="marksforproposal"  > Marks</p></td>
               </tr>
               
               <tr>
                    <td style="width: 1000px"><strong>SRS Submission</strong> (10%)
                        <br><p style="padding-top: 10px">&emsp; Report (10%)
                        </p></td>

                    <td style="width: 200px">
                        <input type="text" id="finalmarksforsrs" placeholder="0" disabled style="width: 80px">
                        <p><input type="text"  style="width: 40px; margin-top: 5px" name="ProjectproposalPresentation" class="marksforsrs"  > Marks</p></td>
               </tr>
               
               <tr>
                    <td style="width: 1000px"><strong>Prototype</strong> (15%)
                        <br><p style="padding-top: 10px">&emsp; Presentation (15%) 
                        </p></td>

                    <td style="width: 200px">
                        <input type="text" id="finalmarksforprotype" placeholder="0" disabled style="width: 80px">
                        <p><input type="text"  style="width: 40px; margin-top: 5px" name="ProjectproposalPresentation" class="marksforprototype"  > Marks</p></td>
               </tr>
               
               <tr>
                    <td style="width: 1000px"><strong>Mid Review</strong> (20%)
                        <br><p style="padding-top: 10px">&emsp; Presentation (10%) 
                        <br>&emsp; Report (10%)</p></td>

                    <td style="width: 200px">
                        <input type="text" id="finalmarksformid" placeholder="0" disabled style="width: 80px">
                        <p><input type="text"  style="width: 40px; margin-top: 5px" name="ProjectproposalPresentation" class="marksformidreview"  > Marks <br>
                        <input type="text"  style="width: 40px; margin-top: 2px" name="ProjectproposalPresentation" class="marksformidreview"> marks</p></td>
               </tr>
               
               <tr>
                    <td style="width: 1000px"><strong>Final Presentation</strong> (15%)
                        <br><p style="padding-top: 10px">&emsp; Presentation (10%) 
                        <br>&emsp; Report (5%)</p></td>

                    <td style="width: 200px">
                        <input type="text" id="finalmarksforpresentation" placeholder="0" disabled style="width: 80px">
                        <p><input type="text"  style="width: 40px; margin-top: 5px" name="ProjectproposalPresentation" class="marksforfinalpresentation"  > Marks <br>
                        <input type="text"  style="width: 40px; margin-top: 2px" name="ProjectproposalPresentation" class="marksforfinalpresentationsecond"  > Marks</p></td>
               </tr>
               
               <tr>
                    <td style="width: 1000px"><strong>Viva</strong> (15%)
                        <br><p style="padding-top: 10px">&emsp; Viva (15%) </p></td>

                    <td style="width: 200px">
                        <input type="text" id="finalmarksforviva" placeholder="0" disabled style="width: 80px">
                        <p><input type="text"  style="width: 40px; margin-top: 5px" name="ProjectproposalPresentation" class="marksforviva"  > Marks <br></p></td>
               </tr>
               
               <tr>
                    <td style="width: 1000px"><strong>Other Assessment</strong> (15%)
                        <br><p style="padding-top: 11px">&emsp; Research Book (5%)
                        <br>&emsp; Research Paper (5%)
                        <br>&emsp; Website (5%)</p></td>

                    <td style="width: 200px">
                        <input type="text" id="finalmarksforothers" placeholder="0" disabled style="width: 80px">
                        <p><input type="text"  style="width: 40px; margin-top: 5px" name="ProjectproposalPresentation" class="marksforother"  > Marks <br>
                        <input type="text"  style="width: 40px; margin-top: 2px" name="ProjectproposalPresentation" class="marksforother"  > Marks <br>
                        <input type="text"  style="width: 40px; margin-top: 2px" name="ProjectproposalPresentation" class="marksforother"  > Marks</p></td>
               </tr>
            </tbody>
        </table>
        <div align="right" style="margin-left: 620px"> <input type="button"style="float: left" value="Get Total" class="save_btn btn btn-primary btn-xl m-l-sm" onclick="getTotal()"></div>
        <div align="right" style="padding-right: 42px">
            
            <input type="text"  placeholder="Total" style="width: 50px; height: 35px" disabled>  
            <input type="text" name="total" id="mem3total" style="width: 50px; ; height: 35px" readonly placeholder="0"> <b>Marks</b></div>
<br>
        <div><textarea name="comment" disabled rows="4" cols="80" placeholder="Comment" id="cmntmem2"></textarea></div><br>
        <div><select name="status" disabled><option> Status </option></select></div>
        <div align="right" style="padding-right: 180px"> <input type='submit'  class="save_btn btn btn-primary btn-xl m-l-sm" name='editThesisFormMarks' align="right" id="member3sub">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"></div>
<!--    </form>-->
          
      </div>
      <div role="tabpanel" class="tab-pane fade in" id="member4">
          
<!--          <form method="post">-->
        <table class="table table-bordered">
            <tbody>
                
                <tr>
                    <td style="width: 1000px"><strong>Proposal Submission</strong> (10%)
                        <br><p style="padding-top: 10px">&emsp; Presentation (5%) 
                        <br>&emsp; Report (5%)
                        
                        </p>
                    
                    </td>
                        
                    <td style="width: 200px">
                        <input type="text" id="finalmarks" placeholder="0" disabled style="width: 80px">
                        <p><input type="text"  style="width: 40px; margin-top: 5px" name="ProjectproposalPresentation" class="marksforproposal"  > Marks <br>
                        <input type="text"  style="width: 40px; margin-top: 2px" name="ProjectproposalPresentation" class="marksforproposal"  > Marks</p></td>
               </tr>
               
               <tr>
                    <td style="width: 1000px"><strong>SRS Submission</strong> (10%)
                        <br><p style="padding-top: 10px">&emsp; Report (10%)
                        </p></td>

                    <td style="width: 200px">
                        <input type="text" id="finalmarksforsrs" placeholder="0" disabled style="width: 80px">
                        <p><input type="text"  style="width: 40px; margin-top: 5px" name="ProjectproposalPresentation" class="marksforsrs"  > Marks</p></td>
               </tr>
               
               <tr>
                    <td style="width: 1000px"><strong>Prototype</strong> (15%)
                        <br><p style="padding-top: 10px">&emsp; Presentation (15%) 
                        </p></td>

                    <td style="width: 200px">
                        <input type="text" id="finalmarksforprotype" placeholder="0" disabled style="width: 80px">
                        <p><input type="text"  style="width: 40px; margin-top: 5px" name="ProjectproposalPresentation" class="marksforprototype"  > Marks</p></td>
               </tr>
               
               <tr>
                    <td style="width: 1000px"><strong>Mid Review</strong> (20%)
                        <br><p style="padding-top: 10px">&emsp; Presentation (10%) 
                        <br>&emsp; Report (10%)</p></td>

                    <td style="width: 200px">
                        <input type="text" id="finalmarksformid" placeholder="0" disabled style="width: 80px">
                        <p><input type="text"  style="width: 40px; margin-top: 5px" name="ProjectproposalPresentation" class="marksformidreview"  > Marks <br>
                        <input type="text"  style="width: 40px; margin-top: 2px" name="ProjectproposalPresentation" class="marksformidreview"> marks</p></td>
               </tr>
               
               <tr>
                    <td style="width: 1000px"><strong>Final Presentation</strong> (15%)
                        <br><p style="padding-top: 10px">&emsp; Presentation (10%) 
                        <br>&emsp; Report (5%)</p></td>

                    <td style="width: 200px">
                        <input type="text" id="finalmarksforpresentation" placeholder="0" disabled style="width: 80px">
                        <p><input type="text"  style="width: 40px; margin-top: 5px" name="ProjectproposalPresentation" class="marksforfinalpresentation"  > Marks <br>
                        <input type="text"  style="width: 40px; margin-top: 2px" name="ProjectproposalPresentation" class="marksforfinalpresentationsecond"  > Marks</p></td>
               </tr>
               
               <tr>
                    <td style="width: 1000px"><strong>Viva</strong> (15%)
                        <br><p style="padding-top: 10px">&emsp; Viva (15%) </p></td>

                    <td style="width: 200px">
                        <input type="text" id="finalmarksforviva" placeholder="0" disabled style="width: 80px">
                        <p><input type="text"  style="width: 40px; margin-top: 5px" name="ProjectproposalPresentation" class="marksforviva"  > Marks <br></p></td>
               </tr>
               
               <tr>
                    <td style="width: 1000px"><strong>Other Assessment</strong> (15%)
                        <br><p style="padding-top: 11px">&emsp; Research Book (5%)
                        <br>&emsp; Research Paper (5%)
                        <br>&emsp; Website (5%)</p></td>

                    <td style="width: 200px">
                        <input type="text" id="finalmarksforothers" placeholder="0" disabled style="width: 80px">
                        <p><input type="text"  style="width: 40px; margin-top: 5px" name="ProjectproposalPresentation" class="marksforother"  > Marks <br>
                        <input type="text"  style="width: 40px; margin-top: 2px" name="ProjectproposalPresentation" class="marksforother"  > Marks <br>
                        <input type="text"  style="width: 40px; margin-top: 2px" name="ProjectproposalPresentation" class="marksforother"  > Marks</p></td>
               </tr>
            </tbody>
        </table>
        <div align="right" style="margin-left: 620px"> <input type="button"style="float: left" value="Get Total" class="save_btn btn btn-primary btn-xl m-l-sm" onclick="getTotal()"></div>
        <div align="right" style="padding-right: 42px">
            
            <input type="text"  placeholder="Total" style="width: 50px; height: 35px" disabled>  
            <input type="text" name="total" id="mem4total" style="width: 50px; ; height: 35px" readonly placeholder="0"> <b>Marks</b></div>
<br>
        <div><textarea name="comment" disabled rows="4" cols="80" placeholder="Comment" id="cmntmem3"></textarea></div><br>
        <div><select name="status" disabled><option> Status </option></select></div>
        <div align="right" style="padding-right: 180px"> <input type='submit'  class="save_btn btn btn-primary btn-xl m-l-sm" name='editThesisFormMarks' align="right" id="member4sub">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"></div>
<!--    </form>-->
          
      </div>
      <div role="tabpanel" class="tab-pane fade in" id="member5">
          
<!--          <form method="post">-->
        <table class="table table-bordered">
            <tbody>
                
                <tr>
                    <td style="width: 1000px"><strong>Proposal Submission</strong> (10%)
                        <br><p style="padding-top: 10px">&emsp; Presentation (5%) 
                        <br>&emsp; Report (5%)
                        
                        </p>
                    
                    </td>
                        
                    <td style="width: 200px">
                        <input type="text" id="finalmarks" placeholder="0" disabled style="width: 80px">
                        <p><input type="text"  style="width: 40px; margin-top: 5px" name="ProjectproposalPresentation" class="marksforproposal"  > Marks <br>
                        <input type="text"  style="width: 40px; margin-top: 2px" name="ProjectproposalPresentation" class="marksforproposal"  > Marks</p></td>
               </tr>
               
               <tr>
                    <td style="width: 1000px"><strong>SRS Submission</strong> (10%)
                        <br><p style="padding-top: 10px">&emsp; Report (10%)
                        </p></td>

                    <td style="width: 200px">
                        <input type="text" id="finalmarksforsrs" placeholder="0" disabled style="width: 80px">
                        <p><input type="text"  style="width: 40px; margin-top: 5px" name="ProjectproposalPresentation" class="marksforsrs"  > Marks</p></td>
               </tr>
               
               <tr>
                    <td style="width: 1000px"><strong>Prototype</strong> (15%)
                        <br><p style="padding-top: 10px">&emsp; Presentation (15%) 
                        </p></td>

                    <td style="width: 200px">
                        <input type="text" id="finalmarksforprotype" placeholder="0" disabled style="width: 80px">
                        <p><input type="text"  style="width: 40px; margin-top: 5px" name="ProjectproposalPresentation" class="marksforprototype"  > Marks</p></td>
               </tr>
               
               <tr>
                    <td style="width: 1000px"><strong>Mid Review</strong> (20%)
                        <br><p style="padding-top: 10px">&emsp; Presentation (10%) 
                        <br>&emsp; Report (10%)</p></td>

                    <td style="width: 200px">
                        <input type="text" id="finalmarksformid" placeholder="0" disabled style="width: 80px">
                        <p><input type="text"  style="width: 40px; margin-top: 5px" name="ProjectproposalPresentation" class="marksformidreview"  > Marks <br>
                        <input type="text"  style="width: 40px; margin-top: 2px" name="ProjectproposalPresentation" class="marksformidreview"> marks</p></td>
               </tr>
               
               <tr>
                    <td style="width: 1000px"><strong>Final Presentation</strong> (15%)
                        <br><p style="padding-top: 10px">&emsp; Presentation (10%) 
                        <br>&emsp; Report (5%)</p></td>

                    <td style="width: 200px">
                        <input type="text" id="finalmarksforpresentation" placeholder="0" disabled style="width: 80px">
                        <p><input type="text"  style="width: 40px; margin-top: 5px" name="ProjectproposalPresentation" class="marksforfinalpresentation"  > Marks <br>
                        <input type="text"  style="width: 40px; margin-top: 2px" name="ProjectproposalPresentation" class="marksforfinalpresentationsecond"  > Marks</p></td>
               </tr>
               
               <tr>
                    <td style="width: 1000px"><strong>Viva</strong> (15%)
                        <br><p style="padding-top: 10px">&emsp; Viva (15%) </p></td>

                    <td style="width: 200px">
                        <input type="text" id="finalmarksforviva" placeholder="0" disabled style="width: 80px">
                        <p><input type="text"  style="width: 40px; margin-top: 5px" name="ProjectproposalPresentation" class="marksforviva"  > Marks <br></p></td>
               </tr>
               
               <tr>
                    <td style="width: 1000px"><strong>Other Assessment</strong> (15%)
                        <br><p style="padding-top: 11px">&emsp; Research Book (5%)
                        <br>&emsp; Research Paper (5%)
                        <br>&emsp; Website (5%)</p></td>

                    <td style="width: 200px">
                        <input type="text" id="finalmarksforothers" placeholder="0" disabled style="width: 80px">
                        <p><input type="text"  style="width: 40px; margin-top: 5px" name="ProjectproposalPresentation" class="marksforother"  > Marks <br>
                        <input type="text"  style="width: 40px; margin-top: 2px" name="ProjectproposalPresentation" class="marksforother"  > Marks <br>
                        <input type="text"  style="width: 40px; margin-top: 2px" name="ProjectproposalPresentation" class="marksforother"  > Marks</p></td>
               </tr>

            </tbody>
        </table>
        <div align="right" style="margin-left: 620px"> <input type="button"style="float: left" value="Get Total" class="save_btn btn btn-primary btn-xl m-l-sm" onclick="getTotal()"></div>
        <div align="right" style="padding-right: 42px">
            
            <input type="text"  placeholder="Total" style="width: 50px; height: 35px" disabled>  
            <input type="text" name="total" id="mem5total" style="width: 50px; ; height: 35px" readonly placeholder="0"> <b>Marks</b></div>
<br>
        <div><textarea name="comment" disabled rows="4" cols="80" placeholder="Comment" id="cmntmem4"></textarea></div><br>
        <div><select name="status" disabled><option> Status </option></select></div>
        <div align="right" style="padding-right: 180px"> <input type='submit'  class="save_btn btn btn-primary btn-xl m-l-sm" name='editThesisFormMarks' align="right" id="member5sub">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"></div>
   
          
      </div>   
  </div>

</div>
</div>   
    </form>
</div>

@endsection


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">

//$(document).ready(function () {
//    $('.finalmarks').valueOf(function () {
//        var total = 0;
//        $(".finalmarks").each(function () {
//            var marks = parseInt($(this).val());
//            total += !isNaN(marks) ? marks : 0;
//
//        });
//        $('#total').val(total);
//    });
//});

/////FOR TAB 1////////

    $(document).ready(function () {
    $('.marksforproposaltab1').keyup(function (e) {
        e.preventDefault();
        var total = 0;
        $(".marksforproposaltab1").each(function () {
            var marks = (parseInt($(this).val())/100)*5;
            total += !isNaN(marks) ? marks : 0;

        });
        $('#finalmarkstab1').val(total);
    });
});

$(document).ready(function () {
    $('.marksforsrs').keyup(function () {
        var total = 0;
        $(".marksforsrs").each(function () {
            var marks = (parseInt($(this).val())/100)*10;
            total += !isNaN(marks) ? marks : 0;

        });
        $('#finalmarksforsrs').val(total);
    });
});

$(document).ready(function () {
    $('.marksforprototype').keyup(function () {
        var total = 0;
        $(".marksforprototype").each(function () {
            var marks = (parseInt($(this).val())/100)*15;
            total += !isNaN(marks) ? marks : 0;

        });
        $('#finalmarksforprotype').val(total);
    });
});

$(document).ready(function () {
    $('.marksformidreview').keyup(function () {
        var total = 0;
        $(".marksformidreview").each(function () {
            var marks = (parseInt($(this).val())/100)*10;
            total += !isNaN(marks) ? marks : 0;

        });
        $('#finalmarksformid').val(total);
    });
});
//////////////////////////////10%//////////////////////////////////////
$(document).ready(function () {
    $('.marksforfinalpresentation').keyup(function () {
        var total = 0;
        $(".marksforfinalpresentation").each(function () {
            var marks = (parseInt($(this).val())/100)*10;
            total += !isNaN(marks) ? marks : 0;
             
        });    
        //alert($('#finalmarksforpresentation').val()) ;
        $('#finalmarksforpresentation').val(total);
    });        
});
//////////////////////////////5%//////////////////////////////////////
$(document).ready(function () {
    $('.marksforfinalpresentationsecond').keyup(function () {
        var total = 0;
        $(".marksforfinalpresentationsecond").each(function () {
            var marks = (parseInt($(this).val())/100)*5;
            total += !isNaN(marks) ? marks : 0;
             
        });    
        var temp2 = (parseInt($('#finalmarksforpresentation').val()));
        //alert(temp2);
        $('#finalmarksforpresentation').val(temp2 + total);
    });        
});
////////////////////////////////////////////////////////////////////
$(document).ready(function () {
    $('.marksforviva').keyup(function () {
        var total = 0;
        $(".marksforviva").each(function () {
            var marks = (parseInt($(this).val())/100)*15;
            total += !isNaN(marks) ? marks : 0;

        });
        $('#finalmarksforviva').val(total);
    });
});

$(document).ready(function () {
    $('.marksforother').keyup(function () {
        var total = 0;
        $(".marksforother").each(function () {
            var marks = (parseInt($(this).val())/100)*5;
            total += !isNaN(marks) ? marks : 0;

        });
        $('#finalmarksforothers').val(total);
    });
});

function getTotal()
{//add trnry operation, get 0 if null
    var first2 = parseFloat(document.getElementById("finalmarkstab1").value) +
              parseFloat(document.getElementById("finalmarksforsrs").value);
      var second2 = parseFloat(document.getElementById("finalmarksforprotype").value) +
              parseFloat(document.getElementById("finalmarksformid").value);
      var third2 = parseFloat(document.getElementById("finalmarksforpresentation").value) +
              parseFloat(document.getElementById("finalmarksforviva").value);
      var forth1 = parseFloat(document.getElementById("finalmarksforothers").value);

    $('#mem1total').val((Math.round((first2 + second2 + third2 + forth1) * 10) / 10));
}

/////END FOR TAB 1////////

function selectStudentDetails()
{
    //$(" #container-1").load(location.href + " #container-1"); 
    var e = document.getElementById("stuIDs");
    var searchID = e.options[e.selectedIndex].value;
    
        $.ajax({
        type: "GET",
        url: '/searchstudent',
        data: {"sid": searchID},
        dataType: 'json'
        
        }).done(function (data) {
            document.getElementById('stuname').value = data['sname'];
            document.getElementById('protitle').value = data['title'];
            document.getElementById('proid').value = data['pid'];
            
            
//            if(data['ids'].length === 4)
//            {
//                document.getElementById("remveclz").className = "ui-tabs-na";
//            }
//            else if(data['ids'].length === 5)
//            {
//                document.getElementById("remveclz").className = "ui-tabs-nav";
//            }
            $('#formform').children('input').val('');
            
            for(k = 0; k < 5; k++)
            {
                $($('.ui-tabs-nav')[k]).html("");
            }

            i=0;
            $.each(data['ids'], function (id,con){
                $($('.ui-tabs-nav')[i]).html(con);
                //alert('cmntmem'+i);
                //document.getElementById('stuid').value = con;
                document.getElementById('cmntmem'+i).value = con;
                i++;
            });    

            if(i === 1)
            {
                document.getElementById("member1sub").style.display="block";
                document.getElementById("member2sub").style.display="none";
                document.getElementById("member3sub").style.display="none";
                document.getElementById("member4sub").style.display="none";
                document.getElementById("member5sub").style.display="none";
            }
            else if(i === 2)
            {
                document.getElementById("member1sub").style.display="none";
                document.getElementById("member2sub").style.display="block";
                document.getElementById("member3sub").style.display="none";
                document.getElementById("member4sub").style.display="none";
                document.getElementById("member5sub").style.display="none";
            }
            else if(i === 3)
            {
                document.getElementById("member1sub").style.display="none";
                document.getElementById("member2sub").style.display="none";
                document.getElementById("member3sub").style.display="block";
                document.getElementById("member4sub").style.display="none";
                document.getElementById("member5sub").style.display="none";
            }
            else if(i === 4)
            {
                document.getElementById("member1sub").style.display="none";
                document.getElementById("member2sub").style.display="none";
                document.getElementById("member3sub").style.display="none";
                document.getElementById("member4sub").style.display="block";
                document.getElementById("member5sub").style.display="none";
            }
            else if(i === 5)
            {
                document.getElementById("member1sub").style.display="none";
                document.getElementById("member2sub").style.display="none";
                document.getElementById("member3sub").style.display="none";
                document.getElementById("member4sub").style.display="none";
                document.getElementById("member5sub").style.display="block";
            }
            
        }).fail(function (data) {
            swal("Failed", "Something Wrong! :)", "error");
        });       
         
}



//  function AddMarks() {
//
//
//
//            swal({   title: "Are you sure?",
//                        text: "Do You want to Update User ??",
//                        type: "warning",   showCancelButton: true,
//                        confirmButtonColor: "#DD6B55",
//                        confirmButtonText: "Yes, Update it!",
//                        closeOnConfirm: false },
//                    function(){
//
//
//                        var email = document.getElementById('email').value;
//                        var userName = document.getElementById('userName').value;
//                        var fullName = document.getElementById('fullname').value;
//                        var role = document.getElementById("role").value;
//                        var designation = document.getElementById("designation").value;
//                        var tel = document.getElementById("tel").value;
//                        var speciality = document.getElementById("spe").value;
//                        var status = document.getElementById("status").value;
//                        var uni = document.getElementById("uni").value;
//
//                        if (designation == 'Select One..' || fullName=="" || email=="" || speciality=="" ||tel.length!=10 || !IsEmail(email)) {
//
//                            if(designation == 'Select One..'){
//                                $('#designationDiv').addClass('has-error');
//                            }
//                            if(fullName==""){
//                                $('#fullNameDiv').addClass('has-error');
//
//                            }if(email=="" || !IsEmail(email)){
//                                $('#emailDiv').addClass('has-error');
//                            }
//                            if(speciality==""){
//                                $('#speciality').addClass('has-error');
//                            }
//                            if(tel.length!=10){
//                                $('#teliv').addClass('has-error');
//                            }
//                            swal("Error!", "Something wrong with your inputs !!", "error");
//                        }
//                        else{
//
//
//
//                            $.ajax({
//
//                                type: "GET",
//                                url: 'updateExternalSupervisorUpdate',
//                                data: {
//                                    "username": userName,
//                                    "email": email,
//                                    "fullName": fullName,
//                                    "role": role,
//                                    "designation": designation,
//                                    "tel": tel,
//                                    "speciality": speciality,
//                                    "status": status, "uni": uni
//                                },
//                                dataType: 'json'
//                            }).done(function (data) {
//
//                                swal("Updated!", "Your selected Supervisor details has been Updated.", "success");
//
//                            }).fail(function (data) {
//                                swal("Error!", "Something wrong.", "error");
//                            });
//                        }
//
//
//
//                    }).fail( function() {
//                        alert( 'something wrong' );
//                    });
//
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
//        }

</script>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
  <script>
      /* Tab selecter */
//    $(function() {
//    $( "#tabs" ).tabs();
//    $('#tabs').click('tabsselect', function (event, ui) {
//          alert($("#tabs").tabs('option', 'active'));
//    });
//  }); 
  </script>