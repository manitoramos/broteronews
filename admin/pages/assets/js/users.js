document.getElementById("user_perm").style.display = "none";
function probres()
{
	document.getElementById("user_perm").style.display = "none";
}
//Vista de configuração do utilizador com atualização de dados ao clicar
function configurar(x)
{
	
	var http = new XMLHttpRequest();
	
	var parametros = "usid=" + x + "&teste=" + document.getElementById("conf" + x).value;
	
	http.open("POST", "admin/pages/assets/php/users.php", true);
	
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	http.onreadystatechange = function() {
		if(http.readyState == 4 && http.status == 200) 
		{
			
			$( "#user_perm" ).load( "admin/pages/usersperm.php #user_perm", function() {
				document.getElementById("esc_user").style.display = "none";
				$("#user_perm").fadeIn("slow");
			});
			
			//console.log(http.responseText);
			
		}
	}
	http.send(parametros);
	
	
}

//Mudar para a vista de escolher o utilizador
function escolher_user()
{
	
	document.getElementById("esc_user").style.display = "inline";
	document.getElementById("user_perm").style.display = "none";
	
}

//Desativar o utilizador ou ativar
function desativar(x)
{
	var http = new XMLHttpRequest();
	
	var parametros = "userid=" + x + "&change=" + document.getElementById("des" + x).value;
	
	http.open("POST", "admin/pages/assets/php/users.php", true);
	
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	http.onreadystatechange = function() {
		if(http.readyState == 4 && http.status == 200) 
		{

			if(http.responseText == "desativar")//desativa o utilizador e muda o valor do butao para ativar
			{
				document.getElementById("des" + x).innerHTML = "<i class=\"fa fa-fw s fa-check\"></i>Ativar";
				document.getElementById("des" + x).value = "ativar";
				//document.getElementById("eye" + x).innerHTML = "<i class=\"-alt fa fa-2x fa-eye-slash fa-fw\"></i>";
			}
			else//ativa o utilizador e muda o valor do butao para ativar
			{
				document.getElementById("des" + x).innerHTML = "<i class=\"fa fa-fw s fa-remove\"></i>Desativar";
				document.getElementById("des" + x).value = "desativar";
				//document.getElementById("eye" + x).innerHTML = "<i class=\"-alt fa fa-2x fa-eye fa-fw\"></i>";
			}
			
			//console.log(http.responseText);
			
		}
	}
	http.send(parametros);
	//document.getElementById("")
	
}

//meter o utilizador invisivel
function visi(x)
{
	
	$("#tr" + x).fadeOut();
	
}