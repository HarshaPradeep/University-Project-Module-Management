@extends('......masterpages.master_panel_member')
@section('title')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Other Assessments</h2>
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
<div class="ibox-content" style="font-size: 14">
        <table class="table table-bordered">
            <tbody style="font-size: 15">                
                <tr>
                    <td style="width: 1000px"><strong>Other Assessments</strong> (12%)</td>
                </tr> 
                <tr>
                    <td style="width: 1000px"></td>
                    <td style="width: 1000px">Research Book (4%)</td>
                    <td style="width: 1000px">Research Paper (4%)</td>
                    <td style="width: 1000px">Website (4%)</td>
                </tr>
                <tr>
                    <td style="width: 1000px"><strong>Comment :</strong></td>
                    <td ><input type="text" style="width: 120px" id="cmnt1member1" onblur="getValue(this)" class="hh"></td>
                    <td ><input type="text" style="width: 120px" id="cmnt2member1" onblur="getValue(this)" class="hh"></td>
                    <td ><input type="text" style="width: 120px" id="cmnt3member1" onblur="getValue(this)" class="hh"></td>
                </tr> 
                <tr>
                    <td style="width: 1000px"><strong>Marks : (100%)</strong></td>
                    <td style="width: 1000px"><input type="number" style="width: 65px" onclick="getlo(this)" id="lo1mem1" name="propPresentation" class="lo1mem1"></td>
                    <td style="width: 1000px"><input type="number" style="width: 65px" onclick="getlo(this)" id="lo2mem1" name="propPresentation" class="lo2mem1"></td>
                    <td style="width: 1000px"><input type="number" style="width: 65px" onclick="getlo(this)" id="lo3mem1" name="propPresentation" class="lo3mem1"></td>
                </tr> 
                <tr>
                    <td style="width: 1000px"><strong>Marks : </strong></td>
                    <td style="width: 1000px"><input type="text" id="finalmarksforlo1mem1" disabled style="width: 55px"></td>
                    <td style="width: 1000px"><input type="text" id="finalmarksforlo2mem1" disabled style="width: 55px"></td>
                    <td style="width: 1000px"><input type="text" id="finalmarksforlo3mem1" disabled style="width: 55px"></td>
                </tr> 
            </tbody>
        </table>
        <div class="ibox-content"></div>
        <div align="right" style="margin-left: 620px"> <input type="button"style="float: left" value="Get Total" class="save_btn btn btn-primary btn-xl m-l-sm" onclick="getTotal()"></div>
        <div align="right" style="padding-right: 42px">
            
            <input type="text"  placeholder="Total" style="width: 50px; height: 35px" disabled> / 
            <input type="text" name="total" id="totalmem1" style="width: 50px; ; height: 35px" readonly placeholder="0"> <b>Marks</b></div>
<br>
<div><textarea name="cmntmem0" disabled rows="4" cols="80" placeholder="Comment" id="cmntmem0"></textarea></div><br>
       <div><select name="statustab2" ><option> Status </option>
                                            <option> Present </option>
                                            <option> Absent </option></select></div>
        <div id="member1sub" align="right" style="padding-right: 180px"> <input type='submit'  class="save_btn btn btn-primary btn-xl m-l-sm" name='editThesisFormMarks' align="right">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"></div>
    
</div>
      </div>
     
     <div role="tabpanel" class="tab-pane fade in" id="member2"> 
