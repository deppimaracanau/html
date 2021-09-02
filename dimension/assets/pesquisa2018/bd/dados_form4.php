<?php
   
    setcookie("pesquisa1", $_POST['pesquisa1'], time() + (86400 * 30), "/");
    setcookie("pesquisa2", $_POST['pesquisa2'], time() + (86400 * 30), "/");

    $qtd_projetos_p1 = intval($_POST['pesquisa1']);
    $qtd_projetos_p2 = intval($_POST['pesquisa2']);

    if( $qtd_projetos_p1 > 5){
         $qtd_projetos_p1 = 5;
    }

    if( $qtd_projetos_p2 > 5){
         $qtd_projetos_p2 = 5;
    }

    for ($i=1; $i <= $qtd_projetos_p1 ; $i++) { 
        setcookie("titulo1".$i, $_POST['titulo1'.$i], time() + (86400 * 30), "/");
        setcookie("fomentoCond".$i, $_POST['fomento'.$i], time() + (86400 * 30), "/");
        setcookie("outroFomento".$i, $_POST['outroFomento'.$i], time() + (86400 * 30), "/");
        if($_POST['fomento'.$i] == 1){
            setcookie("fomento".$i, $_POST['outroFomento'.$i], time() + (86400 * 30), "/");
        }else{
            setcookie("fomento".$i, $_POST['fomento'.$i], time() + (86400 * 30), "/");
        }

        setcookie("alunosTecnico1".$i, $_POST['alunosTecnico1'.$i], time() + (86400 * 30), "/");
        setcookie("alunosGraduacao1".$i, $_POST['alunosGraduacao1'.$i], time() + (86400 * 30), "/");
        setcookie("alunosPos1".$i, $_POST['alunosPos1'.$i], time() + (86400 * 30), "/");
        
        /*$_SESSION['alunosTecnico1'.$i] =  $_POST['alunosTecnico1'.$i]; 
        $_SESSION['alunosGraduacao1'.$i] = $_POST['alunosGraduacao1'.$i]; 
        $_SESSION['alunosPos1'.$i] = $_POST['alunosPos1'.$i];*/
      
    }
    
    for ($i=1; $i <= $qtd_projetos_p2 ; $i++) { 

        setcookie("titulo2".$i, $_POST['titulo2'.$i], time() + (86400 * 30), "/");
        setcookie("alunosTecnico2".$i, $_POST['alunosTecnico2'.$i], time() + (86400 * 30), "/");
        setcookie("alunosGraduacao2".$i, $_POST['alunosGraduacao2'.$i], time() + (86400 * 30), "/");
        setcookie("alunosPos2".$i, $_POST['alunosPos2'.$i], time() + (86400 * 30), "/");

    }

    header("Location:../forms/F5.php");
 ?>