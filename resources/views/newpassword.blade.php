@extends('master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Enter a new password
                </div>
                <div class="panel-body">
                {!! Form::open(array('route'=>'recoverPassword') ) !!}
                    <input type="password" class="form-control" id="new_password" name="newPassword" placeholder="new password">
                    <input type="password" class="form-control" id="new_password_repeat" name="newPasswordRepeat" placeholder="repeat password">
                {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>

@endsection