			<div class="col-md-3"  >
				<h3>Destaques</h3>
				<div style="border-top: 1px solid #348DE6"></div>
				<br>
				<p>Aqui v�o ficar as noticias em destaque</p>
				<br>
				<h3>Psic�loga</h3>
				<div style="border-top: 1px solid #348DE6"></div>
				<br>
				<p>	Tens uma pergunta que gostarias de colocar � psic�loga, e gostarias de v�-la respondinda no jornal?<br>

					<!--MODAL-->

					<center><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Pergunta</button></center>

					<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
					  <div class="modal-dialog" role="document">
						<div class="modal-content">
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="exampleModalLabel">Pergunta � psic�loga</h4>
						  </div>
						  <div class="modal-body">
							<form>
							  <div class="form-group">
								<label for="message-text" class="control-label">Messagem:</label>
								<textarea class="form-control" style="resize:vertical;" id="message-text"></textarea>
							  </div>
							</form>
						  </div>
						  <div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
							<button type="button" class="btn btn-primary" data-dismiss="modal">Enviar Pergunta</button>

						  </div>
						</div>
					  </div>
					</div>

					<script>
						$('#exampleModal').on('show.bs.modal', function (event) {
						  var button = $(event.relatedTarget) // Button that triggered the modal
						  var recipient = button.data('whatever') // Extract info from data-* attributes
						  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
						  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
						  var modal = $(this)
						  modal.find('.modal-title').text('New message to ' + recipient)
						  modal.find('.modal-body input').val(recipient)
						})

						//var notification = alertify.notify('sample', 'success', 5, function(){  console.log('dismissed'); });

					</script>

<script>


$(document).ready(function(){
	function getresult(url) {
		setTimeout(function(){
		$.ajax({
			url: url,
			type: "GET",
			data:  {rowcount:$("#rowcount").val()},
			beforeSend: function(){
			$('#loader-icon').show();
			},
			complete: function(){
			$('#loader-icon').hide();
			},
			success: function(data){
			$("#faq-result").append(data);
			},
			error: function(){} 	        
	   });
	   }, 500);
	}
	$(window).scroll(function(){
		
		if ($(window).scrollTop() == $(document).height() - $(window).height()){
			if($(".pagenum:last").val() <= $(".total-page").val()) {
				var pagenum = parseInt($(".pagenum:last").val()) + 1;
				getresult('getresult.php?page='+pagenum);
				$('#loader-icon').show();
			}
		}
	}); 
});

</script>
					<!-- standard version -->
					<script src="https://cdn.rawgit.com/alertifyjs/alertify.js/v1.0.10/dist/js/alertify.js"></script>

					<!-- FIM MODAL-->
				</p>
				<br>
            </div>