<div class="ibox-content" style="font-size: 14">
        <table class="table table-bordered">
            <tbody style="font-size: 15">                
                <tr>
                    <td style="width: 1000px"><strong>Other Assessments</strong> (12%)</td>
                </tr> 
                <tr>
                    <td style="width: 1000px"></td>
                    <td style="width: 1000px">Research Book (4%)</td>
                    <td style="width: 1000px">Research Paper (4%)</td>
                    <td style="width: 1000px">Website (4%)</td>
                </tr>
                <tr>
                    <td style="width: 1000px"><strong>Comment :</strong></td>
                    <td ><input type="text" style="width: 120px" id="cmnt1member2" onblur="getValue(this)" class="hh"></td>
                    <td ><input type="text" style="width: 120px" id="cmnt2member2" onblur="getValue(this)" class="hh"></td>
                    <td ><input type="text" style="width: 120px" id="cmnt3member2" onblur="getValue(this)" class="hh"></td>
                </tr> 
                <tr>
                    <td style="width: 1000px"><strong>Marks : (100%)</strong></td>
                    <td style="width: 1000px"><input type="number" style="width: 65px" onclick="getlo(this)" id="lo1mem2" name="propPresentation" class="lo1mem2"></td>
                    <td style="width: 1000px"><input type="number" style="width: 65px" onclick="getlo(this)" id="lo2mem2" name="propPresentation" class="lo2mem2"></td>
                    <td style="width: 1000px"><input type="number" style="width: 65px" onclick="getlo(this)" id="lo3mem2" name="propPresentation" class="lo3mem2"></td>
                </tr> 
                <tr>
                    <td style="width: 1000px"><strong>Marks : </strong></td>
                    <td style="width: 1000px"><input type="text" id="finalmarksforlo1mem2" disabled style="width: 55px"></td>
                    <td style="width: 1000px"><input type="text" id="finalmarksforlo2mem2" disabled style="width: 55px"></td>
                    <td style="width: 1000px"><input type="text" id="finalmarksforlo3mem2" disabled style="width: 55px"></td>
                </tr> 
            </tbody>
        </table>
        <div class="ibox-content"></div>
        <div align="right" style="margin-left: 620px"> <input type="button"style="float: left" value="Get Total" class="save_btn btn btn-primary btn-xl m-l-sm" onclick="getTotal()"></div>
        <div align="right" style="padding-right: 42px">
            
            <input type="text"  placeholder="Total" style="width: 50px; height: 35px" disabled> / 
            <input type="text" name="total" id="totalmem2" style="width: 50px; ; height: 35px" readonly placeholder="0"> <b>Marks</b></div>
<br>
        <div><textarea name="cmntmem1" disabled rows="4" cols="80" placeholder="Comment" id="cmntmem1"></textarea></div><br>
        <div><select name="statustab2" ><option> Status </option>
                                            <option> Present </option>
                                            <option> Absent </option></select></div>
        <div id="member2sub" align="right" style="padding-right: 180px"> <input type='submit'  class="save_btn btn btn-primary btn-xl m-l-sm" name='editThesisFormMarks' align="right">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"></div>
    
</div>
      </div>
     
<div role="tabpanel" class="tab-pane fade in" id="member3"> 
<div class="ibox-content" style="font-size: 14">
        <table class="table table-bordered">
            <tbody style="font-size: 15">                
                <tr>
                    <td style="width: 1000px"><strong>Other Assessments</strong> (12%)</td>
                </tr> 
                <tr>
                    <td style="width: 1000px"></td>
                    <td style="width: 1000px">Research Book (4%)</td>
                    <td style="width: 1000px">Research Paper (4%)</td>
                    <td style="width: 1000px">Website (4%)</td>
                <tr>
                    <td style="width: 1000px"><strong>Comment :</strong></td>
                    <td ><input type="text" style="width: 120px" id="cmnt1member3" onblur="getValue(this)" class="hh"></td>
                    <td ><input type="text" style="width: 120px" id="cmnt2member3" onblur="getValue(this)" class="hh"></td>
                    <td ><input type="text" style="width: 120px" id="cmnt3member3" onblur="getValue(this)" class="hh"></td>
                </tr> 
                <tr>
                    <td style="width: 1000px"><strong>Marks : (100%)</strong></td>
                    <td style="width: 1000px"><input type="number" style="width: 65px" onclick="getlo(this)" id="lo1mem3" name="propPresentation" class="lo1mem3"></td>
                    <td style="width: 1000px"><input type="number" style="width: 65px" onclick="getlo(this)" id="lo2mem3" name="propPresentation" class="lo2mem3"></td>
                    <td style="width: 1000px"><input type="number" style="width: 65px" onclick="getlo(this)" id="lo3mem3" name="propPresentation" class="lo3mem3"></td>
                </tr> 
                <tr>
                    <td style="width: 1000px"><strong>Marks : </strong></td>
                    <td style="width: 1000px"><input type="text" id="finalmarksforlo1mem3" disabled style="width: 55px"></td>
                    <td style="width: 1000px"><input type="text" id="finalmarksforlo2mem3" disabled style="width: 55px"></td>
                    <td style="width: 1000px"><input type="text" id="finalmarksforlo3mem3" disabled style="width: 55px"></td>
                </tr> 
            </tbody>
        </table>
        <div class="ibox-content"></div>
        <div align="right" style="margin-left: 620px"> <input type="button"style="float: left" value="Get Total" class="save_btn btn btn-primary btn-xl m-l-sm" onclick="getTotal()"></div>
        <div align="right" style="padding-right: 42px">
            
            <input type="text"  placeholder="Total" style="width: 50px; height: 35px" disabled> / 
            <input type="text" name="total" id="totalmem3" style="width: 50px; ; height: 35px" readonly placeholder="0"> <b>Marks</b></div>
