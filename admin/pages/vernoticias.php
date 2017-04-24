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

    <title>SB Admin 2 - Bootstrap Admin Theme</title>
	
	<link rel="shortcut icon" href="bootstrap-solid.ico">

    <!-- Bootstrap Core CSS -->
    <link href="admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="admin/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="admin/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
                    <div class="col-lg-12">
                        <h1 class="page-header">Todas as noticias</h1>
						<table id="labet" class="table table-hover table-striped">
                            <tbody>
							<?php
								//selecionar todos os utilizadores
								$SQL35 = "SELECT * FROM noticias";
								$resultado35 = mysql_query($SQL35,$LIGA);
								$i = 0;
			
								while($registo35 = mysql_fetch_array($resultado35))
								{
								//selecionar os acessos
									echo "<tr id=\"tr{$registo35['id']}\">
										<td>
											<a id=\"eye{$registo35['id']}\"><i class=\"-alt fa fa-2x fa-eye fa-fw\"></i></a>
										</td>
										<td>
											<h4>
												<b>{$registo35['autor']}</b>
											</h4>
										</td>
										<td>";
												
												echo "<img src=\"{$registo35['imagem']}\" class=\"img\" width=\"100\" height=\"50px\">";

											echo "
										</td>
										<td>
											<h5>
												<b>{$registo35['titulo']}</b>
											</h5>
											<a id=\"email{$registo35['id']}\" href=\"mailto:\"></a>
										</td>
										<td>{$registo35['data']}</td>
										<td>
											<div class=\"btn-group\">";
													echo "<button class=\"btn btn-default\" id=\"des{$registo35['id']}\" value=\"apagar\" type=\"button\">
														  <i class=\"fa fa-fw s fa-remove\"></i></button>";
													/*echo "<button class=\"btn btn-default\" id=\"des{$registo35['id']}\" onclick=\"desativar({$registo35['id']})\" value=\"ativar\" type=\"button\">
														  <i class=\"fa fa-fw s fa-check\"></i>Ativar</button>";*/
												echo "
												<button id=\"conf{$registo35['id']}\" class=\"btn btn-default\" value=\"{$registo35['id']}\" type=\"button\">
													<i class=\"fa fa-fw fa-cog\"></i></button>
											</div>
										</td>
									</tr>";
								}
							?>
                            </tbody>
                        </table>
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
