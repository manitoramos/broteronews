<?php
	session_start();
	
	include("../bd/bd.php");
	
	if(isset($_GET['acao']))//para fazer logout
	{
		unset($_SESSION['user']);
		header("Location: {$_SESSION['pagina']}");
	}
	else if(isset($_POST['reg']))//para registar
	{
		
	}
	else//para entrar na conta
	{
		$SQL1 = "SELECT * FROM users where email='{$_POST['email']}' AND password='{$_POST['password']}'";
		$resultado1 = mysql_query($SQL1,$LIGA);
		//Para saber quantas noticas estao antes de inserir
		
		$registo1 = mysql_fetch_array($resultado1);
		
		if($registo1 == "")
		{
			echo "false";
		}
		else
		{
			echo "true";
			$_SESSION['user'] = $registo1['user'];
		}
	}
	
?>