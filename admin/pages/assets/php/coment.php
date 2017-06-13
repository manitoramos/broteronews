<?php
	session_start();
	include("../bd/bd.php");
	
	
	if($_GET["info"] == 1)
	{
		$SQL1 = "DELETE FROM comentarios WHERE sku='{$_GET['sku']}'";

		$resultado1 = mysql_query($SQL1,$LIGA);
	}
	else if($_GET["info"] == 2)//Mudar este para reportar comentario
	{
		$SQL1 = "UPDATE comentarios SET Confirmed='Yes' WHERE sku='{$_GET['sku']}'";

		$resultado1 = mysql_query($SQL1,$LIGA);
	}

	header("Location: ..\..\Admin@comentarios");
?>