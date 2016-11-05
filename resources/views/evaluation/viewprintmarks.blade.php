
@extends('masterpages.master_rpc')
@section('css_links')
@section('title')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>View / Print Marks</h2>
            <ol class="breadcrumb">

            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
@endsection

  @section('content')

      <div class="col-lg-12">
          <div class="ibox float-e-margins">
              <div class="ibox-title" style="height: 57px; margin-bottom: 5px">
                  <h5>Final Marks</h5>
                  <div class=ibox-content" style="width: 250px; float: right">
                     

<!--                    <select name="selectid" id="stuIDs" onchange="selectStudentDetails()" style="width: 240px; height: 30px">
                        <option selected disabled><strong>--Group ID--</strong></option>
                        @foreach ($groupids as $key=>$gid)
                                    <option value="{{$gid->groupID}}">{{$gid->groupID}}</option>
                        @endforeach
                </select>-->

                </div> 
              </div>
              <div class="ibox-content">                   
                  <div class="table-responsive">

                      <table style="font-size: 13px" class="table table-striped table-bordered table-hover dataTables-example dataTable dtr-inline" id="table" role="grid" aria-describedby="DataTables_Table_0_info">

                          <thead>
                          <tr role="row">
                              <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" style="width: 189px;" aria-sort="ascending">Group ID</th>
                              <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 253px;">Student Id</th>
                              <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 229px;">Proposal Presentation</th>
                              <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 162px;">Proposal Report</th>
                              <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" style="width: 189px;">SRS Report</th>
                              <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 253px;">Prototype Presentation</th>
                              <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 229px;">Mid Presentation</th>
                              <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 162px;">Mid Report</th>
                              <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" style="width: 189px;">Final Presentation</th>
                              <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 253px;">Final Report</th>
                              <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 229px;">Viva</th>
                              <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 162px;">Research Book</th>
                              <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 253px;">Research Paper</th>
                              <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 229px;">Website</th>
                              <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 162px;">Total</th>
                              
                          </tr>
                          </thead>
                          <tbody>
                              
                          @foreach($marksforall as $mrk)
                          <tr class="gradeA even" role="row" onclick="rowselection(this)">
                                  <td class="sorting_1">{{ $mrk->stugrpid}}</td>
                                  <td>{{ $mrk->stuid }}</td>                                  
                                  <td>{{ $mrk->proposalpresent }}</td>
                                  <td>{{ $mrk->proposalreport }}</td>
                                  <td>{{ $mrk->srsreport }}</td>
                                  <td>{{ $mrk->protopresent }}</td>
                                  <td>{{ $mrk->midpresent }}</td>
                                  <td>{{ $mrk->midreport }}</td>
                                  <td>{{ $mrk->finalprsent }}</td>
                                  <td>{{ $mrk->finalreport }}</td>
                                  <td>{{ $mrk->viva }}</td>
                                  <td>{{ $mrk->researchbook }}</td>
                                  <td>{{ $mrk->researchpaper }}</td>
                                  <td>{{ $mrk->website }}</td>
                                  <td>{{ $mrk->total }}</td>
                                  
                              </tr>
                          @endforeach
                          
                          </tbody>
                          <tfoot>
                          <tr>
                              <th rowspan="1" colspan="1">Group ID</th>
                              <th rowspan="1" colspan="1">Student ID</th>
                              <th rowspan="1" colspan="1">Proposal Presentation</th>
                              <th rowspan="1" colspan="1">Proposal Report</th>
                              <th rowspan="1" colspan="1">SRS Report</th>
                              <th rowspan="1" colspan="1">Prototype Presentation</th>
                              <th rowspan="1" colspan="1">Mid Presentation</th>
                              <th rowspan="1" colspan="1">Mid Report</th>
                              <th rowspan="1" colspan="1">Final Presentation</th>
                              <th rowspan="1" colspan="1">Final Report</th>
                              <th rowspan="1" colspan="1">Viva</th>
                              <th rowspan="1" colspan="1">Research Book</th>
                              <th rowspan="1" colspan="1">Research Paper</th>
                              <th rowspan="1" colspan="1">Website</th>
                              <th rowspan="1" colspan="1">Total</th>
                          </tr>
                          </tfoot>
                      </table>

                  </div>

              </div>
              
              
              <div class="col-lg-13" style="margin-top: 10px">
  <div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
            <h3>Student's Exam Result Progress Charts</h3>
        </h4>
      </div>
        <div id="collapse1" class="ibox-content">
        <ul class="list-group">
            <li class="list-group-item">
                 <h2 class="text-center" id="cchartid1" style="font-style: oblique"></h2>
                <div class="text-center">
                    
                            <canvas id="cchart1" height="300" width="980"></canvas>
                        </div>
                
            </li>
            <li class="list-group-item">
                
                <div class="text-center">
                            <canvas id="cbar" height="300" width="980"></canvas>
                        </div>
                
            </li>
        </ul>
        <div class="panel-footer">Graph size can be changed according to your screen resolutions</div>
      </div>
    </div>
  </div>
