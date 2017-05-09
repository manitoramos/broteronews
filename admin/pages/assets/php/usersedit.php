<?php
	session_start();
	include("../bd/bd.php");
	
	if(!isset($_POST['editt'])){}
	else
	{
		if($_POST['editt'] == "edituser")
		{
			
			$SQL1 = "UPDATE users SET user='{$_POST['value']}' WHERE id='{$_POST['pk']}'";
			$resultado1 = mysql_query($SQL1,$LIGA);
			
			echo "true";
			
		}
		
		if($_POST['editt'] == "editnomp")
		{
			
			$SQL1 = "UPDATE users SET nome='{$_POST['value']}' WHERE id='{$_POST['pk']}'";
			$resultado1 = mysql_query($SQL1,$LIGA);
			
			echo "true";
			
		}
		
		if($_POST['editt'] == "editaces")
		{
			
			/*$SQL2 = "SELECT * FROM acesso where l_acesso='{$_POST['text']}'";
			$resultado2 = mysql_query($SQL2,$LIGA);
			$registo2 = mysql_fetch_array($resultado2);*/
			
			$SQL1 = "UPDATE users SET previlegios='{$_POST['value']}' WHERE id='{$_POST['pk']}'";
			$resultado1 = mysql_query($SQL1,$LIGA);
			
			echo "true";
			
		}
	}
	
	if(isset($_POST['editvalss']))
	{
		
		$ei1 = "";
		$ei2 = "";
		$i = 0;
		
		$SQL20 = "SELECT * FROM acesso";
		$results20 = mysql_query($SQL20,$LIGA);
		
		while($registo20 = mysql_fetch_array($results20))
		{
			$ei2 = '"' . $registo20["id"] . '":"' .$registo20["l_acesso"] . '"';
			if($i == 0)
			{
				$ei1 = "";
				$i++;
			}
			else
			{
				$ei1 .= ",";
			}
			$ei1 .= $ei2;
		}
		
		$ei1 .= "";
		echo $ei1;
		
	}

?>