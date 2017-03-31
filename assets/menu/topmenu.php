    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <nav class="navbar navbar-light bg-faded">
                  <a class="navbar-brand" href="home">
                         <img src="bootstrap-solid.svg" width="30" height="30" alt="">
                  </a>
                </nav>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="line-height:10px">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="noticia.php" style="line-height:30px">Noticias</a>
                    </li>
                    <li>
                        <a href="sobre.php" style="line-height:30px">Sobre</a>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
				<?php
					if(!isset($_SESSION['user'])){
						echo "<li style=\"float:right\">";
							echo "<a href=\"login\" style=\"line-height:30px\">Login</a>";
						echo "</li>";
					}
					else{
						echo "<li style=\"float:right\" class=\"dropdown\">";
							echo "<a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">";
								echo "<i style=\"line-height:30px\" class=\"fa fa-user fa-fw\"></i>{$_SESSION['user']} <i class=\"fa fa-caret-down\"></i>";
							echo "</a>";
							echo "<ul class=\"dropdown-menu dropdown-user\">";
								echo "<li><a href=\"#\"><i class=\"fa fa-user fa-fw\"></i> User Profile</a>";
								echo "</li>";
								echo "<li><a href=\"#\"><i class=\"fa fa-gear fa-fw\"></i> Settings</a>";
								echo "</li>";
								$SQL3 = "SELECT * FROM users where user='{$_SESSION['user']}'";
								$resultado3 = mysql_query($SQL3,$LIGA);
								$registo3 = mysql_fetch_array($resultado3);
								if($registo3['previlegios'] == 'Admin')
								{
									echo "<li><a href=\"admin/pages/home\"><i class=\"fa fa-dashboard fa-fw\"></i> Admin</a>";
									echo "</li>";
								}
								echo "<li class=\"divider\"></li>";
								echo "<li><a href=\"assets/php/entrar.php?acao=sair\"><i class=\"fa fa-sign-out fa-fw\"></i> Logout</a>";
								echo "</li>";
							echo "</ul>";
							//dropdown-user
						echo "</li>";
					}
				 ?>
                </ul>

            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
      </nav>