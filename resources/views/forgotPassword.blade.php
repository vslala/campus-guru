@extends('master')
@section('links')
{!! Html::style('css/welcome.css') !!}
<script>
{{--$(document).ready(function(){--}}
 {{--load_img = '<img src="http://www.ajaxload.info/images/exemples/25.gif" >';--}}
    {{--$('#askEmailForm').submit(function(event){--}}
        {{--event.preventDefault();--}}
        {{--var url = $(this).attr('action');--}}
        {{--var data = $(this).serialize();--}}
        {{--var panel = $(this).parent().parent();--}}
        {{--var panelHead = $(this).parent().parent().find('.panel-heading');--}}
        {{--var panelBody = $(this).parent().parent().find('.panel-body');--}}
        {{--panelBody.html(load_img);--}}

        {{--$.ajax({--}}
            {{--type: "PUT",--}}
            {{--data: data,--}}
            {{--url: url,--}}
            {{--success: function(data){--}}
                {{--panel.addClass('panel panel-success').removeClass('panel-default');--}}
                {{--panelHead.html('<div class="h3"><b>Password Recovery Panel</b></div> ');--}}
                {{--panelBody.html('<span class="alert-success"><b> An email will be sent to <u style="color: blue;">'+ data +'</u> address shortly</b></span>');--}}
            {{--},--}}
            {{--error: function(xhr,status,msg){--}}
                {{--panelBody.html('<span class="alert-danger">There was some error! Please try again later or contact varunshrivastava007@gmail.com for password recovery.<br>Sorry for your inconvenience.</span>')--}}
                {{--console.log(xhr.responseText);--}}
            {{--}--}}
        {{--});--}}
    {{--})--}}
{{--});--}}
</script>
@endsection
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Password Recovery Panel
                    </div>
                    <div class="panel-body">
                    {!! Form::open(['route'=>'forgotPassword', 'method'=>'PUT', 'id'=>'askEmailForm']) !!}
                        <label for="email" class="pull-left">Please enter your email address</label>
                        <input type="email" required="true" name="email" id="email" class="form-control pull-left">
                        <button type="submit" class="btn btn-primary pull-left" id="emailSubmitBtn">Submit</button>
                    {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>

@endsection