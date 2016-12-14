<?php

require_once 'dao/Banco.php';

class Professor extends Banco {

    private $codProf;
    private $nome;
    private $email;
    private $endereco;
    private $telefone;
    public $senha;
    public $coordenacao;

    public function setCodProf($cod) {
        $this->codProf = $cod;
    }

    public function getCodProf() {
        return $this->codProf;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEndereco($end) {
        $this->endereco = $end;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function setTelefone($tel) {
        $this->telefone = $tel;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setCoordenacao($coord) {
        $this->coordenacao = $coord;
    }

    public function getCoordenacao() {
        return $this->coordenacao;
    }

    function incluir() {
        $this->tabela = "PROFESSOR";
        $this->campos = array("codProf", "nome", "endereco", "telefone", "email", "senha", "codCoord");
        $this->valores = array($this->getCodProf(), $this->getNome(), $this->getEndereco(), $this->getTelefone(), $this->getEmail(), $this->getSenha(), $this->getCoordenacao());
        $result = $this->inserirRegistro();

        return $result;
    }

}

?>
