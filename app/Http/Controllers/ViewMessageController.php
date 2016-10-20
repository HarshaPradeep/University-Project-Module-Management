<?php namespace App\Http\Controllers;
use App\Http\Requests;
use App\Fileentry;
use Illuminate\Support\Facades\Input;
use Session;
use Redirect;
use Sentinel;
use App\Student;
use App\Message;
use DB;

class ViewMessageController extends Controller {

    public function __construct()
    {

    }

	public function index($sender, $receiver) {

        $messagePool = DB::select( DB::raw("SELECT (SELECT email from users where id = '$sender' ) As sender,(SELECT email from users where id = '$receiver' ) As receiver,sender_id , receiver_id, message  FROM `message` where (sender_id =".$sender. " AND receiver_id = ". $receiver . ") || (sender_id =".$receiver. " AND receiver_id = ". $sender . ") ORDER BY id DESC") );

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
