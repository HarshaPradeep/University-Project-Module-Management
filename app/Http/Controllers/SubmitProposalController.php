<?php namespace App\Http\Controllers;

use App\Http\Requests;

use App\Http\Controllers\Controller;
use App\Proposal;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use App\Grouping;
use Illuminate\Http\Request;
use App\Quotation;
use Illuminate\Html\FormFacade;
use App\Notice;
use App\PendingProject;
use App\Project;
use App\ProjectPool;
use App\User;
use App\ExternalSupervisor;
use App\ExtSupProject;
use App\PanelMember;
use App\Student;
use App\Invitations;
use App\ResearchGroups;
use App\Fileentry;
use App\Notifications;
use Fenos\Notifynder\Facades\Notifynder;
use Input, Redirect, DB, Hash, Mail, URL, Response;
use App\newSupervisorRequest;
use App\thesisEvaluation;
use App\ProposalEvaluation;
use App\PropasalEvaluationDetails;
use Crypt;
use Session;

class SubmitProposalController extends Controller
{

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function __construct()
	{
		notificationController::showNotificationAccordingToCurrentUser();
	}

	public function submitProposal()
	{
		$validation = Proposal::validate(Input::all());

		if ($validation->fails()) {

			return redirect('renavigateProposal')
				->withErrors($validation)
				->withInput();
		}
		else 
		{

			$renamedFileName = SubmitProposalController::uploadFile(Input::file('txtFile'), '/public/uploads/projects/', Input::get('groupID'));
			$supervisorType = Input::get('supervisortype');

			if ($supervisorType === 'external') 
			{				
				//add values to panel Member table
				$id = Sentinel::getUser()["id"];
				$supervisorID = SubmitProposalController::addPanelMember(
					Input::get('supervisorName'),
					Input::get('supervisorDesignation'),
					Input::get('supervisorEmail'),
					Input::get('supervisorTelephone'),
					null,
					'External Supervisor',
					Input::get('supervisorInstitute'),
					null,
					null,
					'Pending');
//
////                //add values to project table

				$projectId = SubmitProposalController::addProject(
					Input::get('projectTitle'),
					Input::get('projectDescription'),
					Input::get('groupID'),
					$renamedFileName,
					$id,
					null,
					'Pending'
				);

//
				$url = '/viewSupervisorDetails/' . $projectId . '/' . $supervisorID;
				Notifynder::category('ConfirmExternalSupervisorRequest')
					->from(Input::get('groupID'))
					->to('RPC')
					->url($url)
					->send();


//                Mail::send('emails.forgotpassword', array('link' => URL::route('password-recover', $code), 'name' => $student->name, 'password' => $password, 'time' => $passwordReset->created_at->format('Y-m-d H:i:s')), function ($message) use ($student, $user) {
//                    $message->to($student->email, $student->name)->subject('Password Change Request');
//                });


			} 
			elseif ($supervisorType === 'internal') 
			{

				$InternalPanelMemberEmail = PanelMember::where('id', Input::get('internalsupervisor'))->pluck('email');
				$id = Sentinel::getUser()["id"];

				//add values to project table
				$projectId = SubmitProposalController::addProject(
					Input::get('projectTitle'),
					Input::get('groupID'),
					Input::get('projectDescription'),
					$renamedFileName,
					Input::get('internalsupervisor'),
					$id,
					'Pending'
				);

				$url = '/confirmForSupervisor/' . $projectId . '/' . Input::get('internalsupervisor');
				Notifynder::category('ConfirmInternalSupervisorRequest')
					->from(Input::get('groupID'))
					->to('RPC')
					->url($url)
					->send();
				$url = '/RequestSupervisorAsYou/' . $projectId . '/' .Input::get('internalsupervisor');
				Notifynder::category('RequestSupervisorAsYou')
					->from(Input::get('groupID'))
					->to($InternalPanelMemberEmail)
					//Input::get('internalsupervisor').' StudentToPanelMember'
					->url($url)
					->send();

			} 
			elseif ($supervisorType === 'none') 
			{
				$id = Sentinel::getUser()["id"];
				//add values to project table
				$projectId = SubmitProposalController::addProject(
					Input::get('projectTitle'),
					Input::get('groupID'),
					Input::get('projectDescription'),
					$renamedFileName,
					NULL,
					$id,
					'Pending'
				);

				$url = '/doesNotHaveSupervisor/' . $projectId . '/' . Input::get('groupID');
				Notifynder::category('HasNoSupervisor')
					->from(Input::get('groupID'))
					->to('RPC')
					->url($url)
					->send();
				Notifynder::category('HasNoSupervisor')
					->from(Input::get('groupID'))
					->to('AllSupervisors')
					->url($url)
					->send();
			}
			$url = '/viewProjectDetails/' . $id . '/' . $projectId;
			Notifynder::category('ConfirmProjectRequest')
				->from(Input::get('groupID'))
				->to('RPC')
				->url($url)
				->send();

			\Session::flash('success_proposal', 'Project detail documents were submitted successfully');
			return Redirect::to('grouping');

		}

	}
	
