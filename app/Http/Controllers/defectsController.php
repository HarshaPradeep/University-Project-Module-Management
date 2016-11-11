<?php namespace App\Http\Controllers;

use App\defect;
use App\Http\Requests;
use App\Http\Controllers\Controller;
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

class defectsController extends Controller {



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
		return view('researchDiary/diaryhome');
	}
	public function createdef($id)
    {
        $defect =  defect::where('id',$id)->get();

        return view('researchDiary/dupdate',compact('defect'));
    }


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
        public function defectopen()
        {
            $currentUser = Sentinel::getUser()["email"];
            $userid = Student::where('email',$currentUser)->pluck("regid");
            $groupid = Student::where('email',$currentUser)->pluck("grouped");

            $Alldefects = defect::where('groupId',$groupid)->get();

            return view('researchDiary/defects', compact('Alldefects'));
        }
        
	public function storeDefects(Request2 $reques)
        {

            $currentUser = Sentinel::getUser()["email"];
            $userid = Student::where('email',$currentUser)->pluck("regid");
            $groupid = Student::where('email',$currentUser)->pluck("grouped");

            \App\defect::create([
                'studentId' => $userid,
                'groupId' => $groupid,
                'defect' => Request::get('entertask'),
                'description' => Request::get('desc'),
                'plantofinish' => Request::get('plantof'),
                'state' => Request::get('optionsRadios'),
                'sdate' => Request::get('start'),
                'edate' => Request::get('end'),
                'hours' => Request::get('spenthours')

                ]);

            return redirect('defects')->with('message_success', 'Defect is added!');
        }
        
        public function destroy($id)
        {
            $model = \App\defect::find($id);
            $model->delete();

            return redirect('defects')->with('message_success', 'Defect is deleted!');
        }


    public function updateDefect($id)
    {
        $dft = Input::get('entertask');
        $des=Input::get('desc');
        $ptf = Input::get('plantof');
        $st = Input::get('optionsRadios');
        $sd=Input::get('start');
        $ed = Input::get('end');
        $hr = Input::get('spenthours');


        $q = defect::where('id', $id)->update(['defect' => $dft,'description'=>$des,'plantofinish'=>$ptf,
            'state' => $st, 'sdate' => $sd, 'edate' => $ed,
            'hours' => $hr]);

        return redirect('defects')->with('message_success', 'Defect is updated!');

    }

	

}
