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

    <title>Admin - BroteroNews</title>

    <!-- Bootstrap Core CSS -->
    <link href="admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="admin/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="admin/dist/css/sb-admin-2.css" rel="stylesheet">
	<link href="admin/pages/assets/css/coment.css" rel="stylesheet">

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

	<?php include("assets/menu/menu.php"); ?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Confirmação dos Comentários</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
				<div class="row">
					<div class="col-lg-12">
					<?php
						$SQL1 = "SELECT * FROM comentarios WHERE Confirmed=\"No\"";
	
						$resultado1 = mysql_query($SQL1,$LIGA);
					
						while($registo1 = mysql_fetch_array($resultado1))
						{
							/*echo "<div class=\"panel panel-primary\">";
								echo "<div class=\"panel-heading\">";
									echo "<span style=\"color:white;\">{$registo1["user"]}</span>";
									echo "<div class=\"btn-group pull-right\">";
										echo "<button type=\"button\" class=\"btn btn-default btn-xs dropdown-toggle\" data-toggle=\"dropdown\">";
											echo "<i class=\"fa fa-chevron-down\"></i>";
										echo "</button>";
										echo "<ul class=\"dropdown-menu slidedown\">";
											echo "<li>";
												echo "<a href=\"Admin@coment/{$registo1["sku"]}/2\">";
													echo "<i class=\"fa fa-unlock fa-fw\"></i> Publicar";
												echo "</a>";
											echo "</li>";
											echo "<li>";
												echo "<a href=\"Admin@coment/{$registo1["sku"]}/1\">";
													echo "<i class=\"fa fa-trash-o fa-fw\"></i> Eliminar";
												echo "</a>";
											echo "</li>";
										echo "</ul>";
									echo "</div>";
								echo "</div>";
								echo "<div class=\"panel-body\">";
									echo "<p>{$registo1["mensagem"]}</p>";
								echo "</div>";
							echo "</div>";*/
							
							$SQL3 = "SELECT * FROM users WHERE user=\"{$registo1["user"]}\"";
							$resultado3 = mysql_query($SQL3,$LIGA);
							$registo3 = mysql_fetch_array($resultado3);
							
							/*echo "<div class=\"col-sm-1\">";
							echo "<div class=\"thumbnail\">";
							echo "<img class=\"img-responsive user-photo\" src=\"{$registo3['img']}\">";
							echo "</div>";//thumbnail 
							echo "</div>";//col-sm-1*/

							echo "<div class=\"col-sm-12\">";
							echo "<div class=\"panel panel-default\">";
							echo "<div class=\"panel-heading\">";
							echo "<strong>{$registo1["user"]}</strong> <span class=\"text-muted\">commented 5 days ago</span>";
							echo "</div>";
							echo "<div class=\"panel-body\">";
							echo "{$registo1["mensagem"]}";
							echo "</div>";//panel-body 
							echo "<div class=\"pa-foot\">";
								echo "&nbsp;&nbsp;&nbsp;<span>edited</span>";
								echo "&nbsp;<a href=\"Admin@coment/{$registo1["sku"]}/1\"><span class=\"space\">Eliminar</span></a> <a href=\"Admin@coment/{$registo1["sku"]}/2\"><span class=\"space\">Publicar</span></a>";
							echo "</div>";
							echo "</div>";//panel panel-default 
							echo "</div>";//col-sm-5	
						}
					
					?>
					
                    
					
					<?php 
					$SQL1 = "SELECT * FROM comentarios WHERE Confirmed=\"No\"";
	
					$resultado1 = mysql_query($SQL1,$LIGA);
					
					while($registo1 = mysql_fetch_array($resultado1))
					{
					
					?>
		  
					<?php } ?>
                    </div>	
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
