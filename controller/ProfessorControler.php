<?php

require_once("../model/Professor.php");

class ProfessorControler {

    private $cadastro;

    public function __construct() {
        $this->cadastro = new Professor();

        //if ($acao == "incluir") {
            $this->incluir();
        //} 
       // else if ($acao1 = "editar") {
            //$this->editar();
       // }
 
    }

    private function incluir() {
        $this->cadastro->setCodProf($_POST['matricula']);
        $this->cadastro->setNome($_POST['nome']);
        $this->cadastro->setEndereco($_POST['endereco']);
        $this->cadastro->setTelefone($_POST['telefone']);
        $this->cadastro->setEmail($_POST['email']);
        $this->cadastro->setSenha($_POST['senha']);
        $this->cadastro->setCoordenacao($_POST['var_Coordenacao']);

        $result = $this->cadastro->incluir();
        //if ($result >= 1) {
        // echo "<script>alert('Registro incluído com sucesso!');document.location='../view/cad_cadastro.php'</script>";
        //} else {
        //echo "<script>alert('Erro ao gravar registro!');history.back()</script>";
        //}
        echo "<script>alert('Registro incluído com sucesso!');document.location='../pagina1.php'</script>";
    }

}

new ProfessorControler();
?>
