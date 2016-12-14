<?php

require_once 'dao/Banco.php';

class Login extends Banco {

    public $matricula;
    public $senha;
    public $resultado;

    public function getMatricula() {
        return $this->matricula;
    }

    public function setMatricula($mat) {
        $this->matricula = $mat;
    }

    public function getSenha() {
        return $this->matricula;
    }

    public function setSenha($sen) {
        $this->senha = $sen;
    }

    public function verifica() {
        $this->sql = "SELECT codProf, senha, codCoord, nome, funcao FROM PROFESSOR WHERE (codProf = '" . $this->matricula . "') AND (senha = '" . $this->senha . "')";

        // $this->sql = "SELECT * FROM PROFESSOR codProf = '$this->matricula' and senha = '$this->senha'";
        $this->query = mysqli_query($this->conecta, $this->sql) or die(mysqli_error($this->conecta));
        $this->row = mysqli_num_rows($this->query);
        if ($this->row > 0) {
            //session_start();
            $this->resultado = mysqli_fetch_assoc($this->query);
              if(!isset($_SESSION)) session_start ();
            $_SESSION['funcao'] = $this->resultado['funcao'];
            $_SESSION['Matricula'] = $this->resultado['codProf'];
            $_SESSION['Senha'] = $this->resultado['senha'];
            $_SESSION['Codigo'] = $this->resultado['codCoord'];
            $_SESSION['Nome'] = $this->resultado['nome'];
            
            if($_SESSION['funcao'] > 0){
                header("Location: ../view/FormularioCoordenador/formCoordenador.php"); exit;
            }else{
               header("Location: ../view/FormularioProfessor/formProfessorInicio.php"); exit;
            }
            // echo "<script>alert('Registro Autenticado com sucesso!');document.location='../view/formProfessor.php'</script>";
        } else {
            echo "<script>alert('Registro Não Autenticado!');document.location='../pagina1.php'</script>";
        }
    }

}
