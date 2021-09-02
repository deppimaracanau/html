<?php 
include("mpdf60/mpdf.php");
if(!@($conexao=pg_connect ("host=localhost dbname=pesquisa port=5432 user=postgres password=#D3pp1.2019/2.0"))) {
	print "Não foi possível estabelecer uma conexão com o banco de dados.";
} 
else {

	//TABELA: dados_gerais
    //Consulta para pegar dados em ordem alfabetica eixo e coordenador
	$consulta1 = pg_query($conexao, "SELECT * FROM dados_gerais ORDER BY eixo,nome ASC;"); 

    //TABELA: dados_gerais
    //Verificando se consulta deu erro ou se retornou nenhum registro
	if (!$consulta1) {
		echo "Consulta não foi executada!";
	}
	if(pg_num_rows($consulta1) == 0) {
		echo "Tabela está vazia!";
	}

	$i=0;

    //Capa do relatório
    $html .= '<h1><img src="imagens/campus.png" height="160" width="109"></h1>';
    $html .= '<br><br><br><br><br><br><br><br><br>';
	$html .= '<br><h1>Relatório Formulário de Atividades de Extensão, Pesquisa e Inovação 2018</h1><br>';
	$html .= '<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';
	$html .= '<h5>DEPPI - Departamento de Extensão, Pesquisa, Pós-Graduação e Inovação</h5>';
	$html .= '<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';

	//Apresentação

	$html .= '<h2>Apresentação</h2>';
	$html .= '<p>O formulário de levantamento de atividades de extensão, pesquisa e inovação é uma importante ferramenta que auxilia a comunidade acadêmica do campus Maracanaú a refletir sobre as diversas ações realizadas em seus laboratórios.</p>';
	$html .= '<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';

	//Cabeçalho do relatório
	$html .= '<img src="imagens/logo2.png" height="94" width="349">';
	$html .= '<br>';
	$html .= '<br><span><h3>Relatório Formulário de Atividades de Extensão, Pesquisa e Inovação 2018</h3><br></span>';

	while($row = pg_fetch_array($consulta1)) {
       
		$_SESSION['siape'.$i] = $row[2];
		$_SESSION['nome_coordenador'.$i] = $row[1];
		$_SESSION['eixo'.$i] = $row[5];
		$_SESSION['nome_lab'.$i] = $row[6];
		$_SESSION['areas'.$i] = $row[12];
		$_SESSION['apresentacao'.$i] = $row[13];
		$_SESSION['tecnologia'.$i] = $row[7];
		$_SESSION['servico'.$i] = $row[8];
		$_SESSION['cursos'.$i] = $row[11];

		//TABELA: dados_gerais e professores
		$consulta2 = pg_query($conexao, "SELECT professores.nome FROM professores INNER JOIN dados_gerais ON professores.id_siape = '".$_SESSION['siape'.$i]."' GROUP BY professores.nome;");

	    //Verificando se consulta deu erro ou se retornou nenhum registro
		if (!$consulta2) {
			echo "Consulta não foi executada!";
		}
		if(pg_num_rows($consulta2) == 0) {
			echo "Dados do laboratório ainda não foram adicionados.";
		}

		//Corpo do relatório
		$html .= '<b>Coodenador</b>: '.$_SESSION['nome_coordenador'.$i].'<br>';
		$html .= '<b>Laboratório</b>: '.$_SESSION['nome_lab'.$i].'<br>';
		$html .= '<b>Eixo</b>: '.$_SESSION['eixo'.$i].'';
		$html .= '<fieldset>';
		$html .= '<p><b>Áreas de Pesquisa:</b> '.$_SESSION['areas'.$i].'</p>';
		$html .= '<p><b>Descrição do Laboratório:</b> '.$_SESSION['apresentacao'.$i].'</p>';
		$html .= '<p><b>Cursos atendidos:</b> '.$_SESSION['cursos'.$i].'</p>';
		$html .= '<p><b>Tecnologias com potencial de transferência tecnológica:</b> '.$_SESSION['tecnologia'.$i].'</p>';  
		$html .= '<p><b>Prestação de Serviços Tecnológicos:</b> '.$_SESSION['servico'.$i].'</p>';
		$html .= '<p><b>Professores que auxiliam:</b> ';
		$j=0;
		while($row2 = pg_fetch_array($consulta2)) {
			$html .= $row2[0].'; ';
			$j++;
		}
		$html .= '</p>';
		$html .= '</fieldset><br>';

		$i++;
	}



	$mpdf=new mPDF(); 
	$mpdf->SetDisplayMode('fullpage');
	$css = file_get_contents("css/estilo_pdf.css");
	$mpdf->WriteHTML($css,1);
	$mpdf->WriteHTML($html);
		$mpdf->Output('relatorio.pdf', 'I');//'D'

		exit;
	}
?>