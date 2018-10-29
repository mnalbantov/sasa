@extends('layouts.app')

@section('content')
    <section class="clearfix user-page">


<div  class="container">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Вход</div>
                <div class="panel-body">
                    <div class="text-center">
                        <a href="{{ route ('login.fb') }}" class="btn btn-info"><i class="fa fa-facebook-official"></i>&nbsp;&nbsp;Вход с Facebook</a>
                    </div>
                    <br>
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail адрес</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

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
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Запомни Ме
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                    Вход
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                   Забравих си паролата?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="text-center">
                <span>Нямаш профил?</span>
                <a href="{{ route ('register') }}" class="btn-primary">Създай нов акаунт</a>
            </div>
        </div>
    </div>
</div>
    </section>
@endsection
