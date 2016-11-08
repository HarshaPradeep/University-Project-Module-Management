<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
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
class RequestController extends Controller {

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
	 * Store to research group. update students' grouped status
	 *
	 * @return Response
	 */
	public function acceptRequest()
	{
		$notificationID = Input::get('acceptnotification');
		//dd($notificationID);

		$currentUserEmail = Sentinel::getUser()["email"];
		$isGrouped = Student::where('email', '=', $currentUserEmail)->pluck('grouped');
		$invitingLeader = Invitations::where('notification_id', '=', $notificationID)->pluck('leaderMail');
		$toID = Notifications::where('id', '=', $notificationID)->pluck('to_id');
		$toName = Student::where('email', '=', $toID)->pluck('name');
		$toRegID = Student::where('email', '=', $toID)->pluck('id');
		$fromRegID = Student::where('email', '=', $invitingLeader)->pluck('name');

		$groupId = ResearchGroups::where('mails', 'LIKE', $invitingLeader . '%')->pluck('groupID');

		/*check whether 4 members are now available for the group*/
		$memberNames = ResearchGroups::where('groupID', '=', $groupId)->pluck('mails');


		$string_version_names = preg_split("/\//", $memberNames);

		$memberCount = sizeof($string_version_names);

		if ($isGrouped != NULL)
		{
			DB::table('invitings')
				->where('notification_id', $notificationID)
				->update(['status' => 'Rejected']);
			Notifynder::readOne($notificationID);
			notificationController::showNotificationAccordingToCurrentUser();
			\Session::flash('error', '	Sorry. You can not join this group.');
			return redirect('studentdashboard');
		}
		else
		{
			if ($memberCount < 3) {
				$invitingLeader = Invitations::where('notification_id', '=', $notificationID)->pluck('leaderMail');

				$notificationID = Input::get('acceptnotification');
				//dd($notificationID);

				$currentUserEmail = Sentinel::getUser()["email"];

				$groupId = ResearchGroups::where('mails', 'LIKE', $invitingLeader . '%')->pluck('groupID');
				$toID = Notifications::where('id', '=', $notificationID)->pluck('to_id');

				DB::table('students')
					->where('email', $toID)
					->update(['grouped' => $groupId, 'role' => 'member']);

				DB::table('invitings')
					->where('notification_id', $notificationID)
					->update(['status' => 'Accepted']);

				DB::table('invitings')
					->where('memberMail', $currentUserEmail)
					->where('notification_id', '!=', $notificationID)
					->update(['status' => 'Rejected']);

				Notifynder::readOne($notificationID);

				DB::table('notifications')
					->where('to_id', '=', $currentUserEmail)
					->where('url', 'like', '_GroupLeaderToInviteeGroupInvitation%')
					->update(['read' => 1]);

				$groupMem = ResearchGroups::where('groupID', '=', $groupId)->pluck('mails');

				$newMails = $groupMem . '/' . $toID;

				DB::table('research_groups')
					->where('groupID', $groupId)
					->update(['mails' => $newMails]);

				$url = '/InviteeToGroupLeaderAcceptInvitation/' . $toRegID . '/' . $fromRegID;
				Notifynder::category('InviteeToGroupLeaderAcceptInvitation')
					->from($toID . " - " . $toName)
					->to($invitingLeader)
					->url($url)
					->send();

				notificationController::showNotificationAccordingToCurrentUser();

				\Session::flash('flash_message', '	Now you are a member of Research group ' . $groupId);

				return $this->viewPool();

			} else if ($memberCount == 3) {
				$invitingLeader = Invitations::where('notification_id', '=', $notificationID)->pluck('leaderMail');
				$groupId = ResearchGroups::where('mails', 'LIKE', $invitingLeader . '%')->pluck('groupID');

				$notificationID = Input::get('acceptnotification');
				DB::table('invitings')->where('status', '=', 'Pending')->where('leaderMail', '=', $invitingLeader)->delete();
				$toID = Notifications::where('id', '=', $notificationID)->pluck('to_id');

				$currentUserEmail = Sentinel::getUser()["email"];
				$invitingLeader = Invitations::where('notification_id', '=', $notificationID)->pluck('leaderMail');

				DB::table('students')
					->where('email', $toID)
					->update(['grouped' => $groupId, 'role' => 'member']);

				DB::table('invitings')
					->where('notification_id', $notificationID)
					->update(['status' => 'Accepted']);

				DB::table('invitings')
					->where('memberMail', $currentUserEmail)
					->where('notification_id', '!=', $notificationID)
					->update(['status' => 'Rejected']);

				DB::table('research_groups')
					->where('groupId', $groupId)
					->update(['status' => 'Closed']);

				$groupMem = ResearchGroups::where('groupID', '=', $groupId)->pluck('mails');

				$newMails = $groupMem . '/' . $toID;

				DB::table('research_groups')
					->where('groupID', $groupId)
					->update(['mails' => $newMails]);

				Notifynder::readOne($notificationID);

				notificationController::showNotificationAccordingToCurrentUser();

				$url = '/InviteeToGroupLeaderAcceptInvitation/' . $toRegID . '/' . $fromRegID;
				Notifynder::category('InviteeToGroupLeaderAcceptInvitation')
					->from($toID . " - " . $toName)
					->to($invitingLeader)
					->url($url)
					->send();


				\Session::flash('flash_message', '	Now you are a member of Research group ' . $groupId);
				return $this->viewPool();

			} else {
				DB::table('invitings')->where('status', '=', 'Pending')->where('leaderMail', '=', $invitingLeader)->delete();
				Notifynder::readOne($notificationID);
				notificationController::showNotificationAccordingToCurrentUser();
				\Session::flash('error', '	Sorry, \'' . $groupId . '\' is closed now. You can not join this group.');
				return redirect('studentdashboard');

			}
		}

	}

