<?php
$DataEmp = $_POST['data'];
$HoraEmp = $_POST['hora'];

require_once("../model/LaboratorioProfessor.php");

class LaboratorioProfessorController {

    private $cadastro;

    public function __construct() {
        $this->cadastro = new LaboratorioProfessor();

        //$acao = $_POST['acao'];
        //if ($acao == "incluir") {
        $this->incluirProf();
        //}
    }

    private function incluirProf() {
        //$this->cadastro->setCod($_POST['matricula']);
       
        $this->cadastro->setCodLab($_POST['CodLaboratorio']);
        $this->cadastro->setCodProf($_POST['professor']);
        $this->cadastro->setDataEmp($_POST['data']);
        $this->cadastro->setHoraEmp($_POST['hora']);
        $this->cadastro->setStatus($_POST['status']);


        $result = $this->cadastro->incluirLabProf();
        //if ($result >= 1) {
        // echo "<script>alert('Registro incluído com sucesso!');document.location='../view/cad_cadastro.php'</script>";
        //} else {
        //echo "<script>alert('Erro ao gravar registro!');history.back()</script>";
        //}
        echo "<script>alert('Laboratório Reservado Com Sucesso!');document.location='../view/FormularioProfessor/formProfessorInicio.php'</script>";
    }

}

new LaboratorioProfessorController();
?>
