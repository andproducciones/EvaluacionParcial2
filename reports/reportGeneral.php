<?php

	#librerias necesarias #
	require "./code128.php";
    require_once("../models/consultas.model.php");


	$pdf = new PDF_Code128('P','mm','Letter');
	$pdf->SetMargins(17,17,17);
	$pdf->AddPage();

	$Consultas = new Consultas;
//c.consulta_id, c.fecha, c.motivo_consulta, p.nombre AS paciente_nombre, p.apellido AS paciente_apellido, m.nombre AS medico_nombre,c.paciente_id, c.medico_id
	


	$dataconsulta = $Consultas->getConsultaById(7);
	$nombre 	= $dataconsulta['paciente_nombre'];
	$apellido 	= $dataconsulta['paciente_apellido'];
	$medico 	= $dataconsulta['medico_nombre'];
	$fecha  = $dataconsulta['fecha'];
	$motivo = $dataconsulta['motivo_consulta'];

	# Logo de la empresa formato png #
	$pdf->Image('./img/vector.jpg',165,12,35,35,'JPG');

	# Encabezado y datos de la empresa #
	$pdf->SetFont('Arial','B',16);
	$pdf->SetTextColor(32,100,210);
	$pdf->Cell(150,10,iconv("UTF-8", "ISO-8859-1",strtoupper("Reporte General Consultas")),0,0,'L');

	$pdf->Ln(9);

	$pdf->SetFont('Arial','',10);
	$pdf->SetTextColor(39,39,51);
	// $pdf->Cell(150,9,iconv("UTF-8", "ISO-8859-1","Cedula/RUC: ". $res),0,0,'L');
	$pdf->Ln(5);

	// $pdf->Cell(150,9,iconv("UTF-8", "ISO-8859-1","Dirección: " . $res["Direccion"]),0,0,'L');
	$pdf->Ln(5);

	// $pdf->Cell(150,9,iconv("UTF-8", "ISO-8859-1","Teléfono: ". $res["Telefono"]),0,0,'L');
	$pdf->Ln(5);

	// $pdf->Cell(150,9,iconv("UTF-8", "ISO-8859-1","Email: ". $res["Correo"]),0,0,'L');
	$pdf->Ln(6);

	$pdf->SetFont('Arial','',10);
	$pdf->Cell(30,7,iconv("UTF-8", "ISO-8859-1","Fecha de emisión:"),0,0);
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(116,7,iconv("UTF-8", "ISO-8859-1",date("d/m/Y", strtotime("13-09-2024"))." ".date("h:s A")),0,0,'L');
	$pdf->SetFont('Arial','B',10);
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(35,7,iconv("UTF-8", "ISO-8859-1",strtoupper("Ficha Nro. 0000123454")),0,0,'C');

	$pdf->Ln(7);

	$pdf->SetFont('Arial','',10);
	$pdf->Cell(12,7,iconv("UTF-8", "ISO-8859-1",""),0,0,'L');
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(134,7,iconv("UTF-8", "ISO-8859-1",""),0,0,'L');
	$pdf->SetFont('Arial','B',10);
	$pdf->SetTextColor(97,97,97);
	// $pdf->Cell(35,7,iconv("UTF-8", "ISO-8859-1",strtoupper("000000"). $res["idFactura"]),0,0,'C');

	$pdf->Ln(10);

	$pdf->SetFont('Arial','',10);
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(13,7,iconv("UTF-8", "ISO-8859-1","Nombre: ". $nombre),0,0);

	$pdf->Ln(7);

	$pdf->SetFont('Arial','',10);
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(13,7,iconv("UTF-8", "ISO-8859-1","Apellido: ". $apellido),0,0);

	$pdf->Ln(7);

	$pdf->SetFont('Arial','',10);
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(13,7,iconv("UTF-8", "ISO-8859-1","Fecha Nacimiento: ". $medico),0,0);
	
	$pdf->Ln(7);

	$pdf->SetFont('Arial','',10);
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(13,7,iconv("UTF-8", "ISO-8859-1","Fecha Nacimiento: ". $fecha),0,0);

	$pdf->Ln(7);


	$pdf->SetFont('Arial','',10);
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(13,7,iconv("UTF-8", "ISO-8859-1","Grado: ". $motivo),0,0);

	$pdf->Ln(7);


	// # Tabla de productos #
	// $pdf->SetFont('Arial','',8);
	// $pdf->SetFillColor(23,83,201);
	// $pdf->SetDrawColor(23,83,201);
	// $pdf->SetTextColor(255,255,255);
	// $pdf->Cell(90,8,iconv("UTF-8", "ISO-8859-1","Descripción"),1,0,'C',true);
	// $pdf->Cell(15,8,iconv("UTF-8", "ISO-8859-1","Cant."),1,0,'C',true);
	// $pdf->Cell(25,8,iconv("UTF-8", "ISO-8859-1","Precio"),1,0,'C',true);
	// $pdf->Cell(19,8,iconv("UTF-8", "ISO-8859-1","Desc."),1,0,'C',true);
	// $pdf->Cell(32,8,iconv("UTF-8", "ISO-8859-1","Subtotal"),1,0,'C',true);

	// $pdf->Ln(8);

	
	// $pdf->SetTextColor(39,39,51);

	// /*----------  Detalles de la tabla  ----------*/
	// // $pdf->Cell(90,7,iconv("UTF-8", "ISO-8859-1", $respro['Nombre_Producto']),'L',0,'C');
	// $pdf->Cell(15,7,iconv("UTF-8", "ISO-8859-1","10"),'L',0,'C');
	// $pdf->Cell(25,7,iconv("UTF-8", "ISO-8859-1","$10 USD"),'L',0,'C');
	// $pdf->Cell(19,7,iconv("UTF-8", "ISO-8859-1","$0.00 USD"),'L',0,'C');
	// // $pdf->Cell(32,7,iconv("UTF-8", "ISO-8859-1", $res['Sub_total'] ."USD"),'LR',0,'C');
	// $pdf->Ln(7);
	/*----------  Fin Detalles de la tabla  ----------*/


	
	$pdf->SetFont('Arial','B',9);
	
	# Impuestos & totales #
	$pdf->Cell(100,7,iconv("UTF-8", "ISO-8859-1",''),'T',0,'C');
	$pdf->Cell(15,7,iconv("UTF-8", "ISO-8859-1",''),'T',0,'C');
	// $pdf->Cell(32,7,iconv("UTF-8", "ISO-8859-1","SUBTOTAL"),'T',0,'C');
	// $pdf->Cell(34,7,iconv("UTF-8", "ISO-8859-1","+ ".$res['Sub_total'] ."USD"),'T',0,'C');

	$pdf->Ln(7);

	// $pdf->Cell(100,7,iconv("UTF-8", "ISO-8859-1",''),'',0,'C');
	// $pdf->Cell(15,7,iconv("UTF-8", "ISO-8859-1",''),'',0,'C');
	// $pdf->Cell(32,7,iconv("UTF-8", "ISO-8859-1","IVA (15%)"),'',0,'C');
	// // $pdf->Cell(34,7,iconv("UTF-8", "ISO-8859-1","+" .($res['Sub_total']* $res['Valor_IVA'])/100) ."USD",'',0,'C');

	// $pdf->Ln(7);

	// $pdf->Cell(100,7,iconv("UTF-8", "ISO-8859-1",''),'',0,'C');
	// $pdf->Cell(15,7,iconv("UTF-8", "ISO-8859-1",''),'',0,'C');


	// $pdf->Cell(32,7,iconv("UTF-8", "ISO-8859-1","TOTAL A PAGAR"),'T',0,'C');
	// // $pdf->Cell(34,7,iconv("UTF-8", "ISO-8859-1",(($res['Sub_total']* $res['Valor_IVA'])/100) + $res['Sub_total']) ."USD",'T',0,'C');

	// $pdf->Ln(7);

	

	$pdf->Ln(20);


	$pdf->SetFont('Arial','',9);

	$pdf->SetTextColor(39,39,51);
	$pdf->MultiCell(0,9,iconv("UTF-8", "ISO-8859-1","*** Codigo Consulta ***"),0,'C',false);

	$pdf->Ln(10);

	# Codigo de barras #
	$pdf->SetFillColor(39,39,51);
	$pdf->SetDrawColor(23,83,201);
	$pdf->Code128(72,$pdf->GetY(),"COD000001V0001",70,20);
	$pdf->SetXY(12,$pdf->GetY()+21);
	$pdf->SetFont('Arial','',12);
	$pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1","COD000001V0001"),0,'C',false);

	# Nombre del archivo PDF #
	$pdf->Output("I","Ficha_consulta_Nro_04.pdf",true);