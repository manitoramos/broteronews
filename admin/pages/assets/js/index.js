function admin_index(x)
{
	if(x == 1)
	{
		document.getElementById("noticano").style.display = "";
		document.getElementById("repnoticias").style.display = "none";
		document.getElementById("pedcategoria").style.display = "none";
	}
	else if(x == 2)
	{
		document.getElementById("repnoticias").style.display = "";
		document.getElementById("noticano").style.display = "none";
		document.getElementById("pedcategoria").style.display = "none";
	}
	else if(x == 3)
	{
		document.getElementById("pedcategoria").style.display = "";
		document.getElementById("repnoticias").style.display = "none";
		document.getElementById("noticano").style.display = "none";
	}
	else if(x == 4)
	{
		
	}
}


function categoriapub(x,y)
{
	var http = new XMLHttpRequest();
	
	var parametros = "acao=" + x + "&catid=" + y;
	
	http.open("POST", "./admin/pages/assets/php/categoriapub.php", true);
	
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	http.onreadystatechange = function() {
		if(http.readyState == 4 && http.status == 200) 
		{
			
				if(http.responseText == "truedel")
				{
					toastr["success"]("Categoria eleminada com sucesso!");
					$("#"+y).remove();
				}
				else if(http.responseText == "falsedel")
				{
					toastr["error"]("Erro ao tentar eleminar a categoria!");
				}
				else if(http.responseText == "trueup")
				{
					toastr["success"]("Categoria inserida com sucesso!");
					$("#"+y).remove();
				}
				else if(http.responseText == "falseup")
				{
					toastr["error"]("Erro ao tentar aceitar a Categoria!");
				}
			
				//console.log(http.responseText);
			
		}
	}
	http.send(parametros);
}