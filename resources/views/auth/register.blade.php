@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Full name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('user_type') ? ' has-error' : '' }}">
                            <label for="user_type" class="col-md-4 control-label">I am</label>

                            <div class="col-md-6">
                                <select id="user_type" type="text" class="form-control" name="user_type" onchange="user_type_fields(this.value)" value="{{ old('name') }}" required>
                                        <option disabled selected>teacher or partner</option>
                                        <option value="1">Teacher</option>
                                        <option value="2">Partner</option>

                                </select>
                               
                                @if ($errors->has('user_type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('user_type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div style="display:none;" id="faculty_div" class="form-group{{ $errors->has('faculty') ? ' has-error' : '' }}">
                            <label for="faculty" class="col-md-4 control-label">Faculty</label>
                            <!-- opt-->
                            <div class="col-md-6">
                                <input id="faculty" class="form-control" name="faculty" value="{{ old('faculty') }}">

                                @if ($errors->has('faculty'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('faculty') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div style="display:none;" id="orgName_div" class="form-group{{ $errors->has('org_name') ? ' has-error' : '' }}">
                            <label for="org_name" class="col-md-4 control-label">organization name</label>
                            
                            <div class="col-md-6">
                                <input id="org_name" class="form-control" name="org_name" value="{{ old('org_name') }}">

                                @if ($errors->has('org_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('org_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                         <div style="display:none;" id="orgLocation_div" class="form-group{{ $errors->has('org_location') ? ' has-error' : '' }}">
                            <label for="org_location" class="col-md-4 control-label">organization location</label>

                            <div class="col-md-6">
                                <input id="org_location"  class="form-control" name="org_location" value="{{ old('org_location') }}">

                                @if ($errors->has('org_location'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('org_location') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
