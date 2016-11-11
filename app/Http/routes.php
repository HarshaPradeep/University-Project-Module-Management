<?php

use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

/* hiru added */
use App\Grouping;
use App\ResearchGroups;
use App\Notifications;
use App\Http\Requests;
use App\Student;
use App\Invitations;
use Fenos\Notifynder\Facades\Notifynder;

/* hiru added end */

//App\Http\Controllers\notificationController::GetAllUnreadNotification();

Route::get('/', 'WelcomeController@index');

//Route::controllers([
//    'auth' => 'Auth\AuthController',
////	'password' => 'Auth\PasswordController',
//]);
//Route::get('report','ReportController@index');////////////////////////////////////////////////////////////////////////////////////////
//Route::get('reportfile','fileController@view');
//Route::post('report','ReportController@add');/////////////////////////////////////////////////////////////////////////////////
//Route::get('reportfile', 'viewcontroller@ind');//////////////////////////////////////////////////////////////////////////////////////

Route::get('feed', 'viewcontroller@fb');

Route::post('feed', 'feedController@addfeed');
Route::get('test33', 'projectController@test');

//notification
Route::get('/viewSupervisorDetails/{projectId}/{id}', 'notificationController@showRpcNotification');
//Route::get('actionExternalSupervisor/{supervisorid}','notificationController@accept');
//Route::get('rejectsExternalSupervisor/{supervisorid}','notificationController@reject');


Route::group(array('middleware' => 'auth'), function() {
    Route::get('logout', 'AuthenticationController@logout');
});

