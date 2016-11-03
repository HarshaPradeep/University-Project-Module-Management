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
  <ul class="nav nav-tabs" >
      <li role="presentation" class="active" ><a href="#member1" aria-controls="home" role="tab" data-toggle="tab" class="ui-tabs-nav" onclick="getselected(this)" id="tabnav1">Please Select Group ID</a></li>
    <li role="presentation" ><a href="#member2" aria-controls="profile" role="tab" data-toggle="tab" class="ui-tabs-nav" onclick="getselected(this)" id="tabnav2"></a></li>
    <li role="presentation" ><a href="#member3" aria-controls="messages" role="tab" data-toggle="tab" class="ui-tabs-nav" onclick="getselected(this)" id="tabnav3"></a></li>
    <li role="presentation" ><a href="#member4" aria-controls="settings" role="tab" data-toggle="tab" class="ui-tabs-nav" onclick="getselected(this)" id="tabnav4"></a></li>
    <li role="presentation" ><a href="#member5" aria-controls="settings" role="tab" data-toggle="tab" class="ui-tabs-nav" id="tabnav5" onclick="getselected(this)"></a></li>

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
                        <input type="text" id="finalmarksforprotab1" placeholder="0" disabled style="width: 80px">
                        <p><input type="number"  style="width: 65px; margin-top: 5px" name="marksforproposalpresenttab1" class="marksforproposaltab1"  > Marks <br>
                            <input type="number"  style="width: 65px; margin-top: 2px" name="marksforproposalreporttab1" class="marksforproposaltab1"  > Marks</p></td>
               </tr>
               
               <tr>
                    <td style="width: 1000px"><strong>SRS Submission</strong> (9%)
                        <br><p style="padding-top: 10px">&emsp; Report (9%)
                            <br>&emsp; Status Document (2%)
                        </p></td>

                    <td style="width: 200px">
                        <input type="text" id="finalmarksforsrstab1" placeholder="0" disabled style="width: 80px">
                        <p><input type="number"  style="width: 65px; margin-top: 5px" name="marksforsrstab1" class="marksforsrstab1"  > Marks
                        <br><input type="number"  style="width: 65px; margin-top: 5px" name="marksforsrsstatusdoctab1" class="marksforstatusdoctab1"  > Marks</p></td>
               </tr>
               
               <tr>
                    <td style="width: 1000px"><strong>Prototype</strong> (15%)
                        <br><p style="padding-top: 10px">&emsp; Presentation (15%) 
                        </p></td>

                    <td style="width: 200px">
                        <input type="text" id="finalmarksforprotypetab1" placeholder="0" disabled style="width: 80px">
                        <p><input type="number"  style="width: 65px; margin-top: 5px" name="marksforprototab1" class="marksforprototypetab1"  > Marks</p></td>
               </tr>
               
               <tr>
                    <td style="width: 1000px"><strong>Mid Review</strong> (20%)
                        <br><p style="padding-top: 10px">&emsp; Presentation (10%) 
                        <br>&emsp; Report (10%)</p></td>

                    <td style="width: 200px">
                        <input type="text" id="finalmarksformidtab1" placeholder="0" disabled style="width: 80px">
                        <p><input type="number"  style="width: 65px; margin-top: 5px" name="marksformidpresentab1" class="marksformidreviewtab1"  > Marks <br>
                            <input type="number"  style="width: 65px; margin-top: 2px" name="marksfomidreporttab1" class="marksformidreviewtab1"> marks</p></td>
               </tr>
               
               <tr>
                    <td style="width: 1000px"><strong>Final Submission</strong> (15%)
                        <br><p style="padding-top: 10px">&emsp; Presentation (10%) 
                        <br>&emsp; Report (5%)
                        <br>&emsp; Status Document (2%)</p></td>

                    <td style="width: 200px">
                        <input type="text" id="finalmarksforpresentationtab1" placeholder="0" disabled style="width: 80px">
                        <p><input type="number"  style="width: 65px; margin-top: 5px" name="marksforfinalpresnttab1" class="marksforfinalpresentationtab1"  > Marks <br>
                            <input type="number"  style="width: 65px; margin-top: 2px" name="marksforfinalreporttab1" class="marksforfinalpresentationsecondtab1"  > Marks
                        <br><input type="number"  style="width: 65px; margin-top: 5px" name="marksforfinalstatusdoctab1" class="marksforfinalstatusdoctab1"  > Marks
                        </p></td>
               </tr>
               
               <tr>
                    <td style="width: 1000px"><strong>Viva</strong> (15%)
                        <br><p style="padding-top: 10px">&emsp; Viva (15%) </p></td>

                    <td style="width: 200px">
                        <input type="text" id="finalmarksforvivatab1" placeholder="0" disabled style="width: 80px">
                        <p><input type="number"  style="width: 65px; margin-top: 5px" name="marksforvivatab1" class="marksforvivatab1"  > Marks <br></p></td>
               </tr>
               
               <tr>
                    <td style="width: 1000px"><strong>Other Assessment</strong> (15%)
                        <br><p style="padding-top: 11px">&emsp; Research Book (4%)
                        <br>&emsp; Research Paper (4%)
                        <br>&emsp; Website (4%)</p></td>

                    <td style="width: 200px">
                        <input type="text" id="finalmarksforotherstab1" placeholder="0" disabled style="width: 80px">
                        <p><input type="number"  style="width: 65px; margin-top: 5px" name="marksforresearchbooktab1" class="marksforothertab1"  > Marks <br>
                            <input type="number"  style="width: 65px; margin-top: 2px" name="marksforresearchpapertab1" class="marksforothertab1"  > Marks <br>
                            <input type="number"  style="width: 65px; margin-top: 2px" name="marksforwebsitetab1" class="marksforothertab1"  > Marks</p></td>
               </tr>
            </tbody>
        </table>
        <div align="right" style="margin-left: 620px"> <input type="button"style="float: left" value="Get Total" class="save_btn btn btn-primary btn-xl m-l-sm" onclick="getTotal()"></div>
        <div align="right" style="padding-right: 42px">
            
            <input type="text"  placeholder="Total" style="width: 50px; height: 35px" disabled>  
            <input type="text" name="totaltab1" id="mem1total" style="width: 50px; height: 35px" readonly > <b>Marks</b></div>
