
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
            @if(isset($userImage))
            <a href="#" class="pull-right">{!! Html::image($userImage[0]['image_url'],$userImage[0]['image_name'],['title'=>'profile_image', 'class'=>'img img-responsive img-thumbnail', 'style'=>'width: 200px;']) !!}
             </a>
            @else
            <a href="#"><img src="http://fc09.deviantart.net/fs71/f/2010/330/9/e/profile_icon_by_art311-d33mwsf.png" class="img img-responsive img-thumbnail" style="width: 200px;"/> </a>
            @endif
                 <h1 class="col-sm-2">{{ $realName[0]['username'] or 'Username'}}</h1>
            </div>
          {{--<div class="col-sm-2"><a href="/users" class="pull-right">{!! Html::image($dp[0]['image_url'],"dp",['title'=>'profile_image', 'class'=>'img img-responsive img-circle']) !!}</a>--}}
                <div class="col-sm-8">
                <div class="pull-left">
                @if(isset($userImage[0]['id']))
                    <a href="{{ route('likeDisplayPicture', $userImage[0]['id']) }}" class="btn btn-primary" id="like_image_btn"><span class="glyphicon glyphicon-thumbs-up"></span> </a>
                    <div class="badge" id="like_count">{{ $userImage[0]['likeCount'] or '0' }}</div>
                @endif
                    <br><br>
                <div class="pull-left">

                @if (Session::has('flash_message'))
                    <div class="alert-success message" id="message_div"> {{ Session::get('flash_message') }} </div>
                @endif
                      <button class="btn btn-default" data-target="#message_modal" data-toggle="modal">Send Message</button>
                </div>
                </div>

                <div class="pull-right" style="margin-right: 20%;">
                    <label>About:</label>
                          <div class="">
                            <p>{{ $user[0]['about_me'] or '-----------' }}</p>
                          </div>
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

                                        <li class="list-group-item text-right"><span class="pull-left"><strong class="">Joined</strong></span>{{ $user[0]['created_at'] or 'Not Provided' }}</li>
                                            <li class="list-group-item text-right"><span class="pull-left"><strong class="">Real name</strong></span>
                                                {{ $realName[0]->name or '------' }}</li>
                                      <li class="list-group-item text-right"><span class="pull-left"><strong class="" >Rashi: </strong></span> <span id="rashi">{{ $user[0]['rashi'] or "what's your Rashi?" }}</span>

                                              </li>
                                    </ul>
                </div>


                <div class="panel panel-default ">
                    <div class="panel-heading">Website <i class="fa fa-link fa-1x"></i>

                    </div>
                    <div class="panel-body"><a href="http://{{ $user[0]['website'] or '#' }}" class="">{{ $user[0]['website'] or 'No website Yet' }}</a>

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
<!-- Modal -->
<div class="modal fade" id="message_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Send your message!</h4>
      </div>
      <div class="modal-body">
            {!! Form::open(["route"=>["sendMessage"], 'files'=>true, 'method'=>'POST', 'id'=>'message_form', 'class'=>'form-horizontal']) !!}
                <input type="hidden" name="sentTo" value="{{ $user[0]['username'] or '' }}" />
                <div class="form-group">
                                    <label class="form-label col-md-2">
                                        Subject
                                    </label>
                                    <div class="col-md-10">
                                        {!! Form::text('subject', null, ['class'=>'form-control']) !!}
                                    </div>
                                </div>
                <div class="form-group">
                    <label class="form-label col-md-2">
                        Message
                    </label>
                    <div class="col-md-10">
                        {!! Form::textarea('message', null, ['class'=>'form-control', 'rows'=>'4']) !!}
                    </div>
                </div>
                <div class="form-group">
                                    <label class="form-label col-md-2">
                                        File (optional)
                                    </label>
                                    <div class="col-md-10">
                                        {!! Form::file('file', ['class'=>'form-control']) !!}
                                    </div>
                                </div>
                <div class="form-group">
                      <label class="form-label col-md-2"></label>
                      <div class="col-md-10">
                          {!! Form::submit('Send', ['class'=>'btn btn-primary']) !!}
                      </div>
                  </div>
            {!! Form::close() !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>

</div>

@include('_postsModal')
@endsection