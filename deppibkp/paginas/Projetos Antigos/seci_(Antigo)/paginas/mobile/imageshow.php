<?php
include ("../../config_bd/conexao.php");
include ("../../config_bd/bd_imageshow.php");

?>

<!DOCTYPE html>
<html>
<head>
<title>SECI - Sistema Eletrônico de Comunicação Interna</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script
	src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body onload="exibir()">

	<div class="container">
		<h2>Avisos - IFCE Campus Maracanaú</h2>
		<div id="myCarousel" class="carousel slide" data-ride="carousel">


			<!-- Wrapper for slides -->
			<div class="carousel-inner">


				<div id="slideshow"></div>
			</div>


		</div>
	</div>

</body>
</html>


<script type="text/javascript">

	var n=1;
	function exibir(){
		for (i = 0; i < <?php echo $_SESSION['qtd_avisos']?>; i++) { 

			var novoItem = ' <div class="item "><img src="../uploads/img'+n+'.jpg"  height=100% width=100%> </div>';
			$('#slideshow').append(novoItem);
			n++;
			      
		}
}	
</script>



</body>
</html>
