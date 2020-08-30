<header class="header">
    <div class="container">
        <div class="header-block flex-box space-between flex-center">
            <a class="logo" href="/"><img src="{{ asset('img/logo.svg') }}"></a>
            <div class="menu">
                <a href="/">Главная</a>
                <a href="{{ route('pages', 'about') }}">О компании</a>
                <a href="{{ route('pages', 'services') }}">Услуги</a>
                <a href="{{ route('projects') }}">Проекты</a>
                <a href="{{ route('pages', 'faq') }}">Вопрос &ndash; ответ</a>
                <a href="{{ route('pages', 'contacts') }}">Контакты</a>
                <a class="phone phone_mob" href="tel:+73952653145"> +7 (3952) 65 31 45</a>
            </div>
            <div class="header-right flex-box flex-center">
                <a class="phone" href="tel:+73952653145"> +7 (3952) 65 31 45</a>
                @guest
                    <a href="{{ route('login') }}" class="personal"></a>
                @else
                    <a href="{{ route('login') }}" class="personal nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        @admin
                        <a class="dropdown-item" href="{{ route('admin-panel') }}">Админ панель</a>
                        @else
                        <a class="dropdown-item" href="{{ route('profile') }}">Личный кабинет</a>
                        @endadmin
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Выйти') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                @endguest

                <div>
                    <a href="/en/" class="lang nocurrent">EN</a>
                    <a class="lang">RU</a>
                </div>
                <div class="burger">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    </div>
</header>