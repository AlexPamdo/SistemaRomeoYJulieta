<?php

ob_start(); // Iniciar el almacenamiento en búfer de salida
require("views/pedidos/fpdf/fpdf.php");

class PDF extends FPDF
{

   // Cabecera de página
   function Header()
   {
      //include_once("config/conexion.php");//llamamos a la conexion BD

      //$consulta_info = $conexion->query(" select *from pedidos ");//traemos datos de la tabla pedidos desde BD

      //$dato_info = $consulta_info->fetch_object();
      $this->Image('views/pedidos/fpdf/logo.png', 15, 2, 35); //logo de la empresa,moverDerecha,moverAbajo,tamañoIMG
      $this->SetFont('Arial', 'B', 30); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->SetDrawColor(255, 255, 255); //colorBorde
      $this->Cell(45); // Movernos a la derecha
      $this->SetTextColor(102, 205, 170); //color
      //creamos una celda o fila
      $this->Cell(200, 15, utf8_decode('Romeo y Julieta'), 0, 1, 'C', 0); // AnchoCelda,AltoCelda,titulo,borde(1-0),saltoLinea(1-0),posicion(L-C-R),ColorFondo(1-0)
      $this->Ln(7); // Salto de línea
      $this->SetTextColor(103); //color

      //Respuesta a la UBICACION
      $this->Cell(220);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(96, 10, utf8_decode("Avenidad Fraternidad, calle 15, CC Carvajal Plaza, Primer Piso Local 5. El Tocuyo Estado Lara"), 0, 0, '', 0);
      $this->Ln(0);

      /* UBICACION */
      $this->Cell(200);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(96, 10, utf8_decode("Ubicación : "), 0, 0, '', 0);
      $this->Ln(5);

      //Respuesta a TELEFONO
      $this->Cell(218);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(96, 10, utf8_decode("+58 412-8507007"), 0, 0, '', 0);
      $this->Ln(0);

      /* TELEFONO */
      $this->Cell(200);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(59, 10, utf8_decode("Teléfono : "), 0, 0, '', 0);
      $this->Ln(5);

      //Respuesta al CORREO
      $this->Cell(215);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(96, 10, utf8_decode("romeoyjulietabycml@gmail.com"), 0, 0, '', 0);
      $this->Ln(0);

      /* COREEO */
      $this->Cell(200);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("Correo : "), 0, 0, '', 0);
      $this->Ln(5);

      //Respuesta a la SUCURSAL
      $this->Cell(218);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(96, 10, utf8_decode("Barquisimeto Edo-Lara"), 0, 0, '', 0);
      $this->Ln(0);

      /* SUCURSAL */
      $this->Cell(200);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("Sucursal : "), 0, 0, '', 0);
      $this->Ln(5);

      //Respuesta RIF
      $this->Cell(209);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("maria apurate"), 0, 0, '', 0);
      $this->Ln(0);

      /* RIF */
      $this->Cell(200);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("RIF : "), 0, 0, '', 0);
      $this->Ln(20);

      /* TITULO DE LA TABLA */
      //color
      $this->SetTextColor(102, 205, 170);
      $this->Cell(85); // mover a la derecha
      $this->SetFont('Arial', 'B', 15);
      $this->Cell(100, 10, utf8_decode("REPORTE DE PEDIDOS "), 0, 1, 'C', 0);
      $this->Ln(7);

      /* CAMPOS DE LA TABLA */
      //color
      $this->SetFillColor(102, 205, 170); //colorFondo
      $this->SetTextColor(255, 255, 255); //colorTexto
      $this->SetDrawColor(163, 163, 163); //colorBorde
      $this->SetFont('Arial', 'B', 11);
      $this->Cell(15, 10, utf8_decode('N°'), 1, 0, 'C', 1); //tamaño de celda, grosor de celda
      $this->Cell(35, 10, utf8_decode('PROVEEDOR'), 1, 0, 'C', 1);
      $this->Cell(25, 10, utf8_decode('FECHA'), 1, 0, 'C', 1);
      $this->Cell(25, 10, utf8_decode('FECHA REAL'), 1, 0, 'C', 1);
      $this->Cell(25, 10, utf8_decode('ESTADO'), 1, 0, 'C', 1);
      $this->Cell(27, 10, utf8_decode('ORDEN'), 1, 0, 'C', 1);
      $this->Cell(20, 10, utf8_decode('CANTIDAD'), 1, 0, 'C', 1);
      $this->Cell(32, 10, utf8_decode('TRANSACCION'), 1, 0, 'C', 1);
      $this->Cell(40, 10, utf8_decode('USUARIO'), 1, 0, 'C', 1);
      $this->Cell(20, 10, utf8_decode('TOTAL'), 1, 1, 'C', 1);
   }

   // Pie de página
   function Footer()
   {
      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C'); //pie de pagina(numero de pagina)

      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, cursiva, tamañoTexto
      $hoy = date('d/m/Y');
      $this->Cell(540, 10, utf8_decode($hoy), 0, 0, 'C'); // pie de pagina(fecha de pagina)
   }
}

//require_once("config/conexion.php");


$pdf = new PDF();
$pdf->AddPage("landscape"); /* aqui entran dos parametros (horientazion,tamaño)V->portrait H->landscape tamaño (A3.A4.A5.letter.legal) */
$pdf->AliasNbPages(); //muestra la pagina / y total de paginas

$i = 0;
$pdf->SetFont('Arial', '', 12);
$pdf->SetDrawColor(163, 163, 163); //colorBorde


//while ($datos_reporte = $consulta_reporte_pedidos->fetch_object()) { }     //

$i = $i + 1;


require_once("model/pedidosModel.php");


$pedidos = new pedidos();
$pedidosData = $pedidos->viewAll();

foreach ($pedidosData as $pedido) :
   /* TABLA */
   $pdf->Cell(15, 10, utf8_decode($pedido["id_pedido"]), 1, 0, 'C', 0);
   $pdf->Cell(35, 10, utf8_decode($pedido["id_proveedor"]), 1, 0, 'C', 0);
   $pdf->Cell(25, 10, utf8_decode($pedido["fecha_pedido"]), 1, 0, 'C', 0);

   if ($pedido['fecha_real'] == "0000-00-00") {
      $pdf->Cell(25, 10, utf8_decode("en proceso"), 1, 0, 'C', 0);
   } else {
      $pdf->Cell(25, 10, utf8_decode($pedido["fecha_real"]), 1, 0, 'C', 0);
   }
   if ($pedido["estado_pedido"]) {
      $pdf->Cell(25, 10, utf8_decode("completo"), 1, 0, 'C', 0);
   } else {
      $pdf->Cell(25, 10, utf8_decode("incompleto"), 1, 0, 'C', 0);
   }

   $pdf->Cell(27, 10, utf8_decode($pedido["id_orden_pedido"]), 1, 0, 'C', 0);
   $pdf->Cell(20, 10, utf8_decode($pedido["cantidad_pedido"]), 1, 0, 'C', 0);
   $pdf->Cell(32, 10, utf8_decode($pedido["id_metodo_pago"]), 1, 0, 'C', 0);
   $pdf->Cell(40, 10, utf8_decode($pedido["id_usuario"]), 1, 0, 'C', 0);
   $pdf->Cell(20, 10, utf8_decode($pedido["total_pedido"] . "bs"), 1, 1, 'C', 0);

endforeach;


$pdf->Output('Prueba2.pdf', 'I');//nombreDescarga, Visor(I->visualizar - D->descargar)