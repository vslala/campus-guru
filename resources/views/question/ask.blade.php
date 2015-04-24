<?php
    $pageHeader = "Ask Question";
?>
@extends('master')

@section('links')
{!! Html::style('css/profile.css') !!}
{!! Html::script('js/scripts.js') !!}
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
                        Ask Question
                    </div>
                    <div class="panel-body">
                        <p>The question you ask here will be shared with each and every single user of the website.
                        So, please provide the correct tag for the question you ask as these will be used to search
                        for the questions that belongs to that category.

                        </p>
                        <hr>
                        <div class="page-form">
                            @include('question._questionForm')
                        </div>

                    </div>
                </div>
        </div>
        <div class="col-md-1"></div>

    </div>

@include('_postsModal')
</div>
@endsection