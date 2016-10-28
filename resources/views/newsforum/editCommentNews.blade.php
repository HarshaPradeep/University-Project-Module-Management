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


    <title></title>



    <link href="{{ asset('public_assets/css/animate.css')}}" rel="stylesheet">
    <link href="{{ asset('public_assets/css/plugins/summernote/summernote.css')}}" rel="stylesheet">
    <link href="{{ asset('public_assets/css/plugins/summernote/summernote-bs3.css')}}" rel="stylesheet">

@endsection


@section('title')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Edit Comment</h2>
            <ol class="breadcrumb">

            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>

@endsection

{{--@section('subheader')--}}

{{--<h5>Edit Notice</h5>--}}
{{--@endsection--}}



@section('content')


    @if (count($errors) > 0)
        <div class="alert alert-danger" role="alert" id="divAlert" style="font-size: 14px">
            @foreach ($errors->all() as $msg)
                <li> {{ $msg }} </li>
            @endforeach
        </div>
    @endif

    @if(Session::has('message_success'))

        <script>
            swal("Comment Added!", "{{ Session::get('message_success') }}", "success");
        </script>

        <div class="alert alert-success" role="alert" id="divAlert" style="font-size: 14px">
            <span class="glyphicon glyphicon-envelope"></span> {{Session::get('message_success') }}
        </div>
    @endif



    <div class="row">

        <form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">




            <div class="col-sm-10 form-group">
                <label>Message</label>
                <textarea required name="e_detail" rows="7" columns="5" class="form-control" name="detail" >{{$c->description}}</textarea>
            </div>


            <div class="form-group">
                <div class="col-md-4">
                    <div><input type='hidden' name='toEdit'  value="{{$c->id}}">
                        <input type='submit'  class="save_btn btn btn-primary" name='edit' value='Save'>
                        <input type="hidden" name="postid" value="{{$c->post_id}}">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    </div>
                </div>
            </div>

        </form>
    </div>
    </div>

@endsection