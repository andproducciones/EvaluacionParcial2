<?php
require "./code128.php";
require_once("../models/medicos.model.php");

$pdf = new PDF_Code128('P','mm','Letter');
$pdf->SetMargins(17,17,17);
$pdf->AddPage();

$Medicos = new Medicos;
$datamedicos = $Medicos->getAllMedicos();  // Obtener todos los médicos

// Configurar encabezado
$pdf->Image('./img/vector.jpg',165,12,35,35,'JPG');
$pdf->SetFont('Arial','B',16);
$pdf->SetTextColor(32,100,210);
$pdf->Cell(150,10,iconv("UTF-8", "ISO-8859-1",strtoupper("Reporte General de MEdicos")),0,0,'L');
$pdf->Ln(30);

// Crear tabla con los datos de los médicos
$pdf->SetFont('Arial','B',12);
$pdf->Cell(45,10,'Nombre',1);

$pdf->Cell(45,10,'Especialidad',1);
$pdf->Cell(45,10,'Telefono',1);
$pdf->Cell(45,10,'EMail',1);
$pdf->Ln(10);

$pdf->SetFont('Arial','',10);
foreach ($datamedicos as $medico) {
    $pdf->Cell(45,10,iconv("UTF-8", "ISO-8859-1",$medico['nombre']),1);
    $pdf->Cell(45,10,iconv("UTF-8", "ISO-8859-1",$medico['especialidad']),1);
    $pdf->Cell(45,10,iconv("UTF-8", "ISO-8859-1",$medico['telefono']),1);
    $pdf->Cell(45,10,iconv("UTF-8", "ISO-8859-1",$medico['email']),1);
    $pdf->Ln(10);
}

// Salida del PDF
$pdf->Output("I","Reporte_general_medicos.pdf",true);
?>
