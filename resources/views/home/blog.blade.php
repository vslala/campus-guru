<?php
 $pageHeader = "Blogs";
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
            {!! Html::link(route('composeBlog'), 'Compose', ['class'=>'btn btn-success']) !!}
            <br/>
            <hr>

                @foreach($blog as $b)

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4">
                            {!! Html::image($image[0]['image_url'], $image[0]['image_name'], ['class'=>'img img-responsive img-thumbnail']) !!}
                        </div>
                        <div class="col-md-6">
                            <div class="h3"><span class="glyphicon glyphicon-user"></span><b>{{ $b->username or 'username not set' }}</b></div>
                            <div class="help-block">
                                <div class="h6">created at: {{ $b->created_at or 'time not set' }}</div>
                                <br />
                            </div>
                            <div class="h4">{{ $b->heading or 'heading not set' }}</div>
                            <br />
                            <p>{{ $b->content or 'content not set'}}</p>
                            <div class="form-group">
                                {!! Html::link(route('blogEdit', $b->id), 'Edit', ['class'=>'btn btn-primary']) !!}

                                {!! Html::link(route('blogDelete', $b->id), 'Delete', ['class'=>'btn btn-danger']) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <hr>


                @endforeach
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