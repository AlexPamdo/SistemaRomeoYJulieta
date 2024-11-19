<?php

ob_start(); // Iniciar el almacenamiento en búfer de salida
require("src/Libraries/fpdf/fpdf.php");

require_once('src/Model/Database.php');

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
      $this->Cell(45);
      $this->Cell(40, 10, utf8_decode('IDENTIFICADOR'), 1, 0, 'C', 1);
      $this->Cell(40, 10, utf8_decode('NOMBRE MATERIAL'), 1, 0, 'C', 1);
      $this->Cell(40, 10, utf8_decode('TIPO MATERIAL'), 1, 0, 'C', 1);
      $this->Cell(45, 10, utf8_decode('COLOR MATERIAL'), 1, 0, 'C', 1);
      $this->Cell(25, 10, utf8_decode('STOCK'), 1, 0, 'C', 1);
      $this->Cell(25, 10, utf8_decode('MEDIDA'), 1, 1, 'C', 1);

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

// Asumiendo que tienes una conexión PDO para acceder a la base de datos
try {
    $db = new \src\Model\Database(); // Instanciamos la clase Database
    $pdo = $db; // Ahora tienes acceso al PDO a través de $pdo
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

   // Consulta para obtener solo los materiales activos (estado = 0)
   $queryMaterial = "SELECT * FROM almacen WHERE estado = 0";
   $stmtMaterial = $pdo->prepare($queryMaterial);
   $stmtMaterial->execute();
   $materialData = $stmtMaterial->fetchAll(PDO::FETCH_ASSOC);

// Cargar Datos de la Tabla
foreach ($materialData as $material) :


   // Consulta para obtener el nombre del tipo de material
   $queryTipoMaterial = "SELECT tipo_material FROM tipos_materiales WHERE id_tipo_material = ?";
   $stmtTipoMaterial = $pdo->prepare($queryTipoMaterial);
   $stmtTipoMaterial->execute([$material['tipo_material']]);
   $tipoMaterial = $stmtTipoMaterial->fetch(PDO::FETCH_ASSOC);
   $nombreTipoMaterial = $tipoMaterial ? utf8_decode($tipoMaterial['tipo_material']) : utf8_decode($material['tipo_material']);
   
   // Consulta para obtener el nombre del color de material
   $queryColorMaterial = "SELECT color FROM colores WHERE id_color = ?";
   $stmtColorMaterial = $pdo->prepare($queryColorMaterial);
   $stmtColorMaterial->execute([$material['color_material']]);
   $colorMaterial = $stmtColorMaterial->fetch(PDO::FETCH_ASSOC);
   $nombreColorMaterial = $colorMaterial ? utf8_decode($colorMaterial['color']) : utf8_decode($material['color_material']);
   
   $fechaInicio = isset($_GET['fecha_inicio']) ? $_GET['fecha_inicio'] : '1900-01-01';
   $fechaFin = isset($_GET['fecha_fin']) ? $_GET['fecha_fin'] : '2100-12-31';
   $unidadMedida = isset($_GET['unidad_medida']) ? $_GET['unidad_medida'] : null;
   
   if ($unidadMedida) {
       // Consulta con filtros
       $queryMaterial = "SELECT * FROM almacen WHERE unidad_medida = :unidad_medida 
                         AND fecha_registro BETWEEN :fecha_inicio AND :fecha_fin";
       $stmtMaterial = $pdo->prepare($queryMaterial);
       $stmtMaterial->bindParam(':unidad_medida', $unidadMedida, PDO::PARAM_STR);
       $stmtMaterial->bindParam(':fecha_inicio', $fechaInicio, PDO::PARAM_STR);
       $stmtMaterial->bindParam(':fecha_fin', $fechaFin, PDO::PARAM_STR);
       $stmtMaterial->execute();
   
       $materialData = $stmtMaterial->fetchAll(PDO::FETCH_ASSOC);
   } else {
       echo "Unidad de medida no especificada.";
       exit;
   }

   
endforeach;

$pdf->Output('ReporteMateriales.pdf', 'I'); // nombreDescarga, Visor
