   <style>
   .brand-css{
    /*color: #204d74;*/
    font-weight: 700;
    font-family: Tahoma, sans-serif;
   }
   </style>
   <div class="navbar navbar-default navbar-fixed-top" style="margin-top: 0px;">
         <div class="container">
           <div class="navbar-header">
             <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
             </button>
             <a class="navbar-brand brand-css" href="{{ route("index") }}" id="top_home_nav"><span class="brand-name">Campus Guru</span></a>
           </div>
           <div class="collapse navbar-collapse" id="navbar-ex-collapse">
             <ul class="nav navbar-nav navbar-right">
               <li class="{{ $setBlogActive or '' }}">
                 <a href="{{ route('showAllBlogs') }}">Blog</a>
               </li>
               <li class="{{ $setQuestionsActive or '' }}">
                  <a href="{{ route('viewAllQuestions') }}">Questions</a>
               </li>
               <li class="{{ $setDiscussionsActive or '' }}">
                  <a href="{{ route('viewAllDiscussion') }}">Discussions</a>
               </li>
               <li>
                <a href="http://www.campusguru.net/#register_section">Register</a>
               </li>
               <li>
                   <a href="http://www.campusguru.net/#login">Login</a>
               </li>
             </ul>
             <ul class="nav navbar-nav navbar-right">
               <li class="{{ $setHomeActive or '' }}">
                 <a href="{{ route("index") }}">Home</a>
               </li>
               {{--<li class="{{ $setAboutActive or '' }}">--}}
                 {{--<a href="{{ route('about') }}">About</a>--}}
               {{--</li>--}}
             </ul>
           </div>
         </div>
       </div>