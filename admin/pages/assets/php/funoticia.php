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
	else if($_POST['acao'] == "remind")//REMOVER A NOTICIA DO SLIDE DO INDEX
	{
		
		$SQL4 = "UPDATE noticias SET s_index=0 WHERE id='{$_POST['notid']}'";
		
		$resultado4 = mysql_query($SQL4,$LIGA);

		if(!$resultado4)
		{				
			//echo "Erro" . mysql_errno(). " - " . mysql_error();
			//die('Registo nao encontrado');
			echo "falseindexup0";
		}
		else
		{
			echo "trueindexup0";
		}
		
	}
	else if($_POST['acao'] == "desind")//DESTACAR A NOTICIA NO SLIDE DO INDEX
	{
		
		$SQL4 = "UPDATE noticias SET s_index=1 WHERE id='{$_POST['notid']}'";
		
		$resultado4 = mysql_query($SQL4,$LIGA);

		if(!$resultado4)
		{				
			//echo "Erro" . mysql_errno(). " - " . mysql_error();
			//die('Registo nao encontrado');
			echo "falseindexup1";
		}
		else
		{
			echo "trueindexup1";
		}
		
	}
	else if($_POST['acao'] == "remenu")//REMOVER A NOTICIA NO SLIDE DO MENU
	{
		
		$SQL4 = "UPDATE noticias SET s_noticia=0 WHERE id='{$_POST['notid']}'";
		
		$resultado4 = mysql_query($SQL4,$LIGA);

		if(!$resultado4)
		{				
			//echo "Erro" . mysql_errno(). " - " . mysql_error();
			//die('Registo nao encontrado');
			echo "falsemenuup0";
		}
		else
		{
			echo "truemenuup0";
		}
		
	}
	else if($_POST['acao'] == "desmenu")//DESTACAR A NOTICIA NO SLIDE DO MENU
	{
		
		$SQL4 = "UPDATE noticias SET s_noticia=1 WHERE id='{$_POST['notid']}'";
		
		$resultado4 = mysql_query($SQL4,$LIGA);

		if(!$resultado4)
		{				
			//echo "Erro" . mysql_errno(). " - " . mysql_error();
			//die('Registo nao encontrado');
			echo "falsemenuup1";
		}
		else
		{
			echo "truemenuup1";
		}
		
	}
	
?>