<?php
require_once('../config/config.php');

class Pacientes {
    // paciente_id, nombre, apellido, direccion, telefono

    public function getAllPacientes() {
        try {
            $conexion = new ClaseConectar();
            $conexion = $conexion->ProcedimientoParaConectar();
            $sql = "SELECT * FROM pacientes";
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

    public function getPacienteById($id) {
        try {
            $conexion = new ClaseConectar();
            $conexion = $conexion->ProcedimientoParaConectar();
            $sql = "SELECT * FROM pacientes WHERE paciente_id = $id";
            $result = mysqli_query($conexion, $sql);
            $data = $result->fetch_assoc(); 
            return $data;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function createPaciente($nombre, $apellido, $direccion, $telefono) {
        try {
            $conexion = new ClaseConectar();
            $conexion = $conexion->ProcedimientoParaConectar();
            $sql = "INSERT INTO pacientes (nombre, apellido, direccion, telefono) VALUES ('$nombre', '$apellido', '$direccion', '$telefono')";
            $result = mysqli_query($conexion, $sql);
            return $result;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function updatePaciente($paciente_id, $nombre, $apellido, $direccion, $telefono) {
        try {
            $conexion = new ClaseConectar();
            $conexion = $conexion->ProcedimientoParaConectar();
            $sql = "UPDATE pacientes SET nombre = '$nombre', apellido = '$apellido', direccion = '$direccion', telefono = '$telefono' WHERE paciente_id = $paciente_id";
            $result = mysqli_query($conexion, $sql);
            return $result;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function deletePaciente($paciente_id) {
        try {
            $conexion = new ClaseConectar();
            $conexion = $conexion->ProcedimientoParaConectar();
            $sql = "DELETE FROM Pacientes WHERE paciente_id = $paciente_id";
            $result = mysqli_query($conexion, $sql);
            return $result;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
