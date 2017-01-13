<?php include 'conn.php'; ?>

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

        <title>Solicitação de Reserva</title>

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
                            <a href="formProfessorInicio.php">
                                <i class="pe-7s-graph"></i>
                                <p>Inicio</p>
                            </a>
                        </li>


                        <li>
                            <a href="formReservaEquipamento.php">
                                <i class="pe-7s-video"></i>
                                <p>Reservar Equipamentos</p>
                            </a>
                        </li>

                        <li>
                            <a href="formLaboratorio.php">
                                <i class="pe-7s-culture"></i>
                                <p>Reservar De Laboratórios</p>
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

                                    <a href="">
                                        <?php echo "" . $_SESSION['Nome']; ?>
                                    </a>
                                </li>

                                <li>
                                    <a href="formEditarProfessor.php">
                                        Conta
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
                                        <h4 class="title">SOLICITAÇÃO DE RESERVA</h4>


                                    </div>
                                    <div class="content">
                                        <form class="form-signin" id="formulario" action= "../../controller/LaboratorioProfessorController.php" method="post">

                                            <?php
                                            $host = "localhost";
                                            $user = "root";
                                            $pass = "";
                                            $banco = "BANCORESERVA";

                                            $conexao = mysqli_connect($host, $user, $pass, $banco) or die(mysqli_error());

                                            function buscaLaboratorio($conexao) {

                                                $query = "select codLab, nome, setor, sala, codCoord from LABORATORIO where codCoord = '" . $_SESSION['Codigo'] . "'";

                                                // $query = "SELECT * FROM EQUIPAMENTO INNER JOIN EQUIP_PROF ON EQUIPAMENTO.codEquip = EQUIP_PROF.codEquip";
                                                // $query = "SELECT * FROM EQUIPAMENTO INNER JOIN EQUIP_PROF ON EQUIPAMENTO.codEquip = EQUIP_PROF.codEquip WHERE EQUIP_PROF.dataEmp <> '".$_POST['data']."' AND EQUIP_PROF.horaEmp <> '".$_POST['hora']."' AND EQUIPAMENTO.codCoord = '".$_POST['coordenacao']."'";

                                                $resultado = mysqli_query($conexao, $query);
                                                $laboratorio = array();

                                                while ($atual = mysqli_fetch_assoc($resultado)) {
                                                    #var_dump($atual);
                                                    array_push($laboratorio, $atual);
                                                }
                                                return $laboratorio;
                                            }

                                            $laboratorio = buscaLaboratorio($conexao);
                                            ?>

                                            <label><br>Laboratorios</label>
                                            <select type="text" id="soflow" name="laboratorio" required class="form-control">
                                                <option value="">Laboratorios</option>

                                                <?php foreach ($laboratorio as $lab) : ?>
                                                    <option value="<?= $lab['codLab'] ?>"><?= $lab['nome'] ?>__________<?= $lab['setor'] ?>__________<?= $lab['sala'] ?> </option>
                                                <?php endforeach; ?>			   
                                            </select>

                                            <label><br>Data de Reserva</label>
                                            <input type="date" id="inputDataAquisio" name="data" class="form-control" placeholder="dd/mm/yyyy" required></br>

                                            <label>Hora da Reserva</label>
                                            <select id="CbHora" type="text" id="soflow" name="hora" required class="form-control">
                                                <option value="">Selecione o Horario</option>
                                                <option value="1">08:00 às 10:00</option>
                                                <option value="2">10:00 às 12:00</option>
                                                <option value="3">14:00 às 16:00</option>
                                                <option value="4">16:00 às 18:00</option>
                                                <option value="5">18:00 às 20:00</option>
                                                <option value="6">20:00 às 22:00</option> 		   
                                            </select>

                                            <input type="hidden" name="professor" value="<?php echo $_SESSION['Matricula']; ?>" >
                                            <input type="hidden" name="coordenacao" value="<?php echo $_SESSION['Codigo']; ?>" >
                                            <input type="hidden" name="nome" value="<?php echo $_SESSION['Nome']; ?>" >                                                                                    
                                            <input type="hidden" name="status" value="1" >
                                            <label><br><br><br><br></label>
                                            <button type="submit" class="" >Reservar</button>
                                        </form><!-- /form -->
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