<br>
        <div><textarea name="cmntmem2" disabled rows="4" cols="80" placeholder="Comment" id="cmntmem2"></textarea></div><br>
        <div><select name="statustab2" ><option> Status </option>
                                            <option> Present </option>
                                            <option> Absent </option></select></div>
        <div id="member3sub" align="right" style="padding-right: 180px"> <input type='submit'  class="save_btn btn btn-primary btn-xl m-l-sm" name='editThesisFormMarks' align="right">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"></div>
    
</div>
      </div>
     
<div role="tabpanel" class="tab-pane fade in" id="member4"> 
<div class="ibox-content" style="font-size: 14">
        <table class="table table-bordered">
            <tbody style="font-size: 15">                
                <tr>
                    <td style="width: 1000px"><strong>Other Assessments</strong> (12%)</td>
                </tr> 
                <tr>
                    <td style="width: 1000px"></td>
                    <td style="width: 1000px">Research Book (4%)</td>
                    <td style="width: 1000px">Research Paper (4%)</td>
                    <td style="width: 1000px">Website (4%)</td>
                </tr>
                <tr>
                    <td style="width: 1000px"><strong>Comment :</strong></td>
                    <td ><input type="text" style="width: 120px" id="cmnt1member4" onblur="getValue(this)" class="hh"></td>
                    <td ><input type="text" style="width: 120px" id="cmnt2member4" onblur="getValue(this)" class="hh"></td>
                    <td ><input type="text" style="width: 120px" id="cmnt3member4" onblur="getValue(this)" class="hh"></td>
                </tr> 
                <tr>
                    <td style="width: 1000px"><strong>Marks : (100%)</strong></td>
                    <td style="width: 1000px"><input type="number" style="width: 65px" onclick="getlo(this)" id="lo1mem4" name="propPresentation" class="lo1mem4"></td>
                    <td style="width: 1000px"><input type="number" style="width: 65px" onclick="getlo(this)" id="lo2mem4" name="propPresentation" class="lo2mem4"></td>
                    <td style="width: 1000px"><input type="number" style="width: 65px" onclick="getlo(this)" id="lo3mem4" name="propPresentation" class="lo3mem4"></td>
                </tr> 
                <tr>
                    <td style="width: 1000px"><strong>Marks : </strong></td>
                    <td style="width: 1000px"><input type="text" id="finalmarksforlo1mem4" disabled style="width: 55px"></td>
                    <td style="width: 1000px"><input type="text" id="finalmarksforlo2mem4" disabled style="width: 55px"></td>
                    <td style="width: 1000px"><input type="text" id="finalmarksforlo3mem4" disabled style="width: 55px"></td>
                </tr> 
            </tbody>
        </table>
        <div class="ibox-content"></div>
        <div align="right" style="margin-left: 620px"> <input type="button"style="float: left" value="Get Total" class="save_btn btn btn-primary btn-xl m-l-sm" onclick="getTotal()"></div>
        <div align="right" style="padding-right: 42px">
            
            <input type="text"  placeholder="Total" style="width: 50px; height: 35px" disabled> / 
            <input type="text" name="total" id="totalmem4" style="width: 50px; ; height: 35px" readonly placeholder="0"> <b>Marks</b></div>
