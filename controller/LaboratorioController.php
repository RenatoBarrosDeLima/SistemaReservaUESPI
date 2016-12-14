<?php

require_once("../model/Laboratorio.php");

class LaboratorioController {

    private $cadastro;

    public function __construct() {
        $this->cadastro = new Laboratorio();

        //$acao = $_POST['acao'];
        //if ($acao == "incluir") {
        $this->incluirLab();
        //}
    }

    private function incluirLab() {

        $this->cadastro->setNome($_POST['nome']);
        $this->cadastro->setSetor($_POST['setor']);
        $this->cadastro->setSala($_POST['sala']);
        $this->cadastro->setCoordenacao($_POST['coordenacao']);
        

        //$this->cadastro->setCoordenacao($_POST['senha']);


        $result = $this->cadastro->incluirLaboratorio();
        //if ($result >= 1) {
        //echo "<script>alert('Registro incluído com sucesso!');document.location='../view/cad_cadastro.php'</script>";
        //} else {
        //echo "<script>alert('Erro ao gravar registro!');history.back()</script>";
        //}
        echo "<script>alert('Registro incluído com sucesso!');document.location='../view/FormularioCoordenador/formCoordenador.php'</script>";
    }

}
new LaboratorioController();
?>