Route::group(array('middleware' => 'guest', 'middleware' => 'rpc'), function() {


    //ajax route for shifting the slot of the projects for thesis presentation
    Route::get('getprojectdetail/{id}', 'ThesisPanelController@getProjectDetail');

    //ajax route for shifting the slot of the projects for thesis presentation
    Route::put('updatethesisslot/{id}', 'ThesisPanelController@updateSchedule');

    //ajax route for getting the projects for thesis presentation
    Route::get('getthesisprojects', 'ThesisPanelController@getThesisProjects');

    //ajax route for checking role of supervisor
    Route::get('getavailablemembers', 'ThesisPanelController@getAvailableMembers');

    //ajax route for checking role of supervisor
    Route::get('checkIfRPC', 'ThesisPanelController@checkIfRPC');

    //manage thesispresentations in calendar view
    Route::get('thesispanels/calendar/add', 'ThesisPanelController@showThesisPresentationCalendar');

    //route for downloading pdf for schedules
    Route::get('thesispanels/schedules/pdf', 'ReportGeneratorController@generateThesisSchedulesReports');

    //view thesis presentation slots in calendar view
    Route::get('thesispanels/calendar', 'ThesisPanelController@showCalendar');
    //thesis panel management
    Route::resource('thesispanels', 'ThesisPanelController');

    //delete thesis panel
    Route::resource('deletethesispanels', 'ThesisPanelController@destroy');


    //proposal panel management
    Route::resource('proposalpanels', 'PanelController');

    //ajax route for getting freeslots of supervisor
    Route::get('getsupervisor', 'PanelController@getSupervisor');
    //ajax route for getting freeslots of panelmember
    Route::get('member1', 'PanelController@getPanelMember1');

    Route::get('updateUser', 'createUserController@updateUserindex');
    Route::get('saveUpdatedUser', 'createUserController@updateUserindexstore');

    Route::get('/searchUser', 'createUserController@search');

    Route::get('addUser', 'createUserController@index');
    Route::get('/addUserNewAccount', 'createUserController@storeUser');

    Route::get('updateExternalSupervisor', 'SupervisorController@updateSupindex');
    Route::get('updateExternalSupervisorSearch', 'SupervisorController@search');
    Route::get('updateExternalSupervisorUpdate', 'SupervisorController@updateUserindexstore');
    Route::post('updateExternalSupervisorDelete', 'SupervisorController@deleteSup');
    Route::post('ViewPendingProjects', 'RPCController@approveRejectProjects'); //
    Route::get('viewExternalSupervisorProject', 'RPCController@viewExternalSupervisorProjects');
    Route::get('externalSupervisorIDetail/{username}', 'RPCController@viewExternalSupervisorDetails'); //----------------
    Route::get('studentDetails/{id}', 'RPCController@viewStudentDetails'); //---------------------
    Route::get('viewAllPanelmembers', 'RPCController@viewAllPanelmembers');
    Route::get('projectDetail/{id}', 'RPCController@viewProjectDetails'); //--------
    Route::get('approvedExternalSupervisors', 'RPCController@viewAllExternalSupervisors');
    Route::get('allProjects', 'RPCController@viewAllProjects');
    Route::get('rejectedSupervisors', 'RPCController@rejectedSupervisors');

    Route::post('viewNotice', 'NoticeController@notice_buttons');
    Route::get('viewNotice', 'NoticeController@viewLink');

    Route::get('addNotice', 'NoticeController@add_new_notice');
    Route::post('addNotice', 'NoticeController@addNotice');

    //harsha added
    Route::get('addResearchArea', 'AddResearchArea@add_research_area');
    Route::post('addResearchArea', 'AddResearchArea@storeResearchArea');

    /*uncomment this*/
//    Route::resource('DELETE', 'AddResearchArea@destroy');
//    Route::get('DELETE/{id}', 'AddResearchArea@destroy');

    //Route::resource('addResearchArea/{id}', 'AddResearchArea@destroy');
    //evaluationform routes added by harsha///////////////////////////////
    Route::post('evaluationform', 'EvaluationController@store');
    Route::get('evaluationform', 'EvaluationController@create');
    Route::get('/searchstudentform', 'createUserController@searchforStudents');
    Route::get('viewprintmarks', 'EvaluationController@show');
    Route::get('/searchmarks', 'EvaluationController@get');

    Route::get('formsupervisor', 'supervisorevaluation@create');

    Route::get('searchmarksforcharts', 'EvaluationController@forcharts'); // data for pie charts

    Route::get('settings', 'EvaluationController@settingscreat');
    Route::post('settings', 'EvaluationController@settingsupdate');

    Route::get('editNotice/{id}', 'NoticeController@editNoticeView'); //------------------
    Route::post('editNotice/{id}', 'NoticeController@editNotice'); //--------------
    //notification
    Route::get('/viewSupervisorDetails/{projectId}/{notificationId}/{id}', 'notificationController@showRpcNotification');
    Route::get('/addSupervisorForProject', 'SupervisorController@SupervisorController');

    Route::get('/viewProjectDetails/{studentId}/{notificationId}/{projectId}', 'projectController@showSpecificProjectDet');
    Route::get('/UnreadNotification', 'notificationController@UnreadNotification');
    Route::get('/confirmForSupervisor/{projectID}/{notificationID}/{InternalSupervisorId}', 'SupervisorController@confirmSupervisorRegistration');
    Route::get('/ExternalSupervisorConfirmView', 'SupervisorController@confirmproject');
//download requestedProject Details
    Route::get('/downloadRequestedProject/{filename}', 'projectController@downloadRequestedProject');
//external Supervisor Confirmation link
    Route::get('/externalSupervisorConfirmation/{stuentId}/{projectId}', 'projectController@externalSupervisorConfirmation');

//Accept Supervisor
    Route::get('/acceptExternalSupervisor', 'SupervisorController@AcceptExternalSupervisor');
//Reject Supervisor
    Route::get('/RejectExternalSupervisor', 'SupervisorController@RejectExternalSupervisor');
//accept requested Project
    Route::get('/acceptProject', 'projectController@AcceptProject');

//accept requested Project
    Route::get('/rejectProject', 'projectController@RejectProject');
    Route::get('rpcdashboard', 'RPCController@showDashboard');
    Route::get('/ExternalSup', 'SupervisorController@create');
    Route::post('ExternalSup', ['as' => 'RegSup_store', 'uses' => 'SupervisorController@store']);
    Route::get('changeSup', 'SupervisorController@changeSupervisors');
    Route::get('/changeSupStore', 'SupervisorController@changeSupervisorsstore');
    Route::get('/viewProjectByProjectName', 'projectController@getProjectDetailsByName');
    Route::get('/acceptInternalSupervisorForProject', 'projectController@acceptInternalSupervisorForProject');
    Route::get('/rejectInternalSupervisorForProject', 'projectController@rejectInternalSupervisorForProject');
    Route::get('changeSupervisorRequest', 'RPCController@viewChangeRequestDetails');
    Route::get('changeSupervisorRequest/Reject/{id}', 'RPCController@Reject');
    Route::get('changeSupervisorRequest/Approve/{id}', 'RPCController@Approve');
    Route::post('changeSupervisorRequest', 'RPCController@filterSearch');
    Route::get('email/{mail}', 'RPCController@composeEmail');
    Route::post('email/{mail}', 'RPCController@sendEmail');

    //        hiru added*
    Route::get('manageGroups', 'GroupManageController@manageGroups');
    Route::get('viewGroup/{groupId}', 'GroupManageController@viewGroup');
    Route::post('updateStatus', 'GroupManageController@updateStatus');
    Route::post('addToGroup', 'GroupManageController@addToGroup');
    Route::post('createGroup', 'GroupManageController@createGroup');

    Route::delete('/task/{id}', function ($id) {

        $groupId = Grouping::where('email', '=', $id)->pluck('grouped');


        /* remove member from the research group */
        $members = ResearchGroups::where('groupID', '=', $groupId)->pluck('mails');
        $myArray = preg_split("/\//", $members);

        for ($count = 0; sizeof($myArray); $count++) {

            if ($myArray[$count] == $id) {
                $index = $count;
                break;
            }
        }

        /* delete the specific member from the array */
        unset($myArray[$index]);

        $newMembers = implode("/", $myArray);

        /* update the members of the research group after deletion */
        DB::table('research_groups')
                ->where('groupID', $groupId)
                ->update(['mails' => $newMembers]);

        $leadermail = Grouping::where('grouped', '=', $groupId)
                ->where('role', '=', 'leader')
                ->pluck('email');

        $invitAvl = Invitations::where('leaderMail', '=', $leadermail)
                ->where('memberMail', '=', $id)
                ->get();

        if (!$invitAvl->isEmpty()) {
            $Id = Invitations::where('leaderMail', '=', $leadermail)
                            ->where('memberMail', '=', $id)->pluck('id');
            DB::table('invitings')->where('id', '=', $Id)->delete();
        }

        DB::table('students')
                ->where('email', $id)
                ->update(['grouped' => NULL, 'role' => NULL]);
        
        $fromRegID= Student::where('email','=',$leadermail)->pluck('id');
        $toRegID= Student::where('email','=',$id)->pluck('id');

            $url ='/GroupLeaderToMemberRemoveMember/'.$fromRegID.'/'.$toRegID;
            Notifynder::category('GroupLeaderToMemberRemoveMember')
                ->from($leadermail." - ".$groupId)
                ->to($id)
                ->url($url)
                ->send();

        return redirect()->action(
                        'GroupManageController@viewGroup', ['groupId' => $groupId]
                )->with('flash_message', $id . ' was removed successfully.');
    });

//        /*end-hiru*/

    Route::get('form', 'thesisEvaluationController@editThesisForm');
    Route::post('form', 'thesisEvaluationController@editThesisFormMarks');

    Route::get('viewInternalProjects', 'thesisEvaluationController@viewInternalThesisEvaluation');
    Route::get('viewInternalProjects/publish', 'thesisEvaluationController@publishStatus');

    Route::get('viewInternalProposals/publish', 'RPCProposalEvaluationController@publishStatus');
    Route::post('viewInternalProposals', 'RPCProposalEvaluationController@filterSearch');
    Route::get('viewInternalProposals', 'RPCProposalEvaluationController@viewInternalProposalEvaluation');

//    Route::get('addFreeSlot', 'FreeSlotController@store');
    Route::get('searchedFreeSlotDetails', 'FreeSlotController@getFreeSlotDetailsByEmail');
    Route::get('test6666', 'FreeSlotController@store');
    Route::get('/viewSupervisors', 'profileController@selectSupervisor');
    Route::get('/viewSupProfile', 'profileController@viewPanelMemberInfo');

    Route::get('/profile', 'profileController@selectSupervisor');
    Route::post('/profile', 'profileController@viewProfile');

    Route::post('viewSubmissions', 'submissionsController@selectSubmissions');
    Route::get('viewSubmissions', 'submissionsController@viewSubmissionsDetails');

    Route::get('viewLink', 'uploadController@viewLinks');
    Route::post('viewLink', 'uploadController@buttonActions');
    Route::get('editLink/{linkId}', 'uploadController@editLink');
    Route::post('editLink/{linkId}', 'uploadController@updateLinkDetails');
    Route::get('viewdoc/{supId}', 'submissionsController@viewDocuments');

    Route::get('upload', 'uploadController@uploadLink');
    Route::post('upload', 'uploadController@createUploadLink');
});
Route::get('RPCViewOwnProject', 'RPCController@viewOwnProjects');

