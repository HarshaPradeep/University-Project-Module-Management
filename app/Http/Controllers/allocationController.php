<?php namespace App\Http\Controllers;
use App\Http\Requests;
use App\intreport;
use App\PanelMember;
use App\task_allocation;
use App\Project;
use App\interimrpt;
use App\ResearchGroups;
use App\Student;
use App\Http\Controllers\Controller;
use Request;
use App\report;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\View;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class allocationController extends Controller
{

    public function __construct()
    {
        notificationController::showNotificationAccordingToCurrentUser();
    }

    public function index()
    {
        $entries['files'] = report::get();
        return view ('report', compact('entries'));
    }


    private function getStudentId($email){
        return Student::where('email' , $email)->get()[0]->regId;
    }

    private function getProjectId($groupid){
        return Project::where('groupID' , $groupid)->get()[0]->groupID;
    }
    /**
     * Supervisor can Add task_allocation for project progress which are under his/her supervision
     * @return mixed
     */
    public function addtask_allocation()
    {

         $rules = array(
             'regId' => 'required| unique:task_allocation,group_id',
             'task_allocation' => 'required',
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
              return Redirect::to('taskSupervisor')->withErrors($validator)->withInput()->with('message', 'FAILED');
          }
        else {

        $groupid = Input::get('regId');

        $students = ResearchGroups::where('groupID' , $groupid)->get();

        $mails = explode('/',$students[0]->mails);

            foreach ($mails as $mail) {

                $task_allocation = new task_allocation();
                $task_allocation->Student_no = $this->getStudentId($mail);
                $task_allocation->group_id = $this->getProjectId($groupid);
                $task_allocation->Supervisor_id = Sentinel::getUser()->id;
                $task_allocation->date = Input::get('date');
                $task_allocation->task_allocation = Input::get('task_allocation');

                $task_allocation->save();
            }

        return Redirect::to('taskSupervisor')->with('message', 'Successfully saved!');
        }
    }

    public function viewtask_allocation()
    {
        $rp = Project::where('supervisorId',PanelMember::where('email',Sentinel::getUser()->email)->get()[0]->id)->get();

        return view('auth.taskSupervisor', compact('rp'));


    }

	public function viewAllocation()
    {
        $StudentObject = Student::where('email',Sentinel::getUser()->email)->get();
        $currentUserId = $StudentObject[0]['id'];
        $studentId  = Student::where ('id', $currentUserId)->pluck('regId');

        $rp = task_allocation::where('Student_no','=',$studentId)->get();
        return view('..researchDiary/diaryhome', compact('rp'));


    }



}