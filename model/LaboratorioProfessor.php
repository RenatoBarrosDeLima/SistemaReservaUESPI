<?php

require_once 'dao/Banco.php';

class LaboratorioProfessor extends Banco {

    private $codLab;
    private $codProf;
    private $dataEmp;
    private $horaEmp;
    private $status;

    public function setCodLab($codlab) {
        $this->codLab = $codlab;
    }

    public function getCodLab() {
        return $this->codLab;
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

    public function incluirLabProf() {
        $this->tabela = "LAB_PROF";
        $this->campos = array("codLab", "codProf", "dataEmp", "horaEmp", "status");
        $this->valores = array($this->getCodLab(), $this->getCodProf(), $this->getDataEmp(), $this->getHoraEmp(), $this->getStatus());
        $result = $this->inserirRegistro();

        return $result;
    }

}

?>
