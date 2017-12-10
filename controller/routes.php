<?php
	include_once "auto.php";
	class routes
	{
		function start()
		{
			header("Location:index.php?controller=c_user&method=login");
		}

		function register()
		{
			require_once "view/register.php";
		}

		function home()
		{	
			$id = $_GET["id"];
			$user = new user($id);
			$userDAO2 = new userDAO();
			$retorno = $userDAO2 -> search_address($user);
			require_once "view/home.php";
		}
	}
?>