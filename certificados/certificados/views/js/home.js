$(document).ready(function () {



    function mostraCert() {
        //mostrar vagas??
        //carregar os tweets ???
        $.ajax({
            url: '../../models/mostrarSolicitacoes.php',
            type: 'post',
            data: 'json',
            success: function (data) {
                $('#solicitCert').html(data);

                // ajax para limpar solicitação

                $('.imgDelete').on('click', function () {
                    var idSolicit = $(this).attr("alt");

                    $.ajax({
                        url:'../../models/deleteSolicit.php',
                        type: 'post',
                        data: { id: idSolicit },
                        success: function(data){
                            mostraCert();
                        },
                        error: function(){

                        }

                    });


                });
            },
            error: function () {
                $('#solicitCert').html("<div><h4><b>Nenhuma Solicitação!</b></h4></div>");
            }
        });

    }



    function mostrarEven(){
        $.ajax({
            url: '../../models/mostrarEvenCad.php',
            type: 'post',
            data: 'json',
            success: function (data) {
                $('#evenCad').html(data);

                // ajax para limpar evento

                $('.imgDelete').on('click', function () {
                    var idEvent = $(this).attr("alt");

                    $.ajax({
                        url:'../../models/deleteEven.php',
                        type: 'post',
                        data: { id: idEvent },
                        success: function(data){
                            mostrarEven();
                        },
                        error: function(){

                        }

                    });


                });
            },
            error: function () {
                $('#solicitCert').html("<div><h4><b>Nenhuma Solicitação!</b></h4></div>");
            }
        });


    }

    mostraCert();
    mostrarEven();


    // Apagar a senha depois da submissão
    $('#submissao').click(function () {
        setTimeout(function () {
            $('#senha').val('');
        }, 1500);
    });
    $('.apagarSenha').click(function () {
        $('#senha').val('');
    });

    $.ajax({
        url: '../../models/conteudoEven.php',
        type: 'post',
        data: 'json',
        success: function (data) {
            $("#SelectEven").html(data);
        },
        error: function () {
            console.log("ruimmmm");
            $('#teste').html("<div><h4><b>Nenhuma Conteudo!</b></h4></div>");
        }
    });

    // monitorar mudanças do select e busca do banco
    $('#modelo').change(function () {
        var op = $("#modelo").val();
        $.ajax({
            url: '../../models/mostrarConteudo.php',
            type: 'post',
            data: { valor: op },
            success: function (data) {
                // Cria o conteúdo para colocar na div
                var texto = "<textarea rows=\"20\" cols=\"100%\" id=\"texto\" name=\"texto\" class=\"form-control\">";
                texto += data;
                texto += "</textarea><br>"; // acrescimo da tag de fechamento
                // Adiciona na div e aplica a formatação do editor
                $('#teste').html(texto);
                CKEDITOR.replace('texto');
            },
            error: function () {
                console.log("ruimmmm");
                $('#teste').html("<div><h4><b>Nenhum Conteudo!</b></h4></div>");
            }
        });

    });


    $("#LEven").hide();
    $(".List").click(function(){
        $("#CEven").fadeToggle();
        $("#LEven").fadeToggle();

    });




});