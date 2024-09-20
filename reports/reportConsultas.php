<?php
require "./code128.php";
require_once("../models/consultas.model.php");

$pdf = new PDF_Code128('P','mm','Letter');
$pdf->SetMargins(17,17,17);
$pdf->AddPage();

$Consultas = new Consultas;
$dataconsultas = $Consultas->getAllConsultas();  // Obtener todas las consultas con detalles de pacientes y médicos

// Configurar encabezado
$pdf->Image('./img/vector.jpg',165,12,35,35,'JPG');
$pdf->SetFont('Arial','B',16);
$pdf->SetTextColor(32,100,210);
$pdf->Cell(150,10,iconv("UTF-8", "ISO-8859-1",strtoupper("Reporte General de Consultas")),0,0,'L');
$pdf->Ln(40);

// Crear tabla con los datos de las consultas
$pdf->SetFont('Arial','B',12);
$pdf->Cell(40,10,'Fecha',1);
$pdf->Cell(50,10,'Paciente',1);
$pdf->Cell(50,10,'Medico',1);
$pdf->Cell(50,10,'Motivo Consulta',1);
$pdf->Ln(10);

$pdf->SetFont('Arial','',10);
foreach ($dataconsultas as $consulta) {
    $pdf->Cell(40,10,iconv("UTF-8", "ISO-8859-1",$consulta['fecha']),1);
    $pdf->Cell(50,10,iconv("UTF-8", "ISO-8859-1",$consulta['paciente_nombre'] . ' ' . $consulta['paciente_apellido']),1);
    $pdf->Cell(50,10,iconv("UTF-8", "ISO-8859-1",$consulta['medico_nombre']),1);
    $pdf->Cell(50,10,iconv("UTF-8", "ISO-8859-1",$consulta['motivo_consulta']),1);
    $pdf->Ln(10);
}

// Salida del PDF
$pdf->Output("I","Reporte_general_consultas.pdf",true);
?>
