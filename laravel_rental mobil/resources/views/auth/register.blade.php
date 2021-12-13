@extends('layouts.app')

@section('register')

<div class="container col-md-3">
    <div class="col d-flex justify-content-center">
        <div class="col my-5 py-5">
            <div class="login-logo">
                <a><b>Register</b></a>
            </div>
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('nik') ? ' has-error' : '' }}">
                        <label for="nik" class="col-6 control-label">NIK</label>
                        <div class="col-12">
                            <input id="nik" type="text" class="form-control" name="nik" value="{{ old('nik') }}" required autofocus>
                            @if ($errors->has('nik'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nik') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-6 control-label">Name</label>
                        <div class="col-12">
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-6 control-label">E-Mail Address</label>
                        <div class="col-12">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-6 control-label">Password</label>
                        <div class="col-12">
                            <input id="password" type="password" class="form-control" name="password" required>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password-confirm" class="col-6 control-label">Confirm Password</label>
                        <div class="col-12">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-12">
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

@endsection


