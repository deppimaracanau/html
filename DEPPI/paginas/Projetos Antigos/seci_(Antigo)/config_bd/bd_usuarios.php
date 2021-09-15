<?php
// pegando usuarios do banco de dados
$sql1 = pg_query("SELECT id,nome,usuario,admin FROM usuarios ORDER BY nome ASC;;") or die("Erro no comando SQL");

// TABELA: usuarios
if (! $sql1) {
    echo "Consulta não foi executada!";
}

$_SESSION['qtd_usuarios'] = pg_numrows($sql1);

$i = 0;
while ($row = pg_fetch_array($sql1)) {
    $_SESSION['id' . $i] = $row[0];
    $_SESSION['nome' . $i] = $row[1];
    $_SESSION['usuario' . $i] = $row[2];
    $_SESSION['tipo' . $i] = $row[3];
    $i ++;
}

?>