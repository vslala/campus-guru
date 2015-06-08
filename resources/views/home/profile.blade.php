<?php
    if(count($userImage) <= 0)
    {
        $userImage[0]->image_url = 'http://fc09.deviantart.net/fs71/f/2010/330/9/e/profile_icon_by_art311-d33mwsf.png';
    }

 ?>
@extends('master')

@section('links')
    {!! Html::style('css/profile.css') !!}
    {!! Html::script("js/profile.js") !!}
    <script src="https://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script src="https://cdn.blockspring.com/blockspring.js"></script>
@endsection

@section('content')

@include('_top-nav')

<div class="container">
    <hr class="">
    <div class="container target">
        <div class="row first-row">
        @if(Session::get("flash_message"))
            <span class="alert-success message" id="message">{{ Session::get("flash_message") }}</span>
        @endif
            <div class="col-sm-12">
            <div class="col-sm-2">
            <a href="{{ route("profile") }}" class="pull-right">{!! Html::image($userImage[0]['image_url'],"dp",['title'=>'profile_image', 'class'=>'img img-responsive img-thumbnail', 'style'=>'width: 200px;']) !!}
             </a>
                 <h1 class="col-sm-2">{{ $user[0]['username'] or $username }}</h1>
            </div>
          {{--<div class="col-sm-2"><a href="/users" class="pull-right">{!! Html::image($dp[0]['image_url'],"dp",['title'=>'profile_image', 'class'=>'img img-responsive img-circle']) !!}</a>--}}
                <div class="col-sm-6 pull-right">
                          <button type="button" id="edit_profile_btn" class="btn btn-success">Edit Profile</button>
                          <div class="edit-form jumbotron" style="display: none; position: absolute; z-index: 9;" id="edit_profile_form">
                            @include('home._edit_profile_form')
                          </div>
                            <button type="button" data-target="#uploadDP" data-toggle="modal" class="btn btn-info">Change Profile Picture</button>


                          <div style="margin-top: 1em;">
                            <a href="{{ route("startDiscussion") }}" class="btn btn-primary"> Start a Discussion</a>
                            <a href="{{ route("askQuestion") }}" class="btn btn-primary">Ask Question?</a>
                          </div>

                          <div style="margin-top: 1em;">
                            <a href="{{ route("complain") }}" class="btn btn-danger">Complain Box</a>
                            <a href="{{ route("confession") }}" class="btn btn-warning">Confession Box</a>
                          </div>

                          <div style="margin-top: 1em;">
                            <a href="{{ route("messages") }}" class="btn btn-primary">Messages</a>
                          </div>
                </div>
            </div>
        </div>
      <br>
        <div class="row">
            <div class="col-sm-3">
                <!--left col-->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Profile
                    </div>
                    <ul class="list-group">

                                        <li class="list-group-item text-right"><span class="pull-left"><strong class="">Joined</strong></span>{{ $user[0]['created_at'] or 'null' }}</li>
                                            <li class="list-group-item text-right"><span class="pull-left"><strong class="">Real name</strong></span>
                                                {{ $realName or 'Not Provided' }}</li>
                                      <li class="list-group-item text-right"><span class="pull-left"><strong class="" >Rashi: </strong></span> <span id="rashi">{{ $user[0]['rashi'] or 'Null' }}</span>

                                              </li>
                                    </ul>
                </div>


                <div class="panel panel-default ">
                    <div class="panel-heading">Website <i class="fa fa-link fa-1x"></i>

                    </div>
                    <div class="panel-body"><a href="http://{{ $user[0]['website'] or '' }}" class="">{{ $user[0]['website'] or '' }}</a>

                    </div>
                </div>

                <ul class="list-group">
                    <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i>

                    </li>

                    <li class="list-group-item text-right"><span class="pull-left"><strong class="">Likes</strong></span> {{ $totalLikes or '0' }}</li>
                        <li class="list-group-item text-right"><span class="pull-left"><strong class="">Posts</strong></span> {{ $posts or '0' }}</li>
                            <li class="list-group-item text-right"><span class="pull-left"><strong class="">Discussions Started</strong></span> {{ $discussionStarted or '0' }}</li>
                            <li class="list-group-item text-right"><span class="pull-left"><strong class="">Questions Asked</strong></span> {{ $questionAsked or '0' }}</li>
                            <li class="list-group-item text-right"><span class="pull-left"><strong class="">Questions Answered</strong></span> {{ $questionAnswered or '0' }}</li>
                </ul>

            </div>
            <!--/col-3-->
            <div class="col-sm-9" contenteditable="false" style="">
                <!--  -->
                                <div class="panel panel-default target">
                                    <div class="panel-heading" contenteditable="false">My Today's Horoscope</div>
                                    <div class="panel-body">
                                <div class="row">
                    				<div class="col-md-12">
                                        <div id="horoscope">

                                        </div>
                    				</div>

                                </div>
                                    </div>

                                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">About Me</div>
                    <div class="panel-body"> {{ $user[0]['about_me'] or '' }}

                    </div>
                </div>
                <!-- Status Update Panel -->
                <div class="panel panel-default target">
                    <div class="panel-heading" contenteditable="false">My Status Updates...</div>
                    <div class="panel-body">
                <div class="row">
    				<div class="col-md-12">
                        @include('home._status')
    				</div>

                </div>
                    </div>

                </div>



            </div>



        </div>

    </div>
    </div>

            </div>



    </div>

    <!-- Modal Starts here -->
       <div class="modal fade" id="uploadDP">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal-title">
                            <div class="h3">Upload Your Profile Picture </div>
                        </div>
                    </div>
                    <div class="modal-body">
                        {!! Form::open(["route"=>["uploadPicture"], "method"=>"put", "files"=>true]) !!}
                            <div class="form-group-lg">
                                {!! Form::file("file", ["class"=>"form-control"]) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::submit("Upload", ["class"=>"btn btn-primary btn-lg"]) !!}
                                <button data-dismiss="modal" class="btn btn-danger btn-lg">Close</button>
                            </div>

                        {!! Form::close() !!}
                    </div>
                </div><!-- Modal content ends here -->
            </div><!-- Modal Dialog ends here -->
       </div><!-- modal ends here-->
    <!-- Modal Ends here -->


</div>

@include('_postsModal')
@endsection