<br>
<div><textarea name="cmntmem0" readonly rows="4" cols="80" placeholder="Comment" id="cmntmem0"></textarea></div><br>
<div><select name="statustab1" ><option> Present </option>
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
                        <input type="text" id="finalmarksforprotab2" placeholder="0" disabled style="width: 80px">
                        <p><input type="number"  style="width: 65px; margin-top: 5px" name="marksforproposalpresenttab2" class="marksforproposaltab2"  > Marks <br>
                            <input type="number"  style="width: 65px; margin-top: 2px" name="marksforproposalreporttab2" class="marksforproposaltab2"  > Marks</p></td>
               </tr>
               
               <tr>
                    <td style="width: 1000px"><strong>SRS Submission</strong> (10%)
                        <br><p style="padding-top: 10px">&emsp; Report (10%)
                            <br>&emsp; Status Document (2%)
                        </p></td>

                    <td style="width: 200px">
                        <input type="text" id="finalmarksforsrstab2" placeholder="0" disabled style="width: 80px">
                        <p><input type="number"  style="width: 65px; margin-top: 5px" name="marksforsrstab2" class="marksforsrstab2"  > Marks
                        <br><input type="number"  style="width: 65px; margin-top: 5px" name="marksforsrsstatusdoctab2" class="marksforstatusdoctab2"  > Marks</p></td>
               </tr>
               
               <tr>
                    <td style="width: 1000px"><strong>Prototype</strong> (15%)
                        <br><p style="padding-top: 10px">&emsp; Presentation (15%) 
                        </p></td>

                    <td style="width: 200px">
                        <input type="text" id="finalmarksforprotypetab2" placeholder="0" disabled style="width: 80px">
                        <p><input type="number"  style="width: 65px; margin-top: 5px" name="marksforprototab2" class="marksforprototypetab2"  > Marks</p></td>
               </tr>
               
               <tr>
                    <td style="width: 1000px"><strong>Mid Review</strong> (20%)
                        <br><p style="padding-top: 10px">&emsp; Presentation (10%) 
                        <br>&emsp; Report (10%)</p></td>

                    <td style="width: 200px">
                        <input type="text" id="finalmarksformidtab2" placeholder="0" disabled style="width: 80px">
                        <p><input type="number"  style="width: 65px; margin-top: 5px" name="marksformidpresentab2" class="marksformidreviewtab2"  > Marks <br>
                            <input type="number"  style="width: 65px; margin-top: 2px" name="marksfomidreporttab2" class="marksformidreviewtab2"> marks</p></td>
               </tr>
               
               <tr>
                    <td style="width: 1000px"><strong>Final Submission</strong> (15%)
                        <br><p style="padding-top: 10px">&emsp; Presentation (10%) 
                        <br>&emsp; Report (5%)
                        <br>&emsp; Status Document (2%)
                        </p></td>

                    <td style="width: 200px">
                        <input type="text" id="finalmarksforpresentationtab2" placeholder="0" disabled style="width: 80px">
                        <p><input type="number"  style="width: 65px; margin-top: 5px" name="marksforfinalpresnttab2" class="marksforfinalpresentationtab2"  > Marks <br>
                            <input type="number"  style="width: 65px; margin-top: 2px" name="marksforfinalreporttab2" class="marksforfinalpresentationsecondtab2"  > Marks
                        <br><input type="number"  style="width: 65px; margin-top: 5px" name="marksforfinalstatusdoctab2" class="marksforfinalstatusdoctab2"  > Marks
                        </p></td>
               </tr>
               
               <tr>
                    <td style="width: 1000px"><strong>Viva</strong> (15%)
                        <br><p style="padding-top: 10px">&emsp; Viva (15%) </p></td>

                    <td style="width: 200px">
                        <input type="text" id="finalmarksforvivatab2" placeholder="0" disabled style="width: 80px">
                        <p><input type="number"  style="width: 65px; margin-top: 5px" name="marksforvivatab2" class="marksforvivatab2"  > Marks <br></p></td>
               </tr>
               
               <tr>
                    <td style="width: 1000px"><strong>Other Assessment</strong> (15%)
                        <br><p style="padding-top: 11px">&emsp; Research Book (5%)
                        <br>&emsp; Research Paper (5%)
                        <br>&emsp; Website (5%)</p></td>

                    <td style="width: 200px">
                        <input type="text" id="finalmarksforotherstab2" placeholder="0" disabled style="width: 80px">
                        <p><input type="number"  style="width: 65px; margin-top: 5px" name="marksforresearchbooktab2" class="marksforothertab2"  > Marks <br>
                            <input type="number"  style="width: 65px; margin-top: 2px" name="marksforresearchpapertab2" class="marksforothertab2"  > Marks <br>
                            <input type="number"  style="width: 65px; margin-top: 2px" name="marksforwebsitetab2" class="marksforothertab2"  > Marks</p></td>
               </tr>
            </tbody>
        </table>
        <div align="right" style="margin-left: 620px"> <input type="button"style="float: left" value="Get Total" class="save_btn btn btn-primary btn-xl m-l-sm" onclick="getTotal()"></div>
        <div align="right" style="padding-right: 42px">
            
            <input type="text"  placeholder="Total" style="width: 50px; height: 35px" disabled>  
            <input type="text" name="totaltab2" id="mem2total" style="width: 50px; height: 35px" readonly > <b>Marks</b></div>
