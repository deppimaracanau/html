<?php

function generate_image( $args = array() ) {



	list( $width, $height ) = getimagesize( $args['imagebase'] );
	$args['title_textsize'] = empty( $args['title_textsize'] ) ? round( $height/10 ) : $args['title_textsize'];

	extract( $args );
	
	
	//imagen ensino
	if($category_text == 'ENSINO'){
		//Mudar imagem de fundo
		$args['imagebase'] = dirname(__FILE__) .'/imagens/background_eixos/imagem_gerada_ENSINO.jpg';
		$dest = imagecreatefromjpeg( $args['imagebase'] );// pegando a imagem 
	 	$textcolor = imagecolorallocate( $dest,255, 255, 255 ); //Cor do texto branco
		$textcolorsub = imagecolorallocate( $dest, 255, 255, 255 );
	}

	//imagem pesquisa
	if($category_text == 'PESQUISA'){
		//Mudar imagem de fundo
		$args['imagebase'] = dirname(__FILE__) .'/imagens/background_eixos/imagem_gerada_PESQUISA.jpg';
		$dest = imagecreatefromjpeg( $args['imagebase'] );// pegando a imagem 
	 	$textcolor = imagecolorallocate( $dest,255, 255, 255 ); //Cor do texto branco
		$textcolorsub = imagecolorallocate( $dest, 255, 255, 255 );
	}

	//imagen EXTENSÃO - ok
	if($category_text == 'EXTENSÃO'){
		//Mudar imagem de fundo
		$args['imagebase'] = dirname(__FILE__) .'/imagens/background_eixos/imagem_gerada_EXTENSAO.jpg';
		$dest = imagecreatefromjpeg( $args['imagebase'] );// pegando a imagem 
	 	$textcolor = imagecolorallocate( $dest,25, 67, 56 ); //Cor do texto branco
		$textcolorsub = imagecolorallocate( $dest, 255, 255, 255 );

	}

	//imagen ESTÁGIO - ok
	if($category_text == 'ESTÁGIO'){
		//Mudar imagem de fundo
		$args['imagebase'] = dirname(__FILE__) .'/imagens/background_eixos/imagem_gerada_ESTAGIO.jpg';
		$dest = imagecreatefromjpeg( $args['imagebase'] );// pegando a imagem 
	 	$textcolor = imagecolorallocate( $dest,255, 255, 255 ); //Cor do texto branco
		$textcolorsub = imagecolorallocate( $dest, 255, 255, 255 );

	}

	//imagen DIREÇÃO GERAL/DIRAP - ok
	if($category_text == 'DIREÇÃO GERAL/DIRAP'){
		//Mudar imagem de fundo
		$args['imagebase'] = dirname(__FILE__) .'/imagens/background_eixos/imagem_gerada_DIRAP.jpg';
		$dest = imagecreatefromjpeg( $args['imagebase'] );// pegando a imagem 
	 	$textcolor = imagecolorallocate( $dest,255, 255, 255 ); //Cor do texto branco
		$textcolorsub = imagecolorallocate( $dest, 255, 255, 255 );

	}	

	//imagen DIREN -ok
	if($category_text == 'DIREN'){
		//Mudar imagem de fundo
		$args['imagebase'] = dirname(__FILE__) .'/imagens/background_eixos/imagem_gerada_DIREN.jpg';
		$dest = imagecreatefromjpeg( $args['imagebase'] );// pegando a imagem 
	 	$textcolor = imagecolorallocate( $dest,63,45, 10 ); //Cor do texto branco
		$textcolorsub = imagecolorallocate( $dest, 255, 255, 255 );
	}


	
	//Teste

	//Texto Normal
	$sub_category_text =  trim( $args['sub_category_text'] );//$_POST['sub_category_text']; 
	$title_text =  trim( $args['title_text'] );// $_POST['title_text']; 
	$description_text =   trim( $args['description_text'] );//$_POST['description_text']; 
	$linha = ""; 

	$fit = isset( $textfit ) ? $textfit : true;



	//Título - salvar 
   $f1 = fopen("./gerar_image_02/title.txt", "w+"); //w+ Abre para leitura e escrita; Apaga o conteúdo que já foi escrito. Tenta criar
   $text1 = $title_text;
   fwrite($f1, $text1);
   fclose($f1);
	//Título - Pegando cada linha da descrição
   $arquivo1 = file("./gerar_image_02/title.txt");
	$linha0 =$arquivo1[0]; 
	$linha1 =$arquivo1[1]; 


	//Descrição - salvar 
   $f2 = fopen("./gerar_image_02/description.txt", "w+"); //w+ Abre para leitura e escrita; Apaga o conteúdo que já foi escrito. Tenta criar
   $text2 = $description_text;
   fwrite($f2, $text2);
   fclose($f2);
	//Descrição - Pegando cada linha da descrição
   $arquivo2 = file("./gerar_image_02/description.txt");
	$linha00 =$arquivo2[0]; 
	


	$angle = 0;

	//$dest = imagecreatefromjpeg('./imagens/tipo02/imagem_fundo.jpg');
	$src = imagecreatefromjpeg('./imagens/tipo02/imagem.jpg');


	imagealphablending($dest, false);
	imagesavealpha($dest, true);
	
	list($width1, $height1) = getimagesize('./imagens/tipo02/imagem_fundo.jpg');
	list($width2, $height2) = getimagesize('./imagens/tipo02/imagem.jpg');

	$metade_width1 = $width1/2;
	$metade_width2 = $width2/2;

	$metade_height1 = $height1/2;
	$metade_height2 = $height2/2;

	if($width2 >= 1535){

		if($height2 >= 545){
			imagecopymerge($dest, $src, 195, 170, 0, 0, 1535, 545, 100); 
		} else {
			imagecopymerge($dest, $src, 195, ($metade_height1-$metade_height2)-100, 0, 0, 1535, $height2, 100); 
		}
	}else {
		if($height2 >= 545){
		imagecopymerge($dest, $src, ($metade_width1-$metade_width2), 170, 0, 0, $width2, 545, 100);
		} else{
			imagecopymerge($dest, $src, ($metade_width1-$metade_width2), ($metade_height1-$metade_height2)-100, 0, 0, $width2, $height2, 100);
		}
	}


	//Texto categoria
	$from_side = 220;
	$from_top = 150;
	imagettftext( $dest, $sub_category_textsize, $angle, $from_side, $from_top, $textcolorsub, $font, $sub_category_text);

	//Tema - Linha 01
	$from_side = 191;
	$from_top = 800;
	imagettftextORI( $dest, $title_textsize, $angle, $from_side, $from_top, $textcolor, $font, $linha0,0);

	//Tema - Linha 02
	$from_side = 191;
	$from_top = 880;
	imagettftextORI( $dest, $title_textsize, $angle, $from_side, $from_top, $textcolor, $font, $linha1,0);
	//Descrição - Linha 01
	$from_side = 191;
	$from_top = 970;
	imagettftextORI( $dest, $descrition_textsize, $angle, $from_side, $from_top, $textcolor, $font_sub, $linha00,1);

	$basename = basename( $args['imagebase'], '.jpg' );
	header('Content-Type: image/jpeg');
	header('Content-Disposition: filename="'. $basename .'.jpg"'); //Nome da imagem gerada
	imagejpeg($dest);

	imagedestroy($dest);
	imagedestroy($src);

 
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
