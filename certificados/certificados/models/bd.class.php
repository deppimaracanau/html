<?php
	
	class bd {

		private $host = 'localhost';
		private $usuario = 'root';
		private $senha = 'root';
		private $database = 'certificados';

		public function estabelecerConexao() {
			if( !@($conexao = pg_connect("
				host=$this->host 
				dbname=$this->database 
				port=5432 user=$this->usuario 
				password=$this->senha") 
					)		 
				) 
				
				{

	        	return null;

			} else {
				
				return $conexao;

			}
		}

	}
