<?php
	include("assets/php/verificar_login.php");
	include("assets/bd/bd.php");
	
	$_SESSION['oldpage'] = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER['REQUEST_URI'];
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
	
	<link rel="shortcut icon" href="bootstrap-solid1.ico">
	
	 <!-- jQuery -->
    <script src="admin/vendor/jquery/jquery.min.js"></script>
    <!-- Bootstrap Core CSS -->
    <link href="admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="admin/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="admin/dist/css/sb-admin-2.css" rel="stylesheet">
	<link href="admin/pages/assets/css/coment.css" rel="stylesheet">

    <!-- Morris Charts CSS 
    <link href="admin/vendor/morrisjs/morris.css" rel="stylesheet">-->

    <!-- Custom Fonts -->
    <link href="admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body bgcolor="#E6E6FA">

    <div id="wrapper">

	<?php include("assets/menu/menu.php"); ?>
	<!-- /.TOP MENU AND NAV BAR -->
	
	
		<!--******************************************************************************************************************************-->
		<!--******************************************************************************************************************************-->
		<!--******************************************************** MODO ADMIN **********************************************************-->
		<!--******************************************************************************************************************************-->
		<!--******************************************************************************************************************************-->
		<?php
			$SQL5 = "SELECT * FROM users WHERE user='{$_SESSION['user']}'";
			$resultado5 = mysql_query($SQL5,$LIGA);
			$registo5 = mysql_fetch_array($resultado5);
			
			if($registo5['previlegios'] == 3)
			{
		?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Painel de Controlo</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-envelope-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
								<?php 
									$SQL1 = "SELECT * FROM noticias WHERE Confirmed=\"No\"";
									$resultado1 = mysql_query($SQL1,$LIGA);
									$i = 0;
									while($registo1 = mysql_fetch_array($resultado1))
									{
										$i++;
									}
									echo "<div id=\"noticianoo\" class=\"huge\">{$i}</div>";
								?>
                                    <div>Noticias!</div>
                                </div>
                            </div>
                        </div>
                        <a onclick="admin_index(1)">
                            <div class="panel-footer">
                                <span class="pull-left">Mais Detalhes</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
								<?php
								$SQL1 = "SELECT * FROM comentarios";
								
								$countrep = 0;
			
								$resultado1 = mysql_query($SQL1,$LIGA);
								
								$num_rows = mysql_num_rows($resultado1);
								
								while($registo1 = mysql_fetch_array($resultado1))
								{		
									if($registo1['reports'] >= 2)
									{
										$countrep++;
									}
								}
								echo "<div class=\"huge\">{$countrep}</div>";
								?>
                                    
                                    <div>Reports!</div>
                                </div>
                            </div>
                        </div>
                        <a onclick="admin_index(2)">
                            <div class="panel-footer">
                                <span class="pull-left">Mais Detalhes</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tags fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
									<?php
										$SQL1 = "SELECT * FROM categorias WHERE Confirmed='No'";
					
										$resultado1 = mysql_query($SQL1,$LIGA);
										
										$num_rows = mysql_num_rows($resultado1);
										
										echo "<div class=\"huge\">{$num_rows}</div>";
									?>
                                    <div>Categorias!</div>
                                </div>
                            </div>
                        </div>
                        <a onclick="admin_index(3)">
                            <div class="panel-footer">
                                <span class="pull-left">Mais Detalhes</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-support fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">0</div>
                                    <div>Support Tickets!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">Mais Detalhes</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
			<!-- Painel de informação Noticias --><!-- Painel de informação Noticias --><!-- Painel de informação Noticias -->
			<!-- Painel de informação Noticias --><!-- Painel de informação Noticias --><!-- Painel de informação Noticias -->
			<!-- Painel de informação Noticias --><!-- Painel de informação Noticias --><!-- Painel de informação Noticias -->
			<div id="noticano" class="panel panel-info">
                        <div class="panel-heading">
                            Notícias Pendentes
                        </div>
                        <div class="panel-body">
                            <table id="labet" class="table table-hover table-striped">
                            <tbody>
							<?php
								//selecionar todos os utilizadores
								$SQL35 = "SELECT * FROM noticias WHERE Confirmed='No'";
								$resultado35 = mysql_query($SQL35,$LIGA);
								
								$num_rows = mysql_num_rows($resultado35);
								
								if($num_rows == 0)
								{
									
									echo "<h2>Não há Noticias para revisão!</h2>";
									
								}
								else
								{
								
								$i = 0;
			
								while($registo35 = mysql_fetch_array($resultado35))
								{
								//selecionar os acessos
									echo "<tr id=\"tr{$registo35['id']}\">
										<td>
											<a target=\"_blank\" href=\"previewnoticia@{$registo35['id']}\" id=\"eye{$registo35['id']}\"><i class=\"-alt fa fa-2x fa-eye fa-fw\"></i></a>
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
													echo "<button class=\"btn btn-default\" id=\"des{$registo35['id']}\" onclick=\"elenoticia('apagar',{$registo35['id']})\" value=\"apagar\" type=\"button\">
														  <i class=\"fa fa-fw s fa-remove\"></i></button>";
													/*echo "<button class=\"btn btn-default\" id=\"des{$registo35['id']}\" onclick=\"desativar({$registo35['id']})\" value=\"ativar\" type=\"button\">
														  <i class=\"fa fa-fw s fa-check\"></i>Ativar</button>";*/
												echo "
												<button id=\"ele{$registo35['id']}\" onclick=\"elenoticia('publicar',{$registo35['id']})\" class=\"btn btn-default\" value=\"publicar\" type=\"button\">
													<i class=\"fa fa-fw fa-check\"></i></button>
											</div>
										</td>
									</tr>";
								}
								}
							?>
                            </tbody>
                        </table>
                        </div>
                    </div>
					
					<!-- PAINEL DE REPORTS --><!-- PAINEL DE REPORTS --><!-- PAINEL DE REPORTS --><!-- PAINEL DE REPORTS --><!-- PAINEL DE REPORTS -->
					<!-- PAINEL DE REPORTS --><!-- PAINEL DE REPORTS --><!-- PAINEL DE REPORTS --><!-- PAINEL DE REPORTS --><!-- PAINEL DE REPORTS -->
					<!-- PAINEL DE REPORTS --><!-- PAINEL DE REPORTS --><!-- PAINEL DE REPORTS --><!-- PAINEL DE REPORTS --><!-- PAINEL DE REPORTS -->
					<div id="repnoticias" class="panel panel-success">
                        <div class="panel-heading">
                            Comentarios Reportados
                        </div>
                        <div class="panel-body">
                            <table id="labet" class="table table-hover table-striped">
                            <tbody>
							<?php
								$SQL1 = "SELECT * FROM comentarios";
								
								$countrep = 0;
			
								$resultado1 = mysql_query($SQL1,$LIGA);
								
								$num_rows = mysql_num_rows($resultado1);
								
								while($registo1 = mysql_fetch_array($resultado1))
								{		
									if($registo1['reports'] >= 2)
									{
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
										echo "<strong>{$registo1["user"]}</strong> ";//<span class=\"text-muted\">commented 5 days ago</span>";
										echo "</div>";
										echo "<div class=\"panel-body\">";
										echo "{$registo1["mensagem"]}";
										echo "</div>";//panel-body 
										echo "<div class=\"pa-foot\">";
											echo "&nbsp;&nbsp;&nbsp;<span></span>";
											echo "&nbsp;<a href=\"Admin@coment/{$registo1["sku"]}/1\"><span class=\"space\">Eliminar</span></a> <a href=\"Admin@coment/{$registo1["sku"]}/3\"><span class=\"space\">Resetar Reports</span></a>";
										echo "</div>";
										echo "</div>";//panel panel-default 
										echo "</div>";//col-sm-5
									}
									else
									{
										
										$countrep++;
										
									}
								}
								if($countrep == $num_rows)
								{
									echo "<h2>Sem nenhum comentario reportado para apresentar!</h2>";
								}
					
							?>
                            </tbody>
                        </table>
                        </div>
                    </div>
					
					<!--PAINEL DE CATEGORIAS --><!--PAINEL DE CATEGORIAS --><!--PAINEL DE CATEGORIAS --><!--PAINEL DE CATEGORIAS --><!--PAINEL DE CATEGORIAS -->
					<!--PAINEL DE CATEGORIAS --><!--PAINEL DE CATEGORIAS --><!--PAINEL DE CATEGORIAS --><!--PAINEL DE CATEGORIAS --><!--PAINEL DE CATEGORIAS -->
					<!--PAINEL DE CATEGORIAS --><!--PAINEL DE CATEGORIAS --><!--PAINEL DE CATEGORIAS --><!--PAINEL DE CATEGORIAS --><!--PAINEL DE CATEGORIAS -->
					<div id="pedcategoria" class="panel panel-warning">
                        <div class="panel-heading">
                            Pedidos de Categorias
                        </div>
                        <div class="panel-body">
                            <table id="labet" class="table table-hover table-striped">
                            <tbody>
							<?php
								$SQL1 = "SELECT * FROM categorias WHERE Confirmed='No'";
									
								$resultado1 = mysql_query($SQL1,$LIGA);
								
								//$num_rows = mysql_num_rows($resultado1);
								
								
								while($registo1 = mysql_fetch_array($resultado1))
								{		
									
									echo "<center><div id=\"{$registo1['id']}\">{$registo1['categoria']}&nbsp;<i onclick=\"categoriapub(1,{$registo1['id']})\" class=\"fa fa-check\"></i>&nbsp;<i onclick=\"categoriapub(2,{$registo1['id']})\" class=\"fa fa-times\"></i></div></center>";
									
								}
								
							?>
                            </tbody>
                        </table>
                        </div>
                    </div>
					
					<!-- PAINEL DE TICKETS --><!-- PAINEL DE TICKETS --><!-- PAINEL DE TICKETS --><!-- PAINEL DE TICKETS --><!-- PAINEL DE TICKETS -->
					<!-- PAINEL DE TICKETS --><!-- PAINEL DE TICKETS --><!-- PAINEL DE TICKETS --><!-- PAINEL DE TICKETS --><!-- PAINEL DE TICKETS -->
					<!-- PAINEL DE TICKETS --><!-- PAINEL DE TICKETS --><!-- PAINEL DE TICKETS --><!-- PAINEL DE TICKETS --><!-- PAINEL DE TICKETS -->
                </div>
        </div>
        <!-- /#page-wrapper -->
		<?php 
			} 
		?>
		<!--******************************************************************************************************************************-->
		<!--******************************************************************************************************************************-->
		<!--******************************************************** MODO EDITOR *********************************************************-->
		<!--******************************************************************************************************************************-->
		<!--******************************************************************************************************************************-->
		<?php
			if($registo5['previlegios'] == 2)
			{
		?>
		<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Painel de Notificações</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-envelope-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
								<?php 
									$SQL1 = "SELECT * FROM noticias WHERE Confirmed=\"No\"";
									$resultado1 = mysql_query($SQL1,$LIGA);
									$i = 0;
									while($registo1 = mysql_fetch_array($resultado1))
									{
										$i++;
									}
									echo "<div class=\"huge\">{$i}</div>";
								?>
                                    <div>Noticias Pendentes!</div>
                                </div>
                            </div>
                        </div>
                        <a href="Admin@pub_noticias">
                            <div class="panel-footer">
                                <span class="pull-left">Mais Detalhes</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
				<div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">0</div>
                                    <div>Reports Feitos!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">Mais Detalhes</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tags fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">0</div>
                                    <div>Categorias Pendentes!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">Mais Detalhes</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-support fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">0</div>
                                    <div>Support Tickets!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">Mais Detalhes</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
			<?php
			/*
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
					<!-- **********************************************-->
                    <!-- /.panel do meio -->
                </div>
                <!-- /.col-lg-8 -->
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> Notifications Panel(WORKING...)
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="list-group">
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small"><em>4 minutes ago</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small"><em>12 minutes ago</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small"><em>27 minutes ago</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small"><em>43 minutes ago</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small"><em>11:32 AM</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-bolt fa-fw"></i> Server Crashed!
                                    <span class="pull-right text-muted small"><em>11:13 AM</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-warning fa-fw"></i> Server Not Responding
                                    <span class="pull-right text-muted small"><em>10:57 AM</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-shopping-cart fa-fw"></i> New Order Placed
                                    <span class="pull-right text-muted small"><em>9:49 AM</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-money fa-fw"></i> Payment Received
                                    <span class="pull-right text-muted small"><em>Yesterday</em>
                                    </span>
                                </a>
                            </div>
                            <!-- /.list-group -->
                            <a href="#" class="btn btn-default btn-block">View All Alerts</a>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    <!-- /.panel .chat-panel -->
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
			*/
			?>
        </div>
        <!-- /#page-wrapper -->
		<?php 
			} 
		?>

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap Core JavaScript -->
    <script src="admin/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="admin/vendor/metisMenu/metisMenu.min.js"></script>
	
	<script src="admin/pages/assets/js/index.js"></script>

    <!-- Morris Charts JavaScript 
    <script src="admin/vendor/raphael/raphael.min.js"></script>
    <script src="admin/vendor/morrisjs/morris.min.js"></script>
    <script src="admin/data/morris-data.js"></script>-->

    <!-- Custom Theme JavaScript -->
    <script src="admin/dist/js/sb-admin-2.js"></script>
	
	<script>
	/*$(document).ready(function(){ 
	  document.oncontextmenu = function() {return false;};

	  $(document).mousedown(function(e){ 
		if( e.button == 2 ) { 
		  alert('Right mouse button!'); 
		  return false; 
		} 
		return true; 
	  }); 
	});*/
		document.getElementById("noticano").style.display = "none";
		document.getElementById("repnoticias").style.display = "none";
		document.getElementById("pedcategoria").style.display = "none";
	</script>

</body>

</html>
