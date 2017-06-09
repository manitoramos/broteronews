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
					toastr["error"]("Erro ao mandar o E-mail para informar que a conta foi desativada");
				}
				else if(res[1] == "Success"){
					
					//Alert para alertar que o email foi enviado com Sucesso
					alertify.delay(0);
					alertify.closeLogOnClick(true);
					alertify.logPosition("bottom right");
					toastr["success"]("E-mail para informar o Desativar da Conta enviado com Sucesso");
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
				toastr["success"]("Conta Reativada com Sucesso");
				//document.getElementById("eye" + x).innerHTML = "<i class=\"-alt fa fa-2x fa-eye fa-fw\"></i>";
			}
			
			//para ver se a erros
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
function edituser(x)
{
	
	var editt = "edituser";
	
	$(document).ready(function() {
		$.fn.editable.defaults.mode = 'inline';
		$('#usee_id').editable({
			type: 'text',
			pk: x,
			params:{editt},
			url: 'admin/pages/assets/php/usersedit.php',
			success: function(data) {
				if(data == "true")
				{
					alertify.delay(0);
					alertify.closeLogOnClick(true);
					alertify.logPosition("bottom right");
					alertify.success("Utilizador modificado com sucesso");
					$( "#profileuss" ).load( "admin/pages/usersperm.php #profileuss", function() {
						document.getElementById("ut2_"+x).innerHTML = document.getElementById("ut4_"+x).innerHTML;
					});
				}
				else
				{
					alertify.delay(0);
					alertify.closeLogOnClick(true);
					alertify.logPosition("bottom right");
					alertify.error("Erro!! Ao tentar modificar");
				}
			}
		});
	});
}

//editable no Nome Proprio
function editnopp(x)
{
	
	var editt = "editnomp";
	
	$(document).ready(function() {
		$.fn.editable.defaults.mode = 'inline';
		$('#noom_p').editable({
			type: 'text',
			pk: x,
			params:{editt},
			url: 'admin/pages/assets/php/usersedit.php',
			success: function(data) {
				if(data == "true")
				{
					alertify.delay(0);
					alertify.closeLogOnClick(true);
					alertify.logPosition("bottom right");
					alertify.success("Nome Proprio modificado com sucesso");
					$( "#profileuss" ).load( "admin/pages/usersperm.php #profileuss", function() {
						document.getElementById("np3_"+x).innerHTML = document.getElementById("np2_"+x).innerHTML;
					});
				}
				else
				{
					alertify.delay(0);
					alertify.closeLogOnClick(true);
					alertify.logPosition("bottom right");
					alertify.error("Erro!! Ao tentar modificar");
				}
			}
		});
	});
}

//editable nos Previlegios(Acesso)
function editprev(idd)
{
	var http = new XMLHttpRequest();
	
	var parametros = "editvalss=true";
	
	http.open("POST", "admin/pages/assets/php/usersedit.php", true);
	
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	//http.setRequestHeader("Content-length", parametros.length);
	//http.setRequestHeader("Connection", "close");

	http.onreadystatechange = function() {
		if(http.readyState == 4 && http.status == 200) {
			
				var tropas = [];
				var meke = http.responseText;

				meke = meke.replace(/"/g, '');
				var str = meke;
				var res = str.split(",");
				for (i = 0; i < res.length; i++) {
					var str_2 = res[i];
					var res_2 = str_2.split(":");
					tropas.push({value: res_2[0], text: res_2[1]});
				}
				var editt = "editaces";
				
				$.fn.editable.defaults.mode = 'inline';
				$('#prev_ed').editable({
					type: 'select',
					source: tropas,
					params:{editt},
					url: 'admin/pages/assets/php/usersedit.php',
					success: function(data) {
						if(data == "true")
						{
							alertify.delay(0);
							alertify.closeLogOnClick(true);
							alertify.logPosition("bottom right");
							alertify.success("Acesso do Utilizador alterado com Sucesso");
							$( "#profileuss" ).load( "admin/pages/usersperm.php #profileuss", function() {
								document.getElementById("ac3_"+idd).innerHTML = document.getElementById("ac2_"+idd).innerHTML;
								document.getElementById("ac1_"+idd).style.color = document.getElementById("ac2_"+idd).style.color;
							});
						}
						else
						{
							alertify.delay(0);
							alertify.closeLogOnClick(true);
							alertify.logPosition("bottom right");
							alertify.error("Erro!! Ao tentar modificar");
							console.log(data);
						}
					}
				});
				//console.log(http.responseText);
		}
	}
	http.send(parametros);
}

//gerar senha automatica para usuario
function gerar_s(x)
{
	var http = new XMLHttpRequest();
	
	var parametros = "gerarsenha=true";
	
	http.open("POST", "admin/pages/assets/php/gerarsenha.php", true);
	
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	//http.setRequestHeader("Content-length", parametros.length);
	//http.setRequestHeader("Connection", "close");

	http.onreadystatechange = function() {
		if(http.readyState == 4 && http.status == 200) {
			
			//console.log(http.responseText);
			if(http.responseText == "Error"){
					
					//Alert para alertar que o email foi não enviado com Sucesso
					alertify.delay(0);
					alertify.closeLogOnClick(true);
					alertify.logPosition("bottom right");
					toastr["error"]("Erro ao mandar o e-mail do reset da senha");
			}
			else if(http.responseText == "Success"){
					
					//Alert para alertar que o email foi enviado com Sucesso
					alertify.delay(0);
					alertify.closeLogOnClick(true);
					alertify.logPosition("bottom right");
					toastr["success"]("E-mail para informar o Reset da Senha enviado com Sucesso");
			}
		}
	}
	http.send(parametros);
	
}