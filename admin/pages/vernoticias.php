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

    <title>Todas as noticias</title>
	
	<link rel="shortcut icon" href="bootstrap-solid.ico">

	    <!-- jQuery -->
    <script src="admin/vendor/jquery/jquery.min.js"></script>
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
								$SQL35 = "SELECT * FROM noticias WHERE Confirmed='Yes'";
								$resultado35 = mysql_query($SQL35,$LIGA);
								$i = 0;
			
								while($registo35 = mysql_fetch_array($resultado35))
								{
								//selecionar os acessos
									echo "<tr id=\"tr{$registo35['id']}\">
										<td>
											<a href=\"noticia@{$registo35['id']}\" id=\"eye{$registo35['id']}\"><i class=\"-alt fa fa-2x fa-eye fa-fw\"></i></a>
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
													/*echo "<button class=\"btn btn-default\" id=\"des{$registo35['id']}\" onclick=\"desativar({$registo35['id']})\" value=\"ativar\" type=\"button\">
														  <i class=\"fa fa-fw s fa-check\"></i>Ativar</button>";*/
												echo "
												<button id=\"conf{$registo35['id']}\" class=\"btn btn-default dropdown-toggle\" data-toggle=\"dropdown\" value=\"{$registo35['id']}\" type=\"button\">
													<i class=\"fa fa-fw fa-cog\"></i></button>
													<ul class=\"dropdown-menu pull-right\" role=\"menu\">";
													
													if($registo35['s_index'] == 1)
													{
														echo "<li><a onclick=\"elenoticia('slidei',{$registo35['id']})\" id=\"slnot{$registo35['id']}\" href=\"#\" value=\"remind\">Remover do Slide do index</a></li>";
														echo "<input style=\"display:none;\" type=\"text\" id=\"slnot2{$registo35['id']}\" value=\"remind\">";
													}
													else
													{
														echo "<li><a onclick=\"elenoticia('slidei',{$registo35['id']})\" id=\"slnot{$registo35['id']}\" href=\"#\" value=\"desind\">Destacar no Slide do index</a></li>";
														echo "<input style=\"display:none;\" type=\"text\" id=\"slnot2{$registo35['id']}\" value=\"desind\">";
													}
													
													if($registo35['s_noticia'] == 1)
													{
														echo "<li><a onclick=\"elenoticia('slidem',{$registo35['id']})\" id=\"smnot{$registo35['id']}\" href=\"#\" value=\"remenu\">Remover do Slide do menu</a></li>";
														echo "<input style=\"display:none;\" type=\"text\" id=\"smnot2{$registo35['id']}\" value=\"remenu\">";
													}
													else
													{
														echo "<li><a onclick=\"elenoticia('slidem',{$registo35['id']})\" id=\"smnot{$registo35['id']}\" href=\"#\" value=\"desmenu\">Destacar no Slide do menu</a></li>";
														echo "<input style=\"display:none;\" type=\"text\" id=\"smnot2{$registo35['id']}\" value=\"desmenu\">";
													}
													echo "
													<li class=\"divider\"></li>
													<li><a onclick=\"elenoticia('apagar',{$registo35['id']})\" href=\"#\" value=\"apagar\">Remover Noticia</a>
													</li>
												</ul>
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
	
		<script>
	function elenoticia(x,y)
	{
		if(x == 'slidei')
		{
			z = document.getElementById("slnot2"+y).value;
		}
		else if(x == 'slidem')
		{
			z = document.getElementById("smnot2"+y).value;
		}
		else if(x == 'apagar')
		{
			z = 'apagar';
		}
		
		var http = new XMLHttpRequest();
		
		var parametros = "acao=" + z + "&notid=" + y;
		
		http.open("POST", "./admin/pages/assets/php/funoticia.php", true);
		
		http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

		http.onreadystatechange = function() {
			if(http.readyState == 4 && http.status == 200) 
			{
				
					if(http.responseText == "truedel")//APAGAR NOTICIA
					{
						toastr["success"]("Noticia eleminada com sucesso!");
						$("#"+y).remove();
						$("#tr"+y).remove();
					}
					else if(http.responseText == "falsedel")
					{
						toastr["error"]("Erro ao tentar eleminar a noticia!");
					}
					else if(http.responseText == "trueindexup0")//INDEX DESTAQUE
					{
						toastr["success"]("Noticia removida do slide do index com sucesso!");
						document.getElementById("slnot"+y).innerHTML = "Destacar no Slide do index";
						document.getElementById("slnot2"+y).value = "desind";
					}
					else if(http.responseText == "falseindexup0")
					{
						toastr["error"]("Erro ao remover a noticia do slide do index!");
					}
					else if(http.responseText == "trueindexup1")
					{
						toastr["success"]("Noticia destacada no slide do index com sucesso!");
						document.getElementById("slnot"+y).innerHTML = "Remover do Slide do index";
						document.getElementById("slnot2"+y).value = "remind";
					}
					else if(http.responseText == "falseindexup1")
					{
						toastr["error"]("Erro ao destacar a noticia do slide do index!");
					}
					else if(http.responseText == "truemenuup0")//APARTIR DAQUI É MENU
					{
						toastr["success"]("Noticia removida do slide do menu com sucesso!");
						document.getElementById("smnot"+y).innerHTML = "Destacar no Slide do Menu";
						document.getElementById("smnot2"+y).value = "desmenu";
					}
					else if(http.responseText == "falsemenuup0")
					{
						toastr["error"]("Erro ao remover a noticia do slide do menu!");
					}
					else if(http.responseText == "truemenuup1")
					{
						toastr["success"]("Noticia destacada no slide do menu com sucesso!");
						document.getElementById("smnot"+y).innerHTML = "Remover do Slide do Menu";
						document.getElementById("smnot2"+y).value = "remenu";
					}
					else if(http.responseText == "falsemenuup1")
					{
						toastr["error"]("Erro ao destacar a noticia do slide do menu!");
					}
					console.log(http.responseText);
				
			}
		}
		http.send(parametros);
	}
	
	</script>
	
	
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
			td = tr[i].getElementsByTagName("h5")[0];
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
    <!-- Bootstrap Core JavaScript -->
    <script src="admin/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="admin/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="admin/dist/js/sb-admin-2.js"></script>
	
	
	
</body>

</html>
