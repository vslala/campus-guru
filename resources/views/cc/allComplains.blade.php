<?php
    $pageHeader = "Complains";
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

        @include('cc._fetchData')
@include("_postsModal")
</div>
@endsection