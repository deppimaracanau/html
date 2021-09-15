$(function () {

    var current_data = [];
    var full_list = [];

    $('#fullpage').fullpage({
        css3: true,
        scrollingSpeed: 700,
        autoScrolling: true,
        sectionsColor: ['#feb23c', '#61c8fa', '#abe15c'],
        resize: false,
        continuousVertical: true
    });

    var intervalId = setInterval(function () {
        console.log('MOVE!');
        $.fn.fullpage.moveSectionDown();
    }, 10000);

    var intervalId2 = setInterval(function () {
        console.log('RELOADING!');
        load();
    }, 10000 * 3/* * 60*/);

    function load() {
        $.ajax({
            url: '/evento/ajax-programacao',
            type: 'POST',
            success: function (json) {
                console.log('ajax success.');

                full_list = json.results;
            },
            error: function () {
                console.log('ajax error.');
            },
            complete: function () {
                console.log('ajax complete.');
                _generateFullpage();
            }
        });
    }
    load();

    function _generateFullpage() {
        current_data = _.filter(full_list, function (el) {
            var date = moment();
            var inicio = moment(el.data + ' ' + el.hora_inicial);
            var fim = moment(el.data + ' ' + el.hora_final);
            return inicio <= date && date <= fim;
        });

        var fullpage = $('#fullpage');
        fullpage.empty();
        var len = current_data.length;
        if (len > 0) {
            for (var i = 0; i < len; i++) {
                $(_templateSection(current_data[i])).appendTo(fullpage);
            }
        } else {
            var list = _templateEmpty();
            len = list.length;
            for (var j = 0; j < len; j++) {
                $(list[j]).appendTo(fullpage);
            }
        }

        $('#fullpage').fullpage({
            css3: true,
            scrollingSpeed: 700,
            autoScrolling: true,
            sectionsColor: ['#feb23c', '#61c8fa', '#abe15c', '#DE564B'],
            resize: false,
            continuousVertical: true
        });
        $('#fullpage').fullpage.reBuild();
    }

    function _templateSection(data) {
        return sprintf(
           '<div class="section center"><div class="row">' +
           '<div class="col-md-8 col-md-offset-2"><h1>%(tipo)s: %(titulo)s</h1>' +
           '<h2><span class="label label-success">%(hora_inicial)s</span> às ' +
           '<span class="label label-success">%(hora_final)s</span> @ %(local)s' +
           '</h2><h2>Com %(palestrante)s</h2></div></div></div>',
        data);
    }

    function _templateEmpty() {
        return [
            '<div class="section center"><div class="row"><div class="col-md-8 col-md-offset-2"><h1>COMSOLiD</h1><h2>Comunidade Maracanauense de Software Livre e Inclusão Digital</h2><h2>de 16 a 19 de Dezembro</h2></div></div></div>',
            '<div class="section center"><div class="row"><div class="col-md-8 col-md-offset-2"><h1>O que é software livre?</h1><h2>usuários possuem a liberdade de executar, copiar, distribuir, estudar, mudar e melhorar o software</h2></div></div></div>',
            '<div class="section center"><div class="row"><div class="col-md-8 col-md-offset-2"><h1>SiGE</h1><h2>Sistema de Gerência de Eventos desenvolvido pela COMSOLiD</h2><h2><i class="fa fa-github"></i> https://github.com/comsolid/sige</h2></div></div></div>',
            '<div class="section" id="section-banner"></div>'
        ];
    }
});
