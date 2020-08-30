@extends('layouts.admin_app')

@section('content')
    <div class="container mt-5">
        @includeWhen(Session::has('success'), 'frontend.admin.common.success-message')

        @forelse($users as $user)
        <div class="alert ">
            <div class="row">
                <div class="col">
                    <h4>{{ $user->name }}</h4>
                    <p>{{ $user->phone }}</p>
                    <p>{{ $user->email }}</p>
                </div>
                <div class="col d-flex user-item">
                    <a href="{{ route('add-project-to-user', $user->id) }}"><button type="button" class="btn btn-info mr-5">Добавить проект</button>
                    </a>
                    <form action="{{ route('delete-user', $user->id) }}" method="post" id="delUser">
                        @csrf
                    <button type="button" class="btn btn-danger" onclick="return confirm('Вы уверены?') ? $('#delUser').submit() : false;">Удалить пользователя</button>
                    </form>
                </div>
            </div>
            <hr>
        </div>
        @empty
        <h4>Нет пользователей</h4>
        @endforelse

    </div>
@endsection