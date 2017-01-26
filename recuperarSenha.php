<?php

$host = "localhost";
$user = "root";
$pass = "";
$banco = "BANCORESERVA";

$conexao = mysqli_connect($host, $user, $pass, $banco) or die(mysqli_error());

    if(isset($_POST['ok'])){

		$email = $_POST['email'];
		
		$sql_code = "SELECT email FROM PROFESSOR WHERE (email = '" . $email. "')";
        $query = mysqli_query($conexao, $sql_code) or die(mysqli_error($conexao));
        $row = mysqli_num_rows($query);
      
        if ($row > 0) {
        	$novasenha = substr(md5(time()), 0,6);
	     	// Caminho da biblioteca PHPMailer
			require 'PHPMailer/PHPMailerAutoload.php';
			// Instância do objeto PHPMailer
			$mail = new PHPMailer;	 
			// Configura para envio de e-mails usando SMTP
			$mail->isSMTP();			 
			// Servidor SMTP
			$mail->Host = 'smtp.gmail.com';
			// Usar autenticação SMTP
			$mail->SMTPAuth = true;
			// Usuário da conta
			$mail->Username = 'recuperarsenhareservas@gmail.com';
			// Senha da conta
			$mail->Password = 'recuperarsenha123';
			// Tipo de encriptação que será usado na conexão SMTP
			$mail->SMTPSecure = 'ssl';
			// Porta do servidor SMTP
			$mail->Port = 465;
			// Informa se vamos enviar mensagens usando HTML
			$mail->IsHTML(true);
			// Email do Remetente
			$mail->From = 'recuperarsenhareservas@gmail.com';
			// Nome do Remetente
			$mail->FromName = 'Sistema de Reservas';
			// Endereço do e-mail do destinatário
			$mail->addAddress($email);
			// Assunto do e-mail
			$mail->Subject = 'Nova senha (Sistema de Reservas)';
			// Mensagem que vai no corpo do e-mail
			$mail->Body = "Sua nova senha : ". $novasenha."<br>  altere por em de sua preferencia";
			 
			// Envia o e-mail e captura o sucesso ou erro
			if($mail->Send()):
			       	//mail($email, "nova senha","sua nova senha: ".$novasenha);//so funciona em hospedagem nao funciona em local host
			     	$query = "UPDATE `PROFESSOR` SET `senha`= '$novasenha' WHERE email='$email'";
			     	$sucesso = mysqli_query($conexao ,$query);
			     	if($sucesso){
			     		echo "<script>alert('Email enviado com sucesso!');document.location='pagina1.php'</script>";
			     		
			     	}else{
			     		echo "<center>Erro ao salvar senha no banco de dados!</center><br>";
			     	}
			else:
			    echo "<script>alert('Erro ao enviar Email!');document.location='recuperarSenha.php'</script>";
		   
			endif;
     
		   
        }else{
        	echo "<script>alert('Email não encontrado!');document.location='recuperarSenha.php'</script>";
        	
        }

    }

?>


<!doctype html>

<html lang="pt-BR">

    <head>
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="assets/img/favicon.ico">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Universidade Estadual do Piauí</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />

        <link href="view/css/estilo.css" rel="stylesheet" />


    </head>

    <body>

        <!--imagem opaca-->

        <div class="pad">
           <!-- <img class="imgBack" src="imagens/backgroud.png" alt="Logo" width="170" height="100">-->

            <div class="card card-container">
                <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
                <img id="profile-img" class="profile-img-card" src="view/imagens/logo.png" />
                <p id="profile-name" class="profile-name-card"></p>

				<form method="post" action="">
					<center><input  placeholder="Digite seu e-mail" type="email" name="email" required></center>
					<br>
					<center><input  value="Enviar" name="ok" type="submit"></center>
					
				</form>

       
                </a>
            </div><!-- /card-container -->
        </div>

    </body>

</html>








<!--

<html>

<head>
	<meta charset="utf-8">
</head>
<body>
<form method="post" action="">
	<center><input  placeholder="Digite seu e-mail" type="email" name="email" required></center>
	<br>
	<center><input  value="Enviar" name="ok" type="submit"></center>
</form>
	
</body>

</html>

-->