@extends('layouts.admin_app')

@section('content')
    <form action="{{ route('save-user') }}" method="post">
        @csrf
    <div class="container mt-5">
        <div class="form-group">
            <label for="name">Введите имя нового пользователя</label>
            <input type="text" name="name" placeholder="Введите имя" id="name" value="{{ old('name') }}" class="form-control">

            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="name">Введите телефон нового пользователя</label>
            <input type="text" name="phone" placeholder="Введите телефон" id="phone" value="{{ old('phone') }}" class="form-control">

            @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="name">Введите email нового пользователя</label>
            <input type="text" name="email" placeholder="Введите Email" value="{{ old('email') }}" id="email" class="form-control">

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="name">Введите пароль</label>
            <input type="text" name="password" placeholder="Введите пароль" id="password" class="form-control">

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="name">Подтвердите пароль</label>
            <input type="text" name="password_confirmation" placeholder="Подтвердите пароль" id="confirm" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Добавить пользователя</button>
    </div>
    </form>
@endsection