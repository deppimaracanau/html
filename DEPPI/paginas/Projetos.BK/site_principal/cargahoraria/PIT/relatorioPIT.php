<?php
	
	// Estabelece os cookies
	setcookie("nome", $_POST['nome'], time() + (86400 * 30), "/");
	setcookie("siape", $_POST['siape'], time() + (86400 * 30), "/");
	setcookie("curso", $_POST['curso'], time() + (86400 * 30), "/");
	setcookie("campus", $_POST['campus'], time() + (86400 * 30), "/");
	setcookie("telefone", $_POST['telefone'], time() + (86400 * 30), "/");
	setcookie("email", $_POST['email'], time() + (86400 * 30), "/");
	setcookie("vinculo", $_POST['vinculo'], time() + (86400 * 30), "/");
	setcookie("regime", $_POST['regime'], time() + (86400 * 30), "/");
  
	include("../mpdf60/mpdf.php");

	// Cabeçalho
    $html .= '
    	<div class="container" id="rit">

    		<h3><img src="../imagens/brasao.png" width="70"></h3>
    		<h3>MINISTÉRIO DA EDUCAÇÃO</h3>
    		<h3>SECRETARIA DE EDUCAÇÃO PROFISSIONAL E TECNOLÓGICA INSTITUTO FEDERAL DE EDUCAÇÃO CIÊNCIA E TECNOLOGIA DO CEARÁ</h3>
    		<h3>PLANO DE TRABALHO DOCENTE (PIT)</h3>
	    	

			<br><hr/><br>

			<table class="tabelaDados">
	    		<tr>
	    			<th>Referente ao Semestre Letivo: </tr>
	    			<th class="celula2">' . $_POST['semestre'] . '</tr>
	    		</tr>
	    	</table>

	    	<h3 class= "page-header">IDENTIFICAÇÃO DO SERVIDOR</h3>

			<table class="tabelaDados">
	    		<tr>
	    			<th class="celula1">Nome: </tr>
	    			<th class="celula2">' . $_POST['nome'] . '</tr>
	    			<th class="celula1">Matrícula: </tr>
	    			<th class="celula2">' . $_POST['siape'] . '</tr>
	    		</tr>
	    		
	    		<tr>
	    			<th class="celula1">Curso: </tr>
	    			<th class="celula2">' . $_POST['curso'] . '</tr>
	    			<th class="celula1">Campus: </tr>
	    			<th class="celula2">' . $_POST['campus'] . '</tr>
	    		</tr>
	   
	    		<tr>
	    			<th class="celula1">Telefone: </tr>
	    			<th class="celula2">' . $_POST['telefone'] . '</tr>
	    			<th class="celula1">Email: </tr>
	    			<th class="celula2">' . $_POST['email'] . '</tr>
	    		</tr>
	    		
	    		<tr>
	    			<th class="celula1">Vínculo: </tr>
	    			<th class="celula2">' . $_POST['vinculo'] . '</tr>
	    			<th class="celula1">Regime: </tr>
	    			<th class="celula2">' . $_POST['regime'] . '</tr>
	    		</tr>
	    		
	    	</table>

			<br><hr/><br>';

	// Corpo
    $html .= '
			<h2>ATIVIDADES DOCENTES</h2>
			<h3>ATIVIDADES DE ENSINO</h3>

			<h4>Aulas em FIC, Técnico, Especialização Técnica, Graduação e Pós-graduação</h4> <!-- PARTE 1 -->
			<table>
		        <tr>
		          <th class="opcoes">Cursos Técnico e/ou Licenciaturas, com base na lei 11.892 de 29 de dezembro de 2008</th>
		          <th class="quant"> ' . $_POST['t1'] . ' </th>
		        </tr>
		        <tr>
		          <th class="opcoes">Cursos de Especialização Técnica, Graduação e Pós-graduação (lato sensu e stricto sensu)</th>
		          <th class="quant"> ' . $_POST['t2'] . ' </th>
		        </tr>
		        <tr>
		          <th class="opcoes">Cursos FIC (Observar o Art.7, §4º regulamentação da carga horária)</th>
		          <th class="quant"> ' . $_POST['t3'] . ' </th>
		        </tr>
		    </table>

			<h4>Atividades de Manutenção ao Ensino (até 45% do Regime de Trabalho)</h4> <!-- PARTE 2 -->
			<table class="table table-striped">
		        <tr>
		          <th class="opcoes">Preparação + Planejamento</th>
		          <th class="quant"> ' . $_POST['t4'] . ' </th>
		        </tr>
		        <tr>
		          <th class="opcoes">Atendimento a Estudantes</th>
		          <th class="quant"> ' . $_POST['t5'] . ' </th>
		        </tr>
		    </table>

			<h4>Atividades de Apoio ao Ensino (2 Horas)</h4> <!-- PARTE 3 -->
			<table class="table table-striped">
		        <tr>
		          <th class="opcoes">Participação nos encontros técnico-pedagógicos, reuniões com os diversos setores da gestão</th>
		          <th class="quant"> ' . $_POST['t6'] . ' </th>
		        </tr>
		    </table>			

			<h4>Atividades de Orientação (até 10 Horas)</h4> <!-- PARTE 4 -->
			<table class="table table-striped">
		        <tr>
		          <th class="opcoes">Orientação de TCC graduação</th>
		          <th class="quant"> ' . $_POST['t7'] . ' </th>
		        </tr>
		        <tr>
		          <th class="opcoes">Orientação de Estágio Supervisionado (Supervisor-Orientador)</th>
		          <th class="quant"> ' . $_POST['t8'] . ' </th>
		        </tr>
		        <tr>
		          <th class="opcoes">Orientação de Estágio Supervisionado (Curso com regulamentação diferenciada em Conselho de Classe Profissional)</th>
		          <th class="quant"> ' . $_POST['t9'] . ' </th>
		        </tr>
		        <tr>
		          <th class="opcoes">Monitoria</th>
		          <th class="quant"> ' . $_POST['t10'] . ' </th>
		        </tr>
		        <tr>
		          <th class="opcoes">Programa Institucional de Bolsas de Iniciação à Docência (PIBID) ou outro programa voltado a Permanência e Êxito</th>
		          <th class="quant"> ' . $_POST['t11'] . ' </th>
		        </tr>
		    </table>		

			<h4>Atividades de Ensino Extracurricular (até 25% do Regime de Trabalho)</h4>
			<!-- PARTE 5 -->
			<table class="table table-striped">
		        <tr>
		          <th class="opcoes">Responsável por Laboratório</th>
		          <th class="quant"> ' . $_POST['t12'] . ' </th>
		        </tr>
		        <tr>
		          <th class="opcoes">Projetos ou atividades complementares de ensino extracurriculares&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
		          <th class="quant"> ' . $_POST['t13'] . ' </th>
		        </tr>
		    </table>

			<br><h3>ATIVIDADES DE PESQUISA APLICADA</h3> <!-- PARTE 6 -->

			<table class="table table-striped">
		        <tr>
		          <th class="opcoes">Coordenação de projeto de pesquisa aplicada, desenvolvimento cadastrado na PRPI com fomento IFCE ou sem recursos</th>
		          <th class="quant"> ' . $_POST['t14'] . ' </th>
		        </tr>
		        <tr>
		          <th class="opcoes">Coordenação de projeto de pesquisa aplicada, desenvolvimento cadastrado na PRPI com captação de recursos externos ao IFCE</th>
		          <th class="quant"> ' . $_POST['t15'] . ' </th>
		        </tr>
		        <tr>
		          <th class="opcoes">Participação na equipe de projeto de pesquisa aplicada, desenvolvimento, cadastrado na PRPI</th>
		          <th class="quant"> ' . $_POST['t16'] . ' </th>
		        </tr>
		        <tr>
		          <th class="opcoes">Orientação em especialização e Co-orientação em mestrado ou doutorado do IFCE ou em outra instituição de ensino superior com anuência do IFCE</th>
		          <th class="quant"> ' . $_POST['t17'] . ' </th>
		        </tr>
		        <tr>
		          <th class="opcoes">Bolsista produtividade PQ, DT do CNPq</th>
		          <th class="quant"> ' . $_POST['t18'] . ' </th>
		        </tr>
		        <tr>
		          <th class="opcoes">Participação em programa de Pós-graduação em nível de mestrado ou doutorado como docente COLABORADOR (do IFCE ou outra IES com anuência)</th>
		          <th class="quant"> ' . $_POST['t19'] . ' </th>
		        </tr>
		        <tr>
		          <th class="opcoes">Participação em programa de Pós-graduação em nível de mestrado ou doutorado como docente PERMANENTE (do IFCE ou outra IES com anuência)</th>
		          <th class="quant"> ' . $_POST['t20'] . ' </th>
		        </tr>
		    </table>

			<br><h3>ATIVIDADES DE EXTENSÃO</h3> <!-- PARTE 7 -->

			<table class="table table-striped">
		        <tr>
		          <th class="opcoes">Coordenação de projeto/programa de extensão cadastrado na PROEXT com fomento IFCE ou sem recursos</th>
		          <th class="quant"> ' . $_POST['t21'] . ' </th>
		        </tr>
		        <tr>
		          <th class="opcoes">Coordenação de projeto/programa de extensão cadastrado na PROEXT com captação de recursos externos ao IFCE</th>
		          <th class="quant"> ' . $_POST['t22'] . ' </th>
		        </tr>
		        <tr>
		          <th class="opcoes">Participação na equipe de projeto ou programa de extensão, cadastrado na PROEXT, exceto aula FIC</th>
		          <th class="quant"> ' . $_POST['t23'] . ' </th>
		        </tr>
		        <tr>
		          <th class="opcoes">Coordenação de incubadoras de empresas</th>
		          <th class="quant"> ' . $_POST['t24'] . ' </th>
		        </tr>
		        <tr>
		          <th class="opcoes">Coordenação dos NAPNEs ou NEABIs</th>
		          <th class="quant"> ' . $_POST['t25'] . ' </th>
		        </tr>
		        <tr>
		          <th class="opcoes">Participação em NAPNEs ou NEABIs</th>
		          <th class="quant"> ' . $_POST['t26'] . ' </th>
		        </tr>
		        <tr>
		          <th class="opcoes">Cursos FIC (Quantidade de horas por curso)</th>
		          <th class="quant"> ' . $_POST['t27'] . ' </th>
		        </tr>
		        <tr>
		          <th class="opcoes">Preparação + Planejamento dos cursos FIC</th>
		          <th class="quant"> ' . $_POST['t28'] . ' </th>
		        </tr>
		        <tr>
		          <th class="opcoes">Planejamento e organização de eventos de extensão</th>
		          <th class="quant"> ' . $_POST['t29'] . ' </th>
		        </tr>
		    </table>

			<br><h3>ATIVIDADES DE GESTÃO <br> (Somente para os regimes de trabalho de 40h ou 40h com D.E.)</h3>';

		if($_POST['regime'] == 40)
			$html .= '
				<h4>Atividades de Gestão Institucional e Acadêmica</h4> <!-- PARTE 8 -->
				<table class="table table-striped">
			        <tr>
			          <th class="opcoes">Coordenador de Curso</th>
			          <th class="quant"> ' . $_POST['t30'] . ' </th>
			        </tr>
			        <tr>
			          <th class="opcoes">Coordenador de Setor</th>
			          <th class="quant"> ' . $_POST['t31'] . ' </th>
			        </tr>
			        <tr>
			          <th class="opcoes">Chefe de Departamento</th>
			          <th class="quant"> ' . $_POST['t32'] . ' </th>
			        </tr>
			        <tr>
			          <th class="opcoes">Diretores de Área/Setor</th>
			          <th class="quant"> ' . $_POST['t33'] . ' </th>
			        </tr>
			        <tr>
			          <th class="opcoes">Assessor da Reitoria</th>
			          <th class="quant"> ' . $_POST['t34'] . ' </th>
			        </tr>
			        <tr>
			          <th class="opcoes">Coordenador de Implantação de Campus</th>
			          <th class="quant"> ' . $_POST['t35'] . ' </th>
			        </tr>
			        <tr>
			          <th class="opcoes">Assistente de Pró-Reitoria ou Chefe de Gabinete de Campus</th>
			          <th class="quant"> ' . $_POST['t36'] . ' </th>
			        </tr>
			        <tr>
			          <th class="opcoes">Coordenador de programa institucional: ensino, pesquisa aplicada ou extensão&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
			          <th class="quant"> ' . $_POST['t37'] . ' </th>
			        </tr>
			    </table>';
			
		$html .= '
			<h4>Atividades em Comissões ou de Fiscalização</h4> <!-- PARTE 9 -->
			<table class="table table-striped">
		        <tr>
		          <th class="opcoes">Conselhos, comissões ou comitês permanentes institucionais</th>
		          <th class="quant"> ' . $_POST['t38'] . ' </th>
		        </tr>
		        <tr>
		          <th class="opcoes">Comissão Própria de Avaliação e Comissão Permanente de Pessoal Docente (Central)</th>
		          <th class="quant"> ' . $_POST['t39'] . ' </th>
		        </tr>
		        <tr>
		          <th class="opcoes">Comissão Própria de Avaliação e Comissão Permanente de Pessoal Docente (Local)</th>
		          <th class="quant"> ' . $_POST['t40'] . ' </th>
		        </tr>
		        <tr>
		          <th class="opcoes">Conselhos ou comitês permanentes externos</th>
		          <th class="quant"> ' . $_POST['t41'] . ' </th>
		        </tr>
		        <tr>
		          <th class="opcoes">Colegiado de Cursos</th>
		          <th class="quant"> ' . $_POST['t42'] . ' </th>
		        </tr>
		        <tr>
		          <th class="opcoes">Núcleo Docente Estruturante (NDE)</th>
		          <th class="quant"> ' . $_POST['t43'] . ' </th>
		        </tr>
		        <tr>
		          <th class="opcoes">Comissão de Processo Administrativo Disciplinar</th>
		          <th class="quant"> ' . $_POST['t44'] . ' </th>
		        </tr>
		        <tr>
		          <th class="opcoes">Participação em Direção Sindical como titular</th>
		          <th class="quant"> ' . $_POST['t45'] . ' </th>
		        </tr>
		        <tr>
		          <th class="opcoes">Fiscalização de contrato</th>
		          <th class="quant"> ' . $_POST['t46'] . ' </th>
		        </tr>
		    </table>	

		    <!-- Total -->
		    <table class="table table-striped">
		        <tr>
			        <th class="totalCSS"><h3>Total</h3></th>
			        <th class="quant"> <textfield> ' . $_POST['total'] . ' </textfield> </th>
		        </tr>
		    </table>

		    <br><br><hr/><br><br>
      ';
    $html .= '
    		<h2>DISTRIBUIÇÃO DE CARGA <br>HORÁRIA DO DOCENTE NO SEMESTRE</h2>
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
                <th rowspan="4" style="width:70px">Manhã</th>
                <th>A</th>
                <th class="celulaQuadro"> ' . $_POST['campo1'] . ' </th>
                <th class="celulaQuadro"> ' . $_POST['campo2'] . '  </th>
                <th class="celulaQuadro"> ' . $_POST['campo3'] . '  </th>
                <th class="celulaQuadro"> ' . $_POST['campo4'] . '  </th>
                <th class="celulaQuadro"> ' . $_POST['campo5'] . '  </th>
              </tr>
              <tr>  
                <th>B</th>
                <th class="celulaQuadro"> ' . $_POST['campo6'] . '  </th>
                <th class="celulaQuadro"> ' . $_POST['campo7'] . '  </th>
                <th class="celulaQuadro"> ' . $_POST['campo8'] . '  </th>
                <th class="celulaQuadro"> ' . $_POST['campo9'] . '  </th>
                <th class="celulaQuadro"> ' . $_POST['campo10'] . '  </th>
              </tr>
              <tr>
                <th>C</th>
                <th class="celulaQuadro"> ' . $_POST['campo11'] . ' </th>
                <th class="celulaQuadro"> ' . $_POST['campo12'] . ' </th>
                <th class="celulaQuadro"> ' . $_POST['campo13'] . ' </th>
                <th class="celulaQuadro"> ' . $_POST['campo14'] . ' </th>
                <th class="celulaQuadro"> ' . $_POST['campo15'] . ' </th>
              </tr>
              <tr>
                <th>D</th>
                <th class="celulaQuadro"> ' . $_POST['campo16'] . ' </th>
                <th class="celulaQuadro"> ' . $_POST['campo17'] . ' </th>
                <th class="celulaQuadro"> ' . $_POST['campo18'] . ' </th>
                <th class="celulaQuadro"> ' . $_POST['campo19'] . ' </th>
                <th class="celulaQuadro"> ' . $_POST['campo20'] . ' </th>
              </tr>
              <tr><th></th><th></th><th></th><th></th><th></th><th></th>
                </tr>
              <tr>
                <th rowspan="4" style="width:70px">Tarde</th>
                <th>A</th>
                <th class="celulaQuadro"> ' . $_POST['campo21'] . ' </th>
                <th class="celulaQuadro"> ' . $_POST['campo22'] . '  </th>
                <th class="celulaQuadro"> ' . $_POST['campo23'] . '  </th>
                <th class="celulaQuadro"> ' . $_POST['campo24'] . '  </th>
                <th class="celulaQuadro"> ' . $_POST['campo25'] . '  </th>
              </tr>
              <tr>  
                <th>B</th>
                <th class="celulaQuadro"> ' . $_POST['campo26'] . '  </th>
                <th class="celulaQuadro"> ' . $_POST['campo27'] . '  </th>
                <th class="celulaQuadro"> ' . $_POST['campo28'] . '  </th>
                <th class="celulaQuadro"> ' . $_POST['campo29'] . '  </th>
                <th class="celulaQuadro"> ' . $_POST['campo30'] . '  </th>
              </tr>
              <tr>
                <th>C</th>
                <th class="celulaQuadro"> ' . $_POST['campo31'] . ' </th>
                <th class="celulaQuadro"> ' . $_POST['campo32'] . ' </th>
                <th class="celulaQuadro"> ' . $_POST['campo33'] . ' </th>
                <th class="celulaQuadro"> ' . $_POST['campo34'] . ' </th>
                <th class="celulaQuadro"> ' . $_POST['campo35'] . ' </th>
              </tr>
              <tr>
                <th>D</th>
                <th class="celulaQuadro"> ' . $_POST['campo36'] . ' </th>
                <th class="celulaQuadro"> ' . $_POST['campo37'] . ' </th>
                <th class="celulaQuadro"> ' . $_POST['campo38'] . ' </th>
                <th class="celulaQuadro"> ' . $_POST['campo39'] . ' </th>
                <th class="celulaQuadro"> ' . $_POST['campo40'] . ' </th>
              </tr>
              <tr><th></th><th></th><th></th><th></th><th></th><th></th>
                </tr>
              <tr>
                <th rowspan="4" style="width:70px">Noite</th>
                <th>A</th>
                <th class="celulaQuadro"> ' . $_POST['campo41'] . ' </th>
                <th class="celulaQuadro"> ' . $_POST['campo42'] . '  </th>
                <th class="celulaQuadro"> ' . $_POST['campo43'] . '  </th>
                <th class="celulaQuadro"> ' . $_POST['campo44'] . '  </th>
                <th class="celulaQuadro"> ' . $_POST['campo45'] . '  </th>
              </tr>
              <tr>  
                <th>B</th>
                <th class="celulaQuadro"> ' . $_POST['campo46'] . '  </th>
                <th class="celulaQuadro"> ' . $_POST['campo47'] . '  </th>
                <th class="celulaQuadro"> ' . $_POST['campo48'] . '  </th>
                <th class="celulaQuadro"> ' . $_POST['campo49'] . '  </th>
                <th class="celulaQuadro"> ' . $_POST['campo50'] . '  </th>
              </tr>
              <tr>
                <th>C</th>
                <th class="celulaQuadro"> ' . $_POST['campo51'] . ' </th>
                <th class="celulaQuadro"> ' . $_POST['campo52'] . ' </th>
                <th class="celulaQuadro"> ' . $_POST['campo53'] . ' </th>
                <th class="celulaQuadro"> ' . $_POST['campo54'] . ' </th>
                <th class="celulaQuadro"> ' . $_POST['campo55'] . ' </th>
              </tr>
              <tr>
                <th>D</th>
                <th class="celulaQuadro"> ' . $_POST['campo56'] . ' </th>
                <th class="celulaQuadro"> ' . $_POST['campo57'] . ' </th>
                <th class="celulaQuadro"> ' . $_POST['campo58'] . ' </th>
                <th class="celulaQuadro"> ' . $_POST['campo59'] . ' </th>
                <th class="celulaQuadro"> ' . $_POST['campo60'] . ' </th>
              </tr>
            </table>

            
    ';

    /* Rodapé
    $html .= '
    		<br><br><hr/><br><br>
	    	<fieldset class="caixa1">
				<h4>Parecer da Coordenação:</h4>
			</fieldset>

			<br><br>

			<fieldset class="caixa2">
				<h4>Professor (a)</h4>
			</fieldset>

			<fieldset class="caixa2">
				<h4>Coord. de Curso</h4>
			</fieldset>

			<fieldset class="caixa2">
				<h4>Chefe de Depto./ Diretor de Ensino</h4>
			</fieldset>

			<br><br><br>

			<h5>_________________________________, _________ de ________________________ de _______________</h5>
		</div>
    ';
	*/


	$mpdf = new mPDF(); 
	$mpdf->SetDisplayMode('fullpage');

	$css = file_get_contents("../css/Relatorio.css");
	$mpdf->WriteHTML($css,1);

	$mpdf->WriteHTML($html);
	$mpdf->Output('relatorioPIT.pdf', 'I');//'D'

	exit;
	
?>