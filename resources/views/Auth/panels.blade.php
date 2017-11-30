@extends('master')

@section('content')
    <div class="container">

        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email">E-Mail Address</label>

                <input id="email"
                       type="email"
                       class="form-control"
                       name="email"
                       value="{{ old('email') }}"
                       placeholder="email"
                       required
                       autofocus>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password">Password</label>

                <input id="password"
                       type="password"
                       class="form-control"
                       placeholder="senha"
                       name="password"
                       required>

                @if ($errors->has('password'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                @endif
            </div>

            <div class="form-group">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember
                        Me
                    </label>
                </div>
            </div>

            <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-caridadeonline">
                        Login
                    </button>

                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        Forgot Your Password?
                    </a>
            </div>


            @include('Template.partials.socials-icons')

        </form>

    </div>
@endsection
