<?php
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
			require_once "view/home.php";
		}
	}
?>