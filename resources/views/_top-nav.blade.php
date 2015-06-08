<nav class="navbar navbar-fixed-top header">
 	<div class="col-md-12">
        <div class="navbar-header">

          <a href="{{ route("home") }}" class="navbar-brand">Campus Guru</a>
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse1">
          <i class="glyphicon glyphicon-search"></i>
          </button>

        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse1">
          {!! Form::open(["route"=>["_searchUsername"], 'method'=>"PUT" ,'class'=>"navbar-form pull-left", 'id'=>"searchForm" ]) !!}
              <div class="input-group" style="max-width:470px;">
                <input type="text" class="form-control" autocomplete="off" placeholder="Search" name="searchTerm" id="srch-term">
                <div class="help-block"  style="z-index: -1;" id="search_result_parent_div">
                    <ul id="search_result" class="list-group">

                    </ul>
                    <!-- Ajax search contents will be loaded here -->
                </div>
                <div class="input-group-btn">
                  <button class="btn btn-default btn-primary" type="submit" id="submitBtn"><i class="glyphicon glyphicon-search"></i></button>
                </div>
              </div>
          {!! Form::close() !!}
          <ul class="nav navbar-nav navbar-right">
             <li>@if(isset($userImage[0]))<a href="{{ route("profile") }}" class="pull-right">{!! Html::image($userImage[0]['image_url'],"dp",['title'=>'profile_image', 'class'=>'img img-responsive img-rectangle', 'style'=>'height: 25px;']) !!}</a> @endif</li>
             <li><a href="{{ route("profile") }}" >Profile</a></li>
             <li>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-th-large"></i></a>
                <ul class="dropdown-menu">
                  <li><a href="{{ route('askQuestion') }}" class="dropdown_link">Ask Question</a></li>
                  <li class="nav-divider"></li>
                  <li><a href="{{ route('startDiscussion') }}" class="dropdown_link">Start Discussion</a></li>
                  <li class="nav-divider"></li>
                  <li><a href="{{ route('viewAllQuestions') }}" class="dropdown_link"><span class="badge pull-right"></span>All Questions</a></li>
                  <li class="nav-divider"></li>
                  <li><a href="{{ route('viewAllDiscussion') }}" class="dropdown_link"><span class="label label-info pull-right"></span>All Discussions</a></li>
                  <li class="nav-divider"></li>
                  <li><a href="{{ route('viewAllComplains') }}" class="dropdown_link"><span class="badge pull-right"></span>All Complains</a></li>
                  <li class="nav-divider"></li>
                  <li><a href="{{ route('viewAllConfessions') }}" class="dropdown_link"><span class="badge pull-right"></span>All Confessions</a></li>
                </ul>
             </li>

             <!-- Notification for questions and discussions -->
             <li>
                <a href="#" id="notification_toggle" class="dropdown-toggle @if(isset($notifications[0])) {{ 'bg-danger' }} @else {{ 'bg-success' }} @endif" data-toggle="dropdown"><i class="glyphicon glyphicon-bell">
                     @if(isset($notifications[0]))
                    <span class="badge">
                            {{ count($notifications) }}
                    </span>
                    @endif
                </i></a>

                @if(isset($notifications[0]))
                <ul class="dropdown-menu">
                  @foreach($notifications as $n)
                    @if(intval($n->n_for) == 1)
                    <li><a href="{{ route('show', ["id"=>$n->n_id_of, "title"=>"answered to the question number ".$n->n_id_of]) }}" class="dropdown_link"><span class="label label-info pull-right"></span><strong>{{ $n->n_by }}</strong> answered your question</a></li>
                     <li class="nav-divider"></li>
                    @elseif($n->n_for == 2)
                    <li><a href="{{ route('singleDiscussion', ["id"=>$n->n_id_of, "title"=>"discussion number ".$n->n_id_of]) }}" class="dropdown_link"><span class="label label-info pull-right"></span><strong>{{ $n->n_by }}</strong> replied on your discussion</a></li>
                    <li class="nav-divider"></li>
                    @elseif($n->n_for == 21)
                    <li><a href="{{ route('singleDiscussion', ["id"=>$n->n_id_of, "title"=>"Reply on discussion number ".$n->n_id_of]) }}" class="dropdown_link"><span class="label label-info pull-right"></span><strong>{{ $n->n_by }}</strong> replied on this discussion you previously replied to.</a></li>
                    <li class="nav-divider"></li>
                    @elseif($n->n_for == 3)
                    <li><a href="{{ route('singleMessage', $n->n_id_of) }}" class="dropdown_link"><span class="label label-info pull-right"></span><strong>{{ $n->n_by }}</strong> messaged you</a></li>
                    <li class="nav-divider"></li>
                    @elseif($n->n_for == 4)
                    <li><a href="{{ route('show', ["id"=>$n->n_id_of, "title"=>"Comment on the answer with question number ".$n->n_id_of]) }}" class="dropdown_link"><span class="label label-info pull-right"></span><strong>{{ $n->n_by }}</strong> commented on your answer</a></li>
                    <li class="nav-divider"></li>
                    @elseif($n->n_for == 41)
                    <li><a href="{{ route('show', ["id"=>$n->n_id_of, "title"=>"Comment on the comment with question number ".$n->n_id_of]) }}" class="dropdown_link"><span class="label label-info pull-right"></span><strong>{{ $n->n_by }}</strong> commented on your comment on this question</a></li>
                    <li class="nav-divider"></li>
                    @endif
                  @endforeach
                </ul>
                @endif
             </li>

            <!-- Notification ends here -->

             <li><a href="{{ route('logout') }}"><i class="glyphicon glyphicon-log-out"></i></a></li>
           </ul>
        </div>
     </div>
</nav>
<div class="navbar navbar-default" id="subnav">
    <div class="col-md-12">
        <div class="navbar-header">

          <a href="#" style="margin-left:15px;" class="navbar-btn btn btn-default btn-plus dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-home" style="color:#dd1111;"></i> Home <small><i class="glyphicon glyphicon-chevron-down"></i></small></a>
          <ul class="nav dropdown-menu">
              <li><a href="{{route("profile")}}"><i class="glyphicon glyphicon-user" style="color:#1111dd;"></i> Profile</a></li>
              <li><a href="{{ route("home") }}"><i class="glyphicon glyphicon-dashboard" style="color:#0000aa;"></i> Home</a></li>

              <li class="nav-divider"></li>
              <li><a href="#"><i class="glyphicon glyphicon-cog" style="color:#dd1111;"></i> Settings</a></li>
              <li><a href="{{ route("logout") }}"><i class="glyphicon glyphicon-log-out" style="color:#11dd11;"></i> Logout</a></li>
          </ul>


          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse2">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          </button>

        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse2">
          <ul class="nav navbar-nav navbar-right">
             <li class="{{ $setBlogActive or '' }}"><a href="{{ route('blog') }}">Blogs</a></li>
             <li><a href="#myPostModal" role="button" data-toggle="modal">My Posts</a></li>
           </ul>
        </div>
     </div>
</div>