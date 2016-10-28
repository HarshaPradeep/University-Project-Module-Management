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
            <img style="padding-left:350px;" height="240px" src="http://wsiaxon.com/wp-content/uploads/2016/10/online_community.jpg">


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
                swal("Topic Added!", "{{ Session::get('message_success') }}", "success");
            </script>

            <div class="alert alert-success" role="alert" id="divAlert" style="font-size: 14px">
                <span class="glyphicon glyphicon-envelope"></span> {{Session::get('message_success') }}
            </div>
        @endif

        @if(Session::has('message_delete'))

            <script>
                swal("Topic Deleted!", "{{ Session::get('message_success') }}", "success");
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



    {!! Form::text('search', null,
                                          array('required',
                                               'class'=>'form-control',
                                               'placeholder'=>'Search for a topic...')) !!}<br><br>
    {!! Form::submit('Search',
                               array('class'=>'btn btn-default')) !!}
    {!! Form::close() !!}
    <br><br>

    {{--@if (count($search) === 0)--}}
    {{--echo 'No articles found';--}}
    {{--@elseif (count($search) >= 1)--}}

    {{--@foreach($search as $s)--}}
    {{--print article--}}
    {{--@endforeach--}}
    {{--@endif--}}

    @forelse($topics as $topic)

        <a href="http://localhost:8000/newsForum/{{$topic->id}}">
            <div class="container" style="border-radius:10px;background-color:#FFFFFF;width:1100px;padding-left: 10px;">
                <div class="row">
                    <div class="col-md-5">
                        <h2>{!!$topic->topic!!}</h2>
                    </div>

                    <div class="col-md-2" style="padding-top: 2px;">
                        @foreach($nos as $no)
                            @if($no->topic_id === $topic->id)
                                <h1>{{$no->count}}</h1>
                                Posts

                            @endif


                        @endforeach


                    </div>

                    <div class="col-md-2" style="padding-top: 2px;">
                        @foreach($views as $view)
                            @if($view->id === $topic->id)
                                <h1>{{$view->views}}</h1>
                                Views
                            @endif
                        @endforeach


                    </div>

                    <div class="col-md-1" style="padding-top: 12px;">
                        <img style="border-radius:50%;width:60px; padding-top:5px;display: inline;" src="http://www.findloveagain.co.za/pics/i1/19/prf/nopic2.gif">
                    </div>
                    <div class="col-md-2" style="padding-top: 12px;">
                        Posted by : {{$topic->email}}<br>
                        on :{{date('M j,Y h:ia',strtotime($topic->updated_at))}}
                    </div>


                </div>
                <form id="{{$topic->id}}" action='' method='post' >
                    @if($topic->email == $email)
                        <a href="{{ asset('editTopicViewNews/'. $topic->id) }}" class="edit_btn btn btn-primary btn-xs m-l-sm">Edit</a>

                        <input type='hidden' name='toDelete'  value="{{$topic->id}}">
                        <input  type='submit'  onclick="if (confirm('Are you sure you want to delete?')) commentDelete(1); return false" name='delete'  value='delete' class="btn btn-danger  btn-primary btn-xs m-l-sm">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    @endif
                </form>
            </div>
        </a>

        <br><br>
    @empty
        <p>No Posts Found</p>
        <br>
        <br>

    @endforelse










    <div class="text-center" >
    {!! $topics->render() !!}
    </div>




    <br><br>

    <h2>Post a topic ...</h2><br><br>

    <form id="form1" name="form1" method="post" action="" enctype="multipart/form-data" >


        <div class="col-sm-10 form-group">

            <textarea required name="topic" id="input" class="form-control"></textarea>
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

    function Deletepost(){
        var r = confirm("Are you sure you want to delete the post?");
        if (r) {
            return true;
        }
    }


    function postDelete() {

        swal({
                    title: "Are you sure?",
                    text: "Do You want to Delete Post ??",
                    type: "warning", showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, Delete it!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function (isConfirm) {
                    if (isConfirm) {
                        swal({
                            title: 'Shortlisted!',
                            text: 'Candidates are successfully shortlisted!',
                            type: 'success'
                        }, function () {
                            form.submit();
                        });

                    } else {
                        swal("Cancelled", "Your imaginary file is safe :)", "error");
                    }
                });
    }



</script>




@section('ValidationJavaScript')

