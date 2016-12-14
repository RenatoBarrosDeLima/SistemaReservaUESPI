<?php

require_once 'dao/Banco.php';

class EquipamentoProfessor extends Banco {

    private $codEquip;
    private $codProf;
    private $dataEmp;
    private $horaEmp;
    private $status;

    public function setCodEquip($codEq) {
        $this->codEquip = $codEq;
    }

    public function getCodEquip() {
        return $this->codEquip;
    }

    public function setCodProf($codProf) {
        $this->codProf = $codProf;
    }

    public function getCodProf() {
        return $this->codProf;
    }

    public function setDataEmp($dataEmp) {
        $this->dataEmp = $dataEmp;
    }

    public function getDataEmp() {
        return $this->dataEmp;
    }


    public function setHoraEmp($horaEmp) {
        $this->horaEmp = $horaEmp;
    }

    public function getHoraEmp() {
        return $this->horaEmp;
    }

    public function setStatus($stat) {
        $this->status = $stat;
    }

    public function getStatus() {
        return $this->status;
    }

    function incluirEquipProf() {
        $this->tabela = "EQUIP_PROF";
        $this->campos = array("codEquip", "codProf", "dataEmp", "horaEmp", "status");
        $this->valores = array($this->getCodEquip(), $this->getCodProf(), $this->getDataEmp(), $this->getHoraEmp(), $this->getStatus());
        $result = $this->inserirRegistro();

        return $result;
    }

}

?>
