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
$host = "localhost";
$user = "root";
$pass = "";
$banco = "BANCORESERVA";

$conexao = mysqli_connect($host, $user, $pass, $banco) or die(mysqli_error());

 $codProf = $_POST['codProf'];
 $query1 = "select * FROM PROFESSOR WHERE codProf = $codProf ";
 $sql1 = mysqli_query($conexao, $query1) or die(mysqli_error($conexao));
 $row = mysqli_num_rows($sql1);
 
 if($row == 0){
    echo "<script>alert('Registro Não Autenticado!');document.location='../../pagina1.php'</script>";
   echo "<script>alert('Matricula não encontrada!');document.location='../view/FormularioCoordenador/formExcluirProfessor.php'</script>";
 
 }else{
    $query = "DELETE FROM PROFESSOR WHERE codProf = $codProf ";
    $sql = mysqli_query($conexao, $query)or die(mysqli_error($conexao));
    if($sql){
      echo "<script>alert('$codProf deletado com sucesso');document.location='../view/FormularioCoordenador/formExcluirProfessor.php'</script>";

 }else{
   
    echo "<script>alert('Erro ao excluir!);document.location='../view/FormularioCoordenador/formExcluirProfessor.php'</script>";

 }
}
?>
