<?php

session_start();

include("../../models/login/autenticacao.php");

$codigo = $_GET['cod'];
$nomess = $_SESSION['nomes'];
print $nomess;

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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
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
                <li><a href="../solicitacao/mostrarDados.php">SOLICITAÇÕES</a></li>

                <li><a><?php echo "Olá, " . strtoupper($_SESSION['nome']) . " |" ?></a></li>

                <li style="margin-left: -25px"><a href='../../models/login/logout.php' class="nav-link" title="Clique para encerrar sessão">Encerrar Sessão</a></li>
  
              </ul>
            </div>

        </div>

        </nav>
        <!--Fim da Navbar-->
        
    <div class="container">

        <div class="col-xs-1 col-sm-1 col-md-1"></div>
      
        <div class="col-xs-10 col-sm-10 col-md-10 card">
        	<!-- container é do bootstrap -->
	        <form method="post" onsubmit="return verificacao();" action="../../models/gerador.php">

                <div class="row">
    	            <div class="col-md-6">

                        <label class="font_text_simples2">Nome do Evento:</label>
                        <input type="text" class="form-control" name="titulo" id="titulo"> <br>

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
                            <strong>Certificamos que</strong>
                        </div>
                        
        	            <div id="teste"> 
                            <textarea rows="20" cols="100%" id="texto" name="texto" class="form-control"></textarea><br>
                        </div>
                        <script>
                            // Aplica o editor no conteúdo inicial
                            CKEDITOR.replace( 'texto' );
                        </script>

                        <input type="checkbox" name="envioEmail" value="true">
                        <strong style="color: #585858" class="font_text_simples2" >Enviar certificados para os emails informados.</strong>
                        <br><br>
    	            </div>

    	            <div class="col-md-6">

    	              <div class="font_text_simples2"><strong>Lista de Nomes:</strong></div>
    	              <textarea rows="22" cols="100%" id="nomes" name="nomes" class="form-control" title="Digite os nomes um abaixo do outro"></textarea>
    	          
    	            </div>
                </div>

	            <div>
                    <br>
	                <button class="botao btn btn-primary apagarSenha" title="Clique para gerar certificados" type="button" data-toggle="modal" data-target="#janela">Gerar Certificados</button>
                    
                    <!-- JANELA -->
                    <div class="modal fade" id="janela">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <!-- cabecalho -->
                                <div class="modal-header">
                                    <center><h2 class="modal-title">Autenticação</h2></center>
                                </div>

                                <!-- corpo -->
                                <div class="modal-body">
                                    <br><br>
                                    <center><h4>Informe a senha:</h4></center>
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
                                        <button type="button" class="botao btn btn-default" data-dismiss="modal">Voltar</button>
                                    </div>
                                    <div class="col-xs-6">
                                        <button class="botao btn btn-primary" title="Clique para gerar certificados" type="submit" id="submissao">Gerar Certificados</button>
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
    // Apagar a senha depois da submissão
    $('#submissao').click(function() {
        setTimeout(function(){ $('#senha').val('');}, 1500);
    });
    $('.apagarSenha').click(function() {
        $('#senha').val('');
    });

    $('#modelo').change(function() {
        var op = $('#modelo').val();
        
        // Cria o conteúdo para colocar na div
        var texto = "<textarea rows=\"20\" cols=\"100%\" id=\"texto\" name=\"texto\" class=\"form-control\">";

        // Seletor de texto
        switch(op) {
            case "1": // Comissão Organizadora
                texto += "participou, como membro da comissão organizadora, do/da <b>[evento]</b>, realizado(a) nos dias XX, XX e XX de mes de XXXX, durante a <b>[conferencia]</b>, no IFCE Campus Maracanaú, com carga horária total de <b>[quantidade] horas</b>.";
                break;
            case "2": // Organizador em Evento
                texto += "participou, como organizador(a), do/da <b>[evento]</b>, realizada nos dias XX, XX e XX de mes de XXXX, durante a <b>[conferencia]</b>, no IFCE Campus Maracanaú, com carga horária total de <b>[quantidade] horas</b>.";
                break;
            case "3": // Participante em Evento
                texto += "participou do/da <b>[evento]</b>, durante a <b>[conferencia]</b>, no IFCE Campus Maracanaú, realizado nos dias XX, XX e XX de mes de XXXX.";
                break;
            case "4": // Palestrante em Evento
                texto += "participou, na qualidade de palestrante, do/da <b>[evento]</b>, ministrando o/a minucurso/oficina/palestra <b>[atividade]</b>, contabilizando carga horária total de <b>[quantidade] horas</b>, realizado no IFCE Campus Maracanaú, no dia XX de mês de XXXX.";
                break;
            case "5": // Participante em Atividade
                texto += "participou com êxito do/da <b>[evento]</b>, ministrando o/a minucurso/oficina/palestra <b>[atividade]</b>, contabilizando carga horária total de <b>[quantidade] horas</b>, realizado no IFCE Campus Maracanaú, no dia XX de mês de XXXX.";
                break;
            case "6": // Conclusão de Curso
                texto += "concluiu o curso de <b>[curso]</b>, pertencente ao projeto de extensão: <b>[Projeto]</b>, realizado pelo IFCE Campus Maracanaú, contabilizando carga horária total de <b>[quantidade] horas</b>, realizado no <b>[local]</b>, no período de XX de mês à XX de mês de XXXX.";
                break;
            default:
                texto += "";
                break;
        }

        texto += "</textarea><br>"; // acrescimo da tag de fechamento

        // Adiciona na div e aplica a formatação do editor
        $('#teste').html(texto);
        CKEDITOR.replace( 'texto' );
    });
</script>

<!-- Verifica o preenchimento dos dados do formulário -->
<script type="text/javascript">
    function verificacao() {
        if($('#titulo').val() == "") {
            alert('Por favor, preencha o título!');
            document.all['titulo'].focus();
            return false;
        }
        if($('#nomes').val() == "") {
            alert('Por favor, informe ao menos um nome!');
            document.all['nomes'].focus();
            return false;
        }
        if($('#texto').val() == "") {
            alert('Por favor, preencha o corpo do certificado!');
            document.all['texto'].focus();
            return false;
        }  
    }
</script>


<!-- Codigo de Redirecionamento -->
<script type="text/javascript">
    var codigo = <?= $codigo ?>;
    //var nomess = "<?= $nomess ?>";

    if(codigo == 0)
        alert("Senha Incorreta!");

    if(codigo == 1) {

        var aux = "<?php print $_SESSION['evento']; ?>";
        $('#titulo').val(aux);
        alert(aux);

        var aux = "<?php print $_SESSION['texto']; ?>";
        $('#texto').val(aux);
        alert(aux);

        var aux = "<?php print $_SESSION['tipo']; ?>";
        $('#modelo').val(aux);
        alert(aux);

        var aux = "<?php print $_SESSION['nomes']; ?>";
        $('#nomes').val(aux);
        alert(aux);

        var aux = "<?php print $_SESSION['nomes']; ?>";
        $('#texto').val(aux);

        
    }

    //window.location.href = 'http://' + window.location.hostname + window.location.pathname;
</script>


</html>