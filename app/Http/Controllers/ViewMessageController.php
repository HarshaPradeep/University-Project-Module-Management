<?php namespace App\Http\Controllers;
use App\Http\Requests;
use App\Fileentry;
use Illuminate\Support\Facades\Input;
use Session;
use Redirect;
use Sentinel;
use App\Student;
use App\Message;
use App\Notification;
use DB;

class ViewMessageController extends Controller {

    public function __construct()
    {

    }

	public function index($sender, $receiver) {
        
        //Delete Notification after seen
        Notification::where('sender_id', '=', $receiver)->
                where('receiver_id', '=', $sender)->delete();


        //Get messages using sender and receiver id
        $messagePool = DB::select( DB::raw("SELECT (
                                                SELECT username FROM `panelmembers` WHERE email = 
                                                    (SELECT email from users where id = '$sender' ) UNION 
                                                SELECT username FROM `students` WHERE email = 
                                                    (SELECT email from users where id = '$sender' )  
                                                ) As sender,
                                                (
                                                SELECT username FROM `panelmembers` WHERE email = 
                                                    (SELECT email from users where id = '$receiver' ) UNION 
                                                SELECT username FROM `students` WHERE email = 
                                                    (SELECT email from users where id = '$receiver' )  
                                                )
                                                 As receiver,sender_id , receiver_id, message, date  FROM `message` where (sender_id =".$sender. " AND receiver_id = ". $receiver . " AND parent = 1 ) || (sender_id =".$receiver. " AND receiver_id = ". $sender . " AND parent = 1) ORDER BY id DESC") );

        return view('Message.ViewMessage',compact('messagePool', 'sender','receiver'));

	}
    
    public function sendMessage() {

        $message = Input::get('message');
        $sender = Input::get('sender');
        $receiver = Input::get('receiver');

        Message::insert(
            array(
                'message' => $message,
                'sender_id' => $sender,
                'receiver_id' => $receiver,
                'parent' => 1,
                'date'=> date("d-m-Y, g:i a")

                )
        );
        Message::insert(
            array(
                'message' => $message,
                'sender_id' => $receiver,
                'receiver_id' => $sender,
                'parent' => 0,
                'date'=> date("d-m-Y, g:i a")

                )
        );
        Notification::insert(
            array(
                'sender_id' => $sender,
                'receiver_id' => $receiver

                )
        );        

        return Redirect::back()
                ->with('message_success', 'Message send successfully!!');

    }

    public function deleteMessage($sender , $receiver) {

        Message::where('sender_id', '=', $sender)->
                where('receiver_id', '=', $receiver)->delete();
            return Redirect::back()
                ->with('message_success', 'Message deleted successfully!!');

    }    
}
