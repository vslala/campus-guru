<?php
    $pageHeader = "Confessions";
    $title = "Confessions";
?>
@extends('master')

@section('links')
{!! Html::style('css/profile.css') !!}
{!! Html::script('js/myjs.js') !!}
@endsection
@section('content')

@include('_top-nav')

<div class="container-fluid">
        @include('_first_row')

        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
            <div class="complains-lists">
                                                <ul class="nav nav-stacked">
                                                @if(isset($data))
                                                    @foreach($data as $c)
                                                        <li class="list">
                                                            <div class="panel panel-default">
                                                                <div class="panel-heading">

                                                                    <span class="glyphicon glyphicon-time pull-right">{{ $c->created_at or '' }}</span>
                                                                    <span class="pull-left college">{{ $c->college or ''}}</span>
                                                                </div>
                                                                <div class="panel-body">
                                                                    <span class="glyphicon glyphicon-user"></span>
                                                                    <span class="complains">{{ $c->confession or '' }}</span>
                                                                    <div class="form-group pull-right">
                                                                        <a href="{{ route('deleteConfession', $c->id) }}"
                                                                        class="btn btn-sm btn-default" id="report_abuse">Report Abuse</a>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </li>
                                                    @endforeach
                                                @endif
                                                </ul>
                                            </div>
            </div>
            <div class="col-md-1"></div>

            </div>
@include("_postsModal")
</div>
@endsection