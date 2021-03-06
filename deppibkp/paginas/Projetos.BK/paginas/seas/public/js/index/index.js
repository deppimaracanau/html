$(function () {
    // Formato: new Date(ano, mes, dia, hora, min, seg, miliseg);
  	 var ts = new Date(2017, 10, 6, 8, 0); // mes => 0-jan, 1-fev ...
    var tf = new Date(2017, 10, 10, 23, 0); // mes => 0-jan, 1-fev ...
    moment.lang('pt-br');
    var mts = moment(ts).format('YYYY-MM-DD HH:mm:ss');
    var mtf = moment(tf).format('YYYY-MM-DD HH:mm:ss');
    var mnow = moment().format('YYYY-MM-DD HH:mm:ss');

    $("#countdown").attr('data-date', mts);

    var countdown = $("#countdown").TimeCircles({
        animation: "ticks",
        count_past_zero: false,
        time: {
            Days: {
                show: true,
                text: "Dias",
                color: "#feb23c"
            },
            Hours: {
                show: true,
                text: "Horas",
                color: "#61c8fa"
            },
            Minutes: {
                show: true,
                text: "Minutos",
                color: "#abe15c"
            },
            Seconds: {
                show: true,
                text: "Segundos",
                color: "#fd5936"
            }
        }
    });

    var intervalId = setInterval(function () {
        if (countdown.getTime() <= 0) {
            if (mnow < mtf) {
                countdown.end().fadeOut(400, function () {
                    $('#countdown-title').hide();
                    $("#banner-now").show();
                });
                clearInterval(intervalId);
            } else {
                countdown.end().fadeOut(400, function () {
                    $('#countdown-title').hide();
                    $("#banner-old").show();
                });
                clearInterval(intervalId);
            }
        }
    }, 1000);
});
