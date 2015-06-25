<?php
    $pageHeader = $discussion->title;
    if(count($discussion) <= 0)
    {
        $discussion = null;
    }
    $i = 0;
    $j = 0;
    function likeCount($ans_id)
    {
        $l = new \App\Http\Controllers\LikeController();
        $l = $l->get();
        dd($l);
    }
?>
@extends('master')

@section('links')
{!! Html::style('css/profile.css') !!}
{!! Html::script('js/myjs.js')!!}
{!! Html::script('js/wysiwyg.js') !!}
@endsection
@section('content')

<span id="userImage"></span>

@include('_top-nav')

<div class="container-fluid">
        @include('_first_row')
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="panel panel-default" id="answer_panel">
                    <div class="panel-heading" style="color: crimson; font-weight: bold;">
                    <div class="pull-right"><div class="help-block">{{ $discussion->created_at or '' }}</div> </div>
                    <label class="label label-primary"><a href="{{ route("profileVisit", $discussion->username) }}" style="color: white;">{{ $discussion->username or '' }} says</a></label>{{ $discussion->title or 'title not present' }}<span class="glyphicon glyphicon-question-sign"></span>

                    </div>
                    <div class="panel-body">
                        <p class="tahoma">
                            {!! $discussion->description or 'description does not exists!' !!}
                        </p>

                        <hr>

                    @if($username)
                    <!-- Reply form starts here -->
                        <div class="answer-form">
                            {!! Form::open(["route"=>["addReply"], 'method'=>'put', 'id'=>'reply_form']) !!}
                                <input type="hidden" name="d_id" value="{{ $discussion->id }}" />
                                <input type="hidden" name="n_to" value="{{ $discussion->username }}" />
                                {!! Form::textarea("reply", null, ['class'=>'form-control text-editor', 'id'=>'text_editor', 'rows'=>'6', 'maxlength'=>'10000']) !!}
                                {!! Form::submit("Reply", ['class'=>'btn btn-lg btn-success', 'onclick'=>'parseTextFromIFrameAndSetTextInTextArea()']) !!}
                            {!! Form::close() !!}
                        </div>
                    @else
                       <div class="has-error help-block">
                              You must log in to post comment.
                       </div>
                       <div class="help-block">
                             <a href="{{ route('index', '#login') }}">Login</a>
                             <a href="{{ route('index', '#register_section') }}">Register</a>
                       </div>
                    @endif
                        <br>
                    @foreach($replies as $r)

                    @if($r->d_id == $discussion->id)
                        <div class="form-group-lg">
                            <div class="panel panel-primary" style="border: 2px solid #000000;">
                                <div class="panel panel-heading" id="heading-panel">
                                    <span class="glyphicon glyphicon-user"></span>
                                    <a href="{{ route("profileVisit", $r->username) }}" style="font-size: 22px; font-weight: bolder;"> {{ $r->username }}</a>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group col-sm-12">
                                        <div class="col-sm-1" id="image">
                                        {!! Html::image($r->image_url,$r->image_name, ['class'=>'img img-responsive img-thumbnail']) !!}
                                        </div>
                                        <div class="col-sm-11" id="answer">
                                            <p class="tahoma">{!! $r->reply !!}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-footer"><!-- Like and dislike section -->
                                <?php

                                foreach($likes as $l)
                                {
                                    if($l->rep_id == $r->id)
                                        $i++;
                                }
                                foreach($dislikes as $d)
                                {
                                    if($d->rep_id == $r->id)
                                        $j++;
                                }
                                ?>
                                    <a href="{{ route('storeLikesDiscussion', [$discussion->id, $r->id]) }}" id="likeBtn"><span class="badge" id="likeCount">{{$i or '0' }}</span> <span class="glyphicon glyphicon-thumbs-up"></span></a>
                                    &nbsp; | &nbsp;
                                    <a href="{{ route('storeDislikesDiscussion', [$discussion->id, $r->id]) }}" id="dislikeBtn"><span class="badge" id="dislikeCount">{{ $j or '0' }}</span> <span class="glyphicon glyphicon-thumbs-down"></span></a>
                                    <br><br>
                                            <!-- end -->
                                <?php $i = 0;$j=0; ?>

                                </div>
                            </div>
                        </div>
                    @endif

                    @endforeach
                    </div>
                </div>
        </div>
        <div class="col-md-1"></div>

    </div>

</div>
@endsection