<?php
$title="Compose Blog";
 $pageHeader = "Compose Blog";
 ?>
@extends('master')

@section('links')
{!! Html::style('css/profile.css') !!}
{!! Html::script('js/wysiwyg.js')!!}
@endsection

@section('content')

@include('_top-nav')

<div class="container-fluid">
    @include('_first_row')

    <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="panel panel-default">
                        <div class="panel-heading" style="color: crimson; font-weight: bold;">
                            Compose Blog
                        </div>
                        <div class="panel-body">
                            <p>Share your feelings with the world. You feel something which people needs to know,
                            now you can do. Simply start writing a blog.
                            </p>
                            <hr>
                            <div class="page-form">
                                @include('home._blogForm')
                            </div>

                        </div>
                    </div>
            </div>
            <div class="col-md-1"></div>

        </div>
</div>

@endsection