@extends('masterpages.master_student')

@section('css_links')


    <link href="{{asset('public_assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <!-- Toastr style -->
    <!--link href="{{asset('public_assets/css/plugins/toastr/toastr.min.css')}}" rel="stylesheet"-->

    <!-- Gritter -->
    <link href="{{asset('public_assets/js/plugins/gritter/jquery.gritter.css')}}" rel="stylesheet">


    <link href="{{ asset('public_assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public_assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('public_assets/css/plugins/iCheck/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('public_assets/css/plugins/steps/jquery.steps.css') }}" rel="stylesheet">
    <link href="{{ asset('public_assets/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('public_assets/css/style.css') }}" rel="stylesheet">


    <link href="{{ asset('public_assets/css/animate.css')}}" rel="stylesheet">
    <link href="{{ asset('public_assets/css/plugins/summernote/summernote.css')}}" rel="stylesheet">
    <link href="{{ asset('public_assets/css/plugins/summernote/summernote-bs3.css')}}" rel="stylesheet">

@endsection


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
                swal("Post Added!", "{{ Session::get('message_success') }}", "success");
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

    <form action="http://localhost:8000/viewTopics">
        <input type="submit"  class="btn btn-w-m btn-primary" value="View Topics" />
    </form>

@foreach($pos as $post)



            <div  class="container" style="border-color:#6C6D71;border-radius:10px;padding:20px;width:1000px;background-color:white;padding-right: 10px;padding-left: 10px;">

                <div style="color:#121A5B; display: inline;"><img style="border-radius:50%;width:60px; padding-top:5px;" src="http://tedxfukuoka.com/wp/wp-content/uploads/rika_shiiki_-562x562.jpg">
                <h2><a href="http://localhost:8000/groupForumdisplay/{{$post->id}}">{{$post->topic}}</a></h2></div>
                Posted by : {{$post->email}}<br>
                on :<b>{{date('M j,Y h:ia',strtotime($post->datetime))}}</b>
                <br><br><br>

                @if($post->file != null)

                    <img src="{{$post->file}}" alt="" width="350" height="260">
                    <br> <br>
                @elseif($post->link != null)

                    <a href="{{$post->link}}" download="{{$post->link}}">{{$post->file_name}}</a>

                @endif
                <div style="color:#333439;"><h4>{!!str_limit($post->message,$limit=300,$end='.....')!!}</h4></div>
                <br>  <br>

                <form action="http://localhost:8000/groupForumdisplay/{{$post->id}}">
                    <input type="submit" class="btn  btn-m" value="Read more" />
                </form>
                <hr>
                <form id="{{$post->id}}" action='' method='post' >
                    <i class="fa fa-comment" aria-hidden="true"></i>&nbsp;<a href="http://localhost:8000/groupForumdisplay/{{$post->id}}">Reply</a>
                    @if($post->email == $email)
                        <a href="{{ asset('editPost/'. $post->id) }}" class="edit_btn btn btn-primary btn-xs m-l-sm">Edit</a>

                        <input type='hidden' name='toDelete'  value="{{$post->id}}">
                        <input  type='submit'  onclick="postDelete()" name='deletePost'  value='Delete' class="btn btn-danger  btn-primary btn-xs m-l-sm">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    @endif

                </form>






            </div>
            <br><br>

        @endforeach





    <h2>Type your post ...</h2><br><br>

    <form id="form1" name="form1" method="post" action="" enctype="multipart/form-data"  >


        <div class="col-sm-10 form-group">
            <label>Topic</label>
            <input required name="topic" type="text" id="topics" class="form-control"/>
        </div>


        <div class="col-sm-10 form-group">
            <label>Message</label>
            <textarea  name="message" id="input" class="form-control"></textarea>
        </div>

        <div class="col-sm-10 form-group">
            <label>Choose File</label>
            <input type="file" name="file" id="file" class="form-control"/>
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

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