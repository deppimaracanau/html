<?php
	
	class bd {

		private $host = 'localhost';
		private $usuario = 'postgres';
		private $senha = '1';
		private $database = 'semic';

		public function estabelecerConexao() {
			if( !@($conexao = pg_connect("host=$this->host dbname=$this->database port=5432 user=$this->usuario password=$this->senha") ) ) {

	        	return null;

			} else {
				
				return $conexao;

			}
		}

	}
	
?>