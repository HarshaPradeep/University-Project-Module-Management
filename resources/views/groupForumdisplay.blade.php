@extends('masterpages.master_student')

@section('css_links')

  <link href="{{asset('public_assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

<!--     Toastr style -->
    <link href="{{asset('public_assets/css/plugins/toastr/toastr.min.css')}}" rel="stylesheet">

<!--     Gritter -->
    <link href="{{asset('public_assets/js/plugins/gritter/jquery.gritter.css')}}" rel="stylesheet">



    <link href="{{ asset('public_assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public_assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('public_assets/css/plugins/iCheck/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('public_assets/css/plugins/steps/jquery.steps.css') }}" rel="stylesheet">
    <link href="{{ asset('public_assets') }}" rel="stylesheet">
    <link href="{{ asset('public_assets/css/style.css') }}" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/summernote/0.7.0/summernote.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet">
    
     <script>tinymce.init({ selector:'textarea' });</script>
    <script src="{{asset('public_assets/dist/summernote.min.css')}}"></script>
    <script src="{{asset('public_assets/dist/summernote.min.js')}}"></script>
    <style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0); background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style>
    <style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0); background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style>
    <style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0); background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style>
    <style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0); background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style>
    <style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0); background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style>
    <style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0); background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style>
    <style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0); background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style>
    <style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0); background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style>
    <style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0); background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style>
    <style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0); background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style>
    <style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0); background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style>

@stop




@section('title')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10" style="padding-top: 20px;">
            <button type="button" class="btn btn-w-m btn-primary" onclick="window.location='http://localhost:8000/groupForum'">View Posts</button>

            <ol class="breadcrumb">

            </ol>
        </div>
        <div class="col-lg--2">

        </div>
    </div>

@stop


{{--@section('subheader')--}}
    {{--<h5>Comment your idea here..</h5>--}}
{{--@endsection--}}




@section('content')

<div class="row">

    @if (count($errors) > 0)

        <div class=" alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
     @if(Session::has('message_success'))

    <script>
        swal("Record Altered!", "{{ Session::get('message_success') }}", "success");
    </script>
    
    <div class="alert alert-success" role="alert" id="divAlert" style="font-size: 14px">
        <span class="glyphicon glyphicon-envelope"></span> {{Session::get('message_success') }}
    </div>
    @endif


        @if(Session::has('message_delete'))

            <script>
                swal("Comment deleted!", "{{ Session::get('message_success') }}", "success");
            </script>

            <div class="alert alert-success" role="alert" id="divAlert" style="font-size: 14px">
                <span class="glyphicon glyphicon-envelope"></span> {{Session::get('message_delete') }}
            </div>
        @endif

        @if(Session::has('message_comment'))

            <script>
                swal("Comment Added!", "{{ Session::get('message_success') }}", "success");
            </script>

            <div class="alert alert-success" role="alert" id="divAlert" style="font-size: 14px">
                <span class="glyphicon glyphicon-envelope"></span> {{Session::get('message_comment') }}
            </div>
        @endif
    
    
    @if(Session::has('message_error'));
    
    <script>
        swal("Error!", "{{ Session::get('message_error') }}", "error");
    </script>

    
    @endif
    
