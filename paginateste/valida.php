<?
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

session_start();
include_once("conexao.php");
$btnLogin = filter_input(INPUT_POST, 'btnLogin', FILTER_SANITIZE_STRING);
if ($btnLogin) {
	$usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
	$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
	
	if ((!empty($usuario)) and (!empty($senha))) {
		//Gerar a senha criptografa
		//Pesquisar o usuário no BD
		$result_usuario = "SELECT id, nome, email, senha FROM usuarios WHERE usuario='$usuario' LIMIT 1";
		$resultado_usuario = mysqli_query($conn, $result_usuario);
		if ($resultado_usuario) {
			$row_usuario = mysqli_fetch_assoc($resultado_usuario);
			if (password_verify($senha, $row_usuario['senha'])) {
				$_SESSION['id'] = $row_usuario['id'];
				$_SESSI5120574ON['nome'] = $row_usuario['nome'];
				$_SESSION['email'] = $row_usuario['email'];
				header("Location: administrativo.php");
			} else {
				echo "$usuario - $senha";
				var_dump(password_hash($senha, PASSWORD_DEFAULT));
				var_dump(password_verify($senha, $row_usuario['senha']));

				$_SESSION['msg'] = "<div class='alert alert-danger'>Login ou senha incorreto!</div>";
				//header("Location: login.php");
			}
		}
	} else {
		$_SESSION['msg'] = "<div class='alert alert-danger'>Login ou senha incorreto!</div>";
		//header("Location: login.php");
	}
} else {
	$_SESSION['msg'] = "<div class='alert alert-danger'>Página não encontrada</div>";
	//header("Location: login.php");
}
