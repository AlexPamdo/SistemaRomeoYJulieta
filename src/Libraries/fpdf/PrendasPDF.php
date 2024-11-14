<?php
ob_start(); // Iniciar el almacenamiento en búfer de salida
require("src/Libraries/fpdf/fpdf.php");

// Crear una instancia de la clase Database para obtener la conexión
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
        $this->Cell(100, 10, utf8_decode("REPORTE DE PEDIDOS DE PRENDAS"), 0, 1, 'C', 0);
        $this->Ln(7);

        // Encabezado de Tabla
        $this->SetFillColor(102, 205, 170);
        $this->SetTextColor(255, 255, 255);
        $this->SetDrawColor(163, 163, 163);
        $this->SetFont('Arial', 'B', 11);
        $this->Cell(40);
        $this->Cell(30, 10, utf8_decode('ID PEDIDO'), 1, 0, 'C', 1);
        $this->Cell(55, 10, utf8_decode('DESCRIPCION'), 1, 0, 'C', 1);
        $this->Cell(40, 10, utf8_decode('FECHA PEDIDO'), 1, 0, 'C', 1);
        $this->Cell(30, 10, utf8_decode('FECHA ESTIMADA'), 1, 0, 'C', 1);
        $this->Cell(25, 10, utf8_decode('ESTADO'), 1, 1, 'C', 1);
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

// Conexión a la base de datos
try {
    $db = new \src\Model\Database(); // Instanciamos la clase Database
    $pdo = $db; // Ahora tienes acceso al PDO a través de $pdo
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

// Obtener las fechas desde la URL (si existen)
$fechaInicio = isset($_GET['fecha_inicio']) ? $_GET['fecha_inicio'] : '';
$fechaFin = isset($_GET['fecha_fin']) ? $_GET['fecha_fin'] : '';

// Construir la consulta según los filtros
$query = "SELECT id_pedido_prenda, desc_pedido_prenda, fecha_pedido_prenda, fecha_estimada, proceso FROM pedidos_prendas WHERE 1=1";

$parametros = [];

if ($fechaInicio && $fechaFin) {
    $query .= " AND fecha_pedido_prenda BETWEEN ? AND ?";
    $parametros[] = $fechaInicio;
    $parametros[] = $fechaFin;
}

// Ejecutar la consulta principal
$stmt = $pdo->prepare($query);
$stmt->execute($parametros);
$entregasData = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Llenar los datos en el PDF
foreach ($entregasData as $entrega) :
    $pdf->Cell(40);
    $pdf->Cell(30, 10, utf8_decode($entrega['id_pedido_prenda']), 1, 0, 'C', 0);
    $pdf->Cell(55, 10, utf8_decode($entrega['desc_pedido_prenda']), 1, 0, 'C', 0);
    $pdf->Cell(40, 10, utf8_decode($entrega['fecha_pedido_prenda']), 1, 0, 'C', 0);
    $pdf->Cell(30, 10, utf8_decode($entrega['fecha_estimada']), 1, 0, 'C', 0);
    
    // Aquí cambiamos la lógica del estado (proceso)
    $estado = $entrega["proceso"] == 0 ? 'En Curso' : ($entrega["proceso"] == 1 ? 'Completado' : 'Cancelado');
    $pdf->Cell(25, 10, utf8_decode($estado), 1, 1, 'C', 0);
endforeach;

// Mostrar el PDF
$pdf->Output('ReporteEntregas.pdf', 'I'); // nombreDescarga, Visor
?>
