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

class CommentsController extends Controller
{


    public function deleteandadd(Addcomment $id)
    {
        if (isset($_POST['delete'])) {

            $u = comments::find($_POST['toDelete']);
            $u->delete();
            \Session::flash('message_delete', 'Comment Deleted Successfully!!');
            $url_last = (explode('/', $_SERVER['REQUEST_URI']));
            $url_lastpart = $url_last[2];
            return Redirect::to("/groupForumdisplay/$url_lastpart");


        } else {

            $unique = true;
            $posts = newsfeed::find('$id');
            $comments = comments::all();
            $msg = $id->message;
            $des = $comments->lists('description');

            $dt = Carbon\Carbon::now();
            $approved = true;
            $username = \Cartalyst\Sentinel\Laravel\Facades\Sentinel::check()->username;
            $url_last = (explode('/', $_SERVER['REQUEST_URI']));
            $url_lastpart = $url_last[2];
            if ($unique) {
                comments::create(['username' => $username, 'timedate' => $dt, 'description' => $msg, 'approved' => true, 'post_id' => $url_lastpart]);
                \Session::flash('message_comment', 'Thank you for your comment!!');
                $url_last = (explode('/', $_SERVER['REQUEST_URI']));
                $url_lastpart = $url_last[2];
                return Redirect::to("/groupForumdisplay/$url_lastpart");


            } else {

                return view('Final.groupForum')->with('message', 'Error,adding the comment !');
            }


        }
    }



        function editCommentView($id)
        {
            $c = comments::find($id);
            return view('editComment', compact('c'));
        }



        function editComment($c)
        {


                $msg = Input::get('e_detail');
                $breaks = array("<br />", "<br>", "<br/>", "<br />", "&lt;br /&gt;", "&lt;br/&gt;", "&lt;br&gt;");
                $message = str_ireplace($breaks, "\r\n", $msg);


                $c=$_POST['postid'];
                $t = comments::find($_POST['toEdit']);
                $t->description = $message;
                $t->save();
                \Session::flash('message_success', 'Comment Updated Successfully!!');
            $com=comments::where('post_id',$c)->get();
            $username = \Cartalyst\Sentinel\Laravel\Facades\Sentinel::check()->username;

            $p=newsfeed::find($c);
            return view('groupForumdisplay',compact('p'))->with('com',$com)->with('uname',$username);




        }




}