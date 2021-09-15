<?php
	session_start();

	include_once('seguranca.php');
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MoveIT - Criar Palestra</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">
    <link href="css/standard.css" rel="stylesheet">

  </head>

  <body>

    <?php
      include('menu.php');
    ?>

 

    <!-- Page Content -->
    <!--<div class="container">
      <h2>Minhas Palestras</h2>

      <div class="row">
      	<?php //listarPalestras();?>
      </div>
    </div>-->
    <div class="container">
      <!-- Portfolio Section -->
      <h2 class="hcontainer">Criar Palestra</h2>
      <p class="text-center text-danger">
        <?php
          //Apagando string que seria impressa nesse <p>
          if(isset($_SESSION['msgErrorCreatePalestra'])){
            echo $_SESSION['msgErrorCreatePalestra'];
            unset($_SESSION['msgErrorCreatePalestra']);
          }
        ?>
      </p>
        <p class="text-center text-success">
          <?php
            if(isset($_SESSION['msgOkCreatePalestra'])){
              echo $_SESSION['msgOkCreatePalestra'];
              unset($_SESSION['msgOkCreatePalestra']);
            }
          ?>
        </p> 
      <form method="POST" action="createPalestra.php">
        <?php
            if($_SESSION['nivelAcesso']==1){
                echo '
                  <div class="form-row">
                    <div class="form-group col-md-1">
                        <label for="estado">Estado:</label>
                        <select name="estado" class="form-control">
                            <option>ON</option>
                            <option>OFF</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="local">Local:</label>
                      <select name="local" class="form-control">
                        <option>Local 1</option>
                        <option>Local 2</option>
                        <option>Local 3</option>
                        <option>Local 4</option>
                      </select>
                    </div>
                  </div>
                ';
            }
        ?>
        <div class="form-group row">
          <div class="col-10">
          	<label for="titulo" class="col-form-label">Título:</label>
            <input class="form-control" name="titulo" required>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-10">
            <label for="link_img" class="col-form-label">Link da Imagem:</label>
            <input class="form-control" name="link_img">
          </div>
        </div>
       <div class="form-group row">
          <div class="col-2">
            <label for="qtVagas" class="col-form-label">Quantidade de Vagas:</label>
            <input class="form-control" type="number" min="2" max="1000" name="qtVagas">
          </div>
        </div>
        <div class="form-row">
        	<div class="form-group col-md-1">
            	<label for="horaInicio">Inicia:</label>
            	<select name="horaInicioH" class="form-control">
            		<option>07</option>
            		<option>08</option>
        		    <option>09</option>
        		    <option>10</option>
        		    <option>11</option>
                <option>12</option>
        		    <option>13</option>
        		    <option>14</option>
        		    <option>15</option>
                <option>16</option>
        		    <option>17</option>
        		    <option>18</option>
              </select>
    		  </div>
          <div class="form-group col-md-1">
            <label style="color:white !important">.</label>
            <select name="horaInicioM" class="form-control">
              <option>00</option>
              <option>05</option>
              <option>10</option>
              <option>15</option>
              <option>20</option>
              <option>25</option>
              <option>30</option>
              <option>35</option>
              <option>40</option>
              <option>45</option>
              <option>50</option>
              <option>55</option>
            </select>
          </div>
          <div class="form-group col-md-1">
            <label for="horaTerminoH">Termina:</label>
            <select name="horaTerminoH" class="form-control">
              <option>07</option>
              <option>08</option>
              <option>09</option>
              <option>10</option>
              <option>11</option>
              <option>12</option>
              <option>13</option>
              <option>14</option>
              <option>15</option>
              <option>16</option>
              <option>17</option>
              <option>18</option>
            </select>
          </div>
          <div class="form-group col-md-1">
            <label style="color:white !important">.</label>
            <select name="horaTerminoM" class="form-control">
              <option>00</option>
              <option>05</option>
              <option>10</option>
              <option>15</option>
              <option>20</option>
              <option>25</option>
              <option>30</option>
              <option>35</option>
              <option>40</option>
              <option>45</option>
              <option>50</option>
              <option>55</option>
            </select>
          </div>
          <div class="form-group col-md-2">
            <label for="data">Data:</label>
            <select name="data" class="form-control">
              <option>28/09/2018</option>
              <option>29/09/2018</option>
            </select>
          </div>
 	      </div>
		<div class="form-group">
		    <label for="descricao">Descrição</label>
		    <textarea class="form-control rounded-0" name="descricao" rows="10" required></textarea>
		</div>
		<div class="form-group">
		    <label for="necessidades">Recursos necessários:</label>
		    <textarea class="form-control rounded-0" name="necessidades" rows="5"></textarea>
		</div>
        <input type="hidden" name="urlAnterior" value=<?php echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?> />
        <button class="col-md-1 btn btn-lg btn-success btn-block" type="submit" name='submit'>Salvar</button>
      </form>
    </div>
    <!-- Footer -->
    <?php include_once('footer.php');?>

    <!-- Bootstrap core JavaScript -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

  </body>

</html>
