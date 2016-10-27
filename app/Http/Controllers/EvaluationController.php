<?php namespace App\Http\Controllers;

use App\EvaluationMarks;
use DB;
use Request;
use Input;
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
                
              
            return view('evaluation.evaluationform', compact('students', 'supervisaornames', 'studentid', 'groupids'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
        {
            //dd(Request::get('totaltab1'));
            if(Request::get('cmntmem0') != null)
            {        
                EvaluationMarks::create([
  
                    'stugrpid' => Input::get('selectid'),
                    'stuid' => Request::get('cmntmem0'),
                    'proposalpresent' => Request::get('marksforproposalpresenttab1'),
                    'proposalreport' => Request::get('marksforproposalreporttab1'),
                    'srsreport' => Request::get('marksforsrstab1'),
                    'protopresent' => Request::get('marksforprototab1'),
                    'midpresent' => Request::get('marksformidpresentab1'),
                    'midreport' => Request::get('marksfomidreporttab1'),
                    'finalprsent' => Request::get('marksforfinalpresnttab1'),
                    'finalreport' => Request::get('marksforfinalreporttab1'),
                    'viva' => Request::get('marksforvivatab1'),
                    'researchbook' => Request::get('marksforresearchbooktab1'),
                    'researchpaper' => Request::get('marksforresearchpapertab1'),
                    'website' => Request::get('marksforwebsitetab1'),
                    'status' => Input::get('statustab1'),
                    'total' => Request::get('totaltab1')

               ]);
            }
            
            if(Request::get('cmntmem1') != null)
            {
                EvaluationMarks::create([

                    'stugrpid' => Input::get('selectid'),
                    'stuid' => Request::get('cmntmem1'),
                    'proposalpresent' => Request::get('marksforproposalpresenttab2'),
                    'proposalreport' => Request::get('marksforproposalreporttab2'),
                    'srsreport' => Request::get('marksforsrstab2'),
                    'protopresent' => Request::get('marksforprototab2'),
                    'midpresent' => Request::get('marksformidpresentab2'),
                    'midreport' => Request::get('marksfomidreporttab2'),
                    'finalprsent' => Request::get('marksforfinalpresnttab2'),
                    'finalreport' => Request::get('marksforfinalreporttab2'),
                    'viva' => Request::get('marksforvivatab2'),
                    'researchbook' => Request::get('marksforresearchbooktab2'),
                    'researchpaper' => Request::get('marksforresearchpapertab2'),
                    'website' => Request::get('marksforwebsitetab2'),
                    'status' => Input::get('statustab2'),
                    'total' => Request::get('totaltab2')

                   ]);
            }
            
            if(Request::get('cmntmem2') != null)
            {
                EvaluationMarks::create([

                    'stugrpid' => Input::get('selectid'),
                    'stuid' => Request::get('cmntmem2'),
                    'proposalpresent' => Request::get('marksforproposalpresenttab3'),
                    'proposalreport' => Request::get('marksforproposalreporttab3'),
                    'srsreport' => Request::get('marksforsrstab3'),
                    'protopresent' => Request::get('marksforprototab3'),
                    'midpresent' => Request::get('marksformidpresentab3'),
                    'midreport' => Request::get('marksfomidreporttab3'),
                    'finalprsent' => Request::get('marksforfinalpresnttab3'),
                    'finalreport' => Request::get('marksforfinalreporttab3'),
                    'viva' => Request::get('marksforvivatab3'),
                    'researchbook' => Request::get('marksforresearchbooktab3'),
                    'researchpaper' => Request::get('marksforresearchpapertab3'),
                    'website' => Request::get('marksforwebsitetab3'),
                    'status' => Input::get('statustab3'),
                    'total' => Request::get('totaltab3')

                   ]);
            }
            
            if(Request::get('cmntmem3') != null)
            {
                EvaluationMarks::create([

                    'stugrpid' => Input::get('selectid'),
                    'stuid' => Request::get('cmntmem3'),
                    'proposalpresent' => Request::get('marksforproposalpresenttab4'),
                    'proposalreport' => Request::get('marksforproposalreporttab4'),
                    'srsreport' => Request::get('marksforsrstab4'),
                    'protopresent' => Request::get('marksforprototab4'),
                    'midpresent' => Request::get('marksformidpresentab4'),
                    'midreport' => Request::get('marksfomidreporttab4'),
                    'finalprsent' => Request::get('marksforfinalpresnttab4'),
                    'finalreport' => Request::get('marksforfinalreporttab4'),
                    'viva' => Request::get('marksforvivatab4'),
                    'researchbook' => Request::get('marksforresearchbooktab4'),
                    'researchpaper' => Request::get('marksforresearchpapertab4'),
                    'website' => Request::get('marksforwebsitetab4'),
                    'status' => Input::get('statustab4'),
                    'total' => Request::get('totaltab4')

                   ]);
            }
            
            if(Request::get('cmntmem4') != null)
            {
                EvaluationMarks::create([

                    'stugrpid' => Input::get('selectid'),
                    'stuid' => Request::get('cmntmem4'),
                    'proposalpresent' => Request::get('marksforproposalpresenttab5'),
                    'proposalreport' => Request::get('marksforproposalreporttab5'),
                    'srsreport' => Request::get('marksforsrstab5'),
                    'protopresent' => Request::get('marksforprototab5'),
                    'midpresent' => Request::get('marksformidpresentab5'),
                    'midreport' => Request::get('marksfomidreporttab5'),
                    'finalprsent' => Request::get('marksforfinalpresnttab5'),
                    'finalreport' => Request::get('marksforfinalreporttab5'),
                    'viva' => Request::get('marksforvivatab5'),
                    'researchbook' => Request::get('marksforresearchbooktab5'),
                    'researchpaper' => Request::get('marksforresearchpapertab5'),
                    'website' => Request::get('marksforwebsitetab5'),
                    'status' => Input::get('statustab5'),
                    'total' => Request::get('totaltab5')

                   ]);
            }

            return redirect('evaluationform');
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
