        <!-- Navigation -->
		<style>
		.teste{
			display: none;
		}
		</style>
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="Admin@home">Admin BroteroNews</a>
				<a class="navbar-brand" href="home">Jornal</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="label label-success teste" id="tess" style="border-radius: 25px;">0</span><i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
						
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
					<?php
					
						$MEN1 = "SELECT * FROM noticias ORDER BY id DESC";
						$result1 = mysql_query($MEN1,$LIGA);
						$bre = 0;
						
						while($reges1 = mysql_fetch_array($result1)){
							echo "<li>";
                            echo "<a href=\"noticia@{$reges1['id']}\">";
							echo "<div class=\"pull-left\" style=\"position:relative; right:7px; top:5px;\">";
							echo "<img src=\"{$reges1['imagem']}\" width=\"30px\" height=\"30px\">";
							echo "</div>";
                                echo "<div>";
                                    echo "<strong>{$reges1['autor']}</strong>";
                                    echo "<span class=\"pull-right text-muted\">";
                                        echo "<em>{$reges1['data']}</em>";
                                    echo "</span>";
                                echo "</div>";
                                echo "<div>{$reges1['titulo']}</div>";
                            echo "</a>";
                        echo "</li>";
                        echo "<li class=\"divider\"></li>";
						$bre++;
						if($bre == 3)
							break;
						}						
					
					?>
                        <li>
                            <a class="text-center" href="Admin@noticias">
                                <strong>Mostrar Todas as Notícias</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
						<li>
                            <a class="text-center" href="Admin@nova_categoria">
                                <strong>Pedido de Categoria</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
						<li>
                            <a class="text-center" href="Admin@nova_noticia">
                                <strong>Escrever uma nova Notícia</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
					<!-- /.dropdown-messages --><!-- /.dropdown-messages --><!-- /.dropdown-messages --><!-- /.dropdown-messages -->
                    <!-- /.dropdown-messages --><!-- /.dropdown-messages --><!-- /.dropdown-messages --><!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 1</strong>
                                        <span class="pull-right text-muted">40% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 2</strong>
                                        <span class="pull-right text-muted">20% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                            <span class="sr-only">20% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 3</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 4</strong>
                                        <span class="pull-right text-muted">80% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete (danger)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks --><!-- /.dropdown-tasks --><!-- /.dropdown-tasks --><!-- /.dropdown-tasks -->
					<!-- /.dropdown-tasks --><!-- /.dropdown-tasks --><!-- /.dropdown-tasks --><!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts --><!-- /.dropdown-alerts --><!-- /.dropdown-alerts --><!-- /.dropdown-alerts -->
					<!-- /.dropdown-alerts --><!-- /.dropdown-alerts --><!-- /.dropdown-alerts --><!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
							<select class="form-control" style="display:none;">
								<option>ei</option>
								<option>hey</option>
								<select>
                            <div class="input-group custom-search-form">
							
								
                                <input id="searchgod" type="text" onkeyup="searchtr()" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>
						<?php
							$SQL5 = "SELECT * FROM users WHERE user='{$_SESSION['user']}'";
							$resultado5 = mysql_query($SQL5,$LIGA);
							$registo5 = mysql_fetch_array($resultado5);
							
							$SQL6 = "SELECT * FROM acesso WHERE id='{$registo5['previlegios']}'";
							$resultado6 = mysql_query($SQL6,$LIGA);
							$registo6 = mysql_fetch_array($resultado6);
						?>
                        <li>
                            <a href="Admin@home"><i class="fa fa-dashboard fa-fw"></i> Painel de Controlo</a>
                        </li>
						<li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> <?php echo $registo6['acesso']; ?><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
							<?php
								if($registo5['previlegios'] == 3)
								{
							?>
                                <li>
                                    <a href="#">Users<span class="fa arrow"></span></a>
									<ul class="nav nav-third-level">
                                        <li>
                                            <a href="Admin@users">Permissões</a>
                                        </li>
                                        <li>
                                            <a href="#">##</a>
                                        </li>
                                    </ul>
                                </li>
							<?php
								}
							?>
								
                                <li>
                                    <a href="#">Second Level Item</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<!-- vai buscar as noticias ao script-->
						<div id="zergnet-widget-49231"></div>
						
						<!--Script para as noticias do zergnet -->
						<script language="javascript" type="text/javascript">
							(function() {
								var zergnet = document.createElement('script');
								zergnet.type = 'text/javascript'; zergnet.async = true;
								zergnet.src = (document.location.protocol == "https:" ? "https:" : "http:") + '//www.zergnet.com/zerg.js?id=49231';
								var znscr = document.getElementsByTagName('script')[0];
								znscr.parentNode.insertBefore(zergnet, znscr);
							})();
						</script>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>