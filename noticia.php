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

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

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
				<div style="border-top: 1px solid #348DE6">
					<br>
					<div class="newreply-topbar"><span style="position:relative;top:5px;left:5px;">Novo Comentario</span></div>
					<textarea class="newreply-textarea" placeholder="Escreva aqui o seu comentario"></textarea>
					<button class="newreply-post" style="margin-top:10px;">Publicar Comentario</button>
					<br>
					<br>
				</div>
			</div>
			<div class="col-md-3">
				<h3>Destaques</h3>
				<div style="border-top: 1px solid #348DE6"></div>
	
			</div>
			</div>
		</div>
	  
	  

    <?php include("assets/footer.php"); ?>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>
