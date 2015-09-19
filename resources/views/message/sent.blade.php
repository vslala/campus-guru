<?php
$setSentActive="active";
$title="Inbox";
?>
@extends('master')

@section('links')
    {!! Html::script("js/profile.js") !!}
    <script src="https://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script src="https://cdn.blockspring.com/blockspring.js"></script>
@endsection

@section('content')

<style>
.first-row{
margin-top: 10%;
}
</style>

@include('_top-nav')

<div class="container">
    @include('message._first_row')
    <div class="row">

    @include('message._left_nav')
        <div class="col-sm-9 col-md-10">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                <li class="active"><a href="#home" data-toggle="tab"><span class="glyphicon glyphicon-inbox">
                </span>Primary</a></li>
                {{--<li><a href="#profile" data-toggle="tab"><span class="glyphicon glyphicon-user"></span>--}}
                    {{--Social</a></li>--}}
                {{--<li><a href="#messages" data-toggle="tab"><span class="glyphicon glyphicon-tags"></span>--}}
                    {{--Promotions</a></li>--}}
                {{--<li><a href="#settings" data-toggle="tab"><span class="glyphicon glyphicon-plus no-margin">--}}
                {{--</span></a></li>--}}
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane fade in active" id="home">
                @if(isset($messages))
                    <div class="list-group">
                    @foreach($messages as $m)
                        <a href="{{ route('singleMessage', $m->id) }}" class="list-group-item">
                                {!! Html::image($m->image_url, $m->image_name, ['class'=>'img img-responsive img-thumbnail', 'style'=>'height: 100px;']) !!}

                            <span class="glyphicon glyphicon-star-empty"></span><span class="name" style="min-width: 120px;
                                display: inline-block;">{{ $m->sender_username or '' }}</span> <span class="">{{ $m->subject or '' }}</span>
                            <span class="text-muted" style="font-size: 11px;"><?php if(isset($m->message)){echo substr($m->message,0,110);}else{echo '';} ?></span> <span class="badge">{{ $m->created_at or '' }}</span>

                                </a>
                        @endforeach
                    </div>
                @endif
                </div>
                {{--<div class="tab-pane fade in" id="profile">--}}
                    {{--<div class="list-group">--}}
                        {{--<div class="list-group-item">--}}
                            {{--<span class="text-center">This tab is empty.</span>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="tab-pane fade in" id="messages">--}}
                    {{--...</div>--}}
                {{--<div class="tab-pane fade in" id="settings">--}}
                    {{--This tab is empty.</div>--}}
            </div>

            <div class="row-md-12">

                <div class="well">
                  <span id="total_messages">Total Messages: <label>{{ count($messages)  }}</label></span>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection