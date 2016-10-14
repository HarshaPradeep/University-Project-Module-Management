@extends('masterpages.master_student')

@section('css_links')
<!-- include libraries(jQuery, bootstrap) -->
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 

<!-- include summernote css/js-->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>

    
  <link href="{{asset('public_assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

<!--   Toastr style -->
    <link href="{{asset('public_assets/css/plugins/toastr/toastr.min.css')}}" rel="stylesheet">

<!--     Gritter -->
    <link href="{{asset('public_assets/js/plugins/gritter/jquery.gritter.css')}}" rel="stylesheet">



    <link href="{{ asset('public_assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public_assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('public_assets/css/plugins/iCheck/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('public_assets') }}" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet">
    
     <script>tinymce.init({ selector:'textarea' });</script>
     <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet"> 
     
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
<!--        <div class="col-lg-10">-->
<div><div style="font-size:15px;padding: 20px;color: #488475;background-color: #E1F1ED  ;">
        Welcome to the workZone Forum! Come in, have a look around...</div>
    <img style="padding-left:350px;" height="170px" src="http://sod208.fulton.asu.edu/forum-1/forum/image_preview">


    </div>
            <ol class="breadcrumb">

            </ol>
<!--        </div>-->
        <div class="col-lg--2">

        </div>
    </div>

@stop


{{--@section('subheader')--}}
    {{--<h5>Add New Notice</h5>--}}
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
        swal("Post Added!", "{{ Session::get('message_success') }}", "success");
    </script>
    
    <div class="alert alert-success" role="alert" id="divAlert" style="font-size: 14px">
        <span class="glyphicon glyphicon-envelope"></span> {{Session::get('message_success') }}
    </div>
    @endif

        @if(Session::has('message_delete'))

            <script>
                swal("Post Deleted!", "{{ Session::get('message_success') }}", "success");
            </script>

            <div class="alert alert-success" role="alert" id="divAlert" style="font-size: 14px">
                <span class="glyphicon glyphicon-envelope"></span> {{Session::get('message_delete') }}
            </div>
        @endif

    @if(Session::has('message_error'));
    
    <script>
        swal("Error!", "{{ Session::get('message_error') }}", "error");
    </script>

    
    @endif
    
</div>
    



      
<!--        @if(count($posts))-->
            @forelse($posts as $post)


               
            <div style="border-radius:10px;background-color:white;width:1000px;padding-left: 10px;">

                <img style="border-radius:50%;width:60px; padding-top:5px;display: inline;" src="http://tedxfukuoka.com/wp/wp-content/uploads/rika_shiiki_-562x562.jpg">
                <h2><b><a href="http://localhost:8000/groupForumdisplay/{{$post->id}}">{{$post->topic}}</a></b></h2>
                        Posted by : {{$post->username}}<br>
                        on :{{$post->datetime}}
                        <br><br><br>
                        <div style="color:#333439;"><h4>{{nl2br($post->message)}}</h4></div>
                        <br>
                        
                        <hr>


                            <form id="{{$post->id}}" action='' method='post' >
                                <i class="fa fa-comment" aria-hidden="true"></i>&nbsp;<a href="http://localhost:8000/groupForumdisplay/{{$post->id}}">Reply</a>
                                @if($post->username == $uname)
                                <a href="{{ asset('editPost/'. $post->id) }}" class="edit_btn btn btn-primary btn-xs m-l-sm">Edit</a>

                                <input type='hidden' name='toDelete'  value="{{$post->id}}">
                                <input  type='submit'  onclick="postDelete()" name='delete'  value='delete' class="btn btn-danger  btn-primary btn-xs m-l-sm">
                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                    @endif
                            </form>


                        <br><br>
                        
           
            </div>
            <br><br>
            @empty
                        <p>No Posts Found</p>
                        <br>
                        <br>
                        
            @endforelse
            @endif
           

    
    
<br><br>

    <form id="form1" name="form1" method="post" action="" >


        <div class="col-sm-10 form-group">
            <label>Topic</label>
            <input required name="topic" type="text" id="topics" class="form-control"/>
        </div>
        
        
         <div class="col-sm-10 form-group">
            <label>Message</label>
            <textarea name="message" required style="white-space: pre-line;" id="summernote" rows="7" columns="5" class="form-control"></textarea>
        </div>
        
        
  
        <div class="form-group">
            <div class="col-md-4">
                <button type="submit"  value="Submit" class="btn btn-w-m btn-primary">Post</button>
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <input type="reset" name="Submit2" value="Reset" class="btn btn-w-m btn-primary">
            </div>
        </div>


    </form>


@endsection

<script>

    function postDelete() {

        swal({   title: "Are you sure?",
            text: "Do You want to Delete Post ??",
            type: "warning",   showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, Delete it!",
            closeOnConfirm: true }

        ).fail( function() {
            alert( 'something wrong' );
        });

    }

</script>


<!-- <script>
    jQuery(document).ready(function() {
        jQuery('#message').summernote({
            height: 250,
            callbacks: {
                onImageUpload: function(files, editor, $editable) {
                    alert('evoked');
                    sendFile(files[0],editor,$editable);
                }
            }
        });
        function sendFile(file,editor,welEditable) {
            data = new FormData();
            data.append("file", file);
            jQuery.ajax({
                url: "{{ URL::to('upload/image') }}",
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                type: 'POST',
                success: function(s){
                    jQuery('#message').summernote("insertImage", s);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus+" "+errorThrown);
                }
            });<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">

        }
    });
</script>

 @section('ValidationJavaScript')
  <script src="//cdn.ckeditor.com/4.5.4/standard/ckeditor.js"></script>
    <script>
        $(document).ready(function(){
            $('.summernote').ckeditor();
        }); 
    </script>
    -->
