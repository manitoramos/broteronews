<?php 

			//email automatico para dizer que a conta foi desativada
			$de = "broteronews@gmail.com";
			$headers = "From: BroteroNews <".$de.">\n";
			$headers .= "Content-Type: Text/HTML; charset=UTF-8\n";
			
			$mensagem = "Sua Conta da BroteroNews foi Desativada consulte o suporte para mais informação.";
			
			// formatação da mensagem em HTML
			$mensagem = '<html>
			<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
			<body>
			' . $mensagem . '
			</body>
			</html>';

			$result = mail('mtjmt2@hotmail.com','Conta Desativada',$mensagem,$headers);
			
			if(!$result) {   
				 echo "Error";   
			} else {
				echo "Success";
			}
?>