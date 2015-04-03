<?php
    $pageHeader = $question->title;
    if(count($question) <= 0)
    {
        $question = null;
    }
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
                        {{ $question->title or 'title not present' }}<span class="glyphicon glyphicon-question-sign"></span>
                    </div>
                    <div class="panel-body">
                        <p>
                            {{ $question->description or 'description does not exists!' }}
                        </p>
                        <hr>
                        <div class="question-lists">

                        </div>

                    </div>
                </div>
        </div>
        <div class="col-md-1"></div>

    </div>

</div>
@endsection