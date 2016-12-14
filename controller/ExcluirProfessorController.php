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

$pdo->query("DELETE FROM PROFESSOR WHERE codProf = '" . $_SESSION['Matricula'] . "'");

echo "<script>alert('Registro Excluido Com Sucesso com sucesso!');document.location='../../pagina1.php'</script>";
?>

