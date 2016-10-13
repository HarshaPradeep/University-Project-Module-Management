<?php namespace App\Http\Controllers;



use Illuminate\Http\Requests;
use App\Http\Requests\Addpost;
use App\FreeSlots;
use App\newsfeed;
use App\comments;
use App\PanelMember;
use App\PresentationPanel;
use App\Project;
use App\Student;
use DB;
use Crypt;
use Input, Redirect, Hash, Mail, URL, Response;
use Carbon;



class ForumController extends Controller {
    
   
    
    public function getPost(){
        
       
        $posts=newsfeed::all();
        return view('groupForum', ['posts'=>$posts ]);
    }

    public function prevComments()
    {
        $com=comments::all();
        return $com;
        //return view('groupForumdisplay/{id}')->with('comments',$com);


    }

   public function __construct()
    {
       
        notificationController::showNotificationAccordingToCurrentUser();
    }
    
    public function getComment(){

        $comments=comments::all();

        return view('groupForum{id?}',['comments'=>$comments]);
        
    }
   public function postQuestion(Addpost $post){     
         $unique = true;
        
        
          $topic=$post->topic;
          $message=$post->message;
          $posts=  newsfeed::all();
          $names=$posts->lists('module_name');
          $id=$posts->lists('module_id');         
          $dt = Carbon\Carbon::now();
          
           $username = \Cartalyst\Sentinel\Laravel\Facades\Sentinel::check()->username;
     
          
       if ($unique) {
            newsfeed::create(['topic'=>$topic, 'message' => $message,'datetime'=>$dt , 'username' => $username ]);
            \Session::flash('message_success', 'Post Added Successfully!!');
            return Redirect::to('/groupForum');
           
          
        }  else {

            return view('Final.groupForum')->with('message', 'Error,adding the post !');
        }
        
        
   }
   
    
    
    public function viewQuestion($po)
    {
             $com=comments::where('post_id',$po)->get();

             $p=newsfeed::find($po);
             return view('groupForumdisplay',compact('p'))->with('com',$com);
            

    }



    public function viewPost(){
        
        
       $posts=newsfeed::all();
       return view('viewPost',['forum'=>$posts]);
         
    }

    
    

    
    public function add_new_post()
    {
        
        $posts=newsfeed::all();
        return view('groupForum' , ['posts'=>$posts]);
    }

}


