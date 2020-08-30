@component('mail::message')
# Для вас был создан личный кабинет на сайте {{ env('APP_URL') }}

<p>Данные для входа:</p>
<strong>Email:</strong> {{ $data['email'] }} <br>
<strong>Пароль:</strong> {{ $data['password'] }}<br>

@component('mail::button', ['url' => env('APP_URL')])
Открыть сайт
@endcomponent
@endcomponent
