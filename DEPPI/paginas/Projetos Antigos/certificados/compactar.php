<?php
// diretório que será compactado
$diretorio = 'certificados/';

// inicializa a classe ZipArchive
$zip = new ZipArchive();
// abre o arquivo .zip
if ($zip->open("certificado.zip", ZIPARCHIVE::CREATE) !== TRUE) {
die ("Erro!");
}

$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($diretorio));

// itera cada pasta/arquivo contido no diretório especificado
foreach ($iterator as $key=>$value) {
// adiciona o arquivo ao .zip
$zip->addFile(realpath($key), iconv('ISO-8859-1', 'IBM850', $key)) or die ("ERRO: Não é possível adicionar o arquivo: $key");
}
// fecha e salva o arquivo .zip gerado
$zip->close();

$fullPath = "./certificado.zip";

if(file_exists($fullPath)){
    // Forçamos o donwload do arquivo.
    header('Content-Type: application/zip');
    header('Content-Disposition: attachment; filename="./certificado.zip"');
    readfile($fullPath);
    //removemos o arquivo zip após download
    unlink($fullPath);
}

$files = glob('./certificados/*'); // get all file names
foreach($files as $file){ // iterate files
  if(is_file($file))
    unlink($file); // delete file
}


?>