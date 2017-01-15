<!doctype html>
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
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
                                <p>Reservar Laboratório</p>
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
                                    <a href="">
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
                                        <h4 class="title">EQUIPAMENTOS DISPONÍVEIS</h4>


                                    </div>
                                    <div class="content">
                                        <form class="form-signin" id="formulario" action= "../../controller/EquipamentoProfessorController.php" method="post">
                                            <?php
                                            $DataEmp = $_POST['data'];
                                            $HoraEmp = $_POST['hora'];

                                            $host = "localhost";
                                            $user = "root";
                                            $pass = "";
                                            $banco = "BANCORESERVA";

                                            $conexao = mysqli_connect($host, $user, $pass, $banco) or die(mysqli_error());

                                            function buscaEquipamento($conexao) {

                                                $query1 = "select codEquip from EQUIP_PROF where dataEmp = '" . $_POST['data'] . "' AND horaEmp = '" . $_POST['hora'] . "' ";
                                                $resultado1 = mysqli_query($conexao, $query1);

                                                $equipamento = array();

                                                while ($atual = mysqli_fetch_assoc($resultado1)) {
                                                    #var_dump($atual);
                                                    array_push($equipamento, $atual);
                                                }
                                                return $equipamento;
                                            }

                                            $equipamento = buscaEquipamento($conexao);

                                            if (count($equipamento) >= 1) {

                                                $valor = $equipamento;
                                                $final = $equipamento[0]['codEquip'];
                                            }
                                            ?>


                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Código</th>
                                                        <th>Nome</th>
                                                        <th>Modelo</th>
                                                        <th>Marca</th>
                                                        <th>Data de Aquisiçao</th>

                                                    </tr>
                                                </thead>

                                                <tbody>

                                                    <tr>
                                                        <?php
                                                        error_reporting(E_ERROR | E_PARSE);
                                                        if ($final != NULL) {
                                                            $query = "SELECT * FROM EQUIPAMENTO as s WHERE s.codEquip IN (SELECT DISTINCT c.codEquip FROM EQUIP_PROF as c WHERE c.codEquip != $final)";
                                                        } else {
                                                            $query = "SELECT * FROM EQUIPAMENTO as s WHERE s.codEquip IN (SELECT DISTINCT c.codEquip FROM EQUIP_PROF as c)";
                                                        }
//$query = "SELECT * FROM EQUIPAMENTO INNER JOIN EQUIP_PROF ON EQUIPAMENTO.codEquip = EQUIP_PROF.codEquip WHERE EQUIP_PROF.dataEmp <> '".$_POST['data']."' AND EQUIP_PROF.horaEmp <> '".$_POST['hora']."' AND EQUIPAMENTO.codCoord = '".$_POST['coordenacao']."'";

                                                        $resultado = mysqli_query($conexao, $query);


                                                        while ($row = mysqli_fetch_assoc($resultado)) {
                                                            error_reporting(E_ERROR | E_PARSE);

                                                            if ($row['dataEmp'] != $_POST['data'] and $row['horaEmp'] != $_POST['hora']) {

                                                                echo '<td>' . $row['codEquip'] . '</td>';
                                                                echo '<td>' . $row['nome'] . '</td>';
                                                                echo '<td>' . $row['marca'] . '</td>';
                                                                echo '<td>' . $row['modelo'] . '</td>';
                                                                echo '<td>' . $row['dataAquisicao'] . '</td>';
                                                                echo '</tr>';
                                                            }
                                                            //echo '</tbody></table>';
                                                        }
                                                        ?>
                                                </tbody>
                                            </table>
                                    </div>
                                </div>

                                <input type="hidden" name="data" value="<?php echo $_POST['data']; ?>">
                                <input type="hidden" name="hora" value="<?php echo $_POST['hora']; ?>">
                                <input type="hidden" name="status" value="1" >
                                <input type="hidden" name="professor" value="<?php echo $_SESSION['Matricula']; ?>" >
                                <input type="number" id="inputNome" name="CodEquipamento" value="CodEquipamento"class="form-control" placeholder="Informe o Código do Equipamento" required  autofocus>
                                <br>
                                <button type="submit" class="btn btn-lg btn-primary" >Reservar</button>
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


