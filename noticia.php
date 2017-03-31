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
    </style>


  </head>
  <body>

	<!-- TOP MENU -->
    <?php include("assets/menu/menu.php") ?>
	<!-- \\TOP MENU -->
		<div class="container">
		
			<div class="col-md-12">
			
				<img width="1110px" height="500px" src="<?php echo $registo1['imagem'];?>">
			</div>
			<div class="col-md-9">
				<p><b><?php echo $registo1['data']?></b></p>
			</div>
			<div class="col-md-3">
				<p><b>visualizacoes, likes e comentarios</b></p>
			</div>
		
		</div>
	  
		<div class="container">
			<div class="col-md-9">
				<h3><?php echo $registo1['titulo']; ?></h3>
				<div style="border-top: 1px solid #348DE6"></div>
				<p><?php echo $registo1['descricao']; ?></p>

				
			</div>
			<div class="col-md-3">
				<h3>Destaques</h3>
				<div style="border-top: 1px solid #348DE6"></div>
			
			</div>
		</div>
	  

    <?php include("assets/footer.php"); ?>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>
