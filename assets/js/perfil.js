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


	function hey(){
		alertify
		  .defaultValue("Escreve a Antiga Password")
		  .prompt("Mudar Password",
			function (val, ev) {

			  // The click event is in the event variable, so you can use it here.
			  ev.preventDefault();

				alertify
				  .defaultValue("Escreve a Nova Password")
				  .prompt("Mudar Password",
					function (val2, ev) {

					  // The click event is in the event variable, so you can use it here.
					  ev.preventDefault();

					  // The value entered is availble in the val variable.
					  alertify.success("Antiga: " + val + " Nova: " + val2);

					}, function(ev) {

					  // The click event is in the event variable, so you can use it here.
					  ev.preventDefault();

					  alertify.error("Cancelas-te a operação");

					}
				  );

			}, function(ev) {

			  // The click event is in the event variable, so you can use it here.
			  ev.preventDefault();

			  alertify.error("Cancelas-te a operação");

			}
		  );
		  
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
					alertify.error("Insira uma Imagem demasiado grande");
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