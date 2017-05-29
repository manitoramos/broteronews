<?php
	session_start();
	if(!isset($_SESSION['user']))
	{
		echo "Precisas de fazer login para publicar comentarios";
	}
	else
	{
		include("../bd/bd.php");
		
		echo "{$_POST['noticia']}/{$_POST['comentario']}";
		if($_POST['comentario'] == ""){}
		else
		{
			
			//quantas rows tem antes de tentar inserir outro comentario
			$res2 = mysql_query("SELECT id from comentarios", $LIGA);
			$rows = mysql_num_rows($res2);
			
			$INS1 = "INSERT INTO comentarios (id,user,mensagem) VALUES ('{$_POST['noticia']}','{$_SESSION['user']}','{$_POST['comentario']}')";
			$res1 = mysql_query($INS1,$LIGA);
			
			//quantas rows tem depois de inserir o comentario
			$res2 = mysql_query("SELECT id from comentarios", $LIGA);
			$rows2 = mysql_num_rows($res2);
			
			if($rows2 > $rows)
			{
				echo "/true/{$rows2}";
			}
			else{echo "/false";}
			
		}
	}
?>