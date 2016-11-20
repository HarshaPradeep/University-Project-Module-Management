<?php namespace App\Http\Controllers;

use App\defect;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\task;
use Illuminate\Http\Request as Request2;
use Illuminate\Support\Facades\Input;
use Request;
use App\intreport;
use App\Student;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\View;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;


class diaryController extends Controller {


    
        public function __construct() 
        {
            notificationController::showNotificationAccordingToCurrentUser();
        }
        
	public function index()
	{
		//
	}

	public function getdata(){


	$id = Student::where('email',Sentinel::getUser()->email)->get()[0]->regId;
        $groupid = defect::where('studentId' , $id )->get()[0]->groupId;

	$start =  defect::where(['state' => 'Start', 'groupId' => $groupid])->count();
        $finish =  defect::where(['state' => 'Finish', 'groupId' => $groupid])->count();
        $not_start =  defect::where(['state' => 'Not Start', 'groupId' => $groupid])->count();
        
        $t_groupid = task::where('studentId' , $id )->get()[0]->groupId;

	$t_start =  task::where(['state' => 'Start', 'groupId' => $t_groupid])->count();
        $t_finish =  task::where(['state' => 'Finish', 'groupId' => $t_groupid])->count();
        $t_not_start =  task::where(['state' => 'Not Start', 'groupId' => $t_groupid])->count();

        return response()->json(["start" => $start, 'not_start' => $not_start , 'finish' => $finish, "t_start" => $t_start, 't_not_start' => $t_not_start , 't_finish' => $t_finish]);

    }


	public function create()
	{
		return view('researchDiary/diaryhome');
	}

	public function createchrt()
	{
		return view('researchDiary/analysis');
	}
	
    public function createtas($id)
    {
        $task =  task::where('id',$id)->get();

        return view('researchDiary/tupdate',compact('task'));
    }

        public function taskopen()
        {
            $currentUser = Sentinel::getUser()["email"];
            $userid = Student::where('email',$currentUser)->pluck("regid");
            $groupid = Student::where('email',$currentUser)->pluck("grouped");

            $Alltasks = task::where('groupId',$groupid)->get();
            return view('researchDiary/tasks', compact('Alltasks'));
        }
        
	public function storeTasks(Request2 $reques)
        {
			$currentUser = Sentinel::getUser()["email"];
            $userid = Student::where('email',$currentUser)->pluck("regid");
            $groupid = Student::where('email',$currentUser)->pluck("grouped");
			
            \App\task::create([
				'studentId' => $userid,
                'groupId' => $groupid,
                'task' => Request::get('entertask'),
                'description' => Request::get('desc'),
                'plantofinish' => Request::get('plantof'),
                'state' => Request::get('optionsRadios'),
                'sdate' => Request::get('start'),
                'edate' => Request::get('end'),
                'hours' => Request::get('spenthours')

                ]);

            return redirect('tasks')->with('message_success', 'Task is added!');
        }
        
        public function destroy($id)
        {
            
            $model = \App\task::find($id);

            $model->delete();

            return redirect('tasks')->with('message_success', 'Task is deleted!');
        }

	
    public function updateTask($id)
    {

        $tsk = Input::get('entertask');
        $des=Input::get('desc');
        $ptf = Input::get('plantof');
        $st = Input::get('optionsRadios');
        $sd=Input::get('start');
        $ed = Input::get('end');
        $hr = Input::get('spenthours');


        $q = task::where('id', $id)->update(['task' => $tsk,'description'=>$des,'plantofinish'=>$ptf,
            'state' => $st, 'sdate' => $sd, 'edate' => $ed,
            'hours' => $hr]);



        return redirect('tasks')->with('message_success', 'Task is updated!');


    }
}