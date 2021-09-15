<?php

// pegando categorias do banco de dados
$sql1 = pg_query("SELECT nome FROM categoria ORDER BY nome ASC;") or die("Erro no comando SQL");

// pegando subcategorias do banco de dados
$sql2 = pg_query("SELECT nome FROM subcategoria ORDER BY nome ASC;") or die("Erro no comando SQL");

// TABELA: categoria
if (! $sql1) {
    echo "Consulta não foi executada!";
}

// TABELA: subcategoria
if (! $sql2) {
    echo "Consulta não foi executada!";
}

?>