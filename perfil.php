<?php
	session_start();
	if(!isset($_SESSION['user'])){header ("Location: home");}
	$_SESSION['pagina'] = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["PHP_SELF"];
	include("assets/bd/bd.php");
	date_default_timezone_set('Europe/Lisbon');
	//echo $_SERVER['SERVER_NAME'];
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Perfil</title>

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
	
	<link href="assets/css/perfil.css" rel="stylesheet" type="text/css">

  </head>
  <body>

	<!-- TOP MENU -->
	<?php include("assets/menu/menu.php") ?>
	<!-- \\TOP MENU -->
	
	<div class="container">
	<!--<div class="row">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li>
                                <a href="#">Inicio</a>
                            </li>
                            <li>
                                <a href="#">Panel de control</a>
                            </li>
                            <li class="active">Usuarios</li>
                        </ul>
                    </div>
                </div>-->
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-xs-offset-0 col-sm-offset-0 col-md-offset-1 col-lg-offset-1 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
			<?php
			$SQL8 = "SELECT * FROM users where user='{$_SESSION['user']}'";
			$resultado8 = mysql_query($SQL8,$LIGA);
			$registo8 = mysql_fetch_array($resultado8);
			
				//
				echo "<h3 class=\"panel-title\">{$registo8['user']}</h3>";
				echo "<h3 class=\"panel-title pull-right\" style=\"position:relative; top: -15px;\">". date("d/m/Y H:i:s") . "</h3>";
			  
			?>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center">
					<div id="altimg">
					<?php
						$SQL9 = "SELECT * FROM users where user='{$_SESSION['user']}'";
						$resultado9 = mysql_query($SQL9,$LIGA);
						$registo9 = mysql_fetch_array($resultado9);
						
						//elemina a imagem
						if(isset($_SESSION['img']))
						{
							unlink($_SESSION['img']);
							unset($_SESSION['img']);
						}
					?>
						<img alt="User Pic" src="<?php if($registo9['img'] == ""){ echo "assets/img-perfil/default.jpg"; }else{ echo $registo9['img'];} ?>" class="img-circle img-responsive"> 
						<!--<a href="#"><font size="4"><i style="top: -200px; left: -80px;" class="glyphicon glyphicon-edit"></i></font></a>-->
					</div>
					<form role="form" method="post" accept-charset="UTF-8" id="alterarfoto" enctype="multipart/form-data">
						<label class="labul" id="div2" for='div1'>Alterar Foto</label>
						<input type="file" id="div1" name="div1" style="display:none;"></input>
					</form>
				</div>
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
					  <tr>
                        <td>Nome Proprio:</td>
                        <td><?php echo $registo8['nome']; ?></td>
                      </tr>
					  <tr>
                        <td>Utilizador:</td>
                        <td><?php echo $registo8['user']; ?></td>
                      </tr>
                      <tr>
                        <td>Acessos:</td>
						<?php 
						if($registo8['previlegios'] == "3"){
							echo "<td><span style=\"color:red;\">Administrador</span></td>";
						}
						else if($registo8['previlegios'] == "2"){
							echo "<td><span style=\"color:green;\">Editor</span></td>";
						}
						else{
							echo "<td><span style=\"color:blue;\">Membro</span></td>";
						}
						
						?>
                      </tr>
                      <tr>
                        <td>Membro desde</td>
                        <td><?php $newdate = date("d/m/Y", strtotime($registo8["since"])); echo $newdate; ?></td>
                      </tr>
                      <tr>
                        <td>Data de Nascimento</td>
                        <td><?php $newdate2 = date("d/m/Y", strtotime($registo8["nascimento"])); echo $newdate2; ?></td>
                      </tr>
                       <tr>
                        <td>Género</td>
                        <td><?php echo $registo8['sexo'];?></td>
                      </tr>
					  <tr>
                        <td>Password</td>
                        <td>
							<?php echo "************";?> &nbsp; &nbsp;
							<a onclick="hey()" type="" class="warning">
							<i class="glyphicon glyphicon-edit"></i></a>
						</td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td><a href="mailto:info@support.com"><?php {echo $registo8['email'];} ?></a></td>
                      </tr>
                    </tbody>
                  </table>
				  
                </div>
              </div>
            </div>
                 <div class="panel-footer">
                        <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                        <span class="pull-right">
						<?php
							//permisão admin
							if($registo3['previlegios'] == '3')
							{
								echo "<a href=\"Admin@home\" class=\"btn btn-warning btn-sm\">Admin</a>";
							}
									
						?>
                            <!--<a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>-->
                            <a data-original-title="Remove this user" data-toggle="tooltip" type="button" href="sair@logout" class="btn btn-sm btn-danger">Logout<i class=""></i></a>
                        </span>
                    </div>
            
          </div>
        </div>
      </div>
	  <!-- Password CHANGE -->
	  
	  <div id="changerow" class="row">
        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-xs-offset-0 col-sm-offset-0 col-md-offset-1 col-lg-offset-1 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
			
				<h3 class="panel-title">Mudar Password</h3>
            </div>
            <div class="panel-body">
              <div class="row">
			  <!-- CONTEUDO DO MUDAR A PASSWORD -->
						<fieldset>
						<!-- Text input-->
						<div class="form-group">
						<div class="col-md-2"></div>
						  <label class="col-md-2 control-label" for="anpass">Antiga Password</label>  
						  <div class="col-md-4">
						  <input id="anpass" name="anpass" type="password" placeholder="" class="form-control input-md">
							
						  </div>
						</div>
						
						<br>
						<br>

						<!-- Text input-->
						<div class="form-group">
						  <div class="col-md-2"></div>
						  <label class="col-md-2 control-label" for="newpass">Nova Password</label>  
						  <div class="col-md-4">
						  <input id="newpass" name="newpass" type="password" placeholder="" class="form-control input-md">
						
						  </div>
						  
						</div>
						
						<br>
						<br>

						<!-- Text input-->
						<div id="rpass" class="form-group">
						<div class="col-md-2"></div>
						  <label class="col-md-2 control-label" for="new2pass">Repita Nova Password</label>  
						  <div class="col-md-4">
						  <input id="new2pass" name="new2pass" onkeyup="veryfy()" type="password" placeholder="" class="form-control input-md">
						  <label id="coinpass" class="control-label" style="display:none;">As Passwords nao coincidem</label>
						  </div>
						</div>

						</fieldset>
			  
			  
			  
			  
			  
              </div>
            </div>
                 <div class="panel-footer">
                        <a type="button" onclick="cleanpass()" class="btn btn-sm btn-default">Limpar<i class=""></i></a>
                        <span class="pull-right">
                            <!--<a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>-->
              
							<button id="savebutt" onclick="savefy()" class="btn btn-sm btn-primary" disabled>Guardar</button>
                        </span>
                    </div>
            
          </div>
        </div>
      </div>
	  
    </div>
	<br>
	
	
	<script>
		$(document).ready(function(){
			$(".fotoo a").click(function(){
				$("#div2").toggle("slow");
			});
		});
		
		document.getElementById("changerow").style.display = "none";
		
	</script>
	
	<script src="assets/js/perfil.js"></script>

	<!-- standard version -->
	<script src="https://cdn.rawgit.com/alertifyjs/alertify.js/v1.0.10/dist/js/alertify.js"></script>

    <?php include("assets/footer.php"); ?>

  </body>
</html>
