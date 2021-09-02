<?php 
// Verificando se o usuário está cadastrado no banco
$sql = pg_query("SELECT quantidade FROM qtd_avisos;") or die("Erro no comando SQL");

// TABELA: quantidades
if (! $sql) {
    echo "Consulta não foi executada!";
}

while ($row = pg_fetch_array($sql)) {
    $_SESSION['qtd_avisos'] = $row[0];
}
pg_close($conexao);

?>