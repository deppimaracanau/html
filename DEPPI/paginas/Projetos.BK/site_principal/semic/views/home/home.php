<?php
	// Verificação de Autenticação
    require_once('../../models/login/autenticacao.php');

    $codigo = $_GET['cod'];

?>

<!DOCTYPE html>
<html lang="pt-br">
    
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>  </title>
    <link rel="icon" href="favicon.ico">

    <link href="../../libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/index.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../../libs/bootstrap/js/bootstrap.min.js"></script>
</head>

<body>
    <!-- ------------------- Barra de Navegação ------------------- -->
    <nav class="navbar navbar-default navbar-fixed-top barra">
        <div class="container">
        
        <div class="navbar-header">
        	<button type="button" class="navbar-toggle collapsed"
                  data-toggle="collapse" data-target="#barra-navegacao">
	            <span class="sr-only">Alternar Menu</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
        	</button>
        	<a href="../../index.php" class="navbar-brand">
			<span class="logo">IFCE</span></a>
        </div>

        <div class="collapse navbar-collapse" id="barra-navegacao">
			<ul class="nav navbar-nav navbar-right">
               	<li> <a href="../../models/login/logout.php">SAIR</a> </li>
            </ul>
        </div>   

      </div>

    </nav>
    
    <!-- ------------------- Conteúdo ------------------- -->
    <div class="container">
	    <div class="row">
	    	<div class="col-sm-3"></div>
	      	<div class="col-sm-6">
	      		<div class="caixaLogin">
	      			
	      			<br><br><br><br><br><br><br>

			      	<form onsubmit="return verificacao()" method="post" action="../../models/submeter.php">
                        <center>
                            <img width="180px" src="../imagens/logoSemic.png">
                            <h2>2018</h2>
                            <br>

                            <h4><b>Avaliador:</b> <?= $_SESSION['nome'];?></h4>
                            
                            <br>
                            <label for="codigo">Identificação do Trabalho</label>
                            <input type="text" name="codigo" id="codigo" class="form-control codigo" placeholder="0000">
                            <script src="views/js/jquery.mask.js"></script>
                            <script type="text/javascript">
                                $('#codigo').mask('0000');
                            </script>
                        </center>

	              		<br>
                        <center><button type="button" id="carrega" class="btn btn-info botao" onclick="carregar()">Carregar</button></center>
                        <center><button type="button" id="muda" class="btn btn-danger botao" style="display: none" onclick="mudar()">Mudar</button></center>
                        <br>

                        <div id="notas" style="display: none">
                            <label for="trabalho">Nome do trabalho:</label>
                            <div name="trabalho" id="trabalho"></div>
                            <br>
                            <label for="nota1">Nota 1:</label>
                            <input type="text" name="nota1" id="nota1" class="form-control">
                            <br>
                            <label for="nota2">Nota 2:</label>
                            <input type="text" name="nota2" id="nota2" class="form-control">
                            <br>
                            <label for="nota3">Nota 3:</label>
                            <input type="text" name="nota3" id="nota3" class="form-control">
                            <br>
                            <label for="nota4">Nota 4:</label>
                            <input type="text" name="nota4" id="nota4" class="form-control">
                            <br>
    					    <center><button type="submit" class="btn btn-success botao" >Enviar</button></center>
                        </div>

                        <br><br><br><br><br><br>
					</form>
	      		</div>
	    </div>

	    <div class="col-sm-3"></div>
    </div>
    
    <!-- ------------------- Rodapé ------------------- -->
    <footer class="rodape">
    	<div class="container">
        	<div class="row">
        		<h5>DEPPI - Departamento de Extensão, Pesquisa, Pós-Graduação e Inovação</h5>
        	</div>
        </div>
    </footer>

</body>

<script type="text/javascript">
    function carregar() {
        if($('#codigo').val() != "") {
            $.ajax({
                method: "post",
                url: '../../models/verificacao.php',
                data: {codigo: $('#codigo').val()},
                success: function(data) {
                    if(data != "") {
                        $('#codigo').attr("readonly", "true");
                        $('#muda').show();
                        $('#carrega').hide();

                        $('#trabalho').html(data);

                        $('#notas').show();

                    } else {
                        alert("Código Inválido");
                    }
                }
            });
        }  
    }

    function mudar() {
        $('#codigo').removeAttr("readonly");
        $('#codigo').val("");
        $('#muda').hide();
        $('#carrega').show();

        $('#notas').hide();
        $('#nota1').val("");
        $('#nota2').val("");
        $('#nota3').val("");
        $('#nota4').val("");
    }
</script>

<script type="text/javascript">
    var codigo = <?= $codigo ?>;

    if(codigo == 1)
    alert("Registrado com sucesso!");

    window.location.href = 'http://' + window.location.hostname + window.location.pathname;
</script>


<!-- Trava submissão pelo butão enter -->
<script type="text/javascript">
    $(document).ready(function () {
        $('input').keypress(function (e) {
            var code = null;
            code = (e.keyCode ? e.keyCode : e.which);                
            return (code == 13) ? false : true;
        });
    });      
</script>

<!-- Verifica o preenchimento dos dados do formulário -->
<script type="text/javascript">
   function verificacao() {
        if($('#nota1').val() == "") {
            alert('Por favor, preencha todos os campos!');
            document.all['nota1'].focus();
            return false;
        }
        if($('#nota2').val() == "") {
            alert('Por favor, preencha todos os campos!');
            document.all['nota2'].focus();
            return false;
        }
        if($('#nota3').val() == "") {
            alert('Por favor, preencha todos os campos!');
            document.all['nota3'].focus();
            return false;
        }
        if($('#nota4').val() == "") {
            alert('Por favor, preencha todos os campos!');
            document.all['nota4'].focus();
            return false;
        }  
    }
</script>


</html>