</div>
              
 <div class="col-lg-13" style="margin-top: 10px">
  <div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
            <h3>Overall</h3>
        </h4>
      </div>
        <div id="collapse1" class="ibox-content">
            <ul class="list-group" style="height: 320px">
            <li class="list-group-item" style="float: left">
                <div class="text-center">
                    
                            <canvas id="cpie" height="300" width="470"></canvas>
                        </div>
                
            </li>
            <li class="list-group-item" style="float: right">
                
                <div class="text-center">
                            <canvas id="cpie1" height="300" width="470"></canvas>
                        </div>
                
            </li>
        </ul>
        <div class="panel-footer">Graph size can be changed according to your screen resolutions</div>
      </div>
    </div>
  </div>
</div>


   @endsection


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">

$(document).ready(function () {    
        $.ajax({
        type: "GET",
        url: 'searchmarksforcharts',
        dataType: 'json'
        
        }).done(function (data) { 
console.log(data);
            var pdata = [
            {
                value: data.whogotA,
                color: "#46BFBD",
                highlight: "#5AD3D1",
                label: "A [85-100]"
            },
            {
                value: data.whogotB.length,
                color: "#9ACD32",
                highlight: "#c0cd32",
                label: "B [75-84]"
            },
            {
                value: data.whogotC.length,
                color: "#FDB45C",
                highlight: "#FFC870",
                label: "C [65-74]"
            },
            {
                value: data.whogotD.length,
                color: "#FF4500",
                highlight: "#ff2a00",
                label: "D [50-64]"
            },
            {
                value: data.whogotF,
                color:"#ff0000",
                highlight: "#FF5A5E",
                label: "F [0-49]"
            }
        ];
            var chartOptions = {

                    };
        var cpie = document.getElementById("cpie").getContext("2d");
        new Chart(cpie).Pie(pdata, chartOptions);

        //////////////////////////////////////////////////////////////////////
        
        var pdata = [
            {
                value: data.proposalprsentcomp,
                color: "#46BFBD",
                highlight: "#5AD3D1",
                label: "Proposal Presentation"
            },
            {
                value: data.proposalreportcopm,
                color: "#FDB45C",
                highlight: "#FFC870",
                label: "Proposal Report"
            },
            {
                value: data.srs,
                color: "#FDB45C",
                highlight: "#FFC870",
                label: "SRS"
            },
            {
                value: data.prototype,
                color: "#FDB45C",
                highlight: "#FFC870",
                label: "Prototype"
            },
            {
                value: data.midprsent,
                color:"#F7464A",
                highlight: "#FF5A5E",
                label: "Mid Prsentation"
            },
            {
                value: data.midreport,
                color: "#46BFBD",
                highlight: "#5AD3D1",
                label: "Mid Report"
            },
            {
                value: data.finalprsent,
                color: "#FDB45C",
                highlight: "#FFC870",
                label: "Final Presentation"
            },
            {
                value: data.finalreport,
                color: "#FDB45C",
                highlight: "#FFC870",
                label: "Final Report"
            },
            {
                value: data.viva,
                color: "#FDB45C",
                highlight: "#FFC870",
                label: "Viva"
            },
            {
                value: data.other,
                color:"#F7464A",
                highlight: "#FF5A5E",
                label: "Other Assessments"
            }
        ];
            var chartOptions = {

                    };
        var cpie = document.getElementById("cpie1").getContext("2d");
        new Chart(cpie).Pie(pdata, chartOptions);
        
            
        }).fail(function (data) {
            swal("Failed", "Something Wrong! :)", "error");
        });       
});

