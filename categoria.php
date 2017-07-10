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
<div id="push">
</div>

    <div class="container">
      <div class="row">
        <div class="col-md-9">

          <!--noticias-->
          <h3>Categoria: </h3>
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
			<div class="col-md-3">
			<h3>Notícias Mais Vistas</h3>
			<div style="border-top: 1px solid #348DE6"></div>
			<br>
			<?php
				$SQL23 = "SELECT * FROM noticias ORDER BY views DESC";
				$resultado23 = mysql_query($SQL23,$LIGA);
				$asdas = 0;
				
				while($registo23 = mysql_fetch_array($resultado23))
				{
					echo "<div class=\"row\">";
					echo "<div class=\"col-md-1\"></div>";
						echo "<a style=\"text-decoration: none;\" href=\"noticia@{$registo23['id']}\">";
						echo "<img src=\"{$registo23['imagem']}\" width=\"100\" height=\"60\" style=\"float:left;\">";
						echo "{$registo23['titulo']}</a>";
					echo "</div>";
					echo "<br>";
					$asdas++;
					if($asdas == 5)
					{
						break;
					}
				}
			?>
				<!--<h3>Psicóloga</h3>
				<div style="border-top: 1px solid #348DE6"></div>
				<br>
				<p>	Tens uma pergunta que gostarias de colocar à psicóloga, e gostarias de vê-la respondinda no jornal?<br>
				-->
					<!--MODAL

					<center><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Pergunta</button></center>

					<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
					  <div class="modal-dialog" role="document">
						<div class="modal-content">
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="exampleModalLabel">Pergunta á psicóloga</h4>
						  </div>
						  <div class="modal-body">
							<form>
							  <div class="form-group">
								<label for="message-text" class="control-label">Messagem:</label>
								<textarea class="form-control" style="resize:vertical;" id="message-text"></textarea>
							  </div>
							</form>
						  </div>
						  <div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
							<button type="button" class="btn btn-primary" data-dismiss="modal">Enviar Pergunta</button>

						  </div>
						</div>
					  </div>
					</div>

					<script>
						$('#exampleModal').on('show.bs.modal', function (event) {
						  var button = $(event.relatedTarget) // Button that triggered the modal
						  var recipient = button.data('whatever') // Extract info from data-* attributes
						  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
						  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
						  var modal = $(this)
						  modal.find('.modal-title').text('New message to ' + recipient)
						  modal.find('.modal-body input').val(recipient)
						})

						//var notification = alertify.notify('sample', 'success', 5, function(){  console.log('dismissed'); });

					</script>
-->
<script>


$(document).ready(function(){
	function getresult(url) {
		setTimeout(function(){
		$.ajax({
			url: url,
			type: "GET",
			data:  {rowcount:$("#rowcount").val()},
			beforeSend: function(){
			$('#loader-icon').show();
			},
			complete: function(){
			$('#loader-icon').hide();
			},
			success: function(data){
			$("#faq-result").append(data);
			},
			error: function(){} 	        
	   });
	   }, 500);
	}
	$(window).scroll(function(){
		
		if ($(window).scrollTop() == $(document).height() - $(window).height()){
			if($(".pagenum:last").val() <= $(".total-page").val()) {
				var pagenum = parseInt($(".pagenum:last").val()) + 1;
				getresult('getresult.php?page='+pagenum);
				$('#loader-icon').show();
			}
		}
	}); 
});

</script>
					<!-- FIM MODAL-->
				</p>
				<br>
            </div>
			
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
	   <!-- standard version -->
					<script src="https://cdn.rawgit.com/alertifyjs/alertify.js/v1.0.10/dist/js/alertify.js"></script>
<div id="loader-icon"><img src="LoaderIcon.gif" /></div>
    <?php include("assets/footer.php"); ?>
	
	

  </body>
</html>
