<?php

// Conexão com o banco de dados
require_once('bd.class.php');
$bd = new bd();
$conexao = $bd->estabelecerConexao();

if ($conexao == null) {
    print "Não foi possível estabelecer uma conexão com o banco de dados.";
} else {
    //pega o ID do elemento html e joga numa variável que será tratada logo em seguida



    $pesquisaSQL = "SELECT * FROM evento";
    $consulta = pg_query($conexao, $pesquisaSQL);
    $valor = pg_num_rows($consulta);

    if ($valor != 0) {


        echo  "<label class=\"font_text_simples2\">Conteudo:</label>
                        <select class=\"form-control\" id=\"contProg\" name=\"contProg\">
                            <option value=\"\" selected>Selecione um modelo</option>
                            <option disabled>------------------------</option>";

        while ($resultado = pg_fetch_array($consulta)) {




            echo " <option value=" . $resultado[0] . ">" . $resultado[1] . "</option>";
        }

        echo "  </select> <br>";
    } else {
        echo '<div class="alert alert-danger" role="alert"><center><b>Nenhum Conteudo!</b></center></div>';
    }

    pg_close($conexao);
}
