<?php include '../view/FormularioProfessor/conn.php'; ?>

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

<?php 
$nome = $_POST['nome'];
$endereco = $_POST['endereco'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$pdo->query("UPDATE PROFESSOR SET nome='$nome', endereco='$endereco', telefone='$telefone', email='$email', senha='$senha' WHERE codProf= '".$_SESSION['Matricula']."'");

echo "<script>alert('Registro Alterado com sucesso!');document.location='../view/FormularioProfessor/formProfessorInicio.php'</script>";
?>
