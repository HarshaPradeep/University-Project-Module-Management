<?php namespace App\Http\Controllers;
use App\PanelMember;
use App\ResearchGroups;
use App\Grouping;
use App\Student;
use App\Project;
use App\Http\Requests;
use App\Pending_projects;
use Illuminate\Support\Facades\Redirect;
use App\Exsup_prj;
use Session;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Fenos\Notifynder\Facades\Notifynder;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Quotation;
use Illuminate\Html\FormFacade;
use App\Notice;
use App\PendingProject;
use App\ProjectPool;
use App\User;
use App\ExternalSupervisor;
use App\ExtSupProject;
use App\Invitations;
use App\Fileentry;
use App\Notifications;
use App\newSupervisorRequest;
use App\thesisEvaluation;
use App\ProposalEvaluation;
use App\PropasalEvaluationDetails;
use Crypt;
use Input, DB, Hash, Mail, URL, Response;


class GroupManageController extends Controller {

    public function __construct()
    {
        notificationController::showNotificationAccordingToCurrentUser();
    }

    public function manageGroups(){
        $ClosedGroupCount =  ResearchGroups::where('status','=','Closed')->count();
        $OpenGroupCount =  ResearchGroups::where('status','=','Open')->count();
        $GroupedStudentCount =  Grouping::whereNotNull('grouped')->count();
        $SingleStudentCount = Grouping::where('grouped','=',NULL)->count();

        $groups = DB::select(" SELECT *
			FROM research_groups									
			");

        /*filtering student pool */
        $students = DB::select("SELECT DISTINCT name, email, regId,courseField
		 FROM students
		 WHERE grouped IS NULL		  
                            ");

//dd($ClosedGroupCount." ".$OpenGroupCount." ".$GroupedStudentCount." ".$SingleStudentCount);
        return view('grouping.rpcManageGroups',compact('groups','students','ClosedGroupCount','OpenGroupCount','GroupedStudentCount','SingleStudentCount'));


    }
    /**
     *
     */
    public function createGroup()
    {
//get count of ids
        $groupCount = ResearchGroups::count();

        if($groupCount == 0){
            $IDcount = 0;
        }elseif ($groupCount>0){

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

        $names = Input::get('txt1');

        $myArray = preg_split("/[\s,]+/", $names);

        $leadermail = Grouping::where('regId','=',$myArray[0])->pluck('email');

        DB::table('research_groups')->insert(
            ['groupID' => $groupId, 'mails' => $leadermail, 'status' => 'Open']
        );

        DB::table('students')
            ->where('email', $leadermail)
            ->update(['grouped' => $groupId, 'role' => "leader"]);

        for($count=1; $count<sizeof($myArray); $count++)
        {

            $inviteeMail = Grouping::where('regId',$myArray[$count])->pluck('email');

            $groupMembers= ResearchGroups::where('groupID','=',$groupId)->pluck('mails');

            $newMails = $groupMembers.'/'.$inviteeMail;

            DB::table('research_groups')
                ->where('groupID', $groupId)
                ->update(['mails' => $newMails]);

            DB::table('students')
                ->where('email', $inviteeMail)
                ->update(['grouped' => $groupId, 'role' => "member"]);

        }

        DB::table('research_groups')
            ->where('groupID', $groupId)
            ->update(['status' => 'Closed']);

        \Session::flash('flash_message',$groupId.'	is successfully created.');
        return $this->manageGroups();

    }


    /**
     * @param array $afterFilters
     */
    public function viewGroup($groupId)
    {
        $groupMembers = DB::select(" SELECT *
			FROM students
			WHERE grouped = '$groupId'
			AND role = 'member'
			");

        $group = ResearchGroups::where('groupID','=',$groupId)->first();
        $groupLeader = Grouping::where('grouped','=',$groupId)
            ->where('role','=','leader')
            ->first();

        $projectAvl = Project::where('studentId','=',$groupLeader->id)
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

        /*filtering student pool */
        $students = DB::select("SELECT DISTINCT name, email, regId,courseField
		 FROM students
		 WHERE grouped IS NULL		  
                            ");

        return view('grouping.viewGroup',compact('groupId','groupLeader','groupMembers','group','project','supervisor','students'));
    }

    /**
     * @param array $afterFilters
     */
    public function updateStatus()
    {
        $groupId = Input::get('groupID');
        DB::table('research_groups')
            ->where('groupID','=',$groupId)
            ->update(['status' => "Closed"]);

        \Session::flash('flash_message',$groupId.' group is Closed.');
        return $this->viewGroup($groupId);
    }


    /*add students into research group*/
    public function addToGroup()
    {
        $names = Input::get('txt1');
        $groupId = Input::get('groupID');
        $leaderMail = Grouping::where('grouped',$groupId)
            ->where('role','leader')
            ->pluck('email');
        $leaderid = Grouping::where('grouped',$groupId)
            ->where('role','leader')
            ->pluck('id');
        $leadername = Grouping::where('grouped',$groupId)
            ->where('role','leader')
            ->pluck('name');

        $myArray = preg_split("/[\s,]+/", $names);

        for ($count = 0; $count < sizeof($myArray); $count++) {

            $inviteeId = Grouping::where('regId', $myArray[$count])->pluck('id');
            $inviteeName = Grouping::where('regId', $myArray[$count])->pluck('name');
            $inviteeMail = Grouping::where('regId', $myArray[$count])->pluck('email');

            /*toleader*/
            $url1 = '/InviteeToGroupLeaderAcceptInvitation/' . $inviteeId . '/' . $leaderid;

            Notifynder::category('InviteeToGroupLeaderAcceptInvitation')
                ->from($inviteeId . " - " . $inviteeName . " (" . $inviteeMail . ")")
                ->to($leaderMail)
                ->url($url1)
                ->send();

            /*to added member*/
            $ur2 ='/AddedToAResearchGroup/'.$leaderid.'/'.$inviteeId;

            Notifynder::category('AddedToAResearchGroup')
                ->from($leaderid . " - " . $leadername . " (" . $groupId . ")")
                ->to($inviteeMail)
                ->url($ur2)
                ->send();

            DB::table('students')
                ->where('email', $inviteeMail)
                ->update(['grouped' => $groupId,  'role' => 'member']);

            $groupMembers= ResearchGroups::where('groupID','=',$groupId)->pluck('mails');

            $newMails = $groupMembers.'/'.$inviteeMail;

            DB::table('research_groups')
                ->where('groupID', $groupId)
                ->update(['mails' => $newMails]);
        }


        \Session::flash('flash_message', 'Group members are updated');
        return $this->viewGroup($groupId);

    }

    public function deleteGroup()
    {


        $groupId = Input::get('groupID');

        $leaderMail = Grouping::where('grouped','=',$groupId)->pluck('email');

        /*delete from invitings*/
        DB::table('invitings')->where('leaderMail', '=', $leaderMail)->delete();

        /*updating members back to general*/

        DB::table('students')
            ->where('grouped', $groupId)
            ->update(['grouped' => NULL, 'role' => NULL ]);

        /*delete from researchgrp*/
        DB::table('research_groups')->where('groupID', '=', $groupId)->delete();

        return $this->manageGroups();

    }

}
