@extends('master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Password Recovery Panel
                    </div>
                    <div class="panel-body">
                        <label for="email">Please enter your email address</label>
                        <input type="email" required="true" name="email" id="email" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>

@endsection