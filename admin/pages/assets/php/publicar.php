<?php
	session_start();
	$begin = 0;
	$finish = 0;
	include("../bd/bd.php");
	
		
	if(is_array($_FILES)) {
	if(is_uploaded_file($_FILES['image']['tmp_name'])) {
	$sourcePath = $_FILES['image']['tmp_name'];
	$targetPath = "../../../../assets/img/".$_FILES['image']['name'];
	if(move_uploaded_file($sourcePath,$targetPath)) {
	}
	}
	}
	
	//if(($_POST['titulo'] == "") or ($_POST['descricao'] == "") or ($_POST['desshort'] == "") or ($_FILES['image']['name'] == "")){
		//echo "Algum Campo nao foi Inserido!";
	if($_POST['titulo'] == ""){
		echo "///Campo do Titulo em Branco!!///titulo";
	}else if($_POST['categoria'] == ""){
		echo "///Categoria nao preenchido!!///categoria";
	}else if($_POST['descricao'] == ""){
		echo "///Campo da Mensagem em Branco!!///descricao";
	}else if($_POST['desshort'] == ""){
		echo "///Campo da Descrição Breve em Branco!!///desshort";
	}else if($_FILES['image']['name'] == ""){
		echo "///Tem de Inserir uma Imagem!!///imagem";
	}else{
		$SQL1 = "SELECT * FROM noticias";
		$resultado1 = mysql_query($SQL1,$LIGA);
		//Para saber quantas noticas estao antes de inserir
		while($registo1 = mysql_fetch_array($resultado1))
		{
			$begin++;
		}
		
		$INS1 = "INSERT INTO noticias (id_categoria,autor,titulo,descricao,desshort,imagem,data) VALUES ('{$_POST['categoria']}','{$_SESSION['user']}','{$_POST['titulo']}','{$_POST['descricao']}','{$_POST['desshort']}','assets/img/{$_FILES['image']['name']}','" .  date("Y-m-d") . "')";
		$res1 = mysql_query($INS1,$LIGA);
		
		//Comparar depois de inserir para ver se inseriu para mandar o (return false ou true) para mostrar a mensagem de (erro ou de sucesso)
		$SQL1 = "SELECT * FROM noticias";
		$resultado1 = mysql_query($SQL1,$LIGA);
		while($registo1 = mysql_fetch_array($resultado1))
		{
			$finish++;
		}
		if($finish > $begin){echo "true";}
		else{echo "false";}
	}
	
	
?>