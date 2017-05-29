<?php
	session_start();
	if(!isset($_GET['not']))
	{
		header("Location: {$_SESSION['pagina']}");
	}
	else
	{
		include("assets/bd/bd.php");
	}
	
	$SQL1 = "SELECT * FROM noticias WHERE id={$_GET['not']}";

    $resultado1 = mysql_query($SQL1,$LIGA);
	
	$registo1 = mysql_fetch_array($resultado1);
	
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $registo1['titulo']; ?></title>

    <!-- Custom CSS -->
    <link href="css/heroic-features.css" rel="stylesheet">
	
	<link href="caroussel.css" rel="stylesheet">
	
	<!-- Custom Fonts -->
    <link href="admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="bootstrap-solid.ico">
    <style>
      .ex2 {
        width:335px;
        height:209px;
      }
       .carousel-inner > .item > img,
       .carousel-inner > .item > a > img {
        width: 100%;
        margin: auto;
      }
	.newreply-topbar{
		 height:30px;
		 border-bottom:1px solid #dddddd;
		 background-color:#f6f6f9;
	} 
	.newreply-textarea{
		border:0;display:block;
		height:100px;width:100%;
		box-sizing:border-box;
		padding:5px 10px;
		background-color:#f2f2f2;
		font-size:13px;color:#585858;
		resize:vertical;
	}
	.newreply-post{
		text-align: center;
		font-size: 12px;
		font-weight: 700;
		padding 10px 14px;
		display: inline-block;
		color: #fff;
		background-color: #2d6da3;
		/*box-shadow: 0 1px 2px 0 rgba(0,0,0,0.1);*/
		cursor:pointer;
		border: 0;
		margin: 10px 0;
	}
	.pa-foot{
	border-top: 1px solid #ddd;
	background-color: #f5f5f5
}
.space{
	height: 20px;
	line-height: 20px;
	padding: 0 9px;
	float: right;
	vertical-align: middle;
	border-left: 1px solid #dddddd;
	cursor: pointer;
}
    </style>


  </head>
  <body>

	<!-- TOP MENU -->
    <?php include("assets/menu/menu.php") ?>
	<!-- \\TOP MENU -->
		<div class="container">
			<div class="row">
				<div class="col-md-12">
				
					<img width="1138px" height="500px" src="<?php echo $registo1['imagem'];?>">
				</div>
				<div class="col-md-9">
					<p><b><?php echo $registo1['data']?></b></p>
				</div>
				<div class="col-md-3">
					<p><b>visualizacoes, likes e comentarios</b></p>
				</div>
			</div>
			<div class="row">
			<div class="col-md-9">
				<!-- Noticia -->
				<h3><?php echo $registo1['titulo']; ?></h3>
				<div style="border-top: 1px solid #348DE6"></div>
				<p><?php echo $registo1['descricao']; ?></p>
				<!-- Comentarios -->
				<h3>Comentarios</h3>
				<div style="border-top: 1px solid #348DE6"></div>
					<br>
					<?php
						$SQL1 = "SELECT * FROM comentarios WHERE id='{$_GET['not']}'";
	
						$resultado1 = mysql_query($SQL1,$LIGA);
					
						while($registo1 = mysql_fetch_array($resultado1))
						{
								//para saber se tem permisões para eleminar os comentarios
								$SQL3 = "SELECT * FROM users WHERE user=\"{$_SESSION['user']}\"";
								$resultado3 = mysql_query($SQL3,$LIGA);
								$registo3 = mysql_fetch_array($resultado3);
								//....\\\
								
								/*echo "<div class=\"col-sm-1\">";
								echo "<div class=\"thumbnail\">";
								echo "<img class=\"img-responsive user-photo\" src=\"{$registo3['img']}\">";
								echo "</div>";//thumbnail 
								echo "</div>";//col-sm-1*/


								echo "<div id=\"{$registo1['sku']}\" class=\"panel panel-default\">";
								echo "<div class=\"panel-heading\">";
								if($registo1['user'] == $_SESSION['user'])
								{
									echo "<strong style=\"color:red;\">Você</strong> <span class=\"text-muted\">commented 5 days ago</span>";
								}
								else
								{
									echo "<strong style=\"color:#4d4dff;\">{$registo1["user"]}</strong> <span class=\"text-muted\">commented 5 days ago</span>";
								}
								echo "</div>";
								echo "<div class=\"panel-body\">";
								echo "{$registo1["mensagem"]}";
								echo "</div>";//panel-body 
								echo "<div class=\"pa-foot\">";
									echo "&nbsp;&nbsp;&nbsp;<span>edited</span>";
									if($registo3['previlegios'] == 3){
										echo "&nbsp;<a href=\"Admin@coment/{$registo1["sku"]}/1\"><span class=\"space\">Reply</span></a> <a href=\"Admin@coment/{$registo1["sku"]}/2\"><span class=\"space\">Eliminar</span></a>";
									}
									else{
										echo "&nbsp;<a href=\"Admin@coment/{$registo1["sku"]}/1\"><span class=\"space\">Eliminar</span></a> <a href=\"Admin@coment/{$registo1["sku"]}/2\"><span class=\"space\">Publicar</span></a>";
									}
								echo "</div>";
								echo "</div>";//panel panel-default 
						}
					
					?>
					<hr>
					<?php if(isset($_SESSION['user'])){ ?>
					<div class="newreply-topbar"><span style="position:relative;top:5px;left:5px;color:#4d4dff;"><b>Novo Comentario</b></span></div>
					<textarea name="coment" id="coment" class="newreply-textarea" placeholder="Escreva aqui o seu comentario"></textarea>
					<button onclick="postcoment(<?php echo $_GET['not']; ?>)" class="newreply-post" style="margin-top:10px;">Publicar Comentario</button>
					<br>
					<?php 
					}
					else{
						echo "<center>Tens de fazer Login para poder comentar!!</center>";
						echo "<br>";
					}

					?>
					
				
			</div>
			<div class="col-md-3">
				<h3>Destaques</h3>
				<div style="border-top: 1px solid #348DE6"></div>
	
			</div>
			</div>
		</div>
	  
	  

    <?php include("assets/footer.php"); ?>

	<!-- standard version -->
	<script src="https://cdn.rawgit.com/alertifyjs/alertify.js/v1.0.10/dist/js/alertify.js"></script>
	
	<script>
	function postcoment(x)
	{
		
		var http = new XMLHttpRequest();
		
		var parametros = "noticia=" + x + "&comentario=" + document.getElementById("coment").value;
		
		http.open("POST", "assets/php/pubcom.php", true);
		
		http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

		http.onreadystatechange = function() {
			if(http.readyState == 4 && http.status == 200) 
			{
				//dividir o id da noticia do comentario
				var str = http.responseText;
				var res = str.split("/");
				
				if(res[1] == "")
				{
					alertify.delay(0);
					alertify.closeLogOnClick(true);
					alertify.logPosition("bottom right");
					alertify.error("Escreve alguma coisa");
					document.getElementById("coment").focus();
				}
				else if(res[2] == "true")
				{
					alertify.delay(0);
					alertify.closeLogOnClick(true);
					alertify.logPosition("bottom right");
					alertify.success("Comentario Inserido");
					setTimeout(function () {
					window.location.href = "noticia@"+res[0];
					}, 2000);
				}
				else if(res[2] == "false")
				{
					alertify.delay(0);
					alertify.closeLogOnClick(true);
					alertify.logPosition("bottom right");
					alertify.error("Alguma coisa correu mal, tente mais tarde!!");
				}
				//console.log(res[3]);
				
			}
		}
		http.send(parametros);
		
		
	}
</script>
  </body>
</html>
