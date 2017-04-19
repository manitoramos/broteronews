<?php
	session_start();
	include("../bd/bd.php");
	
	
	//**************//
	//DESATIVAR USER//
	//**************//
	if(!isset($_POST['userid']))
	{
	}
	else
	{
		if($_POST['change'] == "desativar")
		{
			$des = "UPDATE users SET estado=2 WHERE id='{$_POST['userid']}'";
			$res = mysql_query($des,$LIGA);
			echo "desativar";
			echo "/";
			
			//email automatico para dizer que a conta foi desativada
			$de = "broteronews@gmail.com";
			$headers = "From: BroteroNews <".$de.">\n";
			$headers .= "Content-Type: Text/HTML; charset=UTF-8\n";
			
			$mensagem = "Sua Conta da BroteroNews foi Desativada consulte o suporte para mais informação.";
			
			$email = $_POST['email'];
			
			// formatação da mensagem em HTML
			$mensagem = '<html>
			<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
			<body>
			' . $mensagem . '
			</body>
			</html>';

			$result = mail($email,'Conta Desativada',$mensagem,$headers);
			//Verifica se o e-mail foi enviado com Sucesso
			if(!$result) {   
				 echo "Error";   
			} else {
				echo "Success";
			}	
			
		}
		else
		{
			$des = "UPDATE users SET estado=1 WHERE id='{$_POST['userid']}'";
			$res = mysql_query($des,$LIGA);
			echo "ativar";
		}
		
		//echo $_POST['change'];
		
		exit();
	}
	//*******************//
	//INFORMAÇÕES DO USER//
	//*******************//
	
	if(!isset($_POST['usid']))
	{
	}
	else
	{
		$select = "SELECT * FROM users WHERE id='{$_POST['usid']}'";
		$_SESSION['usid'] = $_POST['usid'];
		
		echo $_SESSION['usid'];
		
		exit();
	}
	
?>