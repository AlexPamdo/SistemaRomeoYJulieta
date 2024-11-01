<?php

ob_start(); // Iniciar el almacenamiento en búfer de salida
require("src/Libraries/fpdf/fpdf.php");

class PDF extends FPDF
{
   // Cabecera de página
   function Header()
   {
      $this->Image('src/Libraries/fpdf/logo.png', 15, 2, 35); // logo
      $this->SetFont('Arial', 'B', 30);
      $this->SetDrawColor(255, 255, 255);
      $this->Cell(45); 
      $this->SetTextColor(102, 205, 170);
      $this->Cell(190, 15, utf8_decode('Romeo y Julieta'), 0, 1, 'C', 0);
      $this->Ln(7);
      $this->SetTextColor(103);
      
      // Ubicación y Contacto
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(200);
      $this->Cell(96, 10, utf8_decode("Avenida Fraternidad, calle 15, CC Carvajal Plaza, "), 0, 0, '', 0);
      $this->Ln(5);

      // Teléfono
      $this->Cell(178);
      $this->Cell(96, 10, utf8_decode(" Primer Piso Local 5. El Tocuyo Estado Lara +58 412-8507007"), 0, 0, '', 0);
      $this->Ln(5);

      // Correo
      $this->Cell(225);
      $this->Cell(96, 10, utf8_decode("romeoyjulietabycml@gmail.com"), 0, 0, '', 0);
      $this->Ln(5);

      // Título de la Tabla
      $this->SetTextColor(102, 205, 170);
      $this->Cell(85);
      $this->SetFont('Arial', 'B', 15);
      $this->Cell(100, 10, utf8_decode("REPORTE DE MATERIALES"), 0, 1, 'C', 0);
      $this->Ln(7);

      // Encabezado de Tabla
      $this->SetFillColor(102, 205, 170);
      $this->SetTextColor(255, 255, 255);
      $this->SetDrawColor(163, 163, 163);
      $this->SetFont('Arial', 'B', 11);
      $this->Cell(30);
      $this->Cell(30, 10, utf8_decode('ID'), 1, 0, 'C', 1);
      $this->Cell(40, 10, utf8_decode('NOMBRE PRENDA'), 1, 0, 'C', 1);
      $this->Cell(40, 10, utf8_decode('CANTIDAD'), 1, 0, 'C', 1);
      $this->Cell(60, 10, utf8_decode('FECHA DE FABRICACION'), 1, 0, 'C', 1);
      $this->Cell(50, 10, utf8_decode('EMPLEADO'), 1, 1, 'C', 1);
   }

   // Pie de página
   function Footer()
   {
      $this->SetY(-15);
      $this->SetFont('Arial', 'I', 8);
      $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
      
      $this->SetY(-15);
      $this->SetFont('Arial', 'I', 8);
      $hoy = date('d/m/Y');
      $this->Cell(540, 10, utf8_decode($hoy), 0, 0, 'C');
   }
}

// Crear PDF
$pdf = new PDF();
$pdf->AddPage("landscape");
$pdf->AliasNbPages();
$pdf->SetFont('Arial', '', 12);
$pdf->SetDrawColor(163, 163, 163);

// Cargar Datos de la Tabla
foreach ($confeccionesData as $confecciones) :
   $pdf->Cell(30);
   $pdf->Cell(30, 10, utf8_decode($confecciones['id_confeccion']), 1, 0, 'C', 0);
   $pdf->Cell(40, 10, utf8_decode($confecciones['id_prenda']), 1, 0, 'C', 0);
   $pdf->Cell(40, 10, utf8_decode($confecciones['cantidad']), 1, 0, 'C', 0);
   $pdf->Cell(60, 10, utf8_decode($confecciones['fecha_fabricacion']), 1, 0, 'C', 0);
   $pdf->Cell(50, 10, utf8_decode($confecciones['id_empleado']), 1, 0, 'C', 0);
endforeach;

$pdf->Output('ReporteMateriales.pdf', 'I'); // nombreDescarga, Visor
