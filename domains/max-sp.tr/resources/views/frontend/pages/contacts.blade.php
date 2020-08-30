@extends('layouts.app')

@section('content')
    <div class="text-page-main contacts-page">
    <div class="container">
        <div class="padleft-200">
            <h1>Мы всегда<br>
                <span class="yellow">на связи</span>
            </h1>
            <div class="contacts">
                <div class="contacts-item">
                    <span>Телефон</span>
                    <p><a href="tel:+73952653145">+7 (3952) 65 31 45</a></p>
                </div>
                <div class="contacts-item">
                    <span>Адрес</span>
                    <p>г. Иркутск, ул. Розы Люксембург 180, оф. 15</p>
                </div>
                <div class="contacts-item">
                    <span>Email</span>
                    <p><a href="mailto:Mk@vskompozit.ru">Mk@vskompozit.ru</a></p>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="map wow fadeIn">
        <div class="container">
            <iframe
                    src="https://yandex.ru/map-widget/v1/?um=constructor%3A4e664b9f4892fc1d14d1b4f068d156519efc84a25454df8d6ea8d71824ad8722&amp;source=constructor"
                    width="100%" height="500" frameborder="0"></iframe>
        </div>
    </div>


    <div class="order wow fadeIn" id="order">
        <div class="container">
            <div class="padleft-200">
                <div class="form-block">
                    <h2>Оставить заявку</h2>
                    <form class="form">
                        <input type="hidden" name="theme" value="Заявка с главной">
                        <div class="flex-box space-between">
                            <div class="form-row">
                                <input type="text" id="user_name" name="user_name" placeholder="Ваше имя" />
                            </div>
                            <div class="form-row">
                                <input type="text" id="user_phone" name="user_phone" placeholder="Телефон"
                                       required="" />
                            </div>
                        </div>
                        <div class="form-row form-row_policy">
                            <input type="checkbox" name="policy" id="policy_check"
                                   value="Я согласен(-на) с политикой обработки персональных данных" required="">
                            <span class="psevdo-checkbox"></span>
                            <label class="label" for="policy_check">Я согласен(-на) с <a class="magnific"
                                                                                         href="#policy">политикой
                                    обработки персональных данных</a></label>
                        </div>
                        <input class="btn" type="submit" value="Отправить" />
                    </form>
                </div>
            </div>
        </div>

        <div class="order-result" style="display: none">
            <div class="container">
                <div class="padleft-200">
                    <h2>Спасибо за заявку</h2>
                    <p>В ближайшее время с вами свяжется наш менеджер</p>
                </div>
            </div>
        </div>
    </div>
    <div style="display: none">
        <div class="policy" id="policy">
            <h2>Политика конфиденциальности</h2>
            <p><a href="https://teplyy-pol.ru/">https://teplyy-pol.ru/</a> (далее Сайт или Администрация) обязуется
                сохранять Вашу конфиденциальность в сети Интернет.
                Настоящая Политика Конфиденциальности, рассказывает о том, как собираются, обрабатываются и хранятся
                Ваши
                личные
                данные. Администрация уделяет большое внимание защите личной информации пользователей. Пользуясь сайтом,
                пользователь тем самым дает согласие на применение правил сбора и использования данных, изложенных в
                настоящем
                документе.</p>
            <h3>1. Общие положения</h3>
            <p>
                Настоящая политика обработки персональных данных составлена в соответствии с требованиями Федерального
                закона от
                27.07.2006. №152-ФЗ «О персональных данных» и определяет порядок обработки персональных данных и меры по
                обеспечению безопасности персональных данных, предпринимаемые ООО «ВостСибКомпозит» (далее – Оператор).
            </p>
            <p>Оператор ставит своей важнейшей целью и условием осуществления своей деятельности соблюдение прав и
                свобод
                человека и гражданина при обработке его персональных данных, в том числе защиты прав на
                неприкосновенность
                частной жизни, личную и семейную тайну.
            </p>
            <p>Настоящая политика Оператора в отношении обработки персональных данных (далее – Политика) применяется ко
                всей информации, которую Оператор может получить о посетителях веб-сайта http://teplyy-pol.ru/.
            </p>
            <h3>2. Основные понятия, используемые в Политике</h3>
            <p>Автоматизированная обработка персональных данных – обработка персональных данных с помощью средств
                вычислительной
                техники;</p>
            <p>Блокирование персональных данных – временное прекращение обработки персональных данных (за исключением
                случаев,
                если обработка необходима для уточнения персональных данных);</p>
            <p>Веб-сайт – совокупность графических и информационных материалов, а также программ для ЭВМ и баз данных,
                обеспечивающих их доступность в сети интернет по сетевому адресу <a
                        href="https://teplyy-pol.ru/">https://teplyy-pol.ru/</a>;
            </p>
            <p>Информационная система персональных данных — совокупность содержащихся в базах данных персональных
                данных, и
                обеспечивающих их обработку информационных технологий и технических средств;</p>
            <p>Обезличивание персональных данных — действия, в результате которых невозможно определить без
                использования
                дополнительной информации принадлежность персональных данных конкретному Пользователю или иному субъекту
                персональных данных;</p>
            <p>Обработка персональных данных – любое действие (операция) или совокупность действий (операций),
                совершаемых с
                использованием средств автоматизации или без использования таких средств с персональными данными,
                включая
                сбор,
                запись, систематизацию, накопление, хранение, уточнение (обновление, изменение), извлечение,
                использование,
                передачу (распространение, предоставление, доступ), обезличивание, блокирование, удаление, уничтожение
                персональных данных;</p>
            <p>Оператор – государственный орган, муниципальный орган, юридическое или физическое лицо, самостоятельно
                или
                совместно с другими лицами организующие и (или) осуществляющие обработку персональных данных, а также
                определяющие цели обработки персональных данных, состав персональных данных, подлежащих обработке,
                действия
                (операции), совершаемые с персональными данными;</p>
            <p>Персональные данные – любая информация, относящаяся прямо или косвенно к определенному или определяемому
                Пользователю веб-сайта <a href="https://teplyy-pol.ru/">https://teplyy-pol.ru/</a>;</p>
            <p>Пользователь – любой посетитель веб-сайта <a href="https://teplyy-pol.ru/">https://teplyy-pol.ru/</a>;
            </p>
            <p>Предоставление персональных данных – действия, направленные на раскрытие персональных данных
                определенному
                лицу
                или определенному кругу лиц;</p>
            <p>Распространение персональных данных – любые действия, направленные на раскрытие персональных данных
                неопределенному кругу лиц (передача персональных данных) или на ознакомление с персональными данными
                неограниченного круга лиц, в том числе обнародование персональных данных в средствах массовой
                информации,
                размещение в информационно-телекоммуникационных сетях или предоставление доступа к персональным данным
                каким-либо иным способом;</p>
            <p>Трансграничная передача персональных данных – передача персональных данных на территорию иностранного
                государства
                органу власти иностранного государства, иностранному физическому или иностранному юридическому лицу;</p>
            <p>Уничтожение персональных данных – любые действия, в результате которых персональные данные уничтожаются
                безвозвратно с невозможностью дальнейшего восстановления содержания персональных данных в информационной
                системе
                персональных данных и (или) результате которых уничтожаются материальные носители персональных данных.
            </p>
            <h3>Оператор может обрабатывать следующие персональные данные Пользователя:</h3>
            <p>Фамилия, имя, отчество;<br>
                Электронный адрес;<br>
                Номера телефонов;
            </p>
            <p>Также на сайте происходит сбор и обработка обезличенных данных о посетителях (в т.ч. файлов «cookie») с
                помощью
                сервисов интернет-статистики (Яндекс Метрика и Гугл Аналитика и других).</p>
            <p>Вышеперечисленные данные далее по тексту Политики объединены общим понятием Персональные данные.</p>
            <h3>4. Цели обработки персональных данных</h3>
            <p>Цель обработки персональных данных Пользователя — заключение, исполнение и прекращение
                гражданско-правовых
                договоров.</p>
            <p>Также Оператор имеет право направлять Пользователю уведомления о новых продуктах и услугах, специальных
                предложениях и различных событиях. Пользователь всегда может отказаться от получения информационных
                сообщений,
                направив Оператору письмо на адрес электронной почты <a
                        href="mailto:mk@vskompozit.ru">mk@vskompozit.ru</a>
                с пометкой «Отказ от уведомлениях о
                новых продуктах и услугах и специальных предложениях».</p>
            <p>Обезличенные данные Пользователей, собираемые с помощью сервисов интернет-статистики, служат для сбора
                информации
                о действиях Пользователей на сайте, улучшения качества сайта и его содержания.</p>
            <h3>5. Правовые основания обработки персональных данных</h3>
            <p>Оператор обрабатывает персональные данные Пользователя только в случае их заполнения и/или отправки
                Пользователем
                самостоятельно через специальные формы, расположенные на сайте <a
                        href="https://teplyy-pol.ru/">https://teplyy-pol.ru/</a>.
                Заполняя соответствующие
                формы и/или отправляя свои персональные данные Оператору, Пользователь выражает свое согласие с данной
                Политикой.</p>
            <p>Оператор обрабатывает обезличенные данные о Пользователе в случае, если это разрешено в настройках
                браузера</p>
            <p>Пользователя (включено сохранение файлов «cookie» и использование технологии JavaScript).</p>
            <h3>6. Порядок сбора, хранения, передачи и других видов обработки персональных данных</h3>
            <p>Безопасность персональных данных, которые обрабатываются Оператором, обеспечивается путем реализации
                правовых,
                организационных и технических мер, необходимых для выполнения в полном объеме требований действующего
                законодательства в области защиты персональных данных.</p>
            <p>Оператор обеспечивает сохранность персональных данных и принимает все возможные меры, исключающие доступ
                к
                персональным данным неуполномоченных лиц.</p>
            <p>Персональные данные Пользователя никогда, ни при каких условиях не будут переданы третьим лицам, за
                исключением
                случаев, связанных с исполнением действующего законодательства.</p>
            <p>В случае выявления неточностей в персональных данных, Пользователь может актуализировать их
                самостоятельно,
                путем
                направления Оператору уведомление на адрес электронной почты Оператора <a
                        href="mailto:mk@vskompozit.ru">mk@vskompozit.ru</a>
                с пометкой
                «Актуализация персональных данных».</p>
            <p>Срок обработки персональных данных является неограниченным. Пользователь может в любой момент отозвать
                свое
                согласие на обработку персональных данных, направив Оператору уведомление посредством электронной почты
                на
                электронный адрес Оператора <a href="mailto:mk@vskompozit.ru">mk@vskompozit.ru</a> с пометкой «Отзыв
                согласия на обработку персональных данных».</p>
            <h3>7. Трансграничная передача персональных данных</h3>
            <p>Оператор до начала осуществления трансграничной передачи персональных данных обязан убедиться в том, что
                иностранным государством, на территорию которого предполагается осуществлять передачу персональных
                данных,
                обеспечивается надежная защита прав субъектов персональных данных.</p>
            <p>Трансграничная передача персональных данных на территории иностранных государств, не отвечающих
                вышеуказанным
                требованиям, может осуществляться только в случае наличия согласия в письменной форме субъекта
                персональных
                данных на трансграничную передачу его персональных данных и/или исполнения договора, стороной которого
                является
                субъект персональных данных.</p>
            <h3>8. Заключительные положения</h3>
            <p>Пользователь может получить любые разъяснения по интересующим вопросам, касающимся обработки его
                персональных
                данных, обратившись к Оператору с помощью электронной почты <a
                        href="mailto:mk@vskompozit.ru">mk@vskompozit.ru</a>.
            </p>
            <p>В данном документе будут отражены любые изменения политики обработки персональных данных Оператором.
                Политика
                действует бессрочно до замены ее новой версией.</p>
            <p>Актуальная версия Политики в свободном доступе расположена в сети Интернет по адресу
                https://teplyy-pol.ru#policy.</p>
        </div>
    </div>
@endsection