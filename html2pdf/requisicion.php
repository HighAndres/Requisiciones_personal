<?php 
ob_start();
include('../includes/connect.php');
session_start();
if (!isset($_SESSION['id_user']) && !isset($_SESSION['rol'])) {
	header("Location:../index.php");
}

//CIFRADO
$key = '5973C777%B7673309895AD%FC2BD1962C1062B9?3890FC277A04499¿54D18FC13677';

if (isset($_GET["refd"])){
    $id=$_GET['refd'];
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

date_default_timezone_set('America/Mexico_City');
setlocale(LC_ALL, 'es_MX');
?>

<style>
    .norma {
        width: 98.5%;
        text-align: right;
    }

    .header {
        width: 100%;
        display: flex;
        height: 30px;
    }

    .header .img {
        width: 100%;
    }

    .header .img img {
        width: 200px;
        height: 39px;
        float: left;
        margin-right: auto;
        margin-left: 7px;
    }

    .header span {
        width: 300px;
        font-size: 13px;
        font-weight: bold;
        text-align: right;
        float: right;
        margin: 5px 0 0 350px;
    }

    .title {
        width: 100%;
        text-align: center;
        margin: 0 0 30px 0;
        background-color: #DA1A22;
        color: white;
        display: flex;
        justify-content: center;
        align-content: center;
    }

    .title h3 {
        padding: 0;
        margin: auto;
    }

    .tab1 {
        width: 100%;
        border: 1px solid red;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    .tab1 tr td {
        padding: 4px;
        font-size: 16px;
    }

    .tab1 span {
        font-size: 16px;
        font-weight: bold;
    }

    .tab2 {
        width: 100%;
        border-collapse: collapse;
        font-size: 14px;
    }

    .left_text {
        text-align: left;
        font-weight: bold;
        width: 25%;
        word-wrap: break-word;
        background-color: rgb(238, 238, 238);
    }

    .right_text {
        text-align: right;
        width: 20%;
        word-wrap: break-word;
    }

    .middle {
        width: 10%;
        background-color: transparent;
        border: none;
    }

    .title_tab {
        width: 45%;
        background: rgb(117, 117, 117);
        color: white;
        font-weight: bold;
        font-size: 16px;
        padding: 10px;
        text-align: center;
        border: none;
    }

    .tab2 tbody tr td {
        border-left: 1px solid #BDBDBD;
        border-right: 1px solid #BDBDBD;
        border-bottom: 1px solid #BDBDBD;
        padding: 5px 4px 5px 3px;
    }

    .border_off {
        border: none;
    }

    .border_right {
        border-top: none;
        border-bottom: none;
        border-left: none;
    }

    .tab3 {
        width: 100%;
        font-size: 14px;
        border-collapse: collapse;
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .tab3 .title_tab3 {
        width: 100%;
        background: rgb(117, 117, 117);
        color: white;
        font-weight: bold;
        font-size: 16px;
        padding: 10px;
        text-align: center;
        border: none;
    }

    .sub {
        width: 25%;
        background-color: red;
        font-size: 14px;
        font-weight: bold;
        padding: 8px 4px 8px 3px;
        background-color: rgb(238, 238, 238);
        border: 1px solid #BDBDBD;
    }

    .descripcion {
        width: 75%;
        background-color: transparent;
        padding: 8px 4px 8px 5px;
        border: 1px solid #BDBDBD;
        word-wrap: break-word;
    }

</style>

<page backtop='20mm' backbottom='0mm' backleft='3mm' backright='3mm' footer='page'>
    <page_header>
        <div class="header">
            <div class="norma">
                <label for=""><i>FAT-01-4.3.2</i></label>
            </div>
            <div class="img">
                <img src="../img/GrupoWalworth-Registrada.png" alt="Grupo Walworth">
                <span>Fecha de creación: <label for="" style=""><?php echo date("d/m/Y",strtotime($areq['fecha_creacion']));?></label></span><br>
                <span>Hora de creación: <label for="" style="margin-left:40px"><?php echo date('H:i', strtotime($areq['fecha_creacion']));?></label></span>
            </div>
        </div>
    </page_header>
    <page_footer>
    </page_footer>

    <div class="title">
        <h3>REQUISICIÓN DE PERSONAL</h3>
    </div>

    <table class="tab1">
        <tbody>
            <tr>
                <td style="width:70%"><span>Solicitante: </span><?php echo mb_convert_case($areq['nombre'], MB_CASE_TITLE, "UTF-8").' '.mb_convert_case($areq['apellidos'], MB_CASE_TITLE, "UTF-8");?></td>
                <td style="width:30%; text-align:right;"><span>Folio: </span><?php echo mb_convert_case($areq['id_folio'], MB_CASE_TITLE, "UTF-8");?></td>
            </tr>
            <tr>
                <td style="width:70%;"><span>Departamento: </span><?php echo $areq['depto_user'];?></td>
                <td style="width:30%; text-align:right;"><span>Estatus: </span><?php echo mb_convert_case($areq['estatus'], MB_CASE_TITLE, "UTF-8");?></td>
            </tr>
        </tbody>
    </table>

    <table class="tab2" style="margin-bottom:50px;">
        <thead>
            <tr>
                <th colspan="2" class="title_tab">PRINCIPAL</th>
                <th colspan="2" class="middle"></th>
                <th colspan="2" class="title_tab">DATOS GENERALES</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="left_text">Empresa solicitante</td>
                <td class="right_text"><?php echo $areq['empresa_solicitante'];?></td>
                <td class="border_right" colspan="2" rowspan="11"></td>
                <td class="left_text">Cotización</td>
                <td class="right_text"><?php echo $areq['cotizacion'];?></td>
            </tr>
            <tr>
                <td class="left_text">Centro de costos</td>
                <td class="right_text"><?php echo $areq['centro_costos'];?></td>
                <td class="left_text">Periodo</td>
                <td class="right_text"><?php echo $areq['periodo'];?></td>
            </tr>
            <tr>
                <td class="left_text">Área operativa</td>
                <td class="right_text"><?php echo $areq['depto_solicitudes'];?></td>
                <td class="left_text">Género requerido</td>
                <td class="right_text"><?php echo $areq['genero_requerido'];?></td>
            </tr>
            <tr>
                <td class="left_text">Tipo de personal</td>
                <td class="right_text"><?php echo $areq['tipo_de_personal'];?></td>
                <td class="left_text">Estado civil</td>
                <td class="right_text"><?php echo $areq['estado_civil'];?></td>
            </tr>
            <tr>
                <td class="left_text">Puesto solicitado</td>
                <td class="right_text"><?php echo $areq['puesto_solicitado'];?></td>
                <td class="left_text">Edad mínima</td>
                <td class="right_text"><?php echo $areq['edad_minima'];?></td>
            </tr>
            <tr>
                <td class="left_text">Personas requeridas</td>
                <td class="right_text"><?php echo $areq['personas_requeridas'];?></td>
                <td class="left_text">Edad máxima</td>
                <td class="right_text"><?php echo $areq['edad_maxima'];?></td>
            </tr>
            <tr>
                <td class="left_text">Grado de estudios</td>
                <td class="right_text"><?php echo $areq['grado_estudios'];?></td>
                <td class="left_text">Rolar turno</td>
                <td class="right_text"><?php echo $areq['rolar_turno'];?></td>
            </tr>
            <tr>
                <td class="left_text">Motivo de la requisición</td>
                <td class="right_text"><?php echo $areq['motivo_requisicion'];?></td>
                <td class="left_text">Licencia de conducir</td>
                <td class="right_text"><?php echo $areq['licencia_conducir'];?></td>
            </tr>
            <tr>
                <td class="left_text">Jefe inmediato:</td>
                <td class="right_text"><?php echo $areq['jefe_inmediato'];?></td>
                <td class="left_text">Años de experiencia</td>
                <td class="right_text"><?php echo $areq['anios_experiencia'];?></td>
            </tr>
            <tr>
                <td class="left_text">Colaborador a reemplazar:</td>
                <td class="right_text"><?php echo $areq['colaborador_reemplazo'];?></td>
                <td class="left_text">Trato con clientes/proveedores</td>
                <td class="right_text"><?php echo $areq['trato_cli_prov'];?></td>
            </tr>
            <tr>
                <td class="border_off">&nbsp;</td>
                <td class="border_off">&nbsp;</td>
                <td class="left_text">Manejo de personal</td>
                <td class="right_text"><?php echo $areq['manejo_personal'];?></td>
            </tr>
        </tbody>
    </table>

    <table class="tab2">
        <thead>
            <tr>
                <th colspan="2" class="title_tab">SALARIO</th>
                <th colspan="2" class="middle"></th>
                <th colspan="2" class="title_tab">JORNADA LABORAL</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="left_text">Salario inicial</td>
                <td class="right_text"><?php echo $areq['salario_inicial'];?></td>
                <td class="border_right" colspan="2" rowspan="3"></td>
                <td class="left_text">Jornada</td>
                <td class="right_text"><?php echo $areq['jornada'];?></td>
            </tr>
            <tr>
                <td class="left_text">Salario final</td>
                <td class="right_text"><?php echo $areq['salario_final'];?></td>
                <td class="left_text">Horario inicial</td>
                <td class="right_text"><?php echo date('h:i a', strtotime($areq['horario_inicial']));?></td>
            </tr>
            <tr>
                <td class="border_off">&nbsp;</td>
                <td class="border_off">&nbsp;</td>
                <td class="left_text">Horario final</td>
                <td class="right_text"><?php echo date('h:i a', strtotime($areq['horario_final']));?></td>
            </tr>
        </tbody>
    </table>

    <div style="page-break-after: always"></div>

    <table class="tab3">
        <thead>
            <tr>
                <th colspan="2" class="title_tab3">PRINCIPALES CONOCIMIENTOS</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="sub">Primer conocimiento</td>
                <td class="descripcion"><?php echo $areq['conocimiento_1'];?></td>
            </tr>
            <tr>
                <td class="sub">Segundo conocimiento</td>
                <td class="descripcion"><?php echo $areq['conocimiento_2'];?></td>
            </tr>
            <tr>
                <td class="sub">Tercer conocimiento</td>
                <td class="descripcion"><?php echo $areq['conocimiento_3'];?></td>
            </tr>
            <tr>
                <td class="sub">Cuarto conocimiento</td>
                <td class="descripcion"><?php echo $areq['conocimiento_4'];?></td>
            </tr>
            <tr>
                <td class="sub">Quinto conocimiento</td>
                <td class="descripcion"><?php echo $areq['conocimiento_5'];?></td>
            </tr>
        </tbody>
    </table>

    <table class="tab3">
        <thead>
            <tr>
                <th colspan="2" class="title_tab3">COMPETENCIAS</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="sub">Primer competencia</td>
                <td class="descripcion"><?php echo $areq['competencia_1'];?></td>
            </tr>
            <tr>
                <td class="sub">Segunda competencia</td>
                <td class="descripcion"><?php echo $areq['competencia_2'];?></td>
            </tr>
            <tr>
                <td class="sub">Tercer competencia</td>
                <td class="descripcion"><?php echo $areq['competencia_3'];?></td>
            </tr>
            <tr>
                <td class="sub">Cuarta competencia</td>
                <td class="descripcion"><?php echo $areq['competencia_4'];?></td>
            </tr>
            <tr>
                <td class="sub">Quinta competencia</td>
                <td class="descripcion"><?php echo $areq['competencia_5'];?></td>
            </tr>
        </tbody>
    </table>

    <table class="tab3">
        <thead>
            <tr>
                <th colspan="2" class="title_tab3">PRINCIPALES ACTIVIDADES</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="sub">Primer actividad</td>
                <td class="descripcion"><?php echo $areq['actividad_1'];?></td>
            </tr>
            <tr>
                <td class="sub">Segunda actividad</td>
                <td class="descripcion"><?php echo $areq['actividad_2'];?></td>
            </tr>
            <tr>
                <td class="sub">Tercer actividad</td>
                <td class="descripcion"><?php echo $areq['actividad_3'];?></td>
            </tr>
            <tr>
                <td class="sub">Cuarta actividad</td>
                <td class="descripcion"><?php echo $areq['actividad_4'];?></td>
            </tr>
            <tr>
                <td class="sub">Quinta actividad</td>
                <td class="descripcion"><?php echo $areq['actividad_5'];?></td>
            </tr>
        </tbody>
    </table>

</page>


<?php 
    error_reporting(E_ALL & ~E_NOTICE);
    ini_set('display_errors', 0);
    ini_set('log_errors', 1);
    require './vendor/autoload.php';
    use Spipu\Html2Pdf\Html2Pdf;
    //Obtener pdf
    $html = ob_get_clean();
    $html2pdf = new Html2Pdf('P','Letter','es','UTF-8');
    $html2pdf->pdf->SetTitle('Requisición');
    $html2pdf->writeHTML($html);
    $html2pdf->output('requisicion_'.$id.'.pdf','I');
    ob_end_clean(); 
?>