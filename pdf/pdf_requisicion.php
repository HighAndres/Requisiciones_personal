<?php
    session_start();
    if (!isset($_SESSION['id_user']) && !isset($_SESSION['rol'])) {
    	header("Location:../index.php");
    }
    require_once('./fpdf/fpdf.php');
    include '../includes/connect.php';

//FECHA Y HORA ACTUAL 
date_default_timezone_set('America/Mexico_City');
setlocale(LC_ALL, 'es_MX');
//CIFRADO
$key = '5973C777%B7673309895AD%FC2BD1962C1062B9?3890FC277A04499¿54D18FC13677';

if (isset($_GET["ref"])){
    $id=$_GET['ref'];
    $datos=$conectar->query("SELECT usuarios.*, solicitudes.*, departamentos.*, 
    dsolic.depto AS depto_solicitudes, 
    departamentos.depto AS depto_user 
    FROM solicitudes 
    INNER JOIN usuarios ON solicitudes.id_user= usuarios.id_user
    INNER JOIN departamentos ON usuarios.departamento_id = departamentos.id_depto 
    INNER JOIN departamentos dsolic ON solicitudes.area_operativa = dsolic.id_depto 
    WHERE MD5(concat('".$key."',id_folio))='".$id."'");
    $areq=$datos->fetch_assoc();
}

class PDF extends FPDF
{
    
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Times','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página '.$this->PageNo().'/{nb}'),0,0,'C');
}
}

   //Creación del objeto de la clase heredada
    $pdf = new PDF('P','mm','Letter');
    $pdf->SetFont('Arial','I',8);

    $pdf->AliasNbPages();
    $pdf ->AddPage();

    //HEADER
    $pdf->Cell(175);
    $pdf->Cell(19,4, utf8_decode('FAT-01-4.3.2'), 0, 0, 'L');
    $pdf->Ln(10);
    $pdf->Image('../img/GrupoWalworth-Registrada.png',10,19,50);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(159);
    $pdf->Cell(13,4,utf8_decode('Fecha: '), 0, 0, 'L');
    $pdf->Cell(22,4,utf8_decode(date('d/m/Y', strtotime($areq['fecha_creacion']))), 0, 1, 'R');
    $pdf->Cell(159);
    $pdf->Cell(13,4,utf8_decode('Hora: '), 0, 0, 'L');
    $pdf->Cell(22,4,utf8_decode(date('H:i', strtotime($areq['fecha_creacion']))), 0, 1, 'R');
    $pdf->Ln(5);
    $pdf->SetTextColor(255,255,255);
    $pdf->SetFillColor(217,32,39);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetFont('Arial','B',14);   
    $pdf->Cell(195,10,utf8_decode('REQUISICIÓN DE PERSONAL'), 0, 0,'C', true);
    $pdf->Ln(20);

    //BODY

    /**NOMBRE**/
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','B',14);   
    $pdf->Cell(28,7,utf8_decode('Solicitante: '), 0, 0,'L');
    $pdf->SetFont('Arial','',13);   
    $pdf->Cell(100,7,utf8_decode($areq['nombre'].' '.$areq['apellidos']), 0, 0,'L');

    /**FOLIO**/
    $pdf->SetFont('Arial','B',14);   
    $pdf->Cell(21);
    $pdf->Cell(21,7,utf8_decode('Folio:'), 0, 0,'L');
    $pdf->SetFont('Arial','',13);   
    $pdf->Cell(25,7,utf8_decode($areq['id_folio']), 0, 0,'R');

    /**PUESTO**/
    $pdf->Ln(7);
    $pdf->SetFont('Arial','B',14);   
    $pdf->Cell(36,7,utf8_decode('Departamento:'), 0, 0,'L');
    $pdf->SetFont('Arial','',13);   
    $pdf->Cell(100,7,utf8_decode($areq['depto_user']), 0, 0,'L');

    /**PUESTO**/
    $pdf->Cell(13);
    $pdf->SetFont('Arial','B',14);   
    $pdf->Cell(21,7,utf8_decode('Estatus:'), 0, 0,'L');
    $pdf->SetFont('Arial','',13);   
    $pdf->Cell(25,7,utf8_decode($areq['estatus']), 0, 0,'R');

    $pdf->Ln(14);

    //PRINCIPAL
    $pdf ->SetFont('Arial','B',13);
    $pdf->SetTextColor(255,255,255);
    $pdf->SetFillColor(117,117,117);
    $pdf->SetDrawColor(224,224,224);
    $pdf ->Cell(98,12,utf8_decode('PRINCIPAL'), 1, 0,'C',true);
    $pdf->Ln(12);

    $pdf->SetTextColor(0,0,0);
    $pdf->SetFillColor(238,238,238);

    $pdf ->SetFont('Arial','B',11);
    $pdf ->Cell(47,8,utf8_decode('Empresa solicitante '), 1, 0,'L',true);
    $pdf ->SetFont('Arial','',11);
    $pdf->Cell (51,8,utf8_decode($areq['empresa_solicitante']),1,1,'R');

    $pdf ->SetFont('Arial','B',11);
    $pdf ->Cell(47,8,utf8_decode('Centro de costos '), 1, 0,'L',true);
    $pdf ->SetFont('Arial','',11);
    $pdf->Cell (51,8,utf8_decode($areq['centro_costos']),1,1,'R');

    $pdf ->SetFont('Arial','B',11);
    $pdf ->Cell(47,8,utf8_decode('Área operativa '), 1, 0,'L',true);
    $pdf ->SetFont('Arial','',11);
    $pdf->Cell (51,8,substr(utf8_decode($areq['depto_solicitudes']),0,25),1,1,'R');

    $pdf ->SetFont('Arial','B',11);
    $pdf ->Cell(47,8,utf8_decode('Tipo de personal '), 1, 0,'L',true);
    $pdf ->SetFont('Arial','',11);
    $pdf->Cell (51,8,utf8_decode($areq['tipo_de_personal']),1,1,'R');

    $pdf ->SetFont('Arial','B',11);
    $pdf ->Cell(47,8,utf8_decode('Puesto solicitado '), 1, 0,'L',true);
    $pdf ->SetFont('Arial','',11);
    $pdf->Cell (51,8,utf8_decode($areq['puesto_solicitado']),1,1,'R');

    $pdf ->SetFont('Arial','B',11);
    $pdf ->Cell(47,8,utf8_decode('Personas requeridas '), 1, 0,'L',true);
    $pdf ->SetFont('Arial','',11);
    $pdf->Cell (51,8,utf8_decode($areq['personas_requeridas']),1,1,'R');

    $pdf ->SetFont('Arial','B',11);
    $pdf ->Cell(47,8,utf8_decode('Grado de estudios '), 1, 0,'L',true);
    $pdf ->SetFont('Arial','',11);
    $pdf->Cell (51,8,utf8_decode($areq['grado_estudios']),1,1,'R');

    $pdf ->SetFont('Arial','B',11);
    $pdf ->Cell(47,8,utf8_decode('Motivo de la requisición'), 1, 0, 'L', true);
    $pdf ->SetFont('Arial','',11);
    $pdf->Cell(51,8,utf8_decode($areq['motivo_requisicion']),1,1,'R');
    
    $pdf ->SetFont('Arial','B',11);
    $pdf ->Cell(47,8,utf8_decode('Jefe inmediato'), 1, 0, 'L', true);
    $pdf ->SetFont('Arial','',11);
    $pdf->Cell(51,8,substr(utf8_decode($areq['jefe_inmediato']),0,25),1,1,'R');
    
    $pdf ->SetFont('Arial','B',10.5);
    $pdf ->Cell(47,8,utf8_decode('Colaborador a reemplazar'), 1, 0, 'L', true);
    $pdf ->SetFont('Arial','',11);
    $pdf->Cell(51,8,substr(utf8_decode($areq['colaborador_reemplazo']),0,25),1,1,'R');
    
    //SALARIO
    $pdf ->SetFont('Arial','B',13);
    $pdf->SetTextColor(255,255,255);
    $pdf->SetFillColor(117,117,117);
    $pdf->SetDrawColor(224,224,224);
    $pdf->Ln(25);
    $pdf ->Cell(98,12,utf8_decode('SALARIO'), 1, 0,'C',true);
    $pdf->Ln(12);

    $pdf->SetFillColor(238,238,238);
    $pdf->SetTextColor(0,0,0);

    $pdf ->SetFont('Arial','B',11);
    $pdf ->Cell(47,10,utf8_decode('Salario inicial '), 1, 0,'L',true);
    $pdf ->SetFont('Arial','',11);
    $pdf->Cell(51,10,$areq['salario_inicial'],1,1,'R');

    $pdf ->SetFont('Arial','B',11);
    $pdf ->Cell(47,10,utf8_decode('Salario final '), 1, 0,'L',true);
    $pdf ->SetFont('Arial','',11);
    $pdf->Cell(51,10,$areq['salario_final'],1,1,'R');

    //DATOS GENERALES
    $pdf ->SetFont('Arial','B',13);
    $pdf->SetTextColor(255,255,255);
    $pdf->SetFillColor(117,117,117);
    $pdf->SetDrawColor(224,224,224);
    $pdf->SetXY(119,74);    

    $pdf->Cell(85,12,utf8_decode('DATOS GENERALES'), 1, 0,'C',true);

    $pdf->SetFillColor(238,238,238);
    $pdf->SetTextColor(0,0,0);
    
    $pdf->SetXY(119,86);    
    $pdf ->SetFont('Arial','B',11);
    $pdf ->Cell(57,8,utf8_decode('Cotización '), 1, 0,'L',true);
    $pdf ->SetFont('Arial','',11);
    $pdf->Cell(28,8,$areq['cotizacion'],1,1,'R');

    $pdf->SetXY(119,94);    
    $pdf ->SetFont('Arial','B',11);
    $pdf ->Cell(57,8,utf8_decode('Periodo '), 1, 0,'L',true);
    $pdf ->SetFont('Arial','',11);
    $pdf->Cell(28,8,$areq['periodo'],1,1,'R');

    $pdf->SetXY(119,102);    
    $pdf ->SetFont('Arial','B',11);
    $pdf ->Cell(57,8,utf8_decode('Género requerido'), 1, 0,'L',true);
    $pdf ->SetFont('Arial','',11);
    $pdf->Cell(28,8,$areq['genero_requerido'],1,1,'R');

    $pdf->SetXY(119,110);    
    $pdf ->SetFont('Arial','B',11);
    $pdf ->Cell(57,8,utf8_decode('Estado civil '), 1, 0,'L',true);
    $pdf ->SetFont('Arial','',11);
    $pdf->Cell(28,8,$areq['estado_civil'],1,1,'R');

    $pdf->SetXY(119,118);    
    $pdf ->SetFont('Arial','B',11);
    $pdf ->Cell(57,8,utf8_decode('Edad mínima '), 1, 0,'L',true);
    $pdf ->SetFont('Arial','',11);
    $pdf->Cell(28,8,$areq['edad_minima'],1,1,'R');

    $pdf->SetXY(119,126);    
    $pdf ->SetFont('Arial','B',11);
    $pdf ->Cell(57,8,utf8_decode('Edad máxima '), 1, 0,'L',true);
    $pdf ->SetFont('Arial','',11);
    $pdf->Cell(28,8,$areq['edad_maxima'],1,1,'R');

    $pdf->SetXY(119,134);    
    $pdf ->SetFont('Arial','B',11);
    $pdf ->Cell(57,8,utf8_decode('Rolar turno '), 1, 0,'L',true);
    $pdf ->SetFont('Arial','',11);
    $pdf->Cell(28,8,$areq['rolar_turno'],1,1,'R');

    $pdf->SetXY(119,142);    
    $pdf ->SetFont('Arial','B',11);
    $pdf ->Cell(57,8,utf8_decode('Licencia de conducir '), 1, 0,'L',true);    
    $pdf ->SetFont('Arial','',11);
    $pdf->Cell(28,8,$areq['licencia_conducir'],1,1,'R');

    $pdf->SetXY(119,150);    
    $pdf ->SetFont('Arial','B',11);
    $pdf ->Cell(57,8,utf8_decode('Años de experiencia '), 1, 0,'L',true);
    $pdf ->SetFont('Arial','',11);
    $pdf->Cell(28,8,utf8_decode($areq['anios_experiencia']),1,1,'R');

    $pdf->SetXY(119,158);    
    $pdf ->SetFont('Arial','B',10.5);
    $pdf ->Cell(57,8,utf8_decode('Trato con clientes/proveedores '), 1, 0,'L',true);
    $pdf ->SetFont('Arial','',11);
    $pdf->Cell(28,8,$areq['trato_cli_prov'],1,1,'R');

    $pdf->SetXY(119,166);    
    $pdf ->SetFont('Arial','B',11);
    $pdf ->Cell(57,8,utf8_decode('Manejo de personal '), 1, 0,'L',true);
    $pdf ->SetFont('Arial','',11);
    $pdf->Cell(28,8,$areq['manejo_personal'],1,1,'R');

    //JORNADA LABORAL
    $pdf->SetXY(119,189);    
    $pdf->SetTextColor(255,255,255);
    $pdf->SetFillColor(117,117,117);
    $pdf->SetDrawColor(224,224,224);
    $pdf ->SetFont('Arial','B',13);
    $pdf ->Cell(85,12,utf8_decode('JORNADA LABORAL'), 1, 0,'C',true);

    $pdf->SetFillColor(238,238,238);
    $pdf->SetTextColor(0,0,0);

    $pdf->SetXY(119,201);    
    $pdf ->SetFont('Arial','B',11);
    $pdf ->Cell(48,10,utf8_decode('Jornada '), 1, 0,'L',true);
    $pdf ->SetFont('Arial','',11);
    $pdf->Cell(37,10,utf8_decode($areq['jornada']),1,1,'R');

    $pdf->SetXY(119,211);
    $pdf ->SetFont('Arial','B',11);
    $pdf ->Cell(48,10,utf8_decode('Horario inicial '), 1, 0,'L',true);
    $pdf ->SetFont('Arial','',11);
    $pdf->Cell (37,10,date('h:i a', strtotime($areq['horario_inicial'])),1,1,'R');

    $pdf->SetXY(119,221);
    $pdf ->SetFont('Arial','B',11);
    $pdf ->Cell(48,10,utf8_decode('Horario final '), 1, 0,'L',true);
    $pdf ->SetFont('Arial','',11);
    $pdf->Cell (37,10,date('h:i a', strtotime($areq['horario_final'])),1,1,'R');


    //CONOCIMIENTOS
    $pdf->AddPage();
    $pdf->Cell(175);
    $pdf->SetFont('Arial','I',8);
    $pdf->Cell(19,4, utf8_decode('FAT-01-4.3.2'), 0, 0, 'L');
    $pdf->Ln(10);
    $pdf->Image('../img/GrupoWalworth-Registrada.png',10,19,50);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(159);
    $pdf->Cell(13,4,utf8_decode('Fecha: '), 0, 0, 'L');
    $pdf->Cell(22,4,utf8_decode(date('d/m/Y', strtotime($areq['fecha_creacion']))), 0, 1, 'R');
    $pdf->Cell(159);
    $pdf->Cell(13,4,utf8_decode('Hora: '), 0, 0, 'L');
    $pdf->Cell(22,4,utf8_decode(date('H:i', strtotime($areq['fecha_creacion']))), 0, 1, 'R');
    $pdf->Ln(12);
    $pdf->SetX(10);
    $pdf->SetTextColor(255,255,255);
    $pdf->SetFillColor(117,117,117);
    $pdf->SetDrawColor(224,224,224);
    $pdf->SetFont('Arial','B',13);
    $pdf->Cell(195,12,utf8_decode('PRINCIPALES CONOCIMIENTOS'), 1, 0,'C',true);
    $pdf->Ln(12);

    $pdf->SetFillColor(238,238,238);
    $pdf->SetTextColor(0,0,0);

    $pdf->SetX(10);
    $pdf ->SetFont('Arial','B',11);
    $pdf ->Cell(47,10,utf8_decode('Primer conocimiento'), 1, 0,'L',true);
    $pdf ->SetFont('Arial','',11);
    $pdf->Cell(148,10,utf8_decode($areq['conocimiento_1']), 1, 1,'J');

    $pdf->SetX(10);
    $pdf ->SetFont('Arial','B',11);
    $pdf ->Cell(47,10,utf8_decode('Segundo conocimiento'), 1, 0,'L',true);
    $pdf ->SetFont('Arial','',11);
    $pdf->Cell(148,10,utf8_decode($areq['conocimiento_2']),1,1,'J');

    $pdf->SetX(10);
    $pdf ->SetFont('Arial','B',11);
    $pdf ->Cell(47,10,utf8_decode('Tercer conocimiento'), 1, 0,'L',true);
    $pdf ->SetFont('Arial','',11);
    $pdf->Cell (148,10,utf8_decode($areq['conocimiento_3']),1,1,'J');

    $pdf->SetX(10);
    $pdf ->SetFont('Arial','B',11);
    $pdf ->Cell(47,10,utf8_decode('Cuarto conocimiento'), 1, 0,'L',true);
    $pdf ->SetFont('Arial','',11);
    $pdf->Cell (148,10,utf8_decode($areq['conocimiento_4']),1,1,'J');

    $pdf->SetX(10);
    $pdf ->SetFont('Arial','B',11);
    $pdf ->Cell(47,10,utf8_decode('Quinto conocimiento'), 1, 0,'L',true);
    $pdf ->SetFont('Arial','',11);
    $pdf->Cell (148,10,utf8_decode($areq['conocimiento_5']),1,1,'J');

    //COMPETENCIAS
    $pdf->Ln(10);
    $pdf->SetX(10);
    $pdf->SetTextColor(255,255,255);
    $pdf->SetFillColor(117,117,117);
    $pdf->SetDrawColor(224,224,224);
    $pdf ->SetFont('Arial','B',13);
    $pdf ->Cell(195,12,utf8_decode('COMPETENCIAS'), 1, 0,'C',true);

    $pdf->Ln(12);
    $pdf->SetFillColor(238,238,238);
    $pdf->SetTextColor(0,0,0);

    $pdf->SetX(10);
    $pdf ->SetFont('Arial','B',11);
    $pdf ->Cell(47,10,utf8_decode('Primer competencia'), 1, 0,'L',true);
    $pdf ->SetFont('Arial','',11);
    $pdf->Cell (148,10,utf8_decode($areq['competencia_1']),1,1,'J');

    $pdf->SetX(10);
    $pdf ->SetFont('Arial','B',11);
    $pdf ->Cell(47,10,utf8_decode('Segunda competencias'), 1, 0,'L',true);
    $pdf ->SetFont('Arial','',11);
    $pdf->Cell (148,10,utf8_decode($areq['competencia_2']),1,1,'J');

    $pdf->SetX(10);
    $pdf ->SetFont('Arial','B',11);
    $pdf ->Cell(47,10,utf8_decode('Tercer competencia '), 1, 0,'L',true);
    $pdf ->SetFont('Arial','',11);
    $pdf->Cell (148,10,utf8_decode($areq['competencia_3']),1,1,'J');

    $pdf->SetX(10);
    $pdf ->SetFont('Arial','B',11);
    $pdf ->Cell(47,10,utf8_decode('Cuarta competencia'), 1, 0,'L',true);
    $pdf ->SetFont('Arial','',11);
    $pdf->Cell (148,10,utf8_decode($areq['competencia_4']),1,1,'J');

    $pdf->SetX(10);
    $pdf ->SetFont('Arial','B',11);
    $pdf ->Cell(47,10,utf8_decode('Quinta competencia'), 1, 0,'L',true);
    $pdf ->SetFont('Arial','',11);
    $pdf->Cell(148,10,utf8_decode($areq['competencia_5']),1,1,'J');

    //PRINCIPALES ACTIVIDADES
    $pdf->Ln(10);
    $pdf->SetX(10);
    $pdf->SetTextColor(255,255,255);
    $pdf->SetFillColor(117,117,117);
    $pdf->SetDrawColor(224,224,224);
    $pdf ->SetFont('Arial','B',13);
    $pdf ->Cell(195,12,utf8_decode('PRINCIPALES ACTIVIDADES'), 1, 0,'C',true);

    $pdf->Ln(12);
    $pdf->SetFillColor(238,238,238);
    $pdf->SetTextColor(0,0,0);

    $pdf->SetX(10);
    $pdf ->SetFont('Arial','B',11);
    $pdf ->Cell(47,10,utf8_decode('Primer actividad'), 1, 0,'L',true);
    $pdf ->SetFont('Arial','',11);
    $pdf->Cell (148,10,utf8_decode($areq['actividad_1']),1,1,'J');

    $pdf->SetX(10);
    $pdf ->SetFont('Arial','B',11);
    $pdf ->Cell(47,10,utf8_decode('Segunda actividad'), 1, 0,'L',true);
    $pdf ->SetFont('Arial','',11);
    $pdf->Cell (148,10,utf8_decode($areq['actividad_2']),1,1,'J');

    $pdf->SetX(10);
    $pdf ->SetFont('Arial','B',11);
    $pdf ->Cell(47,10,utf8_decode('Tercer actividad'), 1, 0,'L',true);
    $pdf ->SetFont('Arial','',11);
    $pdf->Cell (148,10,utf8_decode($areq['actividad_3']),1,1,'J');

    $pdf->SetX(10);
    $pdf ->SetFont('Arial','B',11);
    $pdf ->Cell(47,10,utf8_decode('Cuarta actividad'), 1, 0,'L',true);
    $pdf ->SetFont('Arial','',11);
    $pdf->Cell (148,10,utf8_decode($areq['actividad_4']),1,1,'J');

    $pdf->SetX(10);
    $pdf ->SetFont('Arial','B',11);
    $pdf ->Cell(47,10,utf8_decode('Quinta actividad'), 1, 0,'L',true);
    $pdf ->SetFont('Arial','',11);
    $pdf->Cell (148,10,utf8_decode($areq['actividad_5']),1,1,'J');

    //SALIDA PDF
    $pdf ->Output('requisicion_'.$id.'.pdf','I');
    $pdf ->Output();
?>
