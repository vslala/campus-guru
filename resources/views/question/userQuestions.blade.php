<?php
    $pageHeader = "Ask Question";
    if(count($questions) <= 0)
    {
        $questions = null;
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
                        All the questions<span class="glyphicon glyphicon-question-sign"></span> asked by you
                    </div>
                    <div class="panel-body">
                        <p>These are the list of all the questions asked by you uptill now.

                        </p>
                        <hr>
                        <div class="question-lists">
                            <ul class="nav nav-stacked">
                            @if(isset($questions))
                                @foreach($questions as $q)
                                    <li><span class="glyphicon glyphicon-question-sign"><a href="{{ route('show', $q->id) }}" id="question_link">{{ $q->title }} ?</a> </span></li>
                                @endforeach
                            @endif
                            </ul>
                        </div>

                    </div>
                </div>
        </div>
        <div class="col-md-1"></div>

    </div>
@include("_postsModal")

</div>
@endsection