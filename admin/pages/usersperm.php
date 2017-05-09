<?php
	include("assets/php/verificar_login.php");
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

    <title>Users Control</title>
	
	<link rel="shortcut icon" href="bootstrap-solid.ico">

	
	 <script src="admin/vendor/jquery/jquery.min.js"></script>
    <!-- Bootstrap Core CSS -->
    <link href="admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	 <!-- Bootstrap Core JavaScript -->
    <script src="admin/vendor/bootstrap/js/bootstrap.min.js"></script>
	
	<!--x editable -->
	<link href="admin/vendor/x-editable/css/bootstrap-editable.css" rel="stylesheet"/>
	<script src="admin/vendor/x-editable/js/bootstrap-editable.min.js"></script>

    <!-- MetisMenu CSS -->
    <link href="admin/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="admin/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="admin/pages/assets/css/usersperm.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/balloon-css/0.4.0/balloon.min.css">
		
	

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
		<?php include("assets/menu/menu.php"); ?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
				<div id="esc_user" class="row">
                    <div class="col-md-12">
						<br>
                        <a class="btn btn-primary"><i class="fa fa-fw -square -circle fa-plus-square"></i> Novo Usuario</a>
						<a class="btn btn-primary"><i class="fa fa-fw -square -circle fa-eye-slash"></i> Mostrar Invisiveis</a>
						<br><br>
					</div>
                    <div class="col-md-12">
                        <table id="labet" class="table table-hover table-striped">
                            <tbody>
							<?php
								//selecionar todos os utilizadores
								$SQL35 = "SELECT * FROM users";
								$resultado35 = mysql_query($SQL35,$LIGA);
								$i = 0;
			
								while($registo35 = mysql_fetch_array($resultado35))
								{
								//selecionar os acessos
								$SQL36 = "SELECT * FROM acesso WHERE id='{$registo35['previlegios']}'";
								$resultado36 = mysql_query($SQL36,$LIGA);
								$registo36 = mysql_fetch_array($resultado36);
									echo "<tr id=\"tr{$registo35['id']}\">
										<td>
											<a id=\"eye{$registo35['id']}\" onclick=\"visi({$registo35['id']})\"><i class=\"-alt fa fa-2x fa-eye fa-fw\"></i></a>
										</td>
										<td>
											<h5>
												<b>{$registo36['acesso']}</b>
											</h5>
											<p>@{$registo35['user']}</p>
										</td>
										<td>";
											if($registo35['img'] == "")
											{
												echo "<img src=\"http://pingendo.github.io/pingendo-bootstrap/assets/user_placeholder.png\" class=\"img-circle\" width=\"60\">";
											}
											else
											{
												echo "<img src=\"{$registo35['img']}\" class=\"img-circle\" width=\"60\">";
											}
											
											echo "
										</td>
										<td>
											<h4>
												<b>{$registo35['nome']}</b>
											</h4>
											<a id=\"email{$registo35['id']}\" href=\"mailto:{$registo35['email']}\">{$registo35['email']}</a>
										</td>
										<td>{$registo35['since']}</td>
										<td>
											<div class=\"btn-group\">";
												if($registo35['estado'] == 1)
												{
													echo "<button class=\"btn btn-default\" id=\"des{$registo35['id']}\" onclick=\"desativar({$registo35['id']})\" value=\"desativar\" type=\"button\">
														  <i class=\"fa fa-fw s fa-remove\"></i>Desativar</button>";
												}
												else	
												{
													echo "<button class=\"btn btn-default\" id=\"des{$registo35['id']}\" onclick=\"desativar({$registo35['id']})\" value=\"ativar\" type=\"button\">
														  <i class=\"fa fa-fw s fa-check\"></i>Ativar</button>";
												}	
												echo "
												<button id=\"conf{$registo35['id']}\" class=\"btn btn-default\" value=\"{$registo35['id']}\" onclick=\"configurar({$registo35['id']})\" type=\"button\">
													<i class=\"fa fa-fw fa-cog\"></i>Configurar</button>
											</div>
										</td>
									</tr>";
								}
							?>
                            </tbody>
                        </table>
                    </div>
            
 
		</div>
	
                <div  id="user_perm" class="row">
				<br>
				<div class="col-md-3">
				<?php
								$SQL39 = "SELECT * FROM users Where id='{$_SESSION['usid']}'";
								$resultado39 = mysql_query($SQL39,$LIGA);
								$registo39 = mysql_fetch_array($resultado39);

								$SQL40 = "SELECT * FROM acesso WHERE id='{$registo39['previlegios']}'";
								$resultado40 = mysql_query($SQL40,$LIGA);
								$registo40 = mysql_fetch_array($resultado40);
								
								$SQL41 = "SELECT * FROM comentarios WHERE user=\"{$registo39['user']}\"";
								$resultado41 = mysql_query($SQL41,$LIGA);//para verificar se existe algum comentario
								$resultado42 = mysql_query($SQL41,$LIGA);//para listar todos os comentarios do user
				?>
					<div class="profile-sidebar">
						<!-- SIDEBAR USERPIC -->
						<div class="profile-userpic">
						<?php 
							if($registo39['img'] == "")
							{
								echo "<img src=\"http://pingendo.github.io/pingendo-bootstrap/assets/user_placeholder.png\" class=\"img-responsive\">";
							}
							else
							{
								echo "<img src=\"{$registo39['img']}\" class=\"img-responsive\">";
							}
							
						?>
						</div>
						<!-- END SIDEBAR USERPIC -->
						<!-- SIDEBAR USER TITLE -->
						<div class="profile-usertitle">
							<div class="profile-usertitle-name">
								<?php echo $registo39['nome']; ?>
							</div>
							<div class="profile-usertitle-job">
								<?php echo "<span style=\"color:{$registo40['color']};\">{$registo40['l_acesso']}</span>"; ?>
							</div>
						</div>
						<!-- END SIDEBAR USER TITLE -->
						<!-- SIDEBAR BUTTONS -->
						<div class="profile-userbuttons">
							<button type="button" class="btn btn-danger btn-sm">Desativar</button>
							<a type="button" class="btn btn-primary btn-sm" <?php echo "href=\"mailto:{$registo39['email']}\""; ?>><i class="fa fa-fw fa-envelope"></i></a>
						</div>
						<!-- END SIDEBAR BUTTONS -->
						<!-- SIDEBAR MENU -->
						<div class="profile-usermenu">
							<ul class="nav">
								<li id="li_g" class="active">
									<a href="#" onclick="vista_g()">
									<i class="glyphicon glyphicon-home"></i>
									Vista Geral </a>
								</li><!--
								<li id="li_s">
									<a href="#" onclick="vista_s()">
									<i class="glyphicon glyphicon-user"></i>
									Account Settings </a>
								</li>-->
								<li id="li_c">
									<a href="#" onclick="vista_c()">
									<i class="glyphicon glyphicon-comment"></i>
									Comentarios </a>
								</li>
								<li>
									<a href="#" onclick="escolher_user()">
									<i class="fa fa-chevron-left"></i>
									Voltar </a>
								</li>
							</ul>
						</div>
						<!-- END MENU -->
					</div>
				</div>
				<div id="v_geral" class="col-md-9">
					<div class="profile-content">
					<center><h2>Informações do Utilizador</h2></center>
					<br>
					   <table class="table table-user-information">
                    <tbody>
					  <tr>
                        <td><b>Nome Proprio:</b></td>
                        <td><?php echo "<span onclick=\"editnopp()\" id=\"noom_p\">{$registo39['nome']}</span>"; ?></td>
                      </tr>
					  <tr>
                        <td><b>Utilizador:</b></td>
                        <td><?php echo "<span onclick=\"edituser()\" id=\"usee_id\">{$registo39['user']}</span>"; ?></td>
                      </tr>
                      <tr>
                        <td><b>Acessos:</b></td>
						<?php 
							echo "<td style=\"color:{$registo40['color']};\">{$registo40['l_acesso']}</td>";
						?>
                      </tr>
                      <tr>
                        <td><b>Membro desde</b></td>
                        <td><?php $newdate = date("d/m/Y", strtotime($registo39["since"])); echo $newdate; ?></td>
                      </tr>
                      <tr>
                        <td><b>Data de Nascimento</b></td>
                        <td><?php $newdate2 = date("d/m/Y", strtotime($registo39["nascimento"])); echo $newdate2; ?></td>
                      </tr>
                       <tr>
                        <td><b>Género</b></td>
                        <td><?php echo $registo39['sexo'];?></td>
                      </tr>
					  <tr>
                        <td><b>Password</b></td>
                        <td>
							<?php echo "************";?>
							<button data-balloon-length="large" data-balloon="Ao clicares no butao uma senha sera gerada aleatoria e sera enviada para o email do utilizador" data-balloon-pos="up" class="btn btn-default btn-xs">Gerar senha</button>
						</td>
                      </tr>
                      <tr>
                        <td><b>Email</b></td>
                        <td><a href="mailto:<?php echo "{$registo39['email']}"; ?>"><?php {echo $registo39['email'];} ?></a></td>
                      </tr>
                    </tbody>
                  </table>
					</div>
				</div>
				<!-- DIV CONFIG 
				<div id="v_conf" class="col-md-9">
					<div class="profile-content">
					   nothing for now mas vai ter
					</div>
				</div>-->
				<!-- DIV COMENTS -->
				<div id="v_coment" class="col-md-9">
					<div class="profile-content">
						<center><h2>Comentarios</h2></center>
						<br>
						<?php
							if($registo41 = mysql_fetch_array($resultado41) == null)
							{
								echo "Este Usuario não fez nenhum comentario";
							}
							else
							{	
								while($registo42 = mysql_fetch_array($resultado42))
								{
									echo $registo42['mensagem'];
									echo "<br>";
								}
							}
							
						?>
					</div>
				</div>
			</div>
				
                    
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
	
	<script>
		function searchtr() {
		  // Declare variables 
		  var input, filter, table, tr, td, i, p;
		  input = document.getElementById("searchgod");
		  filter = input.value.toUpperCase();
		  table = document.getElementById("labet");
		  tr = table.getElementsByTagName("tr");

		  // Loop through all table rows, and hide those who don't match the search query
		  for (i = 0; i < tr.length; i++) {
			td = tr[i].getElementsByTagName("h4")[0];
			p = tr[i].getElementsByTagName("p")[0];
			if (td) {
			  if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
				tr[i].style.display = "";
			  } else {
				tr[i].style.display = "none";
			  }
			}/*
			if (p) {
			  if (p.innerHTML.toUpperCase().indexOf(filter) > -1) {
				tr[i].style.display = "";
			  } else {
				tr[i].style.display = "none";
			  }
			}*/
		  }
		}	
	</script>
	
	<!-- ALERTIFY -->
    <script src="https://cdn.rawgit.com/alertifyjs/alertify.js/v1.0.10/dist/js/alertify.js"></script>

   <script src="admin/pages/assets/js/users.js"></script>
    <!-- jQuery -->

    <!-- Metis Menu Plugin JavaScript -->
    <script src="admin/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="admin/dist/js/sb-admin-2.js"></script>

</body>

</html>
