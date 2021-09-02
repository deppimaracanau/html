<?php
  session_start(); //abrindo session
    header("Content-type: text/html; charset=utf-8");

    //Recebendo dados do formulário 
    echo '<b>Nome:</b>';
    echo '<br>';
    echo $_SESSION['nome'];
    echo '<br>';
    echo '<b>Siape:</b>';
    echo '<br>';
    echo $_SESSION['siape'];
    echo '<br>'; 
    echo '<b>Email:</b>';
    echo '<br>';   
    echo $_SESSION['email'];
    echo '<br>';
    echo '<b>link_lattes:</b>';
    echo '<br>';
    echo $_SESSION['link_lattes'];
    echo '<br>';
    echo $_SESSION['eixo_tecnologico'];
    echo '<br>';
    echo '<b>lab:</b>';
    echo '<br>';
    echo $_SESSION['laboratorio'];
    echo '<b>Email lab:</b>';
    echo '<br>';
    echo $_SESSION['emailLab'];
    echo '<br>'; 
    echo '<b>Telefone lab:</b>';
    echo '<br>';
    echo $_SESSION['telefoneLab'];
    echo '<br>'; 
    echo '<b>Atualizações:</b>';
    echo '<br>';
    echo $_SESSION['atualizacoes'];
    echo '<br>'; 
    echo '<b>Novo Coordenador:</b>';
    echo '<br>';
    echo $_SESSION['novoCoordenador'];
    echo '<br>'; 
    echo '<b>Novo SIAPE:</b>';
    echo '<br>';
    echo $_SESSION['novoSiape'];
    echo '<br>'; 
    echo '<b>Novo Nome lab:</b>';
    echo '<br>';
    echo $_SESSION['novoNomeLab'];
    echo '<br>'; 
    echo '<b>Nova Sigla:</b>';
    echo '<br>';
    echo $_SESSION['novaSiglaLab'];
    echo '<br>'; 
    echo '<b>Areas:</b>';
    echo '<br>';
    echo $_SESSION['areas'];
    echo '<br>'; 
    echo '<b>apresentacao:</b>';
    echo '<br>';
    echo $_SESSION['apresentacao'];
    echo '<br>'; 
    
 
    


   

    $qtd_professores = intval($_SESSION['qtd_professores']);
     for ($i=1; $i <= $qtd_professores ; $i++) {
        echo "<br>";
        echo '<b>professor:</b>';
        echo "<br>";
        echo  $_SESSION['professor'.$i];
        echo "<br>";
        echo '<b>Lattes:</b>';
        echo "<br>";     
        echo  $_SESSION['lattesProf'.$i];
        echo "<br>";

    }


    echo "<br>";
    echo "<a href='../forms/F2.html'>Próximo</a>";

?>