<?php
$setInboxActive="active";
$title="inbox";
?>
@extends('master')

@section('links')
    {!! Html::script("js/profile.js") !!}
    {!! Html::style("css/profile.css") !!}
@endsection

@section('content')

<style>
.first-row{
margin-top: 20%;
padding-top: 7%;
}
</style>

@include('_top-nav')

<div class="container">
    <div class="row first-row">

    @include('message._left_nav')
        <div class="col-sm-9 col-md-10">
            @if(Session::get("flash_message")):
                <span class="message alert-success" id="message">{{ Session::get("flash_message") }}</span>
            @endif

            <div class="tab-content wrap" >
                 {!! Form::open(["route"=>["sendMessage"], 'files'=>true, 'method'=>'POST', 'id'=>'message_form', 'class'=>'form-horizontal']) !!}

                    <div class="form-group">
                        <label class="form-label col-md-4">To (Username) :</label>
                        <div class="col-md-8">
                            {!! Form::text('sentTo',null, ['class'=>'form-control', 'id'=>'search_username', 'placeholder'=>'Enter the username of the person']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label col-md-4">Subject :</label>
                         <div class="col-md-8">
                             {!! Form::text('subject',null, ['class'=>'form-control']) !!}
                         </div>
                    </div>

                <div class="form-group">
                    <label class="form-label col-md-4">
                        Message
                    </label>
                    <div class="col-md-8">
                        {!! Form::textarea('message', null, ['class'=>'form-control', 'rows'=>'4']) !!}
                    </div>
                </div>
                <div class="form-group">
                                    <label class="form-label col-md-4">
                                        File (optional)
                                    </label>
                                    <div class="col-md-8">
                                        {!! Form::file('file', ['class'=>'form-control']) !!}
                                    </div>
                                </div>
                <div class="form-group">
                      <label class="form-label col-md-4"></label>
                      <div class="col-md-8">
                          {!! Form::submit('Send', ['class'=>'btn btn-primary btn-lg']) !!}
                      </div>
                 {!! Form::close() !!}
            </div>

           </div>
       </div>
   </div>