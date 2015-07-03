@extends('master')
@section('links')
<script>
$(document).ready(function(){

});
</script>
@endsection
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="panel panel-default">
            @if(isset($message))
                <div class="panel-heading">

                </div>
                <div class="panel-body">
                    <span class="alert-success">{{ $message or 'Success'}}</span>
                </div>
            @else
                <div class="panel-heading">
                    Enter a new password
                </div>
                <div class="panel-body">
                {!! Form::open(array('route'=>'recoverPassword', 'method'=>'put') ) !!}
                    <input type="hidden" value="{{ $email }}" name="email">
                    <input type="hidden" value="{{ $id }}" name="id">
                    <input type="hidden" value="{{ $username }}" name="username">
                    <input type="password" class="form-control" id="new_password" name="newPassword" placeholder="new password">
                    <input type="password" class="form-control" id="new_password_repeat" name="newPasswordRepeat" placeholder="repeat password">
                    <input type="submit" class="btn btn-primary" value="Reset" id="reset_password_button" name="resetPasswordBtn">
                {!! Form::close() !!}
                </div>
            @endif
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>

@endsection