<?php
 $pageHeader = "Edit Blog";
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
                {!! Form::model($blog,['route'=>['blogUpdate', $blog->id], 'method'=>'put', 'class'=>'form-horizontal']) !!}

                    <div class="form-group">
                        <label class="col-sm-2">Heading: </label>
                        <div class="col-sm-10">
                            {!! Form::text('heading', $blog->heading, ['class'=>'form-control']) !!}
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-2">Content: </label>
                        <div class="col-sm-10">
                            {!! Form::textarea('content', $blog->content, ['class'=>'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                            <label class="col-sm-2"> </label>
                            <div class="col-sm-10">
                                {!! Form::submit('Update', ['class'=>'btn btn-danger btn-lg']) !!}
                                <a href="{{ route("blog") }}" class="btn btn-primary btn-lg">Cancel</a>
                            </div>
                        </div>

                    {!! Form::close() !!}
            </div>
        </div>
    </div>

</div>



</div>

@endsection