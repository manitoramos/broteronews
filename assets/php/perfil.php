<?php
	session_start();
	
	include("../bd/bd.php");
	
	$i = rand(1 , 3000000);
	
	//verifica se ele esta a inserir uma imagem senão nao deixa inserir
	if(is_array($_FILES)) {
    $check = getimagesize($_FILES["div1"]["tmp_name"]);
		if($check !== false) {
			
		} else {
			echo "false";
			exit();
		}
	}
	
	if ($_FILES["div1"]["size"] > 500000) {
		echo "large";
		$uploadOk = 0;
		exit();
	}
	
	//inser a imagem na pasta de imagens de perfil
	if(is_array($_FILES)) {
		if(is_uploaded_file($_FILES['div1']['tmp_name'])) {
		$sourcePath = $_FILES['div1']['tmp_name'];
		$targetPath = "../img-perfil/{$i}".$_FILES['div1']['name'];
		if(move_uploaded_file($sourcePath,$targetPath)) {
		}
		}
		echo "true";
	}
	
	//eleminar a imagem antiga do utilizador se ele tiver
	$remimg = "SELECT * FROM users WHERE user='{$_SESSION['user']}'";
	$rimg = mysql_query($remimg,$LIGA);
	$reg = mysql_fetch_array($rimg);
	
	//verifica se ele tinha ou nao foto
	if($reg['img'] == ""){
	}
	else{
	$_SESSION['img'] = $reg['img'];
	}		
	
	//pasta onde esta a imagem para ficar na basedados
	$target = "assets/img-perfil/{$i}".$_FILES['div1']['name'];
	
	//inser a imagem na basedados do utilizador
	$imagem = "UPDATE users SET img='{$target}' WHERE user='{$_SESSION['user']}'";
	$img = mysql_query($imagem,$LIGA);

?>