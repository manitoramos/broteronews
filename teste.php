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
		.ex2{
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

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <nav class="navbar navbar-light bg-faded">
                  <a class="navbar-brand" href="index.php">
                         <img src="bootstrap-solid.svg" width="30" height="30" alt="">
                  </a>
                </nav>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="line-height:10px">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#" style="line-height:30px">Sobre</a>
                    </li>
                    <li>
                        <a href="#" style="line-height:30px">Noticias</a>
                    </li>
                    <li>
                        <a href="#" style="line-height:30px">Contacto</a>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                  <li style="float:right">
                      <a href="#" style="line-height:30px">Login</a>
                  </li>
                </ul>

            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
      </nav>

     <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="assets/img/thebest.jpg" alt="First slide">
                        <div class="carousel-caption">
                            <h3>
                                </h3>
                            <p>
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

          <?php
      			$server = "localhost";
      			$user = "root";
      			//$senha = "";
      			$bd = "broteronews";

      			$LIGA =@mysql_connect("$server","$user","") or die ("servidor nao esta a responder!");

      			$db =@mysql_select_db($bd,$LIGA) or die ("Nao foi possivel conectar-se ao banco de dados!");
    		  ?>

          <?php
      			$SQL1 = "SELECT * FROM noticias";

      			$resultado1 = mysql_query($SQL1,$LIGA);

      			while($registo1 = mysql_fetch_array($resultado1))
      			{
      				echo "<div class=\"row text-center\">";
                    echo "<div class=\"col-md-3 col-sm-6 hero-feature\">";
                        echo "<div class=\"thumbnail\">";
                            echo "<img class=\"ex2\" src=\"{$registo1['imagem']}\" alt=\"\">";
                            echo "<div class=\"caption\">";
                                echo "<h4>{$registo1['nome']}</h4>";
                                echo "<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>";
                                echo "<p>";
                                    echo "<a href=\"#\" class=\"btn btn-default butann\">Mais Informação</a>";
                                echo "</p>";
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";
      			}
    		  ?>

          <div class="col-md-3 col-sm-6 hero-feature">
              <div class="thumbnail">
                  <img src="assets/img/thebest.jpg" alt="">
                  <div class="caption">
                      <h3>Feature Label</h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                      <p>
                          <a href="#" class="btn btn-default butann">Mais Informação</a>
                      </p>
                  </div>
              </div>
          </div>

          <div class="col-md-3 col-sm-6 hero-feature">
              <div class="thumbnail">
                  <img src="assets/img/thebest.jpg" alt="">
                  <div class="caption">
                      <h3>Feature Label</h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                      <p>
                          <a href="#" class="btn btn-default butann">Mais Informação</a>
                      </p>
                  </div>
              </div>
          </div>

          <div class="col-md-3 col-sm-6 hero-feature">
              <div class="thumbnail">
                  <img src="assets/img/thebest.jpg" alt="">
                  <div class="caption">
                      <h3>Feature Label</h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                      <p>
                          <a href="#" class="btn btn-default butann">Mais Informação</a>
                      </p>
                  </div>
              </div>
          </div>

          

      <!-- /.row -->

      <!-- Grelha de imagens -->

          <!--  Titulo da secçao
          <div class="col-lg-12">
              <h1 class="page-header">Thumbnail Gallery</h1>
          </div>-->
		  </div>
		<div class="row">
			  <div class="col-lg-3 col-md-3 col-xs-6 thumb">
				  <a class="thumbnail" href="#">
					  <img class="img-responsive" src="assets/img/thebest.jpg" alt="">
				  </a>
			  </div>
			  <div class="col-lg-3 col-md-3 col-xs-6 thumb">
				  <a class="thumbnail" href="#">
					  <img class="img-responsive" src="assets/img/thebest.jpg" alt="">
				  </a>
			  </div>
			  <div class="col-lg-3 col-md-3 col-xs-6 thumb">
				  <a class="thumbnail" href="#">
					  <img class="img-responsive" src="assets/img/thebest.jpg" alt="">
				  </a>
			  </div>
			  <div class="col-lg-3 col-md-3 col-xs-6 thumb">
				  <a class="thumbnail" href="#">
					  <img class="img-responsive" src="assets/img/thebest.jpg" alt="">
				  </a>
			  </div>
		  </div>
         

        </div>
			<div class="col-md-3"  >
				<h3>Destaques</h3>
				<div style="border-top: 1px solid #348DE6"></div>
				<br>
				<p>Aqui vão ficar as noticias em destaque</p>
				<br>
				<h3>Psicóloga</h3>
				<div style="border-top: 1px solid #348DE6"></div>
				<br>
				<p>	Tens uma pergunta que gostarias de colocar à psicóloga, e gostarias de vê-la respondinda no jornal?<br>
					<center><button type="button" class="btn btn-primary">Clique aqui</button></center>
				</p>
				<br>
            </div>
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

    <footer>
      <div class="container">
        <a class="navbar-brand"  href="#">
            <img src="decoJovem-logo-horizontal.png" alt="">
        </a><br><br><br><br><br><br><br><br>
        <p style="color:#FFFFFF">© ESAB 2016-2017. TODOS OS DIREITOS RESERVADOS. WEB DESIGN & DEVELOPMENT BY <b style="color:#F7EF00">ALEXANDRE SEABRA & TIAGO RAMOS</b></p>
      </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>
