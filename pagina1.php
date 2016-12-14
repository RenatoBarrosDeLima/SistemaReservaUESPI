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

                <form class="form-signin" action="controller/LoginControler.php" method="post">
                    
                    <span id="reauth-email" class="reauth-email"></span>
                    <input type="text" id="inputMatricula" class="form-control" name="mat" placeholder="Matricula" required autofocus>
                    <input type="password" id="inputSenha" class="form-control" name="sen" placeholder="Senha" required>
                    <br>

                    <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Entrar</button>

                </form><!-- /form -->
                <a href='view/FormularioProfessor/formCadastrarProfessor.php' class="forgot-password">
                    Cadastrar ?
                </a>
                <br>
                <a href="recuperarSenha" class="forgot-password">
                    Recuperar senha ?

                </a>
            </div><!-- /card-container -->
        </div>

    </body>
<?php session_start(); session_destroy();exit; ?>
</html>


