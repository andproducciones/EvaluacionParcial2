<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER["REQUEST_METHOD"];
if($method == "OPTIONS") {die();}

require_once('../models/pacientes.model.php');

$pacientes = new Pacientes;

switch ($_GET['op']) {
    case 'getAllPacientes':
        $data = $pacientes->getAllPacientes();
        echo json_encode($data);
        break;
    case 'createPaciente':
        $data = $pacientes->createPaciente($_POST['nombre'], $_POST['apellido'], $_POST['direccion'], $_POST['telefono']);
        echo json_encode($data);
        break;
    case 'updatePaciente':
        $data = $pacientes->updatePaciente($_POST['paciente_id'], $_POST['nombre'], $_POST['apellido'], $_POST['direccion'], $_POST['telefono']);
        echo json_encode($data);
        break;
    case 'deletePaciente':
        $data = $pacientes->deletePaciente($_POST['paciente_id']);
        echo json_encode($data);
        break;
    case 'getPacienteById':
        $id = $_POST['paciente_id'];
        $data = $pacientes->getPacienteById($id);
        echo json_encode($data);
        break;
    default:
        echo json_encode(['error' => 'No se ha seleccionado ninguna acción']);
        break;
}
?>