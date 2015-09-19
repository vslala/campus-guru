<?php
    $pageHeader = "All Questions";
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
                        All questions<span class="glyphicon glyphicon-question-sign"></span>
                    </div>
                    <div class="panel-body">
                        <p>These are the list of all the questions being asked by people around the globe.

                        </p>
                        <hr>
                        <div class="question-lists">
                            <ul class="nav nav-stacked">
                            @if(isset($questions))
                                @foreach($questions as $q)
                                    <li>

                                        <a href="{{ route('show', $q->id) }}" id="question_link">
                                        {!! Html::image($q->image_url, $q->image_name, ['class'=>'img img-responsive img-thumbnail profile_pic']) !!}
                                        {{ $q->title }} ?</a>
                                    </li>
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