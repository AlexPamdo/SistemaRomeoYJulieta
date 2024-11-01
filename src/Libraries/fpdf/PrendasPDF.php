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
      $this->Cell(5);
      $this->Cell(30, 10, utf8_decode('ID PRENDA'), 1, 0, 'C', 1);
      $this->Cell(40, 10, utf8_decode('DESCRIPCION'), 1, 0, 'C', 1);
      $this->Cell(40, 10, utf8_decode('CATEGORIA'), 1, 0, 'C', 1);
      $this->Cell(30, 10, utf8_decode('TALLA'), 1, 0, 'C', 1);
      $this->Cell(25, 10, utf8_decode('COLECCION'), 1, 0, 'C', 1);
      $this->Cell(25, 10, utf8_decode('COLOR'), 1, 0, 'C', 1);
      $this->Cell(25, 10, utf8_decode('CANTIDAD'), 1, 0, 'C', 1);
      $this->Cell(25, 10, utf8_decode('GENERO'), 1, 0, 'C', 1);
      $this->Cell(30, 10, utf8_decode('PRECIO'), 1, 1, 'C', 1);
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
foreach ($prendaData as $prendas) :
   $pdf->Cell(5);
   $pdf->Cell(30, 10, utf8_decode($prendas['id_prenda']), 1, 0, 'C', 0);
   $pdf->Cell(40, 10, utf8_decode($prendas['nombre_prenda']), 1, 0, 'C', 0);
   $pdf->Cell(40, 10, utf8_decode($prendas['id_categoria']), 1, 0, 'C', 0);
   $pdf->Cell(30, 10, utf8_decode($prendas['id_talla']), 1, 0, 'C', 0);
   $pdf->Cell(25, 10, utf8_decode($prendas['id_coleccion']), 1, 0, 'C', 0);
   $pdf->Cell(25, 10, utf8_decode($prendas['id_color']), 1, 0, 'C', 0);
   $pdf->Cell(25, 10, utf8_decode($prendas['stock']), 1, 0, 'C', 0);
   $pdf->Cell(25, 10, utf8_decode($prendas['id_genero']), 1, 0, 'C', 0);
   $pdf->Cell(30, 10, utf8_decode($prendas['precio_unitario'] . " bs"), 1, 1, 'C', 0);
endforeach;

$pdf->Output('ReporteMateriales.pdf', 'I'); // nombreDescarga, Visor
