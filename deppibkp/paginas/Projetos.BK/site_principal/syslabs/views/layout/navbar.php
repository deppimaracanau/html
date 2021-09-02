
<!-- ------------------- NavBar ------------------- -->
<nav class="navbar navbar-default navbar-fixed-top barra">
    <div class="container">
        
    	<div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" 
                  data-toggle="collapse" data-target="#barra-navegacao">
            <span class="sr-only">Alternar Menu</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          	</button>
        	<a href="../home/home.php" class="navbar-brand"><div class="logo">SysLab</div></a>
        </div>

        <div class="collapse navbar-collapse" id="barra-navegacao">
			<ul class="nav navbar-nav navbar-right">
				<li><a>Logado como <?= $_SESSION['nome'] ?>, </a> </li>
				<li><a href="../../models/login/logout.php">LogOut</a> </li>
			</ul>
        </div>
    </div>
</nav>

<br><br><br><br><br>