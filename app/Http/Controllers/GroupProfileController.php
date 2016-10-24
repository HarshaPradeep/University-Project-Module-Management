<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use App\Grouping;
//use Faker\Provider\Image;
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
use Auth;
use Input, Redirect, DB, Hash, Mail, URL, Response;
use App\newSupervisorRequest;
use App\thesisEvaluation;
use App\ProposalEvaluation;
use App\PropasalEvaluationDetails;
use Crypt;
use Session;
use File;
use Image;

class GroupProfileController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function __construct()
	{
		notificationController::showNotificationAccordingToCurrentUser();
	}

	/**
	 * delete and leave research group
	 *
	 * @return Response
	 */
	public function deleteGroup()
	{
		/*getting current logged users email*/
		$currentUserEmail = Sentinel::getUser()["email"];

		$groupId = Input::get('groupID');

		/*delete from invitings*/
		DB::table('invitings')->where('leaderMail', '=', $currentUserEmail)->delete();

		/*getting mails of group members*/
		$memberNames = ResearchGroups::where('mails','Like',$currentUserEmail.'%')->pluck('mails');
		$string_version_names = preg_split("/\//", $memberNames);

		/*updating members back to general*/
		for($count=0; $count<sizeof($string_version_names);$count++){

			DB::table('students')
				->where('email', $string_version_names[$count])
				->update(['grouped' => NULL, 'role' => NULL ]);
		}

		/*delete from researchgrp*/
		DB::table('research_groups')->where('groupID', '=', $groupId)->delete();

		return $this->viewPool();

	}

	public function viewPool()
	{

		/*getting current logged users email*/
		$currentUserEmail = Sentinel::getUser()["email"];
		
		/*getting name for the email*/
		$leaderName= Grouping::where('email','=',$currentUserEmail)->pluck('name');
		
		/*getting current users batch from ID*/
		$id = Grouping::where('email','=',$currentUserEmail)->pluck('regId');

		/*concatenating the batch from ID array*/
		$batch = $id[2].$id[3];

		/*filtering student pool according to current user*/
		$students = DB::select("SELECT DISTINCT name, email, regId
		 FROM students
		 WHERE courseField = (select courseField from students where email = '$currentUserEmail')
		 AND regId LIKE '__$batch%'
		 AND grouped IS NULL
		 AND Email NOT IN (
		 SELECT DISTINCT memberMail
		 FROM invitings
		 where leaderMail='$currentUserEmail')
		 AND email!='$currentUserEmail' 		  
                            ");
		$invitations = DB::select("SELECT DISTINCT i.id,s.name,s.email,i.status,i.notification_id
						FROM students s, invitings i
						WHERE s.email = i.memberMail
						AND leaderMail='$currentUserEmail'		
						");

		$memberNamesAvl = ResearchGroups::where('mails','Like',$currentUserEmail.'%')->get();
		$invCount = Invitations::where('leaderMail', '=', $currentUserEmail)->count();
		$role = Grouping::where('email','=',$currentUserEmail)->pluck('role');

		$isMember = Grouping::where('email','=',$currentUserEmail)->pluck('grouped');

		$grpStatus = ResearchGroups::where('mails','Like',$currentUserEmail.'%')->pluck('status');

		if (!$memberNamesAvl->isEmpty()){
			$memberNames = ResearchGroups::where('mails','Like',$currentUserEmail.'%')->pluck('mails');

			$string_version_names = preg_split("/\//", $memberNames);

			$memberCount = sizeof($string_version_names);


		}else{
			$memberCount = 0;
		}

		if($isMember != NULL && $role == "leader" && $grpStatus == "Closed"){

			$groupId = ResearchGroups::where('mails','Like',$currentUserEmail.'%')->pluck('groupID');
			$groupMembers = DB::select(" SELECT *
			FROM students
			WHERE grouped = '$groupId'
			AND role = 'member'
			AND email!= '$currentUserEmail'
			");

			$leaderMail = Grouping::where('grouped','=',$groupId)
				->where('role','=','leader')
				->first();


			$projectAvl = Project::where('studentId','=',$leaderMail->id)
				->where('groupID','=',$groupId)
				->orderBy('id', 'desc')->get();

			if (!$projectAvl->isEmpty()){
				$project = $projectAvl->first();
				$supervisorID = Project::where('groupID','=',$groupId)->pluck('supervisorId');
				if($supervisorID!=NULL){
					$supervisor = PanelMember::where('id','=',$supervisorID)->first();
				}else{
					$supervisor =NULL;
				}
			}else{
				$project = NULL;
				$supervisor = NULL;
			}
			$user = Grouping::where('email','=',$currentUserEmail)->first();

			return view('grouping.groupLeader',compact('groupMembers','leaderMail','memberCount','groupId','project','supervisor','user'));
		}elseif ($isMember != NULL && $role == "member"){
			$groupId = Grouping::where('email','=',$currentUserEmail)->pluck('grouped');

			$leaderMail = Grouping::where('grouped','=',$groupId)
				->where('role','=','leader')
				->first();

			$groupMembers = DB::select(" SELECT *
			FROM students
			WHERE grouped = '$groupId'
			AND email != '$currentUserEmail'	
								
			");

			$projectAvl = Project::where('studentId','=',$leaderMail->id)
				->where('groupID','=',$groupId)
				->orderBy('id', 'desc')->get();

			if ($projectAvl->isEmpty()){
				$project = $projectAvl->first();
				$supervisorID = $project->supervisorId;
				if($supervisorID!=NULL){
					$supervisor = PanelMember::where('id','=',$supervisorID)->first();
				}else{
					$supervisor =NULL;
				}
			}else{
				$project = NULL;
				$supervisor = NULL;
			}

			$user = Grouping::where('email','=',$currentUserEmail)->first();

			return view('grouping.groupMember',compact('groupMembers','leaderMail','memberCount','groupId','project','supervisor','user'));
		}

		else{
			return view('grouping.grouping',compact('students','leaderName','invitations','invCount','memberCount'));
		}

	}

	public function updateAvatar(Request$request){
		//Handle user upload of the avatar
		if($request->hasFile('avatar'))
		{
			$avatar = $request->file('avatar');

			if(substr($avatar->getMimeType(), 0, 5) == 'image')
			{
				$filename = time().'.'.$avatar->getClientOriginalExtension();
				Image::make($avatar)->resize(300,300)->save(public_path('/img/avatars/'.$filename));
				/*getting current logged users email*/
				$currentUserEmail = Sentinel::getUser()["email"];

				DB::table('students')
					->where('email', $currentUserEmail)
					->update(['avatar' => $filename]);
				\Session::flash('flash_message','	Profile Picture is updated.');
				return $this->viewPool();

			}
			else
			{
				\Session::flash('error','	Invalid file type. Please select a valid file of an image.');
				return $this->viewPool();
			}

		}


		else
		{
			\Session::flash('error','	Please select an image to upload.');
			return $this->viewPool();
		}


	}

	/*submit a project proposal for a group*/
	/**
	 * @param array $afterFilters
	 */
	public function navigateProposal()
	{
		/*getting current logged users groupID*/
		$groupId = Input::get('groupID');

		$supervisors = PanelMember::where('type','=','Internal Supervisor')->select('name','id')->get();

		return view('grouping.submitProposal',compact('groupId','supervisors'));

	}



}
