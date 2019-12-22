<!DOCTYPE html>
<html lang="ru" prefix="og: http://ogp.me/ns#">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <?php
    if (isset($seo_new)) $seo = $seo_new;
    ?>
    <title>{{ isset($seo) && !empty($seo->title) ? $seo->title : config('app.name') }}</title>

    <meta name="apple-mobile-web-app-title" content="{{ $seo->title ?? config('app.name') }}">
    <meta name="description" content="{{ $seo->description ?? '' }}">
    <meta name="keywords" content="{{ $seo->keywords ?? '' }}">
    <meta name="author" content="FreeLife">
    <meta name="robots" content="index, follow">

    <!-- WebSite CSS -->
    <link href="{{ asset('libs/animate.css') }}" rel="stylesheet">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <link rel="icon" href="/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="/images/favicon.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="/images/touch-icon-iphone.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/images/touch-icon-ipad.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/images/touch-icon-iphone-retina.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/images/touch-icon-ipad-retina.png">
    <link rel="canonical" href="{{ strtolower(url()->current()) }}">
</head>
<body>
<header>
    <div class="top">
        <div class="contain">
            <a href="tel:+77056651981" class="phone"><span>+7 705 665 1981</span></a>
            <button class="team_button"><span>Оставить заявку</span></button>
        </div>
    </div>
    <div class="logo">
        <a href="/"><img src="/images/logo.png" alt="avto"></a>
    </div>
    <nav>
        <button type="button" class="mobile_menu"></button>
        <ul>
            <li><a href="#" class="active">Автоломбард</a></li>
            <li><a href="#">Калькулятор кредита</a></li>
            <li><a href="#">Документы</a></li>
            <li><a href="#">Почему мы?</a></li>
            <li><a href="#">Контакты</a></li>
        </ul>
    </nav>
</header>
<main>
    @yield('app_content')
</main>

<div class="overlay" id="overlay"></div>

<!-- FontAwesome -->
<link href="{{ asset('libs/fontawesome.css') }}" rel="stylesheet">

<!-- WebSite JS -->
<script src="{{ asset('/js/jquery.min.js') }}"></script>
<!-- Google map JS -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCXrKE5h-QaBB_NDgmMqTzEDaAj4NzM9Wk"></script>
<script src="{{ asset('/js/app.js') }}"></script>
</body>
</html>
