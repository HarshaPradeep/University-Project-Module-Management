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

class GroupController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function __construct()
	{
		notificationController::showNotificationAccordingToCurrentUser();
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
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function storetoNotifiTable()
	{
		/*getting current logged users email*/
		$currentUserEmail = Sentinel::getUser()["email"];

        //if group doesnot exists
        if(ResearchGroups::where('mails','LIKE',$currentUserEmail.'%')->count() == 0)
        {
            //get count of ids
            $groupCount = ResearchGroups::count();

			if($groupCount == 0){
				$IDcount = 0;
			}elseif ($groupCount>0){
				/*getting name last group*/
				$groupName = ResearchGroups::whereRaw('id = (select max(`id`) from research_groups)')->pluck('groupID');
				$grpId = explode("_", $groupName);

				$ID = $grpId[1];
				$IDcount = intval($ID);
			}

            $newID = $IDcount+1;
            $yr = date("y");

            if(strlen($IDcount)==1)
            {
                $groupId = "CDAP".substr( $yr, -2 )."_00".$newID;

            }

            elseif(strlen($IDcount)==2)
            {
                $groupId = "CDAP".substr( $yr, -2 )."_0".$newID;
            }

            elseif(strlen($IDcount)==3)
            {
                $groupId = "CDAP".substr( $yr, -2 )."_".$newID;
            }

            DB::table('research_groups')->insert(
                ['groupID' => $groupId, 'mails' => $currentUserEmail, 'status' => 'Open']
            );

			
            DB::table('students')
                ->where('email', $currentUserEmail)
                ->update(['grouped' => $groupId, 'role' => "leader"]);

        }

		
		$names = Input::get('txt1');

		$myArray = preg_split("/[\s,]+/", $names);

		$id = Grouping::where('email','=',$currentUserEmail)->pluck('regId');

		$invitingName = Grouping::where('email','=',$currentUserEmail)->pluck('name');

		$invitingId = Grouping::where('email','=',$currentUserEmail)->pluck('id');

		$groupId = Grouping::where('email','=',$currentUserEmail)->pluck('grouped');

		for($count=0; $count<sizeof($myArray); $count++)
		{

			$inviteeId = Grouping::where('regId',$myArray[$count])->pluck('id');

			$inviteeMail = Grouping::where('regId',$myArray[$count])->pluck('email');

			$url ='/GroupLeaderToInviteeGroupInvitation/'.$invitingId.'/'.$inviteeId;

			Notifynder::category('GroupLeaderToInviteeGroupInvitation')
				->from($id." - ".$invitingName." (".$currentUserEmail.")")
				//->from($currentUserEmail)
				->to($inviteeMail)
				->url($url)
				->send();

			$notifyID = Notifications::where('from_id',$id." - ".$invitingName." (".$currentUserEmail.")")
				->where('to_id',$inviteeMail)
				->pluck('id');


			DB::table('invitings')->insert(
				['leaderMail' => $currentUserEmail, 'memberMail' => $inviteeMail,
					'status' => 'Pending', 'notification_id'=>$notifyID]
			);

			DB::table('students')
				->where('email', $currentUserEmail)
				->update(['grouped' => $groupId]);

		}

		\Session::flash('flash_message','	Successfully sent.');
		return $this->viewPool();


		

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @return Response
	 */
	public function deleteMember()
	{
        /*getting current logged users email*/
        $currentUserEmail = Sentinel::getUser()["email"];

        /*deleting members notification*/
        $notificationID = Input::get('deleteMember');

        /*research id*/
        $ID = ResearchGroups::where('mails','LIKE', $currentUserEmail.'%')->pluck('id');

        /*research group ID*/
        $groupId = ResearchGroups::where('mails','LIKE', $currentUserEmail.'%')->pluck('groupID');

		/*getting member mail*/
		$toMail = Notifications::where('id','=',$notificationID)->pluck('to_id');

		/*update member grouped status back to general*/
		DB::table('students')
			->where('email', $toMail)
			->update(['grouped' => NULL, 'role' => NULL]);

		/*delete from invitees*/
		DB::table('invitings')->where('notification_id', '=', $notificationID)->delete();


		/*remove member from the research group*/
		$members = ResearchGroups::where('mails','LIKE',$currentUserEmail.'%')->pluck('mails');
		$myArray = preg_split("/\//", $members);

		for($count = 0; sizeof($myArray); $count++){

			if($myArray[$count]==$toMail){
				$index = $count;
				break;
				dd($index);
			}
		}

		/*delete the specific member from the array*/
		unset($myArray[$index]);

		$newMembers = implode("/",$myArray);

		/*update the members of the research group after deletion*/
		DB::table('research_groups')
			->where('id', $ID)
			->update(['mails' => $newMembers]);

		$memberNames = ResearchGroups::where('mails','Like',$currentUserEmail.'%')->pluck('mails');


		$string_version_names = preg_split("/\//", $memberNames);

		$invCount = Invitations::where('leaderMail', '=', $currentUserEmail)->count();

		$memberCount = sizeof($string_version_names);

        if($invCount == 0 && $memberCount == 1){
            DB::table('students')
                ->where('email', $currentUserEmail)
                ->update(['grouped' => NULL, 'role' => NULL]);

            DB::table('research_groups')->where('id', '=', $ID)->delete();
            
        }

        $fromRegID= Student::where('email','=',$currentUserEmail)->pluck('id');
        $toRegID= Student::where('email','=',$toMail)->pluck('id');

        $url ='/GroupLeaderToMemberRemoveMember/'.$fromRegID.'/'.$toRegID;
        Notifynder::category('GroupLeaderToMemberRemoveMember')
            ->from($currentUserEmail." - ".$groupId)
            ->to($toMail)
            ->url($url)
            ->send();

     
		\Session::flash('flash_message', '	Member '.$toMail.' was removed from the group.');
		return $this->viewPool();

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @return Response
	 */
	public function deleteRequest()
	{
        $notificationID = Input::get('deleteRequest');

        DB::table('invitings')->where('notification_id', '=', $notificationID)->delete();
		DB::table('notifications')->where('id', '=', $notificationID)->delete();
        /*getting current logged users email*/
        $currentUserEmail = Sentinel::getUser()["email"];

		/*research id*/
		$ID = ResearchGroups::where('mails','LIKE', $currentUserEmail.'%')->pluck('id');

        /*getting name for the email*/
        $leaderName= Grouping::where('email','=',$currentUserEmail)->pluck('name');


		$invCount = Invitations::where('leaderMail', '=', $currentUserEmail)->count();
		$memberNames = ResearchGroups::where('mails','Like',$currentUserEmail.'%')->pluck('mails');


		$string_version_names = preg_split("/\//", $memberNames);

		$memberCount = sizeof($string_version_names);

		if($invCount == 0 || $memberCount == 1){
			DB::table('students')
				->where('email', $currentUserEmail)
				->update(['grouped' => NULL, 'role' => NULL ]);

			DB::table('research_groups')->where('id', '=', $ID)->delete();

		}

		\Session::flash('flash_message','	Successfully deleted.');
		return $this->viewPool();

	}

    /**
     * Clear the notification from the students notification list after reading
     */
    public function clearNotification()
    {
        $notificationID = Input::get('clearNotif');
        //dd($notificationID);

        Notifynder::delete($notificationID);

        //\Session::flash('flash_message','You deleted the notification successfully');
        return redirect('studentdashboard');

    }

}
