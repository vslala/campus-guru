@extends("master")

@section('links')
	<!-- script references -->

@endsection

@section('content')

@include('_top-nav')
<!--main-->
<div class="container" id="main">
   <div class="row">
   <div class="col-md-4 col-sm-6">
           <div class="well">
                {!! Form::open(["route"=>["statusUpdate"], "method"=>"put", "class"=>"form-horizontal", "id"=>"status_form"]) !!}
                 <h4>What's New</h4>
                  <div class="form-group">
                   <textarea name="status" class="form-control" placeholder="Update your status"></textarea>
                 </div>
                 <button class="btn btn-success pull-right" type="submit">Post</button><ul class="list-inline"><li><a href="#"><i class="glyphicon glyphicon-align-left"></i></a></li><li><a href="#"><i class="glyphicon glyphicon-align-center"></i></a></li><li><a href="#"><i class="glyphicon glyphicon-align-right"></i></a></li></ul>
               {!! Form::close() !!}
           </div>

        <div class="panel panel-default">
          <div class="panel-heading"><a href="{{ route("viewAllQuestions") }}" class="pull-right">View all</a> <h4>Recently Asked Questions</h4></div>
   			<div class="panel-body">

   			<input type="hidden" id="fetchQuestionUrl" value="{{ route("showAllQuestions") }}" />

              <div class="list-group" id="list_of_questions">
              @foreach($questions as $q)
                <a href="{{ route("show", $q->id) }}" class="list-group-item">
                    {!! Html::image($q->image_url,$q->image_name, ['class'=>'img img-responsive img-thumbnail', 'style'=>'width:50px;']) !!}
                    <span id="question_link_home">{{ $q->title }}</span>
                </a>
              @endforeach
              </div>
            </div>
   		</div>



	</div>
  	<div class="col-md-4 col-sm-6">

          <div class="well">
              <h4>News Feed</h4>
              <!-- List Of Status Updates will come here -->
                <div class="status-section" id="status_section">
                        @foreach($status as $s)
                            <ul class="nav nav-pills list-inline">
                                <li>
                                    <a href="{{ route("profileVisit", $s->username) }}" >
                                        {!! Html::image($s->image_url, $s->image_name, ['class'=>'img img-thumbnail img-responsive', 'style'=>'height: 100px;']) !!}
                                    </a>


                                </li>
                                <li style="margin-top: 2%;"><span style="font-family: cursive,Lobster; font-weight: bold; color: #843534;">{{ $s->status or 'Status' }}</span>
                                    <br>
                                    <div class="help-block">created at: {{ $s->created_at }}</div>
                                 </li>
                                 <li>
                                    <ul class="list-inline">
                                        <a href="{{ route("updateLikeStatus", $s->id) }}" class="inline" id="statusLike">
                                            <span class="badge">{{ $s->likeCount or "0" }}</span>
                                            <span class="glyphicon glyphicon-thumbs-up"></span>
                                        </a>
                                    &nbsp; | &nbsp;
                                        <a href="{{ route("updateDislikeStatus", $s->id)}}" class="inline" id="statusDislike">
                                            <span class="badge">{{ $s->dislikeCount or "0" }}</span>
                                            <span class="glyphicon glyphicon-thumbs-down"></span>
                                        </a>
                                    </ul>

                                 </li>


                            </ul>
                            <hr>
                        @endforeach
                </div>
          </div>

      	 <div class="panel panel-default">
           <div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>Latest Blog</h4></div>
   			<div class="panel-body">
              <p>
              @foreach($blog as $b)
              @if(isset($b->image_url))
               {!! Html::image($b->image_url,$b->image_name,['class'=>'img-circle pull-right', 'style'=>'height:150px; width:150px;']) !!}
              @else
               <img src="//placehold.it/150x150" class="img-circle pull-right">
              @endif
                <a href="{{ route('profileVisit', $b->username) }}">{{ $b->username or 'User' }}</a></p>
              <div class="clearfix"></div>
              <hr>
              <a href="{{ route('showSingleBlog', $b->id)}}">{{ $b->heading or 'Blog heading' }}</a>
            </div>
            @endforeach
         </div>

  	</div>
  	</div>

  	<div class="row">
  	<div class="col-md-4 col-sm-6">
         <div class="panel panel-default">
           <div class="panel-heading"><a href="{{ route("viewAllDiscussion") }}" class="pull-right">View all</a> <h4>Latest Discussion Opened</h4></div>
   			<div class="panel-body">
   			<input type="hidden" id="fetchDiscussionUrl" value="{{ route("recentDiscussions") }}" />

              <div class="list-group" id="list_of_discussions">
              @foreach($discussions as $d)
                <a href="{{ route("show", $d->id) }}" class="list-group-item">
                    {!! Html::image($d->image_url,$d->image_name, ['class'=>'img img-responsive img-thumbnail', 'style'=>'width:50px;']) !!}
                    <span id="discussion_link_home">{{ $d->title }}</span>
                </a>
              @endforeach
              </div>

            </div>
   		</div>

        {{--<div class="panel panel-default">--}}
           {{--<div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>Stackoverflow</h4></div>--}}
   			{{--<div class="panel-body">--}}
              {{--<img src="//placehold.it/150x150" class="img-circle pull-right"> <a href="#">Keyword: Bootstrap</a>--}}
              {{--<div class="clearfix"></div>--}}
              {{--<hr>--}}

              {{--<p>If you're looking for help with Bootstrap code, the <code>twitter-bootstrap</code> tag at <a href="http://stackoverflow.com/questions/tagged/twitter-bootstrap">Stackoverflow</a> is a good place to find answers.</p>--}}

              {{--<hr>--}}
              {{--<form>--}}
              {{--<div class="input-group">--}}
                {{--<div class="input-group-btn">--}}
                {{--<button class="btn btn-default">+1</button><button class="btn btn-default"><i class="glyphicon glyphicon-share"></i></button>--}}
                {{--</div>--}}
                {{--<input type="text" class="form-control" placeholder="Add a comment..">--}}
              {{--</div>--}}
          	  {{--</form>--}}

            {{--</div>--}}
         {{--</div>--}}

        <div class="panel panel-default">
          <div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>Most Liked Status</h4></div>
   			<div class="panel-body">
   			<input type="hidden" id="mostLikedStatusUrl" value="{{ route('mostLikedStatus')}}" />
                <div class="most-liked" id="most_liked_status">

                </div>
            </div>
   		</div>


      	 <div class="panel panel-default">
           <div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>Complain Box</h4></div>
   			<div class="panel-body">
              <ul class="list-group">
              <li class="list-group-item">Complain #1</li>
              </ul>
            </div>
   		 </div>
    </div>
  </div><!--/row-->

  <hr>

  <div class="row">
  	<div class="col-md-12"><h2>Posts</h2></div>
    <div class="col-md-4 col-sm-6">
    	<div class="panel panel-default">
           <div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>Upgrade to Bootstrap 3</h4></div>
   			<div class="panel-body">
              <img src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=70" class="img-circle pull-right"> <a href="#">Guidance and Tools</a>
              <div class="clearfix"></div>
              <hr>
              <p>Migrating from Bootstrap 2.x to 3 is not a simple matter of swapping out the JS and CSS files.
              Bootstrap 3 is a major overhaul, and there are a lot of changes from Bootstrap 2.x. <a href="http://bootply.com/bootstrap-3-migration-guide">This guidance</a> is intended to help 2.x developers transition to 3.
              </p>
              <h5><a href="http://google.com/+bootply">More on Upgrading from +Bootply</a></h5>

            </div>
         </div>
    </div>
     <div class="col-md-4 col-sm-6">
    	<div class="panel panel-default">
           <div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>Profiles</h4></div>
   			<div class="panel-body">
              Check out some of our member profiles..
              <hr>
              <div class="well well-sm">
                <div class="media">
                    <a class="thumbnail pull-left" href="#">
                        <img class="media-object" src="//placehold.it/80">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">John Doe</h4>
                		<p><span class="label label-info">10 photos</span> <span class="label label-primary">89 followers</span></p>
                        <p>
                           <a href="#" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-comment"></span> Message</a>
                           <a href="#" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-heart"></span> Favorite</a>
                        </p>
                    </div>
                </div>
               </div>
            </div>
         </div>
    </div>
     <div class="col-md-4 col-sm-6">
    	<div class="panel panel-default">
           <div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>Jokes</h4></div>
   			<div class="panel-body">

              <div id="quote">

                {{--<iframe width="100%"--}}
                  {{--height="100%"--}}
                  {{--frameborder="0"--}}
                  {{--scrolling="no"--}}
                  {{--src="http://iheartquotes.com/api/v1/random?format=html&max_lines=4&max_characters=600&width=300&height=300">--}}

                {{--</iframe>--}}
              </div>


            </div>
         </div>
    </div><!--/articles-->
    </div>

    <hr>

	<div class="row">
	   <div class="col-sm-4 col-xs-6">
        <div class="panel panel-default">
          <div class="panel-thumbnail"><img src="//placehold.it/450X300/DD3333/EE3333" class="img-responsive"></div>
          <div class="panel-body">
            <p class="lead">Hacker News</p>
            <p>120k Followers, 900 Posts</p>

            <p>
              <img src="http://api.randomuser.me/portraits/med/men/20.jpg" width="28px" height="28px">
              <img src="http://api.randomuser.me/portraits/med/men/21.jpg" width="28px" height="28px">
              <img src="http://api.randomuser.me/portraits/med/men/14.jpg" width="28px" height="28px">
            </p>
          </div>
        </div>
      </div><!--/col-->

      <div class="col-sm-4 col-xs-6">
      	<div class="panel panel-default">
          <div class="panel-thumbnail"><img src="//placehold.it/450X300/DD66DD/EE77EE" class="img-responsive"></div>
          <div class="panel-body">
            <p class="lead">Bootstrap Templates</p>
            <p>902 Followers, 88 Posts</p>

            <p>
              <img src="http://api.randomuser.me/portraits/med/men/4.jpg" width="28px" height="28px">
              <img src="http://api.randomuser.me/portraits/med/men/24.jpg" width="28px" height="28px">
            </p>
          </div>
        </div>
      </div><!--/col-->

      <div class="col-sm-4 col-xs-6">
      	<div class="panel panel-default">
          <div class="panel-thumbnail"><img src="//placehold.it/450X300/2222DD/2222EE" class="img-responsive"></div>
          <div class="panel-body">
            <p class="lead">Social Media</p>
            <p>19k Followers, 789 Posts</p>

            <p>
              <img src="http://api.randomuser.me/portraits/med/women/4.jpg" height="28px">
              <img src="http://api.randomuser.me/portraits/med/men/4.jpg" width="28px" height="28px">
            </p>
          </div>
        </div>
      </div><!--/col-->

  	</div>

  	<hr>

  	{{--<div class="row">--}}
  		{{--<div class="col-md-12"><h2>Playground</h2></div>--}}
        {{--<div class="col-md-12">--}}
          {{--<div class="alert alert-info alert-dismissable">--}}
              {{--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>--}}
              {{--<strong>Heads up!</strong> This alert needs your attention, but it's not super important.--}}
          {{--</div>--}}
        {{--</div>--}}
    	{{--<div class="col-md-6 col-sm-6">--}}
    	{{--<div class="panel panel-default">--}}
           {{--<div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>Buttons &amp; Labels</h4></div>--}}
   			{{--<div class="panel-body">--}}
              {{--<div class="row">--}}
                {{--<div class="col-xs-4"><a class="btn btn-default center-block" href="#">Button</a></div>--}}
                {{--<div class="col-xs-4"><a class="btn btn-primary center-block" href="#">Primary</a></div>--}}
                {{--<div class="col-xs-4"><a class="btn btn-danger center-block" href="#">Danger</a></div>--}}
              {{--</div>--}}
              {{--<br>--}}
              {{--<div class="row">--}}
                {{--<div class="col-xs-4"><a class="btn btn-warning center-block" href="#">Warning</a></div>--}}
                {{--<div class="col-xs-4"><a class="btn btn-info center-block" href="#">Info</a></div>--}}
                {{--<div class="col-xs-4"><a class="btn btn-success center-block" href="#">Success</a></div>--}}
              {{--</div>--}}
              {{--<hr>--}}
              {{--<div class="btn-group btn-group-sm"><button class="btn btn-default">1</button><button class="btn btn-default">2</button><button class="btn btn-default">3</button></div>--}}
              {{--<hr>--}}
              {{--<div class="row">--}}
              {{--<div class="col-md-4">--}}
                {{--<span class="label label-default">Label</span>--}}
                {{--<span class="label label-success">Success</span>--}}

              {{--</div>--}}
              {{--<div class="col-md-4">--}}
              	{{--<span class="label label-warning">Warning</span>--}}
                {{--<span class="label label-info">Info</span>--}}
              {{--</div>--}}
              {{--<div class="col-md-4">--}}
                {{--<span class="label label-danger">Danger</span>--}}
                {{--<span class="label label-primary">Primary</span>--}}
                {{--</div>--}}
              {{--</div>--}}

            {{--</div>--}}
         {{--</div>--}}
    {{--</div>--}}
     {{--<div class="col-md-6 col-sm-6">--}}
    	{{--<div class="panel panel-default">--}}
           {{--<div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>Progress Bars</h4></div>--}}
   			{{--<div class="panel-body">--}}

              {{--<div class="progress">--}}
                {{--<div class="progress-bar progress-bar-info" style="width: 20%"></div>--}}
              {{--</div>--}}
              {{--<div class="progress">--}}
                {{--<div class="progress-bar progress-bar-success" style="width: 40%"></div>--}}
              {{--</div>--}}
              {{--<div class="progress">--}}
                {{--<div class="progress-bar progress-bar-warning" style="width: 80%"></div>--}}
              {{--</div>--}}
              {{--<div class="progress">--}}
                {{--<div class="progress-bar progress-bar-danger" style="width: 50%"></div>--}}
              {{--</div>--}}

            {{--</div>--}}
         {{--</div>--}}
    {{--</div>--}}
     {{--<div class="col-md-6 col-sm-6">--}}
    	{{--<div class="panel panel-default">--}}
           {{--<div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>Tabs</h4></div>--}}
   			{{--<div class="panel-body">--}}

                {{--<ul class="nav nav-tabs">--}}
                  {{--<li class="active"><a href="#A" data-toggle="tab">Section 1</a></li>--}}
                  {{--<li><a href="#B" data-toggle="tab">Section 2</a></li>--}}
                  {{--<li><a href="#C" data-toggle="tab">Section 3</a></li>--}}
                {{--</ul>--}}
                {{--<div class="tabbable">--}}
                  {{--<div class="tab-content">--}}
                    {{--<div class="tab-pane active" id="A">--}}
                      {{--<div class="well well-sm">I'm in Section A.</div>--}}
                    {{--</div>--}}
                    {{--<div class="tab-pane" id="B">--}}
                      {{--<div class="well well-sm">Howdy, I'm in Section B.</div>--}}
                    {{--</div>--}}
                    {{--<div class="tab-pane" id="C">--}}
                      {{--<div class="well well-sm">I've decided that I like wells.</div>--}}
                    {{--</div>--}}
                  {{--</div>--}}
                {{--</div> <!-- /tabbable -->--}}

                {{--<div class="col-sm-12 text-center">--}}
                  {{--<ul class="pagination center-block" style="display:inline-block;">--}}
                    {{--<li><a href="#">«</a></li>--}}
                    {{--<li><a href="#">1</a></li>--}}
                    {{--<li><a href="#">2</a></li>--}}
                    {{--<li><a href="#">3</a></li>--}}
                    {{--<li><a href="#">4</a></li>--}}
                    {{--<li><a href="#">5</a></li>--}}
                    {{--<li><a href="#">»</a></li>--}}
                  {{--</ul>--}}
                {{--</div>--}}

            {{--</div>--}}
         {{--</div>--}}
    {{--</div><!--playground-->--}}

    <br>

    <div class="clearfix"></div>

    <hr>
    <div class="col-md-12 text-center"><p><a href="#" target="_ext">Made By Varun Shrivastava</a><br>&copy;VS Productions</p></div>
    <hr>

  </div>
</div><!--/main-->

<!--login modal-->
{{--<div id="loginModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">--}}
  {{--<div class="modal-dialog">--}}
  {{--<div class="modal-content">--}}
      {{--<div class="modal-header">--}}
          {{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>--}}
          {{--<h2 class="text-center"><img src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=100" class="img-circle"><br>Login</h2>--}}
      {{--</div>--}}
      {{--<div class="modal-body">--}}
          {{--<form class="form col-md-12 center-block">--}}
            {{--<div class="form-group">--}}
              {{--<input type="text" class="form-control input-lg" placeholder="Email">--}}
            {{--</div>--}}
            {{--<div class="form-group">--}}
              {{--<input type="password" class="form-control input-lg" placeholder="Password">--}}
            {{--</div>--}}
            {{--<div class="form-group">--}}
              {{--<button class="btn btn-primary btn-lg btn-block">Sign In</button>--}}
              {{--<span class="pull-right"><a href="#">Register</a></span><span><a href="#">Need help?</a></span>--}}
            {{--</div>--}}
          {{--</form>--}}
      {{--</div>--}}
      {{--<div class="modal-footer">--}}
          {{--<div class="col-md-12">--}}
          {{--<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>--}}
		  {{--</div>--}}
      {{--</div>--}}
  {{--</div>--}}
  {{--</div>--}}
</div>

@include('_postsModal')


@endsection