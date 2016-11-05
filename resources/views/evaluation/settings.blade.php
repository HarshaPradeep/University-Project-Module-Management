@extends('masterpages.master_rpc')
@section('title')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Settings</h2>
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

<div id="tabs">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" >
        <li role="presentation" class="active" ><a href="#lo" aria-controls="home" role="tab" data-toggle="tab" class="ui-tabs-nav" id="tabnav1"><strong>Learning Outcome's Allocated Marks</strong></a></li>
        <li role="presentation" ><a href="#assmnt" aria-controls="profile" role="tab" data-toggle="tab" class="ui-tabs-nav"id="tabnav2"><strong>Assessment's Allocated Marks</strong></a></li>
    </ul>

    <!-- Tab panes -->

    <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade in active" id="lo"> 
            <form method="post" id="formform">
                <div class="ibox-content" style="font-size: 14">
                    <table class="table table-bordered">
                        <tbody style="font-size: 15">                
                            <tr>
                                <td style="width: 1000px"><strong>Proposal Presentation</strong></td>
                            </tr> 
                            <tr>
                                <td style="width: 1000px"></td>
                                <td style="width: 1000px">LO 1 * (?%)</td>
                                <td style="width: 1000px">LO 2 * (?%)</td>
                                <td style="width: 1000px">LO 3 * (?%)</td>
                                <td style="width: 1000px">LO 4 * (?%)</td>
                                <td style="width: 1000px">LO 5 * (?%)</td>
                            </tr>
                            <tr>
                                <td style="width: 1000px"><strong>Marks : </strong><input type="checkbox" title="Select to change values in Text Boxes" id="chkbox1" onchange="enableCheckboxes(this)" style="float: right"></td>
                                <td style="width: 1000px"><input type="number" value="{{$los->proplo1}}" name="lo1mem1" id="lo1mem1" disabled style="width: 65px"></td>
                                <td style="width: 1000px"><input type="number" value="{{$los->proplo2}}" name="lo2mem1" id="lo2mem1" disabled style="width: 65px"></td>
                                <td style="width: 1000px"><input type="number" value="{{$los->proplo3}}" name="lo3mem1" id="lo3mem1" disabled style="width: 65px"></td>
                                <td style="width: 1000px"><input type="number" value="{{$los->proplo4}}" name="lo4mem1" id="lo4mem1" disabled style="width: 65px"></td>
                                <td style="width: 1000px"><input type="number" value="{{$los->proplo5}}" name="lo5mem1" id="lo5mem1" disabled style="width: 65px"></td>
                            </tr> 
                        </tbody>
                    </table>

                    <div class="ibox-content"></div>

                    <table class="table table-bordered">
                        <tbody style="font-size: 15">                
                            <tr>
                                <td style="width: 1000px"><strong>Proposal Report</strong></td>
                            </tr> 
                            <tr>
                                <td style="width: 1000px"></td>
                                <td style="width: 1000px">LO 1 * (?%)</td>
                                <td style="width: 1000px">LO 2 * (?%)</td>
                                <td style="width: 1000px">LO 3 * (?%)</td>
                                <td style="width: 1000px">LO 4 * (?%)</td>
                                <td style="width: 1000px">LO 5 * (?%)</td>
                            </tr>
                            <tr>
                                <td style="width: 1000px"><strong>Marks : </strong><input type="checkbox" title="Select to change values in Text Boxes" id="chkbox2" onchange="enableCheckboxes(this)" style="float: right"></td>
                                <td style="width: 1000px"><input type="number" value="{{$los->propreportlo1}}" name="lo1mem2" id="lo1mem2" disabled style="width: 65px"></td>
                                <td style="width: 1000px"><input type="number" value="{{$los->propreportlo2}}" name="lo2mem2" id="lo2mem2" disabled style="width: 65px"></td>
                                <td style="width: 1000px"><input type="number" value="{{$los->propreportlo3}}" name="lo3mem2" id="lo3mem2" disabled style="width: 65px"></td>
                                <td style="width: 1000px"><input type="number" value="{{$los->propreportlo4}}" name="lo4mem2" id="lo4mem2" disabled style="width: 65px"></td>
                                <td style="width: 1000px"><input type="number" value="{{$los->propreportlo5}}" name="lo5mem2" id="lo5mem2" disabled style="width: 65px"></td>
                            </tr> 
                        </tbody>
                    </table>

                    <div class="ibox-content"></div>

                    <table class="table table-bordered">
                        <tbody style="font-size: 15">                
                            <tr>
                                <td style="width: 1000px"><strong>SRS and Status Documents</strong></td>
                            </tr> 
                            <tr>
                                <td style="width: 1000px"></td>
                                <td style="width: 1000px">LO 1 * (?%)</td>
                                <td style="width: 1000px">LO 2 * (?%)</td>
                                <td style="width: 1000px">LO 3 * (?%)</td>
                                <td style="width: 1000px">LO 4 * (?%)</td>
                                <td style="width: 1000px">Status Document (?%)</td>
                            </tr>
                            <tr>
                                <td style="width: 1000px"><strong>Marks : </strong><input type="checkbox" title="Select to change values in Text Boxes" id="chkbox3" onchange="enableCheckboxes(this)" style="float: right"></td>
                                <td style="width: 1000px"><input type="number" value="{{$los->srslo1}}" name="lo1mem3" id="lo1mem3" disabled style="width: 65px"></td>
                                <td style="width: 1000px"><input type="number" value="{{$los->srslo2}}" name="lo2mem3" id="lo2mem3" disabled style="width: 65px"></td>
                                <td style="width: 1000px"><input type="number" value="{{$los->srslo3}}" name="lo3mem3" id="lo3mem3" disabled style="width: 65px"></td>
                                <td style="width: 1000px"><input type="number" value="{{$los->srslo4}}" name="lo4mem3" id="lo4mem3" disabled style="width: 65px"></td>
                                <td style="width: 1000px"><input type="number" value="{{$los->srsstatus}}" name="lo5mem3" id="lo5mem3" disabled style="width: 65px"></td>
                            </tr> 
                        </tbody>
                    </table>

                    <div class="ibox-content"></div>

                    <table class="table table-bordered">
                        <tbody style="font-size: 15">                
                            <tr>
                                <td style="width: 1000px"><strong>Prototype Presentation</strong></td>
                            </tr> 
                            <tr>
                                <td style="width: 1000px"></td>
                                <td style="width: 1000px">LO 1 * (?%)</td>
                                <td style="width: 1000px">LO 2 * (?%)</td>
                                <td style="width: 1000px">LO 3 * (?%)</td>
                                <td style="width: 1000px">LO 4 * (?%)</td>
                                <td style="width: 1000px">LO 5 * (?%)</td>
                            </tr>
                            <tr>
                                <td style="width: 1000px"><strong>Marks : </strong><input type="checkbox" title="Select to change values in Text Boxes" id="chkbox4" onchange="enableCheckboxes(this)" style="float: right"></td>
                                <td style="width: 1000px"><input type="number" value="{{$los->protolo1}}" name="lo1mem4" id="lo1mem4" disabled style="width: 65px"></td>
                                <td style="width: 1000px"><input type="number" value="{{$los->protolo2}}" name="lo2mem4" id="lo2mem4" disabled style="width: 65px"></td>
                                <td style="width: 1000px"><input type="number" value="{{$los->protolo3}}" name="lo3mem4" id="lo3mem4" disabled style="width: 65px"></td>
                                <td style="width: 1000px"><input type="number" value="{{$los->protolo4}}" name="lo4mem4" id="lo4mem4" disabled style="width: 65px"></td>
                                <td style="width: 1000px"><input type="number" value="{{$los->protolo5}}" name="lo5mem4" id="lo5mem4" disabled style="width: 65px"></td>
                            </tr> 
                        </tbody>
                    </table>

                    <div class="ibox-content"></div>

                    <table class="table table-bordered">
                        <tbody style="font-size: 15">                
                            <tr>
                                <td style="width: 1000px"><strong>Mid Review Presentation</strong></td>
                            </tr> 
                            <tr>
                                <td style="width: 1000px"></td>
                                <td style="width: 1000px">LO 1 * (?%)</td>
                                <td style="width: 1000px">LO 2 * (?%)</td>
                                <td style="width: 1000px">LO 3 * (?%)</td>
                                <td style="width: 1000px">LO 4 * (?%)</td>
                                <td style="width: 1000px">LO 5 * (?%)</td>
                            </tr>
                            <tr>
                                <td style="width: 1000px"><strong>Marks : </strong><input type="checkbox" title="Select to change values in Text Boxes" id="chkbox5" onchange="enableCheckboxes(this)" style="float: right"></td>
                                <td style="width: 1000px"><input type="number" value="{{$los->midprelo1}}" name="lo1mem5" id="lo1mem5" disabled style="width: 65px"></td>
                                <td style="width: 1000px"><input type="number" value="{{$los->midprelo2}}" name="lo2mem5" id="lo2mem5" disabled style="width: 65px"></td>
                                <td style="width: 1000px"><input type="number" value="{{$los->midprelo3}}" name="lo3mem5" id="lo3mem5" disabled style="width: 65px"></td>
                                <td style="width: 1000px"><input type="number" value="{{$los->midprelo4}}" name="lo4mem5" id="lo4mem5" disabled style="width: 65px"></td>
                                <td style="width: 1000px"><input type="number" value="{{$los->midprelo5}}" name="lo5mem5" id="lo5mem5" disabled style="width: 65px"></td>
                            </tr> 
                        </tbody>
                    </table>

                    <div class="ibox-content"></div>

                    <table class="table table-bordered">
                        <tbody style="font-size: 15">                
                            <tr>
                                <td style="width: 1000px"><strong>Mid Review Report</strong></td>
                            </tr> 
                            <tr>
                                <td style="width: 1000px"></td>
                                <td style="width: 1000px">LO 1 * (?%)</td>
                                <td style="width: 1000px">LO 2 * (?%)</td>
                                <td style="width: 1000px">LO 3 * (?%)</td>
                                <td style="width: 1000px">LO 4 * (?%)</td>
                                <td style="width: 1000px">LO 5 * (?%)</td>
                            </tr>
                            <tr>
                                <td style="width: 1000px"><strong>Marks : </strong><input type="checkbox" title="Select to change values in Text Boxes" id="chkbox6" onchange="enableCheckboxes(this)" style="float: right"></td>
                                <td style="width: 1000px"><input type="number" value="{{$los->midrepo1}}" name="lo1mem6" id="lo1mem6" disabled style="width: 65px"></td>
                                <td style="width: 1000px"><input type="number" value="{{$los->midrepo2}}" name="lo2mem6" id="lo2mem6" disabled style="width: 65px"></td>
                                <td style="width: 1000px"><input type="number" value="{{$los->midrepo3}}" name="lo3mem6" id="lo3mem6" disabled style="width: 65px"></td>
                                <td style="width: 1000px"><input type="number" value="{{$los->midrepo4}}" name="lo4mem6" id="lo4mem6" disabled style="width: 65px"></td>
                                <td style="width: 1000px"><input type="number" value="{{$los->midrepo5}}" name="lo5mem6" id="lo5mem6" disabled style="width: 65px"></td>
                            </tr> 
                        </tbody>
                    </table>

                    <div class="ibox-content"></div>

                    <table class="table table-bordered">
                        <tbody style="font-size: 15">                
                            <tr>
                                <td style="width: 1000px"><strong>Final Presentation</strong></td>
                            </tr> 
                            <tr>
                                <td style="width: 1000px"></td>
                                <td style="width: 1000px">LO 1 * (?%)</td>
                                <td style="width: 1000px">LO 2 * (?%)</td>
                                <td style="width: 1000px">LO 3 * (?%)</td>
                                <td style="width: 1000px">LO 4 * (?%)</td>
                                <td style="width: 1000px">LO 5 * (?%)</td>
                            </tr>
                            <tr>
                                <td style="width: 1000px"><strong>Marks : </strong><input type="checkbox" title="Select to change values in Text Boxes" id="chkbox7" onchange="enableCheckboxes(this)" style="float: right"></td>
                                <td style="width: 1000px"><input type="number" value="{{$los->finalprelo1}}" name="lo1mem7" id="lo1mem7" disabled style="width: 65px"></td>
                                <td style="width: 1000px"><input type="number" value="{{$los->finalprelo2}}" name="lo2mem7" id="lo2mem7" disabled style="width: 65px"></td>
                                <td style="width: 1000px"><input type="number" value="{{$los->finalprelo3}}" name="lo3mem7" id="lo3mem7" disabled style="width: 65px"></td>
                                <td style="width: 1000px"><input type="number" value="{{$los->finalprelo4}}" name="lo4mem7" id="lo4mem7" disabled style="width: 65px"></td>
                                <td style="width: 1000px"><input type="number" value="{{$los->finalprelo5}}" name="lo5mem7" id="lo5mem7" disabled style="width: 65px"></td>
                            </tr> 
                        </tbody>
                    </table>

                    <div class="ibox-content"></div>

                    <table class="table table-bordered">
                        <tbody style="font-size: 15">                
                            <tr>
                                <td style="width: 1000px"><strong>Final Report</strong></td>
                            </tr> 
                            <tr>
                                <td style="width: 1000px"></td>
                                <td style="width: 750px">LO 1 * (?%)</td>
                                <td style="width: 750px">LO 2 * (?%)</td>
                                <td style="width: 750px">LO 3 * (?%)</td>
                                <td style="width: 750px">LO 4 * (?%)</td>
                                <td style="width: 750px">LO 5 * (?%)</td>
                                <td style="width: 1000px">Status Document (?%)</td>
                            </tr>
                            <tr>
                                <td style="width: 1000px"><strong>Marks : </strong><input type="checkbox" title="Select to change values in Text Boxes" id="chkbox8" onchange="enableCheckboxes(this)" style="float: right"></td>
                                <td style="width: 750px"><input type="number" value="{{$los->finalrepolo1}}" name="lo1mem8" id="lo1mem8" disabled style="width: 65px"></td>
                                <td style="width: 750px"><input type="number" value="{{$los->finalrepolo2}}" name="lo2mem8" id="lo2mem8" disabled style="width: 65px"></td>
                                <td style="width: 750px"><input type="number" value="{{$los->finalrepolo3}}" name="lo3mem8" id="lo3mem8" disabled style="width: 65px"></td>
                                <td style="width: 750px"><input type="number" value="{{$los->finalrepolo4}}" name="lo4mem8" id="lo4mem8" disabled style="width: 65px"></td>
                                <td style="width: 750px"><input type="number" value="{{$los->finalrepolo5}}" name="lo5mem8" id="lo5mem8" disabled style="width: 65px"></td>
                                <td style="width: 1000px"><input type="number" value="{{$los->finalstatusdoc}}" name="lo6mem8" id="lo6mem8" disabled style="width: 65px"></td>
                            </tr> 
                        </tbody>
                    </table>

                    <div class="ibox-content"></div>

                    <table class="table table-bordered">
                        <tbody style="font-size: 15">                
                            <tr>
                                <td style="width: 1000px"><strong>Viva</strong></td>
                            </tr> 
                            <tr>
                                <td style="width: 1000px"></td>
                                <td style="width: 1000px">LO 1 * (?%)</td>
                                <td style="width: 1000px">LO 2 * (?%)</td>
                                <td style="width: 1000px">LO 3 * (?%)</td>
                                <td style="width: 1000px">LO 4 * (?%)</td>
                                <td style="width: 1000px">LO 5 * (?%)</td>
                            </tr>
                            <tr>
                                <td style="width: 1000px"><strong>Marks : </strong><input type="checkbox" title="Select to change values in Text Boxes" id="chkbox9" onchange="enableCheckboxes(this)" style="float: right"></td>
                                <td style="width: 1000px"><input type="number" value="{{$los->vivalo1}}" name="lo1mem9" id="lo1mem9" disabled style="width: 65px"></td>
                                <td style="width: 1000px"><input type="number" value="{{$los->vivalo2}}" name="lo2mem9" id="lo2mem9" disabled style="width: 65px"></td>
                                <td style="width: 1000px"><input type="number" value="{{$los->vivalo3}}" name="lo3mem9" id="lo3mem9" disabled style="width: 65px"></td>
                                <td style="width: 1000px"><input type="number" value="{{$los->vivalo4}}" name="lo4mem9" id="lo4mem9" disabled style="width: 65px"></td>
                                <td style="width: 1000px"><input type="number" value="{{$los->vivalo5}}" name="lo5mem9" id="lo5mem9" disabled style="width: 65px"></td>
                            </tr> 
                        </tbody>
                    </table>                   
                     
                    <div class="ibox-content"></div>
                     <input type="text" value="tab1" name="tab1" hidden>
                    <div id="member1sub" align="right" style="padding-right: 180px"> <input type='submit'  class="save_btn btn btn-primary btn-xl m-l-sm" name='editThesisFormMarks' align="right">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"></div>   
                </div>
            </form>
        </div>
        <div role="tabpanel" class="tab-pane fade in" id="assmnt"> 

            <form method="post" id="formform1">
                <div class="ibox-content" style="font-size: 14">
                    <table class="table table-bordered">
                        <tbody style="font-size: 15">                
                            <tr>
                                <td style="width: 1000px"><center><strong>Assessment</strong></center></td>
                                <td style="width: 500px"><center><strong>Marks Allocation</strong></center></td>
                            </tr> 
                            <tr>
                                <td style="width: 1000px"><strong>Project Proposal Presentation : </strong><input type="checkbox" title="Select to change values in Text Boxes" id="chk1" onchange="enableCheckboxesforAssemnts(this)" style="float: right"></td>
                                <td style="width: 500px"><input type="number" value="{{$los->proposalpresent}}" name="mem1" id="mem1" disabled style="width: 65px; margin-left: 50px"></td>
                            </tr> 
                            <tr>
                                <td style="width: 1000px"><strong>Project Proposal Report : </strong><input type="checkbox" title="Select to change values in Text Boxes" id="chk2" onchange="enableCheckboxesforAssemnts(this)" style="float: right"></td>
                                <td style="width: 500px"><input type="number" value="{{$los->proposalreport}}" name="mem2" id="mem2" disabled style="width: 65px; margin-left: 50px"></td>
                            </tr> 
                            <tr>
                                <td style="width: 1000px"><strong>System Requirement Specification (SRS) Document : </strong><input type="checkbox" title="Select to change values in Text Boxes" id="chk3" onchange="enableCheckboxesforAssemnts(this)" style="float: right"></td>
                                <td style="width: 500px"><input type="number" value="{{$los->srsdoc}}" name="mem3" id="mem3" disabled style="width: 65px; margin-left: 50px"></td>
                            </tr>
                            <tr>
                                <td style="width: 1000px"><strong>Project Status Document - SRS : </strong><input type="checkbox" title="Select to change values in Text Boxes" id="chk4" onchange="enableCheckboxesforAssemnts(this)" style="float: right"></td>
                                <td style="width: 500px"><input type="number" value="{{$los->srsstatus}}" name="mem4" id="mem4" disabled style="width: 65px; margin-left: 50px"></td>
                            </tr>
                            <tr>
                                <td style="width: 1000px"><strong>Prototype Presentation : </strong><input type="checkbox" title="Select to change values in Text Boxes" id="chk5" onchange="enableCheckboxesforAssemnts(this)" style="float: right"></td>
                                <td style="width: 500px"><input type="number" value="{{$los->protoprsent}}" name="mem5" id="mem5" disabled style="width: 65px; margin-left: 50px"></td>
                            </tr> 
                            <tr>
                                <td style="width: 1000px"><strong>Mid-Point Review Presentation : </strong><input type="checkbox" title="Select to change values in Text Boxes" id="chk6" onchange="enableCheckboxesforAssemnts(this)" style="float: right"></td>
                                <td style="width: 500px"><input type="number" value="{{$los->midpresent}}" name="mem6" id="mem6" disabled style="width: 65px; margin-left: 50px"></td>
                            </tr>
                            <tr>
                                <td style="width: 1000px"><strong>Mid-Point Review Report : </strong><input type="checkbox" title="Select to change values in Text Boxes" id="chk7" onchange="enableCheckboxesforAssemnts(this)" style="float: right"></td>
                                <td style="width: 500px"><input type="number" value="{{$los->midreport}}" name="mem7" id="mem7" disabled style="width: 65px; margin-left: 50px"></td>
                            </tr> 
                            <tr>
                                <td style="width: 1000px"><strong>Final Presentation : </strong><input type="checkbox" title="Select to change values in Text Boxes" id="chk8" onchange="enableCheckboxesforAssemnts(this)" style="float: right"></td>
                                <td style="width: 500px"><input type="number" value="{{$los->finalprsent}}" name="mem8" id="mem8" disabled style="width: 65px; margin-left: 50px"></td>
                            </tr> 
                            <tr>
                                <td style="width: 1000px"><strong>Final Report : </strong><input type="checkbox" title="Select to change values in Text Boxes" id="chk9" onchange="enableCheckboxesforAssemnts(this)" style="float: right"></td>
                                <td style="width: 500px"><input type="number" value="{{$los->finalreport}}" name="mem9" id="mem9" disabled style="width: 65px; margin-left: 50px"></td>
                            </tr>
                            <tr>
                                <td style="width: 1000px"><strong>Project Status Document – Final Report : </strong><input type="checkbox" title="Select to change values in Text Boxes" id="chkA" onchange="enableCheckboxesforAssemnts(this)" style="float: right"></td>
                                <td style="width: 500px"><input type="number" value="{{$los->finalstatusdoc}}" name="mem10" id="memA" disabled style="width: 65px; margin-left: 50px"></td>
                            </tr>
                            <tr>
                                <td style="width: 1000px"><strong>Oral Examination (Viva)  Q&A : </strong><input type="checkbox" title="Select to change values in Text Boxes" id="chkB" onchange="enableCheckboxesforAssemnts(this)" style="float: right"></td>
                                <td style="width: 500px"><input type="number" value="{{$los->viva}}" name="mem11" id="memB" disabled style="width: 65px; margin-left: 50px"></td>
                            </tr> 
                            <tr>
                                <td style="width: 1000px"><strong>Research Book : </strong><input type="checkbox" title="Select to change values in Text Boxes" id="chkC" onchange="enableCheckboxesforAssemnts(this)" style="float: right"></td>
                                <td style="width: 500px"><input type="number" value="{{$los->researchbook}}" name="mem12" id="memC" disabled style="width: 65px; margin-left: 50px"></td>
                            </tr>
                            <tr>
                                <td style="width: 1000px"><strong>Website : </strong><input type="checkbox" title="Select to change values in Text Boxes" id="chkD" onchange="enableCheckboxesforAssemnts(this)" style="float: right"></td>
                                <td style="width: 500px"><input type="number" value="{{$los->website}}" name="mem13" id="memD" disabled style="width: 65px; margin-left: 50px"></td>
                            </tr> 
                            <tr>
                                <td style="width: 1000px"><strong>Research Paper : </strong><input type="checkbox" title="Select to change values in Text Boxes" id="chkE" onchange="enableCheckboxesforAssemnts(this)" style="float: right"></td>
                                <td style="width: 500px"><input type="number" value="{{$los->researchbook}}" name="mem14" id="memE" disabled style="width: 65px; margin-left: 50px"></td>
                            </tr>
                        </tbody>
                    </table><br>
                    <input type="text" value="tab2" name="tab2" hidden>
                    <div id="member2sub" align="right" style="padding-right: 180px"> <input type='submit'  class="save_btn btn btn-primary btn-xl m-l-sm" name='editThesisFormMarks' align="right">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"></div>
                </div>
            </form>
        </div>

        <div class="ibox-content"></div>

    </div>
</div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">

function enableCheckboxes(clz)
{
    var loid = clz.id;
    var mem = loid.substring(6, 7);

    if (document.getElementById("chkbox" + mem).checked === true)
    {
        for (h = 1; h < 7; h++)
        {
            document.getElementById("lo" + h + "mem" + mem).disabled = false;
        }
    }
    else
    {
        for (h = 1; h < 7; h++)
        {
            document.getElementById("lo" + h + "mem" + mem).disabled = true;
        }
    }
}

function enableCheckboxesforAssemnts(clz)
{
    var loid = clz.id;
    var mem = loid.substring(3, 4);

    if (document.getElementById("mem" + mem).disabled === true)
    {
        document.getElementById("mem" + mem).disabled = false;
    }
    else
    {
        document.getElementById("mem" + mem).disabled = true;
    }
}

</script>