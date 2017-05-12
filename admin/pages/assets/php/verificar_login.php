<?php

	session_start();
	include("assets/bd/bd.php");
	if(isset($_SESSION['user']))
	{
		$SQL5 = "SELECT * FROM users WHERE user='{$_SESSION['user']}'";
		$resultado5 = mysql_query($SQL5,$LIGA);
		$registo5 = mysql_fetch_array($resultado5);
		
		if($registo5['previlegios'] == 1)
		{
			header("Location: home");
		}
	}
	else if(!isset($_SESSION['user']))
	{
		if(!isset($_SESSION['pagina']))
		{
			header("Location: \\home");
		}
		else
		{
			header("Location: home");
		}
	}
	
?>