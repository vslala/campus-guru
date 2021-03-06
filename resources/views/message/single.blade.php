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
    <div class="row first-row">
        <div class="col-md-2"></div>
        <div class="col-md-2">
            <a href="{{ route("messages") }}" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> Inbox </a>
        </div>
        <div class="col-md-8"></div>
    </div>
    <div class="row">

        @include('message._left_nav')

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="panel-header">
                        <span class="pull-right"><a href="{{ route("deleteMessage", $message->id) }}">Delete </a></span>
                       From:  <label><a href="{{route("profileVisit", $message->sender_username)}}">{{ $message->sender_username or 'username'}}</a></label><br />
                       Subject:  <label>{{ $message->subject or ''}}</label> <br />
                       Received at: <label>{{ $message->created_at or 'not mentioned' }}</label>
                    </span>
                </div>
                <div class="panel-body">
                <label>Message:</label><br>
                        <p style="font-size: medium;">{{ $message->message or '' }}</p>

                        <p>
                        @if(isset($message->file_name))
                             <span class="glyphicon glyphicon-paperclip"></span>{!! Html::link($message->file_url, $message->file_name) !!}
                        @endif
                        </p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection