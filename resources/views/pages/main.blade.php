@extends('layouts.app')

@section('app_content')

    <?php $available = [
        0 => (object)[
            'id' => 1,
            'title' => 'Нет скрытых комиссий и без переплат',
            'image' => 'avai_1.png',
            'desc' => 'Блал бла текст у нас комиссий нет и без скрытых до 5,8% в месяц и ниже',
        ],
        1 => (object)[
            'id' => 1,
            'title' => 'Пользуйтесь автомобилем без ограничений',
            'image' => 'avai_2.png',
            'desc' => 'У нас не тограничений даже для поездок за границу. Хоть куда хоть туда',
        ],
        2 => (object)[
            'id' => 1,
            'title' => 'Без справок и поручителей',
            'image' => 'avai_3.png',
            'desc' => 'Ускоренное получение займа. Вам нобходмио иметь лишь следуюшие документы сс собой - документы. Оформлятеся за 10-15 минут',
        ],
    ];?>

    <div class="section_main">
        <h1>Автоломбард автобиля<br> Кредит на Авто</h1>
        <small>Получите деньги под залог автомобиля через 2 часа после обращения</small>
    </div>
    <section class="section_calculate">
        <div class="team_header">
            <div class="block">
                <div class="line"></div>
                <div class="mini">Рассчитайте самостоятельно</div>
                <div class="line"></div>
            </div>
            <div class="text">
                свой ежемесячный платеж и сумму переплат
            </div>
            <div class="calc_container">
                <div class="calc_top">
                    <form id="calcForm">
                        <div class="calc_top_inputs">
                            <ul class="ul-input">
                                <li class="li-input-calc calc-cost">
                                    <div class="calc-ui-slider-val">
                                        <div class="title">Стоимость жилья</div>
                                        <div class="num"><span><input type="text" class="num_input"></span> <span class="txt cost-txt">₸</span></div>
                                        <input type="hidden" name="c_cost" value="25000000">
                                    </div>
                                    <div class="calc-ui-slider ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"><div class="ui-slider-range ui-corner-all ui-widget-header ui-slider-range-min" style="width: 100%;"></div><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 100%;"></span></div>
                                </li>
                                <li class="li-input-calc calc-time">
                                    <div class="calc-ui-slider-val">
                                        <div class="title">Срок займа</div>
                                        <div class="num"><span class="year">25</span> <span class="txt">лет</span></div>
                                        <input type="hidden" name="c_time" value="25">
                                    </div>
                                    <div class="calc-ui-slider ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"><div class="ui-slider-range ui-corner-all ui-widget-header ui-slider-range-min" style="width: 100%;"></div><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 100%;"></span></div>
                                </li>


                            </ul>
                        </div>
                    </form>
                </div>
                <div class="calc_bottom month concl_item">
                    <div class="title">Ежемесячный взнос</div>
                    <div class="num"><span>NaN</span> ₸</div>
                </div>
            </div>
        </div>
    </section>
    <section class="section_available">
        <div class="team_header">
            <div class="block">
                <div class="line"></div>
                <div class="mini">Примущество</div>
                <div class="line"></div>
            </div>
            <div class="text">Наши примущество</div>
        </div>
        <div class="block_pictext">
            @foreach($available as $item)
                <div class="bn">
                    <div class="box">
                        <div class="image" style="background-image: url('/temp/{{ $item->image }}')"></div>
                        <h2 class="title">{{ $item->title }}</h2>
                        <div class="desc">{{ $item->desc }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

@stop