<br>
        <div><textarea name="cmntmem1" rows="4" cols="80" placeholder="Comment" id="cmntmem1"></textarea></div><br>
        <div><select name="statustab2" ><option> Present </option>
                                            <option> Absent </option></select></div>
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
                        <input type="text" id="finalmarksforprotab3" placeholder="0" disabled style="width: 80px">
                        <p><input type="number"  style="width: 65px; margin-top: 5px" name="marksforproposalpresenttab3" class="marksforproposaltab3"  > Marks <br>
                            <input type="number"  style="width: 65px; margin-top: 2px" name="marksforproposalreporttab3" class="marksforproposaltab3"  > Marks</p></td>
               </tr>
               
               <tr>
                    <td style="width: 1000px"><strong>SRS Submission</strong> (10%)
                        <br><p style="padding-top: 10px">&emsp; Report (10%)
                            <br>&emsp; Status Document (2%)
                        </p></td>

                    <td style="width: 200px">
                        <input type="text" id="finalmarksforsrstab3" placeholder="0" disabled style="width: 80px">
                        <p><input type="number"  style="width: 65px; margin-top: 5px" name="marksforsrstab3" class="marksforsrstab3"  > Marks
                        <br><input type="number"  style="width: 65px; margin-top: 5px" name="marksforsrsstatusdoctab3" class="marksforstatusdoctab3"  > Marks</p></td>
               </tr>
               
               <tr>
                    <td style="width: 1000px"><strong>Prototype</strong> (15%)
                        <br><p style="padding-top: 10px">&emsp; Presentation (15%) 
                        </p></td>

                    <td style="width: 200px">
                        <input type="text" id="finalmarksforprotypetab3" placeholder="0" disabled style="width: 80px">
                        <p><input type="number"  style="width: 65px; margin-top: 5px" name="marksforprototab3" class="marksforprototypetab3"  > Marks</p></td>
               </tr>
               
               <tr>
                    <td style="width: 1000px"><strong>Mid Review</strong> (20%)
                        <br><p style="padding-top: 10px">&emsp; Presentation (10%) 
                        <br>&emsp; Report (10%)</p></td>

                    <td style="width: 200px">
                        <input type="text" id="finalmarksformidtab3" placeholder="0" disabled style="width: 80px">
                        <p><input type="number"  style="width: 65px; margin-top: 5px" name="marksformidpresentab3" class="marksformidreviewtab3"  > Marks <br>
                            <input type="number"  style="width: 65px; margin-top: 2px" name="marksfomidreporttab3" class="marksformidreviewtab3"> marks</p></td>
               </tr>
               
               <tr>
                    <td style="width: 1000px"><strong>Final Submission</strong> (15%)
                        <br><p style="padding-top: 10px">&emsp; Presentation (10%) 
                        <br>&emsp; Report (5%)
                        <br>&emsp; Status Document (2%)
                        </p></td>

                    <td style="width: 200px">
                        <input type="text" id="finalmarksforpresentationtab3" placeholder="0" disabled style="width: 80px">
                        <p><input type="number"  style="width: 65px; margin-top: 5px" name="marksforfinalpresnttab3" class="marksforfinalpresentationtab3"  > Marks <br>
                            <input type="number"  style="width: 65px; margin-top: 2px" name="marksforfinalreporttab3" class="marksforfinalpresentationsecondtab3"  > Marks
                        <br><input type="number"  style="width: 65px; margin-top: 5px" name="marksforfinalstatusdoctab3" class="marksforfinalstatusdoctab3"  > Marks</p></td>
               </tr>
               
               <tr>
                    <td style="width: 1000px"><strong>Viva</strong> (15%)
                        <br><p style="padding-top: 10px">&emsp; Viva (15%) </p></td>

                    <td style="width: 200px">
                        <input type="text" id="finalmarksforvivatab3" placeholder="0" disabled style="width: 80px">
                        <p><input type="number"  style="width: 65px; margin-top: 5px" name="marksforvivatab3" class="marksforvivatab3"  > Marks <br></p></td>
               </tr>
               
               <tr>
                    <td style="width: 1000px"><strong>Other Assessment</strong> (15%)
                        <br><p style="padding-top: 11px">&emsp; Research Book (5%)
                        <br>&emsp; Research Paper (5%)
                        <br>&emsp; Website (5%)</p></td>

                    <td style="width: 200px">
                        <input type="text" id="finalmarksforotherstab3" placeholder="0" disabled style="width: 80px">
                        <p><input type="number"  style="width: 65px; margin-top: 5px" name="marksforresearchbooktab3" class="marksforothertab3"  > Marks <br>
                            <input type="number"  style="width: 65px; margin-top: 2px" name="marksforresearchpapertab3" class="marksforothertab3"  > Marks <br>
                            <input type="number"  style="width: 65px; margin-top: 2px" name="marksforwebsitetab3" class="marksforothertab3"  > Marks</p></td>
               </tr>
            </tbody>
        </table>
        <div align="right" style="margin-left: 620px"> <input type="button"style="float: left" value="Get Total" class="save_btn btn btn-primary btn-xl m-l-sm" onclick="getTotal()"></div>
        <div align="right" style="padding-right: 42px">
            
            <input type="text"  placeholder="Total" style="width: 50px; height: 35px" disabled>  
            <input type="text" name="totaltab3" id="mem3total" style="width: 50px; ; height: 35px" readonly placeholder="0"> <b>Marks</b></div>
