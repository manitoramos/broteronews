
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>Mega menu slide down on hover with carousel - Bootsnipp.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/login.css" rel="stylesheet">
	<link href="assets/css/menu.css" rel="stylesheet">
	
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="assets/js/menu.js"></script>
	
<div class="container">
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="navbar-header">
    	<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="home"><img src="bootstrap-solid.svg" style="position: relative; top: -5px;" width="30px"><span style="position:relative;top: -31px;left: 35px; font-family:arial;">BroteroNews&emsp;&ensp;</span></a>
	</div>
	
	<div class="collapse navbar-collapse js-navbar-collapse">
		<ul class="nav navbar-nav">
			<li class="dropdown mega-dropdown cross">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Noticias <span class="caret"></span></a>				
				<ul class="dropdown-menu mega-dropdown-menu mannn">
					<li class="col-sm-3">
						<ul>
							<li class="dropdown-header">Noticias Em Destaque</li>                            
                            <div id="menCollection" class="carousel slide" data-ride="carousel">
                              <div class="carousel-inner">
							  <?php
							  //SLIDE NOTICIAS
								$first = 0;//para meter a primeira noticia active
								$SQL5 = "SELECT * FROM noticias WHERE s_noticia=1";
								$resultado5 = mysql_query($SQL5,$LIGA);
								while($registo5 = mysql_fetch_array($resultado5))
								{
									if($first == 0){$first++;echo "<div class=\"item active\">";}//ficar ativo
									else{echo "<div class=\"item\">";}//para ficar como item
										echo "<a href=\"#\"><img src=\"{$registo5['imagem']}\" class=\"\" style=\"width:305px;height:180px;\" alt=\"product 1\"></a>";
										echo "<h4><small>{$registo5['desshort']}</small></h4>";                                       
										//echo "<button class=\"btn btn-primary\" type=\"button\">Ler Noticia</button> <button href=\"#\" class=\"btn btn-default\" type=\"button\"><span class=\"glyphicon glyphicon-heart\"></span> Adicionar aos Favoritos</button>";       
										echo "</div>";//End Item
								}
							  ?>                             
                              </div><!-- End Carousel Inner -->
                              <!-- Controls -->
                              <a class="left carousel-control" style="width: 30px;height: 30px;top: -35px;right: 30px;left: inherit;" href="#menCollection" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" style="font-size: 12px;background-color: #fff;line-height: 30px;text-shadow: none;color: #333;border: 1px solid #ddd;" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                              </a>
                              <a class="right carousel-control" style="width: 30px;height: 30px;top: -35px;" href="#menCollection" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" style="font-size: 12px;background-color: #fff;line-height: 30px;text-shadow: none;color: #333;border: 1px solid #ddd;" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                              </a>
                            </div><!-- /.carousel -->
                            <li class="divider"></li>
                            <li><a href="#">Ver Todas as Noticias <span class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>
						</ul>
					</li>
					<li class="col-sm-2">
						<ul>
							<li class="dropdown-header">Categorias</li>
							<?php
								$countcat = 0;
								$SQL8 = "SELECT * FROM categorias";
								$resultado8 = mysql_query($SQL8,$LIGA);
								while($registo8 = mysql_fetch_array($resultado8))
								{
									if($countcat == 8)
									{
										echo "</ul>";
										echo "</li>";
										echo "<li class=\"col-sm-2\">";
										echo "<ul>";
										echo "<li class=\"dropdown-header\">&nbsp;</li>";
									}
									echo "<li><a href=\"{$registo8['id']}\">{$registo8['categoria']}</a></li>";
									$countcat++;
								}
								echo "</ul>";
								echo "</li>";
								
							?>
				<!--
						</ul>
					</li>
					<li class="col-sm-2">
						<ul>
							<li class="dropdown-header">Plus</li>
							<li><a href="#">Navbar Inverse</a></li>
							<li><a href="#">Pull Right Elements</a></li>
							<li><a href="#">Coloured Headers</a></li>                            
							<li><a href="#">Primary Buttons & Default</a></li>							
						</ul>
					</li>
					<li class="col-sm-2">
						<ul>
							<li class="dropdown-header">Much more</li>
                            <li><a href="#">Easy to Customize</a></li>
							<li><a href="#">Calls to action</a></li>
							<li><a href="#">Custom Fonts</a></li>
							<li><a href="#">Slide down on Hover</a></li>                         
						</ul>
					</li>
					-->
				</ul>				
			</li>
			<!--
            <li class="dropdown mega-dropdown cross">
    			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Categorias <span class="caret"></span></a>				
				<ul class="dropdown-menu mega-dropdown-menu mannn">
					<li class="col-sm-3">
    					<ul>
							<li class="dropdown-header">Features</li>
							<li><a href="#">Auto Carousel</a></li>
                            <li><a href="#">Carousel Control</a></li>
                            <li><a href="#">Left & Right Navigation</a></li>
							<li><a href="#">Four Columns Grid</a></li>
							<li class="divider"></li>
							<li class="dropdown-header">Fonts</li>
                            <li><a href="#">Glyphicon</a></li>
							<li><a href="#">Google Fonts</a></li>
						</ul>
					</li>
					<li class="col-sm-3">
						<ul>
							<li class="dropdown-header">Plus</li>
							<li><a href="#">Navbar Inverse</a></li>
							<li><a href="#">Pull Right Elements</a></li>
							<li><a href="#">Coloured Headers</a></li>                            
							<li><a href="#">Primary Buttons & Default</a></li>							
						</ul>
					</li>
					<li class="col-sm-3">
						<ul>
							<li class="dropdown-header">Much more</li>
                            <li><a href="#">Easy to Customize</a></li>
							<li><a href="#">Calls to action</a></li>
							<li><a href="#">Custom Fonts</a></li>
							<li><a href="#">Slide down on Hover</a></li>                         
						</ul>
					</li>
                    <li class="col-sm-3">
    					<ul>
							<li class="dropdown-header">Women Collection</li>                            
                            <div id="womenCollection" class="carousel slide" data-ride="carousel">
                              <div class="carousel-inner">
                                <div class="item active">
                                    <a href="#"><img src="http://placehold.it/254x150/3498db/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 1"></a>
                                    <h4><small>Summer dress floral prints</small></h4>                                        
                                    <button class="btn btn-primary" type="button">49,99 €</button> <button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Add to Wishlist</button>       
								</div>--><!-- End Item 
                                <div class="item">
                                    <a href="#"><img src="http://placehold.it/254x150/ff3546/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 2"></a>
                                    <h4><small>Gold sandals with shiny touch</small></h4>                                        
                                    <button class="btn btn-primary" type="button">9,99 €</button> <button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Add to Wishlist</button>        
                                </div>--><!-- End Item 
                                <div class="item">
                                    <a href="#"><img src="http://placehold.it/254x150/2ecc71/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 3"></a>
                                    <h4><small>Denin jacket stamped</small></h4>                                        
                                    <button class="btn btn-primary" type="button">49,99 €</button> <button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Add to Wishlist</button>      
                                </div>--><!-- End Item                                 
                              </div>--><!-- End Carousel Inner -->
                              <!-- Controls 
                              <a class="left carousel-control" style="width: 30px;height: 30px;top: -35px;right: 30px;left: inherit;" href="#womenCollection" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" style="font-size: 12px;background-color: #fff;line-height: 30px;text-shadow: none;color: #333;border: 1px solid #ddd;" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                              </a>
                              <a class="right carousel-control" style="width: 30px;height: 30px;top: -35px;" href="#womenCollection" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" style="font-size: 12px;background-color: #fff;line-height: 30px;text-shadow: none;color: #333;border: 1px solid #ddd;" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                              </a>
                            </div>--><!-- /.carousel
                            <li class="divider"></li>
                            <li><a href="#">View all Collection <span class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>
						</ul>
					</li>
				</ul>				
			</li>
			 -->
            <li><a href="ESAB">Sobre</a></li>
		</ul>
		<div id="menuimgalt">
        <ul class="nav navbar-nav navbar-right">
		<?php if(!isset($_SESSION['user'])){ ?>
		<!-- LOGINNNN -->
			<li class="dropdown">
			<a href="#" id="droplog" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
				<ul id="login-dp" class="dropdown-menu">
					<li>
						<div class="row">
							<div class="col-md-12">
								<center><p style="font-size:120%">Insira os seus Dados</p></center>
								<!--<div class="social-buttons">
									<a href="#" class="btn btn-fb"><i class="fa fa-facebook"></i> Facebook</a>
									<a href="#" class="btn btn-tw"><i class="fa fa-twitter"></i> Twitter</a>
								</div>
                                or-->
								<form class="form-registo" role="form" id="login" method="post" accept-charset="UTF-8" id="login-nav">
										<div class="form-group">
											 <label class="sr-only" for="exampleInputEmail2">Email</label>
											 <input type="email" class="form-control" name="email" id="exampleInputEmail2" placeholder="Email" required>
										</div>
										<div class="form-group">
											 <label class="sr-only" for="exampleInputPassword2">Password</label>
											 <input type="password" class="form-control" name="password" id="exampleInputPassword2" placeholder="Password" required>
                                             <div class="help-block text-right"><a href="">Esqueceste-te da senha ?</a></div>
										</div>
										<div class="form-group">
											 <button type="submit" class="btn btn-primary btn-block">Entrar</button>
										</div>
										<div class="checkbox">
											 <label>
											 <input type="checkbox"> Lembrar-se de mim
											 </label>
										</div>
										<div class="bottom text-center">
											Novo Aqui ? <a href="#"><b>Regista-te</b></a>
										</div>
								</form>						
								<form role="form" id="registo" method="post" accept-charset="UTF-8" id="login-nav">
										<div class="form-group">
											 <label class="sr-only" for="exampleInputEmail2">Nome de Utilizador</label>
											 <input type="text" class="form-control" name="user" id="exampleInputEmail2" placeholder="Nome de Utilizador" required>
										</div>
										<div class="form-group">
											 <label class="sr-only" for="exampleInputEmail2">Nome Proprio</label>
											 <input type="text" class="form-control" name="nome" id="exampleInputEmail2" placeholder="Primeiro e Ultimo Nome" required>
										</div>
										<div class="form-group">
											 <label class="sr-only" for="exampleInputEmail2">Sexo</label>
											 <select name="sexo" class="form-control" required>
												<option value="" style="display:none;">Sexo</option>
												<option value="femenino">Femenino</option>
												<option value="masculino">Masculino</option>
											</select>
										</div>
										<div class="form-group">
											 <label class="sr-only" for="exampleInputEmail2">Email</label>
											 <input type="email" class="form-control" name="email" id="exampleInputEmail2" placeholder="Email" required>
											 <input type="text" class="form-control" name="reg" value="reg" id="" style="display:none;">
										</div>
										<div class="form-group">
											 <label class="sr-only" for="exampleInputPassword2">Password</label>
											 <input type="password" class="form-control" name="password" id="exampleInputPassword2" placeholder="Password" required>
										</div>
										<div class="form-group">
											 <label class="sr-only" for="exampleInputPassword2">Data de Nascimento</label>
											 <input type="text" class="form-control" name="date" id="exampleInputPassword2" placeholder="Nascimento ex: 1998-05-25" required>
										</div>
										<div class="form-group">
											 <button type="submit" class="btn btn-primary btn-block">Registar</button>
										</div>
										<div class="bottom text-center">
											Ja tens Conta? <a href="#"><b>Login</b></a>
										</div>
								</form>
							
								
							</div>
						</div>
					</li>
				</ul>
			</li>
		<!--\\\ LOGINNNN -->
		<!-- PERFIL -->
		<?php }else{
			$SQL3 = "SELECT * FROM users where user='{$_SESSION['user']}'";
			$resultado3 = mysql_query($SQL3,$LIGA);
			$registo3 = mysql_fetch_array($resultado3);
				if($registo3['img'] == ""){
					echo "<li class=\"dropdown cross\"><a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\"><img src=\"assets/img-perfil/default.jpg\" width=\"20px\" style=\"position:relative; left: -5px;\">{$registo3['user']}";
				}
				else{
					echo "<li class=\"dropdown cross\"><a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\"><img src=\"{$registo3['img']}\" width=\"20px\" style=\"position:relative; left: -5px;\">{$registo3['user']}";
				}
			?>
            <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <div class="navbar-content">
                            <div class="row">
                                <div class="col-md-5">
								<?php 
									if($registo3['img'] == ""){
										echo "<img src=\"assets/img-perfil/default.jpg\" alt=\"Alternate Text\" class=\"img-responsive\" />";
									}
									else{
										echo "<img src=\"{$registo3['img']}\" alt=\"Alternate Text\" class=\"img-responsive\" />";
									}
								?>
                                    <p class="text-center small"><a href="perfil">Mudar Foto</a></p>
                                </div>
								<?php
									
									echo "<div class=\"col-md-7\">";
										echo "<span>{$registo3['nome']}</span>";
										echo "<p class=\"text-muted small\">{$registo3['email']}</p>";
										echo "<div class=\"divider\"></div>";
										echo "<a href=\"perfil\" class=\"btn btn-primary btn-sm\">Ver Perfil</a>&nbsp;";
									
				
									if($registo3['previlegios'] == '3')
									{
										echo "<a href=\"Admin@home\" class=\"btn btn-warning btn-sm\">Admin</a>";
									}
									
									if($registo3['previlegios'] == '2')
									{
										echo "<a href=\"Admin@home\" class=\"btn btn-success btn-sm\">Editor</a>";
									}
								?>
									
                                </div>
                            </div>
                        </div>
                        <div class="navbar-footer">
                            <div class="navbar-footer-content">
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="perfil" class="btn btn-default btn-sm">Mudar Password</a>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="sair@logout" class="btn btn-danger btn-sm pull-right">Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </li>
		<?php }?>
        </ul>
		</div>
	</div><!-- /.nav-collapse -->
  </nav>
</div>

<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Foto de Perfil</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
  <script>
	//mudar para o registar ou inverso
	$('.bottom a').click(function(){
		$('form').animate({height: "toggle", opacity: "toggle"}, "slow");
	});
  </script>


</html>