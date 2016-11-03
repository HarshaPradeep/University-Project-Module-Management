<?php namespace App\Http\Controllers;

use App\EvaluationMarks;
use App\setting;
use DB;
use Input;
use Request;
use Symfony\Component\HttpFoundation\Response;
class EvaluationController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
         
        public function __construct() 
        {
            notificationController::showNotificationAccordingToCurrentUser();
        }

        public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
                /*Get all supervisor names acording to the supervisor id*/
                $supervisaornames = DB::select("SELECT name,id 
		 FROM panelmembers
		 WHERE id = any (SELECT supervisorId 
		 FROM projects
		 WHERE status = 'Approved')");
                
                /*Get all group ids*/
                $groupids = DB::select("SELECT groupID 
		 FROM research_groups");
 
                /*Get all student actual id acording to the auto generated id*/
                $studentid = DB::select("SELECT id,regId 
		 FROM students
		 WHERE id = any (SELECT studentId 
		 FROM projects
		 WHERE status = 'Approved')");
                                
                /*filtering projects according to the groups*/
		$students = DB::select("SELECT id,title,studentId,supervisorId 
		 FROM projects
		 WHERE status = 'Approved' and groupID = any (SELECT groupID 
		 FROM research_groups)");
                
                $los = DB::table('settings')->first();                
              
            return view('evaluation.evaluationform', compact('students', 'supervisaornames', 'studentid', 'groupids', 'los'));
	}
        
        public function forcharts() 
        {
            /*Get count of students who got A grade for the module*/
            $whogotA = EvaluationMarks::where('total','>','84')->count();
            $whogotB = EvaluationMarks::where('total','>','74')->count();
            $whogotC = EvaluationMarks::where('total','>','64')->count();
            $whogotD = EvaluationMarks::where('total','>','49')->count();
            $whogotF = EvaluationMarks::where('total','<','50')->count();
            
            $data = array("whogotA" => $whogotA, "whogotB" => $whogotB, "whogotC" => $whogotC, "whogotD" => $whogotD, "whogotF" => $whogotF);
            return json_encode($data);
        }
        
        public function settingscreat()
        {
            $los = DB::table('settings')->first();
    
            return view('evaluation.settings', compact('los'));
        }
        
        public function settingsupdate()
        {
            if(!(setting::where('id', '=', '1')->exists()))
                {
                    setting::create([
                        'id' => '1'                        
                    ]);    
                }
                
            if(Request::get('lo1mem1') != null)
            {                
                setting::where('id', '1')
                    ->update([
                        'proplo1' => Request::get('lo1mem1'),
                        'proplo2' => Request::get('lo2mem1'),
                        'proplo3' => Request::get('lo3mem1'),
                        'proplo4' => Request::get('lo4mem1'),
                        'proplo5' => Request::get('lo5mem1')
                            ]);
            }
            
            if(Request::get('lo1mem2') != null)
            {                
                setting::where('id', '1')
                    ->update([
                        'propreportlo1' => Request::get('lo1mem2'),
                        'propreportlo2' => Request::get('lo2mem2'),
                        'propreportlo3' => Request::get('lo3mem2'),
                        'propreportlo4' => Request::get('lo4mem2'),
                        'propreportlo5' => Request::get('lo5mem2')
                            ]);
            }
            
            if(Request::get('lo1mem3') != null)
            {                
                setting::where('id', '1')
                    ->update([
                        'srslo1' => Request::get('lo1mem3'),
                        'srslo2' => Request::get('lo2mem3'),
                        'srslo3' => Request::get('lo3mem3'),
                        'srslo4' => Request::get('lo4mem3'),
                        'srsstatus' => Request::get('lo5mem3')
                            ]);
            }
            
            if(Request::get('lo1mem4') != null)
            {                
                setting::where('id', '1')
                    ->update([
                        'protolo1' => Request::get('lo1mem4'),
                        'protolo2' => Request::get('lo2mem4'),
                        'protolo3' => Request::get('lo3mem4'),
                        'protolo4' => Request::get('lo4mem4'),
                        'protolo5' => Request::get('lo5mem4')
                            ]);
            }
            
            if(Request::get('lo1mem5') != null)
            {                
                setting::where('id', '1')
                    ->update([
                        'midprelo1' => Request::get('lo1mem5'),
                        'midprelo2' => Request::get('lo2mem5'),
                        'midprelo3' => Request::get('lo3mem5'),
                        'midprelo4' => Request::get('lo4mem5'),
                        'midprelo5' => Request::get('lo5mem5')
                            ]);
            }
            
            if(Request::get('lo1mem6') != null)
            {                
                setting::where('id', '1')
                    ->update([
                        'midrepo1' => Request::get('lo1mem6'),
                        'midrepo2' => Request::get('lo2mem6'),
                        'midrepo3' => Request::get('lo3mem6'),
                        'midrepo4' => Request::get('lo4mem6'),
                        'midrepo5' => Request::get('lo5mem6')
                            ]);
            }
            
            if(Request::get('lo1mem7') != null)
            {                
                setting::where('id', '1')
                    ->update([
                        'finalprelo1' => Request::get('lo1mem7'),
                        'finalprelo2' => Request::get('lo2mem7'),
                        'finalprelo3' => Request::get('lo3mem7'),
                        'finalprelo4' => Request::get('lo4mem7'),
                        'finalprelo5' => Request::get('lo5mem7')
                            ]);
            }
            
            if(Request::get('lo1mem8') != null)
            {                
                setting::where('id', '1')
                    ->update([
                        'finalrepolo1' => Request::get('lo1mem8'),
                        'finalrepolo2' => Request::get('lo2mem8'),
                        'finalrepolo3' => Request::get('lo3mem8'),
                        'finalrepolo4' => Request::get('lo4mem8'),
                        'finalrepolo5' => Request::get('lo5mem8'),
                        'finalstatusdoc' => Request::get('lo6mem8')
                            ]);
            }
            
            if(Request::get('lo1mem9') != null)
            {                
                setting::where('id', '1')
                    ->update([
                        'vivalo1' => Request::get('lo1mem9'),
                        'vivalo2' => Request::get('lo2mem9'),
                        'vivalo3' => Request::get('lo3mem9'),
                        'vivalo4' => Request::get('lo4mem9'),
                        'vivalo5' => Request::get('lo5mem9')
                            ]);
            }
            
            if(Request::get('lo1mem10') != null)
            {                
                setting::where('id', '1')
                    ->update([
                        'researchbook' => Request::get('lo1mem10'),
                        'researchpaper' => Request::get('lo2mem10'),
                        'website' => Request::get('lo3mem10')
                            ]);
            }
            
            return redirect('settings')->with("success", 'Successfully Changed!');
        }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
        {            
            if(Request::get('cmntmem0') != null && Input::get('statustab1') != "Absent")
            {
                if(!(EvaluationMarks::where('stuid', '=', Request::get('cmntmem0'))->exists()))
                {
                    EvaluationMarks::create([
                        'stugrpid' => Input::get('selectid'),
                        'stuid' => Request::get('cmntmem0')
                    ]);    
                }
                
                EvaluationMarks::where('stuid', Request::get('cmntmem0'))
                    ->update([
                        'proposalpresent' => Request::get('marksforproposalpresenttab1'),
                        'proposalreport' => Request::get('marksforproposalreporttab1'),
                        'srsreport' => Request::get('marksforsrstab1'),
                        'srsstatusdoc' => Request::get('marksforsrsstatusdoctab1'),
                        'protopresent' => Request::get('marksforprototab1'),
                        'midpresent' => Request::get('marksformidpresentab1'),
                        'midreport' => Request::get('marksfomidreporttab1'),
                        'finalprsent' => Request::get('marksforfinalpresnttab1'),
                        'finalreport' => Request::get('marksforfinalreporttab1'),
                        'finalstatusdoc' => Request::get('marksforfinalstatusdoctab1'),
                        'viva' => Request::get('marksforvivatab1'),
                        'researchbook' => Request::get('marksforresearchbooktab1'),
                        'researchpaper' => Request::get('marksforresearchpapertab1'),
                        'website' => Request::get('marksforwebsitetab1'),
                        'status' => Input::get('statustab1'),
                        'total' => Request::get('totaltab1')
                            ]);          
            }
            
            if(Request::get('cmntmem1') != null && Input::get('statustab2') != "Absent")
            {
                if(!(EvaluationMarks::where('stuid', '=', Request::get('cmntmem1'))->exists()))
                {
                    EvaluationMarks::create([
                        'stugrpid' => Input::get('selectid'),
                        'stuid' => Request::get('cmntmem1')
                    ]);    
                }
                
                EvaluationMarks::where('stuid', Request::get('cmntmem1'))
                    ->update([
                        'proposalpresent' => Request::get('marksforproposalpresenttab2'),
                        'proposalreport' => Request::get('marksforproposalreporttab2'),
                        'srsreport' => Request::get('marksforsrstab2'),
                        'srsstatusdoc' => Request::get('marksforsrsstatusdoctab2'),
                        'protopresent' => Request::get('marksforprototab2'),
                        'midpresent' => Request::get('marksformidpresentab2'),
                        'midreport' => Request::get('marksfomidreporttab2'),
                        'finalprsent' => Request::get('marksforfinalpresnttab2'),
                        'finalreport' => Request::get('marksforfinalreporttab2'),
                        'finalstatusdoc' => Request::get('marksforfinalstatusdoctab2'),
                        'viva' => Request::get('marksforvivatab2'),
                        'researchbook' => Request::get('marksforresearchbooktab2'),
                        'researchpaper' => Request::get('marksforresearchpapertab2'),
                        'website' => Request::get('marksforwebsitetab2'),
                        'status' => Input::get('statustab2'),
                        'total' => Request::get('totaltab2')
                   ]);
            }
            
            if(Request::get('cmntmem2') != null && Input::get('statustab3') != "Absent")
            {
                if(!(EvaluationMarks::where('stuid', '=', Request::get('cmntmem2'))->exists()))
                {
                    EvaluationMarks::create([
                        'stugrpid' => Input::get('selectid'),
                        'stuid' => Request::get('cmntmem2')
                    ]);    
                }
                
                EvaluationMarks::where('stuid', Request::get('cmntmem2'))
                    ->update([
                        'proposalpresent' => Request::get('marksforproposalpresenttab3'),
                        'proposalreport' => Request::get('marksforproposalreporttab3'),
                        'srsreport' => Request::get('marksforsrstab3'),
                        'srsstatusdoc' => Request::get('marksforsrsstatusdoctab3'),
                        'protopresent' => Request::get('marksforprototab3'),
                        'midpresent' => Request::get('marksformidpresentab3'),
                        'midreport' => Request::get('marksfomidreporttab3'),
                        'finalprsent' => Request::get('marksforfinalpresnttab3'),
                        'finalreport' => Request::get('marksforfinalreporttab3'),
                        'finalstatusdoc' => Request::get('marksforfinalstatusdoctab3'),
                        'viva' => Request::get('marksforvivatab3'),
                        'researchbook' => Request::get('marksforresearchbooktab3'),
                        'researchpaper' => Request::get('marksforresearchpapertab3'),
                        'website' => Request::get('marksforwebsitetab3'),
                        'status' => Input::get('statustab3'),
                        'total' => Request::get('totaltab3')
                   ]);
            }
            
            if(Request::get('cmntmem3') != null && Input::get('statustab4') != "Absent")
            {
                if(!(EvaluationMarks::where('stuid', '=', Request::get('cmntmem3'))->exists()))
                {
                    EvaluationMarks::create([
                        'stugrpid' => Input::get('selectid'),
                        'stuid' => Request::get('cmntmem3')
                    ]);    
                }
                
                EvaluationMarks::where('stuid', Request::get('cmntmem3'))
                    ->update([
                        'proposalpresent' => Request::get('marksforproposalpresenttab4'),
                        'proposalreport' => Request::get('marksforproposalreporttab4'),
                        'srsreport' => Request::get('marksforsrstab4'),
                        'srsstatusdoc' => Request::get('marksforsrsstatusdoctab4'),
                        'protopresent' => Request::get('marksforprototab4'),
                        'midpresent' => Request::get('marksformidpresentab4'),
                        'midreport' => Request::get('marksfomidreporttab4'),
                        'finalprsent' => Request::get('marksforfinalpresnttab4'),
                        'finalreport' => Request::get('marksforfinalreporttab4'),
                        'finalstatusdoc' => Request::get('marksforfinalstatusdoctab4'),
                        'viva' => Request::get('marksforvivatab4'),
                        'researchbook' => Request::get('marksforresearchbooktab4'),
                        'researchpaper' => Request::get('marksforresearchpapertab4'),
                        'website' => Request::get('marksforwebsitetab4'),
                        'status' => Input::get('statustab4'),
                        'total' => Request::get('totaltab4')
                   ]);
            }
            
            if(Request::get('cmntmem4') != null && Input::get('statustab5') != "Absent")
            {
                if(!(EvaluationMarks::where('stuid', '=', Request::get('cmntmem4'))->exists()))
                {
                    EvaluationMarks::create([
                        'stugrpid' => Input::get('selectid'),
                        'stuid' => Request::get('cmntmem4')
                    ]);    
                }
                
                EvaluationMarks::where('stuid', Request::get('cmntmem4'))
                    ->update([
                        'proposalpresent' => Request::get('marksforproposalpresenttab5'),
                        'proposalreport' => Request::get('marksforproposalreporttab5'),
                        'srsreport' => Request::get('marksforsrstab5'),
                        'srsstatusdoc' => Request::get('marksforsrsstatusdoctab5'),
                        'protopresent' => Request::get('marksforprototab5'),
                        'midpresent' => Request::get('marksformidpresentab5'),
                        'midreport' => Request::get('marksfomidreporttab5'),
                        'finalprsent' => Request::get('marksforfinalpresnttab5'),
                        'finalreport' => Request::get('marksforfinalreporttab5'),
                        'finalstatusdoc' => Request::get('marksforfinalstatusdoctab5'),
                        'viva' => Request::get('marksforvivatab5'),
                        'researchbook' => Request::get('marksforresearchbooktab5'),
                        'researchpaper' => Request::get('marksforresearchpapertab5'),
                        'website' => Request::get('marksforwebsitetab5'),
                        'status' => Input::get('statustab5'),
                        'total' => Request::get('totaltab5')
                   ]);
            }
            return redirect('evaluationform')->with("success", 'Marks Successfully Added!');
        }

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
            /*Get all group ids*/
            $groupids = DB::select("SELECT groupID 
            FROM research_groups");
            
            /*Get all marks*/
            $marksforall = DB::select("SELECT * 
            FROM evaluation_mark");
                    
            return view('evaluation.viewprintmarks', compact('groupids', 'marksforall'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
        function get()
	{
            $searchId = Input::get('sid');
        
            /*get project title according to the student's id*/
            $studentids = DB::select("SELECT stuid 
            FROM evaluation_mark
            WHERE stugrpid = '$searchId'");
            
            $studentmarks = DB::select("SELECT * 
            FROM evaluation_mark
            WHERE stugrpid = '$searchId'");

            $data = array("studentids" => $studentids, "len" => sizeof($studentids), "studentmarks" => $studentmarks);
            return json_encode($data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}     


}
