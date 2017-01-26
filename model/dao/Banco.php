<?php

class Banco {

    public $sql;
    public $query;
    public $result;
    public $host;
    public $usuario;
    public $senha;
    public $banco;
    public $tabela;
    public $campos; // array
    public $valores; // array
    public $linhas;
    public $camposQuery = null;
    public $valoresQuery = null;
    public $conecta;

    public function __construct() {
        $this->conexao();
    }

    public function conexao() {
        $this->host = "localhost";
        $this->user = "root";
        $this->pass = "";
        $this->banco = "BANCORESERVA";

        $this->conecta = mysqli_connect($this->host, $this->user, $this->pass, $this->banco) or die(mysqli_error());
    }

    private function montaQuery($tipo) {
        $cont = count($this->campos);
        for ($i = 0; $i < $cont; $i++) {
            if ($i < $cont - 1) {
                if ($tipo == 1) {
                    $this->camposQuery .= $this->campos[$i] . ", ";
                    $this->valoresQuery .= "'" . $this->valores[$i] . "', ";
                }
            } else {
                if ($tipo == 1) {
                    $this->camposQuery .= $this->campos[$i];
                    $this->valoresQuery .= "'" . $this->valores[$i] . "'";
                }
            }
        }
    }

    private function montaQueryEditar($tipo) {
        $cont = count($this->campos);
        for ($i = 0; $i < $cont; $i++) {
            if ($i < $cont - 1) {
                if ($tipo == 1) {
                    $this->camposQuery .= $this->campos[$i] . " = '" . $this->valores[$i] . "', ";
                }
            } else {
                if ($tipo == 1) {
                    $this->camposQuery .= $this->campos[$i] . " = '" . $this->valores[$i] . "'";
                }
            }
        }
    }

    public function inserirRegistro() {
        $this->montaQuery(1);
        $this->sql = "INSERT INTO " . $this->tabela . " (" . $this->camposQuery . ") VALUES (" . $this->valoresQuery . ")";
        $this->query = mysqli_query($this->conecta, $this->sql) or die(mysqli_error($this->conecta));
        mysqli_close($this->conecta);

        return $this->result;
    }


}

?>