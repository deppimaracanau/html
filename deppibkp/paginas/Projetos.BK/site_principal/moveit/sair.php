<?php
session_start();
//Destroi a sessão
session_destroy();
//Apaga quaisquer dados
unset($_SESSION['id'],$_SESSION['nome'],$_SESSION['email'],$_SESSION['senha'],$_SESSION['nivelAcesso'],$_SESSION['cargo'],$_SESSION['sobrenome']);
//Redireciona para login
header("Location: index.php");
?>