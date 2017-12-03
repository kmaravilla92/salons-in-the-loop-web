@extends('frontsite.master')

@section('content')
    <style>
        .contact-content .form-holder ul .input-holder {width: 50%; margin: 15px auto;}
    </style>
    <section id="main-wrapper" class="inner about">
        <div class="title-holder">
            <div class="wrapper">
                <h3>Reset password</h3>
            </div>
        </div>
        <div class="wrapper">
            <div class="content-section contact-content">
                <h5>Reset password</h5>
                <div class="form-holder">
                    <form class="form-horizontal ajaxify" role="form" method="POST" action="{{ url('/password/reset') }}" data-validation-rules="forgot_password_rules">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">
                        <ul class="clearfix">
                            <li class="input-holder{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" placeholder="E-mail Address" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </li>

                            <li class="input-holder{{ $errors->has('password') ? ' has-error' : '' }}">
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </li>

                            <li class="input-holder{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>

                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </li>
                        </ul>
                        <div class="btn-holder">
                            <button class="btn btn-blue">RESET PASSWORD</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