<br>
        <div><textarea name="cmntmem2" readonly rows="4" cols="80" placeholder="Comment" id="cmntmem2"></textarea></div><br>
        <div><select name="statustab3" ><option> Present </option>
                                            <option> Absent </option></select></div>
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
                        <input type="text" id="finalmarksforprotab4" placeholder="0" disabled style="width: 80px">
                        <p><input type="number"  style="width: 65px; margin-top: 5px" name="marksforproposalpresenttab4" class="marksforproposaltab4"  > Marks <br>
                            <input type="number"  style="width: 65px; margin-top: 2px" name="marksforproposalreporttab4" class="marksforproposaltab4"  > Marks</p></td>
               </tr>
               
               <tr>
                    <td style="width: 1000px"><strong>SRS Submission</strong> (10%)
                        <br><p style="padding-top: 10px">&emsp; Report (10%)
                            <br>&emsp; Status Document (2%)
                        </p></td>

                    <td style="width: 200px">
                        <input type="text" id="finalmarksforsrstab4" placeholder="0" disabled style="width: 80px">
                        <p><input type="number"  style="width: 65px; margin-top: 5px" name="marksforsrstab4" class="marksforsrstab4"  > Marks
                        <br><input type="number"  style="width: 65px; margin-top: 5px" name="marksforsrsstatusdoctab4" class="marksforstatusdoctab4"  > Marks</p></td>
               </tr>
               
               <tr>
                    <td style="width: 1000px"><strong>Prototype</strong> (15%)
                        <br><p style="padding-top: 10px">&emsp; Presentation (15%) 
                        </p></td>

                    <td style="width: 200px">
                        <input type="text" id="finalmarksforprotypetab4" placeholder="0" disabled style="width: 80px">
                        <p><input type="number"  style="width: 65px; margin-top: 5px" name="marksforprototab4" class="marksforprototypetab4"  > Marks</p></td>
               </tr>
               
               <tr>
                    <td style="width: 1000px"><strong>Mid Review</strong> (20%)
                        <br><p style="padding-top: 10px">&emsp; Presentation (10%) 
                        <br>&emsp; Report (10%)</p></td>

                    <td style="width: 200px">
                        <input type="text" id="finalmarksformidtab4" placeholder="0" disabled style="width: 80px">
                        <p><input type="number"  style="width: 65px; margin-top: 5px" name="marksformidpresentab4" class="marksformidreviewtab4"  > Marks <br>
                            <input type="number"  style="width: 65px; margin-top: 2px" name="marksfomidreporttab4" class="marksformidreviewtab4"> marks</p></td>
               </tr>
               
               <tr>
                    <td style="width: 1000px"><strong>Final Submission</strong> (15%)
                        <br><p style="padding-top: 10px">&emsp; Presentation (10%) 
                        <br>&emsp; Report (5%)
                        <br>&emsp; Status Document (2%)
                        </p></td>

                    <td style="width: 200px">
                        <input type="text" id="finalmarksforpresentationtab4" placeholder="0" disabled style="width: 80px">
                        <p><input type="number"  style="width: 65px; margin-top: 5px" name="marksforfinalpresnttab4" class="marksforfinalpresentationtab4"  > Marks <br>
                            <input type="number"  style="width: 65px; margin-top: 2px" name="marksforfinalreporttab4" class="marksforfinalpresentationsecondtab4"  > Marks
                        <br><input type="number"  style="width: 65px; margin-top: 5px" name="marksforfinalstatusdoctab4" class="marksforfinalstatusdoctab4"  > Marks</p></td>
               </tr>
               
               <tr>
                    <td style="width: 1000px"><strong>Viva</strong> (15%)
                        <br><p style="padding-top: 10px">&emsp; Viva (15%) </p></td>

                    <td style="width: 200px">
                        <input type="text" id="finalmarksforvivatab4" placeholder="0" disabled style="width: 80px">
                        <p><input type="number"  style="width: 65px; margin-top: 5px" name="marksforvivatab4" class="marksforvivatab4"  > Marks <br></p></td>
               </tr>
               
               <tr>
                    <td style="width: 1000px"><strong>Other Assessment</strong> (15%)
                        <br><p style="padding-top: 11px">&emsp; Research Book (5%)
                        <br>&emsp; Research Paper (4%)
                        <br>&emsp; Website (4%)</p></td>

                    <td style="width: 200px">
                        <input type="text" id="finalmarksforotherstab4" placeholder="0" disabled style="width: 80px">
                        <p><input type="number"  style="width: 65px; margin-top: 5px" name="marksforresearchbooktab4" class="marksforothertab4"  > Marks <br>
                            <input type="number"  style="width: 65px; margin-top: 2px" name="marksforresearchpapertab4" class="marksforothertab4"  > Marks <br>
                            <input type="number"  style="width: 65px; margin-top: 2px" name="marksforwebsitetab4" class="marksforothertab4"  > Marks</p></td>
               </tr>
            </tbody>
        </table>
        <div align="right" style="margin-left: 620px"> <input type="button"style="float: left" value="Get Total" class="save_btn btn btn-primary btn-xl m-l-sm" onclick="getTotal()"></div>
        <div align="right" style="padding-right: 42px">
            
            <input type="text"  placeholder="Total" style="width: 50px; height: 35px" disabled>  
            <input type="text" name="totaltab4" id="mem4total" style="width: 50px; ; height: 35px" readonly placeholder="0"> <b>Marks</b></div>
