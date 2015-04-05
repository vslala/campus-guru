@extends('master')

@section('links')
{!! Html::style('css/profile.css') !!}
@endsection

@section('content')

@include('_top-nav')

<div class="container-fluid">
    <div class="row first-row">
        <div class="page-header">
            <div class="h2 page-header-text" style="margin-left: 2em;">Star a Discussion</div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="panel panel-default">
                    <div class="panel-heading" style="color: crimson; font-weight: bold;">
                        Start Discussion
                    </div>
                    <div class="panel-body">
                        <p>You have your views in mind and want to discuss it with the people with same views.
                        Start a discussion here and let the ideas flow. But before starting a discussion make
                        sure to search for it as someone might have already started it. Enjoy :)

                        </p>
                        <hr>
                        <div class="start-discussion">
                            @include('discussion._discussionForm')
                        </div>

                    </div>
                </div>
        </div>
        <div class="col-md-1"></div>

    </div>

@include('_postsModal')
</div>
@endsection