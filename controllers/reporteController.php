<?php
@session_start();

ob_end_clean();
require('../fpdf/fpdf.php');
require_once '../models/reporteModel.php';

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('../assets/img/logo-nav-bar.jpg',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30,10,'Reporte',1,0,'C');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,date("Y-m-d"));
    $this->Cell(0,10,'Pag '.$this->PageNo());
}
}

$reporte = new reporteModel();
// Creamos una variable la cual se almacenara el valor que retorne la funcion loginModel 
$resultadoReporte = $reporte->reporteModel();

// Instantiate and use the FPDF class 
$pdf = new PDF();


for ($i = 0; $i < count($resultadoReporte); $i++) {
    //Add a new page
    $pdf->AddPage();
    
    // Set the font for the text
    $pdf->SetFont('Arial', 'B', 10);

    // Prints a cell with given text
    $pdf->Cell(80);
    $pdf->Cell(0, 10, 'PEDIDO NO. ' . $i + 1, 0, 1);

    $pdf->Cell(0, 6, 'Cantidad: ' . $resultadoReporte[$i]["cantidad"], 0, 1);
    $pdf->Cell(0, 6, 'Estado Pedido: ' . $resultadoReporte[$i]["estado_pedido"], 0, 1);
    $pdf->Cell(0, 6, 'Metodo Pago: ' . $resultadoReporte[$i]["metodo_pago"], 0, 1);
    $pdf->Cell(0, 6, 'Fecha Pedido: ' . $resultadoReporte[$i]["fecha_pedido"], 0, 1);
    $pdf->Cell(0, 6, 'Direccion: ' . $resultadoReporte[$i]["direccion"], 0, 1);
    $pdf->Cell(0, 6, 'Observaciones: ' . $resultadoReporte[$i]["observaciones"], 0, 1);
    $pdf->Cell(0, 6, 'Descuento: ' . $resultadoReporte[$i]["descuento"], 0, 1);
    $pdf->Cell(0, 6, 'Total: ' . $resultadoReporte[$i]["total"], 0, 1);
    $pdf->Cell(0, 6, 'Nombre: ' . $resultadoReporte[$i]["nombre"], 0, 1);
    $pdf->Cell(0, 6, 'Precio Unidad: ' . $resultadoReporte[$i]["precio_unitario"], 0, 1);
    //die(var_dump($resultadoReporte[$i]));
}
// return the generated output
$pdf->Output();

exit;

?>