 <?php

    setcookie("qtd_bolsa_extensao", $_POST['bolsistas'], time() + (86400 * 30), "/");
    setcookie("qtd_voluntarios", $_POST['voluntarios'], time() + (86400 * 30), "/");
    setcookie("qtd_disciplinas", $_POST['disciplinas'], time() + (86400 * 30), "/");


    setcookie("qtd_cursos", $_POST['cursos'], time() + (86400 * 30), "/");
    $qtd_cursos = $_POST['cursos'];

    $cursos = "";
    for ($i=1; $i <= $qtd_cursos; $i++) { 
        setcookie("curso".$i, $_POST['curso'.$i], time() + (86400 * 30), "/");
        if($i == $qtd_cursos) {
            $cursos .= $_POST['curso'.$i];
            $cursos .= ".";
        } else {
            $cursos .= $_POST['curso'.$i];
            $cursos .= "; ";
        }
    }

    setcookie("cursos", $cursos, time() + (86400 * 30), "/");

    $qtd_professores = $_POST['professores'];
    setcookie("qtd_professores", $qtd_professores, time() + (86400 * 30), "/");

    for ($i=1; $i <= $qtd_professores ; $i++) { 
        setcookie("professor".$i, $_POST['professor'.$i], time() + (86400 * 30), "/");
        setcookie("lattesProf".$i, $_POST['lattesProf'.$i], time() + (86400 * 30), "/");
    }


    setcookie("tcc", $_POST['tcc'], time() + (86400 * 30), "/");


    setcookie("tecnologias", $_POST['tecnologias'], time() + (86400 * 30), "/");
    if($_POST['tecnologias'] == 1){
        setcookie("desc_produto", $_POST['descricao'], time() + (86400 * 30), "/");
    }

    setcookie("servicosTec", $_POST['servicosTec'], time() + (86400 * 30), "/");
    if($_POST['servicosTec'] == 1){
        setcookie("descricaoServicos", $_POST['descricaoServicos'], time() + (86400 * 30), "/");
    }
    
   
    header("Location:../forms/F3.php");

    /*
    if($_SESSION['pesquisa1'] == "1"){
        $_SESSION['titulo11'] =  $_POST['titulo11'];
        $_SESSION['fomento1'] = $_POST['fomento1'];
        $_SESSION['alunosGraduacao11'] = $_POST['alunosGraduacao11']; 
        $_SESSION['alunosPos11'] = $_POST['alunosPos11'];
        $_SESSION['resumo11'] = $_POST['resumo11'];
    }

    if($_SESSION['pesquisa1'] == "2"){

        $_SESSION['titulo11'] =  $_POST['titulo11'];
        $_SESSION['fomento1'] = $_POST['fomento1'];
        $_SESSION['alunosGraduacao11'] = $_POST['alunosGraduacao11']; 
        $_SESSION['alunosPos11'] = $_POST['alunosPos11'];
        $_SESSION['resumo11'] = $_POST['resumo11'];


        $_SESSION['titulo12'] =  $_POST['titulo12'];
        $_SESSION['fomento2'] = $_POST['fomento2'];
        $_SESSION['alunosGraduacao12'] = $_POST['alunosGraduacao12']; 
        $_SESSION['alunosPos12'] = $_POST['alunosPos12'];
        $_SESSION['resumo12'] = $_POST['resumo12'];
    }

    if($_SESSION['pesquisa1'] == "3"){

        $_SESSION['titulo11'] =  $_POST['titulo11'];
        $_SESSION['fomento1'] = $_POST['fomento1'];
        $_SESSION['alunosGraduacao11'] = $_POST['alunosGraduacao11']; 
        $_SESSION['alunosPos11'] = $_POST['alunosPos11'];
        $_SESSION['resumo11'] = $_POST['resumo11'];

        $_SESSION['titulo12'] =  $_POST['titulo12'];
        $_SESSION['fomento2'] = $_POST['fomento2'];
        $_SESSION['alunosGraduacao12'] = $_POST['alunosGraduacao12']; 
        $_SESSION['alunosPos12'] = $_POST['alunosPos12'];
        $_SESSION['resumo12'] = $_POST['resumo12'];

        $_SESSION['titulo13'] =  $_POST['titulo13'];
        $_SESSION['fomento3'] = $_POST['fomento3'];
        $_SESSION['alunosGraduacao13'] = $_POST['alunosGraduacao13']; 
        $_SESSION['alunosPos13'] = $_POST['alunosPos13'];
        $_SESSION['resumo13'] = $_POST['resumo13'];
    }

    if($_SESSION['pesquisa1'] == "4"){
        
        $_SESSION['titulo11'] =  $_POST['titulo11'];
        $_SESSION['fomento1'] = $_POST['fomento1'];
        $_SESSION['alunosGraduacao11'] = $_POST['alunosGraduacao11']; 
        $_SESSION['alunosPos11'] = $_POST['alunosPos11'];
        $_SESSION['resumo11'] = $_POST['resumo11'];

        $_SESSION['titulo12'] =  $_POST['titulo12'];
        $_SESSION['fomento2'] = $_POST['fomento2'];
        $_SESSION['alunosGraduacao12'] = $_POST['alunosGraduacao12']; 
        $_SESSION['alunosPos12'] = $_POST['alunosPos12'];
        $_SESSION['resumo12'] = $_POST['resumo12'];

        $_SESSION['titulo13'] =  $_POST['titulo13'];
        $_SESSION['fomento3'] = $_POST['fomento3'];
        $_SESSION['alunosGraduacao13'] = $_POST['alunosGraduacao13']; 
        $_SESSION['alunosPos13'] = $_POST['alunosPos13'];
        $_SESSION['resumo13'] = $_POST['resumo13'];

        $_SESSION['titulo14'] =  $_POST['titulo14'];
        $_SESSION['fomento4'] = $_POST['fomento4'];
        $_SESSION['alunosGraduacao14'] = $_POST['alunosGraduacao14']; 
        $_SESSION['alunosPos14'] = $_POST['alunosPos14'];
        $_SESSION['resumo14'] = $_POST['resumo14'];
    }

    if($_SESSION['pesquisa1'] == "5"){

        $_SESSION['titulo11'] =  $_POST['titulo11'];
        $_SESSION['fomento1'] = $_POST['fomento1'];
        $_SESSION['alunosGraduacao11'] = $_POST['alunosGraduacao11']; 
        $_SESSION['alunosPos11'] = $_POST['alunosPos11'];
        $_SESSION['resumo11'] = $_POST['resumo11'];

        $_SESSION['titulo12'] =  $_POST['titulo12'];
        $_SESSION['fomento2'] = $_POST['fomento2'];
        $_SESSION['alunosGraduacao12'] = $_POST['alunosGraduacao12']; 
        $_SESSION['alunosPos12'] = $_POST['alunosPos12'];
        $_SESSION['resumo12'] = $_POST['resumo12'];

        $_SESSION['titulo13'] =  $_POST['titulo13'];
        $_SESSION['fomento3'] = $_POST['fomento3'];
        $_SESSION['alunosGraduacao13'] = $_POST['alunosGraduacao13']; 
        $_SESSION['alunosPos13'] = $_POST['alunosPos13'];
        $_SESSION['resumo13'] = $_POST['resumo13'];

        $_SESSION['titulo14'] =  $_POST['titulo14'];
        $_SESSION['fomento4'] = $_POST['fomento4'];
        $_SESSION['alunosGraduacao14'] = $_POST['alunosGraduacao14']; 
        $_SESSION['alunosPos14'] = $_POST['alunosPos14'];
        $_SESSION['resumo14'] = $_POST['resumo14'];

        $_SESSION['titulo15'] =  $_POST['titulo15'];
        $_SESSION['fomento5'] = $_POST['fomento5'];
        $_SESSION['alunosGraduacao15'] = $_POST['alunosGraduacao15']; 
        $_SESSION['alunosPos15'] = $_POST['alunosPos15'];
        $_SESSION['resumo15'] = $_POST['resumo15'];
    }

  */
    
   
  
    //fechando conexao
   

  
?>