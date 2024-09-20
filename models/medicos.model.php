<?php
require_once('../config/config.php');

class Medicos { 
    // medico_id, nombre, especialidad, telefono, email

    public function getAllMedicos() {
        try {
            $conexion = new ClaseConectar();
            $conexion = $conexion->ProcedimientoParaConectar();
            $sql = "SELECT * FROM medicos";
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

    public function getMedicoById($id) {
        try {
            $conexion = new ClaseConectar();
            $conexion = $conexion->ProcedimientoParaConectar();
            $sql = "SELECT * FROM medicos WHERE medico_id = $id";
            $result = mysqli_query($conexion, $sql);
            $data = $result->fetch_assoc(); 
            return $data;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function createMedico($nombre, $especialidad, $telefono, $email) {
        try {
            $conexion = new ClaseConectar();
            $conexion = $conexion->ProcedimientoParaConectar();
            $sql = "INSERT INTO medicos (nombre, especialidad, telefono, email) VALUES ('$nombre', '$especialidad', '$telefono', '$email')";
            $result = mysqli_query($conexion, $sql);
            return $result;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function updateMedico($medico_id, $nombre, $especialidad, $telefono, $email) {
        try {
            $conexion = new ClaseConectar();
            $conexion = $conexion->ProcedimientoParaConectar();
            $sql = "UPDATE medicos SET nombre = '$nombre', especialidad = '$especialidad', telefono = '$telefono', email = '$email' WHERE medico_id = $medico_id";
            $result = mysqli_query($conexion, $sql);
            return $result;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function deleteMedico($medico_id) {
        try {
            $conexion = new ClaseConectar();
            $conexion = $conexion->ProcedimientoParaConectar();
            $sql = "DELETE FROM medicos WHERE medico_id = $medico_id";
            $result = mysqli_query($conexion, $sql);
            return $result;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
