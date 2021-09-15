<?php
include ("../config_bd/conexao.php");

// Entrada de Dados
$login = $_POST['login'];
$login = addslashes($login);
$senha = md5($_POST['senha']); // Trasnforma em md5
                               
// Verificando se o usuário está cadastrado no banco
$sql = pg_query("SELECT nome, usuario, senha, admin FROM usuarios WHERE usuario = '$login' AND senha = '$senha'") or die("Erro no comando SQL");

// Verificamos as linhas afetadas pela consulta
$row = pg_numrows($sql);

// Verificamos se retornou algo
if ($row == 0)
    // echo "<b><center>Erro: Usuário ou Senha inválidos!!</b> <br><br> <a href=\"javascript: history.go(-1)\">Voltar Página Principal</a></center>";
    // Se $row é diferente de zero, retornou algo
    header("Location:../index_login.php");
else {
    
    // $perfilBD = mysql_result($sql, 0, "perfil");
    
    // Gravar os dados do usuario na sessao
    $row = pg_fetch_array($sql); // jogando dados da consulta em um array
    session_start();
    $_SESSION['user_login'] = $row[0]; // Pegando nome do usuário logado
    $_SESSION['user_admin'] = $row[3]; // Pegando tipo(admin) do usuário logado
    $_SESSION['user_logged_in'] = true;
    
    /* echo $row[3]; */
    
    if ($_SESSION['user_admin'] == 't') {
        header("Location:../paginas/principal_adm.php");
    } else {
        header("Location:../index_login.php");
    }
}

pg_close($conexao);

?>
