<?php
	session_start();
	$_SESSION['pagina'] = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["PHP_SELF"];
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
        width:200px;
        height:290px;
      }
       .carousel-inner > .item > img,
       .carousel-inner > .item > a > img {
        width: 100%;
        margin: auto;
      }

	  .immgg{
		width:100%;
		height:150px;
		border-radius: 2px;
	  }

		.immgg:hover{
			-webkit-filter: grayscale(100%);
  		-webkit-transition: .8s ease-in-out;
  		-moz-filter: grayscale(100%);
  		-moz-transition: .8s ease-in-out;
  		-o-filter: grayscale(100%);
  		-o-transition: .8s ease-in-out;
		}

		.monte span {
		  cursor: pointer;
		  display: inline-block;
		  position: relative;
		  transition: 0.5s;
		}

		.monte span:after {
		  content: '\00bb';
		  position: absolute;
		  opacity: 0;
		  top: 0;
		  right: 0px;
		  transition: 0.5s;
		}

		.monte:hover span {
		  padding-right: 8px;
			/*text-decoration: underline;*/
		}

		.monte:hover span:after {
		  opacity: 1;
		  right: 0;
		}
		#loader-icon {position: fixed;top: 82%;width:100%;height:100%;text-align:center;display:none;}
    </style>



  </head>
  <body>

	<!-- TOP MENU -->
	<?php include("assets/menu/menu.php") ?>
	<!-- \\TOP MENU -->
	
    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div id="carousel-example-generic" class="carousel slide" style="static" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="assets/img/thebest.jpg" alt="First slide">
                        <div class="carousel-caption">
                            <h3> dsdsdds
                                </h3>
                            <p>sdsdsdsd
                                </p>
                        </div>
                    </div>
                    <div class="item">
                        <img src="http://placehold.it/1200x500/9b59b6/8e44ad" alt="Second slide">
                        <div class="carousel-caption">
                            <h3>
                                </h3>
                            <p>
                                </p>
                        </div>
                    </div>
                    <div class="item">
                        <img src="http://placehold.it/1200x500/34495e/2c3e50" alt="Third slide">
                        <div class="carousel-caption">
                            <h3>
                                </h3>
                            <p>
                                </p>
                        </div>
                    </div>
                </div>
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span></a><a class="right carousel-control"
                        href="#carousel-example-generic" data-slide="next"><span class="glyphicon glyphicon-chevron-right">
                        </span></a>
            </div>
            <div class="main-text hidden-xs">
                <div class="col-md-12 text-center">
                    <h1>
                        </h1>
                    <h3>

                    </h3>
                    <div class="">

                </div>
            </div>
        </div>
    </div>
</div>
<div id="push">
</div>

    <div class="container">
      <div class="row">
        <div class="col-md-9">

          <!--noticias-->
          <h3>Notícias Mais Recentes</h3>
          <div style="border-top: 1px solid #348DE6"></div>
          <br>

	      		<div id="faq-result">
				<?php include('getresult.php'); ?>
				</div>
				
	

		</div>

      <!-- /.row -->

      <!-- Grelha de imagens -->

          <!--  Titulo da secçao
          <div class="col-lg-12">
              <h1 class="page-header">Thumbnail Gallery</h1>
          </div>-->
	<!-- IMAGENS SEM TEXTo
		<div class="row">
			  <div class="col-lg-3 col-md-3 col-xs-6 thumb">
				  <a class="thumbnail" href="noticia.php">
					  <img class="img-responsive" src="assets/img/thebest.jpg" alt="">
				  </a>
			  </div>
			  <div class="col-lg-3 col-md-3 col-xs-6 thumb">
				  <a class="thumbnail" href="noticia.php">
					  <img class="img-responsive" src="assets/img/thebest.jpg" alt="">
				  </a>
			  </div>
			  <div class="col-lg-3 col-md-3 col-xs-6 thumb">
				  <a class="thumbnail" href="noticia.php">
					  <img class="img-responsive" src="assets/img/thebest.jpg" alt="">
				  </a>
			  </div>
			  <div class="col-lg-3 col-md-3 col-xs-6 thumb">
				  <a class="thumbnail" href="noticia.php">
					  <img class="img-responsive" src="assets/img/thebest.jpg" alt="">
				  </a>
			  </div>
		  </div>
	-->

			<!-- DESTAQUES -->
			
			<?php include("assets/menu/rightbar.php") ?>
			
			<!-- ...\\\\\  -->

		<!--
        <div class="row">
          <div class="col-md-3"  >
            <h3>Destaques</h3>
            <div style="border-top: 1px solid #A9A6A6"></div>
            <br>
          </div>
        </div>
-->
        </div>
      </div>
	   </div>
<div id="loader-icon"><img src="LoaderIcon.gif" /></div>
    <?php include("assets/footer.php"); ?>

  </body>
</html>