</div>
    
    <div class="container">
        {{--@can('editPost',$val)
            <a href="{{action('ForumController@editPost', $val}}">Edit post</a>
        @endcan--}}
      

           
            <div class="row">  
               
            <div  class="jumbotran" style="border-color:#6C6D71;border-radius:10px;padding:20px;width:1000px;background-color:white;padding-right: 10px;padding-left: 10px;">
                        
                        
                <div style="color:#121A5B;" ><h2><b>{{$p->topic}}</b></h2></div>
                        Posted by : {{$p->username}}<br>
                        on :<b>{{date('M j,Y h:ia',strtotime($p->datetime))}}</b>
                        <br><br><br>

                @if($p->file != null)

                    <img src="{{$p->file}}" alt="" width="350" height="260">
                    <br> <br>
                @elseif($p->link != null)

                    <a href="{{$p->link}}" download="{{$p->link}}">{{$p->file_name}}</a>

                @endif
                <div style="color:#333439;"><h4>{!!($p->message)!!}</h4></div>
                <br>

                        <br>
                <form id="{{$p->id}}" action='' method='post' >
                    @if($p->username == $uname)
                        <a href="{{ asset('editPost/'. $p->id) }}" class="edit_btn btn btn-primary btn-xs m-l-sm">Edit</a>

                        <input type='hidden' name='toDelete'  value="{{$p->id}}">
                        <input  type='submit'  onclick="postDelete()" name='deletePost'  value='Delete' class="btn btn-danger  btn-primary btn-xs m-l-sm">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    @endif

                </form>
                <hr>
                   <div class="container" style="padding-left: 85px;color:black;"><h2><b>Comments</b></h2></div><br>




                @foreach($com as $comment)
                    {{--<div class="row">--}}

                        <div  class="jumbotran" style="border-radius:10px;background-color:white;width:1000px;padding-left: 100px;">


                           <div style="color:#121A5B;" > Posted by :<b>{{$comment->username}}</b><br>
                           on :on :<b>{{date('M j,Y h:ia',strtotime($comment->timedate))}}</b>
                            <br><br>

                               @if($comment->file != null)

                                   <img src="{{$comment->file}}" alt="" width="250" height="160">
                                   <br> <br>
                               @elseif($comment->link != null)

                                   <a href="{{$comment->link}}" download="{{$comment->link}}">{{$comment->file_name}}</a>

                               @endif

                               <div style="color:#333439;"><h4>{{$comment->description}}</h4></div>
                               <br>



                            &emsp;</div>
                            <br>
                            @if($comment->username == $uname)
                            <form id="{{$comment->id}}" action='' method='post' >
                                <a href="{{ asset('editComment/'. $comment->id) }}" class="edit_btn btn btn-primary btn-xs m-l-sm">Edit</a>
                                <input type='hidden' name='toDelete'  value="{{$comment->id}}">
                                <input  type='submit'  onclick="deleteComment()" name='delete'  value='Delete' class="btn btn-danger  btn-primary btn-xs m-l-sm">
                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            </form>
                            @endif

                            <hr>
                            <br><br>



                        </div>
                    {{--</div>--}}


                @endforeach
           
            </div>
            </div>
           

           
    </div>

    <hr>









    <form id="form1" name="form1" method="post" action=""  enctype="multipart/form-data">


        <div class="col-sm-10 form-group" style="padding-top:70px;">
            <label><h2>Type your idea ...</h2></label>
            <textarea required rows='6' columns='7' id='msg' name="message" class="form-control"></textarea>
        </div>

        <div class="col-sm-10 form-group">
            <label>Choose File</label>
            <input type="file" name="file" id="file" class="form-control"/>
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

        </div>



        <div class="form-group">
            <div class="col-md-4">
                <button type="submit" name="addNotice" value="Submit" class="btn btn-w-m btn-primary">Submit</button>
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <input type="reset" name="Submit2" value="Reset" class="btn btn-w-m btn-primary">
            </div>
        </div>


    </form>


@endsection
{{--

<script src="{{URL::to('public_assets/tinymce/js/tinymce/tinymce.min.js')}}"></script>

<script>
    var editor_config={
        path_absolute:"{{URL::to('/')}}/",
        selector:"textarea",
        plugins:[
            "advlist autolink link image lists charmap print preview hr anchor pagebreak",
            "spellchecker searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar:"insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",
        relative_urls:false,
        file_browser_callback: function(field_name, url, type, win){
            var x=window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y=window.innerHeight ||document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

            var cmsURL =editor_config.path_absolute + 'laravel-filemanager?field_name' + field_name;
            if(type=='image'){
                cmsURL=cmsURL + "&type=Images";
            }else{
                cmsURL=cmsURL + "&type=Files";
            }
            tinyMCE.activeEditor.windowManager.open({
                file:cmsURL,
                title:'Filemanager',
                width:x * 0.8,
                height:y * 0.8,
                resizable:"yes",
                close_previous:"no"
            });
        }
    };
    tinymce.init(editor_config);

</script>
--}}

<script>
    function deleteComment() {

        swal({   title: "Are you sure?",
            text: "Do You want to Delete Comment ??",
            type: "warning",   showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, Delete it!",
            closeOnConfirm: true }

        ).fail( function() {
            alert( 'something wrong' );
        });

    }
</script>

<script>


    //delete task and remove it from list
    $.ajax({
        url: '/groupForumdisplay/' + id,
        data: { "_token": "{{ csrf_token() }}" },
        type: 'DELETE',
        success: function(result) {
            console.log(result);
        }
    });

</script>


