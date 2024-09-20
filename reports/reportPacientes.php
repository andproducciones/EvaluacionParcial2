<?php
require "./code128.php";
require_once("../models/pacientes.model.php");

$pdf = new PDF_Code128('P','mm','Letter');
$pdf->SetMargins(17,17,17);
$pdf->AddPage();

$Pacientes = new Pacientes;
$datapacientes = $Pacientes->getAllPacientes();  // Obtener todos los pacientes

// Configurar encabezado
$pdf->Image('./img/vector.jpg',165,12,35,35,'JPG');
$pdf->SetFont('Arial','B',16);
$pdf->SetTextColor(32,100,210);
$pdf->Cell(150,10,iconv("UTF-8", "ISO-8859-1",strtoupper("Reporte General de Pacientes")),0,0,'L');
$pdf->Ln(40);

// Crear tabla con los datos de los pacientes
$pdf->SetFont('Arial','B',12);
$pdf->Cell(55,10,'Nombre',1);
$pdf->Cell(55,10,'Apellido',1);
$pdf->Cell(55,10,'Teléfono',1);
$pdf->Ln(10);

$pdf->SetFont('Arial','',10);
foreach ($datapacientes as $paciente) {
    $pdf->Cell(55,10,iconv("UTF-8", "ISO-8859-1",$paciente['nombre']),1);
    $pdf->Cell(55,10,iconv("UTF-8", "ISO-8859-1",$paciente['apellido']),1);
    $pdf->Cell(55,10,iconv("UTF-8", "ISO-8859-1",$paciente['telefono']),1);
    $pdf->Ln(10);
}

// Salida del PDF
$pdf->Output("I","Reporte_general_pacientes.pdf",true);
?>
