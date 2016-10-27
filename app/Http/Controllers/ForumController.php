<?php namespace App\Http\Controllers;


use Illuminate\Http\Requests;
use DateTime;
use DateTimeZone;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Addpost;
use App\Http\Requests\Addtopic;
use App\Http\Requests\Addcomment;
use App\FreeSlots;
use App\newsfeed;
use App\topics;
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

    public function viewPosts($po){


        $p=topics::find($po);
        $pos=newsfeed::where('topic_id',$po)->get();
        $uid = \Cartalyst\Sentinel\Laravel\Facades\Sentinel::check()->email;

        $v = topics::select('views')->where('id',$po)->pluck('views');
        $v++;
        $p->views = $v;
        $p->save();

        return view('groupForum', ['pos'=>$pos ],['email'=>$uid]);
    }

    public function viewQuestion($po)
    {

        $p=newsfeed::find($po);


        $v = newsfeed::select('views')->where('id',$po)->pluck('views');

        $v++;

        $p->views = $v;
        $p->save();

        $com=comments::where('post_id',$po)->get();
        $email = \Cartalyst\Sentinel\Laravel\Facades\Sentinel::check()->email;


      return view('groupForumdisplay',compact('p'))->with('com',$com)->with('email',$email);


    }

    public function editPost($po)
    {

        $email = \Cartalyst\Sentinel\Laravel\Facades\Sentinel::check()->email;

        if($po == $email){
            return true;
        }
        else
            return false;
    }





   public function editPostView($id)
    {
       $p = newsfeed::find($id);
        return view('editPost',compact('p'));
    }

    public function editTopicView($id){
        $p=topics::find($id);
        return view('editTopicView',compact('p'));
    }

    public function editTopic(){


        $topic = Input::get('e_detail');



        $postid=$_POST['toEdit'];
        $t = topics::find($_POST['toEdit']);
        $t->topic = $topic;


        $t->save();
        \Session::flash('message_success', 'Topic Updated Successfully!!');
        $posts=newsfeed::orderBy('id','desc')->paginate(5);
        $email = \Cartalyst\Sentinel\Laravel\Facades\Sentinel::check()->email;

        return Redirect::to('/viewTopics');
    }

   public function editPostN()
    {
        if (isset($_POST['toEdit'])) {

            $topic=Input::get('e_topic');
            $msg = Input::get('e_detail');
            $date = new DateTime("now", new DateTimeZone('Asia/Colombo') );
            $file = Input::file('file');


            if ($file != null) {

                //check whether a file is choosen

                $postid=$_POST['toEdit'];
                $name = $file->getClientOriginalName();
                $ext = $file->getClientOriginalExtension();
                $destinationPath = '/uploads/forum/' . $name;
                $file->move(public_path() . '/uploads/forum/', $name);


                if ($ext == 'docx' || $ext == 'pdf' || $ext == 'zip') {

                    $t = newsfeed::find($_POST['toEdit']);
                    $t->topic = $topic;
                    $t->message=$msg;
                    $t->datetime=$date;
                    $t->link=$destinationPath;
                    $t->file_name=$name;
                    $t->save();
                    \Session::flash('message_success', 'Post Updated Successfully!!');
                    $posts=newsfeed::orderBy('id','desc')->paginate(5);
                    $email = \Cartalyst\Sentinel\Laravel\Facades\Sentinel::check()->email;

                    return view('groupForum', ['posts'=>$posts ],['email'=>$email]);



                } elseif ($ext == 'png' || $ext == 'jpg' || $ext == 'JPG') {

                    $t = newsfeed::find($_POST['toEdit']);
                    $t->topic = $topic;
                    $t->message=$msg;
                    $t->datetime=$date;
                    $t->file=$destinationPath;
                    $t->file_name=$name;
                    $t->save();
                    \Session::flash('message_success', 'Post Updated Successfully!!');


                    $posts=newsfeed::orderBy('id','desc')->paginate(5);
                    $email = \Cartalyst\Sentinel\Laravel\Facades\Sentinel::check()->email;

                    return view('groupForum', ['posts'=>$posts ],['email'=>$email]);

                }

            } else {

                $postid=$_POST['toEdit'];
                $t = newsfeed::find($_POST['toEdit']);
                $t->topic = $topic;
                $t->message=$msg;
                $t->datetime=$date;
                $t->save();
                \Session::flash('message_success', 'Post Updated Successfully!!');
                $posts=newsfeed::orderBy('id','desc')->paginate(5);
                $email = \Cartalyst\Sentinel\Laravel\Facades\Sentinel::check()->email;

                return Redirect::to('/groupForumdisplay/'.$postid);


            }


        }
        elseif (isset($_POST['delete'])) {
            $postid=$_POST['toEdit'];

            $u = comments::find($_POST['toDelete']);
            $u->delete();
            \Session::flash('message_delete', 'Post Deleted Successfully!!');

            return Redirect::to("/groupForumdisplay/".$postid);


        }

    }



    public function getTopic(){



        $p=newsfeed::all();
        $email = \Cartalyst\Sentinel\Laravel\Facades\Sentinel::check()->email;

      /*  $shares = DB::table('shares')
            ->join('users', 'users.id', '=', 'shares.user_id')
            ->join('follows', 'follows.user_id', '=', 'users.id')
            ->where('follows.follower_id', '=', 3)
            ->get();*/

        /*$data = topics::orderBy('topics.updated_at', 'desc')
            ->join('users', 'users.email', '=', 'students.email')
            ->join('topics','topics.group_id','=','students.grouped')
            ->select('*')
            ->where('topics.group_id','=',$email)
            ->get();*/
        $topics=DB::table('topics')
            ->select('*')
            ->join('users','users.email','=','topics.email')
            ->where('topics.email','=',$email)
            ->get();
//dd($topics);
//            return $topics;

//        $topics=topics::orderBy('updated_at','desc')->paginate(5);
        $email = \Cartalyst\Sentinel\Laravel\Facades\Sentinel::check()->email;




//dd($topics);

        $nos=DB::table('newsfeed')->select( DB::raw('topic_id, COUNT(id) as count' ) )
            ->groupBy('topic_id')->get();


        $views=DB::table('topics')->select('id','views')->get();

        //return $views;


        return view('viewTopics',compact('topics','nos','views','email'));

    }


    public function deleteandgettopic(Addtopic $topic){



        if (isset($_POST['delete'])) {

            $u = topics::find($_POST['toDelete']);
            $u->delete();

            \Session::flash('message_delete', 'Topic Deleted Successfully!!');
            return Redirect::to('/viewTopics');


        }

        else {


            $unique = true;
            $topic = $topic->topic;
            $em = \Cartalyst\Sentinel\Laravel\Facades\Sentinel::check()->email;




            $query= DB::table('students')->select('grouped')->where('email','LIKE',$em)->pluck('grouped');



                topics::create(['topic' => $topic,'email' => $em,'group_id'=>$query]);
                \Session::flash('message_success', 'Topic Added Successfully!!');

                return Redirect::to("/viewTopics");




        }
    }

    public function deleteandaddpost(Addcomment $id)
    {
        if(isset($_POST['deletePost'])){

            $u=newsfeed::find($_POST['toDelete']);
            $u->delete();
            \Session::flash('message_delete', 'Post Deleted Successfully!!');

            return Redirect::to("/groupForum");



        }

        elseif (isset($_POST['delete'])) {

            $u = newsfeed::find($_POST['toDelete']);
            $u->delete();
            \Session::flash('message_delete', 'Comment Deleted Successfully!!');
            $url_last = (explode('/', $_SERVER['REQUEST_URI']));
            $url_lastpart = $url_last[2];
            return Redirect::to("/groupForumdisplay/$url_lastpart");


        } else {

            $unique = true;
            $topics = topics::find('$id');
            $posts = newsfeed::all();
            $topic = $id->topic;
            $msg = $id->message;
            //$des = $comments->lists('description');

            $dt = Carbon\Carbon::now();
            $approved = true;
            $email = \Cartalyst\Sentinel\Laravel\Facades\Sentinel::check()->email;
            $url_last = (explode('/', $_SERVER['REQUEST_URI']));
            $url_lastpart = $url_last[2];

            $file=Input::file('file');


            if($file!=null){

                $name = $file->getClientOriginalName();
                $ext=$file->getClientOriginalExtension();
                $destinationPath = '/uploads/forum/'. $name;
                $file->move(public_path() .'/uploads/forum/',$name);

                if($ext == 'docx' ||$ext == 'pdf' ||$ext == 'zip')
                {


                    newsfeed::create(['topic' => $topic,'message' => $msg,'email' => $email, 'datetime' => $dt,
                        'description' => $msg, 'link' => $destinationPath,'file_name'=>$name, 'topic_id' => $url_lastpart]);
                    \Session::flash('message_comment', 'Thank you for your post!!');
                    $url_last = (explode('/', $_SERVER['REQUEST_URI']));
                    $url_lastpart = $url_last[2];
                    return Redirect::back();

                }
                elseif ($ext == 'png' ||$ext == 'jpg' ||$ext == 'JPG' ) {

                    newsfeed::create(['topic' => $topic,'message' => $msg,'email' => $email, 'datetime' => $dt,
                        'description' => $msg, 'file' => $destinationPath,'file_name'=>$name, 'topic_id' => $url_lastpart]);
                    \Session::flash('message_comment', 'Thank you for your post!!');
                    $url_last = (explode('/', $_SERVER['REQUEST_URI']));
                    $url_lastpart = $url_last[2];
                    return Redirect::back();
                }
            }
            else{

                newsfeed::create(['topic' => $topic,'message' => $msg,'email' => $email, 'datetime' => $dt,
                    'description' => $msg,'topic_id' => $url_lastpart]);
                \Session::flash('message_comment', 'Thank you for your post!!');
                $url_last = (explode('/', $_SERVER['REQUEST_URI']));
                $url_lastpart = $url_last[2];
                return Redirect::back();

            }

        }
    }







}


