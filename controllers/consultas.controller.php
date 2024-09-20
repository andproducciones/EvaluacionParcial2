<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER["REQUEST_METHOD"];
if($method == "OPTIONS") {die();}

require_once('../models/consultas.model.php');

$consultas = new Consultas;

switch ($_GET['op']) {
    case 'getAllConsultas':
        $data = $consultas->getAllConsultas();
        echo json_encode($data);
        break;
    case 'getConsultaById':
        $id = $_POST['consulta_id'];
        $data = $consultas->getConsultaById($id);
        echo json_encode($data);
        break;
    case 'createConsulta':
        $data = $consultas->createConsulta($_POST['paciente_id'], $_POST['medico_id'], $_POST['fecha'], $_POST['motivo_consulta']);
        echo json_encode($data);
        break;
    case 'deleteConsulta':
        $data = $consultas->deleteConsulta($_POST['consulta_id']);
        echo json_encode($data);
        break;
    default:
        echo json_encode(['error' => 'No se ha seleccionado ninguna acción']);
        break;
}
?>
