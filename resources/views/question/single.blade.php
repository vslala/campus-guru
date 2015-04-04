<?php
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
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="panel panel-default" id="answer_panel">
                    <div class="panel-heading" style="color: crimson; font-weight: bold;">
                        {{ $question->title or 'title not present' }}<span class="glyphicon glyphicon-question-sign"></span>
                    </div>
                    <div class="panel-body">
                        <p>
                            {{ $question->description or 'description does not exists!' }}
                        </p>
                        <p>

                            @if((isset($attachment)) && ($attachment[0]->image_type == "image/jpeg" ||
                             $attachment[0]->image_type == "image/jpg" || $attachment[0]->image_type == "image/png"))
                                {!! Html::image($attachment[0]->image_url,$attachment[0]->image_url, ['class'=>'img img-responsive img-rectangle']) !!}

                            @else
                                <a href="http://localhost/campusguru/public/{{ $attachment[0]->image_url or 'NoAttachment'}}">{{ $attachment[0]->image_url or 'no attachment'}} <span class="glyphicon glyphicon-download"></span></a>

                            @endif

                        </p>
                        <hr>

                    <!-- Answers form starts here -->
                        <div class="answer-form">
                            {!! Form::open(["route"=>["addAnswer"], 'method'=>'put', 'id'=>'answer_form']) !!}
                                <input type="hidden" name="q_id" value="{{ $question->id }}" />
                                {!! Form::textarea("answer", null, ['class'=>'form-control', 'rows'=>'6']) !!}
                                {!! Form::submit("Submit Answer", ['class'=>'btn btn-lg btn-success']) !!}
                            {!! Form::close() !!}
                        </div>
                        <br>
                    @foreach($answers as $a)

                    @if($a->q_id == $question->id)
                        <div class="form-group-lg">
                            <div class="panel panel-primary" style="border: 2px solid #000000;">
                                <div class="panel panel-heading" id="heading-panel">
                                    <span class="glyphicon glyphicon-user"></span>{{ $a->username }}
                                </div>
                                <div class="panel-body">
                                    <div class="form-group col-sm-12">
                                        <div class="col-sm-1" id="image">
                                        {!! Html::image($a->image_url,$a->image_name, ['class'=>'img img-responsive img-thumbnail']) !!}
                                        </div>
                                        <div class="col-sm-11" id="answer">
                                            <p id="lobster_font"><strong>{{ $a->answer }}</strong></p>
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
                                        @foreach($comments as $comment)
                                             @if($comment->ans_id == $a->id)
                                             <div class="form-group jumbotron col-md-12" style="padding: 1px;"><!-- Form a group to contain single row -->
                                             <div class="col-md-1">
                                                <a href="{{ route('profileVisit', $comment->username) }}">
                                                {!! Html::image($comment->image_url,$comment->image_name, ['class'=>'img img-thumbnail img-responsive']) !!}
                                                </a>
                                             </div>
                                             <div class="col-md-11 blue" id="comments">
                                                {{ $comment->comment }}
                                             </div>
                                             </div><!-- form froup div ends here -->
                                             @endif
                                        @endforeach
                                    @endif

                                    {!! Form::open(["route"=>["addComment"], 'method'=>'put', 'class'=>'form-inline', 'id'=>'commentForm']) !!}
                                        <input type="hidden" value="{{ $a->id }}" name="ansId">
                                        {!! Form::textarea('comment', null, ['class'=>'form-control', 'rows'=>'1']) !!}
                                        {!! Form::submit("comment", ['class'=>'btn btn-primary btn-sm']) !!}
                                    {!! Form::close() !!}
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