<?php

// Conexão com o banco de dados
require_once('bd.class.php');
$bd = new bd();
$conexao = $bd->estabelecerConexao();

if ($conexao == null) {
    print "Não foi possível estabelecer uma conexão com o banco de dados.";
} else {
    //pega o ID do elemento html e joga numa variável que será tratada logo em seguida

    $nomeEven = $_POST['nomeEven'];
    $conteudo = $_POST['conteudo'];

    if ($nomeEven != "" && $conteudo != "") {
        $insert = "INSERT INTO evento (nome,conteudo) VALUES ('$nomeEven','$conteudo');";
        $insert = pg_query($conexao, $insert) or die("<meta charset=\"utf-8\"><br><center><h1>Erro no registro da solicitação, por favor, reveja as informações repassadas ou entre em contato com o DEPPI.</h1></center>");
    }


    pg_close($conexao);

    header('Location: ../views/evento/evento.php');
}
