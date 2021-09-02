<?php
date_default_timezone_set("Brazil/East"); // Definindo timezone padrão

include ("../config_bd/conexao.php");

// Verificando se o usuário está cadastrado no banco
$sql = pg_query("SELECT quantidade FROM qtd_avisos;") or die("Erro no comando SQL");

// TABELA: quantidades
if (! $sql) {
    echo "Consulta não foi executada!";
}

while ($row = pg_fetch_array($sql)) {
    $_SESSION['qtd_avisos'] = $row[0];
}

pg_close($conexao);

for ($i = 1; $i <= $_SESSION['qtd_avisos']; $i ++) {
    
    $ext = strtolower(substr($_FILES['fileUpload' . $i]['name'], - 4)); // Pegando extensão do arquivo
    $nome = $_POST['nomeImg' . $i];
    $new_name = $nome . $ext; // Definindo um novo nome para o arquivo
    $dir = '../paginas/uploads/'; // Diretório para uploads
    move_uploaded_file($_FILES['fileUpload' . $i]['tmp_name'], $dir . $new_name); // Fazer upload do arquivo
                                                                              
    // Salvando cópia da imagem na galeria
    $um = $i;
    $new_name_gallery = date("Y.m.d-H.i.s") . $um . $ext;
    $dir_gallery = '../paginas/galeria_avisos/';
    copy($dir . $new_name, $dir_gallery . $new_name_gallery);
}
/*
 * //img1
 * $ext = strtolower(substr($_FILES['fileUpload1']['name'],-4)); //Pegando extensão do arquivo
 * $nome = $_POST['nomeImg1'];
 * $new_name = $nome. $ext; //Definindo um novo nome para o arquivo
 * $dir = 'uploads/'; //Diretório para uploads
 * move_uploaded_file($_FILES['fileUpload1']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
 *
 * //Salvando cópia da imagem na galeria
 * $um = "1";
 * $new_name_gallery = date("Y.m.d-H.i.s").$um.$ext;
 * $dir_gallery = 'galeria_avisos/';
 * copy($dir.$new_name, $dir_gallery.$new_name_gallery);
 *
 *
 * //img2
 * $ext = strtolower(substr($_FILES['fileUpload2']['name'],-4)); //Pegando extensão do arquivo
 * $nome = $_POST['nomeImg2'];
 * $new_name = $nome. $ext; //Definindo um novo nome para o arquivo
 * $dir = 'uploads/'; //Diretório para uploads
 * move_uploaded_file($_FILES['fileUpload2']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
 *
 * //Salvando cópia da imagem na galeria
 * $dois = "2";
 * $new_name_gallery = date("Y.m.d-H.i.s").$dois.$ext;
 * $dir_gallery = 'galeria_avisos/';
 * copy($dir.$new_name, $dir_gallery.$new_name_gallery);
 *
 * //img3
 * $ext = strtolower(substr($_FILES['fileUpload3']['name'],-4)); //Pegando extensão do arquivo
 * $nome = $_POST['nomeImg3'];
 * $new_name = $nome. $ext; //Definindo um novo nome para o arquivo
 * $dir = 'uploads/'; //Diretório para uploads
 * move_uploaded_file($_FILES['fileUpload3']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
 *
 * //Salvando cópia da imagem na galeria
 * $tres = "3";
 * $new_name_gallery = date("Y.m.d-H.i.s").$tres.$ext;
 * $dir_gallery = 'galeria_avisos/';
 * copy($dir.$new_name, $dir_gallery.$new_name_gallery);
 *
 * //img4
 * $ext = strtolower(substr($_FILES['fileUpload4']['name'],-4)); //Pegando extensão do arquivo
 * $nome = $_POST['nomeImg4'];
 * $new_name = $nome. $ext; //Definindo um novo nome para o arquivo
 * $dir = 'uploads/'; //Diretório para uploads
 * move_uploaded_file($_FILES['fileUpload4']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
 *
 * //Salvando cópia da imagem na galeria
 * $quatro = "4";
 * $new_name_gallery = date("Y.m.d-H.i.s").$quatro.$ext;
 * $dir_gallery = 'galeria_avisos/';
 * copy($dir.$new_name, $dir_gallery.$new_name_gallery);
 *
 * //Novo
 * //img5
 * $ext = strtolower(substr($_FILES['fileUpload5']['name'],-4)); //Pegando extensão do arquivo
 * $nome = $_POST['nomeImg5'];
 * $new_name = $nome. $ext; //Definindo um novo nome para o arquivo
 * $dir = 'uploads/'; //Diretório para uploads
 * move_uploaded_file($_FILES['fileUpload5']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
 *
 * //Salvando cópia da imagem na galeria
 * $cinco = "5";
 * $new_name_gallery = date("Y.m.d-H.i.s").$cinco.$ext;
 * $dir_gallery = 'galeria_avisos/';
 * copy($dir.$new_name, $dir_gallery.$new_name_gallery);
 *
 * //img6
 * $ext = strtolower(substr($_FILES['fileUpload6']['name'],-4)); //Pegando extensão do arquivo
 * $nome = $_POST['nomeImg6'];
 * $new_name = $nome. $ext; //Definindo um novo nome para o arquivo
 * $dir = 'uploads/'; //Diretório para uploads
 * move_uploaded_file($_FILES['fileUpload6']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
 *
 * //Salvando cópia da imagem na galeria
 * $seis = "6";
 * $new_name_gallery = date("Y.m.d-H.i.s").$seis.$ext;
 * $dir_gallery = 'galeria_avisos/';
 * copy($dir.$new_name, $dir_gallery.$new_name_gallery);
 */

// alterando arquivo.txt

$f = fopen("../../site_principal/arquivo.txt", "r+"); // Abre para leitura e gravação; coloca o ponteiro no começo do arquivo.
$text = 'b';
fwrite($f, $text);
fclose($f);

// inicio mqtt

//sleep(10); // ??? Para ter certeza que deu tempo as novas imagens subirem para o servidor

require("phpMQTT.php");

$server = "ifce.sanusb.org";     // change if necessary
$port = 1883;                     // change if necessary
$username = "";                   // set your username
$password = "";                   // set your password
$client_id = "pedro-MQTTx"; // make sure this is unique for connecting to sever - you could use uniqid()

$mqtt = new phpMQTT($server, $port, $client_id);

if ($mqtt->connect(true, NULL, $username, $password)) {
	$mqtt->publish("/seci", "atualizar", 0);
	$mqtt->close();
}

// fim mqtt

sleep(10); // Espera 10 segundos para dá tempo o raspberry atualizar os avisos, tempo muito pegueno pode não atualizar
           
// alterando arquivo.txt
$f = fopen("../../site_principal/arquivo.txt", "r+");
$text = 'a';
fwrite($f, $text);
fclose($f);
header("Location:../paginas/principal_adm.php");
?>




