<?php
	session_start();
	include("../bd/bd.php");
	
	
	if($_POST['acao'] == 1)
	{
		$SQL4 = "UPDATE categorias SET Confirmed='Yes' WHERE id='{$_POST['catid']}'";
		
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
	else if ($_POST['acao'] == 2)
	{
		$SQL4 = "DELETE FROM categorias WHERE id='{$_POST['catid']}'";
		
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