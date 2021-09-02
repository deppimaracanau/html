<?php

ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);
class bd
{

	private $host = 'localhost';
	private $usuario = 'postgres';
	private $senha = 'root';
	private $database = 'certificados';
	private $conexao;

	public function estabelecerConexao()
	{
		try {
			$this->conexao = new PDO("pgsql:host=$this->host;dbname=$this->database", $this->usuario, $this->senha);
			$this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//echo "Conectado com sucesso.";
		} catch (PDOException $erro) {
			echo "<h1>Ops, algo deu errado: " . $erro->getMessage() . "</h1>";
			echo "<pre>";
			echo print_r($erro);
		}
		return $this->conexao;
	}
	// close Connection
	public function close_connection()
	{
		if (isset($this->conexao)) {
			pg_close($this->conexao);
			unset($this->conexao);
		}
	}
}
