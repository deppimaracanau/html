<?php
   require_once( 'func_image.php' );
   // if form not submitted, show it and bail
   if ( ! isset( $_GET['title_text'] ) && ! isset( $_GET['description_text'] ) ) {
?>

<html>
   <head>
      <title>SIC - Gerador de Certificados</title>
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <meta charset="UTF-8">
   </head>
   <body>
      <!-- Conteúdo do cabeçalho -->
      <header >
         
      </header>
      <!-- Conteúdo do cabeçalho -->
      <section >
         <!-- Conteúdo principal -->
         <form>
            <p>Tipo Atividade:</p>
            <select name="category_text">
               <option>Minicurso</option>
               <option>Palestra</option>
               <option>Oficina</option>
            </select>
            <p>Tipo certificado:</p>
            <input type="radio" name="tipo_certificado" value="palestrante" checked> Palestrante<br>
            <input type="radio" name="tipo_certificado" value="participante"> Participante<br>
 
            <!--<p>Título da Vaga:<br /><input name="sub_category_text" /></p>-->

            <!-- tirar isso do código só colocar se for individual o certificado TIRAR HIDDEN do 
            Nome Participante-->
            <!--<p>Nome Participante:--><br /><input type="hidden" name="title_text"> </p>
            <p>Tema:<br /><input type="text" name="tema_text"> </p>
            <p>Evento:<br /><input type="text" name="evento_text"> </p>
            <p>Carga Horária<br /><input type="text" name="carga_h_text"> </p>
            <p><input type="submit" style="width:150;height:30" value="Gerar Certificado"/></p>
         </form>
      </section>
      <footer >
         <span class="fonte_menus">© Copyright 2017 DEPPI - Departamento de Extensão, Pesquisa, Pós-graduação e Inovação</span>
      </footer>
   </body>
</html>
<?php
   die();
   }
   
   // get form submission (or defaults)
   $category_text    = isset( $_GET['category_text'] )    ? $_GET['category_text']    : ''; 
   $sub_category_text    = isset( $_GET['sub_category_text'] )    ? $_GET['sub_category_text']    : ''; 
   $title_text       = isset( $_GET['title_text'] )    ? $_GET['title_text']    : ''; 
   $tema_text      = isset( $_GET['tema_text'] )    ? $_GET['tema_text']    : '';
    $evento_text      = isset( $_GET['evento_text'] )    ? $_GET['evento_text']    : '';
   $carga_h_text     = isset( $_GET['carga_h_text'] )    ? $_GET['carga_h_text']    : '';
   $description_text = isset( $_GET['description_text'] ) ? $_GET['description_text'] : ''; 
   $tipo_certificado = isset( $_GET['tipo_certificado'] ) ? $_GET['tipo_certificado'] : ''; 
   //$filename          = memegen_sanitize( $description_text ? $description_text : $title_text );
   
   $args = array(
   'category_text'    => $category_text,
   'sub_category_text'    => $sub_category_text,
   'title_text'    => $title_text,
   'tema_text'    => $tema_text,
    'evento_text'    => $evento_text,
   'carga_h_text'    => $carga_h_text,
   'description_text' => $description_text,
   'tipo_certificado' => $tipo_certificado,
   'filename'    => $filename,
   'font'        => dirname(__FILE__) .'/fonts/UbuntuMono-R.ttf',
   'font_sub'    => dirname(__FILE__) .'/fonts/UbuntuMono-R.ttf',//'/sans.ttf',
   'imagebase'    => dirname(__FILE__) .'/imagem_gerada.jpg',
   'sub_category_textsize'    => 30,
   'title_textsize'    => 30,
   'descrition_textsize'    => 30,
   'textfit'     => true,
   'padding'     => 70,
   'margin'      => 10, 
   );
   
   // create and output image 
   generate_image( $args );
   
   ?>