Route::get('freeSlotManager', 'FreeSlotController@index');
Route::get('freeSlotManagerload', 'FreeSlotController@load');
Route::get('/deleteAllFreeSlot', 'FreeSlotController@deleteAllFreeSlots');
Route::get('/addFreeSlot', 'FreeSlotController@store');
Route::get('/deleteFreeSlot', 'FreeSlotController@deleteSlot');

Route::get('/updateFreeSlot', 'FreeSlotController@updateSpecificFreeSlot');
Route::get('/searchSpecificFreeSlot', 'FreeSlotController@searchSpecificSlot');
Route::get('/searchSpecificFreeSlotByDate', 'FreeSlotController@searchSpecificSlotByDate');
Route::get('viewProjects/{supId}', 'SupervisorController@viewProjects');

Route::group(array('middleware' => 'guest', 'middleware' => 'panelmember'), function() {

    //resourceful controller route for monthly reports
    Route::resource('monthlyreports/supervisor', 'SupervisorMonthlyReportController');

    //ajax route to load the projects into supervisor form
    Route::get('ajax/monthlyreports/getprojects', 'SupervisorMonthlyReportController@getProjects');

    //ajax route to load the monthly report
    Route::get('ajax/monthlyreports/getmonthlyreport', 'SupervisorMonthlyReportController@getMonthlyReport');

    //dashboards
    Route::get('panelmemberdashboard', 'PanelMemberController@showDashboard');

    //download requestedProject Details
//    Route::get('/downloadRequestedProject/{filename}','projectController@downloadRequestedProject');
//view Specific Project Details
    Route::get('/viewProjectDetails/{studentId}/{projectId}', 'projectController@showSpecificProjectDet');

    Route::get('/projectPool/{supId}', 'projectController@showProjectPool');
    Route::post('/projectPool/{supId}', 'projectController@selectProjectPool');

    ///////////////////////////harsha////////////
    /////////prposal presetation/////
    Route::any('propevaluation', 'supevaluationController@createproppresen');
    Route::get('searchstudent', 'supevaluationController@searchforStudents'); //common for all
    Route::post('propevaluation', 'supevaluationController@storepropevaluation'); //send markings to db
    /////////prposal report/////
    Route::any('propreportevaluation', 'supevaluationController@createproreport');
    Route::post('propreportevaluation', 'supevaluationController@storepropreportevaluation'); //send markings to db
    /////////srs/////
    Route::any('srsevaluation', 'supevaluationController@srscreate');
    Route::post('srsevaluation', 'supevaluationController@storesrsevaluation'); //send markings to db
    ///////prototype////
    Route::any('protoevaluation', 'supevaluationController@protocreate');
    Route::post('protoevaluation', 'supevaluationController@storeprotovaluation'); //send markings to db
    //////////mid presentation/////
    Route::any('midprsentevaluation', 'supevaluationController@midprsentcreate');
    Route::post('midprsentevaluation', 'supevaluationController@storemidprsentevaluation'); //send markings to db
    ///////////mid report////
    Route::any('midreportevaluation', 'supevaluationController@midreportcreate');
    Route::post('midreportevaluation', 'supevaluationController@storemidreportvaluation'); //send markings to db
    ////////final presentation//////
    Route::any('finalprsentevaluation', 'supevaluationController@finalprsentcreate');
    Route::post('finalprsentevaluation', 'supevaluationController@storefinalpresentvaluation'); //send markings to db
    ///////final report///////
    Route::any('finalreportevaluation', 'supevaluationController@finalreportcreate');
    Route::post('finalreportevaluation', 'supevaluationController@storefinalreportevaluation'); //send markings to db
    ///////final status doc///////
    Route::any('finalstatusevaluation', 'supevaluationController@finalstatuscreate');
    //Route::post('propevaluation','supevaluationController@storepropevaluation');//send markings to db
    //////viva///////
    Route::any('vivavaluation', 'supevaluationController@vivacreate');
    Route::post('vivavaluation', 'supevaluationController@storevivaevaluation'); //send markings to db
    //////other assessments//////
    Route::any('otherassess', 'supevaluationController@othercreate');
    Route::post('otherassess', 'supevaluationController@storeotherevaluation'); //send markings to db

    Route::get('thesisPresentations', 'thesisEvaluationController@viewPresentations');
    Route::get('thesisEvaluationForm/{id}', 'thesisEvaluationController@viewThesisForm');
    Route::post('thesisEvaluationForm/{id}', 'thesisEvaluationController@evaluate');
    Route::get('editThesis/{id2}', 'thesisEvaluationController@editThesisEvaluation');
    Route::post('editThesis/{id2}', 'thesisEvaluationController@editForm');

    Route::get('ProposalEvaluationPresentations', 'ProposalEvaluationController@viewProposalPresentation');
    Route::get('proposalEvaluationForm/{id}', 'ProposalEvaluationController@addProposalEvaluation');
    Route::post('proposalEvaluationForm/{id}', 'ProposalEvaluationController@next');
    Route::get('editProposal/{id2}', 'ProposalEvaluationController@editProposalEvaluation');
    Route::post('editProposal/{id2}', 'ProposalEvaluationController@next_edit');
    Route::get('proposalEvaluationForm', 'ProposalEvaluationController@viewForm');
    Route::get('AcceptOrRejectSupervisorMeetingRequest', 'EventController@AcceptOrReject');
    Route::get('/RequestSupervisorAsYou/{projectID}/{notificationID}/{studentId}', 'SupervisorController@RequestSupervisorAsPanelMember');
    Route::post('downloadthesis', 'reportcontroller@viewReport');
    Route::get('interimrpt/get/{filename}', array('as' => 'getentry', 'uses' => 'reportcontroller@get'));
    Route::get('interimfeed', 'reportController@viewFeedback');
    Route::post('interimfeed', 'reportController@addFeedback');
    Route::get('studentinfo', 'reportController@studentInfo');
    Route::post('studentinfo', 'reportController@viewStudentDetails');
    Route::get('downloadthesis', 'reportController@downloadThesis');
    
    ////////////////////diluni///////////
    
    Route::get('taskSupervisor', 'allocationController@viewtask_allocation');
    Route::post('taskSupervisor', 'allocationController@addtask_allocation');
    
    
});