<br>
        <div><textarea name="cmntmem3" disabled rows="4" cols="80" placeholder="Comment" id="cmntmem3"></textarea></div><br>
        <div><select name="statustab2" ><option> Status </option>
                                            <option> Present </option>
                                            <option> Absent </option></select></div>
        <div id="member4sub" align="right" style="padding-right: 180px"> <input type='submit'  class="save_btn btn btn-primary btn-xl m-l-sm" name='editThesisFormMarks' align="right">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"></div>
    
</div>
      </div>
     
<div role="tabpanel" class="tab-pane fade in" id="member5"> 
<div class="ibox-content" style="font-size: 14">
        <table class="table table-bordered">
            <tbody style="font-size: 15">                
                <tr>
                    <td style="width: 1000px"><strong>Other Assessments</strong> (12%)</td>
                </tr> 
                <tr>
                    <td style="width: 1000px"></td>
                    <td style="width: 1000px">Research Book (4%)</td>
                    <td style="width: 1000px">Research Paper (4%)</td>
                    <td style="width: 1000px">Website (4%)</td>
                </tr>
                <tr>
                    <td style="width: 1000px"><strong>Comment :</strong></td>
                    <td ><input type="text" style="width: 120px" id="cmnt1member5" onblur="getValue(this)" class="hh"></td>
                    <td ><input type="text" style="width: 120px" id="cmnt2member5" onblur="getValue(this)" class="hh"></td>
                    <td ><input type="text" style="width: 120px" id="cmnt3member5" onblur="getValue(this)" class="hh"></td>
                </tr> 
                <tr>
                    <td style="width: 1000px"><strong>Marks : (100%)</strong></td>
                    <td style="width: 1000px"><input type="number" style="width: 65px" onclick="getlo(this)" id="lo1mem5" name="propPresentation" class="lo1mem5"></td>
                    <td style="width: 1000px"><input type="number" style="width: 65px" onclick="getlo(this)" id="lo2mem5" name="propPresentation" class="lo2mem5"></td>
                    <td style="width: 1000px"><input type="number" style="width: 65px" onclick="getlo(this)" id="lo3mem5" name="propPresentation" class="lo3mem5"></td>
                </tr> 
                <tr>
                    <td style="width: 1000px"><strong>Marks : </strong></td>
                    <td style="width: 1000px"><input type="text" id="finalmarksforlo1mem5" disabled style="width: 55px"></td>
                    <td style="width: 1000px"><input type="text" id="finalmarksforlo2mem5" disabled style="width: 55px"></td>
                    <td style="width: 1000px"><input type="text" id="finalmarksforlo3mem5" disabled style="width: 55px"></td>
                </tr> 
            </tbody>
        </table>
        <div class="ibox-content"></div>
        <div align="right" style="margin-left: 620px"> <input type="button"style="float: left" value="Get Total" class="save_btn btn btn-primary btn-xl m-l-sm" onclick="getTotal()"></div>
        <div align="right" style="padding-right: 42px">
            
            <input type="text"  placeholder="Total" style="width: 50px; height: 35px" disabled> / 
            <input type="text" name="total" id="totalmem5" style="width: 50px; ; height: 35px" readonly placeholder="0"> <b>Marks</b></div>
<br>
<div><textarea name="cmntmem4" disabled rows="4" cols="80" placeholder="Comment" id="cmntmem4"></textarea></div><br>
        <div><select name="statustab2" ><option> Status </option>
                                            <option> Present </option>
                                            <option> Absent </option></select></div>
        <div id="member5sub" align="right" style="padding-right: 180px"> <input type='submit'  class="save_btn btn btn-primary btn-xl m-l-sm" name='editThesisFormMarks' align="right">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"></div>
    
</div>
      </div>
     
 </div>
 </div>
