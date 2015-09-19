<?php
    $pageHeader = "Complain Box";

?>
@extends('master')

@section('links')
{!! Html::style('css/profile.css') !!}

@endsection
@section('content')

@include('_top-nav')

<div class="container-fluid">
        @include('_first_row')
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="panel panel-default">
                    <div class="panel-heading" style="color: crimson; font-weight: bold;">
                        Complain Box<span class="glyphicon glyphicon-comment"></span>
                    </div>
                    <div class="panel-body">
                        <p>Are you really annoyed of the bad management of the college or some teacher is a real fuss.
                        Well feel free to share your emotions with others as this can become exciting. This is
                        completely anonymous i.e. your name or identity will not be prompted.

                        </p>
                        <hr>
                        <div class="form-group-sm col-md-12">
                            {!! Form::open(["route"=>["storeComplain"], 'method'=>'PUT', 'class'=>'form-horizontal']) !!}
                                <div class="form-group">
                                    <label class="form-label col-md-2">You know what to do? </label>
                                    <div class="col-md-10">
                                        {!! Form::textarea("complain", null, ['class'=>'form-control',
                                         'placeholder'=>'Put your complain here..',
                                         'rows'=>'2']) !!}

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label col-md-2">College Name:</label>
                                    <div class="col-md-10">
                                        <select name="college" class="form-control">
                                            <option value="">Select...</option>
                                            @if(isset($colleges))
                                                @foreach($colleges as $c)
                                                    <option value="{{ $c->college }}">{{ $c->college }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label col-md-2"> </label>
                                    <div class="col-md-10">
                                        {!! Form::submit("Submit",['class'=>'btn btn-danger']) !!}
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>

                        <hr>



                    </div>
                </div>

        </div>
        <div class="col-md-1"></div>

    </div>

@include("_postsModal")
</div>
@endsection