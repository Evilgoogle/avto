@extends('layouts.app')

@section('app_content')

    <?php $available = [
        0 => (object)[
            'id' => 1,
            'title' => 'Без скрытых комиссий',
            'desc' => 'Блал бла текст у нас комиссий нет и без скрытых до 5,8% в месяц и ниже',
        ],
        1 => (object)[
            'id' => 1,
            'title' => 'Без ограничений',
            'desc' => 'Пользуйтесь автомобилем без ограничений. У нас не тограничений даже для поездок за границу. Хоть куда хоть туда',
        ],
        2 => (object)[
            'id' => 1,
            'title' => 'Без справок',
            'desc' => 'Ускоренное получение займа. Вам нобходмио иметь лишь следуюшие документы сс собой - документы. Оформлятеся за 10-15 минут',
        ],
    ];

    $docs = [
        0 => (object)[
            'id' => 1,
            'title' => 'Удостоворение личности владельца ТС',
            'image' => 'avai_1.png',
            'desc' => 1,
        ],
        1 => (object)[
            'id' => 1,
            'title' => 'Свидетельство о регистрации ТС ',
            'image' => 'avai_2.png',
            'desc' => 1,
        ],
        2 => (object)[
            'id' => 1,
            'title' => 'Водительское удостоверение',
            'image' => 'avai_3.png',
            'desc' => 1,
        ],
    ];
    ?>

    <div class="section_main">
        <h1>Автоломбард автобиля<br> Кредит на Авто</h1>
        <small>Получите деньги под залог автомобиля через 2 часа после обращения</small>
    </div>
    <section class="section_imagetext">
        <div class="contain">
            <div class="block">
                <div class="bn">
                    <div class="team_header">
                        <div class="block">
                            <div class="line"></div>
                            <div class="mini">Почему мы?</div>
                            <div class="line"></div>
                        </div>
                        <div class="text">AVTO - автокредит компания</div>
                    </div>
                </div>
                <div class="text_block">
                    <div class="texts">
                        <div class="title">Автомобиль AVTO-L</div>
                        <div class="text">
                            <p>У каждого в жизни случаются такие ситуации, когда срочно нужны деньги, в таком случае многие люди, у которых есть машина, решают сдать её в круглосуточный автоломбард в Алматы.</p>
                            <p>Однако каждый хочет быть уверен не только в том, что его не обманут, но и в профессионализме компании и качестве услуги, которое заключается в высокой оценке авто, низкой процентной ставке, быстрой выдаче займа и удобной оплате. Всё это вы можете найти в Белом Ломбарде!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section_available">
        <div class="team_header">
            <div class="block">
                <div class="line"></div>
                <div class="mini">Наши</div>
                <div class="line"></div>
            </div>
            <div class="text">Примущество</div>
        </div>
        <div class="block_pictext">
            @foreach($available as $item)
                <div class="bn">
                    <div class="box">
                        <h2 class="title">{{ $item->title }}</h2>
                        <div class="desc">{{ $item->desc }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <section class="section_calculate">
        <div class="contain">
            <div class="team_header">
                <div class="block">
                    <div class="line"></div>
                    <div class="mini">Рассчитайте самостоятельно</div>
                    <div class="line"></div>
                </div>
                <div class="text">
                    свой ежемесячный платеж и сумму переплат
                </div>
                <div class="pic"></div>
            </div>
            <div class="calc_container">
                <div class="calc_top">
                    <form id="calcForm">
                        <div class="calc_top_inputs">
                            <ul class="ul-input">
                                <li class="li-input-calc calc-cost">
                                    <div class="calc-ui-slider-val">
                                        <div class="title">Сумма кредита</div>
                                        <div class="num"><span><input type="text" class="num_input"></span> <span class="txt cost-txt">₸</span></div>
                                        <input type="hidden" name="c_cost" value="25000000">
                                    </div>
                                    <div class="calc-ui-slider ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"><div class="ui-slider-range ui-corner-all ui-widget-header ui-slider-range-min" style="width: 100%;"></div><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 100%;"></span></div>
                                </li>
                                <li class="li-input-calc calc-time">
                                    <div class="calc-ui-slider-val">
                                        <div class="title">Срок займа</div>
                                        <div class="num"><span class="year">12</span> <span class="txt">месяцев</span></div>
                                        <input type="hidden" name="c_time" value="25">
                                    </div>
                                    <div class="calc-ui-slider ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"><div class="ui-slider-range ui-corner-all ui-widget-header ui-slider-range-min" style="width: 100%;"></div><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 100%;"></span></div>
                                </li>
                                <li class="li-input-calc calc-time">
                                    <div class="calc-ui-slider-val">
                                        <div class="title">Ваше имя</div>
                                        <input type="text" name="name">
                                    </div>
                                </li>
                                <li class="li-input-calc calc-time">
                                    <div class="calc-ui-slider-val">
                                        <div class="title">Ваше номер</div>
                                        <input type="text" name="phone" class="phone">
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </form>
                </div>
                <div class="calc_bottom month concl_item">
                    <div class="title">Ежемесячный взнос</div>
                    <div class="num"><span>NaN</span> ₸</div>
                    <button type="button" class="js_calc_ok"><span>Оставить заявку</span></button>
                </div>
            </div>
        </div>
    </section>
    <section class="section_docs">
        <div class="team_header">
            <div class="block">
                <div class="line"></div>
                <div class="mini">Принестие с собой</div>
                <div class="line"></div>
            </div>
            <div class="text">Эти доумменты и мы вам оформим кредит</div>
        </div>
        <div class="block_pictext">
            @foreach($docs as $item)
                <div class="bn">
                    <div class="box">
                        <div class="image" style="background-image: url('/temp/{{ $item->image }}')"></div>
                        <h2 class="title">{{ $item->title }}</h2>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <section class="section_fontext">
        <div class="contain">
            <div class="title">Вы можете быть спокойны <br>за свой автомобиль</div>
            <div class="block_box">
                <span>Автомобиль остается у вас даже при небольшой задолжности</span>
            </div>
            <div class="text">
                Автомобиль изымается только по решению суда в случае злостного неисполнения обязательств Заемщиком по невыплате задолженности.
            </div>
            <button class="team_button"><span>Оставить заявку</span></button>
        </div>
    </section>

@stop