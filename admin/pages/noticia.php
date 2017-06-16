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
	<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet"/>
	<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	

	
   

</head>

<body>
<script>
toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": true,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
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
					toastr["success"]("Notícia inserida com Sucesso! Aguardando Publicação");
					mudarnot();//notificação mudificar para dar a admin que esteja on
				}else if(data == "false"){
					toastr["error"]("Erro ao Inserir a Notícia!!");
					//alertify.log("<img src='" + data +"'><h3>This is HTML</h3><p>It's great, right?</p>");
				}else{
					var str = data;
					var res = str.split("///");
					if(res[1] == "")
					{
						toastr["error"]("Alguma coisa deu errado!!");
					}
					else
					{
						toastr["warning"](res[1]);
						if(res[2] == "titulo"){document.getElementById("titulo").focus();}
						else if(res[2] == "descricao"){document.getElementById("summernote").focus();}
						else if(res[2] == "desshort"){document.getElementById("desshort").focus();}
					}
				}
		    },
		  	error: function() 
	    	{
				toastr["error"]("Erro! Não inseriste alguma coisa bem!");
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
							<label class="col-md-12 control-label" style="text-align:center" for="textinput">Categoria</label>
							<div class="col-md-5"></div>						
							<div class="col-md-2">
								<select class="form-control" name="categoria" id="categoria">
								<option value="" style="display:none">Categoria</option>
								<?php
									$SQL39 = "SELECT * FROM categorias";
									$resultado39 = mysql_query($SQL39,$LIGA);
									
									while($registo39 = mysql_fetch_array($resultado39))
									{
										echo "<option value=\"{$registo39['categoria']}\">{$registo39['categoria']}</option>";
									}
								?>
								</select>
							</div>	  
						</div>
						<div class="form-group">
							<label class="col-md-12 control-label" style="text-align:center" for="textinput">Descrição breve maximo 45 caracters</label>
							<div class="col-md-2"></div>
							<div class="col-md-8">
								<input class="form-control" id="desshort" name="desshort">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-12 control-label" style="text-align:center" for="filebutton">Imagem</label>
							<div class="col-md-12">
								<center><input name="image" class="input-file" type="file"></center>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-12 control-label" style="text-align:center" for="textinput">Mensagem</label>
							<div class="col-md-12">
								<textarea class="form-control" id="summernote" rows="10" name="descricao"></textarea>
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

	
    <!-- ALERTIFY 
    <script src="https://cdn.rawgit.com/alertifyjs/alertify.js/v1.0.10/dist/js/alertify.js"></script>-->

    <!-- Bootstrap Core JavaScript -->
    <script src="admin/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="admin/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="admin/dist/js/sb-admin-2.js"></script>
	
	<script>
	$('#summernote').summernote({
	  height: 300,                 // set editor height
	  minHeight: 300,             // set minimum height of editor
	  maxHeight: null,             // set maximum height of editor
	});
</script>

</body>

</html>
