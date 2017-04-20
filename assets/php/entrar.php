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
		$e = 0;
		$i = 0;
		$veri = "SELECT * FROM users";
		$verr = mysql_query($veri,$LIGA);
		
		//Para saber quantos utilizadores tem antes de inserir
		while($ver = mysql_fetch_array($verr)){$i++;}
		
		//criptografar password
		$senha = $_POST['password'];
		
		$cript = sha1(sha1("grubb" . $senha));	
		
		//INSERIR O REGISTO DO UTILIZADOR
		$registo = "INSERT INTO users (user,email,password,nome,sexo,since) VALUES 
		('{$_POST['user']}','{$_POST['email']}','{$cript}','{$_POST['nome']}','{$_POST['sexo']}',". date("d/m/Y") .")";
		$res = mysql_query($registo,$LIGA);
		
		$veri = "SELECT * FROM users";
		$verr = mysql_query($veri,$LIGA);
		
		//Para saber se o utilizador foi registado com Sucesso
		while($ver = mysql_fetch_array($verr)){$e++;}
		
		if($e < $i){echo "false";}
		else{echo "true";}
		
		exit();
		
	}
	else//para entrar na conta
	{
		$senha = $_POST['password'];
		
		$cript = sha1(sha1("grubb" . $senha));
		
		$SQL1 = "SELECT * FROM users where email='{$_POST['email']}' AND password='{$cript}'";
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