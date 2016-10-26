@extends('masterpages.master_rpc')
@section('css_links')

    <link href="{{asset('public_assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <!-- Toastr style -->
    <link href="{{asset('public_assets/css/plugins/toastr/toastr.min.css')}}" rel="stylesheet">

    <!-- Gritter -->
    <link href="{{asset('public_assets/js/plugins/gritter/jquery.gritter.css')}}" rel="stylesheet">


    <title>Add Module</title>
    <link href="{{ asset('public_assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public_assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('public_assets/css/plugins/iCheck/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('public_assets/css/plugins/steps/jquery.steps.css') }}" rel="stylesheet">
    <link href="{{ asset('public_assets') }}" rel="stylesheet">
    <link href="{{ asset('public_assets/css/style.css') }}" rel="stylesheet">

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
        <div class="col-lg-10">
            <h2>Add Module</h2>
            <ol class="breadcrumb">

            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
@endsection

{{--@section('subheader')--}}
    {{--<h5>Add Module</h5>--}}
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
        swal("Module Added!", "{{ Session::get('message_success') }}", "success");
    </script>
    
    <div class="alert alert-success" role="alert" id="divAlert" style="font-size: 14px">
        <span class="glyphicon glyphicon-envelope"></span> {{Session::get('message_success') }}
    </div>
    @endif
    
    
    @if(Session::has('message_error'));
    
    <script>
        swal("Error!", "{{ Session::get('message_error') }}", "error");
    </script>

    
    @endif
    
    


  {!! Form::open(array('route'=>'AddMod','class'=>'form', 'files'=>true ))!!}
  
  
      
        {!!Form::label('Module ID')!!}<br />
<!--        {!!Form::text('index',null,array('required','class'=>'form-control','value'=>'$mid','placeholder'=>'Module Index'))!!}-->
        {!!Form::text('index',$mid,array('readonly','class'=>'form-control','placeholder'=>'Module Index'))!!}

      <br>

<!--    <div class="form-group" id="teliv">

       <label class="col-sm-2 control-label">Module Name</label>

          <input id="phone" name="phone" onkeypress='validate(event)' placeholder="Enter module name" type="text" class="form-control required"/>

    </div>-->

    <div class="form-group">
        {!!Form::label('Module Name')!!}<br />
        {!!Form::text('name',null,array('required','class'=>'form-control','placeholder'=>'Enter module name '))!!}
        

    </div><br>

    <div class="form-group">
        {!!Form::label('Module Index')!!}<br />
        {!!Form::text('code',null,array('required','class'=>'form-control','placeholder'=>'Enter module ID '))!!}
        

    </div><br>
    
    <div class="form-group">
        {!!Form::label('Enrollment Key')!!}<br />
        {!!Form::text('ek',null,array('required','class'=>'form-control','placeholder'=>'Enter enrollment key '))!!}
        

    </div><br>

    <div class="form-group">
        {!!Form::label('Year')!!}<br />
        
    
        {!!Form::select('year', array(''=>'Select year','3rd Year' => '3rd Year', '4th Year' => '4th Year'))!!};        

    </div><br>
    

    <div class="form-group">
        {!!Form::label('Lecturer in charge')!!}<br />
        {!!Form::select('lecturers', array(''=>'Select the lecturer in charge','John Doe' => 'John Doe', 'Martin Walker' => 'Martin Walker','Jane Doe'=>'Jane Doe',
        'Alan During'=>'Alan During','Vasanthi Kariyavasam'=>'Vasanthi Kariyavasam','Russel Arnold'=>'Russel Arnold'))!!};        

    </div><br>

    <div class="form-group">
        {!!Form::label('Module Description')!!}<br />
        {!!Form::textarea('description',null,array('required','class'=>'form-control','placeholder'=>'Enter description'))!!}

    </div><br>
    



    <div class=form-group">
        {!!Form::submit('Add Module', array('class'=>'btn btn-primary'))!!}
    </div>

    {!!Form::close()!!}

@endsection


@section('ValidationJavaScript')
<!--    <script>
        function validate(evt) {

            var theEvent = evt || window.event;
            var key = theEvent.keyCode || theEvent.which;
            key = String.fromCharCode( key );
            var regex = /[0-9]|\./;
            if( !regex.test(key) ) {
                theEvent.returnValue = false;

                if(theEvent.preventDefault) {
                    $('#teliv').addClass('has-error');
                    theEvent.preventDefault();
                }
            }else{
                $('#teliv').removeClass().addClass('form-group has-success');
            }

            $("#phone").attr('maxlength','10');

        }
    </script>-->
    @endsection



