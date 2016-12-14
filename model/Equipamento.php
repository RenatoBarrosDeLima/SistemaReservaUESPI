<?php

require_once 'dao/Banco.php';

class Equipamento extends Banco {

    private $codEqui;
    private $nome;
    private $tombo;
    private $dataAqui;
    private $modelo;
    private $marca;
    private $cor;
    private $codCoord;

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setTombo($tombo) {
        $this->tombo = $tombo;
    }

    public function getTombo() {
        return $this->tombo;
    }

    public function setData($data) {
        $this->dataAqui = $data;
    }

    public function getData() {
        return $this->dataAqui;
    }

    public function setModelo($modelo) {
        $this->modelo = $modelo;
    }

    public function getModelo() {
        return $this->modelo;
    }

    public function setMarca($marca) {
        $this->marca = $marca;
    }

    public function getMarca() {
        return $this->marca;
    }

    public function setCor($cor) {
        $this->cor = $cor;
    }

    public function getCor() {
        return $this->cor;
    }

    public function setCoordenacao($coord) {
        $this->codCoord = $coord;
    }

    public function getCoordenacao() {
        return $this->codCoord;
    }

    function incluirEquip() {
        $this->tabela = "EQUIPAMENTO";
        $this->campos = array("nome", "tombo", "dataAquisicao", "modelo", "marca", "cor", "codCoord");
        $this->valores = array($this->getNome(), $this->getTombo(), $this->getData(), $this->getModelo(), $this->getMarca(), $this->getCor(), $this->getCoordenacao());
        $result = $this->inserirRegistro();

        return $result;
    }

}

?>