function rowselection(newthis)
{
    var table = document.getElementsByTagName("table")[0];
    var tbody = table.getElementsByTagName("tbody")[0];
    tbody.onclick = function (e) {
        e = e || window.event;
        var data = [];
        var target = e.srcElement || e.target;
        while (target && target.nodeName !== "TR") {
            target = target.parentNode;
        }
        if (target) {
            var cells = target.getElementsByTagName("td");
            for (var i = 0; i < cells.length; i++) {
                data.push(cells[i].innerHTML);
            }
        }
        //alert(data[0]+" / "+data[1]);
        chartopner(data[0],data[1],data[2],data[3],
                   data[4],data[5],data[6],data[7],
                   data[8],data[9],data[10],data[11],
                   data[12],data[13],data[14]);
    };
}
        
function selectStudentDetails()
{
    var e = document.getElementById("stuIDs");
    var searchID = e.options[e.selectedIndex].value;
    
        $.ajax({
        type: "GET",
        url: '/searchmarks',
        data: {"sid": searchID},
        dataType: 'json'
        
        }).done(function (data) {
           
            //console.log(data);
            //alert(data.studentids[0].stuid);
            //alert(data['len']);
            
            var trHTML = '';

            //$.each(data.Countries, function (i, item) {
               // trHTML += '<tr><td>' + 'harsha' + '</td><td>' + data['len'] + '</td></tr>';
            //});

            //$('#DataTable').append(trHTML);
            for(k = 0; k < 5; k++)
            {
           //     trHTML += '';
            }
            //$('#DataTable').append(trHTML);
            //$('#DataTable').cleanData();
            $('#table').append(
                $.map(data.studentids, function (ignore, index) {
                    return '<tr>\n\
                                <td>' + data.studentids[0].stuid + '</td>\n\
                                <td>' + data['len'] + '</td>\n\
                                <td>' + 'harsha' + '</td>\n\
                                <td>' + data['len'] + '</td>\n\
                            </tr>';
                }).join()
            );

//            i=0;
//            $.each(data.studentids[i].stuid, function (id,con){
//              alert(con);
//               i++;
//            });    
            
//            for(k = 0; k < 5; k++)
//            {
//                $($('.ui-tabs-nav')[k]).html("");
//            }
//
//            i=0;
//            $.each(data['ids'], function (id,con){
//                $($('.ui-tabs-nav')[i]).html(con);
//                //alert('cmntmem'+i);
//                //document.getElementById('stuid').value = con;
//                document.getElementById('cmntmem'+i).value = con;
//                i++;
//            });    
            
        }).fail(function (data) {
            swal("Failed", "Something Wrong! :)", "error");
        });       
         
}

