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



                    <ul class="nav">

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
                                            $codProf = $_POST['professor'];
                                            $dataEmp = $_POST['data'];
                                            $horaEmp = $_POST['hora'];
                                            $status = $_POST['status'];
                                            $coordenacao = $_POST['coordenacao'];
                                            $nome = $_POST['nome'];

                                            echo "$dataEmp <br></br>";

                                            echo "$codProf <br></br>";

                                            echo "$coordenacao <br></br>";

                                            echo "$nome <br></br>";

                                            $host = "localhost";
                                            $user = "root";
                                            $pass = "";
                                            $banco = "BANCORESERVA";

                                            $conexao = mysqli_connect($host, $user, $pass, $banco) or die(mysqli_error());

                                            function buscaEquipamento($conexao) {

                                               $query = "select codCoord, nome, marca, tombo, dataAquisicao, modelo, cor from EQUIPAMENTO where codCoord = '" . $_POST['coordenacao'] . "'";

                                               // $query = "SELECT * FROM EQUIPAMENTO INNER JOIN EQUIP_PROF ON EQUIPAMENTO.codEquip = EQUIP_PROF.codEquip";

                                               // $query = "SELECT * FROM EQUIPAMENTO INNER JOIN EQUIP_PROF ON EQUIPAMENTO.codEquip = EQUIP_PROF.codEquip WHERE EQUIP_PROF.dataEmp <> '".$_POST['data']."' AND EQUIP_PROF.horaEmp <> '".$_POST['hora']."' AND EQUIPAMENTO.codCoord = '".$_POST['coordenacao']."'";
                                                
                                                $resultado = mysqli_query($conexao, $query);
                                                $equipamento = array();

                                                while ($atual = mysqli_fetch_assoc($resultado)) {
                                                    #var_dump($atual);
                                                    array_push($equipamento, $atual);
                                                }
                                                return $equipamento;
                                            }

                                            $equipamento = buscaEquipamento($conexao);
                                            ?>

                                            <label><br>Equipamentos Disponíveis</label>
                                            <select type="text" id="soflow" name="equipamento" required class="form-control">
                                                <option value="">      Equipamento</option>

                                                <?php foreach ($equipamento as $equip) : ?>
                                                    <option value="<?= $equip['codEquip'] ?>"><?= $equip['nome'] ?>__________<?= $equip['marca'] ?>__________<?= $equip['modelo'] ?>__________<?= $equip['cor'] ?>__________<?= $equip['dataAquisicao'] ?>  </option>
                                                <?php endforeach; ?>			   
                                            </select>

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


