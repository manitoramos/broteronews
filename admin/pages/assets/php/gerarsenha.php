<?php
	session_start();
	include("../bd/bd.php");
	
	$tamanho = 15;
	$maiusculas = true;
	$numeros = true;
	$simbolos = false;
	$lmin = 'abcdefghijklmnopqrstuvwxyz';
	$lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$num = '1234567890';
	$simb = '!@#$%*-';
	$retorno = '';
	$caracteres = '';
	$caracteres .= $lmin;
	if ($maiusculas) $caracteres .= $lmai;
	if ($numeros) $caracteres .= $num;
	if ($simbolos) $caracteres .= $simb;
	$len = strlen($caracteres);
	for ($n = 1; $n <= $tamanho; $n++) {
		$rand = mt_rand(1, $len);
		$retorno .= $caracteres[$rand-1];
	}
	
	
	$cript = sha1(sha1("grubb" . $retorno));
	
	$SQL1 = "UPDATE users SET password='{$cript}' WHERE id='{$_SESSION['usid']}'";
	$resultado1 = mysql_query($SQL1,$LIGA);
	
	$SEL = "SELECT * from users WHERE id='{$_SESSION['usid']}'";
	$resultado2 = mysql_query($SEL,$LIGA);
	$registo1 = mysql_fetch_array($resultado2);
	
	//echo $retorno;
			
			//email automatico para dizer que a conta foi desativada
			/*
			$de = "broteronews@gmail.com";
			$headers = "From: BroteroNews <".$de.">\n";
			$headers .= "Content-Type: Text/HTML; charset=UTF-8\n";*/
			
			$de = "broteronews@gmail.com";
			$headers = "From: BroteroNews\n";
			$headers .= "Content-Type: Text/HTML; charset=UTF-8\n";
			
			$mensagem = "Sua palavra passe foi resetada:<b>{$retorno}</b>";
			
			$email = $registo1['email'];
			
			// formatação da mensagem em HTML
			$mensagem = '<html>
			<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
			<body>
			' . $mensagem . '
			</body>
			</html>';

			$result = mail($email,'Reset de Palavra passe',$mensagem,$headers);
			//Verifica se o e-mail foi enviado com Sucesso
			if(!$result) {   
				 echo "Error";   
			} else {
				echo "Success";
			}
	
?>