//Meter a visao de informações de user invisivel para poder atualizar ao click
document.getElementById("user_perm").style.display = "none";

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
				document.getElementById("v_coment").style.display = "none";
				//document.getElementById("v_conf").style.display = "none";
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
	
	var parametros = "userid=" + x + "&change=" + document.getElementById("des" + x).value + "&email=" + document.getElementById("email" + x).innerHTML + "&assunto=BroteroNews";
	
	http.open("POST", "admin/pages/assets/php/users.php", true);
	
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	http.onreadystatechange = function() {
		if(http.readyState == 4 && http.status == 200) 
		{
			
			var str = http.responseText;
			var res = str.split("/");

			if(res[0] == "desativar")//desativa o utilizador e muda o valor do butao para ativar
			{
				document.getElementById("des" + x).innerHTML = "<i class=\"fa fa-fw s fa-check\"></i>Ativar";
				document.getElementById("des" + x).value = "ativar";
				if(res[1] == "Error"){
					
					//Alert para alertar que o email foi não enviado com Sucesso
					alertify.delay(0);
					alertify.closeLogOnClick(true);
					alertify.logPosition("bottom right");
					alertify.error("Erro ao mandar o E-mail para informar que a conta foi desativada");
				}
				else if(res[1] == "Success"){
					
					//Alert para alertar que o email foi enviado com Sucesso
					alertify.delay(0);
					alertify.closeLogOnClick(true);
					alertify.logPosition("bottom right");
					alertify.success("E-mail para informar o Desativar da Conta enviado com Sucesso");
				}
				//document.getElementById("eye" + x).innerHTML = "<i class=\"-alt fa fa-2x fa-eye-slash fa-fw\"></i>";
			}
			else if(res[0] == "ativar")//ativa o utilizador e muda o valor do butao para ativar
			{
				document.getElementById("des" + x).innerHTML = "<i class=\"fa fa-fw s fa-remove\"></i>Desativar";
				document.getElementById("des" + x).value = "desativar";
				
				//Alert para dizer que a conta foi ativada com Sucesso :: dura 5 segundos
				alertify.delay(5000);
				alertify.closeLogOnClick(true);
				alertify.logPosition("bottom right");
				alertify.success("Conta Reativada com Sucesso");
				//document.getElementById("eye" + x).innerHTML = "<i class=\"-alt fa fa-2x fa-eye fa-fw\"></i>";
			}
			
			console.log(http.responseText);
			
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

//mudar para a vista geral nas configurações do utilizador
function vista_g()
{
	
	//document.getElementById("v_conf").style.display = "none";
	document.getElementById("v_geral").style.display = "";
	document.getElementById("v_coment").style.display = "none";
	$("#li_g").addClass("active");
	$("#li_c").removeClass("active");
	//$("#li_s").removeClass("active");
	
}

//Comentarios
function vista_c()
{
	
	document.getElementById("v_geral").style.display = "none";
	document.getElementById("v_coment").style.display = "";
	//document.getElementById("v_conf").style.display = "none";
	$("#li_c").addClass("active");
	$("#li_g").removeClass("active");
	//$("#li_s").removeClass("active");
	
}

//CONFIGURAÇÕES DA CONTA
function vista_s()
{
	
	document.getElementById("v_geral").style.display = "none";
	document.getElementById("v_coment").style.display = "none";
	//document.getElementById("v_conf").style.display = "";
	$("#li_c").removeClass("active");
	$("#li_g").removeClass("active");
	//$("#li_s").addClass("active");
	
}


//editable no Utilizador
function edituser()
{
	
	$(document).ready(function() {
		$.fn.editable.defaults.mode = 'inline';
		$.fn.editable.defaults.onblur = 'submit';
		$('#usee_id').editable({
			type: 'text',
			//pk: ,
			//url: 'assets/php/editnote.php',
			success: function(data) {
				
			}
		});
	});
}

//editable no Nome Proprio
function editnopp()
{
	
	$(document).ready(function() {
		$.fn.editable.defaults.mode = 'inline';
		$.fn.editable.defaults.onblur = 'submit';
		$('#noom_p').editable({
			type: 'text',
			//pk: ,
			//url: 'assets/php/editnote.php',
			success: function(data) {
				
			}
		});
	});
}

//gerar senha automatica para usuario
function gerar_s()
{
	
	var http = new XMLHttpRequest();
	
	var parametros = "gerarsenha=true";
	
	http.open("POST", "admin/pages/assets/php/gerarsenha.php", true);
	
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	//http.setRequestHeader("Content-length", parametros.length);
	//http.setRequestHeader("Connection", "close");

	http.onreadystatechange = function() {
		if(http.readyState == 4 && http.status == 200) {
			
			console.log(http.responseText);
			
		}
	}
	http.send(parametros);
	
}