Route::group(array('middleware' => 'guest', 'middleware' => 'student'), function() {

    //view supervisor feedbacks
    Route::get('monthlyreports/student/feedbacks', 'StudentMonthlyReportController@showFeedbacks');

    //resourceful controller route for monthly reports
    Route::resource('monthlyreports/student', 'StudentMonthlyReportController');
    Route::get('studentdashboard', 'StudentController@showDashboard');
    Route::get('viewNoticesForStudent', 'NoticeController@viewLinksForStudent');

    Route::get('Students', 'studentController@view_student'); //this is for stuent view
    Route::get('download/{filename}', 'studentController@downloadFile');
    Route::get('view1/{filename1}', 'studentController@viewpdffile');

    Route::get('changeSupervisor', 'StudentController@viewChangeSupervisorForm');
    Route::post('changeSupervisor', 'StudentController@insertChangeSupervisorDetails');
    Route::get('studentDetails/{name}', 'RPCController@viewStudentDetails');
    Route::get('feedback', 'StudentController@viewStatus');
    Route::get('projectReRegistration', 'StudentProposalController@viewRegistrationForm');
    Route::post('projectReRegistration', 'StudentProposalController@Registration');
    Route::get('report', 'reportController@index');
    Route::get('studentprofile', 'reportController@viewStudentProfile');



    ////////////////////////diluni////////
    Route::get('defects/{id}', 'defectsController@createdef');
    Route::get('tasks/{id}', 'diaryController@createtas');
	Route::get('analysis', 'diaryController@createchrt');
    Route::post('analysis/getdata' , 'diaryController@getdata');

    Route::post('dupdate/{id}', 'defectsController@updateDefect');
    Route::post('tupdate/{id}', 'diaryController@updateTask');

    Route::get('diaryhome', 'diaryController@create');
    Route::get('tasks', 'diaryController@taskopen');
    Route::post('tasks', 'diaryController@storeTasks');
   
   
    Route::get('diaryhome', 'defectsController@create');
    Route::get('defects', 'defectsController@defectopen');
    Route::post('defects', 'defectsController@storeDefects');
    
    Route::resource('DELETEdef', 'defectsController@destroy');
    Route::get('DELETEdef/{id}', 'defectsController@destroy');
   
    
    Route::resource('DELETE', 'diaryController@destroy');
    Route::get('DELETE/{id}', 'diaryController@destroy');
    Route::get('diaryhome', 'allocationController@viewAllocation');


/////////////////////////hiruu////////
    /* grouping */
    Route::get('grouping', 'GroupController@viewPool');


/////////////////////////hiruu////////

    Route::post('report', 'reportController@add');
    Route::get('reportfile', 'reportController@viewIntReport');
    Route::post('reportfile', 'reportController@deleterpt');
    Route::get('viewprogress', 'reportController@viewProgress');
});
//Student routes
Route::get('/upLinksView', 'uploadController@displayLinks');
Route::get('/uploads/{linkId}', 'uploadController@uploadView');
Route::post('/uploads/{linkId}', 'submissionsController@saveUpload');
//Student routes

