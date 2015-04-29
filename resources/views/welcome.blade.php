<?php
$title="Campus Guru";
?>
@extends('master')
@section('links')
{!! Html::style('css/welcome.css') !!}
{!! Html::script('js/myjs.js') !!}

@endsection

@section('content')
		<div class="container">
		@if(Session::get("flash_message"))
		    <div class="alert-info">
		        <span id="message" style="">{{ Session::get("flash_message") }}</span>
		    </div>
		@endif
		 <div class="row">
		<a href="#register_section">
			<div class="content">

			    {!! Html::image("static/main-logo.png", "Logo") !!}
				<div class="title">Campus Guru</div>
				<div class="quote">{{ Inspiring::quote() }}</div>
				<p id="click_here">Click to start...</p>
			</div>
	    </a>

		 </div>

		<div class="row">
		                                    <a name="register_section"></a>
		    <div class="col-md-3"></div>

            <div class="register col-md-6">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="h2">Join Campus Guru</div>
                </div>

                <div class="panel-body">
                {!! Form::open(["route"=>["register"], "method"=>"put", "role"=>"form", "id"=>"reg_form"]) !!}
                                        <div class="form-group">
                                            <label for="name">Full Name</label>
                                            <input type="text" name="name" class="form-control" id="name_input"
                                                placeholder="Enter Your full name here"
                                                >
                                            <div class="alert-info" id="help_block" style="display: none; font-family: cursive, 'Lobster'">
                                                Please provide the correct name as this will be displayed in your profile
                                            </div>
                                        </div>
                                      <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" name="username" class="form-control" placeholder="Unique Username" />
                                      </div>
                                      <div class="form-group">
                                        <label for="email">Email address</label>
                                        <input type="email" name="email" class="form-control" id="email_input" placeholder="Enter email">
                                      </div>
                                      <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" class="form-control" id="input_password" placeholder="Password">
                                      </div>
                                      <div class="form-group">
                                        <label for="college">College/School</label>
                                        <input type="text" name="college" id="input_college" class="form-control" placeholder="Enter College/School Name">
                                      </div>
                                      <div class="form-group">
                                        <label for="branch">Choose your branch below</label>
                                        <select class="form-control" name="branch" id="input_branch">
                                            <option value="null">select here...</option>
                                            <option value="mech">Mechanical</option>
                                            <option value="ec">Electronics and Communication</option>
                                            <option value="cs">Computer Science</option>
                                            <option value="it">Information Technology</option>
                                            <option value="ex">Elex</option>
                                            <option value="civil">Civil</option>
                                            <option value="auto">Automobile</option>
                                            <option value="other"><span id="other_html">Other</span> </option>
                                        </select>
                                      </div>
                                      <button type="submit" class="btn btn-lg btn-primary">Register </button>
                                      <br>
                                      <a href="#login">Already have an account. Click Here...</a>
                                {!! Form::close() !!}
                </div>
            </div>

            </div>
            <div class="col-md-3"></div>
		</div>

		<div class="row" style="margin-top: 200px;">

		    <div class="col-md-3"></div>

		    <div class="col-md-6">
		        <div class="panel panel-primary">
                					<div class="panel-heading">
                						<strong class="h2"> Sign in to continue</strong>
                					</div>
                					<div class="panel-body">
                					{!! Form::open(['route'=>["login"], 'method'=>'put', 'role'=>'form']) !!}
                                        <fieldset>
                                        								<div class="row">
                                        									<div class="center-block">
                                        										<img class="profile-img img-circle"
                                        											src="http://t2.ftcdn.net/jpg/00/15/54/19/240_F_15541951_9WSwjK2fUP2XDO2YA7qn5DesVT7ro2vo.jpg" alt="">
                                        									</div>
                                        								</div>
                                        								<div class="row">
                                        									<div class="col-sm-12 col-md-10  col-md-offset-1 ">
                                        										<div class="form-group">
                                        											<div class="input-group">
                                        												<span class="input-group-addon">
                                        													<i class="glyphicon glyphicon-user"></i>
                                        												</span>
                                        												<input class="form-control" placeholder="Username Or Email" name="username" type="text">
                                        											</div>
                                        										</div>
                                        										<div class="form-group">
                                        											<div class="input-group">
                                        												<span class="input-group-addon">
                                        													<i class="glyphicon glyphicon-lock"></i>
                                        												</span>
                                        												<input class="form-control" placeholder="Password" name="password" type="password" value="">
                                        											</div>
                                        										</div>
                                        										<div class="form-group">
                                        											<input type="submit" class="btn btn-lg btn-primary btn-block" value="Sign in">
                                        										</div>
                                        									</div>
                                        								</div>
                                        							</fieldset>
		                            {!! Form::close() !!}
		                </div>
		                <div class="panel-footer ">
                        						Don't have an account!<br> <a href="#register_section"> Sign Up Here </a>
                        </div>
		            </div>
		        </div>
    <a name="login"></a>
		    </div>

		    <div class="col-md-3"></div>
		</div>





		</div><!-- Container ends here -->
@stop
