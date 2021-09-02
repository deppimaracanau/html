<?php 
	session_start();
	header("Content-type: text/html; charset=utf-8");


 	if(!@($conexao=pg_connect ("host=localhost dbname=pesquisa port=5432 user=postgres password=#D3pp1.2019/2.0"))) {
  		print "Não foi possível estabelecer uma conexão com o banco de dados.";
  	} 
  	else {

  		//pegar informações da sessão form1
  		$nome =	$_COOKIE['nome']; //ok
  		$siape = $_COOKIE['siape']; //ok
 		$email = $_COOKIE['email']; //ok
 		$link_lattes = $_COOKIE['link_lattes']; //ok
  		$eixo_tecnologico =	$_COOKIE['eixo_tecnologico']; //ok
  		$laboratorio =	$_COOKIE['laboratorio']; //ok
  		$emailLab = $_COOKIE['emailLab'];
  		$telefoneLab = $_COOKIE['telefoneLab'];
  		$atualizacao = $_COOKIE['atualizacoes'];
  		$novoCoordenador = $_COOKIE['novoCoordenador'];
  		$novoSiape = $_COOKIE['novoSiape'];
  		$novoNomeLab = $_COOKIE['novoNomeLab'];
  		$novaSiglaLab = $_COOKIE['novaSiglaLab'];
  		$areas = $_COOKIE['areas'];
  		$apresentacao = $_COOKIE['apresentacao'];

  		//pegar informações da sessão form2
  		$nd_bolsa_extensao = $_COOKIE['qtd_bolsa_extensao'];
  		$nd_voluntarios = $_COOKIE['qtd_voluntarios'];
  		$qtd_professores = $_COOKIE['qtd_professores'];
  		$qtd_disciplinas = $_COOKIE['qtd_disciplinas']; 
  		$cursos = $_COOKIE['cursos'];
    	$tcc = $_COOKIE['tcc'];
    	$desc_produto = $_COOKIE['desc_produto'];
    	$desc_servicos = $_COOKIE['descricaoServicos'];

  		//pegar informações form3
  		$qtd_publicacao1 = $_COOKIE['publicacoes1'];
  		$qtd_publicacao2 = $_COOKIE['publicacoes2'];

  		//pegar informações form4
  		$qtd_pesquisa1 = $_COOKIE['pesquisa1'];
  		$qtd_pesquisa2 = $_COOKIE['pesquisa2'];

  		//pegar informações form5
  		$qtd_extensao1 = $_COOKIE['extensao1'];
    	$qtd_extensao2 = $_COOKIE['extensao2'];

	    //Inserindo informações no banco
		$sql = pg_query("INSERT INTO dados_gerais(nome,siape,email,lattes_url,eixo,laboratorio,descricao_produto, descricao_servicos, email_lab, telefone_lab, cursos, areas, apresentacao)values('$nome','$siape','$email','$link_lattes','$eixo_tecnologico','$laboratorio','$desc_produto', '$desc_servicos','$emailLab','$telefoneLab','$cursos','$areas','$apresentacao')")
			  	or die ("Erro no registro das informações, por favor, entre em contato pelo email: formulario.pesquisa.2018.ifce@gmail.com");

		$sql = pg_query("INSERT INTO quantidades(id_siape, qtd_bolsistas,qtd_voluntarios,qtd_disciplinas,qtd_professores,qtd_periodico,qtd_congresso,qtd_tcc,qtd_pesquisa_fomento,qtd_pesquisa_semfomento,qtd_extensao_fomento, qtd_extensao_semfomento)values('$siape','$nd_bolsa_extensao','$nd_voluntarios','$qtd_disciplinas', '$qtd_professores', '$qtd_publicacao1','$qtd_publicacao2','$tcc','$qtd_pesquisa1','$qtd_pesquisa2', '$qtd_extensao1', '$qtd_extensao2')")
			  	or die ("Erro no registro das informações, por favor, entre em contato pelo email: formulario.pesquisa.2018.ifce@gmail.com");

		
		// Atualização
		if($atualizacao == 1) {
			$sql = pg_query("INSERT INTO pedidos_alteracao(id_siape_antigo,nome_antigo,id_novo_siape,novo_coordenador, nome_lab, nova_sigla)values('$siape','$nome','$novoSiape','$novoCoordenador', '$novoNomeLab', '$novaSiglaLab')")
	  		or die ("Erro no registro das informações, por favor, entre em contato pelo email: formulario.pesquisa.2018.ifce@gmail.com");
	  	}
		
		//form1
	  	/*if($qtd_professores>0){
	  		for ($i=1; $i <= $qtd_professores ; $i++) {

	  			$professor = $_COOKIE['professor'.$i];
        		$lattesProf = $_COOKIE['lattesProf'.$i];
	  			
				$sql = pg_query("INSERT INTO professores(id_siape,nome,lattes_url)values('$siape','$professor','$lattesProf')")
	  	or die ("Erro no comando SQL 2");
			}
	  	}*/

	  	$qtd_prof = $_COOKIE['qtd_professores'];
		if($qtd_prof>0){
		 	for ($i=1; $i <= $qtd_prof ; $i++) {
		 		$professor = $_COOKIE['professor'.$i];
        		$lattesProf = $_COOKIE['lattesProf'.$i];

				$sql = pg_query("INSERT INTO professores(id_siape,nome,lattes_url)values('$siape','$professor','$lattesProf')")
	  	or die ("Erro no registro das informações, por favor, entre em contato pelo email: formulario.pesquisa.2018.ifce@gmail.com");
		 	}
		}

		//form4
		if( $qtd_pesquisa1 > 5){
        	$qtd_pesquisa1 = 5;
    	}

	  	if($qtd_pesquisa1>0){
	  		for ($i=1; $i <= $qtd_pesquisa1 ; $i++) {

	  			$titulo = $_COOKIE['titulo1'.$i];
	  			$fomento = $_COOKIE['fomento'.$i];
	  			$alunosTecnico = $_COOKIE['alunosTecnico1'.$i];
	  			$alunosGraduacao = $_COOKIE['alunosGraduacao1'.$i];
	  			$alunosPos = $_COOKIE['alunosPos1'.$i];
	  			
				$sql = pg_query("INSERT INTO projetos(id_siape,nome_projeto,fomento,alunos_tecnico,alunos_graduacao,alunos_pos)values('$siape','$titulo','$fomento','$alunosTecnico','$alunosGraduacao','$alunosPos')")
	  	or die ("Erro no registro das informações, por favor, entre em contato pelo email: formulario.pesquisa.2018.ifce@gmail.com");
			}
	  	}
		
		if( $qtd_pesquisa2 > 5){
         	$qtd_pesquisa2 = 5;
    	}

		if($qtd_pesquisa2>0){
	  		for ($i=1; $i <= $qtd_pesquisa2 ; $i++) {

	  			$titulo = $_COOKIE['titulo2'.$i];
	  			$alunosTecnico = $_COOKIE['alunosTecnico2'.$i];
	  			$alunosGraduacao = $_COOKIE['alunosGraduacao2'.$i];
	  			$alunosPos = $_COOKIE['alunosPos2'.$i];
	  			
				$sql = pg_query("INSERT INTO projetos(id_siape,nome_projeto,fomento,alunos_tecnico,alunos_graduacao,alunos_pos)values('$siape','$titulo','Sem Fomento','$alunosTecnico','$alunosGraduacao','$alunosPos')")
	  			or die ("Erro no registro das informações, por favor, entre em contato pelo email: formulario.pesquisa.2018.ifce@gmail.com");
			}
	  	}

 		//form 5
 		if( $qtd_extensao1 > 5){
	        $qtd_extensao1 = 5;
	    }

 		if($qtd_extensao1>0){
 			for ($i=1; $i <= $qtd_extensao1 ; $i++) {
 				$titulo = $_COOKIE['titulo51'.$i];
 				$fomento = $_COOKIE['fomento5'.$i];
 				$alunosTecnico = $_COOKIE['alunosTecnico51'.$i];
	  			$alunosGraduacao = $_COOKIE['alunosGraduacao51'.$i];
	  			$alunosPos = $_COOKIE['alunosPos51'.$i];
	  			

	  			$sql = pg_query("INSERT INTO extensao(id_siape,titulo,fomento,alunos_tecnico, alunos_graduacao,alunos_pos)values('$siape','$titulo','$fomento', '$alunosTecnico', '$alunosGraduacao','$alunosPos')")
	  			or die ("Erro no registro das informações, por favor, entre em contato pelo email: formulario.pesquisa.2018.ifce@gmail.com");

	  		}
 		}

 		if( $qtd_extensao2 > 5){
	        $qtd_extensao2 = 5;
	    }

 		if($qtd_extensao2>0){
 			for ($i=1; $i <= $qtd_extensao2 ; $i++) {
 				$titulo = $_COOKIE['titulo52'.$i];
 				$alunosTecnico = $_COOKIE['alunosTecnico52'.$i];
	  			$alunosGraduacao = $_COOKIE['alunosGraduacao52'.$i];
	  			$alunosPos = $_COOKIE['alunosPos52'.$i];

	  			$sql = pg_query("INSERT INTO extensao(id_siape,titulo,fomento,alunos_tecnico,alunos_graduacao,alunos_pos)values('$siape','$titulo','SEM FOMENTO', '$alunosTecnico', '$alunosGraduacao','$alunosPos')")
	  	or die ("Erro no registro das informações, por favor, entre em contato pelo email: formulario.pesquisa.2018.ifce@gmail.com");

	  		}
 		}

		$nome00 = $_COOKIE['nome'];
		$email00 = $_COOKIE['email'];
		header('Content-Type: text/html; charset=UTF-8');


		/*Código para enviar email, necessário permitir nas configurações do gmail*/
		require_once('./PHPMailer/PHPMailerAutoload.php');

		$mail = new PHPMailer();
		$mail->isSMTP();
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = 'ssl';
		$mail->Host = 'ssl://smtp.gmail.com';
		$mail->Port = '465';
		$mail->isHTML();

		$mail->Username = 'formulario.pesquisa.2018.ifce@gmail.com';
		$mail->Password = 'd3pp1d3pp12018';
		//$mail->SetFrom('no-reply@howcode.org');
		$nome_email = mb_convert_encoding("IFCE Campus Maracanaú - DEPPI","auto", "UTF-8");

		$mail->SetFrom("formulario.pesquisa.2018.ifce@gmail.com", "$nome_email");
		//Converter texto para utf-8
		$subject = mb_convert_encoding('Formulário Pesquisa IFCE 2018',"auto", "UTF-8");
		$mail->Subject = $subject;
		$body = mb_convert_encoding('Olá, '.$nome00.' <br><br>Suas informações foram cadastradas com sucesso! O Resultado Parcial será divulgado no dia 06/04.<br><br>Att,',"auto", "UTF-8");
		$mail->Body = $body;
		$mail->AddAddress($email00);
		
		if(!$mail->Send()) {
			echo 'Erro:'.$mail->ErrorInfo;
		} else {
			echo 'Email enviado!';
		}
		
	    //fechando conexao
		pg_close ($conexao);

		header("Location:../forms/FIM.html");


  	}
?>