	/**
	 * Remove the notification from the list,invitings
	 *
	 * @return Response
	 */
	public function rejectRequest()
	{
		$notificationID = Input::get('rejectnotification');

		$invitingLeader = Invitations::where('notification_id','=',$notificationID)->pluck('leaderMail');
		
		$toID= Notifications::where('id','=',$notificationID)->pluck('to_id');
		$toName= Student::where('email','=',$toID)->pluck('name');
		$toRegID= Student::where('email','=',$toID)->pluck('id');
		$fromRegID= Student::where('email','=',$invitingLeader)->pluck('name');

		DB::table('invitings')
			->where('notification_id', $notificationID)
			->update(['status' => 'Rejected']);

		/*research id*/
		$ID = ResearchGroups::where('mails','LIKE', $invitingLeader.'%')->pluck('id');
		$invCount = Invitations::where('leaderMail', '=', $invitingLeader)->count();

		$memberNames = ResearchGroups::where('mails','Like',$invitingLeader.'%')->pluck('mails');


		$string_version_names = preg_split("/\//", $memberNames);

		$memberCount = sizeof($string_version_names);

		if($invCount == 0 && $memberCount == 1){
			DB::table('students')
				->where('email', $invitingLeader)
				->update(['grouped' => NULL, 'role' => NULL ]);

			DB::table('research_groups')->where('id', '=', $ID)->delete();
			DB::table('invitings')->where('leaderMail', '=', $invitingLeader)->delete();
		}
		
		Notifynder::readOne($notificationID);

		$url ='/InviteeToGroupLeaderRejectInvitation/'.$toRegID.'/'.$fromRegID;
		Notifynder::category('InviteeToGroupLeaderRejectInvitation')
			->from($toID." - ".$toName)
			->to($invitingLeader)
			->url($url)
			->send();

		\Session::flash('flash_message','	You rejected the '.$invitingLeader.' \'s group invitation');
		return redirect('studentdashboard');
		
	}

	/**
	 * Clear the notification from the students notification list after reading
	 */
	public function clearRequest()
	{
		$notificationID = Input::get('clearnotification');
		//dd($notificationID);

		Notifynder::delete($notificationID);

		//\Session::flash('flash_message','You deleted the notification successfully');
		return redirect('studentdashboard');

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
			//dd($groupId);
			$groupMembers = DB::select(" SELECT *
			FROM students
			WHERE grouped = '$groupId'
			AND role = 'member'
			AND email!= '$currentUserEmail'
			");
			//dd($groupMembers);

			$leaderMail = Grouping::where('grouped','=',$groupId)
				->where('role','=','leader')
				->first();
			//dd($leaderMail);

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



			//dd($project);

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

			return view('grouping.groupMember',compact('groupMembers','leaderMail','memberCount','groupId','project','supervisor','user'));
		}

		else
		{
			return view('grouping.grouping',compact('students','leaderName','invitations','invCount','memberCount'));
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


}
