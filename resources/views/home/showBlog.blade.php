<?php
 $title=$blog[0]->username." Blog";
 $pageHeader = "Blog";
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

                @if(isset($blog[0]))

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4">
                            {!! Html::image($blog[0]->image_url, $blog[0]->image_name, ['class'=>'img img-responsive img-thumbnail']) !!}
                        </div>
                        <div class="col-md-6">
                            <div class="h3"><span class="glyphicon glyphicon-user"></span><b>{{ $blog[0]->username or 'username not set' }}</b></div>
                            <div class="help-block">
                                <div class="h6">created at: {{ $blog[0]->created_at or 'time not set' }}</div>
                                <br />
                            </div>
                            <div class="h4">{{ $blog[0]->heading or 'heading not set' }}</div>
                            <br />
                            <p>{{ $blog[0]->content or '---' }}</p>
                    <hr>
                            @if(isset($total_views))
                            <div class="help-block">
                                <label>Total Blog Views: {{ $total_views }}</label>
                            </div>
                            @endif
                    <hr>
                            <!-- Blog Comment System Include -->
                            @include('home._blog_comment_section')
                        </div>
                    </div>

                </div>
                <hr>


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