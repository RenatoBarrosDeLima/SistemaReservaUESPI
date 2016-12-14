<?php

require_once("../model/Equipamento.php");

class EquipamentoController {

    private $cadastro;

    public function __construct() {
        $this->cadastro = new Equipamento();

        //$acao = $_POST['acao'];
        //if ($acao == "incluir") {
        $this->incluirEq();
        //}
    }

    private function incluirEq() {
        //$this->cadastro->setCod($_POST['matricula']);
        $this->cadastro->setNome($_POST['nome']);
        $this->cadastro->setTombo($_POST['tombo']);
        $this->cadastro->setData($_POST['data']);
        $this->cadastro->setModelo($_POST['modelo']);
        $this->cadastro->setMarca($_POST['marca']);
        $this->cadastro->setCor($_POST['cor']);
        $this->cadastro->setCoordenacao($_POST['coordenacao']);
        //$this->cadastro->setCoordenacao($_POST['senha']);


        $result = $this->cadastro->incluirEquip();
        //if ($result >= 1) {
        // echo "<script>alert('Registro incluído com sucesso!');document.location='../view/cad_cadastro.php'</script>";
        //} else {
        //echo "<script>alert('Erro ao gravar registro!');history.back()</script>";
        //}
        echo "<script>alert('Registro incluído com sucesso!');document.location='../view/FormularioCoordenador/formCoordenador.php'</script>";
    }

}
new EquipamentoController();
?>