<br>
        <div><textarea name="cmntmem3" readonly rows="4" cols="80" placeholder="Comment" id="cmntmem3"></textarea></div><br>
        <div><select name="statustab4" ><option> Present </option>
                                            <option> Absent </option></select></div>
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
                        <input type="text" id="finalmarksforprotab5" placeholder="0" disabled style="width: 80px">
                        <p><input type="number"  style="width: 65px; margin-top: 5px" name="marksforproposalpresenttab5" class="marksforproposaltab5"  > Marks <br>
                            <input type="number"  style="width: 65px; margin-top: 2px" name="marksforproposalreporttab5" class="marksforproposaltab5"  > Marks</p></td>
               </tr>
               
               <tr>
                    <td style="width: 1000px"><strong>SRS Submission</strong> (12%)
                        <br><p style="padding-top: 10px">&emsp; Report (10%)
                            <br>&emsp; Status Document (2%)
                        </p></td>

                    <td style="width: 200px">
                        <input type="text" id="finalmarksforsrstab5" placeholder="0" disabled style="width: 80px">
                        <p><input type="number"  style="width: 65px; margin-top: 5px" name="marksforsrstab5" class="marksforsrstab5"  > Marks
                        <br><input type="number"  style="width: 65px; margin-top: 5px" name="marksforsrsstatusdoctab5" class="marksforstatusdoctab5"  > Marks</p></td>
               </tr>
               
               <tr>
                    <td style="width: 1000px"><strong>Prototype</strong> (15%)
                        <br><p style="padding-top: 10px">&emsp; Presentation (15%) 
                        </p></td>

                    <td style="width: 200px">
                        <input type="text" id="finalmarksforprotypetab5" placeholder="0" disabled style="width: 80px">
                        <p><input type="number"  style="width: 65px; margin-top: 5px" name="marksforprototab5" class="marksforprototypetab5"  > Marks</p></td>
               </tr>
               
               <tr>
                    <td style="width: 1000px"><strong>Mid Review</strong> (20%)
                        <br><p style="padding-top: 10px">&emsp; Presentation (10%) 
                        <br>&emsp; Report (10%)</p></td>

                    <td style="width: 200px">
                        <input type="text" id="finalmarksformidtab5" placeholder="0" disabled style="width: 80px">
                        <p><input type="number"  style="width: 65px; margin-top: 5px" name="marksformidpresentab5" class="marksformidreviewtab5"  > Marks <br>
                            <input type="number"  style="width: 65px; margin-top: 2px" name="marksfomidreporttab5" class="marksformidreviewtab5"> marks</p></td>
               </tr>
               
               <tr>
                    <td style="width: 1000px"><strong>Final Submission</strong> (17%)
                        <br><p style="padding-top: 10px">&emsp; Presentation (10%) 
                        <br>&emsp; Report (5%)
                        <br>&emsp; Status Document (2%)
                        </p></td>

                    <td style="width: 200px">
                        <input type="text" id="finalmarksforpresentationtab5" placeholder="0" disabled style="width: 80px">
                        <p><input type="number"  style="width: 65px; margin-top: 5px" name="marksforfinalpresnttab5" class="marksforfinalpresentationtab5"  > Marks <br>
                            <input type="number"  style="width: 65px; margin-top: 2px" name="marksforfinalreporttab5" class="marksforfinalpresentationsecondtab5"  > Marks
                        <br><input type="number"  style="width: 65px; margin-top: 5px" name="marksforfinalstatusdoctab5" class="marksforfinalstatusdoctab5"  > Marks</p></td>
               </tr>
               
               <tr>
                    <td style="width: 1000px"><strong>Viva</strong> (15%)
                        <br><p style="padding-top: 10px">&emsp; Viva (15%) </p></td>

                    <td style="width: 200px">
                        <input type="text" id="finalmarksforvivatab5" placeholder="0" disabled style="width: 80px">
                        <p><input type="number"  style="width: 65px; margin-top: 5px" name="marksforvivatab5" class="marksforvivatab5"  > Marks <br></p></td>
               </tr>
               
               <tr>
                    <td style="width: 1000px"><strong>Other Assessment</strong> (12%)
                        <br><p style="padding-top: 11px">&emsp; Research Book (4%)
                        <br>&emsp; Research Paper (4%)
                        <br>&emsp; Website (4%)</p></td>

                    <td style="width: 200px">
                        <input type="text" id="finalmarksforotherstab5" placeholder="0" disabled style="width: 80px">
                        <p><input type="number"  style="width: 65px; margin-top: 5px" name="marksforresearchbooktab5" class="marksforothertab5"  > Marks <br>
                            <input type="number"  style="width: 65px; margin-top: 2px" name="marksforresearchpapertab5" class="marksforothertab5"  > Marks <br>
                            <input type="number"  style="width: 65px; margin-top: 2px" name="marksforwebsitetab5" class="marksforothertab5"  > Marks</p></td>
               </tr>
            </tbody>
        </table>
        <div align="right" style="margin-left: 620px"> <input type="button"style="float: left" value="Get Total" class="save_btn btn btn-primary btn-xl m-l-sm" onclick="getTotal()"></div>
        <div align="right" style="padding-right: 42px">
            
            <input type="text"  placeholder="Total" style="width: 50px; height: 35px" disabled>  
            <input type="text" name="totaltab5" id="mem5total" style="width: 50px; ; height: 35px" readonly placeholder="0"> <b>Marks</b></div>
