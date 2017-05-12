<?php
	include("assets/php/verificar_login.php");
	include("assets/bd/bd.php");
	$_SESSION['pagina'] = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["PHP_SELF"];
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Nova Notícia</title>
	
	<link rel="shortcut icon" href="bootstrap-solid1.ico">

	
    <!-- Bootstrap Core CSS -->
    <link href="admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="admin/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="admin/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<script src="admin/vendor/jquery/jquery.min.js"></script>
	<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css"rel="stylesheet">
	<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>
	

	
   

</head>

<body>

<script>
	$(document).ready(function (e) {
	$("#mandar").on('submit',(function(e) {
		e.preventDefault();
		$.ajax({
        	url: "./admin/pages/assets/php/publicar.php",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data)
		    {
				if(data == "true"){
					alertify.delay(0);
					alertify.closeLogOnClick(true);
					alertify.logPosition("bottom right");
					alertify.success("Notícia Inserida Com Sucesso!");
					mudarnot();
				}else if(data == "false"){
					alertify.delay(0);
					alertify.closeLogOnClick(true);
					alertify.logPosition("bottom right");
					alertify.error("Erro ao Inserir a Notícia");
					//alertify.log("<img src='" + data +"'><h3>This is HTML</h3><p>It's great, right?</p>");
				}else{
					alertify.delay(0);
					alertify.closeLogOnClick(true);
					alertify.logPosition("bottom right");
					alertify.error("Algum Campo em Branco!!");
				}
		    },
		  	error: function() 
	    	{
				alertify.delay(0);
				alertify.closeLogOnClick(true);
				alertify.logPosition("bottom right");
				alertify.error("Erro! Não inseriste alguma coisa bem!");
	    	} 	        
	   });
	}));
});

		//meter no info das notificações de noticas 1
		function mudarnot(){
			document.getElementById("tess").innerHTML = 1;
			$( "span.label-success" ).fadeIn( 300 );

		}
</script>

    <div id="wrapper">

        <?php include("assets/menu/menu.php"); ?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
					<h1 class="page-header">Nova Notícia</h1>
					<form class="form-horizontal" method="POST" id="mandar" enctype="multipart/form-data">
					<fieldset>
						<div class="form-group">
							<label class="col-md-12 control-label" style="text-align:center" for="textinput">Título</label>
							<div class="col-md-4"></div>						
							<div class="col-md-4">
								<input id="titulo" name="titulo" type="text" placeholder="titulo" class="form-control input-md">
							</div>	  
						</div>
						<div class="form-group">
							<label class="col-md-12 control-label" style="text-align:center" for="textinput">Mensagem</label>
							<div class="col-md-12">
								<textarea class="form-control" id="summernote" rows="10" name="descricao"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-12 control-label" style="text-align:center" for="textinput">Descrição breve maximo 45 caracters</label>
							<div class="col-md-2"></div>
							<div class="col-md-8">
								<textarea class="form-control" rows="2" id="desshort" name="desshort"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-12 control-label" style="text-align:center" for="filebutton">Imagem</label>
							<div class="col-md-12">
								<center><input name="image" class="input-file" type="file"></center>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-12 control-label" for="singlebutton"></label>
							<div class="col-md-12">
								<!--<center><a id="" name="publicar" class="btn btn-primary" onclick="pubb()">Publicar</a></center>-->
								<center><input type="submit" value="Submit" class="btn btn-primary"></center>
							</div>
						</div>
					</fieldset>
					</form>
                        <!--<div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" id="teste" aria-valuemax="100" style="width: 0%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
									<button onclick="move()">Click Me</button> 

					<script>
					function move() {
					  var elem = document.getElementById("teste");   
					  var width = 1;
					  var id = setInterval(frame, 100);
					  function frame() {
						if (width >= 100) {
						  clearInterval(id);
						} else {
						  width++; 
						  elem.style.width = width + '%'; 
						}
					  }
					}
					</script>-->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

	
    <!-- ALERTIFY -->
    <script src="https://cdn.rawgit.com/alertifyjs/alertify.js/v1.0.10/dist/js/alertify.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="admin/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="admin/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="admin/dist/js/sb-admin-2.js"></script>
	<script>
		$(document).ready(function() {
			$('#summernote').summernote();
			height: 500
		});
	</script>
	
	

</body>

</html>
