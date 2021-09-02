<?php
    
    setcookie("extensao1", $_POST['extensao1'], time() + (86400 * 30), "/");
    setcookie("extensao2", $_POST['extensao2'], time() + (86400 * 30), "/");

    $qtd_extensao_p1 = intval($_POST['extensao1']);
    $qtd_extensao_p2 = intval($_POST['extensao2']);

    if( $qtd_extensao_p1 > 5){
         $qtd_extensao_p1 = 5;
    }

    if( $qtd_extensao_p2 > 5){
         $qtd_extensao_p2 = 5;
    }

    for ($i=1; $i <= $qtd_extensao_p1 ; $i++) { 
        setcookie("titulo51".$i, $_POST['titulo51'.$i], time() + (86400 * 30), "/");
        setcookie("fomentoCond5".$i, $_POST['fomento5'.$i], time() + (86400 * 30), "/");
        setcookie("outroFomento5".$i, $_POST['outroFomento5'.$i], time() + (86400 * 30), "/");
        if($_POST['fomento5'.$i] == 1){
            setcookie("fomento5".$i, $_POST['outroFomento5'.$i], time() + (86400 * 30), "/");
        }else{
            setcookie("fomento5".$i, $_POST['fomento5'.$i], time() + (86400 * 30), "/");
        }

        setcookie("alunosTecnico51".$i, $_POST['alunosTecnico51'.$i], time() + (86400 * 30), "/");
        setcookie("alunosGraduacao51".$i, $_POST['alunosGraduacao51'.$i], time() + (86400 * 30), "/");
        setcookie("alunosPos51".$i, $_POST['alunosPos51'.$i], time() + (86400 * 30), "/");
       
    }

    for ($i=1; $i <= $qtd_extensao_p2 ; $i++) { 


        setcookie("titulo52".$i, $_POST['titulo52'.$i], time() + (86400 * 30), "/");
        setcookie("alunosTecnico52".$i, $_POST['alunosTecnico52'.$i], time() + (86400 * 30), "/");
        setcookie("alunosGraduacao52".$i, $_POST['alunosGraduacao52'.$i], time() + (86400 * 30), "/");
        setcookie("alunosPos52".$i, $_POST['alunosPos52'.$i], time() + (86400 * 30), "/");
       
    }

   header("Location:../bd/enviar_bd.php");
?>