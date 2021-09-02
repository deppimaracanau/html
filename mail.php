<?php

$para = "cicerosilva.ifce@gmail.com";
$nome = $_POST['nome'];
$assunto = $_POST['assunto'];


$messagem = "<strong>Nome: </strong>".$nome;
$messagem .= "<br><strong>Mensagem: </strong>"
.$_POST['mensagem'];

$headers =  "Content-Type:text/html; charset=UTF-8\n";
$headers .= "From:  dominio.com.br<teste@dominio.com.br>\n"; 
$headers .= "X-Sender:  <teste@dominio.com.br>\n"; 

$headers .= "X-Mailer: PHP  v".phpversion()."\n";
$headers .= "X-IP:  ".$_SERVER['REMOTE_ADDR']."\n";
$headers .= "Return-Path:  <cicerosilva.ifce@gmail.com>\n";

$headers .= "MIME-Version: 1.0\n";
 
mail($para, $assunto, $mensagem, $headers);

?>