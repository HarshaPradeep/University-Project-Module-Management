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
		 WHERE status = 'Approved' and groupIDforTitle = any (SELECT groupID 
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
		 WHERE status = 'Approved' and groupIDforTitle = any (SELECT groupID 
		 FROM research_groups)");
                
              
            return view('supevaluation.propreportevaluation', compact('students', 'supervisaornames', 'studentid', 'groupids'));
	}
        
        public function srscreate()
        {
            return view('supevaluation.srsevaluation');
        }
        
        public function protocreate()
        {
            return view('supevaluation.protoevaluation');
        }
                
        public function midcreate()
        {
            return view('supevaluation.midevaluation');
        }
        
        function searchforpropStudents() {

        $searchId = Input::get('sid');
        
        /*get project title according to the student's id*/
	//$protitle = \App\Evaluation::where('studentId', $searchId)->pluck('title');
        $protitle = DB::table('projects')
                    ->where('groupIDforTitle', $searchId)
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
	public function store()
	{
		//
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
