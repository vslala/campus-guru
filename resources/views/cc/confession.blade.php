<?php
    $pageHeader = "Confession Box";

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
                        Confession Box<span class="glyphicon glyphicon-comment"></span>
                    </div>
                    <div class="panel-body">
                        <p>If you are feeling guilty about something but doesn't find a way to convey it,
                        you have come to the right place my friend. Confess anonymously and let the world
                         know about your deeds. It feels good believe me ;)
                        </p>
                        <hr>
                        <div class="form-group-sm col-md-12">
                            {!! Form::open(["route"=>["storeConfession"], 'method'=>'PUT', 'class'=>'form-horizontal']) !!}
                                <div class="form-group">
                                    <label class="form-label col-md-2">Confess here (aaram se): </label>
                                    <div class="col-md-10">
                                        {!! Form::textarea("confession", null, ['class'=>'form-control',
                                         'placeholder'=>'Put your confession here..',
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