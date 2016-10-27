<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;
use Request;
use Input;

class supevaluationController extends Controller {

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
        
        /*Proposal*/
	public function createproppresen()
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
                
                
            return view('supevaluation.propevaluation', compact('students', 'supervisaornames', 'studentid', 'groupids'));
	}
        
        public function createproreport()
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
                
              
            return view('supevaluation.propreportevaluation', compact('students', 'supervisaornames', 'studentid', 'groupids'));
	}
        
        public function srscreate()
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
                
            return view('supevaluation.srsevaluation', compact('students', 'supervisaornames', 'studentid', 'groupids'));
        }
        
        public function protocreate()
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
                
            return view('supevaluation.protoevaluation', compact('students', 'supervisaornames', 'studentid', 'groupids'));
        }
                
        public function midprsentcreate()
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
                
                
            return view('supevaluation.midprsentevaluation', compact('students', 'supervisaornames', 'studentid', 'groupids'));
        }
        
        public function midreportcreate()
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
                
                
            return view('supevaluation.midreportevaluation', compact('students', 'supervisaornames', 'studentid', 'groupids'));
        }
        
        public function finalprsentcreate()
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
                
                
            return view('supevaluation.finalprsentevaluation', compact('students', 'supervisaornames', 'studentid', 'groupids'));
        }
        
        public function finalreportcreate()
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
                
                
            return view('supevaluation.finalreportevaluation', compact('students', 'supervisaornames', 'studentid', 'groupids'));
        }
        
        public function finalstatuscreate()
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
                
                
            return view('supevaluation.finalstatusevaluation', compact('students', 'supervisaornames', 'studentid', 'groupids'));
        }
        
        public function vivacreate()
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
                
                
            return view('supevaluation.vivavaluation', compact('students', 'supervisaornames', 'studentid', 'groupids'));
        }
        
        public function othercreate()
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
                
                
            return view('supevaluation.otherassess', compact('students', 'supervisaornames', 'studentid', 'groupids'));
        }
        
        function searchforStudents() {

        $searchId = Input::get('sid');
        
        /*get project title according to the student's id*/
	//$protitle = \App\Evaluation::where('studentId', $searchId)->pluck('title');
        $protitle = DB::table('projects')
                    ->where('groupID', $searchId)
                    ->Where('status', 'Approved')
                    ->pluck('title');
        
        /*get project id according to the student's id*/
        //$proid = \App\Evaluation::where('studentId', $searchId)->pluck('id');
        $proid = DB::table('projects')
                    ->where('title', $protitle)
                    ->Where('status', 'Approved')
                    ->pluck('id');
        
        /*mail adds. of members in the group*/
        $groupmails = DB::table('research_groups')
                        ->where('groupID', $searchId)
                        ->pluck('mails');
        
        $explodedemails = explode("/",$groupmails);
        
//        $idss= DB::table('students')
//                        ->where('email', $explodedemails)
//                        ->pluck('regId');

        $sendids = '';
        $sendnames = '';
        foreach ($explodedemails as $mail)
        {
           $id = (DB::table('students')
                   ->where('email', $mail)
                   ->pluck('regId'));
           
           $sendids .= $id.'/'; 
           
           /*get student name according to the student's id*/
            $stuname = (DB::table('students')
                    ->where('email', $mail)
                    ->pluck('name'));
            $sendnames .= $stuname.'/'; 
        }
        
        $explodedsendids = explode("/", rtrim($sendids, "/"));
        $explodedsendnames = explode("/", rtrim($sendnames, "/"));

        $data = array("title" => $protitle, "pid" => $proid, "sname" => $explodedsendnames, "noofstu" => sizeof($explodedemails), "ids" => $explodedsendids, "ledrid" => $explodedsendids[0]);
        return json_encode($data);
    }
        
        /**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function storepropevaluation()
	{
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
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
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
