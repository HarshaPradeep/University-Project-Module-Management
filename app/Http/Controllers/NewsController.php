<?php namespace App\Http\Controllers;


use Illuminate\Http\Requests;
use DateTime;
use DateTimeZone;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Addpost;
use App\Http\Requests\Addtopic;
use App\Http\Requests\Addcomment;
use App\FreeSlots;
use App\news_posts;
use App\news_topic;
use App\news_comments;
use App\PanelMember;
use App\PresentationPanel;
use App\Project;
use App\Student;
use DB;
use Crypt;
use Input, Redirect, Hash, Mail, URL, Response;
use Carbon;



class NewsController extends Controller {



    public function prevComments()
    {
        $com=news_comments::all();
        return $com;


    }

    public function __construct()
    {

        notificationController::showNotificationAccordingToCurrentUser();
    }


    public function getComment(){

        $comments=news_comments::all();


    }

    public function viewPosts($po){


        $p=news_topic::find($po);
        $viewtopic=$p->topic;
        $pos=news_posts::where('topic_id',$po)->orderBy('id','desc')->paginate(5);
        $email = \Cartalyst\Sentinel\Laravel\Facades\Sentinel::check()->email;

        $v = news_topic::select('views')->where('id',$po)->pluck('views');
        $v++;
        $p->views = $v;
        $p->save();

        return view('newsforum/newsForum',compact('pos','email','viewtopic'));
    }


    public function viewQuestion($po)
    {

        $p=news_posts::find($po);


        $v = news_posts::select('views')->where('id',$po)->pluck('views');

        $v++;

        $p->views = $v;
        $p->save();

        $com=news_comments::where('post_id',$po)->get();
        $email = \Cartalyst\Sentinel\Laravel\Facades\Sentinel::check()->email;


        return view('newsforum/newsForumdisplay',compact('p'))->with('com',$com)->with('email',$email);


    }

