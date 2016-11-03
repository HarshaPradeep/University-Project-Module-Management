<?php namespace App\Http\Controllers;
use App\Http\Requests;
use App\Fileentry;
use Illuminate\Support\Facades\Input;
use Session;
use Redirect;
use Sentinel;
use App\User;
use App\Message;
use App\Notification;
use DB;


class InboxController extends Controller {

    public function __construct()
    {

    }

	public function index() {

    $currentUserEmail = Sentinel::getUser()["email"];
    $userDetails = User::where('email',$currentUserEmail)->get();
    $userId =   $userDetails[0]->id;
     
    //Get all available messages for login student
    $messagePool= DB::select( DB::raw("SELECT  DISTINCT receiver_id, 
        
        (
        SELECT username FROM `panelmembers` WHERE email = 
            (SELECT email from users where users.id =message.receiver_id  ) UNION 
        SELECT username FROM `students` WHERE email = 
            (SELECT email from users where users.id =message.receiver_id  )  
        )
        as email, (SELECT id from notification where receiver_id = '$userId' AND sender_id = message.receiver_id) As notification, sender_id FROM `message` where sender_id =".$userId) );

   
    //Get all users
    $allUsers= DB::select( DB::raw( "select username , ( SELECT id from users where email = students.email ) As id from students where email = ( SELECT email from users where email = students.email AND id !=' $userId ' ) UNION select username , ( SELECT id from users where email = panelmembers.email ) As id from panelmembers where email = ( SELECT email from users where email = panelmembers.email AND id !=' $userId ' ) " ) );

    return view('Message.inbox',compact('messagePool','allUsers','userId','getNotification'));
	}
    
  
  
}
