//APAGAR NOTICIAS E DESTAQUES SLIDES
function elenoticia(x,y)
{
	if(x == 'slidei')
	{
		z = document.getElementById("slnot"+y).value;
	}
	else if(x == 'slidem')
	{
		z = document.getElementById("smnot"+y).value;
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
					document.getElementById("slnot"+y).value = "desind";
				}
				else if(http.responseText == "falseindexup0")
				{
					toastr["error"]("Erro ao remover a noticia do slide do index!");
				}
				else if(http.responseText == "trueindexup1")
				{
					toastr["success"]("Noticia destacada no slide do index com sucesso!");
					document.getElementById("slnot"+y).innerHTML = "Remover do Slide do index";
					document.getElementById("slnot"+y).value = "remind";
				}
				else if(http.responseText == "falseindexup1")
				{
					toastr["error"]("Erro ao destacar a noticia do slide do index!");
				}
				else if(http.responseText == "truemenuup0")//APARTIR DAQUI É MENU
				{
					toastr["success"]("Noticia removida do slide do menu com sucesso!");
					document.getElementById("smnot"+y).innerHTML = "Destacar no Slide do Menu";
					document.getElementById("smnot"+y).value = "desmenu";
				}
				else if(http.responseText == "falsemenuup0")
				{
					toastr["error"]("Erro ao remover a noticia do slide do menu!");
				}
				else if(http.responseText == "truemenuup1")
				{
					toastr["success"]("Noticia destacada no slide do menu com sucesso!");
					document.getElementById("smnot"+y).innerHTML = "Remover do Slide do Menu";
					document.getElementById("smnot"+y).value = "remenu";
				}
				else if(http.responseText == "falsemenuup1")
				{
					toastr["error"]("Erro ao destacar a noticia do slide do menu!");
				}
				//console.log(http.responseText);
			
		}
	}
	http.send(parametros);
}