<br>
        <div><textarea name="cmntmem4" readonly rows="4" cols="80" placeholder="Comment" id="cmntmem4"></textarea></div><br>
        <div><select name="statustab5" ><option> Present </option>
                                            <option> Absent </option></select></div>
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
var studentNames = '';
var totviewfieldchange = 1;
function getselected(thisperson)
{
    document.getElementById('stuid').value = document.getElementById(thisperson.getAttribute('id')).innerHTML;
    document.getElementById('stuname').value = studentNames[thisperson.getAttribute('href').replace('#member','')-1];
    totviewfieldchange = parseInt(thisperson.getAttribute('href').replace('#member',''));
    javascriptLoader();
}  

function javascriptLoader()
{
//$(document).ready(function () {
    $('.marksforproposaltab'+totviewfieldchange).keyup(function () {
        var total = 0;
        $(".marksforproposaltab"+totviewfieldchange).each(function () {
            if(parseInt($(this).val()) > 100 || parseInt($(this).val()) < 0)
                    swal("Failed", "This Value Cannot be Accepted! :)", "error");
            var marks = (parseInt($(this).val())/100)*5;
            total += !isNaN(marks) ? marks : 0;

        });
        $('#finalmarksforprotab'+totviewfieldchange).val(total);
    });
//});

//$(document).ready(function () {
    $('.marksforsrstab'+totviewfieldchange).keyup(function () {
        var total = 0;
        $(".marksforsrstab"+totviewfieldchange).each(function () {
            if(parseInt($(this).val()) > 100 || parseInt($(this).val()) < 0)
                    swal("Failed", "This Value Cannot be Accepted! :)", "error");
            var marks = (parseInt($(this).val())/100)*10;
            total += !isNaN(marks) ? marks : 0;

        });
        $('#finalmarksforsrstab'+totviewfieldchange).val(total);
    });
//});

$('.marksforstatusdoctab'+totviewfieldchange).keyup(function () {
        var total = 0;
        $(".marksforstatusdoctab"+totviewfieldchange).each(function () {
            if(parseInt($(this).val()) > 100 || parseInt($(this).val()) < 0)
                    swal("Failed", "This Value Cannot be Accepted! :)", "error");
            var marks = (parseInt($(this).val())/100)*2;
            total += !isNaN(marks) ? marks : 0;

        });
        var temp3 = (parseInt($('#finalmarksforsrstab'+totviewfieldchange).val()));
        $('#finalmarksforsrstab'+totviewfieldchange).val(temp3 + total);
    });

//$(document).ready(function () {
    $('.marksforprototypetab'+totviewfieldchange).keyup(function () {
        var total = 0;
        $(".marksforprototypetab"+totviewfieldchange).each(function () {
            if(parseInt($(this).val()) > 100 || parseInt($(this).val()) < 0)
                    swal("Failed", "This Value Cannot be Accepted! :)", "error");
            var marks = (parseInt($(this).val())/100)*15;
            total += !isNaN(marks) ? marks : 0;

        });
        $('#finalmarksforprotypetab'+totviewfieldchange).val(total);
    });
//});

//$(document).ready(function () {
    $('.marksformidreviewtab'+totviewfieldchange).keyup(function () {
        var total = 0;
        $(".marksformidreviewtab"+totviewfieldchange).each(function () {
            if(parseInt($(this).val()) > 100 || parseInt($(this).val()) < 0)
                    swal("Failed", "This Value Cannot be Accepted! :)", "error");
            var marks = (parseInt($(this).val())/100)*10;
            total += !isNaN(marks) ? marks : 0;

        });
        $('#finalmarksformidtab'+totviewfieldchange).val(total);
    });
//});
//////////////////////////////10%//////////////////////////////////////
//$(document).ready(function () {
    $('.marksforfinalpresentationtab'+totviewfieldchange).keyup(function () {
        var total = 0;
        $(".marksforfinalpresentationtab"+totviewfieldchange).each(function () {
            if(parseInt($(this).val()) > 100 || parseInt($(this).val()) < 0)
                    swal("Failed", "This Value Cannot be Accepted! :)", "error");
            var marks = (parseInt($(this).val())/100)*10;
            total += !isNaN(marks) ? marks : 0;
             
        });    
        //alert($('#finalmarksforpresentation').val()) ;
        $('#finalmarksforpresentationtab'+totviewfieldchange).val(total);
    });        
//});
//////////////////////////////5%//////////////////////////////////////
//$(document).ready(function () {
    $('.marksforfinalpresentationsecondtab'+totviewfieldchange).keyup(function () {
        var total = 0;
        $(".marksforfinalpresentationsecondtab"+totviewfieldchange).each(function () {
            if(parseInt($(this).val()) > 100 || parseInt($(this).val()) < 0)
                    swal("Failed", "This Value Cannot be Accepted! :)", "error");
            var marks = (parseInt($(this).val())/100)*5;
            total += !isNaN(marks) ? marks : 0;
             
        });    
        var temp2 = (parseInt($('#finalmarksforpresentationtab'+totviewfieldchange).val()));
        //alert(temp2);
        $('#finalmarksforpresentationtab'+totviewfieldchange).val(temp2 + total);
    });        
//});

$('.marksforfinalstatusdoctab'+totviewfieldchange).keyup(function () {
        var total = 0;
        $(".marksforfinalstatusdoctab"+totviewfieldchange).each(function () {
            if(parseInt($(this).val()) > 100 || parseInt($(this).val()) < 0)
                    swal("Failed", "This Value Cannot be Accepted! :)", "error");
            var marks = (parseInt($(this).val())/100)*2;
            total += !isNaN(marks) ? marks : 0;

        });
        var temp3 = (parseInt($('#finalmarksforpresentationtab'+totviewfieldchange).val()));
        $('#finalmarksforpresentationtab'+totviewfieldchange).val(temp3 + total);
    });
    
////////////////////////////////////////////////////////////////////
//$(document).ready(function () {
    $('.marksforvivatab'+totviewfieldchange).keyup(function () {
        var total = 0;
        $(".marksforvivatab"+totviewfieldchange).each(function () {
            if(parseInt($(this).val()) > 100 || parseInt($(this).val()) < 0)
                    swal("Failed", "This Value Cannot be Accepted! :)", "error");
            var marks = (parseInt($(this).val())/100)*15;
            total += !isNaN(marks) ? marks : 0;

        });
        $('#finalmarksforvivatab'+totviewfieldchange).val(total);
    });
//});

//$(document).ready(function () {
    $('.marksforothertab'+totviewfieldchange).keyup(function () {
        var total = 0;
        $(".marksforothertab"+totviewfieldchange).each(function () {
            if(parseInt($(this).val()) > 100 || parseInt($(this).val()) < 0)
                    swal("Failed", "This Value Cannot be Accepted! :)", "error");
            var marks = (parseInt($(this).val())/100)*5;
            total += !isNaN(marks) ? marks : 0;

        });
        $('#finalmarksforotherstab'+totviewfieldchange).val(total);
    });
//});
}

