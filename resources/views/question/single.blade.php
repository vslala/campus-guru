<?php
    $title="Question";
    $pageHeader = $question->title;
    if(count($question) <= 0)
    {
        $question = null;
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
@endsection
@section('content')

<span id="userImage"></span>

@include('_top-nav')

<div class="container-fluid">
        @include('_first_row')
    <div class="row">
    @if(Session::get("flash_message"))
        <div class="message alert-info" id="message">{{ Session::get("flash_message") }}</div>
    @endif
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="panel panel-default" id="answer_panel">
                    <div class="panel-heading" style="color: crimson; font-weight: bold;">
                        <div class="pull-right"><div class="help-block">{{ $question->created_at or '' }}</div> </div>
                        <label class="label label-primary"><a href="{{ route("profileVisit", $question->username) }}" style="color: white;">{{ $question->username or '' }} asked</a></label>{{ $question->title or 'title not present' }}<span class="glyphicon glyphicon-question-sign"></span>
                    </div>
                    <div class="panel-body">
                        <p class="tahoma">
                            {!! $question->description or 'description does not exists!' !!}
                        </p>
                        <p>

                            @if((isset($attachment[0])))
                                {!! Html::image($attachment[0]->image_url,$attachment[0]->image_url, ['class'=>'img img-responsive img-rectangle', "style"=>"height: 300px;"]) !!}


                            @endif

                        </p>
                        <hr>

                    <!-- Answers form starts here -->
                        <div class="answer-form">
                            {!! Form::open(["route"=>["addAnswer"], 'method'=>'put', 'id'=>'answer_form']) !!}
                                <input type="hidden" name="q_id" value="{{ $question->id }}" />
                                <input type="hidden" name="n_to" value="{{ $question->username }}" />
                                {!! Form::textarea("answer", null, ['class'=>'form-control', 'rows'=>'6', 'maxlength'=>'10000']) !!}
                                {!! Form::submit("Submit Answer", ['class'=>'btn btn-lg btn-success']) !!}
                            {!! Form::close() !!}
                        </div>
                        <br>
                    @foreach($answers as $a)

                    @if($a->q_id == $question->id)
                        <div class="form-group-lg">
                            <div class="panel panel-primary" style="border: 2px solid #000000;">
                                <div class="panel panel-heading" id="heading-panel">
                                    <span class="glyphicon glyphicon-user"></span>
                                    <a href="{{ route("profileVisit", $a->username) }}" style="font-size: 22px; font-weight: bolder;"> {{ $a->username }}</a>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group col-sm-12">
                                        <div class="col-sm-1" id="image">
                                        {!! Html::image($a->image_url,$a->image_name, ['class'=>'img img-responsive img-thumbnail']) !!}
                                        </div>
                                        <div class="col-sm-11" id="answer">
                                            <p class="tahoma">{!! $a->answer !!}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-footer"><!-- Like and dislike section -->
                                <?php

                                foreach($likes as $l)
                                {
                                    if($l->ans_id == $a->id)
                                        $i++;
                                }
                                foreach($dislikes as $d)
                                {
                                    if($d->ans_id == $a->id)
                                        $j++;
                                }
                                ?>
                                    <a href="{{ route('storeLikes', [$question->id, $a->id]) }}" id="likeBtn"><span class="badge" id="likeCount">{{$i or '0' }}</span> <span class="glyphicon glyphicon-thumbs-up"></span></a>
                                    &nbsp; | &nbsp;
                                    <a href="{{ route('storeDislikes', [$question->id, $a->id]) }}" id="dislikeBtn"><span class="badge" id="dislikeCount">{{ $j or '0' }}</span> <span class="glyphicon glyphicon-thumbs-down"></span></a>
                                    <br><br>
                                            <!-- end -->
                                <?php $i = 0;$j=0; ?>
                                    @if(count($comments) >= 0)
                                                    <div class="form-group comment-block">
                                                                <!-- Comments will be show here -->
                                                                <ul id="comments" class="list-group">

                                                                    @foreach($comments as $comment)
                                                                     @if($comment->ans_id == $a->id)
                                                                        <li class="list-group-item">
                                                                            <div class="help-block">
                                                                                <span class="glyphicon glyphicon-time pull-right time">{{ $comment->created_at }}</span>
                                                                            </div>
                                                                            <a href="{{ route('profileVisit', $comment->username) }}">
                                         {!! Html::image($comment->image_url, $comment->image_name, ['class'=>'img img-responsive img-thumbnail', 'style'=>'height: 50px;']) !!}
                                                                            <span class="username">{{ $comment->username }}</span>
                                                                            </a>

                                                                            <p class="comment">{{  $comment->comment }}</p>
                                                                        </li>
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                                </ul>

                    {!! Form::open(["route"=>["addComment"], 'method'=>'put', 'class'=>'form-inline', 'id'=>'commentForm']) !!}
                                        <input type="hidden" value="{{ $a->id }}" name="ansId">
                                        {!! Form::textarea('comment', null, ['class'=>'form-control', 'rows'=>'1', 'id'=>'commentTextField']) !!}
                                        {!! Form::submit("comment", ['class'=>'btn btn-primary btn-sm']) !!}
                                    {!! Form::close() !!}
                                                            </div>
                                        {{--@foreach($comments as $comment)--}}
                                             {{--@if($comment->ans_id == $a->id)--}}

                                             {{--<div class="form-group col-md-12"><!-- Form a group to contain single row -->--}}
                                             {{--<div class="col-md-1">--}}
                                                {{--<a href="{{ route('profileVisit', $comment->username) }}">--}}
                                                {{--{!! Html::image($comment->image_url,$comment->image_name, ['class'=>'img img-thumbnail img-responsive small-img']) !!}--}}
                                                {{--</a>--}}
                                             {{--</div>--}}

                                             {{--<div class="col-md-11 blue tahoma" id="comments">--}}
                                                {{--{{ $comment->comment }}--}}
                                             {{--</div>--}}
                                             {{--</div><!-- form froup div ends here -->--}}

                                             {{--@endif--}}
                                        {{--@endforeach--}}

                                    {{--@endif--}}


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
@include('_postsModal')
</div>
@endsection