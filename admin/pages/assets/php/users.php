<?php
	session_start();
	include("../bd/bd.php");
	
	
	//**************//
	//DESATIVAR USER//
	//**************//
	if(!isset($_POST['userid']))
	{
	}
	else
	{
		if($_POST['change'] == "desativar")
		{
			$des = "UPDATE users SET estado=2 WHERE id='{$_POST['userid']}'";
			$res = mysql_query($des,$LIGA);
			echo "desativar";
		}
		else
		{
			$des = "UPDATE users SET estado=1 WHERE id='{$_POST['userid']}'";
			$res = mysql_query($des,$LIGA);
			echo "ativar";
		}
		
		//echo $_POST['change'];
		
		exit();
	}
	//*******************//
	//INFORMAÇÕES DO USER//
	//*******************//
	
	if(!isset($_POST['usid']))
	{
	}
	else
	{
		$select = "SELECT * FROM users WHERE id='{$_POST['usid']}'";
		$_SESSION['usid'] = $_POST['usid'];
		
		echo $_SESSION['usid'];
		
		exit();
	}
	
?>