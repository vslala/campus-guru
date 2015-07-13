<?php
$title="CampusGuru Blogs";
 $pageHeader = "All Blogs";
?>
@extends('master')

@section('links')
{!! Html::style('css/profile.css') !!}
<style>
body{
 padding-top: 100px;
}
</style>
@endsection

@section('content')
@if($show == true)
    @include('_top-nav')
    <div class="container-fluid">
    @include('_first_row')
@else
    @include('_top_home_nav')
@endif
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
        <div class="panel panel-default">
            <div class="panel-body">
            <br/>


                @if(isset($blogs[0]))

                <div class="container-fluid">
                    @foreach($blogs as $b)
                    <div class="row" id="blog_row">
                        <div class="col-md-1">
                            {!! Html::image($b->image_url, $b->image_name, ['class'=>'img img-responsive img-thumbnail']) !!}
                        </div>
                        <div class="col-md-11">
                            <div class="username"><span class="glyphicon glyphicon-user"></span><b>{{ $b->username or 'username not set' }}</b></div>
                            <div class="help-block">
                                <div class="h6">created at: {{ $b->created_at or 'time not set' }}</div>
                            </div>
                            <div class="h4">
                                <a href="{{ route('showSingleBlog', ["id"=>$b->id,"heading"=>$b->heading]) }}">
                                    {{ $b->heading or 'heading not set' }}
                                </a>
                            </div>

                        </div>
                    </div>
                    <hr>
                    @endforeach
                </div>



                @endif
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