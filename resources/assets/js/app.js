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

    var basic_region = 200000;
    if ($('*').hasClass('ul-input')) {
        var region_value = basic_region;
        f_calcGetVal();
        var cost_sl = $(".calc-cost .calc-ui-slider").slider({
            range: "min",
            min: 0,
            max: region_value,
            value: 0,
            step: 1,
            slide: function (event, ui) {
                var val1 = ui.value
                    /*val2 = bitNumber(val1)*/;

                $(".calc-cost .num_input").val(val1);
            },
            change: function (event, ui) {

                var cost = ui.value;
                $(".calc-cost input:not(.num_input)").val(cost);

                f_calcForm();
            }
        });

        var cost_s2 = $(".calc-time .calc-ui-slider").slider({
            range: "min",
            min: 1,
            max: 12,
            value: 12,
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

        /*$('.num_input').numeric({allowEmpty:true, live:true}, function (val) {
            $('.alertify-notifier').empty();

            var region_value = basic_region;

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
        });*/

        f_calcLang();
        f_calcForm();
    }
});

// разрядность числа
function bitNumber(number) {
    return String(number).replace(/(\d)(?=(\d\d\d)+([^\d]|$))/g, '$1 ');
}

function f_calcGetVal() {

    $(".calc-cost .num_input").val(0);
    $(".calc-cost input:not(.num_input)").val(0);

    $('.calc-time .year').text(12);
    f_calcLang(12);
}

// калькулятор
function f_calcForm() {
    var form = $("#calcForm"),
        sum = $('[name="c_cost"]').val(), /* сумма крдита */
        time = $('[name="c_time"]').val(); /* сумма залога */

    const percent = 0.07 / 12; // процентная ставка 7% деленная на 12 месяцев

    var month = sum * (percent / (1 - Math.pow((1 + percent), -(time * 12) ))); // ежемесячный платеж
    $('.month .num span').text(bitNumber(parseFloat(month.toFixed(2))));
}

function f_calcLang(int) {

    new_lang = "месяцев";
    if (int != "" && int > 0) {
        if (int == 1 || int == 21)
            new_lang = "месяц";
        else if ((int>=2 && int<=4) || (int>=22 && int<=24))
            new_lang = "месяца";
        else {
            new_lang = "месяцев";
        }
    }

    $(".calc-time .num span.txt").text(new_lang);
}