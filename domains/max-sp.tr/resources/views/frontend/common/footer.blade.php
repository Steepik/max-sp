<footer class="footer">
    <div class="container">
        <div class="footer-block flex-box space-between">
            <div>
                <a href="/" class="logo"><img src="{{ asset('img/logo.svg') }}"></a>
                <div>г. Иркутск, ул. Розы Люксембург 180, оф.&nbsp;15</div>
            </div>
            <div>
                <p>Контакты</p>
                <a href="tel:+73952653145">+7 (3952) 65 31 45</a>
                <a href="mailto:Mk@vskompozit.ru">Mk@vskompozit.ru</a>
            </div>
            <div>
                <a href="/profile" class="pers">Личный кабинет</a>
                <span>В личном кабинете вы найдёте все документы по вашему проекту</span>
            </div>
        </div>
        <div class="footer-bottom flex-box space-between flex-center">
            <div class="footer-menu">
                <a href="/">Главная</a>
                <a href="/about.html">О компании</a>
                <a href="/service.html">Услуги</a>
                <a href="/projects.html">Проекты</a>
                <a href="/faq.html">Вопрос &ndash; ответ</a>
                <a href="/contacts.html">Контакты</a>
            </div>
            <div>
                <a href="https://rowstudio.ru/" target="_blank">Разработано: ROW STUDIO</a>
                <p>© 2020 ООО «ВостСибКомпозит»</p>
            </div>
        </div>
    </div>
</footer>

@section('scripts')
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/slick.min.js') }}"></script>
<script src="{{ asset('js/wow.min.js') }}"></script>
<script src="{{ asset('js/magnific-popup.min.js') }}"></script>
<script src="{{ asset('js/maskedinput.min.js') }}"></script>
<script src="{{ asset('js/waterwheelCarousel.min.js') }}"></script>
<script src="{{ asset('js/common.js') }}"></script>


<script>
    //анимация в блоке с шагами на главной
    var w_height = $(window).height();
    var steps_pos = $('.steps').offset().top;
    var how_pos = $('.how').offset().top;

    $(window).scroll(function () {
        if ($(this).scrollTop() > steps_pos - w_height + 140) {
            $('.steps').addClass('animate');
        } else if ($(this).scrollTop() < steps_pos - w_height + 140) {
            $('.steps').removeClass('animate');
        }

        if ($(this).scrollTop() > how_pos - w_height + 500) {
            $('.how').addClass('animate');
        } else if ($(this).scrollTop() < how_pos - w_height) {
            $('.how').removeClass('animate');
        }
    });
</script>
@endsection