Route::post('login', 'AuthenticationController@postLogin');
Route::get('login', 'AuthenticationController@showLogin');
Route::get('/registration', 'StudentController@registration');
Route::post('register', 'StudentController@doRegistration');
Route::get('forgotpassword', 'AuthenticationController@getForgotPassword');
Route::post('forgotpassword', 'AuthenticationController@postForgotPassword');
Route::get('password-recover/{code}', array('as' => 'password-recover', 'uses' => 'AuthenticationController@getRecoverPassword'));
Route::post('resetpassword', 'AuthenticationController@postResetPassword');

//---hiru-----
/* invitations accept deny */

Route::post('invite', 'GroupController@storetoNotifiTable');

Route::post('acceptRequest', 'RequestController@acceptRequest');
Route::post('rejectRequest', 'RequestController@rejectRequest');
Route::post('clearRequest', 'RequestController@clearRequest');

Route::post('deleteMember', 'GroupController@deleteMember');

Route::post('deleteMemberRequest', 'GroupController@deleteRequest');

Route::post('clearNotification', 'GroupController@clearNotification');

Route::post('groupDeleteLead', 'GroupProfileController@deleteGroup');

Route::post('groupDelete', 'GroupManageController@deleteGroup');

Route::post('profile', 'GroupProfileController@updateAvatar');

