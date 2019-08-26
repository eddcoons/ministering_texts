@extends('layouts.app')

@section('content')
<div class="login-wrapper">
    <h1 class="section-heading">Ministering Texts</h1>
    <form method="POST" action="{{ route('login') }}" class="login-form">
        @csrf
        <div>
            <label for="email" class="login-label">{{ __('Username') }}</label>
            <input id="email" type="email" class="login-input @error('username') is-invalid @enderror" name="email" value="{{ old('username') }}" required autocomplete="username" autofocus>
            @error('username')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
        <div>
            <label for="password" class="login-label">{{ __('Password') }}</label>
            <input id="password" type="password" class="login-input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            @error('password')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
        <div>
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="remember">
                {{ __('Remember Me') }}
            </label>
        </div>
        <div>
            <button type="submit" class="login-button">
                {{ __('Login') }}
            </button>
        </div>
    </form>
</div>
@endsection
<style>
    .login-wrapper {
        display: grid;
        grid-template-rows: 100px auto;
        height: 50vh;
        margin-top: 3rem;
    }

    .section-heading {
        color: #343085;
        text-transform: uppercase;
        font-size: 1.8rem;
    }

    .login-form {
        display: grid;
        grid-gap: 10px;
    }

    .login-label {
        text-transform: uppercase;
        font-weight: 500;
        font-size: .7rem;
        display: block;
    }

    .login-input {
        border: solid 1px #000;
        padding: .5rem;
        font-size: 1.2rem;
        font-family: 'Montserrat', Helvetica, Arial, sans-serif;
        color: #343085;
        width: 100%;
    }

    .form-check-label {
        font-size: .8rem;
    }

    .login-button {
        color: #fff;
        font-size: 1.2rem;
        font-weight: 600;
        font-family: 'Montserrat', Helvetica, Arial, sans-serif;
        text-transform: uppercase;
        background: #343085;
        width: 100%;
        padding: 1rem;
        border: none;
        transition: all .3s ease-in-out;
    }

    .login-button:hover {
        cursor: pointer;
        transform: scale(1.1);
        transition: all .3s ease-in-out;
    }

    @media (max-width: 900px) {
    }
</style>
