/*$(document).ready(function() {
    var panels = $('.user-infos');
    var panelsButton = $('.dropdown-user');
    panels.hide();

    //Click dropdown
    panelsButton.click(function() {
        //get data-for attribute
        var dataFor = $(this).attr('data-for');
        var idFor = $(dataFor);

        //current button
        var currentButton = $(this);
        idFor.slideToggle(400, function() {
            //Completed slidetoggle
            if(idFor.is(':visible'))
            {
                currentButton.html('<i class="glyphicon glyphicon-chevron-up text-muted"></i>');
            }
            else
            {
                currentButton.html('<i class="glyphicon glyphicon-chevron-down text-muted"></i>');
            }
        })
    });


    $('[data-toggle="tooltip"]').tooltip();

    $('button').click(function(e) {
        e.preventDefault();
        alert("This is a demo.\n :-)");
    });
});*/
	function hey()
	{ 
		document.getElementById("anpass").focus();
	}
	
	
	function cleanpass()
	{
		//limpar os dados de mudar a password
		document.getElementById("anpass").value = "";
		document.getElementById("newpass").value = "";
		document.getElementById("new2pass").value = "";
		$("#rpass").removeClass("has-error");
		$("#rpass").removeClass("has-success");
		document.getElementById("coinpass").style.display = "none";
	}
	
	
	function veryfy()
	{
		//verificar a 2 palavra pass para ver se coincide com a primeira
		if(document.getElementById("new2pass").value == document.getElementById("newpass").value)
		{
			document.getElementById("coinpass").style.display = "none";
			$("#rpass").removeClass("has-error");
			$("#rpass").addClass("has-success");
			document.getElementById("savebutt").disabled = false;
		}
		else if((document.getElementById("new2pass").value.length >= document.getElementById("newpass").value.length) && (document.getElementById("new2pass").value != document.getElementById("newpass").value))
		{
			$("#rpass").addClass("has-error");
			document.getElementById("coinpass").style.display = "";
			document.getElementById("savebutt").disabled = true;
		}
		else
		{
			$("#rpass").addClass("has-error");
			document.getElementById("coinpass").style.display = "";
			document.getElementById("savebutt").disabled = true;
		}
		
	}
	
	//Guardar nova password
	function savefy()
	{
		
		var http = new XMLHttpRequest();
	
		var parametros = "savepass=yes&oldpw=" + document.getElementById("anpass").value + "&newpw=" + document.getElementById("newpass").value + "&new2pw=" + document.getElementById("new2pass");
		
		http.open("POST", "assets/php/perfilpass.php", true);
		
		http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

		http.onreadystatechange = function() {
			if(http.readyState == 4 && http.status == 200) 
			{
				
				if(http.responseText == "falseold")
				{
					toastr["error"]("A antiga password não esta correta, tente novamente!!");
				}
				else if(http.responseText == "falsenew")
				{
					toastr["error"]("A password não coincide!!");
					document.getElementById("new2pass").focus();
				}
				else if(http.responseText == "truechange")
				{
					toastr["success"]("A password foi mudada com sucesso!!");
				}
				
				console.log(http.responseText);
				
			}
		}
		http.send(parametros);
		
	}
	
	//mudar a foto
	$(document).ready(function (e) {
	$("#alterarfoto").on('change',(function(e) {
		e.preventDefault();
		$.ajax({
        	url: "./assets/php/perfil.php",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data)
		    {
				if(data == "true"){
					$( "#altimg" ).load( "perfil.php #altimg", function() {
					});
					$( "#menuimgalt" ).load( "perfil.php #menuimgalt", function() {
					});
				}else if(data == "false"){
					alertify.delay(0);
					alertify.closeLogOnClick(true);
					alertify.logPosition("bottom right");
					alertify.error("Insira uma Imagem , nao outra coisa!!");
				}else if(data == "large"){
					alertify.delay(0);
					alertify.closeLogOnClick(true);
					alertify.logPosition("bottom right");
					alertify.error("Tamanho da Imagem demasiado grande!!");
				}else{
					alertify.delay(0);
					alertify.closeLogOnClick(true);
					alertify.logPosition("bottom right");
					alertify.error("Alguma coisa deu errado");
					console.log(data);
				}
		    },
		  	error: function() 
	    	{
				alertify.delay(0);
				alertify.closeLogOnClick(true);
				alertify.logPosition("bottom right");
				alertify.error("Erro sistema em baixo!!");
	    	} 	        
	   });
	}));
	});