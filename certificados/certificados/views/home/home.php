<?php

// session_start();

include("../../models/login/autenticacao.php");

$codigo = $_GET['cod'];
$nomess = $_SESSION['nome'];

if (isset($_SESSION['arrayS']) && isset($_SESSION['listaS']) && isset($_SESSION['emailsS'])) {
    $ArrayS = $_SESSION['arrayS'];
    $listaS = json_encode($_SESSION['listaS']);
    $emailsS = json_encode($_SESSION['emailsS']);
} else {
    $ArrayS = null;
    $listaS = null;
    $emailsS = null;
}


// $dados = json_decode($ArrayS);

//print $nomess; 

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

    <title>Gerador de Certificados</title>

    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="../../libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" type="text/css" href="../../libs/bootstrap/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../../libs/bootstrap/js/bootstrap.min.js"></script>
    <script src="//cdn.ckeditor.com/4.11.1/basic/ckeditor.js"></script> <!-- Ckeditor -->
    <script src="../js/home.js"></script> <!-- Adaptador Ckeditor -->
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
                    <li><a><?php echo "<b>Olá, " . strtoupper($_SESSION['nome']) . "</b>" ?></a></li>
                    <li><a href="../evento/evento.php">EVENTOS</a></li>
                    <li><a href="../solicitacao/mostrarDados.php">SOLICITAÇÕES</a></li>
                    <li><a href='../../models/login/logout.php' class="nav-link" title="Clique para encerrar sessão">Encerrar Sessão</a></li>

                </ul>
            </div>

        </div>

    </nav>
    <!--Fim da Navbar-->

    <div class="container">

        <div class="col-xs-10 col-sm-10 col-md-10 card ContainerP">
            <!-- container é do bootstrap -->
            <form method="post" onsubmit="return verificacao();" action="../../models/gerador.php" id="FormC">

                <div class="row">
                    <div class="col-md-6">

                        <label class="font_text_simples2">Nome do Evento:</label>
                        <input type="text" class="form-control" name="titulo" id="titulo" value="<?php ?>"> <br>

                        <div id="SelectEven">
                        </div>



                        <label class="font_text_simples2">Modelo:</label>
                        <select class="form-control" id="modelo">
                            <option value="" selected>Selecione um modelo</option>
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

                        <div class="font_text_simples2">
                            <strong>Caixa de texto</strong>
                        </div>

                        <div id="teste">
                            <textarea rows="20" cols="100%" id="texto" name="texto" class="form-control"></textarea><br>
                        </div>
                        <script>
                            // Aplica o editor no conteúdo inicial
                            CKEDITOR.replace('texto');
                        </script>

                        <!-- <input type="checkbox" name="envioEmail" value="true">
                        <strong style="color: #585858" class="font_text_simples2" >Enviar certificados para os emails informados.</strong>
                        <br><br> -->
                    </div>



                    <!-- por victor -->
                    <div class="col-md-6">

                        <div class="font_text_simples2"><strong>Lista de Nomes:</strong></div>
                        <textarea rows="9" cols="100%" id="nomes" name="nomes" class="form-control" title="Digite os nomes um abaixo do outro"></textarea>

                    </div>
                    <div class="col-md-6">

                        <div class="font_text_simples2"><strong>Lista de Emails:</strong></div>
                        <textarea rows="9" cols="100%" id="emails" name="emails" class="form-control" title="Digite os emails um abaixo do outro"></textarea>

                    </div>
                    <!-- por victor -->
                </div>

                <div>
                    <br>
                    <button class="btnS btn btn-primary apagarSenha" title="Clique para gerar certificados" type="button" data-toggle="modal" data-target="#janela">Gerar Certificados</button>

                    <!-- JANELA -->
                    <div class="modal fade" id="janela">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <!-- cabecalho -->
                                <div class="modal-header">
                                    <center>
                                        <h2 class="modal-title">Autenticação</h2>
                                    </center>
                                </div>

                                <!-- corpo -->
                                <div class="modal-body">
                                    <br><br>
                                    <center>
                                        <h4>Informe a senha:</h4>
                                    </center>
                                    <div class="row">
                                        <div class="col-xs-4"></div>
                                        <div class="col-xs-4">
                                            <input class="form-control" style="text-align: center;" type="password" id="senha" name="senha">
                                        </div>
                                    </div>
                                    <br><br>
                                </div>

                                <!-- rodape -->
                                <div class="modal-footer">
                                    <div class="col-xs-6">
                                        <button type="button" class="btnS btn btn-default" data-dismiss="modal">Voltar</button>
                                    </div>

                                    <div class="col-xs-6">
                                        <button class="btnS btn btn-primary" title="Clique para gerar certificados" type="submit" id="submissao">Gerar Certificados</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </form>

        </div>

    </div>

</body>

<script type="text/javascript">
    $(document).ready(function() {


        var Dados = <?= $ArrayS ?>;
        var Nomes = <?= $listaS ?>;
        var Emails = <?= $emailsS ?>;
        console.log(Dados);
        console.log(Nomes);
        console.log(Emails);

        <?php
        unset($_SESSION['arrayS']);
        unset($_SESSION['listaS']);
        unset($_SESSION['emailsS']);
        ?>

        if (Dados != null && Nomes != null) {

            $("#titulo").val(Dados.evento);
            $("#modelo").val(Dados.tipo);
            $("#texto").html(Dados.conteudo);

            var lista = "";
            var listaE = "";

            for (var i = 0; i < Nomes.length; i++) {
                lista += Nomes[i];
                lista += "\n";

            }

            for (var i = 0; i < Emails.length; i++) {
                listaE += Emails[i];
                listaE += "\n";

            }
            console.log(lista);
            console.log(listaE);

            $("#nomes").val(lista);
            $("#emails").val(listaE);
        }

    });
</script>

<!-- Verifica o preenchimento dos dados do formulário -->
<script type="text/javascript">
    function verificacao() {
        if ($('#titulo').val() == "") {
            alert('Por favor, preencha o título!');
            document.all['titulo'].focus();
            return false;
        }
        if ($('#nomes').val() == "") {
            alert('Por favor, informe ao menos um nome!');
            document.all['nomes'].focus();
            return false;
        }
        if ($('#texto').val() == "") {
            alert('Por favor, preencha o corpo do certificado!');
            document.all['texto'].focus();
            return false;
        }
    }
</script>


<!-- Codigo de Redirecionamento 
var nomess = "<?= $nomess ?>"; -->
<script type="text/javascript">
    var codigo = <?= $codigo ?>;
    if (codigo == 0)
        alert("Senha Incorreta!");

    //window.location.href = 'http://' + window.location.hostname + window.location.pathname;
</script>


</html>