Route::post('navigateProposal', 'GroupProfileController@navigateProposal');

Route::post('grpSubmit', 'SubmitProposalController@submitProposal');

/* new */
Route::get('renavigateProposal', 'SubmitProposalController@viewProposal');
/**/

Route::delete('/pendingDel/{id}', function ($id) {


    DB::table('invitings')->where('notification_id', '=', $id)->delete();
    DB::table('notifications')->where('id', '=', $id)->delete();
    /* getting current logged users email */
    $currentUserEmail = Sentinel::getUser()["email"];

    /* research id */
    $ID = ResearchGroups::where('mails', 'LIKE', $currentUserEmail . '%')->pluck('id');


    $invCount = Invitations::where('leaderMail', '=', $currentUserEmail)->count();
    $memberNames = ResearchGroups::where('mails', 'Like', $currentUserEmail . '%')->pluck('mails');


    $string_version_names = preg_split("/\//", $memberNames);

    $memberCount = sizeof($string_version_names);

    if ($invCount == 0 || $memberCount == 1) {
        DB::table('students')
                ->where('email', $currentUserEmail)
                ->update(['grouped' => NULL, 'role' => NULL]);

        DB::table('research_groups')->where('id', '=', $ID)->delete();
    }

    return redirect()->action('GroupController@viewPool')->with('flash_message', 'Successfully deleted');
});

