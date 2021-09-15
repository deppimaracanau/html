<?php
	// Verificação de Autenticação
	session_start();

	if( !isset($_SESSION['id']) )
		header('Location: ../../index.php?cod=1');
?>