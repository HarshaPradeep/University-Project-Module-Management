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
    <link href="{{ asset('public_assets/css/chat.css') }}" rel="stylesheet">


        <title>View Message</title>



        <link href="{{ asset('public_assets/css/animate.css')}}" rel="stylesheet">
        <link href="{{ asset('public_assets/css/plugins/summernote/summernote.css')}}" rel="stylesheet">
        <link href="{{ asset('public_assets/css/plugins/summernote/summernote-bs3.css')}}" rel="stylesheet">

@section('title')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>View Message</h2>
            <!-- Trigger the modal with a button -->

            <ol class="breadcrumb">

            </ol>
        </div>
        <div class="col-lg-2" style="margin-top: 15px;">
        </div>
               <div class="col-lg-1">
        </div>
    </div>
    <br><br>
    <form action="http://localhost:8000/message">
        <input type="submit"  class="btn btn-w-m btn-primary" value="View Messages" />
    </form>
@endsection

{{--@section('subheader')--}}


{{--@endsection--}}


@section('content')

       


<div class="col-md-12">
 <div class="ibox-content">
<div class="container">
    <div class="row chat-window col-xs-10 col-md-10" id="chat_window_1>
        <div class="col-xs-12 col-md-12">
          <div class="panel panel-default">
                
                <div class="panel-body msg_container_base">
                    @foreach($messagePool as $value)
                    @if(  (Request::segment(2) == $value->sender_id) && (Request::segment(3) == $value->receiver_id)  ) 
                    <div class="row msg_container base_sent">
                        <div class="col-md-10 col-xs-10">
                            <div class="messages msg_sent">
                                <p>{{$value->message }}</p>
                                <time datetime="2009-11-13T20:00">You {{$value->date }}   </time>
                            </div>
                        </div>
                        <div class="col-md-2 col-xs-2 avatar">
                            <img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive ">
                        </div>
                    </div>
                    @else
                    <div class="row msg_container base_receive">
                        <div class="col-md-2 col-xs-2 avatar">
                            <img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive ">
                        </div>
                        <div class="col-md-10 col-xs-10">
                            <div class="messages msg_receive">
                                <p>{{$value->message }}</p>
                                <time datetime="2009-11-13T20:00">{{$value->receiver }} {{$value->date }} </time>
                            </div>
                        </div>
                    </div>
                     @endif
                     @endforeach
                  
                </div>
 
        </div>
        </div>
    </div>


          <div class="modal-body">
       <form class="m-t" role="form" method="POST" action="{{ url('/sendMessage') }}">
       <input type="hidden" name="sender" value="{{$sender }}">
       <input type="hidden" name="receiver" value="{{$receiver }}">

      <div class="form-group">
            <div class="col-sm-1"> <label for="comment">Message:</label> </div>
         <div class="col-sm-8">
           <input type="text" name="message" class="form-control">
         </div>
        
              <button type="submit" class="btn btn-default col-sm-2" >Send</button>

      </div>
      </form>
      </div>

    
    
</div>
 
</div>
</div>



@endsection
