<?php namespace App\Http\Controllers;
use App\Http\Requests;
use App\Fileentry;
use Illuminate\Support\Facades\Input;
use Session;
use Redirect;
use Sentinel;
use App\User;
use App\Message;
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
    $messagePool= DB::select( DB::raw("SELECT  DISTINCT receiver_id, (select email from users where users.id =message.receiver_id ) as email, sender_id FROM `message` where sender_id =".$userId) );

   
    //Get all users
    $allUsers = User::where('id','!=',$userId)->get();

    return view('Message.inbox',compact('messagePool','allUsers','userId'));
	}
    
  
  
}
