
<!-- ------------------- Barra Lateral ------------------- -->
<div class="col-sm-4">
	<div class="panel panel-default">
		<div class="panel-body">
			<center><font class="nomeLaboratorio"><?= $_SESSION['nomeLab'] ?></font></center>
			<p> Coordenador: <?= $_SESSION['nome'] ?> </p>

			<br><br><br>
			
			<div class="btn btn-default tituloLateral">Dados</div>
			<a class="btn btn-default botaoLateral" href="dados/usuario.php">Pesquisas Anteriores</a>
			
			<br><br><br>
			
			<div class="btn btn-default tituloLateral">Atualização</div>
			<a class="btn btn-default botaoLateral" href="../dados/usuario.php">Dados do Usuário</a><br><br>
			<a class="btn btn-default botaoLateral" href="../dados/laboratorio.php">Dados do Laboratório</a>

			<br><br><br>
			
			<div class="btn btn-default tituloLateral">Administrador</div>
			<a class="btn btn-default botaoLateral" href="../adm/postar_noticia.php">Postar Notícia</a><br><br>
			<a class="btn btn-default botaoLateral" href="../adm/laboratorios.php">Laboratórios</a><br><br>
			<a class="btn btn-default botaoLateral" href="../adm/responsaveis.php">Responsáveis</a><br><br>
			<a class="btn btn-default botaoLateral" href="../adm/acessos.php">Concessão de Acessos</a><br><br>

			<br><br><br><br><br>

			<center><img class="logoLateral" src="../imagens/logoIFCE.png"></center>

			<br>
		</div>
	</div>
</div>