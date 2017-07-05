<?php
	session_start();
	include("../bd/bd.php");
	
	
	if($_GET["info"] == 1)
	{
		$SQL1 = "DELETE FROM comentarios WHERE sku='{$_GET['sku']}'";

		$resultado1 = mysql_query($SQL1,$LIGA);
	}
	else if($_GET['info'] == 2)
	{
		$UPD = "UPDATE comentarios SET reports=reports+1 WHERE sku='{$_GET['sku']}'";
		
		$res = mysql_query($UPD,$LIGA);
		
	}
	else if($_GET['info'] == 3)
	{
		$UPD = "UPDATE comentarios SET reports=0 WHERE sku='{$_GET['sku']}'";
		
		$res = mysql_query($UPD,$LIGA);
		
	}

	header("Location: {$_SESSION['oldpage']}");
?>