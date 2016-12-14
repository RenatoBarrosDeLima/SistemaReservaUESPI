<?php
$DataEmp = $_POST['data'];
$HoraEmp = $_POST['hora'];

$host = "localhost";
$user = "root";
$pass = "";
$banco = "BANCORESERVA";

$conexao = mysqli_connect($host, $user, $pass, $banco) or die(mysqli_error());

function buscaEquipamento($conexao) {

    //$query = "select codEquip, codCoord, nome, marca, tombo, dataAquisicao, modelo, cor from EQUIPAMENTO where codCoord = '" . $_SESSION['Codigo'] . "'";

    $query = "SELECT * FROM EQUIPAMENTO INNER JOIN EQUIP_PROF ON EQUIPAMENTO.codEquip = EQUIP_PROF.codEquip";
    //$query = "SELECT * FROM EQUIPAMENTO INNER JOIN EQUIP_PROF ON EQUIPAMENTO.codEquip = EQUIP_PROF.codEquip WHERE EQUIP_PROF.dataEmp <> '".$_POST['data']."' AND EQUIP_PROF.horaEmp <> '".$_POST['hora']."' AND EQUIPAMENTO.codCoord = '".$_POST['coordenacao']."'";

    $resultado = mysqli_query($conexao, $query);
    $equipamento = array();

    while ($atual = mysqli_fetch_assoc($resultado)) {
        #var_dump($atual);
        array_push($equipamento, $atual);
    }
    return $equipamento;
}

$equipamento = buscaEquipamento($conexao);
?>

<?php
foreach ($equipamento as $equip) :

    if (($equip['dataEmp'] == $_POST['data']) and ( $equip['horaEmp'] == $_POST['hora'])) {
        echo "<script>alert('Equipamento Já Reservado!');
            document.location = '../view/FormularioProfessor/formReservaEquipamento.php'</script>";
    }
    ?>
<?php endforeach; ?>			   
</select>



<?php
require_once("../model/EquipamentoProfessor.php");

class EquipamentoProfessorController {

    private $cadastro;

    public function __construct() {
        $this->cadastro = new EquipamentoProfessor();

        //$acao = $_POST['acao'];
        //if ($acao == "incluir") {
        $this->incluirEq();
        //}
    }

    private function incluirEq() {
        //$this->cadastro->setCod($_POST['matricula']);
        $this->cadastro->setCodEquip($_POST['equipamento']);
        $this->cadastro->setCodProf($_POST['professor']);
        $this->cadastro->setDataEmp($_POST['data']);
        $this->cadastro->setHoraEmp($_POST['hora']);
        $this->cadastro->setStatus($_POST['status']);


        $result = $this->cadastro->incluirEquipProf();
        //if ($result >= 1) {
        // echo "<script>alert('Registro incluído com sucesso!');document.location='../view/cad_cadastro.php'</script>";
        //} else {
        //echo "<script>alert('Erro ao gravar registro!');history.back()</script>";
        //}
        echo "<script>alert('Equipamento Reservado Com Sucesso!');document.location='../view/FormularioProfessor/formProfessorInicio.php'</script>";
    }

}

new EquipamentoProfessorController();
?>
