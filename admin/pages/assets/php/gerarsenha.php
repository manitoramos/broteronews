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
	
	echo $retorno;
	
?>