    public function editPostNews($po)
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
        $p = news_posts::find($id);
        return view('/newsforum/editPostNews',compact('p'));
    }

    public function editTopicView($id){
        $p=news_topic::find($id);
        return view('/newsforum/editTopicViewNews',compact('p'));
    }

    public function editTopic(){


        $topic = Input::get('e_detail');



        $postid=$_POST['toEdit'];
        $t = news_topic::find($_POST['toEdit']);
        $t->topic = $topic;


        $t->save();
        \Session::flash('message_success', 'Topic Updated Successfully!!');
        $posts=news_posts::orderBy('id','desc')->paginate(5);
        $email = \Cartalyst\Sentinel\Laravel\Facades\Sentinel::check()->email;

        return Redirect::to('/viewNewsTopics');
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

                    $t = news_posts::find($_POST['toEdit']);
                    $t->topic = $topic;
                    $t->message=$msg;
                    $t->datetime=$date;
                    $t->link=$destinationPath;
                    $t->file_name=$name;
                    $t->save();
                    \Session::flash('message_success', 'Post Updated Successfully!!');
                    $posts=news_posts::orderBy('id','desc')->paginate(5);
                    $email = \Cartalyst\Sentinel\Laravel\Facades\Sentinel::check()->email;

                    return view('/newsForum', ['posts'=>$posts ],['email'=>$email]);



                } elseif ($ext == 'png' || $ext == 'jpg' || $ext == 'JPG') {

                    $t = news_posts::find($_POST['toEdit']);
                    $t->topic = $topic;
                    $t->message=$msg;
                    $t->datetime=$date;
                    $t->file=$destinationPath;
                    $t->file_name=$name;
                    $t->save();
                    \Session::flash('message_success', 'Post Updated Successfully!!');


                    $posts=news_posts::orderBy('id','desc')->paginate(5);
                    $email = \Cartalyst\Sentinel\Laravel\Facades\Sentinel::check()->email;

                    return view('/newsForum', ['posts'=>$posts ],['email'=>$email]);

                }

            } else {

                $postid=$_POST['toEdit'];
                $t = news_posts::find($_POST['toEdit']);
                $t->topic = $topic;
                $t->message=$msg;
                $t->datetime=$date;
                $t->save();
                \Session::flash('message_success', 'Post Updated Successfully!!');
                $posts=news_posts::orderBy('id','desc')->paginate(5);
                $email = \Cartalyst\Sentinel\Laravel\Facades\Sentinel::check()->email;

                return Redirect::to('/newsForumdisplay/'.$postid);


            }


        }
        elseif (isset($_POST['delete'])) {
            $postid=$_POST['toEdit'];

            $u = news_comments::find($_POST['toDelete']);
            $u->delete();
            \Session::flash('message_delete', 'Post Deleted Successfully!!');

            return Redirect::to("/newsForumdisplay/".$postid);


        }

    }



    public function getTopic(){



        $p=news_posts::all();
        $email = \Cartalyst\Sentinel\Laravel\Facades\Sentinel::check()->email;



       $topics=DB::table('news_topic')
           ->select(array('id as topic_id','updated_at as updated_at', 'topic as topic_name','email as email'))
        ->orderBy('updated_at','desc')->paginate(5);


        $nos=DB::table('news_posts')->select( DB::raw('topic_id, COUNT(id) as count' ) )
            ->groupBy('topic_id')->get();


        $views=DB::table('news_topic')->select('id','views')->get();

        //return $views;


        return view('newsforum/viewNewsTopics',compact('topics','nos','views','email'));

    }


    public function deleteandgettopic(Addtopic $topic){



        if (isset($_POST['delete'])) {

            $u = news_topic::find($_POST['toDelete']);
            $u->delete();

            \Session::flash('message_delete', 'Topic Deleted Successfully!!');
            return Redirect::to('/viewNewsTopics');


        }

        else {


            $unique = true;
            $topic = $topic->topic;
            $em = \Cartalyst\Sentinel\Laravel\Facades\Sentinel::check()->email;




            $query= DB::table('students')->select('grouped')->where('email','LIKE',$em)->pluck('grouped');



            news_topic::create(['topic' => $topic,'email' => $em,'group_id'=>$query]);
            \Session::flash('message_success', 'Topic Added Successfully!!');

            return Redirect::to("viewNewsTopics");




        }
    }

    public function deleteandaddpost(Addcomment $id)
    {
        if(isset($_POST['deletePost'])){

            $u=news_posts::find($_POST['toDelete']);
            $u->delete();
            \Session::flash('message_delete', 'Post Deleted Successfully!!');

            return Redirect::to("/newsForum");



        }

        elseif (isset($_POST['delete'])) {

            $u = news_posts::find($_POST['toDelete']);
            $u->delete();
            \Session::flash('message_delete', 'Comment Deleted Successfully!!');
            $url_last = (explode('/', $_SERVER['REQUEST_URI']));
            $url_lastpart = $url_last[2];
            return Redirect::to("/newsForumdisplay/$url_lastpart");


        } else {

            $unique = true;
            $topics = news_topic::find('$id');
            $posts = news_posts::all();
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


                    news_posts::create(['topic' => $topic,'message' => $msg,'email' => $email, 'datetime' => $dt,
                        'description' => $msg, 'link' => $destinationPath,'file_name'=>$name, 'topic_id' => $url_lastpart]);
                    \Session::flash('message_comment', 'Thank you for your post!!');
                    $url_last = (explode('/', $_SERVER['REQUEST_URI']));
                    $url_lastpart = $url_last[2];
                    return Redirect::back();

                }
                elseif ($ext == 'png' ||$ext == 'jpg' ||$ext == 'JPG' ) {

                    news_posts::create(['topic' => $topic,'message' => $msg,'email' => $email, 'datetime' => $dt,
                        'description' => $msg, 'file' => $destinationPath,'file_name'=>$name, 'topic_id' => $url_lastpart]);
                    \Session::flash('message_comment', 'Thank you for your post!!');
                    $url_last = (explode('/', $_SERVER['REQUEST_URI']));
                    $url_lastpart = $url_last[2];
                    return Redirect::back();
                }
            }
            else{

                news_posts::create(['topic' => $topic,'message' => $msg,'email' => $email, 'datetime' => $dt,
                    'description' => $msg,'topic_id' => $url_lastpart]);
                \Session::flash('message_comment', 'Thank you for your post!!');
                $url_last = (explode('/', $_SERVER['REQUEST_URI']));
                $url_lastpart = $url_last[2];
                return Redirect::back();

            }

        }
    }







}