function getTotal()
{//add trnry operation, get 0 if null
    var first2 = parseFloat(document.getElementById("finalmarksforprotab"+totviewfieldchange).value) +
              parseFloat(document.getElementById("finalmarksforsrstab"+totviewfieldchange).value);
      var second2 = parseFloat(document.getElementById("finalmarksforprotypetab"+totviewfieldchange).value) +
              parseFloat(document.getElementById("finalmarksformidtab"+totviewfieldchange).value);
      var third2 = parseFloat(document.getElementById("finalmarksforpresentationtab"+totviewfieldchange).value) +
              parseFloat(document.getElementById("finalmarksforvivatab"+totviewfieldchange).value);
      var forth1 = parseFloat(document.getElementById("finalmarksforotherstab"+totviewfieldchange).value);

    $('#mem'+totviewfieldchange+'total').val((Math.round((first2 + second2 + third2 + forth1) * 10) / 10));
}


//function getparent(thisperson)
//{
//    var tr = thisperson.parentNode.
//            parentNode.parentNode.
//            parentNode.parentNode.
//            parentNode;
//    alert(tr.getAttribute('id'));
//}

function selectStudentDetails()
{
    //$(" #container-1").load(location.href + " #container-1"); 
    var e = document.getElementById("stuIDs");
    var searchID = e.options[e.selectedIndex].value;
    
        $.ajax({
        type: "GET",
        url: '/searchstudentform',
        data: {"sid": searchID},
        dataType: 'json'
        
        }).done(function (data) {

            javascriptLoader();
            studentNames = data['sname'];
            document.getElementById('stuname').value = data['sname'][0];
            document.getElementById('protitle').value = data['title'];
            document.getElementById('proid').value = data['pid'];
            document.getElementById('stuid').value = data['ledrid'];
            
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