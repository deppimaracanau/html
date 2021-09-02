<?php
       

include("../../config_bd/conexao.php");
include("../../config_bd/bd_imageshow.php");

        /*if(!@($conexao=pg_connect ("host=localhost dbname=avisos port=5432 user=postgres password=1"))) {
            print "Não foi possível estabelecer uma conexão com o banco de dados.";
        } else {
          
            //Verificando se o usuário está cadastrado no banco
            $sql = pg_query("SELECT quantidade FROM qtd_avisos;")
            or die ("Erro no comando SQL");
            
            //TABELA: quantidades
            if (! $sql) {
                echo "Consulta não foi executada!";
            }
          
            while($row = pg_fetch_array($sql)) {
                
                $_SESSION['qtd_avisos'] = $row[0];
             
            }
                pg_close ($conexao);
                
        }*/
?>

<html>
	<head>
	  	<title>SECI - Sistema Eletrônico de Comunicação Interna</title>
		<meta charset="UTF-8">
		<meta http-equiv="cache-control" content="no-store, no-cache, must-revalidate, Post-Check=0, Pre-Check=0">
		<meta http-equiv="expires" content="0">
		<meta http-equiv="pragma" content="no-cache">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
	</head>
	<body onload = "exibir()">
    <div id="slideshow">

    </div>
    
    </body>
</html>

<script type="text/javascript">

	var n=1;
	function exibir(){
		for (i = 0; i < <?php echo $_SESSION['qtd_avisos']?>; i++) { 

			var novoItem = '<img src="../uploads/img'+n+'.jpg"  height=100% width=100%>';
			$('#slideshow').append(novoItem);
			n++;
			      
		}
}	
</script>
		
		
<script>
var slideshow = document.getElementById('slideshow');
var slides = slideshow.getElementsByTagName('img');
var idx = 0;
function changeSlide() {
	slides[idx].style.display = 'none';
	idx = (idx + 1) % slides.length;
	slides[idx].style.display = 'block';
}
setInterval(changeSlide, 20000);
</script>
</body>
</html>
