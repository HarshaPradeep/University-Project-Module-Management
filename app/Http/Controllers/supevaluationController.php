<?php namespace App\Http\Controllers;

use App\EvaluationMarks;
use App\Http\Controllers\Controller;
use App\Project;
use DB;
use Input;
use Request;
use Symfony\Component\HttpFoundation\Response;

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
    
         /* Proposal Prsentataion*/
	public function storepropevaluation()
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
                        'status' => Input::get('statustab1'),
                        'total' => Request::get('marksforproposalpresenttab1')
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
                        'status' => Input::get('statustab2'),
                        'total' => Request::get('marksforproposalpresenttab2')    
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
                        'status' => Input::get('statustab3'),
                        'total' => Request::get('marksforproposalpresenttab3')                            
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
                        'status' => Input::get('statustab4'),
                        'total' => Request::get('marksforproposalpresenttab4')                            
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
                        'status' => Input::get('statustab5'),
                        'total' => Request::get('marksforproposalpresenttab5')                            
                            ]);                             
            }
 
            return redirect('propevaluation')->with("success", 'Marks Successfully Added!');
	}

        /*proposal Report*/
        public function storepropreportevaluation()
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
                
                $totmrk = (DB::table('evaluation_mark')
                   ->where('stuid', Request::get('cmntmem0'))
                   ->pluck('total'));
                
                EvaluationMarks::where('stuid', Request::get('cmntmem0'))
                    ->update([
                        'proposalreport' => Request::get('marksforproposalreporttab1'),
                        'status' => Input::get('statustab1'),
                        'total' => ($totmrk + Request::get('marksforproposalreporttab1'))
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
                
                $totmrk = (DB::table('evaluation_mark')
                   ->where('stuid', Request::get('cmntmem1'))
                   ->pluck('total'));
                
                EvaluationMarks::where('stuid', Request::get('cmntmem1'))
                    ->update([
                        'proposalreport' => Request::get('marksforproposalreporttab2'),
                        'status' => Input::get('statustab2'),
                        'total' => ($totmrk + Request::get('marksforproposalreporttab2'))
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
                
                $totmrk = (DB::table('evaluation_mark')
                   ->where('stuid', Request::get('cmntmem2'))
                   ->pluck('total'));
                
                EvaluationMarks::where('stuid', Request::get('cmntmem2'))
                    ->update([
                        'proposalreport' => Request::get('marksforproposalreporttab3'),
                        'status' => Input::get('statustab3'),
                        'total' => ($totmrk + Request::get('marksforproposalreporttab3'))
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
                
                $totmrk = (DB::table('evaluation_mark')
                   ->where('stuid', Request::get('cmntmem3'))
                   ->pluck('total'));
                
                EvaluationMarks::where('stuid', Request::get('cmntmem3'))
                    ->update([
                        'proposalreport' => Request::get('marksforproposalreporttab4'),
                        'status' => Input::get('statustab4'),
                        'total' => ($totmrk + Request::get('marksforproposalreporttab4'))
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
                
                $totmrk = (DB::table('evaluation_mark')
                   ->where('stuid', Request::get('cmntmem4'))
                   ->pluck('total'));
                
                EvaluationMarks::where('stuid', Request::get('cmntmem4'))
                    ->update([
                        'proposalreport' => Request::get('marksforproposalreporttab5'),
                        'status' => Input::get('statustab5'),
                        'total' => ($totmrk + Request::get('marksforproposalreporttab5'))
                            ]);                              
            }
 
            return redirect('propreportevaluation')->with("success", 'Marks Successfully Added!');
	}
        
         /*SRS*/
        public function storesrsevaluation()
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
                
                $totmrk = (DB::table('evaluation_mark')
                   ->where('stuid', Request::get('cmntmem0'))
                   ->pluck('total'));
                
                EvaluationMarks::where('stuid', Request::get('cmntmem0'))
                    ->update([
                        'srsreport' => Request::get('marksforsrstab1'),
                        'status' => Input::get('statustab1'),
                        'total' => ($totmrk + Request::get('marksforsrstab1'))
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
                
                $totmrk = (DB::table('evaluation_mark')
                   ->where('stuid', Request::get('cmntmem1'))
                   ->pluck('total'));
                
                EvaluationMarks::where('stuid', Request::get('cmntmem1'))
                    ->update([
                        'srsreport' => Request::get('marksforsrstab2'),
                        'status' => Input::get('statustab2'),
                        'total' => ($totmrk + Request::get('marksforsrstab2'))
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
                
                $totmrk = (DB::table('evaluation_mark')
                   ->where('stuid', Request::get('cmntmem2'))
                   ->pluck('total'));
                
                EvaluationMarks::where('stuid', Request::get('cmntmem2'))
                    ->update([
                        'srsreport' => Request::get('marksforsrstab3'),
                        'status' => Input::get('statustab3'),
                        'total' => ($totmrk + Request::get('marksforsrstab3'))
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
                
                $totmrk = (DB::table('evaluation_mark')
                   ->where('stuid', Request::get('cmntmem3'))
                   ->pluck('total'));
                
                EvaluationMarks::where('stuid', Request::get('cmntmem3'))
                    ->update([
                        'srsreport' => Request::get('marksforsrstab4'),
                        'status' => Input::get('statustab4'),
                        'total' => ($totmrk + Request::get('marksforsrstab4'))
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
                
                $totmrk = (DB::table('evaluation_mark')
                   ->where('stuid', Request::get('cmntmem4'))
                   ->pluck('total'));
                
                EvaluationMarks::where('stuid', Request::get('cmntmem4'))
                    ->update([
                        'srsreport' => Request::get('marksforsrstab5'),
                        'status' => Input::get('statustab5'),
                        'total' => ($totmrk + Request::get('marksforsrstab5'))
                            ]);                              
            }
 
            return redirect('srsevaluation')->with("success", 'Marks Successfully Added!');
	}
        
         /*Prototype*/
        public function storeprotovaluation()
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
                
                $totmrk = (DB::table('evaluation_mark')
                   ->where('stuid', Request::get('cmntmem0'))
                   ->pluck('total'));
                
                EvaluationMarks::where('stuid', Request::get('cmntmem0'))
                    ->update([
                        'protopresent' => Request::get('marksforprototab1'),
                        'status' => Input::get('statustab1'),
                        'total' => ($totmrk + Request::get('marksforprototab1'))
                            ]);
                
                Project::where('groupID', Input::get('selectid'))
                    ->update(['nbqsa' => Request::get('recmendornot')]);                
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
                
                $totmrk = (DB::table('evaluation_mark')
                   ->where('stuid', Request::get('cmntmem1'))
                   ->pluck('total'));
                
                EvaluationMarks::where('stuid', Request::get('cmntmem1'))
                    ->update([
                        'protopresent' => Request::get('marksforprototab2'),
                        'status' => Input::get('statustab2'),
                        'total' => ($totmrk + Request::get('marksforprototab2'))
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
                
                $totmrk = (DB::table('evaluation_mark')
                   ->where('stuid', Request::get('cmntmem2'))
                   ->pluck('total'));
                
                EvaluationMarks::where('stuid', Request::get('cmntmem2'))
                    ->update([
                        'protopresent' => Request::get('marksforprototab3'),
                        'status' => Input::get('statustab3'),
                        'total' => ($totmrk + Request::get('marksforprototab3'))
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
                
                $totmrk = (DB::table('evaluation_mark')
                   ->where('stuid', Request::get('cmntmem3'))
                   ->pluck('total'));
                
                EvaluationMarks::where('stuid', Request::get('cmntmem3'))
                    ->update([
                        'protopresent' => Request::get('marksforprototab4'),
                        'status' => Input::get('statustab4'),
                        'total' => ($totmrk + Request::get('marksforprototab4'))
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
                
                $totmrk = (DB::table('evaluation_mark')
                   ->where('stuid', Request::get('cmntmem4'))
                   ->pluck('total'));
                
                EvaluationMarks::where('stuid', Request::get('cmntmem4'))
                    ->update([
                        'protopresent' => Request::get('marksforprototab5'),
                        'status' => Input::get('statustab5'),
                        'total' => ($totmrk + Request::get('marksforprototab5'))
                            ]);                              
            }
 
            return redirect('protoevaluation')->with("success", 'Marks Successfully Added!');
	}
        
         /*mid prsentation*/
        public function storemidprsentevaluation()
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
                
                $totmrk = (DB::table('evaluation_mark')
                   ->where('stuid', Request::get('cmntmem0'))
                   ->pluck('total'));
                
                EvaluationMarks::where('stuid', Request::get('cmntmem0'))
                    ->update([
                        'midpresent' => Request::get('marksformidpresenttab1'),
                        'status' => Input::get('statustab1'),
                        'total' => ($totmrk + Request::get('marksformidpresenttab1'))
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
                
                $totmrk = (DB::table('evaluation_mark')
                   ->where('stuid', Request::get('cmntmem1'))
                   ->pluck('total'));
                
                EvaluationMarks::where('stuid', Request::get('cmntmem1'))
                    ->update([
                        'midpresent' => Request::get('marksformidpresenttab2'),
                        'status' => Input::get('statustab2'),
                        'total' => ($totmrk + Request::get('marksformidpresenttab2'))
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
                
                $totmrk = (DB::table('evaluation_mark')
                   ->where('stuid', Request::get('cmntmem2'))
                   ->pluck('total'));
                
                EvaluationMarks::where('stuid', Request::get('cmntmem2'))
                    ->update([
                        'midpresent' => Request::get('marksformidpresenttab3'),
                        'status' => Input::get('statustab3'),
                        'total' => ($totmrk + Request::get('marksformidpresenttab3'))
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
                
                $totmrk = (DB::table('evaluation_mark')
                   ->where('stuid', Request::get('cmntmem3'))
                   ->pluck('total'));
                
                EvaluationMarks::where('stuid', Request::get('cmntmem3'))
                    ->update([
                        'midpresent' => Request::get('marksformidpresenttab4'),
                        'status' => Input::get('statustab4'),
                        'total' => ($totmrk + Request::get('marksformidpresenttab4'))
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
                
                $totmrk = (DB::table('evaluation_mark')
                   ->where('stuid', Request::get('cmntmem4'))
                   ->pluck('total'));
                
                EvaluationMarks::where('stuid', Request::get('cmntmem4'))
                    ->update([
                        'midpresent' => Request::get('marksformidpresenttab5'),
                        'status' => Input::get('statustab5'),
                        'total' => ($totmrk + Request::get('marksformidpresenttab5'))
                            ]);                              
            }
 
            return redirect('midprsentevaluation')->with("success", 'Marks Successfully Added!');
	}
        
         /*mid report*/
        public function storemidreportvaluation()
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
                
                $totmrk = (DB::table('evaluation_mark')
                   ->where('stuid', Request::get('cmntmem0'))
                   ->pluck('total'));
                
                EvaluationMarks::where('stuid', Request::get('cmntmem0'))
                    ->update([
                        'midreport' => Request::get('marksformidreporttab1'),
                        'status' => Input::get('statustab1'),
                        'total' => ($totmrk + Request::get('marksformidreporttab1'))
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
                
                $totmrk = (DB::table('evaluation_mark')
                   ->where('stuid', Request::get('cmntmem1'))
                   ->pluck('total'));
                
                EvaluationMarks::where('stuid', Request::get('cmntmem1'))
                    ->update([
                        'midreport' => Request::get('marksformidreporttab2'),
                        'status' => Input::get('statustab2'),
                        'total' => ($totmrk + Request::get('marksformidreporttab2'))
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
                
                $totmrk = (DB::table('evaluation_mark')
                   ->where('stuid', Request::get('cmntmem2'))
                   ->pluck('total'));
                
                EvaluationMarks::where('stuid', Request::get('cmntmem2'))
                    ->update([
                        'midreport' => Request::get('marksformidreporttab3'),
                        'status' => Input::get('statustab3'),
                        'total' => ($totmrk + Request::get('marksformidreporttab3'))
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
                
                $totmrk = (DB::table('evaluation_mark')
                   ->where('stuid', Request::get('cmntmem3'))
                   ->pluck('total'));
                
                EvaluationMarks::where('stuid', Request::get('cmntmem3'))
                    ->update([
                        'midreport' => Request::get('marksformidreporttab4'),
                        'status' => Input::get('statustab4'),
                        'total' => ($totmrk + Request::get('marksformidreporttab4'))
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
                
                $totmrk = (DB::table('evaluation_mark')
                   ->where('stuid', Request::get('cmntmem4'))
                   ->pluck('total'));
                
                EvaluationMarks::where('stuid', Request::get('cmntmem4'))
                    ->update([
                        'midreport' => Request::get('marksformidreporttab5'),
                        'status' => Input::get('statustab5'),
                        'total' => ($totmrk + Request::get('marksformidreporttab5'))
                            ]);                              
            }
 
            return redirect('midreportevaluation')->with("success", 'Marks Successfully Added!');
	}
        
         /*final prsentation*/
        public function storefinalpresentvaluation()
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
                
                $totmrk = (DB::table('evaluation_mark')
                   ->where('stuid', Request::get('cmntmem0'))
                   ->pluck('total'));
                
                EvaluationMarks::where('stuid', Request::get('cmntmem0'))
                    ->update([
                        'finalprsent' => Request::get('marksforfinalprsenttab1'),
                        'status' => Input::get('statustab1'),
                        'total' => ($totmrk + Request::get('marksforfinalprsenttab1'))
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
                
                $totmrk = (DB::table('evaluation_mark')
                   ->where('stuid', Request::get('cmntmem1'))
                   ->pluck('total'));
                
                EvaluationMarks::where('stuid', Request::get('cmntmem1'))
                    ->update([
                        'finalprsent' => Request::get('marksforfinalprsenttab2'),
                        'status' => Input::get('statustab2'),
                        'total' => ($totmrk + Request::get('marksforfinalprsenttab2'))
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
                
                $totmrk = (DB::table('evaluation_mark')
                   ->where('stuid', Request::get('cmntmem2'))
                   ->pluck('total'));
                
                EvaluationMarks::where('stuid', Request::get('cmntmem2'))
                    ->update([
                        'finalprsent' => Request::get('marksforfinalprsenttab3'),
                        'status' => Input::get('statustab3'),
                        'total' => ($totmrk + Request::get('marksforfinalprsenttab3'))
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
                
                $totmrk = (DB::table('evaluation_mark')
                   ->where('stuid', Request::get('cmntmem3'))
                   ->pluck('total'));
                
                EvaluationMarks::where('stuid', Request::get('cmntmem3'))
                    ->update([
                        'finalprsent' => Request::get('marksforfinalprsenttab4'),
                        'status' => Input::get('statustab4'),
                        'total' => ($totmrk + Request::get('marksforfinalprsenttab4'))
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
                
                $totmrk = (DB::table('evaluation_mark')
                   ->where('stuid', Request::get('cmntmem4'))
                   ->pluck('total'));
                
                EvaluationMarks::where('stuid', Request::get('cmntmem4'))
                    ->update([
                        'finalprsent' => Request::get('marksforfinalprsenttab5'),
                        'status' => Input::get('statustab5'),
                        'total' => ($totmrk + Request::get('marksforfinalprsenttab5'))
                            ]);                              
            }
 
            return redirect('finalprsentevaluation')->with("success", 'Marks Successfully Added!');
	}
                
         /*final report*/
        public function storefinalreportevaluation()
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
                
                $totmrk = (DB::table('evaluation_mark')
                   ->where('stuid', Request::get('cmntmem0'))
                   ->pluck('total'));
                
                EvaluationMarks::where('stuid', Request::get('cmntmem0'))
                    ->update([
                        'finalreport' => Request::get('marksforfinalreporttab1'),
                        'status' => Input::get('statustab1'),
                        'total' => ($totmrk + Request::get('marksforfinalreporttab1'))
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
                
                $totmrk = (DB::table('evaluation_mark')
                   ->where('stuid', Request::get('cmntmem1'))
                   ->pluck('total'));
                
                EvaluationMarks::where('stuid', Request::get('cmntmem1'))
                    ->update([
                        'finalreport' => Request::get('marksforfinalreporttab2'),
                        'status' => Input::get('statustab2'),
                        'total' => ($totmrk + Request::get('marksforfinalreporttab2'))
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
                
                $totmrk = (DB::table('evaluation_mark')
                   ->where('stuid', Request::get('cmntmem2'))
                   ->pluck('total'));
                
                EvaluationMarks::where('stuid', Request::get('cmntmem2'))
                    ->update([
                        'finalreport' => Request::get('marksforfinalreporttab3'),
                        'status' => Input::get('statustab3'),
                        'total' => ($totmrk + Request::get('marksforfinalreporttab3'))
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
                
                $totmrk = (DB::table('evaluation_mark')
                   ->where('stuid', Request::get('cmntmem3'))
                   ->pluck('total'));
                
                EvaluationMarks::where('stuid', Request::get('cmntmem3'))
                    ->update([
                        'finalreport' => Request::get('marksforfinalreporttab4'),
                        'status' => Input::get('statustab4'),
                        'total' => ($totmrk + Request::get('marksforfinalreporttab4'))
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
                
                $totmrk = (DB::table('evaluation_mark')
                   ->where('stuid', Request::get('cmntmem4'))
                   ->pluck('total'));
                
                EvaluationMarks::where('stuid', Request::get('cmntmem4'))
                    ->update([
                        'finalreport' => Request::get('marksforfinalreporttab5'),
                        'status' => Input::get('statustab5'),
                        'total' => ($totmrk + Request::get('marksforfinalreporttab5'))
                            ]);                              
            }
 
            return redirect('finalreportevaluation')->with("success", 'Marks Successfully Added!');
	}
        
         /*viva*/
        public function storevivaevaluation()
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
                
                $totmrk = (DB::table('evaluation_mark')
                   ->where('stuid', Request::get('cmntmem0'))
                   ->pluck('total'));
                
                EvaluationMarks::where('stuid', Request::get('cmntmem0'))
                    ->update([
                        'viva' => Request::get('marksforvivatab1'),
                        'status' => Input::get('statustab1'),
                        'total' => ($totmrk + Request::get('marksforvivatab1'))
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
                
                $totmrk = (DB::table('evaluation_mark')
                   ->where('stuid', Request::get('cmntmem1'))
                   ->pluck('total'));
                
                EvaluationMarks::where('stuid', Request::get('cmntmem1'))
                    ->update([
                        'viva' => Request::get('marksforvivatab2'),
                        'status' => Input::get('statustab2'),
                        'total' => ($totmrk + Request::get('marksforvivatab2'))
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
                
                $totmrk = (DB::table('evaluation_mark')
                   ->where('stuid', Request::get('cmntmem2'))
                   ->pluck('total'));
                
                EvaluationMarks::where('stuid', Request::get('cmntmem2'))
                    ->update([
                        'viva' => Request::get('marksforvivatab3'),
                        'status' => Input::get('statustab3'),
                        'total' => ($totmrk + Request::get('marksforvivatab3'))
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
                
                $totmrk = (DB::table('evaluation_mark')
                   ->where('stuid', Request::get('cmntmem3'))
                   ->pluck('total'));
                
                EvaluationMarks::where('stuid', Request::get('cmntmem3'))
                    ->update([
                        'viva' => Request::get('marksforvivatab4'),
                        'status' => Input::get('statustab4'),
                        'total' => ($totmrk + Request::get('marksforvivatab4'))
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
                
                $totmrk = (DB::table('evaluation_mark')
                   ->where('stuid', Request::get('cmntmem4'))
                   ->pluck('total'));
                
                EvaluationMarks::where('stuid', Request::get('cmntmem4'))
                    ->update([
                        'viva' => Request::get('marksforvivatab5'),
                        'status' => Input::get('statustab5'),
                        'total' => ($totmrk + Request::get('marksforvivatab5'))
                            ]);                              
            }
 
            return redirect('vivavaluation')->with("success", 'Marks Successfully Added!');
	}
        
         /*Other assessments*/
        public function storeotherevaluation()
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
                
                $totmrk = (DB::table('evaluation_mark')
                   ->where('stuid', Request::get('cmntmem0'))
                   ->pluck('total'));

                EvaluationMarks::where('stuid', Request::get('cmntmem0'))
                    ->update([
                        'researchbook' => Request::get('finalmarksforlo1mem1'),
                        'researchpaper' => Request::get('finalmarksforlo2mem1'),
                        'website' => Request::get('finalmarksforlo3mem1'),
                        'status' => Input::get('statustab1'),
                        'total' => ($totmrk + Request::get('marksforothertab1'))
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
                
                $totmrk = (DB::table('evaluation_mark')
                   ->where('stuid', Request::get('cmntmem1'))
                   ->pluck('total'));
                
                EvaluationMarks::where('stuid', Request::get('cmntmem1'))
                    ->update([
                        'researchbook' => Request::get('finalmarksforlo1mem2'),
                        'researchpaper' => Request::get('finalmarksforlo2mem2'),
                        'website' => Request::get('finalmarksforlo3mem2'),
                        'status' => Input::get('statustab2'),
                        'total' => ($totmrk + Request::get('marksforothertab2'))
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
                
                $totmrk = (DB::table('evaluation_mark')
                   ->where('stuid', Request::get('cmntmem2'))
                   ->pluck('total'));
                
                EvaluationMarks::where('stuid', Request::get('cmntmem2'))
                    ->update([
                        'researchbook' => Request::get('finalmarksforlo1mem3'),
                        'researchpaper' => Request::get('finalmarksforlo2mem3'),
                        'website' => Request::get('finalmarksforlo3mem3'),
                        'status' => Input::get('statustab3'),
                        'total' => ($totmrk + Request::get('marksforothertab3'))
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
                
                $totmrk = (DB::table('evaluation_mark')
                   ->where('stuid', Request::get('cmntmem3'))
                   ->pluck('total'));
                
                EvaluationMarks::where('stuid', Request::get('cmntmem3'))
                    ->update([
                        'researchbook' => Request::get('finalmarksforlo1mem4'),
                        'researchpaper' => Request::get('finalmarksforlo2mem4'),
                        'website' => Request::get('finalmarksforlo3mem4'),
                        'status' => Input::get('statustab4'),
                        'total' => ($totmrk + Request::get('marksforothertab4'))
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
                
                $totmrk = (DB::table('evaluation_mark')
                   ->where('stuid', Request::get('cmntmem4'))
                   ->pluck('total'));
                
                EvaluationMarks::where('stuid', Request::get('cmntmem4'))
                    ->update([
                        'researchbook' => Request::get('finalmarksforlo1mem5'),
                        'researchpaper' => Request::get('finalmarksforlo2mem5'),
                        'website' => Request::get('finalmarksforlo3mem5'),
                        'status' => Input::get('statustab5'),
                        'total' => ($totmrk + Request::get('marksforothertab5'))
                            ]);                              
            }
 
            return redirect('otherassess')->with("success", 'Marks Successfully Added!');
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
