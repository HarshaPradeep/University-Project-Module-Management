@extends('masterpages.master_rpc')

@section('css_links')


    <link href="{{asset('public_assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <!-- Toastr style -->
    <link href="{{asset('public_assets/css/plugins/toastr/toastr.min.css')}}" rel="stylesheet">

    <!-- Gritter -->
    <link href="{{asset('public_assets/js/plugins/gritter/jquery.gritter.css')}}" rel="stylesheet">


    <link href="{{ asset('public_assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public_assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('public_assets/css/plugins/iCheck/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('public_assets/css/plugins/steps/jquery.steps.css') }}" rel="stylesheet">
    <link href="{{ asset('public_assets/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('public_assets/css/style.css') }}" rel="stylesheet">


        <title>Inbox</title>



        <link href="{{ asset('public_assets/css/animate.css')}}" rel="stylesheet">
        <link href="{{ asset('public_assets/css/plugins/summernote/summernote.css')}}" rel="stylesheet">
        <link href="{{ asset('public_assets/css/plugins/summernote/summernote-bs3.css')}}" rel="stylesheet">

@section('title')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Your messages inbox</h2>
            <!-- Trigger the modal with a button -->

            <ol class="breadcrumb">

            </ol>
        </div>
        <div class="col-lg-2" style="margin-top: 15px;">
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Create Message</button>
        </div>
               <div class="col-lg-1">
        </div>
    </div>
@endsection

{{--@section('subheader')--}}


{{--@endsection--}}


@section('content')

       


<div class="col-md-12">
 <div class="ibox-content">

   <table class="table ">
    @foreach($messagePool as $value)
     <tr >
         <td><img src="http://easybike.tk/img/user.png" width="50" height="50"></td>
         <td style="width: 80%;padding-top: 20px;"><a href="{{ url('viewMessage/'.$value->sender_id.'/'.$value->receiver_id) }}">{{$value->email }}</a></td>
         @if( $value->notification !=  null )
             <td><i class="glyphicon glyphicon-envelope" style="padding-top: 20px;color:palevioletred  ;font-size:20px;padding-right: 60px;" >  </i> </td>
         @else
             <td><i class="fa fa-envelope-o" style="padding-top: 20px;font-size:20px;padding-right: 60px;" > </i> </td>
         @endif
         <td><a href="{{ url('deleteMessage/'.$value->sender_id.'/'.$value->receiver_id) }}" onclick="if (confirm('Are you sure you want to delete the message?')) commentDelete(1); return false"" ><i class="glyphicon glyphicon-trash" style="padding-top: 20px;padding-right: 30px;" > </i></a> </td>
      </tr>
         @endforeach

   </table>  
</div>
</div>


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Create Message</h4>
      </div>
      <div class="modal-body">
          <div class="msg" style="padding-left: 220px;">
              <img src="http://bizlist.efy.com.my/assets/img/send.png" width="80" height="80">
          </div>
       <form class="m-t" role="form" method="POST" action="{{ url('/sendMessage') }}">
       <input type="hidden" name="sender" value="{{$userId}}">
       <div class="form-group">
        <label for="sel1">Select User:</label>
        <select class="form-control" name="receiver">
          @foreach($allUsers as $value)
            <option value="{{$value->id}}">{{$value->username}}</option>
          @endforeach

        </select>
      </div>
      <div class="form-group">
         <label for="comment">Message:</label>
        <textarea class="form-control" rows="5" name="message"></textarea>
      </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-default" >Send</button>
      </div>
      </form>
    </div>

  </div>
</div>
@endsection