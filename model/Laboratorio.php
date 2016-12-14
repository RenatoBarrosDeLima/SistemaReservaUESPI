<?php

require_once 'dao/Banco.php';

class Laboratorio extends Banco {

    private $codLab;
    private $nome;
    private $setor;
    private $sala;
    private $codCoord;

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setSetor($setor) {
        $this->setor = $setor;
    }

    public function getSetor() {
        return $this->setor;
    }

    public function setSala($sala) {
        $this->sala = $sala;
    }

    public function getSala() {
        return $this->sala;
    }

    public function setCoordenacao($coord) {
        $this->codCoord = $coord;
    }

    public function getCoordenacao() {
        return $this->codCoord;
    }

    function incluirLaboratorio() {
        $this->tabela = "LABORATORIO";
        $this->campos = array("nome", "setor", "sala", "codCoord");
        $this->valores = array($this->getNome(), $this->getSetor(), $this->getSala(), $this->getCoordenacao());
        $result = $this->inserirRegistro();

        return $result;
    }

}

?>
