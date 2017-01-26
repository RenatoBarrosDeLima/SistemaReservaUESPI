<?php
// A sessão precisa ser iniciada em cada página diferente
if (!isset($_SESSION))
    session_start();

// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['Matricula'])) {
    // Destrói a sessão por segurança
    session_destroy();
    // Redireciona o visitante de volta pro login
    echo "<script>alert('Registro Não Autenticado!');document.location='../../pagina1.php'</script>";
    exit;
}
?>
<!doctype html>


<html lang="pt-BR">


    <head>
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Pagina Inicial Coordenador</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />

        <!-- Bootstrap core CSS     -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />

        <!-- Animation library for notifications   -->
        <link href="../assets/css/animate.min.css" rel="stylesheet"/>

        <!--  Light Bootstrap Table core CSS    -->
        <link href="../assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>

        <!--  CSS for Demo Purpose, don't include it in your project     -->
        <link href="../assets/css/demo.css" rel="stylesheet" />

        <!--     Fonts and icons     -->
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
        <link href="../assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

        <script src="http://code.jquery.com/jquery-1.9.1.js"></script> 




    </head>
    <body>

        <div class="wrapper">
            <div class="sidebar" data-color="azure" data-image="../imagens/logo.png">
                <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


                <div class="sidebar-wrapper">

                    <div class="logo">
                        <a href="http://www.uespi.br/site" target="_blank" class="simple-text">
                            Site Da Instituição
                        </a>
                    </div>

                    <ul class="nav">
                        <li>
                            <a href="formCoordenador.php">
                                <i class="pe-7s-graph"></i>
                                <p>Inicio</p>
                            </a>
                        </li>


                        <li class="active-pro">
                            <a href="http://www.uespi.br/site/" target="_blank" class="simple-text">
                                <i class="pe-7s-rocket"></i>
                                <p>Site Da Instituição</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="main-panel">
                <nav class="navbar navbar-default navbar-fixed">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                        </div>
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-left">
                                <li>

                                </li>
                                <li class="dropdown">

                                </li>
                                <li>

                                </li>
                            </ul>

                            <ul class="nav navbar-nav navbar-right">

                                <li>
                                    <a href="formEditarProfessor.php">
                                        <?php echo "" . $_SESSION['Nome']; ?>
                                    </a>
                                </li>

                                <li>
                                    <a href="formEditarProfessor.php">
                                        Editar Conta
                                    </a>
                                </li>
                                <li class="dropdown">

                                    <a href="../../pagina1.php">
                                        Sair
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="header">
                                        <h4 class="title">Devolução</h4>
                                    </div>

                                    <div class="content">
                                        <form >
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="form-group">

                                                        <label>Matrícula</label>
                                                        <input type="text" id="matricula" name="nome" class="form-control" required autofocus></br>


                                                    </div>
                                                </div>
                                            </div>

                                            <button class="btn btn-info btn-fill pull-right" type="submit" value="submit" onclick="return dhk()" >Procurar</button>

                                            <div class="clearfix"></div>
                                        </form>


                                        <p id="msg"></p>


                                        <script>
                                            function dhk() {

                                                var matricula = document.getElementById('matricula').value;
                                                var dataString = 'matricula=' + matricula;

                                                $.ajax({
                                                    type: "post",
                                                    url: "teste.php",
                                                    data: dataString,
                                                    cache: false,
                                                    success: function (html) {


                                                        var tabela = "";
                                                        $('#msg').html(html);
                                                    }

                                                });

                                                return false;
                                            }
                                        </script>
                                        <br>
                                        <br>

                                        <!--  <form method="post" action="devolucaoLab.php">
                                          <div class="row">
                                              <div class="col-md-5">
                                                  <div class="form-group">
                                                  
                                                      <label>Código</label>
                                                      <input type="text" id="codigo" name="codigo" class="form-control" required autofocus></br>

                                                    
                                                  </div>
                                              </div>
                                          </div>

                                          <button class="btn btn-info btn-fill pull-right" type="submit" value="submit"  >Devolver</button>

                                          <div class="clearfix"></div>
                                      </form>
                                        -->

                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>

</html>


