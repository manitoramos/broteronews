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

    <!-- Bootstrap Core CSS -->
    <link href="admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="admin/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="admin/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="admin/pages/assets/css/usersperm.css" rel="stylesheet">

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
                    <div class="col-md-11">
						<br>
                        <a class="btn btn-primary" data-toggle="modal" data-target="#usuario"><i class="fa fa-fw -square -circle fa-plus-square"></i> Novo Usuario</a>
						<br><br>
					</div>
                    <div class="col-md-11">
                        <table class="table table-hover table-striped">
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
											<a href=\"#\"id=\"eye{$registo35['id']}\" onclick=\"visi({$registo35['id']})\"><i class=\"-alt fa fa-2x fa-eye fa-fw\"></i></a>
										</td>
										<td>
											<h4>
												<b>{$registo36['Acesso']}</b>
											</h4>
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
											<a href=\"mailto:{$registo35['email']}\">{$registo35['email']}</a>
										</td>
										<td>{$registo35['since']}</td>
										<td>
											<div class=\"btn-group\">
												<button class=\"btn btn-default\" id=\"des{$registo35['id']}\" onclick=\"desativar({$registo35['id']})\" value=\"desativar\" type=\"button\">
													<i class=\"fa fa-fw s fa-remove\"></i>Desativar</button>
												<button id=\"conf{$registo35['id']}\" class=\"btn btn-default\" value=\"right\" onclick=\"configurar({$registo35['id']})\" type=\"button\">
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
	
                <div  id="user_perm" class="row" style="display:none;">
				<br>
				<div class="col-md-3">
					<div class="profile-sidebar">
						<!-- SIDEBAR USERPIC -->
						<div class="profile-userpic">
						<?php 
							if($registo35['img'] == "")
							{
								echo "<img src=\"http://pingendo.github.io/pingendo-bootstrap/assets/user_placeholder.png\" class=\"img-responsive\">";
							}
							else
							{
								echo "<img src=\"{$registo35['img']}\" class=\"img-responsive\">";
							}
							
						?>
						</div>
						<!-- END SIDEBAR USERPIC -->
						<!-- SIDEBAR USER TITLE -->
						<div class="profile-usertitle">
							<div class="profile-usertitle-name">
								Marcus Doe
							</div>
							<div class="profile-usertitle-job">
								Developer
							</div>
						</div>
						<!-- END SIDEBAR USER TITLE -->
						<!-- SIDEBAR BUTTONS -->
						<div class="profile-userbuttons">
							<button type="button" class="btn btn-danger btn-sm">Desativar</button>
							<button type="button" class="btn btn-primary btn-sm"><i class="fa fa-fw fa-envelope"></i></button>
						</div>
						<!-- END SIDEBAR BUTTONS -->
						<!-- SIDEBAR MENU -->
						<div class="profile-usermenu">
							<ul class="nav">
								<li class="active">
									<a href="#">
									<i class="glyphicon glyphicon-home"></i>
									Overview </a>
								</li>
								<li>
									<a href="#">
									<i class="glyphicon glyphicon-user"></i>
									Account Settings </a>
								</li>
								<li>
									<a href="#" target="_blank">
									<i class="glyphicon glyphicon-ok"></i>
									Tasks </a>
								</li>
								<li>
									<a href="#">
									<i class="glyphicon glyphicon-flag"></i>
									Help </a>
								</li>
								<li>
									<a href="#" onclick="escolher_user()">
									<i class="fa fa-chevron-left"></i>
									Back </a>
								</li>
							</ul>
						</div>
						<!-- END MENU -->
					</div>
				</div>
				<div class="col-md-9">
					<div class="profile-content">
					   Some user related content goes here...
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

   <script src="admin/pages/assets/js/users.js"></script>
    <!-- jQuery -->
    <script src="admin/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="admin/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="admin/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="admin/dist/js/sb-admin-2.js"></script>

</body>

</html>
