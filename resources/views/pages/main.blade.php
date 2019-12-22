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
                свой ежемесячный платеж и сумму переплат</div>
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