function chartopner(gid,sid,a,b,c,d,e,f,g,h,i,j,k,l,m)
{
    document.getElementById('cchartid1').innerHTML = gid + " / " + sid;
    var lineChartData = {
    labels : ["Proposal Present.",
              "Proposal Report",
              "SRS Report",
              "Prototype Present.",
              "Mid Present.",
              "Mid Report",
              "Final Present.",
              "Final Report",
              "Viva",
              "Research Book",
              "Research Paper",
              "Website",
              "Total"],
    datasets : [
        {
            label: "My First dataset",
            fillColor: "rgba(220,220,220,0.2)",
            strokeColor: "rgba(220,220,220,1)",
            pointColor: "rgba(220,220,220,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill : "#fff",
            pointHighlightStroke : "rgba(6, 197, 172, 1)",
            data : [0,10,20,30,40,50,60,70,80,90,100]
        },
        {
            label: "Student marks dataset",
            fillColor: "rgba(151,187,205,0.2)",
            strokeColor: "rgba(151,187,205,1)",
            pointColor: "rgba(151,187,205,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill : "#fff",
            pointHighlightStroke : "rgba(244, 204, 11, 1)",
            data : [a,b,c,d,e,f,g,h,i,j,k,l,m]
        }
    ]

};
var chartOptions = {

            };

    var cline = document.getElementById("cchart1").getContext("2d");
    new Chart(cline).Line(lineChartData, chartOptions);

//////////////////////////////////////////////////////////////////////

var bdata = {
        labels : ["Proposal Present.",
              "Proposal Report",
              "SRS Report",
              "Prototype Present.",
              "Mid Present.",
              "Mid Report",
              "Final Present.",
              "Final Report",
              "Viva",
              "Research Book",
              "Research Paper",
              "Website",
              "Total"],
        datasets : [
//            {
//                fillColor: "rgba(220,220,220,0.5)",
//                strokeColor: "rgba(220,220,220,0.8)",
//                highlightFill: "rgba(220,220,220,0.75)",
//                highlightStroke: "rgba(220,220,220,1)",
//                data : [130,160,95,205,170,135,200]
//            },
            {
               fillColor: "rgba(151,187,205,0.5)",
                strokeColor: "rgba(151,187,205,0.8)",
                highlightFill: "rgba(151,187,205,0.75)",
                highlightStroke: "rgba(151,187,205,1)",
                data : [a,b,c,d,e,f,g,h,i,j,k,l,m]
            }
        ]

    };
    
    var chartOptions = {

            };
    var cbar = document.getElementById("cbar").getContext("2d");
    new Chart(cbar).Bar(bdata,chartOptions);

//////////////////////////////////////////////////////////////////////
}

        
        $(document).ready(function() {
            $('.dataTables-example').dataTable({
                responsive: true,
                "dom": 'T<"clear">lfrtip',
                "tableTools": {
                    "sSwfPath": "js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
                }
            });

            /* Init DataTables */
            var oTable = $('#editable').dataTable();

            /* Apply the jEditable handlers to the table */
            oTable.$('td').editable( 'http://webapplayers.com/example_ajax.php', {
                "callback": function( sValue, y ) {
                    var aPos = oTable.fnGetPosition( this );
                   oTable.fnUpdate( sValue, aPos[0], aPos[1] );
                },
                "submitdata": function ( value, settings ) {
                    return {
                        "row_id": this.parentNode.getAttribute('id'),
                        "column": oTable.fnGetPosition( this )[2]
                    };
                },

                "width": "90%",
                "height": "100%"
            } );
        });

        function fnClickAddRow() {
            $('#editable').dataTable().fnAddData( [
                "Custom row",
                "New row",
                "New row",
                "New row",
                "New row" ] );

        }
    </script>

    <style>
        body.DTTT_Print {
            background: #fff;

        }
        .DTTT_Print #page-wrapper {
            margin: 0;
            background:#fff;
        }

        button.DTTT_button, div.DTTT_button, a.DTTT_button {
            border: 1px solid #e7eaec;
            background: #fff;
            color: #676a6c;
            box-shadow: none;
            padding: 6px 8px;
        }
        button.DTTT_button:hover, div.DTTT_button:hover, a.DTTT_button:hover {
            border: 1px solid #d2d2d2;
            background: #fff;
            color: #676a6c;
            box-shadow: none;
            padding: 6px 8px;
        }

        .dataTables_filter label {
            margin-right: 5px;

        }
    </style>




































































