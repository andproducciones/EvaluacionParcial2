<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER["REQUEST_METHOD"];
if($method == "OPTIONS") {die();}

require_once('../models/medicos.model.php');

$medicos = new Medicos;

switch ($_GET['op']) {
    case 'getAllMedicos':
        $data = $medicos->getAllMedicos();
        echo json_encode($data);
        break;
    case 'getMedicoById':
        $id = $_POST['medico_id'];
        $data = $medicos->getMedicoById($id);
        echo json_encode($data);
        break;
    case 'createMedico':
        $data = $medicos->createMedico($_POST['nombre'], $_POST['especialidad'], $_POST['telefono'], $_POST['email']);
        echo json_encode($data);
        break;
    case 'updateMedico':
        $data = $medicos->updateMedico($_POST['medico_id'], $_POST['nombre'], $_POST['especialidad'], $_POST['telefono'], $_POST['email']);
        echo json_encode($data);
        break;
    case 'deleteMedico':
        $data = $medicos->deleteMedico($_POST['medico_id']);
        echo json_encode($data);
        break;
    default:
        echo json_encode(['error' => 'No se ha seleccionado ninguna acción']);
        break;
}
?>
    