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
        $username = \Cartalyst\Sentinel\Laravel\Facades\Sentinel::check()->username;

        return view('groupForum', ['posts'=>$posts ],['uname'=>$username]);

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

   
    
    
    public function viewQuestion($po)
    {
             $com=comments::where('post_id',$po)->get();
              $username = \Cartalyst\Sentinel\Laravel\Facades\Sentinel::check()->username;

             $p=newsfeed::find($po);
             return view('groupForumdisplay',compact('p'))->with('com',$com)->with('uname',$username);
            

    }

    public function editPost($po)
    {

        $username = \Cartalyst\Sentinel\Laravel\Facades\Sentinel::check()->username;

        if($po == $username){
            return true;
        }
        else
            return false;
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

    public function editPostView($id)
    {
        $p = newsfeed::find($id);
        return view('editPost',compact('p'));
    }


     public function editPostN()
    {
        if (isset($_POST['toEdit'])) {

            $topic=Input::get('e_topic');
            $msg = Input::get('e_detail');
            $breaks = array("<br />", "<br>", "<br/>", "<br />", "&lt;br /&gt;", "&lt;br/&gt;", "&lt;br&gt;");
            $message = str_ireplace($breaks, "\r\n", $msg);

            $t = newsfeed::find($_POST['toEdit']);
            $t->topic = $topic;
            $t->message=$message;
            $t->save();
            \Session::flash('message_success', 'Post Updated Successfully!!');
            $posts=newsfeed::all();
            $username = \Cartalyst\Sentinel\Laravel\Facades\Sentinel::check()->username;

            return view('groupForum', ['posts'=>$posts ],['uname'=>$username]);

        }


    }

    public function deleteandgetpost(Addpost $post){

       if (isset($_POST['delete'])) {

            $u = newsfeed::find($_POST['toDelete']);
            $u->delete();
           \Session::flash('message_delete', 'Post Deleted Successfully!!');
           return Redirect::to('/groupForum');


         }
       else{
           $unique = true;


           $topic=$post->topic;
           $message=$post->message;
           $breaks = array("<br />", "<br>", "<br/>", "<br />", "&lt;br /&gt;", "&lt;br/&gt;", "&lt;br&gt;");
           $msg = str_ireplace($breaks, "\r\n",$message);
           $posts=  newsfeed::all();
           $names=$posts->lists('module_name');
           $id=$posts->lists('module_id');
           $dt = Carbon\Carbon::now();
           $username = \Cartalyst\Sentinel\Laravel\Facades\Sentinel::check()->username;


           if ($unique){

               newsfeed::create(['topic'=>$topic, 'message' => $msg,'datetime'=>$dt , 'username' => $username ]);
               return View::make('groupForum')->with($username);

               \Session::flash('message_success', 'Post Added Successfully!!');
               return Redirect::to('/groupForum');



           }  else {

               return view('Final.groupForum')->with('message', 'Error,adding the post !');
           }

       }
    }

   public function checkUser()
   {


       $username = \Cartalyst\Sentinel\Laravel\Facades\Sentinel::check()->username;
        return View::make('groupForum')->with($username);


   }

   /* public function destroy( $id, Request $request ) {
        $post = Product::findOrFail( $id );

        if ( $request->ajax() ) {
            $post->delete( $request->all() );

            \Session::flash('message_success', 'Post Updated Successfully!!');
        }
        return response(['msg' => 'Failed deleting the product', 'status' => 'failed']);
    }*/

}


