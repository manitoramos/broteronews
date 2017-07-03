<?php
	session_start();
	
	include("../bd/bd.php");
	
	if(isset($_POST['savepass']))
	{
		$SQL8 = "SELECT * FROM users where user='{$_SESSION['user']}'";
		$resultado8 = mysql_query($SQL8,$LIGA);
		$registo8 = mysql_fetch_array($resultado8);
		
		//criptografar password
		$senha = $_POST['oldpw'];
		
		$cript = sha1(sha1("grubb" . $senha));	
		
		if($cript != $registo8['password'])
		{
			echo "falseold";
		}
		else
		{
			if($_POST['newpw'] != $_POST['new2pw'])
			{
				echo "falsenew";
			}
			else
			{
				//criptografar password
				$senha2 = $_POST['new2pw'];
				
				$cript2 = sha1(sha1("grubb" . $senha2));
				
				$UPT3 = "UPDATE users SET password='{$cript2}' WHERE user='{$_SESSION['user']}'";
				
				$res15 = mysql_query($UPT3,$LIGA);
				
				$de = "broteronews@gmail.com";
				$headers = "From: BroteroNews\n";
				$headers .= "Content-Type: Text/HTML; charset=UTF-8\n";
				
				$mensagem = "Sua password foi mudada com sucesso!!";
				
				$email = $registo8['email'];
				
				// formatação da mensagem em HTML
				$mensagem = '<html>
				<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
				<body>
				' . $mensagem . '
				</body>
				</html>';

				$result = mail($email,'Password',$mensagem,$headers);
				//Verifica se o e-mail foi enviado com Sucesso
				if(!$result) {   
					 echo "Error";   
				} else {
					echo "truechange";
				}
			}
		}
		
	}

?>