<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Relatório RIT</title>
		<link rel="icon" href="../favicon.ico">

	    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	    <link href="../css/estilo.css" rel="stylesheet">
	    <link href="../css/pit_ritCSS.css" rel="stylesheet">
	    <link href="../css/BodyForm.css" rel="stylesheet">

	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	    <script src="../bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../js/jquery.mask.min.js"/></script>
		
	</head>

	<body onload="gerarLista()">
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
	          <a href="../index.php" class="navbar-brand"><span class="logo">IFCE</span></a>
	        </div>  

	        <div class="collapse navbar-collapse" id="barra-navegacao">
	          <ul class="nav navbar-nav navbar-right">
	          	<li> <a href="../index.php">INÍCIO</a> </li>
	            <li> <a href="../PIT/orientacoesPIT.php">PIT</a> </li>
	            <li> <a href="../RIT/orientacoesRIT.php">RIT</a> </li>
	            <li> <a href="#" data-toggle="modal" data-target="#janelaAjuda">AJUDA</a> </li>
	          </ul>
	        </div>       

	      </div>
	    </nav>

	    <?php require_once('../ajuda.php') ?>

	    <br><br><br><br><br>

		<form method="post" onsubmit="return verificacao();" target="_blank" action="relatorioRIT.php">
			<div class="container" id="rit">

				<br>
		  		<center> <h1>RELATÓRIO DE ATIVIDADES DOCENTES (RIT)</h1> </center>
		        <br>

				<div class="row">
					<div class="col-sm-12">
						<h3>Referente ao Semestre Letivo:</h3>
						<input type="text" name="semestre" id="semestre" class="form-control" placeholder="xxxx.x">
					</div>
				</div>

				<br><br><hr/><br>

				<h1 class= "page-header">IDENTIFICAÇÃO DO SERVIDOR</h1>

				<div class="row">
					<div class="col-sm-8">
						Nome: 
						<input type="text" name="nome" id="nome" class="form-control">
					</div>
					<div class="col-sm-4">
						Matricula SIAPE:
						<input type="text" name="siape" id="siape" class="form-control">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-7">
						Curso ou Departamento:
						<input type="text" name="curso" id="curso" class="form-control">
					</div>
					<div class="col-sm-5">
						Campus: 
						<input type="text"  value="Maracanaú" name="campus" id="campus" class="form-control">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						Fone:
						<input type="tel" name="telefone" id="telefone" class="form-control" pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}" placeholder="(00) 0000-0000">
						<script type="text/javascript">$('#telefone').mask('(00) 0000-00009');</script>
					</div>
					<div class="col-sm-8">
						Email:
						<input type="email" name="email" id="email" class="form-control">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						Tipo de vínculo:
						<select class="form-control" name="vinculo" id="vinculo">
							<option value="">Selecione</option>
							<option value="Efetivo">Efetivo</option>
							<option value="Substituto">Substituto</option>
							<option value="Temporário">Temporário</option>
							<option value="Colaboração Técnica">Colaboração Técnica</option>
						</select>
					</div>
					<div class="col-sm-6">
						Regime de Trabalho:
						<select class="form-control" name="regime" id="regime">
							<option value="">Selecione</option>
							<option value="40h D.E.">40h D.E.</option>
				            <option value="40h">40h</option>
				            <option value="20h">20h</option>
						</select>
					</div>
				</div>
				
				<br><br><hr/><br>

				<h1 class= "page-header">ATIVIDADES DOCENTES DESENVOLVIDAS NO SEMESTRE LETIVO</h1>
				<h2>ATIVIDADES DE ENSINO</h2>
				<h4 class="texto">Listar disciplinas ministradas, orientações de alunos concluídas no decorrer do semestre ou em andamento, horários disponibilizados para o atendimento ao aluno, e demais atividades de ensino descritas no Plano de Trabalho Docente.</h4>
				<textarea class="caixaRelatorio" name="campoTexto1" id="campoTexto1"></textarea>

				<h2>ATIVIDADES DE PESQUISA APLICADA</h2>
				<h4 class="texto">Relatar o andamento dos projetos e demais atividades de pesquisa aplicada listadas no Plano de Trabalho Docente. No caso de projetos, indicar o cronograma de execução (prazos atuais) e as atividades desenvolvidas no decorrer do semestre.</h4>
				<textarea class="caixaRelatorio" name="campoTexto2" id="campoTexto2"></textarea>

				<h2>ATIVIDADES DE EXTENSÃO</h2>
				<h4 class="texto">Relatar o andamento dos projetos e demais atividades de extensão listadas no Plano de Trabalho Docente. No caso de projetos ou programas, indicar o cronograma de execução (prazos atuais) e as atividades desenvolvidas no decorrer do semestre.</h4>
				<textarea class="caixaRelatorio" name="campoTexto3" id="campoTexto3"></textarea>

				<h2>ATIVIDADES DE GESTÃO</h2>
				<h4 class="texto">Descrever as principais atividades desenvolvidas na gestão institucional do IFCE de acordo com a função; ou atividades em comissões/fiscalizações realizadas no decorrer do semestre de acordo com o Plano de Trabalho Docente.</h4>
				<textarea class="caixaRelatorio" name="campoTexto4" id="campoTexto4"></textarea>

				<h2>ATIVIDADES DE CAPACITAÇÃO</h2>
				<h4 class="texto">Descrever o andamento das atividades de capacitação realizada e seu cronograma atual.</h4>
				<textarea class="caixaRelatorio" name="campoTexto5" id="campoTexto5"></textarea>

				<br><br><br><hr/><br>

				<h1 class= "page-header">DISTRIBUIÇÃO DE CARGA HORÁRIA DO DOCENTE NO SEMESTRE ANTERIOR</h1>
				<div class="col-sm-6" style="margin-bottom: 10px">
					<select class="form-control" id="escolhas"></select>
				</div>
				<div class="col-sm-6">
	    			<center><button type="button" class="btn btn-info" onclick="selecaoMultipla()">Carregar valor nos campos selecionados</button></center>
				</div>
				<br><br><br>
				<table class="table table-striped">
                  <tr>
                    <th></th>
                    <th></th>
                    <th>Segunda</th>
                    <th>Terça</th>
                    <th>Quarta</th>
                    <th>Quinta</th>
                    <th>Sexta</th>
                  </tr>
                  <tr>
                    <th rowspan="4">Manhã</th>
                    <th>A</th>
                    <th> <input class="btn btn-default botaoSel" readonly="true" onclick="selecao(1)" name="campo1" id="campo1" value="" placeholder="Clique para selecionar" />  </th>
                    <th> <input class="btn btn-default botaoSel" readonly="true" onclick="selecao(2)" name="campo2" id="campo2" value="" placeholder="Clique para selecionar" />  </th>
                    <th> <input class="btn btn-default botaoSel" readonly="true" onclick="selecao(3)" name="campo3" id="campo3" value="" placeholder="Clique para selecionar" />  </th>
                    <th> <input class="btn btn-default botaoSel" readonly="true" onclick="selecao(4)" name="campo4" id="campo4" value="" placeholder="Clique para selecionar" />  </th>
                    <th> <input class="btn btn-default botaoSel" readonly="true" onclick="selecao(5)" name="campo5" id="campo5" value="" placeholder="Clique para selecionar" />  </th>
                  </tr>
                  <tr>  
                    <th>B</th>
                    <th> <input class="btn btn-default botaoSel" readonly="true" onclick="selecao(6)" name="campo6" id="campo6" value="" placeholder="Clique para selecionar" />  </th>
                    <th> <input class="btn btn-default botaoSel" readonly="true" onclick="selecao(7)" name="campo7" id="campo7" value="" placeholder="Clique para selecionar" />  </th>
                    <th> <input class="btn btn-default botaoSel" readonly="true" onclick="selecao(8)" name="campo8" id="campo8" value="" placeholder="Clique para selecionar" />  </th>
                    <th> <input class="btn btn-default botaoSel" readonly="true" onclick="selecao(9)" name="campo9" id="campo9" value="" placeholder="Clique para selecionar" />  </th>
                    <th> <input class="btn btn-default botaoSel" readonly="true" onclick="selecao(10)" name="campo10" id="campo10" value="" placeholder="Clique para selecionar" />  </th>
                  </tr>
                  <tr>  
                    <th>C</th>
                    <th> <input class="btn btn-default botaoSel" readonly="true" onclick="selecao(11)" name="campo11" id="campo11" value="" placeholder="Clique para selecionar" />  </th>
                    <th> <input class="btn btn-default botaoSel" readonly="true" onclick="selecao(12)" name="campo12" id="campo12" value="" placeholder="Clique para selecionar" />  </th>
                    <th> <input class="btn btn-default botaoSel" readonly="true" onclick="selecao(13)" name="campo13" id="campo13" value="" placeholder="Clique para selecionar" />  </th>
                    <th> <input class="btn btn-default botaoSel" readonly="true" onclick="selecao(14)" name="campo14" id="campo14" value="" placeholder="Clique para selecionar" />  </th>
                    <th> <input class="btn btn-default botaoSel" readonly="true" onclick="selecao(15)" name="campo15" id="campo15" value="" placeholder="Clique para selecionar" />  </th>
                  </tr>
                  <tr>  
                    <th>D</th>
                    <th> <input class="btn btn-default botaoSel" readonly="true" onclick="selecao(16)" name="campo16" id="campo16" value="" placeholder="Clique para selecionar" />  </th>
                    <th> <input class="btn btn-default botaoSel" readonly="true" onclick="selecao(17)" name="campo17" id="campo17" value="" placeholder="Clique para selecionar" />  </th>
                    <th> <input class="btn btn-default botaoSel" readonly="true" onclick="selecao(18)" name="campo18" id="campo18" value="" placeholder="Clique para selecionar" />  </th>
                    <th> <input class="btn btn-default botaoSel" readonly="true" onclick="selecao(19)" name="campo19" id="campo19" value="" placeholder="Clique para selecionar" />  </th>
                    <th> <input class="btn btn-default botaoSel" readonly="true" onclick="selecao(20)" name="campo20" id="campo20" value="" placeholder="Clique para selecionar" />  </th>
                  </tr>
                  <tr>
                    <th rowspan="4">Tarde</th>
                    <th>A</th>
                    <th> <input class="btn btn-default botaoSel" readonly="true" onclick="selecao(21)" name="campo21" id="campo21" value="" placeholder="Clique para selecionar" />  </th>
                    <th> <input class="btn btn-default botaoSel" readonly="true" onclick="selecao(22)" name="campo22" id="campo22" value="" placeholder="Clique para selecionar" />  </th>
                    <th> <input class="btn btn-default botaoSel" readonly="true" onclick="selecao(23)" name="campo23" id="campo23" value="" placeholder="Clique para selecionar" />  </th>
                    <th> <input class="btn btn-default botaoSel" readonly="true" onclick="selecao(24)" name="campo24" id="campo24" value="" placeholder="Clique para selecionar" />  </th>
                    <th> <input class="btn btn-default botaoSel" readonly="true" onclick="selecao(25)" name="campo25" id="campo25" value="" placeholder="Clique para selecionar" />  </th>
                  </tr>
                  <tr>  
                    <th>B</th>
                    <th> <input class="btn btn-default botaoSel" readonly="true" onclick="selecao(26)" name="campo26" id="campo26" value="" placeholder="Clique para selecionar" />  </th>
                    <th> <input class="btn btn-default botaoSel" readonly="true" onclick="selecao(27)" name="campo27" id="campo27" value="" placeholder="Clique para selecionar" />  </th>
                    <th> <input class="btn btn-default botaoSel" readonly="true" onclick="selecao(28)" name="campo28" id="campo28" value="" placeholder="Clique para selecionar" />  </th>
                    <th> <input class="btn btn-default botaoSel" readonly="true" onclick="selecao(29)" name="campo29" id="campo29" value="" placeholder="Clique para selecionar" />  </th>
                    <th> <input class="btn btn-default botaoSel" readonly="true" onclick="selecao(30)" name="campo30" id="campo30" value="" placeholder="Clique para selecionar" />  </th>
                  </tr>
                  <tr>  
                    <th>C</th>
                    <th> <input class="btn btn-default botaoSel" readonly="true" onclick="selecao(31)" name="campo31" id="campo31" value="" placeholder="Clique para selecionar" />  </th>
                    <th> <input class="btn btn-default botaoSel" readonly="true" onclick="selecao(32)" name="campo32" id="campo32" value="" placeholder="Clique para selecionar" />  </th>
                    <th> <input class="btn btn-default botaoSel" readonly="true" onclick="selecao(33)" name="campo33" id="campo33" value="" placeholder="Clique para selecionar" />  </th>
                    <th> <input class="btn btn-default botaoSel" readonly="true" onclick="selecao(34)" name="campo34" id="campo34" value="" placeholder="Clique para selecionar" />  </th>
                    <th> <input class="btn btn-default botaoSel" readonly="true" onclick="selecao(35)" name="campo35" id="campo35" value="" placeholder="Clique para selecionar" />  </th>
                  </tr>
                  <tr>
                    <th>D</th>
                    <th> <input class="btn btn-default botaoSel" readonly="true" onclick="selecao(36)" name="campo36" id="campo36" value="" placeholder="Clique para selecionar" />  </th>
                    <th> <input class="btn btn-default botaoSel" readonly="true" onclick="selecao(37)" name="campo37" id="campo37" value="" placeholder="Clique para selecionar" />  </th>
                    <th> <input class="btn btn-default botaoSel" readonly="true" onclick="selecao(38)" name="campo38" id="campo38" value="" placeholder="Clique para selecionar" />  </th>
                    <th> <input class="btn btn-default botaoSel" readonly="true" onclick="selecao(39)" name="campo39" id="campo39" value="" placeholder="Clique para selecionar" />  </th>
                    <th> <input class="btn btn-default botaoSel" readonly="true" onclick="selecao(40)" name="campo40" id="campo40" value="" placeholder="Clique para selecionar" />  </th>
                  </tr>
                  <tr>
                    <th rowspan="4">Noite</th>
                    <th>A</th>
                    <th> <input class="btn btn-default botaoSel" readonly="true" onclick="selecao(41)" name="campo41" id="campo41" value="" placeholder="Clique para selecionar" />  </th>
                    <th> <input class="btn btn-default botaoSel" readonly="true" onclick="selecao(42)" name="campo42" id="campo42" value="" placeholder="Clique para selecionar" />  </th>
                    <th> <input class="btn btn-default botaoSel" readonly="true" onclick="selecao(43)" name="campo43" id="campo43" value="" placeholder="Clique para selecionar" />  </th>
                    <th> <input class="btn btn-default botaoSel" readonly="true" onclick="selecao(44)" name="campo44" id="campo44" value="" placeholder="Clique para selecionar" />  </th>
                    <th> <input class="btn btn-default botaoSel" readonly="true" onclick="selecao(45)" name="campo45" id="campo45" value="" placeholder="Clique para selecionar" />  </th>
                  </tr>
                  <tr>  
                    <th>B</th>
                    <th> <input class="btn btn-default botaoSel" readonly="true" onclick="selecao(46)" name="campo46" id="campo46" value="" placeholder="Clique para selecionar" />  </th>
                    <th> <input class="btn btn-default botaoSel" readonly="true" onclick="selecao(47)" name="campo47" id="campo47" value="" placeholder="Clique para selecionar" />  </th>
                    <th> <input class="btn btn-default botaoSel" readonly="true" onclick="selecao(48)" name="campo48" id="campo48" value="" placeholder="Clique para selecionar" />  </th>
                    <th> <input class="btn btn-default botaoSel" readonly="true" onclick="selecao(49)" name="campo49" id="campo49" value="" placeholder="Clique para selecionar" />  </th>
                    <th> <input class="btn btn-default botaoSel" readonly="true" onclick="selecao(50)" name="campo50" id="campo50" value="" placeholder="Clique para selecionar" />  </th>
                  </tr>
                  <tr>  
                    <th>C</th>
                    <th> <input class="btn btn-default botaoSel" readonly="true" onclick="selecao(51)" name="campo51" id="campo51" value="" placeholder="Clique para selecionar" />  </th>
                    <th> <input class="btn btn-default botaoSel" readonly="true" onclick="selecao(52)" name="campo52" id="campo52" value="" placeholder="Clique para selecionar" />  </th>
                    <th> <input class="btn btn-default botaoSel" readonly="true" onclick="selecao(53)" name="campo53" id="campo53" value="" placeholder="Clique para selecionar" />  </th>
                    <th> <input class="btn btn-default botaoSel" readonly="true" onclick="selecao(54)" name="campo54" id="campo54" value="" placeholder="Clique para selecionar" />  </th>
                    <th> <input class="btn btn-default botaoSel" readonly="true" onclick="selecao(55)" name="campo55" id="campo55" value="" placeholder="Clique para selecionar" />  </th>
                  </tr>
                  <tr>
                    <th>D</th>
                    <th> <input class="btn btn-default botaoSel" readonly="true" onclick="selecao(56)" name="campo56" id="campo56" value="" placeholder="Clique para selecionar" />  </th>
                    <th> <input class="btn btn-default botaoSel" readonly="true" onclick="selecao(57)" name="campo57" id="campo57" value="" placeholder="Clique para selecionar" />  </th>
                    <th> <input class="btn btn-default botaoSel" readonly="true" onclick="selecao(58)" name="campo58" id="campo58" value="" placeholder="Clique para selecionar" />  </th>
                    <th> <input class="btn btn-default botaoSel" readonly="true" onclick="selecao(59)" name="campo59" id="campo59" value="" placeholder="Clique para selecionar" />  </th>
                    <th> <input class="btn btn-default botaoSel" readonly="true" onclick="selecao(60)" name="campo60" id="campo60" value="" placeholder="Clique para selecionar" />  </th>
                  </tr>
                </table>

				<div class="row"> <br>
		          <div class="col-xs-6">
		            <center> <a href="../index.html" class="btn btn-default botao">Voltar</a> </center>
		          </div>

		          <div class="col-xs-6">
		            <center> <button type="submit" class="btn btn-success botao">Gerar Relatório</button> </center>
		          </div>
		        </div>

				<br><br><br>

			</div> <!-- Fim Container -->
	
		</form>

		<!-- ------------------- Rodapé ------------------- -->
	      <footer>
	        <div class="container">
	          <div class="row">
	            <h5>DEPPI - Departamento de Extensão, Pesquisa, Pós-Graduação e Inovação</h5>
	          </div>
	        </div>
	      </footer>
	</body>

	<script type="text/javascript">
		var opcoes = '';
		var selecoes = [];
		var totalSelecionado = 0;
		var nome = ['Aula', 'Planejamento', 'Atendimento ao Aluno', 'Apoio de Ensino', 'Orientação', 'Extracurricular', 'Pesquisa', 'Extensão', 'Gestão', 'Comissões'];

		//Criação da variável opções
		function gerarLista() {
			opcoes = '<option selected disabled>Selecione o valor a ser carregado nos campos selecionados:</option>';
			opcoes += '<option value="">Limpar campos selecionados</option>';
			for (var k = 0; k < nome.length; k++)
			  	opcoes += '<option value="' + nome[k] + '">' + nome[k] + '</option>';
			$('#escolhas').append(opcoes);
		}

		// Clicando o botão
		function selecao(n) {

			$('#campo' + n).css("color","black");
			
			if($('#campo' + n).css("background-color") != "rgb(255, 255, 0)") {
				$('#campo' + n).css("background-color","yellow");
				selecoes.push(n);
				atual = n;
			} else {
				$('#campo' + n).css("background-color","white");
				selecoes.splice(selecoes.indexOf(n), 1);
			}

		}

		// Botão de seleção multipla
		function selecaoMultipla() {
			for (var n = 0; n < selecoes.length; n++) {
				if($('#escolhas').val() == "") {
					if($('#campo'+selecoes[n]).val() != "")
						totalSelecionado--;
				} else {
					totalSelecionado++;
				}
				$('#campo' + selecoes[n]).val($('#escolhas').val());
				$('#campo' + selecoes[n]).css("background-color","white");
				$('#campo' + selecoes[n]).css("color","black");
			}
			// Zerando o vetor
			selecoes = []; 
		}

	</script>

	<!-- Resgata Informações -->
	<script type="text/javascript">
		$(document).ready( function() {
			var info = "<?= $_COOKIE['nome']; ?>"; $("#nome").val(info);
			var info = "<?= $_COOKIE['siape']; ?>"; $("#siape").val(info);
			var info = "<?= $_COOKIE['curso']; ?>"; $("#curso").val(info);
			var info = "<?= $_COOKIE['campus']; ?>"; $("#campus").val(info);
			var info = "<?= $_COOKIE['telefone']; ?>"; $("#telefone").val(info);
			var info = "<?= $_COOKIE['email']; ?>"; $("#email").val(info);
			var info = "<?= $_COOKIE['vinculo']; ?>"; $("#vinculo").val(info);
			var info = "<?= $_COOKIE['regime']; ?>"; $("#regime").val(info);

			var info = "<?= $_COOKIE['campoTexto1']; ?>"; $("#campoTexto1").val(info);
			var info = "<?= $_COOKIE['campoTexto2']; ?>"; $("#campoTexto2").val(info);
			var info = "<?= $_COOKIE['campoTexto3']; ?>"; $("#campoTexto3").val(info);
			var info = "<?= $_COOKIE['campoTexto4']; ?>"; $("#campoTexto4").val(info);
			var info = "<?= $_COOKIE['campoTexto5']; ?>"; $("#campoTexto5").val(info);
			
        });
	</script>

	<!-- Verifica o preenchimento dos dados -->
	<script type="text/javascript">
		function verificacao() {
			if($('#semestre').val() == "") {
	        	alert('Por favor, preencha o campo Semestre!');
	        	document.all['semestre'].focus();
	        	return false;
	        }
	        if($('#nome').val() == "") {
	        	alert('Por favor, preencha o campo Nome!');
	        	document.all['nome'].focus();
	        	return false;
	        }
	        if($('#siape').val() == "") {
	        	alert('Por favor, preencha o campo SIAPE!');
	        	document.all['siape'].focus();
	        	return false;
	        }
	        if($('#curso').val() == "") {
	        	alert('Por favor, preencha o campo Curso ou Departamento!');
	        	document.all['curso'].focus();
	        	return false;
	        }
	        if($('#campus').val() == "") {
	        	alert('Por favor, preencha o campo Campus!');
	        	document.all['campus'].focus();
	        	return false;
	        }
	        if($('#telefone').val() == "") {
	        	alert('Por favor, preencha o campo Fone!');
	        	document.all['telefone'].focus();
	        	return false;
	        }
	        if($('#email').val() == "") {
	        	alert('Por favor, preencha o campo Email!');
	        	document.all['email'].focus();
	        	return false;
	        }
	        if($('#vinculo').val() == "") {
	        	alert('Por favor, preencha o campo Tipo de Vínculo!');
	        	document.all['vinculo'].focus();
	        	return false;
	        }
	        if($('#regime').val() == "") {
	        	alert('Por favor, preencha o campo Regime de Trabalho!');
	        	document.all['regime'].focus();
	        	return false;
	        }

	        // veririficacao da distribuicao de horas
	        if($('#regime').val() == '20h'){
	        	if(totalSelecionado < 20) {
		        	alert('Por favor, distribua todas as 20 horas!');
		        	return false;
		        }
	        } else {
	        	if(totalSelecionado < 40) {
		        	alert('Por favor, distribua todas as 40 horas!');
		        	return false;
		        }
	        }
	    }
	</script>

</html>