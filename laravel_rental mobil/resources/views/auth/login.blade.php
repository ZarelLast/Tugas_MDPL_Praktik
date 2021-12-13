@extends('layouts.app')

@section('login')

<div class="container col-md-3">
    <div class="col d-flex justify-content-center">
        <div class="col my-5 py-5">
        <div class="login-logo">
        <a><b>Login</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <form action="{{ route('login') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        @if ($errors->has('email'))
                            <div class="alert alert-danger">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                        <div class="col-md-12">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Email Address">
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            <input id="password" type="password" class="form-control" name="password" required placeholder="Password ">

                            @if ($errors->has('password'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="checkbox icheck">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Log In</button>
                        </div>
                    </div>
                </form>
                <div class="row pt-2">
                    <div class="col-12">
                        <a class="btn btn-success btn-block btn-flat" href="{{route('register')}}">Daftar</a>
                    </div>
                </div>
            </div>
        <!-- /.login-card-body -->
        </div>
        </div>
    </div>
</div>


@endsection
