<?php
 $pageHeader = "All Blogs";
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
            <div class="panel-body">
            <br/>

                @if(isset($status[0]))
                @foreach($status as $s)
                                            <ul class="nav nav-pills list-inline">
                                                <li>

                                                    <a href="{{ route("profileVisit", [
                                                        $s->username
                                                    ]) }}" >
                                                        {!! Html::image($s->image_url, $s->image_name, ['class'=>'img img-thumbnail img-responsive', 'style'=>'height: 100px;']) !!}
                                                    </a>


                                                </li>
                                                <li style="margin-top: 2%;"><span style="font-family: cursive,Lobster; font-weight: bold; color: #843534;">{{ $s->status or 'Status' }}</span>
                                                    <br>
                                                    <div class="help-block">created at: {{ $s->created_at }}</div>
                                                 </li>
                                                @include('_status_like')
                                                <hr>
                                            </ul>
                @endforeach
                @endif
                <hr>



            </div>
        </div>
            {{--{!! Form::model(, [route('adminBlog'), 'method'=>'put', 'class'=>'form-horizontal']) !!}--}}

            {{--{!! Form::close() !!}--}}
        </div>
        <div class="col-md-1">

        </div>
    </div>

    @include('_postsModal')
</div>
@endsection