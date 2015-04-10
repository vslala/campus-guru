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
                <div id="search_result" style="z-index: 9;">

                </div>
                <div class="input-group-btn">
                  <button class="btn btn-default btn-primary" type="submit" id="submitBtn"><i class="glyphicon glyphicon-search"></i></button>
                </div>
              </div>
          {!! Form::close() !!}
          <ul class="nav navbar-nav navbar-right">
             <li><a href="{{ route("profile") }}" >Profile</a></li>
             <li>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-bell"></i></a>
                <ul class="dropdown-menu">
                  <li><a href="{{ route('askQuestion') }}" class="dropdown_link">Ask Question</a></li>
                  <li class="nav-divider"></li>
                  <li><a href="{{ route('startDiscussion') }}" class="dropdown_link">Start Discussion</a></li>
                  <li class="nav-divider"></li>
                  <li><a href="{{ route('viewAllQuestions') }}" class="dropdown_link"><span class="badge pull-right"></span>All Questions</a></li>
                  <li class="nav-divider"></li>
                  <li><a href="{{ route('askQuestion') }}" class="dropdown_link"><span class="label label-info pull-right"></span>All Discussions</a></li>
                  <li class="nav-divider"></li>
                  <li><a href="{{ route('viewAllComplains') }}" class="dropdown_link"><span class="badge pull-right"></span>All Complains</a></li>
                  <li class="nav-divider"></li>
                  <li><a href="{{ route('viewAllConfessions') }}" class="dropdown_link"><span class="badge pull-right"></span>All Confessions</a></li>
                </ul>
             </li>
             <li><a href="#" id="btnToggle"><i class="glyphicon glyphicon-th-large"></i></a></li>
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