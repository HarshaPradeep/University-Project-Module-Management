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
		$invitingLeader = Invitations::where('notification_id','=',$notificationID)->pluck('leaderMail');
		$toID= Notifications::where('id','=',$notificationID)->pluck('to_id');
		$toName= Student::where('email','=',$toID)->pluck('name');
		$toRegID= Student::where('email','=',$toID)->pluck('id');
		$fromRegID= Student::where('email','=',$invitingLeader)->pluck('name');

		$groupId= ResearchGroups::where('mails','LIKE',$invitingLeader.'%')->pluck('groupID');

		/*check whether 4 members are now available for the group*/
		$memberNames = ResearchGroups::where('groupID','=',$groupId)->pluck('mails');


		$string_version_names = preg_split("/\//", $memberNames);

		$memberCount = sizeof($string_version_names);

		if($memberCount <3){
			$notificationID = Input::get('acceptnotification');
			//dd($notificationID);

			$currentUserEmail = Sentinel::getUser()["email"];
			$invitingLeader = Invitations::where('notification_id','=',$notificationID)->pluck('leaderMail');
			$groupId= ResearchGroups::where('mails','LIKE',$invitingLeader.'%')->pluck('groupID');
			$toID= Notifications::where('id','=',$notificationID)->pluck('to_id');

			DB::table('students')
				->where('email', $toID)
				->update(['grouped' => $groupId, 'role' => 'member']);

			DB::table('invitings')
				->where('notification_id', $notificationID)
				->update(['status' => 'Accepted']);

			$groupMembers= ResearchGroups::where('groupID','=',$groupId)->pluck('mails');

			$newMails = $groupMembers.'/'.$toID;

			DB::table('research_groups')
				->where('groupID', $groupId)
				->update(['mails' => $newMails]);

			Notifynder::readOne($notificationID);
			notificationController::showNotificationAccordingToCurrentUser();

			$url ='/InviteeToGroupLeaderAcceptInvitation/'.$toRegID.'/'.$fromRegID;
			Notifynder::category('InviteeToGroupLeaderAcceptInvitation')
				->from($toID." - ".$toName)
				->to($invitingLeader)
				->url($url)
				->send();

			\Session::flash('flash_message','	Now you are a member of Research group '. $groupId);


			$leaderMail = Grouping::where('grouped','=',$groupId)
				->where('role','=','leader')
				->first();

			$groupMembers = DB::select(" SELECT *
			FROM students
			WHERE grouped = '$groupId'
			AND email != '$currentUserEmail'
			AND role = 'member'
			OR role = 'leader'
						
			");

			$project = Project::where('studentId','=',$leaderMail->id)
				->where('groupID','=',$groupId)
				->orderBy('id', 'desc')
				->first();
			
			$supervisor = PanelMember::where('id','=',$project->supervisorId)->first();
			
			$user = Grouping::where('grouped','=',$groupId)->first();
			
			return view('grouping.groupMember',compact('groupMembers','leaderMail','memberCount','groupId','project','supervisor','user'));
		}else if($memberCount == 3){
			
			$groupId= ResearchGroups::where('mails','LIKE',$invitingLeader.'%')->pluck('groupID');
			
			$notificationID = Input::get('acceptnotification');
			
			$toID= Notifications::where('id','=',$notificationID)->pluck('to_id');

			$currentUserEmail = Sentinel::getUser()["email"];
			$invitingLeader = Invitations::where('notification_id','=',$notificationID)->pluck('leaderMail');
			
			DB::table('students')
				->where('email', $toID)
				->update(['grouped' => $groupId, 'role' => 'member']);

			DB::table('invitings')
				->where('notification_id', $notificationID)
				->update(['status' => 'Accepted']);

			DB::table('research_groups')
				->where('groupId', $groupId)
				->update(['status' => 'Closed']);

			$groupMembers= ResearchGroups::where('groupID','=',$groupId)->pluck('mails');

			$newMails = $groupMembers.'/'.$toID;

			DB::table('research_groups')
				->where('groupID', $groupId)
				->update(['mails' => $newMails]);

			Notifynder::readOne($notificationID);
			
			notificationController::showNotificationAccordingToCurrentUser();

			$url ='/InviteeToGroupLeaderAcceptInvitation/'.$toRegID.'/'.$fromRegID;
			Notifynder::category('InviteeToGroupLeaderAcceptInvitation')
				->from($toID." - ".$toName)
				->to($invitingLeader)
				->url($url)
				->send();

			$groupId = Grouping::where('email','=',$currentUserEmail)->pluck('grouped');

			$leaderMail = Grouping::where('grouped','=',$groupId)
				->where('role','=','leader')
				->first();

			$groupMembers = DB::select(" SELECT *
			FROM students
			WHERE grouped = '$groupId'
			AND email != '$currentUserEmail'
			AND role = 'member'
			OR role = 'leader'
						
			");

			$project = Project::where('studentId','=',$leaderMail->id)
				->where('groupID','=',$groupId)
				->orderBy('id', 'desc')
				->first();
			
			$supervisor = PanelMember::where('id','=',$project->supervisorId)->first();
			
			$user = Grouping::where('grouped','=',$groupId)->first();

			\Session::flash('flash_message','	Now you are a member of Research group '. $groupId);
			return view('grouping.groupMember',compact('groupMembers','leaderMail','memberCount','groupId','project','supervisor','user'));
		
		}else{
			
			Notifynder::readOne($notificationID);
			notificationController::showNotificationAccordingToCurrentUser();
			\Session::flash('error','	Sorry, \''.$groupId.'\' is closed now. You can not join this group.');
			return redirect('studentdashboard');
			
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
		//dd($invitingLeader);
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
