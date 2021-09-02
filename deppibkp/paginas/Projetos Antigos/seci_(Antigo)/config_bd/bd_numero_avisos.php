<?php

// pegando usuarios do banco de dados
$sql1 = pg_query("SELECT quantidade FROM qtd_avisos;") or die("Erro no comando SQL");

// TABELA: usuarios
if (! $sql1) {
    echo "Consulta não foi executada!";
}

$_SESSION['qtd_usuarios'] = pg_numrows($sql1);

while ($row = pg_fetch_array($sql1)) {
    $_SESSION['qtd'] = $row[0];
}
?>