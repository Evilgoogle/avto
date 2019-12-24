require('./tweenmax.min');
require('./jquery-ui.min');
require('./jquery.ui.touch-punch.min');
require('./jquery.plate');
require('./bootstrap');
require('./jquery.numeric');
const Swal = require('sweetalert2');
var Swiper = require('swiper/dist/js/swiper');
var alertify = require('alertifyjs');

// Ширина и высота экрана
$displayWidht = screen.width;
$displayHeight = screen.height;
console.log("Ширина экрана: " + $displayWidht + " / Высота экрана: " + $displayHeight);

// Ширина и высота браузера клиента
$clientWidht = window.innerWidth;
$clientHeight = window.innerHeight;
console.log("Ширина браузера: " + $clientWidht + " / Высота браузера: " + $clientHeight);

$user_agent = navigator.userAgent.toLowerCase(); // detect the user agent
$ios_devices = $user_agent.match(/(iphone|ipad|ipod)/)  ? "touchstart" : "click"; //check ios devices

// WOW JS
var WOW = require('wow.js');
new WOW().init();
//

// Parallax js
const Parallax = require('parallax-js');

//$('input.phone').inputmask("+7 (999) 999 9999");

/* Прослушка ориентаций экрана */
var mql = window.matchMedia("(orientation: portrait)");
mql.addListener(function(m) {
    window.location = location.pathname;
});


$(document).ready(function() {

    if ($('*').hasClass('ul-input')) {
        var region_value = 20000;
        $(".calc-cost .num_input").val(region_value);
        f_calcGetVal();
        var cost_sl = $(".calc-cost .calc-ui-slider").slider({
            range: "min",
            min: 0,
            max: region_value,
            value: region_value,
            step: 100000,
            slide: function (event, ui) {
                var val1 = ui.value
                    /*val2 = bitNumber(val1)*/;

                $(".calc-cost .num_input").val(val1);
            },
            change: function (event, ui) {
                var cost = ui.value;
                $(".calc-cost input:not(.num_input)").val(region_value);

                var fee = cost / 5;
                $(".calc-fee input").val(fee);
                $(".calc-fee .num span:not(.txt)").text(bitNumber(fee));

                var sum = cost - fee;
                $(".calc-sum input").val(sum);
                $(".calc-sum .num span:not(.txt)").text(bitNumber(sum));

                f_calcForm();
            }
        });

        var cost_s2 = $(".calc-time .calc-ui-slider").slider({
            range: "min",
            min: 1,
            max: 25,
            value: 25,
            step: 1,
            slide: function (event, ui) {
                var val1 = ui.value;

                f_calcLang(val1);

                $(".calc-time .num span.year").text(val1);
            },
            change: function (event, ui) {
                $(".calc-time input").val(ui.value);
                f_calcForm();
            }
        });

        $(document).on('click', '.li-region [name="region"]:checked', function () {
            var $this_val = $(this).val();

            cost_sl.slider({
                value: $this_val,
                max: $this_val
            });

            cost_s2.slider({
                value: 25
            });

            f_calcGetVal();
            f_calcForm();
        });

        $('.num_input').numeric({allowEmpty:true, live:true}, function (val) {
            $('.alertify-notifier').empty();

            var region_value = $('[name="region"]:checked').val();

            if (val <= region_value) {
                if (val == "null") val = 0;

                $(".calc-cost .num_input").val(val);
                $(".calc-cost input:not(.num_input)").val(val);
                $(".calc-cost .calc-ui-slider").slider({
                    value: val
                });
            } else {
                alertify.success('Максимальное значение не должно превышать: ' + bitNumber(region_value));
                $(".calc-cost input:not(.num_input)").val(val);
                $(".calc-cost .num_input").val(region_value);
                $(".calc-cost .calc-ui-slider").slider({
                    value: region_value
                });
            }
        });

        f_calcLang();
        f_calcForm();
    }

    if ($clientWidht > 640) {
        if ($('div').hasClass('section_faq')) {
            var f_height = $('.section_faq').innerHeight();
            $('.section_faq').innerHeight(f_height);
        }
    }

    $(document).on($ios_devices, '.go-section', function () {
        var section = $(this).data('section');
        moveToSection(section);
    });

    // scroll to section
    function moveToSection(section) {
        var offset = $('[data-anchor="'+ section+'"]').offset().top;
        $('body,html').animate({scrollTop: offset - headerHeight}, 1000);
    }
});

// разрядность числа
function bitNumber(number) {
    return String(number).replace(/(\d)(?=(\d\d\d)+([^\d]|$))/g, '$1 ');
}

function f_calcGetVal() {
    var region_value = $('[name="region"]:checked').val();
    $(".calc-cost .num_input").val(region_value);
    $(".calc-cost input:not(.num_input)").val(region_value);

    $('.calc-time .year').text(25);
    f_calcLang(25);

    var fee = region_value / 5;
    $(".calc-fee input").val(fee);
    $(".calc-fee .num span:not(.txt)").text(bitNumber(fee));

    var sum = region_value - fee;
    $(".calc-sum input").val(sum);
    $(".calc-sum .num span:not(.txt)").text(bitNumber(sum));
    $(".calc-time input").val(25);
}

// калькулятор
function f_calcForm() {
    var form = $("#calcForm"),
        cost = $('[name="c_cost"]').val(), /*стоимость жилья*/
        fee = $('[name="c_fee"]').val(), /*первоначальный взнос*/
        time = $('[name="c_time"]').val(), /*срок займа*/
        sum = $('[name="c_sum"]').val(); /*сумма залога*/

    // console.log(sum + ' ' + time);

    const percent = 0.07 / 12; // процентная ставка 7% деленная на 12 месяцев

    var month = sum * (percent / (1 - Math.pow((1 + percent), -(time * 12) ))); // ежемесячный платеж
    $('.month .num span').text(bitNumber(parseFloat(month.toFixed(2))));
}

function f_calcLang(int) {

    new_lang = "лет";
    if (int != "" && int > 0) {
        if (int == 1 || int == 21)
            new_lang = "год";
        else if ((int>=2 && int<=4) || (int>=22 && int<=24))
            new_lang = "года";
        else {
            new_lang = "лет";
        }
    }

    $(".calc-time .num span.txt").text(new_lang);
}