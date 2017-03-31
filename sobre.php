<?php
	session_start();
	include("assets/bd/bd.php");
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BroteroNews</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/heroic-features.css" rel="stylesheet">
	
	<link href="caroussel.css" rel="stylesheet">

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

    <?php include("assets/menu/menu.php"); ?>
	  
	  
		<div class="container">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-7">
				<h3>Sobre</h3>
				<div style="border-top: 1px solid #348DE6"></div><br>
				<p>
				Rua Dom Manuel I<br>
				Coimbra 3030-320<br>
				Email: <a href="mailto:direccao@esab.pt">direccao@esab.pt</a><br>
				Telefone:239 701 564 / 239 701 792<br>
				Fax: 239 704 549<br>
				Telemóvel: 96 202 45 32 / 91 234 24 66<br>
				Website: <a target="blank" href=" http://www.esab.pt"> http://www.esab.pt</a><br><br>			 
				Latitude: 40°12'18.30"N<br>
				Longitude: 8°24'35.37"O<br>
				</p>
				
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2592.2766605910842!2d-8.410690756649446!3d40.2055622699509!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd22f98254db6329%3A0xe8c2035d4ca6925d!2sEscola+Secund%C3%A1ria+De+Avelar+Brotero!5e1!3m2!1spt-PT!2spt!4v1485775234161" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
			
			</div>
			<div class="col-md-3">
				<h3>Destaques</h3>
				<div style="border-top: 1px solid #348DE6"></div>
			
			</div>
			<div class="col-md-1"></div>
		</div>
		</div>
	  

    <?php include("assets/footer.php"); ?>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>