</div>
        </form>
        </div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">

 var studentNames = '';
 var totviewfieldchange = 1;
 var objid;
 var whtlo = 'lo1';
 var whtmem = 'mem1';
 
 function getselected(thisperson)
 {
    document.getElementById('stuid').value = document.getElementById(thisperson.getAttribute('id')).innerHTML;
    document.getElementById('stuname').value = studentNames[thisperson.getAttribute('href').replace('#member','')-1];
    totviewfieldchange = parseInt(thisperson.getAttribute('href').replace('#member',''));
    javascriptLoader();
 }  
 
 function getValue(obj)
 {
    objid = obj.id;
 }  
 
 function getlo(clz)
 {
     var lomarkid = clz.id;
     whtlo = lomarkid.substring(0,3);
     whtmem = lomarkid.substring(3,7);
     javascriptLoader();
 }
        
 function javascriptLoader()
 {    
    //$(document).ready(function () {
        $('.hh').click(function () {
            swal({
               title: "KEEP CALM!",
               text: "Write something interesting:",
               type: "input",
               showCancelButton: true,
               closeOnConfirm: false,
               animation: "slide-from-top",
               inputPlaceholder: "Write something" },
           function(inputValue)
           {
               if (inputValue === false)
                   return false;
               if (inputValue === "")
               {    
                   swal.showInputError("You need to write something!");
                   return false
               }  
             swal("Nice!", "You wrote: " + inputValue, "success");
    //           swal({
    //               title: 'Nice!',
    //               text: 'You wrote: ' + inputValue,
    //               timer: 1000
    //           });
               document.getElementById(objid).value = inputValue;
           }); 

        });
   // });

   // $(document).ready(function () {
        $('.lo1'+whtmem).keyup(function () {
            var total = 0;
            $(".lo1"+whtmem).each(function () {
                if(parseInt($(this).val()) > 100 || parseInt($(this).val()) < 0)
                    swal("Failed", "This Value Cannot be Accepted! :)", "error");
                var marks = (parseInt($(this).val())/100)*4;          
                total += !isNaN(marks) ? marks : 0;

            });
            $('#finalmarksforlo1'+whtmem).val(total);
        });
   // });

   // $(document).ready(function () {
        $('.lo2'+whtmem).keyup(function () {
            var total = 0;
            $(".lo2"+whtmem).each(function () {
                if(parseInt($(this).val()) > 100 || parseInt($(this).val()) < 0)
                    swal("Failed", "This Value Cannot be Accepted! :)", "error");
                var marks = (parseInt($(this).val())/100)*4;
                total += !isNaN(marks) ? marks : 0;

            });
            $('#finalmarksforlo2'+whtmem).val(total);
        });
   // });

   // $(document).ready(function () {
        $('.lo3'+whtmem).keyup(function () {
            var total = 0;
            $(".lo3"+whtmem).each(function () {
                if(parseInt($(this).val()) > 100 || parseInt($(this).val()) < 0)
                    swal("Failed", "This Value Cannot be Accepted! :)", "error");
                var marks = (parseInt($(this).val())/100)*4;
                total += !isNaN(marks) ? marks : 0;

            });
            $('#finalmarksforlo3'+whtmem).val(total);
        });
   // });
 }

 function selectStudentDetails()
 {
    //$(" #container-1").load(location.href + " #container-1"); 
    var e = document.getElementById("stuIDs");
    var searchID = e.options[e.selectedIndex].value;
    
        $.ajax({
        type: "GET",
        url: 'searchstudent',
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
            //$('#formform').children('input').val('');
            
            for(k = 0; k < 5; k++)
            {
                $($('.ui-tabs-nav')[k]).html("");
            }

            i=0;
            $.each(data['ids'], function (id,con){
                $($('.ui-tabs-nav')[i]).html(con);
                
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

function getTotal()
{//add trnry operation, get 0 if null
    var first2 = parseFloat(document.getElementById("finalmarksforlo1"+whtmem).value) +
              parseFloat(document.getElementById("finalmarksforlo2"+whtmem).value);
      var second2 = parseFloat(document.getElementById("finalmarksforlo3"+whtmem).value);

    $('#total'+whtmem).val((Math.round((first2 + second2) * 10) / 10));
}

</script>