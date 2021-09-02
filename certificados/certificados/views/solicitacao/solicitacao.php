<?php

$codigo = $_GET['cod'];

?>


<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="cache-control" content="no-store, no-cache, must-revalidate, Post-Check=0, Pre-Check=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta http-equiv="expires" content="0">
    <meta http-equiv="pragma" content="no-cache">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Solicitações</title>

    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="../../libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" type="text/css" href="../../libs/bootstrap/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../../libs/bootstrap/js/bootstrap.min.js"></script>
    <script src="//cdn.ckeditor.com/4.11.1/basic/ckeditor.js"></script> <!-- Ckeditor -->
    <script src="../js/jquery.js"></script> <!-- Adaptador Ckeditor -->

</head>

<body>

    <!--Área da Navbar-->
    <nav class="navbar navbar-default">

        <div class="container">

            <div class="navbar-header">

                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand font_text_simples">GERADOR DE CERTIFICADOS</a>
            </div>

            <div id="navbar" class="collapse navbar-collapse ">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="../../index.php">INÍCIO</a></li>
                </ul>
            </div>

        </div>

    </nav>
    <!--Fim da Navbar-->

    <div class="container">

        <div class="col-xs-10 col-sm-10 col-md-10 card ContainerP">
            <!-- container é do bootstrap -->
            <form method="post" onsubmit="return verificacao();" action="../../models/solicitarCertificado.php">

                <h2>Solicitar Certificado</h2>

                <div class="row">
                    <div class="col-md-6">

                        <!-- <input type="checkbox" id="textoProprio" name="textoProprio" value="true">
                        <strong style="color: #585858" class="font_text_simples2">Usar texto de certificado próprio.</strong>
                        <br> -->

                        <div id="dadosForm">
                            <!-- DIV para formar o grupo para hide/show -->
                            <label class="font_text_simples2">Nome do Evento:</label>
                            <input type="text" class="form-control" name="evento" id="evento" placeholder="Evento" required> <br>

                            <label class="font_text_simples2">Instituição</label>
                            <input type="text" class="form-control" name="instituicao" id="instituicao" placeholder="Instituição" required> <br>

                            <div class="row">
                                <div class="col-md-6">
                                    <label class="font_text_simples2">Carga Horária:</label>
                                    <input type="text" class="form-control" name="carga" id="carga" placeholder="00" required> <br>
                                </div>

                                <div class="col-md-6">
                                    <label class="font_text_simples2">Tipo:</label>
                                    <select class="form-control" id="tipo" name="tipo">
                                        <option value="" selected>Selecione um tipo</option>
                                        <option disabled>------------------------</option>
                                        <option value="1">Comissão Organizadora</option>
                                        <option value="2">Organizador em Evento</option>
                                        <option disabled>------------------------</option>
                                        <option value="3">Participante em Evento</option>
                                        <option value="4">Palestrante em Evento</option>
                                        <option value="5">Participante em Atividade</option>
                                        <option disabled>------------------------</option>
                                        <option value="6">Conclusão de Curso</option>
                                    </select> <br>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-9">
                                    <label class="font_text_simples2">Período(Dias/Meses):</label>
                                    <input type="text" class="form-control" name="periodo" id="periodo" placeholder="XX do X até XX do X" required> <br>
                                </div>

                                <div class="col-md-3">
                                    <label class="font_text_simples2">Ano:</label>
                                    <input type="text" class="form-control" name="ano" id="ano" placeholder="0000" required> <br>
                                </div>
                            </div>

                            <label class="font_text_simples2">Local:</label>
                            <input type="text" class="form-control" name="local" id="local" placeholder="Cidade" required>

                        </div>


                        <div id="grupoTexto">
                            <!-- DIV para formar o grupo para hide/show -->
                            <!-- <div class="font_text_simples2">
                                <strong>Certificamos que NOME</strong>
                            </div> -->
                            <!-- <div id="textoProprio">
                                <textarea rows="18" cols="100%" id="texto" name="texto" class="form-control" placeholder="Escreva seu texto aqui..."></textarea>
                            </div> -->
                        </div>


                        <br><br>
                    </div>

                    <div class="col-md-6">
                        <div class="font_text_simples2"><strong>Lista de Nomes:</strong></div>
                        <textarea style="margin-top: 10px" rows="8" cols="100%" id="nomes" name="nomes" class="form-control" title="Digite os nomes um abaixo do outro" placeholder="Participante 01&#10Participante 02&#10Participante 03"></textarea>
                    </div>

                    <div class="col-md-6">
                        <div class="font_text_simples2"><strong>Lista de Emails:</strong></div>
                        <textarea style="margin-top: 10px" rows="8" cols="100%" id="nomes" name="emails" class="form-control" title="Digite os nomes um abaixo do outro" placeholder="Email 01&#10Email 02&#10Email 03"></textarea>
                    </div>
                </div>

                <div>
                    <br>
                    <button class="btnS btn btn-primary" title="Clique para gerar certificados" type="submit" id="submissao">Solicitar</button>
                </div>

            </form>

        </div>

    </div>

</body>

<!-- <script type="text/javascript">
    // Apagar a senha depois da submissão
    $('#submissao').click(function() {
        setTimeout(function() {
            $('#senha').val('');
        }, 1500);
    });
    $('.apagarSenha').click(function() {
        $('#senha').val('');
    });
</script> -->

<!-- Verifica o preenchimento dos dados do formulário -->
<script type="text/javascript">
    function verificacao() {

        if ($('#evento').val() == "") {
            alert('Por favor, preencha o nome do evento!');
            document.all['evento'].focus();
            return false;
        }
        if ($('#tipo').val() == "") {
            alert('Por favor, informe o tipo do certificado!');
            document.all['tipo'].focus();
            return false;
        }
        if ($('#ano').val() == "") {
            alert('Por favor, informe o ano de realização do evento!');
            document.all['ano'].focus();
            return false;
        }

        if ($('#nomes').val() == "") {
            alert('Por favor, informe ao menos um nome na lista!');
            document.all['nomes'].focus();
            return false;
        }
    }
</script>


<!-- Codigo de Redirecionamento -->
<script type="text/javascript">
    var codigo = <?= $codigo ?>;

    if (codigo == 0)
        alert("Solicitação realizada com sucesso!");

    window.location.href = 'http://' + window.location.hostname + window.location.pathname;
</script>


</html>