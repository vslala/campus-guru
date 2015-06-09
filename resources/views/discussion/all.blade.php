<?php
    $title = "CampusGuru Discussions";
    $pageHeader = "All Discussions";
    if(count($discussions) <= 0)
    {
        $discussions = null;
    }
    $table = "discussions";
    $showURL = "user/view/single/discussions";
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
                        @include('_search_q_n_d')
                        All Discussions<span class="glyphicon glyphicon-question-sign"></span>
                    </div>
                    <div class="panel-body">
                        <p>These are the list of all the discussions started by people around the globe.

                        </p>
                        <hr>
                        <div class="question-lists">
                            <ul class="nav nav-stacked" id="content_list">
                            @if(isset($discussions))
                                @foreach($discussions as $d)
                                    <li>

                                        <a href="{{ route('singleDiscussion', ["id"=>$d->id, "title"=>$d->title]) }}" id="question_link">
                                        {!! Html::image($d->image_url, $d->image_name, ['class'=>'img img-responsive img-thumbnail profile_pic']) !!}
                                        {{ $d->title }} ?</a>
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