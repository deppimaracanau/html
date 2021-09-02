<?php
if (! @($conexao = pg_connect("host=localhost dbname=seci port=5432 user=postgres password=1"))) {
    print "Não foi possível estabelecer uma conexão com o banco de dados.";
}
?>
