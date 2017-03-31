<?php

	session_start();
	
	if(!isset($_SESSION['user']))
	{
		if(!isset($_SESSION['pagina']))
		{
			header("Location: \\index.php");
		}
		else
		{
			header("Location:". $_SESSION['pagina'] . "");
		}
	}
	
?>