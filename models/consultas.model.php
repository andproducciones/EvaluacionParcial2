<?php
require_once('../config/config.php');

class Consultas {
    // consulta_id, paciente_id, medico_id, fecha, motivo_consulta

    public function getAllConsultas() {
        try {
            $conexion = new ClaseConectar();
            $conexion = $conexion->ProcedimientoParaConectar();
            $sql = "SELECT c.consulta_id, c.fecha, c.motivo_consulta, p.nombre AS paciente_nombre, p.apellido AS paciente_apellido, m.nombre AS medico_nombre,c.paciente_id, c.medico_id FROM consultas c INNER JOIN pacientes p ON c.paciente_id = p.paciente_id INNER JOIN medicos m ON c.medico_id = m.medico_id";
            $result = mysqli_query($conexion, $sql);
            $data = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }   
            return $data;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function getConsultaById($id) {
        try {
            $conexion = new ClaseConectar();
            $conexion = $conexion->ProcedimientoParaConectar();
            $sql = "SELECT c.consulta_id, c.fecha, c.motivo_consulta, p.nombre AS paciente_nombre, p.apellido AS paciente_apellido, m.nombre AS medico_nombre,c.paciente_id, c.medico_id FROM consultas c INNER JOIN pacientes p ON c.paciente_id = p.paciente_id INNER JOIN medicos m ON c.medico_id = m.medico_id WHERE consulta_id = $id";
            $result = mysqli_query($conexion, $sql);
            $data = $result->fetch_assoc(); 
            return $data;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function createConsulta($paciente_id, $medico_id, $fecha, $motivo_consulta) {
        try {
            $conexion = new ClaseConectar();
            $conexion = $conexion->ProcedimientoParaConectar();
            $sql = "INSERT INTO consultas (paciente_id, medico_id, fecha, motivo_consulta) VALUES ($paciente_id, $medico_id, '$fecha', '$motivo_consulta')";
            $result = mysqli_query($conexion, $sql);
            return $result;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function updateConsulta($consulta_id, $paciente_id, $medico_id, $fecha, $motivo_consulta) {
        try {
            $conexion = new ClaseConectar();
            $conexion = $conexion->ProcedimientoParaConectar();
            $sql = "UPDATE consultas SET paciente_id = $paciente_id, medico_id = $medico_id, fecha = '$fecha', motivo_consulta = '$motivo_consulta' WHERE consulta_id = $consulta_id";
            $result = mysqli_query($conexion, $sql);
            return $result;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function deleteConsulta($consulta_id) {
        try {
            $conexion = new ClaseConectar();
            $conexion = $conexion->ProcedimientoParaConectar();
            $sql = "DELETE FROM consultas WHERE consulta_id = $consulta_id";
            $result = mysqli_query($conexion, $sql);
            return $result;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
