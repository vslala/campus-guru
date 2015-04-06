
@extends('master')

@section('links')
    {!! Html::style('css/profile.css') !!}
    {!! Html::script("js/profile.js") !!}
    <script src="https://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script src="https://cdn.blockspring.com/blockspring.js"></script>
@endsection

@section('content')

@include('_top-nav')

<div class="container-fluid">
    <hr class="">
    <div class="container target">
        <div class="row first-row">
            <div class="col-sm-12">
            <div class="col-sm-2">
            <a href="#" class="pull-right">{!! Html::image($userImage[0]['image_url'],$userImage[0]['image_name'],['title'=>'profile_image', 'class'=>'img img-responsive img-thumbnail']) !!}
             </a>
                 <h1 class="col-sm-2">{{ $user[0]->username or 'Username'}}</h1>
            </div>
          {{--<div class="col-sm-2"><a href="/users" class="pull-right">{!! Html::image($dp[0]['image_url'],"dp",['title'=>'profile_image', 'class'=>'img img-responsive img-circle']) !!}</a>--}}
                <div class="col-sm-6 pull-right">
                <label>About:</label>
                          <div class="">
                            <p>{{ $user[0]['about_me'] or '-----------' }}</p>
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

                                        <li class="list-group-item text-right"><span class="pull-left"><strong class="">Joined</strong></span>{{ $user[0]['created_at'] }}</li>
                                            <li class="list-group-item text-right"><span class="pull-left"><strong class="">Real name</strong></span>
                                                {{ $realName[0]->name or '------' }}</li>
                                      <li class="list-group-item text-right"><span class="pull-left"><strong class="" >Rashi: </strong></span> <span id="rashi">{{ $user[0]['rashi'] or "what's your Rashi?" }}</span>

                                              </li>
                                    </ul>
                </div>


                <div class="panel panel-default ">
                    <div class="panel-heading">Website <i class="fa fa-link fa-1x"></i>

                    </div>
                    <div class="panel-body"><a href="http://{{ $user[0]['website'] }}" class="">{{ $user[0]['website'] or 'No website Yet' }}</a>

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


</div>

@include('_postsModal')
@endsection