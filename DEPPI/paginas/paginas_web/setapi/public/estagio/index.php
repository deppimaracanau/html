<?php
/**
 * Example
 */

require_once( 'functions.php' );

// if form not submitted, show it and bail
if ( ! isset( $_GET['top_text'] ) && ! isset( $_GET['bottom_text'] ) ) {
	?>

	<style type="text/css">
	body {
	
		background:url(./bgimage.jpg);
		background-position: center center;	
		background-repeat:no-repeat;
		margin-top: 200px;
	}

	#parte01 {
		float: left;
		width:33%;
		//background-color: green;
		position: relative;
		top: 50px;
		left: 205px;
		
	}

	#parte02 {
		float: left;
		width:33%;
		//background-color: black;
		position: relative;
		top: 50px;
		left: 205px;
	}
	</style>
	<head> <meta charset="UTF-8"></head>
	<body >
	<form>
	<div id="parte01">
		<p>Título da Vaga:<br /><input name="top_text" /></p>
		<p>Sub-título:<br /><input name="sub_text" /></p>
		<p>Descrição:<br /><textarea rows="4" cols="50" name="bottom_text" /></textarea></p>
		<p><input type="submit" value="Gerar Imagem"/></p>
	</div>
	</form>
		
		<div id="parte02">
			Imagem de plano de fundo:<br><br>
			<img width="400" height="250" src="imagem_gerada.jpg" />
		</div>
	</body>
	<?php
	die();
}

// get form submission (or defaults)
$top_text    = isset( $_GET['top_text'] )    ? $_GET['top_text']    : 'Cat hair';
$sub_text    = isset( $_GET['sub_text'] )    ? $_GET['sub_text']    : 'sub';
$bottom_text = isset( $_GET['bottom_text'] ) ? $_GET['bottom_text'] : 'Cat hair everywhere';
$filename    = memegen_sanitize( $bottom_text ? $bottom_text : $top_text );

// setup args for image
$args = array(
	'top_text'    => $top_text,
	'bottom_text' => $bottom_text,
	'sub_text'    => $sub_text,
	'filename'    => $filename,
	'font'        => dirname(__FILE__) .'/Anton.ttf',
	'font_sub'    => dirname(__FILE__) .'/sans.ttf',
	'memebase'    => dirname(__FILE__) .'/imagem_gerada.jpg',
	'textsize'    => 70,
	'textfit'     => true,
	'padding'     => 70,
	'margin'       => 10,	
);

// create and output image
memegen_build_image( $args );
