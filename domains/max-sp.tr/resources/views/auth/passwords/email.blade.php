@extends('layouts.app')

@section('content')
    <div class="login">
        <div class="container">
            <div class="login-block">
                <h2>Восстановление пароля</h2>

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="form-row">
                        <input type="email" value="{{ old('email') }}" id="user_email" name="email" class="@error('email') is-invalid @enderror" placeholder="Email" required="" />

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn">Восстановить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
