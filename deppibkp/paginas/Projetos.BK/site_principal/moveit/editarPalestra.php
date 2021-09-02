<?php
	session_start();

	include_once('seguranca.php');
	if(isset($_GET['id'])){
        if(isset($res)){unset($res);}
 		include_once('conexao.php');
 		$sql = "SELECT * FROM palestras WHERE id = '{$_GET['id']}'";
 		if($_SESSION['nivelAcesso']!=1){
 			$sql.="AND id_palestrante = '{$_SESSION['id']}'";
 		}
 		$result = mysqli_query($con,$sql) or print mysql_error();
 		$res = mysqli_fetch_assoc($result);
 		mysqli_close($con);
	}
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MoveIT - Editar Palestra</title>

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
      <h2 class="hcontainer">Editar Palestra</h2>
      <p class="text-center text-danger">
        <?php
          //Apagando string que seria impressa nesse <p>
          if(isset($_SESSION['msgErrorUpPalestra'])){
            echo $_SESSION['msgErrorUpPalestra'];
            unset($_SESSION['msgErrorUpPalestra']);
          }
        ?>
      </p>
        <p class="text-center text-success">
          <?php
            if(isset($_SESSION['msgOkUpPalestra'])){
              echo $_SESSION['msgOkUpPalestra'];
              unset($_SESSION['msgOkUpPalestra']);
            }
          ?>
        </p> 
      <form method="POST" action="updatePalestra.php">
        <?php
            if($_SESSION['nivelAcesso']==1){
                $optEstado1 = $res['estado']==1 ? "selected" : " ";
                $optEstado2 = $res['estado']==0 ? "selected" : " ";
                $optLocal = $res['local']=="" ? "A definir" : $res['local'];
                echo '
                  <div class="form-row">
                    <div class="form-group col-md-1">
                        <label for="estado">Estado:</label>
                        <select name="estado" class="form-control">
                            <option '.$optEstado1.' >ON</option>
                            <option '.$optEstado2.' >OFF</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="local">Local:</label>
                      <select name="local" class="form-control">
                        <option selected>'.$optLocal.'</option>
                        <option>A definir</option>
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
            <input class="form-control" name="titulo" value="<?php echo $res['titulo'];?>" required>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-10">
            <label for="link_img" class="col-form-label">Link da Imagem:</label>
            <input class="form-control" name="link_img" value="<?php echo $link_img = $res['link_img'] == "" ? "" : $res['link_img'];?>">
          </div>
        </div>
       <div class="form-group row">
          <div class="col-2">
            <label for="qtVagas" class="col-form-label">Quantidade de Vagas:</label>
            <input class="form-control" type="number" min="2" max="1000" name="qtVagas" value="<?php echo $res['qtVagas'];?>">
          </div>
        </div>
        <div class="form-row">
        	<div class="form-group col-md-1">
            	<label for="horaInicio">Inicia:</label>
            	<select name="horaInicioH" class="form-control">
            		<option selected><?php echo substr($res['horaInicio'], 0,2)?></option>
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
              <option selected><?php echo substr($res['horaInicio'], 3,5)?></option>
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
              <option selected><?php echo substr($res['horaTermino'], 0,2)?></option>
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
              <option selected><?php echo substr($res['horaTermino'], 3,5)?></option>
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
              <option <?php if(substr($res['data'],8,9)=="28"){echo "selected";}?> >28/09/2018</option>
              <option <?php if(substr($res['data'],8,9)=="29"){echo "selected";}?> >29/09/2018</option>
            </select>
          </div>
 	      </div>
		<div class="form-group">
		    <label for="descricao">Descrição</label>
		    <textarea class="form-control rounded-0" name="descricao" rows="10" required><?php echo str_replace('<br />', "\n", $res['descricao']);?></textarea>
		</div>
		<div class="form-group">
		    <label for="necessidades">Recursos necessários:</label>
		    <textarea class="form-control rounded-0" name="necessidades" rows="5"><?php $rNecessidades = $res['necessidades']=="0" ? "" : str_replace('<br />', "\n", $res['necessidades']); echo $rNecessidades;?></textarea>
		</div>
        <input type="hidden" name="urlAnterior" value=<?php echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?> />
        <input type="hidden" name="idPalestra" value=<?php echo $_GET['id'] ?> />
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