	/**
	 *re navigate to charter submit page with errors
	 */
	public function viewProposal()
	{
		$groupId = Grouping::where('id','=',Sentinel::getUser()->id)->pluck('grouped');

		$supervisors = PanelMember::where('type','=','Internal Supervisor')->select('name','id')->get();

		return view('grouping.submitProposal',compact('groupId','supervisors'));
	}

	public  function downloadFile($filename){
		$entry = Fileentry::where('filename','=', $filename)->firstOrFail();
		$file = storage_path('app') . '/' . $entry ->original_filename;
		return response()->download($file);
	}



	public function viewpdffile($filename1){
		$entry = Fileentry::where('filename', '=', $filename1)->firstOrFail();
		$path = storage_path('app') . '/' . $entry ->original_filename;
		header('content-type:application/pdf');
		echo file_get_contents($path);
		return view('Student.view1');

	}

	public function uploadFile($file,$destination,$filename)
	{

		if ($file != null) {
			$extension = $file->getClientOriginalExtension();
			$renamedFileName = $filename.'-'.rand(11111, 99999) . '.' . $extension;

			$file->move(
				base_path() . $destination, $renamedFileName
			);
			return $renamedFileName;
		}
	}
//	public function addUser($email,$password){
//		$user= Sentinel::registerAndActivate(array(
//			'email'    => $email,
//			'password' => $password,
//		));
////        $user = Sentinel::findById(1);
//		$role = Sentinel::findRoleByName('Students');
//		$role->users()->attach($user);
//	}
//	public function addStudent($name,$regId,$email,$tel,$attempt,$username,$courseField){
//		$entry =new Student;
//		$entry->name = $name;
//		$entry->regId = $regId;
//		$entry->email = $email;
//		$entry->phone = $tel;
//		$entry->attempt = $attempt;
//		$entry->username = $username;
//		$entry->courseField = $courseField;
//
//		if($entry->save()){
//			return $entry->id;
//		}
//
//	}

	public function addPanelMember($supName,$supDesignation,$supEmail,$supTel,$supSpeciality,$supType,$supUniversity,$supCvu,$userName,$supStatus){
		$entry =new PanelMember;
		$entry->name = $supName;
		$entry->designation = $supDesignation;
		$entry->email = $supEmail;
		$entry->phone = $supTel;
		$entry->speciality = $supSpeciality;
		$entry->type = $supType;
		$entry->university = $supUniversity;
		$entry->cv = $supCvu;
		$entry->username = $userName;
		$entry->status = $supStatus;

		if($entry->save()){

			return $entry->id;
		}

	}

	public function addProject($projectTitle,$groupID,$projectDescription,$projectUrl,$projectSupervisorId,$projectStudentNo,$projectStatus){
		$entry = new Project;
		$entry->title = $projectTitle;
		$entry->groupID = $groupID;
		$entry->description = $projectDescription;
		$entry->url = $projectUrl;
		$entry->studentId = $projectStudentNo;
		$entry->supervisorId = $projectSupervisorId;
		$entry->status = $projectStatus;

		if($entry->save()){
			return $entry->id;
		}
	}
}
