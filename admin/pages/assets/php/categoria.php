<?php
	session_start();
	include("../bd/bd.php");
	
	
	$SQL4 = "INSERT INTO categorias (categoria) VALUES ('{$_POST['categoria_pedido']}')";
	
	$resultado4 = mysql_query($SQL4,$LIGA);

	if(!$resultado4)
	{				
		//echo "Erro" . mysql_errno(). " - " . mysql_error();
		//die('Registo nao encontrado');
		echo "false";
	}
	else
	{
		echo "true";
	}
	
	
	
	
?>