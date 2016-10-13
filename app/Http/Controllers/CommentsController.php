<?php namespace App\Http\Controllers;

use Illuminate\Http\Requests;

use App\FreeSlots;
use App\comments;
use App\Http\Requests\Addcomment;
use App\newsfeed;
use App\PanelMember;
use App\PresentationPanel;
use App\Project;
use App\Student;
use DB;
use Crypt;
use Input, Redirect, Hash, Mail, URL, Response;
use Carbon;

class CommentsController extends Controller {

	
	public function store(Addcomment $id)
        {

            $unique = true;
            $posts=newsfeed::find('$id');
            $comments=comments::all();
            $msg=$id->message;
            $des=$comments->lists('description');
           
            $dt = Carbon\Carbon::now();
            $approved=true;
            $username = \Cartalyst\Sentinel\Laravel\Facades\Sentinel::check()->username;
            $url_last = (explode('/',$_SERVER['REQUEST_URI']));
            $url_lastpart = $url_last[2];
            if ($unique) {
            comments::create(['username'=>$username,'timedate'=>$dt ,'description'=>$msg,'approved' => true,'post_id'=> $url_lastpart]);
            \Session::flash('message_success', 'Thank you for your comment!!');
                $url_last = (explode('/',$_SERVER['REQUEST_URI']));
                $url_lastpart = $url_last[2];
            return Redirect::to("/groupForumdisplay/$url_lastpart");
           
          
        }  else {

            return view('Final.groupForum')->with('message', 'Error,adding the comment !');
        }
           
            
	}

    /**
     * @param $prviouseComments
     * @return \Illuminate\View\View
     */


}