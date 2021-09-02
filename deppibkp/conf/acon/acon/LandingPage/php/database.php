<?php
    if(isset($_POST['submit']))
    {
        $db = new SQLite3('webinar.db');
        $db->exec("CREATE TABLE IF NOT EXISTS Cadastro (id INTEGER PRIMARY KEY AUTOINCREMENT, nome TEXT NOT NULL, email TEXT NOT NULL, cargo TEXT NOT NULL, empfor TEXT NOT NULL, segmento TEXT NOT NULL, qtdpessoas INTEGER NOT NULL)");
        $nome = filter_var($_POST['name'], FILTER_SANITIZE_STRING);   
        $email = $_POST['email'];
        $cargo = $_POST['cargo'];
        $empregoformal = $_POST['empresa'];
        $segmento = $_POST['segmento'];
        $pessoas = $_POST['pessoas'];
        $db->exec("INSERT INTO Cadastro(nome, email, cargo, empfor, segmento, qtdpessoas) VALUES ('$nome', '$email', '$cargo', '$empregoformal', '$segmento', '$pessoas')");
        $db->close();
    }

?>