Route::delete('/remMember/{id}', function ($id) {
    /* getting current logged users email */
    $currentUserEmail = Sentinel::getUser()["email"];

    /* research id */
    $ID = ResearchGroups::where('mails', 'LIKE', $currentUserEmail . '%')->pluck('id');

    /* research group ID */
    $groupId = ResearchGroups::where('mails', 'LIKE', $currentUserEmail . '%')->pluck('groupID');

    /* getting member mail */
    $toMail = Notifications::where('id', '=', $id)->pluck('to_id');

    /* update member grouped status back to general */
    DB::table('students')
            ->where('email', $toMail)
            ->update(['grouped' => NULL, 'role' => NULL]);

    /* delete from invitees */
    DB::table('invitings')->where('notification_id', '=', $id)->delete();


    /* remove member from the research group */
    $members = ResearchGroups::where('mails', 'LIKE', $currentUserEmail . '%')->pluck('mails');
    $myArray = preg_split("/\//", $members);

    for ($count = 0; sizeof($myArray); $count++) {

        if ($myArray[$count] == $toMail) {
            $index = $count;
            break;
        }
    }

    /* delete the specific member from the array */
    unset($myArray[$index]);

    $newMembers = implode("/", $myArray);

    /* update the members of the research group after deletion */
    DB::table('research_groups')
            ->where('groupID', $groupId)
            ->update(['mails' => $newMembers]);

    $memberNames = ResearchGroups::where('mails', 'Like', $currentUserEmail . '%')->pluck('mails');

    $string_version_names = preg_split("/\//", $memberNames);

    $invCount = Invitations::where('leaderMail', '=', $currentUserEmail)->count();

    $memberCount = sizeof($string_version_names);

    if ($invCount == 0 && $memberCount == 1) {
        DB::table('students')
                ->where('email', $currentUserEmail)
                ->update(['grouped' => NULL, 'role' => NULL]);

        DB::table('research_groups')->where('id', '=', $ID)->delete();
    }

    $fromRegID = Student::where('email', '=', $currentUserEmail)->pluck('id');
    $toRegID = Student::where('email', '=', $toMail)->pluck('id');

    $url = '/GroupLeaderToMemberRemoveMember/' . $fromRegID . '/' . $toRegID;
    Notifynder::category('GroupLeaderToMemberRemoveMember')
            ->from($currentUserEmail . " - " . $groupId)
            ->to($toMail)
            ->url($url)
            ->send();

    return redirect()->action('GroupController@viewPool')->with('flash_message', 'Member was successfully deleted');
});




//-----hiru----
//supervisor Registration for the Accepted external supervisor
Route::get('rejectsExternalSupervisor/{supervisorid}', 'SupervisorController@confirmSupervisorRegistration');

Route::get('testt', 'AuthenticationController@getTestFunction');
Route::get('ajax/testt', 'AuthenticationController@ajaxTestFunction');
Route::post('testt', 'AuthenticationController@postTestFunction');
Route::get('/doesNotHaveSupervisor/{studentId}/{notificationId}/{projectId}', 'SupervisorController@showDoseNotHaveSupervisor');
Route::get('ViewPendingProjects', 'RPCController@viewPendingProjects');
Route::get('/notificationForSupervisor/{projectID}/{notificationID}/{InternalSupervisorId}', 'SupervisorController@RegisteredNotification');

Route::get('viewThesis/{id2}', 'thesisEvaluationController@viewEvaluatedForm');
Route::get('ViewPrposal/{id2}', 'ProposalEvaluationController@viewProposalEvaluation');
Route::get('testt', 'AuthenticationController@testFunction');
Route::get('notificationForSupervisor/{projectID}/{notificationID}/{InternalSupervisorId}', 'SupervisorController@RegisteredNotification');

//add Event
Route::get('addEventToTimeline/{validity}/{type}/{saveType}', 'EventController@addEvent');
//deleted specific event
Route::get('deleteEventToTimeline', 'EventController@deleteEvent');
//update event
Route::get('updateEventToTimeline', 'EventController@updateEvent');
//get Specific Data  event Id
Route::get('getEventDataDetails', 'EventController@getEventDataForPanelMember');
//get current user today events
Route::get('getCurrentUserTimeLine', 'EventController@getCurrentUserTodayTimeLineEvents');
//just read notification
//
Route::get('justReadNotification/{notId}', 'notificationController@ReadNotification');

Route::get('/test111', function() {

    $events = ThesisPresentationPanel::join('projects', 'projects.id', '=', 'thesis_presentation_panels.projectId')
            ->select('thesis_presentation_panels.id', 'projects.title', 'thesis_presentation_panels.date', 'thesis_presentation_panels.venue', 'thesis_presentation_panels.time_start', 'thesis_presentation_panels.time_end')
            ->get();
    return view('proposalpresentations.addPanelByCalander')->with('events', $events);
});







