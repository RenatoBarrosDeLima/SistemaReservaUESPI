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
<?php include 'conn.php'; ?>
<!doctype html>


<html lang="pt-BR">


    <head>
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="assets/img/favicon.ico">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <script src="jquery-2.1.1.min.js" type="text/javascript"></script>

        <title>Alteração de Cadastro</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />

        <link href="../css/estilo.css" rel="stylesheet" />

        <script src="funcoes.js" type="text/javascript"></script>


    </head>



    <body>

        <div class="pad">
    <!-- <img class="imgBack" src="imagens/backgroud.png" alt="Logo" width="170" height="100">-->

            <div class="card card-containerProfessor">
                <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
                <p id="profile-name" class="profile-name-card"></p>
                <form class="form-signin" id="formulario" action= "../../controller/AlterarProfessorController.php" method="post">

                    <input type="hidden" id="action" name="editar" />    

                    <?php
                    $host = "localhost";
                    $user = "root";
                    $pass = "";
                    $banco = "BANCORESERVA";

                    $conexao = mysqli_connect($host, $user, $pass, $banco) or die(mysqli_error());



                    $query = "select codProf, nome, email, endereco, telefone, senha from PROFESSOR where codProf = '" . $_SESSION['Matricula'] . "'";


                    $resultado = mysqli_query($conexao, $query);
                    $professor = array();

                    while ($atual = mysqli_fetch_assoc($resultado)) {
                        #var_dump($atual);
                        array_push($professor, $atual);
                    }
                    foreach ($professor as $prof) :
                        $nomeProfessor = $prof['nome'];
                        $enderecoProfessor = $prof['endereco'];
                        $telefoneProfessor = $prof['telefone'];
                        $emailProfessor = $prof['email'];
                        $senhaProfessor = $prof['senha'];

                    endforeach;
                    ?>

                    <input type="text" id="inputNome" name="nome" value="<?php echo $nomeProfessor ?>" class="form-contro" placeholder="Nome" required>
                    <input type="text" id="inputEndereco" name="endereco" value="<?php echo $enderecoProfessor ?>" class="form-control" placeholder="Endereço" required>
                    <input type="text" id="inputTelefone" name="telefone" value="<?php echo $telefoneProfessor ?>" class="form-control" placeholder="Telefone"required >
                    <input type="email" id="inputEmail" name="email" value="<?php echo $emailProfessor ?>" class="form-control" placeholder="Email"  required>
                    <input type="password" id="inputSenha" name="senha" value="<?php echo $senhaProfessor ?>"class="form-control" placeholder="Senha" required>
                    <input type="password" id="inputSenhaConfirma" name="confirmaSenha" value="<?php echo $senhaProfessor ?>"class="form-control" placeholder="Confirme a Senha" required>



                    <select id="CbCidade" type="text" id="soflow" name="var_Cidade" required class="form-control">
                        <option value="">Cidade</option>
                        <?php
                        foreach ($pdo->query('SELECT codCity, nome FROM CIDADE order by nome') as $row) {
                            echo '<option value="' . $row['codCity'] . '">' . $row['nome'] . '</option>';
                        }
                        ?>			   
                    </select>

                    <select id="CbCampus" type="text" id="soflow" name="var_Campus" required class="form-control">                       
                    </select>
                    <script type="text/javascript">
                        $(document).ready(function () {
                            $('#CbCidade').change(function (e) {
                                $('#CbCampus').empty();
                                var id = $(this).val();
                                $.post('call_cidades.php', {codCity: id}, function (data) {
                                    var cmb = '<option value="">Selecione o Campus</option>';
                                    $.each(data, function (index, value) {
                                        cmb = cmb + '<option value="' + value.codCampus + '">' + value.nome + '</option>';
                                        ;
                                    });
                                    $('#CbCampus').html(cmb);
                                }, 'json');
                            });
                        });
                    </script>

                    <select id="CbCentro" type="text" id="soflow" name="var_Centro" required class="form-control">
                    </select>
                    <script type="text/javascript">
                        $(document).ready(function () {
                            $('#CbCampus').change(function (e) {
                                $('#CbCentro').empty();
                                var id = $(this).val();
                                $.post('call_centro.php', {codCentro: id}, function (data) {
                                    var cmb = '<option value="">Selecione o Centro</option>';
                                    $.each(data, function (index, value) {
                                        cmb = cmb + '<option value="' + value.codCentro + '">' + value.nome + '</option>';
                                        ;
                                    });
                                    $('#CbCentro').html(cmb);
                                }, 'json');
                            });
                        });
                    </script>

                    <select id="CbCoordenacao" type="text" id="soflow" name="var_Coordenacao" required class="form-control">
                    </select>
                    <script type="text/javascript">
                        $(document).ready(function () {
                            $('#CbCentro').change(function (e) {
                                $('#CbCoordenacao').empty();
                                var id = $(this).val();
                                $.post('call_coordenacao.php', {codCoord: id}, function (data) {
                                    var cmb = '<option value="">Selecione a Coordenacao</option>';
                                    $.each(data, function (index, value) {
                                        cmb = cmb + '<option value="' + value.codCoord + '">' + value.nome + '</option>';
                                        ;
                                    });
                                    $('#CbCoordenacao').html(cmb);
                                }, 'json');
                            });
                        });
                    </script>
                    <br><br>

                    <button name="editar" type="submit" class="btn btn-lg btn-primary btn-block btn-signin" >Salvar Alterações</button>


                </form><!-- /form -->


                <a href='../../model/Logout.php' class="forgot-password">
                    Sair ?
                </a>


            </div><!-- /card-container -->
        </div>
    </body>

</html>
