<?php
	abstract class conexao
	{
		protected $bd;
		
		function __construct()
		{
			//par?metros de conex?o(qual banco de dados, qual ? o servidor e nome banco de dados)
			$parm = "mysql:host=localhost;dbname=mySpot";
			try
			{
				$this->db = new PDO($parm, "root", "");
			}
			catch(Exeption $e)
			{
				die($e->getMessage());
			}
		}//construct
	}//classe
?>