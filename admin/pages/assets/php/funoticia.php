<?php
	session_start();
	include("../bd/bd.php");
	
	
	if($_POST['acao'] == "publicar")
	{
		
		$SQL4 = "UPDATE noticias SET Confirmed='Yes' WHERE id='{$_POST['notid']}'";
		
		$resultado4 = mysql_query($SQL4,$LIGA);

		if(!$resultado4)
		{				
			//echo "Erro" . mysql_errno(). " - " . mysql_error();
			//die('Registo nao encontrado');
			echo "falseup";
		}
		else
		{
			echo "trueup";
		}	
	}
	else if($_POST['acao'] == "apagar")
	{
		
		$SQL4 = "DELETE FROM noticias WHERE id='{$_POST['notid']}'";
		
		$resultado4 = mysql_query($SQL4,$LIGA);

		if(!$resultado4)
		{				
			//echo "Erro" . mysql_errno(). " - " . mysql_error();
			//die('Registo nao encontrado');
			echo "falsedel";
		}
		else
		{
			echo "truedel";
		}
		
	}
	
?>