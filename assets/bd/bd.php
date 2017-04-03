<?php
	$server = "localhost";
	$user = "root";
	//$senha = "";
	$bd = "broteronews";
											
	$LIGA =@mysql_connect("$server","$user","") or die ("servidor nao esta a responder!");
									
	$db =@mysql_select_db($bd,$LIGA) or die ("Nao foi possivel conectar-se ao banco de dados!");
?>