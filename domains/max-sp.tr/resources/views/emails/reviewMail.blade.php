@component('mail::message')
# Отзыв о проекте

<strong>Имя пользователя:</strong> {{ $data['username'] }} <br>
<strong>Адресс проекта:</strong> {{ $data['address'] }}<br>
<strong>Текст отзыва:</strong> {{ $data['review_text'] }}

@component('mail::button', ['url' => env('APP_URL')])
Открыть сайт
@endcomponent
@endcomponent
