<?php
if(!@($conexao=pg_connect ("host=localhost dbname=certificados port=5432 user=postgres password=1"))) {
   print "Não foi possível estabelecer uma conexão com o banco de dados.";
} else {

	// Verificando se o usuário está cadastrado no banco
$sql = pg_query("SELECT texto FROM texto_certificado;") or die("Erro no comando SQL");

// TABELA: quantidades
if (! $sql) {
    echo "Consulta não foi executada!";
}

while ($row = pg_fetch_array($sql)) {
    
    $_SESSION['texto'] = $row[0];
}
}
function generate_image( $args = array() ) {



	list( $width, $height ) = getimagesize( $args['imagebase'] );
	$args['title_textsize'] = empty( $args['title_textsize'] ) ? round( $height/10 ) : $args['title_textsize'];

	extract( $args );
	
	
	
	//Textos defaults 
	$category_text =  'XXXXXXXXX';
	$sub_category_text =  'XXXXXXXXX';
	$title_text =  'XXXXXXXXX';
	$tema_text = 'XXXXXXXXX';
	$evento_text =  'XXXXXXXXX';
	$carga_h_text = 'XXXXXXXXX';
	$description_text =   'XXXXXXXXX';
	//Recebendo os textos trim tira espaços em branco
	$category_text =  trim( $args['category_text'] );
	$sub_category_text =  trim( $args['sub_category_text'] );
	$title_text =  trim( $args['title_text'] );
	$tema_text =  trim( $args['tema_text'] );
	$evento_text =  trim( $args['evento_text'] );
	$carga_h_text =  trim( $args['carga_h_text'] );
	$description_text =   trim( $args['description_text'] );
	$tipo_certificado =   trim( $args['tipo_certificado'] );
	$linha = ""; 

	$arquivo1 = file("nomes.txt");
	$linha0 =$arquivo1[0]; 
	$linha1 =$arquivo1[1]; 	

	for ($i = 0; $i < count($arquivo1); $i++) {
   
//Mudar imagem de fundo
	$args['imagebase'] = dirname(__FILE__) .'/modelo.jpg';
	$im = imagecreatefromjpeg( $args['imagebase'] );// pegando a imagem 
	$textcolor = imagecolorallocate( $im,0, 0, 0 ); //Cor do texto branco
	$textcolorsub = imagecolorallocate( $im, 0, 0, 0 );
	
	/*if($tipo_certificado == 'palestrante'){
	$text_certificado = 'Certificamos que '.strtoupper(trim($arquivo1[$i])).' apresentou o(a) '.strtoupper($category_text).': '.strtoupper($tema_text).' no(a) '.strtoupper($evento_text).' durante a IV Semana de Integração Científica (SIC) do IFCE campus de Maracanaú no ano de 2017, com carga horária de '.$carga_h_text.' horas.';
	} else {
		$text_certificado = 'Certificamos que '.strtoupper(trim($arquivo1[$i])).' participou o(a) '.strtoupper($category_text).': '.strtoupper($tema_text).' no(a) '.strtoupper($evento_text).' durante a IV Semana de Integração Científica (SIC) do IFCE campus de Maracanaú no ano de 2017, com carga horária de '.$carga_h_text.' horas.';
	}*/
	
	$text_certificado = 'Certificamos que '.strtoupper(trim($arquivo1[$i])).' '.$_SESSION['texto'];

	

	


 	//Manipulando arquivos - Início 
	

	//Título - salvar 
 /*	$f1 = fopen("title.txt", "w+"); //w+ Abre para leitura e escrita; Apaga o conteúdo que já foi escrito. Tenta criar
   	$text1 = $title_text;
   	fwrite($f1, $text1);
   	fclose($f1);
	//Título - Pegando cada linha da descrição
   
	$linha2 =$arquivo1[2]; 	
	$linha3 =$arquivo1[3]; 	
	$linha4 =$arquivo1[4]; 
	$linha5 =$arquivo1[5]; 	
	$linha6 =$arquivo1[6]; 	
	$linha7 =$arquivo1[7]; 		

	/*
	//Descrição - salvar 
 	$f2 = fopen("description.txt", "w+"); //w+ Abre para leitura e escrita; Apaga o conteúdo que já foi escrito. Tenta criar
   	$text2 = $description_text;
   	fwrite($f2, $text2);
   	fclose($f2);
	//Descrição - Pegando cada linha da descrição
   	$arquivo2 = file("description.txt");
	$linha00 =$arquivo2[0]; 
	$linha11 =$arquivo2[1]; 	
	$linha22 =$arquivo2[2]; 
*/
	
	//Manipulando arquivos - Fim
	

	//echo $sub_category_text;
	//echo $title_text;
	//echo $description_text;
	$angle = 0;
	
	
	
	//Teste - inicio
	//$size = imagettfbbox($textsize, $angle, $font, $title_text);
   //$xsize = abs($size[0]) + abs($size[2]);
   //$ysize = abs($size[5]) + abs($size[1]);

	//$image = imagecreate($xsize, $ysize);
   //$textcolor = imagecolorallocate( $image,255, 255, 255 );
	//$textcolorsub = imagecolorallocate( $image, 0, 0, 0 );
	//Teste - fim

	//$dimensions = imagettfbbox($textsize, $angle, $font, $title_text);
	//$textWidth = abs($dimensions[4] - $dimensions[0]);
	//$x = imagesx($im) - $textWidth - 100; // direta
	//$center1 = (imagesx($image) / 2) - (($bbox[2] - $bbox[0]) / 2); //center
	
	/*
	//Texto categoria
	$from_side = 220;
	$from_top = 150;
	imagettftext( $im, $sub_category_textsize, $angle, $from_side, $from_top, $textcolorsub, $font, $sub_category_text);
	*/

	//Tema - Linha 01
	//Teste01
	//$nome_certificado = 'Pedro Vitor';
	//$linha0 = 'Certificamos que '.strtoupper($nome_certificado).' '.$linha0;

	//Teste02 tentar usar o imagettftext normal do php com o text area
	//string wordwrap (string $title_text [, int $width = 75 [, string $break = "\n" [, bool $cut = false ]]]);
	
	$newtext = wordwrap($text_certificado, 70, "\n");
	$from_side = 550;
	$from_top = 610;
	imagettftextORI( $im, $title_textsize, $angle, $from_side, $from_top, $textcolor, $font, $newtext,0);
	//imagettftext( $im, $title_textsize, $angle, $from_side, $from_top, $textcolor, $font, $title_text);

	/*//Tema - Linha 02
	$from_side = 550;
	$from_top = 610;
	imagettftextORI( $im, $title_textsize, $angle, $from_side, $from_top, $textcolor, $font, $linha1,0);

	//Tema - Linha 03
	$from_side = 550;
	$from_top = 662;
	imagettftextORI( $im, $title_textsize, $angle, $from_side, $from_top, $textcolor, $font, $linha2,0);

	//Tema - Linha 04
	$from_side = 550;
	$from_top = 714;
	imagettftextORI( $im, $title_textsize, $angle, $from_side, $from_top, $textcolor, $font, $linha3,0);

	//Tema - Linha 05
	$from_side = 550;
	$from_top = 766;
	imagettftextORI( $im, $title_textsize, $angle, $from_side, $from_top, $textcolor, $font, $linha4,0);

	//Tema - Linha 06
	$from_side = 550;
	$from_top = 818;
	imagettftextORI( $im, $title_textsize, $angle, $from_side, $from_top, $textcolor, $font, $linha5,0);

	//Tema - Linha 07
	$from_side = 550;
	$from_top = 870;
	imagettftextORI( $im, $title_textsize, $angle, $from_side, $from_top, $textcolor, $font, $linha6,0);
	/*
	//Descrição - Linha 01
	$from_side = 191;
	$from_top = 630;
	imagettftextORI( $im, $descrition_textsize, $angle, $from_side, $from_top, $textcolor, $font_sub, $linha00,1);

	//Descrição - Linha 02
	$from_side = 191;
	$from_top = 710;
	imagettftextORI( $im, $descrition_textsize, $angle, $from_side, $from_top, $textcolor, $font_sub, $linha11,1);

	//Descrição - Linha 03
	$from_side = 191;
	$from_top = 790;
	imagettftextORI( $im, $descrition_textsize, $angle, $from_side, $from_top, $textcolor, $font_sub, $linha22,1);
	*/
	$basename = basename( $args['imagebase'], '.jpg' );
	header('Content-Type: image/jpeg');
	header('Content-Disposition: filename="'. $basename .'.jpg"'); //Nome da imagem gerada
  	//imagejpeg($im);
	header("Location:./compactar.php"); //compactar certificados
  	//salva certificado em uma pasta
  	date_default_timezone_set("Brazil/East"); //Definindo timezone padrão
  	imagejpeg($im,'certificados/'.$arquivo1[$i].'.jpg');


  	//teste

  /*	$images = array($im);
	$pdf = new Imagick($images);
	$pdf->setImageFormat('pdf');
	$pdf->writeImages('combined.pdf', true); 

  	imagedestroy($im);*/
  
}

 
}

//Original
function imagettftextORI($image, $size, $angle, $x, $y, $color, $font, $text, $spacing = 0)
{        
    if ($spacing == 0)
    {
        imagettftext($image, $size, $angle, $x, $y, $color, $font, $text);
    }
    else
    {
		//Converter texto para utf-8
		$text = mb_convert_encoding($text,"auto", "UTF-8");
        $temp_x = $x;
        for ($i = 0; $i < strlen($text); $i++)
        {
            $bbox = imagettftext($image, $size, $angle, $temp_x, $y, $color, $font, $text[$i]);
            $temp_x += $spacing + ($bbox[2] - $bbox[0]);
        }
    }
}


