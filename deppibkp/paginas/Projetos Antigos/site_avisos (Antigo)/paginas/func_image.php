<?php

function generate_image( $args = array() ) {



	list( $width, $height ) = getimagesize( $args['imagebase'] );
	$args['title_textsize'] = empty( $args['title_textsize'] ) ? round( $height/10 ) : $args['title_textsize'];

	extract( $args );
	
	
	
	//imagen ensino
	if($category_text == 'ENSINO'){
		//Mudar imagem de fundo
		$args['imagebase'] = dirname(__FILE__) .'/imagem_gerada_ENSINO.jpg';
		$im = imagecreatefromjpeg( $args['imagebase'] );// pegando a imagem 
	 	$textcolor = imagecolorallocate( $im,255, 255, 255 ); //Cor do texto branco
		$textcolorsub = imagecolorallocate( $im, 255, 255, 255 );
	}

	//imagem pesquisa
	if($category_text == 'PESQUISA'){
		//Mudar imagem de fundo
		$args['imagebase'] = dirname(__FILE__) .'/imagem_gerada_PESQUISA.jpg';
		$im = imagecreatefromjpeg( $args['imagebase'] );// pegando a imagem 
	 	$textcolor = imagecolorallocate( $im,255, 255, 255 ); //Cor do texto branco
		$textcolorsub = imagecolorallocate( $im, 255, 255, 255 );
	}

	//imagen EXTENSÃO - ok
	if($category_text == 'EXTENSÃO'){
		//Mudar imagem de fundo
		$args['imagebase'] = dirname(__FILE__) .'/imagem_gerada_EXTENSAO.jpg';
		$im = imagecreatefromjpeg( $args['imagebase'] );// pegando a imagem 
	 	$textcolor = imagecolorallocate( $im,25, 67, 56 ); //Cor do texto branco
		$textcolorsub = imagecolorallocate( $im, 255, 255, 255 );

	}

	//imagen ESTÁGIO - ok
	if($category_text == 'ESTÁGIO'){
		//Mudar imagem de fundo
		$args['imagebase'] = dirname(__FILE__) .'/imagem_gerada_ESTAGIO.jpg';
		$im = imagecreatefromjpeg( $args['imagebase'] );// pegando a imagem 
	 	$textcolor = imagecolorallocate( $im,255, 255, 255 ); //Cor do texto branco
		$textcolorsub = imagecolorallocate( $im, 255, 255, 255 );

	}

	//imagen DIREÇÃO GERAL/DIRAP - ok
	if($category_text == 'DIREÇÃO GERAL/DIRAP'){
		//Mudar imagem de fundo
		$args['imagebase'] = dirname(__FILE__) .'/imagem_gerada_DIRAP.jpg';
		$im = imagecreatefromjpeg( $args['imagebase'] );// pegando a imagem 
	 	$textcolor = imagecolorallocate( $im,255, 255, 255 ); //Cor do texto branco
		$textcolorsub = imagecolorallocate( $im, 255, 255, 255 );

	}	

	//imagen DIREN -ok
	if($category_text == 'DIREN'){
		//Mudar imagem de fundo
		$args['imagebase'] = dirname(__FILE__) .'/imagem_gerada_DIREN.jpg';
		$im = imagecreatefromjpeg( $args['imagebase'] );// pegando a imagem 
	 	$textcolor = imagecolorallocate( $im,63,45, 10 ); //Cor do texto branco
		$textcolorsub = imagecolorallocate( $im, 255, 255, 255 );
	}


	//Teste

	//Texto Normal
	$sub_category_text =  trim( $args['sub_category_text'] );//$_POST['sub_category_text']; 
	$title_text =  trim( $args['title_text'] );// $_POST['title_text']; 
	$description_text =   trim( $args['description_text'] );//$_POST['description_text']; 
	$linha = ""; 

	$fit = isset( $textfit ) ? $textfit : true;

 	//Manipulando arquivos - Início 
	

	//Título - salvar 
   $f1 = fopen("title.txt", "w+"); //w+ Abre para leitura e escrita; Apaga o conteúdo que já foi escrito. Tenta criar
   $text1 = $title_text;
   fwrite($f1, $text1);
   fclose($f1);
	//Título - Pegando cada linha da descrição
   $arquivo1 = file("title.txt");
	$linha0 =$arquivo1[0]; 
	$linha1 =$arquivo1[1]; 	


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
	

	//Texto categoria
	$from_side = 220;
	$from_top = 150;
	imagettftext( $im, $sub_category_textsize, $angle, $from_side, $from_top, $textcolorsub, $font, $sub_category_text);


	//Tema - Linha 01
	$from_side = 191;
	$from_top = 358;
	imagettftextORI( $im, $title_textsize, $angle, $from_side, $from_top, $textcolor, $font, $linha0,0);
	//imagettftext( $im, $title_textsize, $angle, $from_side, $from_top, $textcolor, $font, $title_text);

	//Tema - Linha 02
	$from_side = 191;
	$from_top = 485;
	imagettftextORI( $im, $title_textsize, $angle, $from_side, $from_top, $textcolor, $font, $linha1,0);

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
	
	$basename = basename( $args['imagebase'], '.jpg' );
	header('Content-Type: image/jpeg');
	header('Content-Disposition: filename="'. $basename .'.jpg"'); //Nome da imagem gerada
  	imagejpeg($im);
   imagedestroy($im);

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

//é chamada no $filename
//function memegen_sanitize( $input ) {
//	$input = preg_replace( '/[^a-zA-Z0-9-_]/', '-', $input );
//	$input = preg_replace( '/--*/', '-', $input );
//	return $input;
//}


