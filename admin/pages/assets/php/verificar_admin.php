<?php
	include("assets/bd/bd.php");
	if(isset($_SESSION['user']))
	{
		$SQL5 = "SELECT * FROM users WHERE user='{$_SESSION['user']}'";
		$resultado5 = mysql_query($SQL5,$LIGA);
		$registo5 = mysql_fetch_array($resultado5);
		
		if($registo5['previlegios'] == 3){/*se fores admin ficas na pagina senao vais para a pagina inicial do admin*/}
		else
		{
			header("Location: Admin@home");
		}
	}
?>