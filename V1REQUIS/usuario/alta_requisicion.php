<?php
include('../includes/connect.php');
session_start();
if (!isset($_SESSION['id_user']) && !isset($_SESSION['rol'])) {
	header("Location:../index.php");
} else {
    if($_SESSION['rol'] == 4){
        header("Location:../administrador/home_admin.php");
    }
}

$email=$conectar->query("SELECT * FROM usuarios WHERE id_user='".$_SESSION['id_user']."'");
$auser=$email->fetch_assoc();

if(isset($_REQUEST["fecha_creacion"]))    
{
    $id_folio="";
    $u = $auser['id_user'];
    $fecha_creacion=$_REQUEST['fecha_creacion'];
    $empresa_solicitante=$_REQUEST['empresa_solicitante'];
    $centro_costos=$_REQUEST['centro_costos'];
    $area_operativa=mb_convert_case($_REQUEST['area_operativa'],MB_CASE_TITLE, "UTF-8");
    $tipo_de_personal=$_REQUEST['tipo_de_personal'];
    $puesto_solicitado=mb_convert_case($_REQUEST['puesto_solicitado'],MB_CASE_TITLE, "UTF-8");
    $personas_requeridas=$_REQUEST['personas_requeridas'];
    $grado_estudios=$_REQUEST['grado_estudios'];
    $motivo_requisicion=$_REQUEST['motivo_requisicion'];
    $cotizacion=$_REQUEST['cotizacion'];
    $periodo=$_REQUEST['periodo'];
    $salario_inicial=$_REQUEST['salario_inicial'];
    $salario_final=$_REQUEST['salario_final'];
    $genero_requerido=$_REQUEST['genero_requerido'];
    $estado_civil=$_REQUEST['estado_civil'];
    $edad_minima=$_REQUEST['edad_minima'];
    $edad_maxima=$_REQUEST['edad_maxima'];
    $licencia_conducir=$_REQUEST['licencia_conducir'];
    $anios_experiencia=$_REQUEST['anios_experiencia'];
    $rolar_turno=$_REQUEST['rolar_turno'];
    $trato_cli_prov=$_REQUEST['trato_cli_prov'];
    $manejo_personal=$_REQUEST['manejo_personal'];
    $jornada=$_REQUEST['jornada'];
    $horario_inicial=$_REQUEST['horario_inicial'];
    $horario_final=$_REQUEST['horario_final'];
    $conocimiento_1=mb_strtoupper($_REQUEST['conocimiento_1'], 'UTF-8');
    $conocimiento_2=mb_strtoupper($_REQUEST['conocimiento_2'], 'UTF-8');
    $conocimiento_3=mb_strtoupper($_REQUEST['conocimiento_3'], 'UTF-8');
    $conocimiento_4=mb_strtoupper($_REQUEST['conocimiento_4'], 'UTF-8');
    $conocimiento_5=mb_strtoupper($_REQUEST['conocimiento_5'], 'UTF-8');
    $competencia_1=mb_strtoupper($_REQUEST['competencia_1'], 'UTF-8');
    $competencia_2=mb_strtoupper($_REQUEST['competencia_2'], 'UTF-8');
    $competencia_3=mb_strtoupper($_REQUEST['competencia_3'], 'UTF-8');
    $competencia_4=mb_strtoupper($_REQUEST['competencia_4'], 'UTF-8');
    $competencia_5=mb_strtoupper($_REQUEST['competencia_5'], 'UTF-8');
    $actividad_1=mb_strtoupper($_REQUEST['actividad_1'], 'UTF-8');
    $actividad_2=mb_strtoupper($_REQUEST['actividad_2'], 'UTF-8');
    $actividad_3=mb_strtoupper($_REQUEST['actividad_3'], 'UTF-8');
    $actividad_4=mb_strtoupper($_REQUEST['actividad_4'], 'UTF-8');
    $actividad_5=mb_strtoupper($_REQUEST['actividad_5'], 'UTF-8');
    
    $fecha_creacion = strtotime('NOW');
    $fecha_creacion = date('Y-m-d H:i:s',$fecha_creacion);
    
 sleep(3);
if(
 $conectar->query ("INSERT INTO solicitudes
 VALUES(NULL,'$u','$fecha_creacion', '$empresa_solicitante', '$centro_costos', '$area_operativa', '$tipo_de_personal', '$puesto_solicitado', '$personas_requeridas', '$grado_estudios', '$motivo_requisicion', '$cotizacion', '$periodo', '$salario_inicial', '$salario_final', '$genero_requerido', '$estado_civil', '$edad_minima', '$edad_maxima', '$licencia_conducir', '$anios_experiencia', '$rolar_turno', '$trato_cli_prov', '$manejo_personal', '$jornada', '$horario_inicial', '$horario_final', '$conocimiento_1', '$conocimiento_2', '$conocimiento_3', '$conocimiento_4', '$conocimiento_5', '$competencia_1',  '$competencia_2', '$competencia_3', '$competencia_4', '$competencia_5', '$actividad_1', '$actividad_2', '$actividad_3', '$actividad_4', '$actividad_5', default)"))
{
        $id = mysqli_insert_id($conectar);
        $_SESSION['success'] = 'toastr.success("¡Solicitud registrada!", "Éxito",{ "progressBar": true, "positionClass": "toast-top-center","hideMethod": "slideUp","extendedTimeOut": "500"})';
        header( "Location: enviar.php?id_folio=".$id."" );
        exit();
        mysql_close( $link );
    
} else {
        $_SESSION['error']='toastr.error("Hubo un error al registrar tu solicitud, inténtalo de nuevo", "Atención",{  "closeButton": true,"progressBar": true,"positionClass": "toast-top-center", "timeOut": "7000","hideMethod": "slideUp","extendedTimeOut": "500"})';
        header("Location:home.php");
        exit();
}
}

date_default_timezone_set('America/Mexico_City');
setlocale(LC_ALL, 'es_MX');
?>

<!DOCTYPE HTML>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Agregar Requisición</title>
    <style>
        .select2-selection.select2-selection--single {
            height: 35px !important;
            font-size: 16px !important;
            padding: 5px 10px !important;
            line-height: 0 !important;
        }

        .select2-selection.select2-selection--single:focus {
            color: #495057 !important;
            background-color: #fff !important;
            border-color: #80bdff !important;
            outline: 0 !important;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, .25) !important;
        }

        .select2-selection.select2-selection--single:active {
            color: #495057 !important;
            background-color: #fff !important;
            border-color: #80bdff !important;
            outline: 0 !important;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, .25) !important;
        }

    </style>
    <?php include('../includes/head_links.php'); ?>
</head>

<body>
    <?php include('../includes/head.php');?>

    <div class="modal fade" id="exit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle" style="font-size:17px">ATENCIÓN</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <center>
                        <label for="" style="font-size:18px"><strong>Estás a punto de salir al menú principal.<br>¿Deseas continuar?</strong></label><br><br>
                        <label for="">Si sales se perderá la información registrada en la requisición.</label>
                    </center>
                </div>
                <div class="modal-footer">
                    <a href="home.php" type="submit" name="editar" class="btn btn-success" style="margin-right:auto">Aceptar</a>
                    <button type="button" class="btn btn-danger clear" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container box">
        <div class="head_add">
            <div class="add">
                <h3>Generar requisición</h3><br />
            </div>
            <div class="back">
                <a href="#" data-toggle="modal" data-target="#exit" class="btn btn-light btn-lg inicio"><i class="fas fa-home"></i></a>
            </div>
        </div>

        <form method="post" id="register_form" class="needs-validation" novalidate>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active_tab1" style="border:1px solid #ccc" href="#principal_requi" data-toggle="tab" role="tab" aria-controls="principal" id="list_principal_requi">Principal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link inactive_tab1" style="border:1px solid #ccc" data-toggle="tab" role="tab" aria-controls="salarios" id="list_salarios_requi">Salarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link inactive_tab1" style="border:1px solid #ccc" data-toggle="tab" role="tab" aria-controls="datos_generales" id="list_datos_generales">Datos Generales</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link inactive_tab1" data-toggle="tab" role="tab" aria-controls="jornada_laboral" id="list_jornada_laboral" style="border:1px solid #ccc">Jornada Laboral</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link inactive_tab1" data-toggle="tab" role="tab" aria-controls="principales_conocimientos" id="list_conocimientos" style="border:1px solid #ccc">Principales Conocimientos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link inactive_tab1" data-toggle="tab" role="tab" aria-controls="competencias" id="list_competencias_requi" style="border:1px solid #ccc">Competencias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link inactive_tab1" data-toggle="tab" role="tab" aria-controls="principales_actividades" id="list_actividades" style="border:1px solid #ccc">Principales Actividades</a>
                </li>
            </ul>

            <div class="tab-content" style="margin-top:16px;">
                <!-- PRINCIPAL -->
                <div class="tab-pane active" id="principal_requi" role="tabpanel" aria-labelledby="principal-tab">
                    <div class="card">
                        <div class="card-header">Ingresa los datos solicitados</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6" style="padding-left:35px; padding-top:10px">
                                    <div class="form-group">
                                        <label>Fecha:</label>
                                        <input type="" name="fecha_creacion" id="fecha_creacion" class="form-control" value="<?=date('d/m/Y')?>" style="width:80%" readonly="readonly" />
                                    </div>
                                    <div class="form-group">
                                        <label>Empresa solicitante:</label>
                                        <select class="form-control" name="empresa_solicitante" id="empresa_solicitante" style="cursor:pointer; width:80%;">
                                            <option value="" selected disabled>Selecciona una opción...</option>
                                            <option value="AXONE">AXONE</option>
                                            <option value="BIAS">BIAS</option>
                                            <option value="WALWORTH">WALWORTH</option>
                                        </select>
                                        <span id="error_empresa_solicitante" class="text-danger"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Centro de costos:</label>
                                        <input type="number" name="centro_costos" id="centro_costos" class="form-control" style="width:80%" onkeypress="return validaNumericos(event)" min="1">
                                        <span id="error_centro_costos" class="text-danger"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Área operativa:</label> <br>
                                        <select name="area_operativa" class="selectpicker area" id="area_operativa" style="width:80%; border: 1px solid #ced4da;">
                                            <option value="" selected>Selecciona una opción...</option>
                                            <?php 
                                            $deptos=$conectar->query("SELECT * FROM departamentos ORDER BY tipo_depto ASC, depto ASC");
                                                while($fila = mysqli_fetch_assoc($deptos)) {
                                                    $groups[$fila['tipo_depto']][$fila['id_depto']] = $fila['depto'];
                                                }?>
                                            <?php foreach($groups as $label => $opt){ ?>
                                            <optgroup label="<?php echo $label; ?>">
                                                <?php foreach ($opt as $id => $name){ ?>
                                                <?php echo "<option value=\"$id\">".$name."</option>";?>
                                                <?php } ?>
                                            </optgroup>
                                            <?php } ?>
                                        </select><br>
                                        <span id="error_area_operativa" class="text-danger"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Tipo de personal:</label>
                                        <select class="form-control" name="tipo_de_personal" id="tipo_de_personal" style="cursor:pointer; width:80%;">
                                            <option value="" selected disabled>Selecciona una opción...</option>
                                            <option value="Administrativo">Administrativo</option>
                                            <option value="Sindicalizado">Sindicalizado</option>
                                        </select>
                                        <span id="error_tipo_de_personal" class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-sm-6" style="padding-left:35px; padding-top:10px">
                                    <div class="form-group">
                                        <label>Hora:</label>
                                        <input type="" name="fecha_creacion" class="form-control" value="<?= date('H:i');?>" style="width:80%" readonly="readonly" />
                                    </div>
                                    <div class="form-group">
                                        <label>Puesto solicitado:</label>
                                        <input type="text" name="puesto_solicitado" id="puesto_solicitado" class="form-control" style="width:80%" maxlength="20">
                                        <span id="error_puesto_solicitado" class="text-danger"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Número de personas requeridas:</label>
                                        <input type="number" name="personas_requeridas" id="personas_requeridas" class="form-control" style="width:80%" onkeypress="return validaNumericos(event)">
                                        <span id="error_personas_requeridas" class="text-danger"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Último grado de estudios:</label>
                                        <select class="form-control" name="grado_estudios" id="grado_estudios" style="cursor:pointer; width:80%;" required>
                                            <option value="" selected disabled>Selecciona una opción...</option>
                                            <option value="Bachillerato">Bachillerato</option>
                                            <option value="Licenciatura/Ingeniería">Licenciatura/Ingeniería</option>
                                            <option value="Secundaria">Secundaria</option>
                                        </select>
                                        <span id="error_grado_estudios" class="text-danger"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Motivo de la requisición:</label>
                                        <select class="form-control" name="motivo_requisicion" id="motivo_requisicion" style="cursor:pointer; width:80%;">
                                            <option value="" selected disabled>Selecciona una opción...</option>
                                            <option value="Baja/Renuncia">Baja/Renuncia</option>
                                            <option value="Incremento de Actividad">Incremento de Actividad</option>
                                            <option value="Promoción Interna">Promoción interna</option>
                                            <option value="Puesto de Nueva Creación">Puesto de nueva creación</option>
                                        </select>
                                        <span id="error_motivo_requisicion" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <br />
                            <div align="center">
                                <button type="button" name="btn_principal_requi" id="btn_principal_requi" class="btn btn-primary btn-lg">Siguiente</button>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>

                <!-- SALARIOS-->
                <div class="tab-pane" id="salarios_requi" role="tabpanel" aria-labelledby="salarios-tab">
                    <div class="card">
                        <div class="card-header">Ingresa los datos solicitados</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6" style="padding-left:35px; padding-top:10px">
                                    <div class="form-group">
                                        <label for="">De:</label><br>
                                        <div class="input-group" style="width:80%">
                                            <div class="input-group-prepend">
                                                <button tabindex="0" class="btn btn-sm btn-dark" type="button" data-toggle="popover" data-trigger="focus" title="Salario" data-content="En el salario solo se podrán ingresar números.<br>Las cifras se separarán automáticamente, con un máximo de 6 enteros y 2 decimales ($999,999.99)."><i class="fas fa-info-circle"></i></button>
                                            </div>
                                            <input type="text" name="salario_inicial" id="salario_inicial" class="form-control salario" onkeypress="return filterFloat(event,this)" onchange="MASK(this,this.value,'-$##,###,##0.00',1)" placeholder="Ej. 10000.99">
                                            <div class="input-group-append">
                                                <button class="btn btn-sm btn-danger clear" type="button" title="Borrar"><i class="fas fa-backspace"></i></button>
                                            </div>
                                        </div>
                                        <span id="error_salario_inicial" class="text-danger"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Cotización:</label>
                                        <select class="form-control" name="cotizacion" id="cotizacion" style="cursor:pointer; width:80%;">
                                            <option value="" selected disabled>Selecciona una opción...</option>
                                            <option value="Neto">Neto</option>
                                            <option value="Bruta">Bruta</option>
                                        </select>
                                        <span id="error_cotizacion" class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-sm-6" style="padding-left:35px; padding-top:10px">
                                    <div class="form-group">
                                        <label for="">Hasta</label><br>
                                        <div class="input-group" style="width:80%">
                                            <div class="input-group-prepend">
                                                <button tabindex="0" class="btn btn-sm btn-dark" type="button" data-toggle="popover" data-trigger="focus" title="Salario" data-content="En el salario solo se podrán ingresar números.<br>Las cifras se separarán automáticamente, con un máximo de 6 enteros y 2 decimales ($999,999.99)."><i class="fas fa-info-circle"></i></button>
                                            </div>
                                            <input type="text" name="salario_final" id="salario_final" class="form-control salario" onkeypress="return filterFloat(event,this)" onchange="MASK(this,this.value,'-$##,###,##0.00',1)" placeholder="Ej. 10000.99" maxlength="9">
                                            <div class="input-group-append">
                                                <button class="btn btn-sm btn-danger clear2" type="button" title="Borrar"><i class="fas fa-backspace"></i></button>
                                            </div>
                                        </div>
                                        <span id="error_salario_final" class="text-danger"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Periodo:</label>
                                        <select class="form-control" name="periodo" id="periodo" style="cursor:pointer; width:80%;">
                                            <option value="" selected disabled>Selecciona una opción...</option>
                                            <option value="Mensual">Mensual</option>
                                            <option value="Semanal">Semanal</option>
                                        </select>
                                        <span id="error_periodo" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <br />
                            <br />
                            <div align="center">
                                <button type="button" name="previous_btn_personal_details" id="previous_btn_salarios_requi" class="btn btn-secondary btn-lg mr-2">Anterior</button>
                                <button type="button" name="btn_salarios_requi" id="btn_salarios_requi" class="btn btn-primary btn-lg">Siguiente</button>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>

                <!-- DATOS GENERALES -->
                <div class="tab-pane" id="datos_generales" role="tabpanel" aria-labelledby="datos_generales-tab">
                    <div class="card">
                        <div class="card-header">Ingresa los datos solicitados</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6" style="padding-left:35px; padding-top:10px">
                                    <div class="form-group">
                                        <label>Género requerido:</label><br>
                                        <select class="form-control" name="genero_requerido" id="genero_requerido" style="cursor:pointer; width:80%;">
                                            <option value="" selected disabled>Selecciona una opción...</option>
                                            <option value="Masculino">Masculino</option>
                                            <option value="Femenino">Femenino</option>
                                            <option value="Indistinto">Indistinto</option>
                                        </select>
                                        <span id="error_genero_requerido" class="text-danger"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Estado civil:</label>
                                        <select class="form-control" name="estado_civil" id="estado_civil" style="cursor:pointer; width:80%;">
                                            <option value="" selected disabled>Selecciona una opción...</option>
                                            <option value="Soltero/a">Soltero/a</option>
                                            <option value="Casado/a">Casado/a</option>
                                            <option value="Indistinto">Indistinto</option>
                                        </select>
                                        <span id="error_estado_civil" class="text-danger"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Edad mínima:</label>
                                        <input type="number" name="edad_minima" id="edad_minima" class="form-control" style="width:80%" min="18" max="75">
                                        <span id="error_edad_minima" class="text-danger"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Edad máxima:</label>
                                        <input type="number" name="edad_maxima" id="edad_maxima" class="form-control" style="width:80%" min="18" max="75">
                                        <span id="error_edad_maxima" class="text-danger"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Licencia de conducir:</label>
                                        <select class="form-control" name="licencia_conducir" id="licencia_conducir" style="cursor:pointer; width: 80%;">
                                            <option value="" selected disabled>Selecciona una opción...</option>
                                            <option value="Estatal">Estatal</option>
                                            <option value="Federal">Federal</option>
                                            <option value="Particular">Particular</option>
                                            <option value="Otra">Otra</option>
                                        </select>
                                        <span id="error_licencia_conducir" class="text-danger"></span>
                                    </div>
                                </div><!-- COLSPAN 6 -->
                                <div class="col-sm-6" style="padding-left:35px; padding-top:10px">
                                    <div class="form-group">
                                        <label>Años de experiencia:</label>
                                        <select class="form-control" name="anios_experiencia" id="anios_experiencia" style="cursor:pointer; width: 80%;">
                                            <option value="" selected disabled>Selecciona una opción...</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="Más de 5">Más de 5</option>
                                        </select>
                                        <span id="error_anios_experiencia" class="text-danger"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Rolar turnos:</label><br>
                                        <select class="form-control" name="rolar_turno" id="rolar_turno" style="cursor:pointer; width: 80%;">
                                            <option value="" selected disabled>Selecciona una opción...</option>
                                            <option value="Si">Si</option>
                                            <option value="No">No</option>
                                        </select>
                                        <span id="error_rolar_turno" class="text-danger"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Trato con clientes o proveedores:</label><br>
                                        <select class="form-control" name="trato_cli_prov" id="trato_cli_prov" style="cursor:pointer; width: 80%;">
                                            <option value="" selected disabled>Selecciona una opción...</option>
                                            <option value="Si">Si</option>
                                            <option value="No">No</option>
                                        </select>
                                        <span id="error_trato_cli_prov" class="text-danger"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Manejo de personal:</label><br>
                                        <select class="form-control" name="manejo_personal" id="manejo_personal" style="cursor:pointer; width: 80%;">
                                            <option value="" selected disabled>Selecciona una opción...</option>
                                            <option value="Si">Si</option>
                                            <option value="No">No</option>
                                        </select>
                                        <span id="error_manejo_personal" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <br />
                            <div align="center">
                                <button type="button" name="previous_btn_datos_generales" id="previous_btn_datos_generales" class="btn btn-secondary btn-lg">Anterior</button>
                                <button type="button" name="btn_datos_generales" id="btn_datos_generales" class="btn btn-primary btn-lg">Siguiente</button>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>

                <!-- JORNADA LABORAL-->
                <div class="tab-pane" id="jornada_laboral" role="tabpanel" aria-labelledby="jornada_laboral-tab">
                    <div class="card">
                        <div class="card-header">Ingresa los datos solicitados</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-11" style="padding-left:35px; padding-top:10px">
                                    <div class="form-group">
                                        <label>Jornada:</label>
                                        <select class="form-control" name="jornada" id="jornada" style="cursor:pointer; width: 41%;">
                                            <option value="" selected disabled>Selecciona una opción...</option>
                                            <option value="Lunes a Viernes">Lunes a Viernes</option>
                                            <option value="Lunes a Sábado">Lunes a Sábado</option>
                                        </select>
                                        <span id="error_jornada" class="text-danger"></span>
                                    </div>
                                    <hr class="col-xs-12">
                                </div>
                                <div class="col-sm-6" style="padding-left:35px; padding-top:10px">
                                    <div class="form-group">
                                        <label><b>Horario</b></label>
                                    </div>
                                    <div class="form-group">
                                        <label>Horario inicial:</label>
                                        <input type="time" name="horario_inicial" id="horario_inicial" class="form-control" style="width:80%" />
                                        <span id="error_horario_inicial" class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-sm-6" style="padding-left:35px; padding-top:10px">
                                    <div class="form-group">
                                        <label>&nbsp;</label>
                                    </div>
                                    <div class="form-group">
                                        <label>Horario final:</label>
                                        <input type="time" name="horario_final" id="horario_final" class="form-control" style="width:80%" />
                                        <span id="error_horario_final" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div align="center">
                                <button type="button" name="previous_btn_jornada_laboral" id="previous_btn_jornada_laboral" class="btn btn-secondary btn-lg">Anterior</button>
                                <button type="button" name="btn_jornada_laboral" id="btn_jornada_laboral" class="btn btn-primary btn-lg">Siguiente</button>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>

                <!-- PRINCIPALES CONOCIMIENTOS-->
                <div class="tab-pane" id="conocimientos" role="tabpanel" aria-labelledby="principales_conocimientos-tab">
                    <div class="card">
                        <div class="card-header">Ingresa los principales conocimientos</div>
                        <div class="card-body" style="padding:40px 40px 0px 40px">
                            <div class="form-group">
                                <label>Primer conocimiento:</label><br>
                                <input type="text" name="conocimiento_1" id="conocimiento_1" class="form-control" style="width:95%" maxlength="55" placeholder="Máximo 55 caracteres">
                                <span id="error_conocimiento_1" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label>Segundo conocimiento:</label><br>
                                <input type="text" name="conocimiento_2" id="conocimiento_2" class="form-control" style="width:95%" maxlength="55" placeholder="Máximo 55 caracteres">
                                <span id="error_conocimiento_2" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label>Tercer conocimiento:</label><br>
                                <input type="text" name="conocimiento_3" id="conocimiento_3" class="form-control" style="width:95%" maxlength="55" placeholder="Máximo 55 caracteres">
                                <span id="error_conocimiento_3" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label>Cuarto conocimiento:</label><br>
                                <input type="text" name="conocimiento_4" id="conocimiento_4" class="form-control" style="width:95%" maxlength="55" placeholder="Máximo 55 caracteres">
                                <span id="error_conocimiento_4" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label>Quinto conocimiento:</label><br>
                                <input type="text" name="conocimiento_5" id="conocimiento_5" class="form-control" style="width:95%" maxlength="55" placeholder="Máximo 55 caracteres">
                                <span id="error_conocimiento_5" class="text-danger"></span>
                            </div>
                            <br />
                            <div align="center">
                                <button type="button" name="previous_btn_conocimientos" id="previous_btn_conocimientos" class="btn btn-secondary btn-lg">Anterior</button>
                                <button type="button" name="btn_conocimientos" id="btn_conocimientos" class="btn btn-primary btn-lg">Siguiente</button>
                            </div>
                        </div>
                        <br>
                    </div>
                    <br>
                </div>

                <!-- COMPETENCIAS -->
                <div class="tab-pane" id="competencias_requi" role="tabpanel" aria-labelledby="competencias-tab">
                    <div class="card">
                        <div class="card-header">Ingresa las competencias</div>
                        <div class="card-body" style="padding:40px 40px 0px 40px">
                            <div class="form-group">
                                <label>Primer competencia:</label><br>
                                <input type="text" name="competencia_1" id="competencia_1" class="form-control" style="width:95%" maxlength="55" placeholder="Máximo 55 caracteres">
                                <span id="error_competencia_1" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label>Segunda competencia:</label><br>
                                <input type="text" name="competencia_2" id="competencia_2" class="form-control" style="width:95%" maxlength="55" placeholder="Máximo 55 caracteres">
                                <span id="error_competencia_2" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label>Tercer competencia:</label><br>
                                <input type="text" name="competencia_3" id="competencia_3" class="form-control" style="width:95%" maxlength="55" placeholder="Máximo 55 caracteres">
                                <span id="error_competencia_3" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label>Cuarta competencia:</label><br>
                                <input type="text" name="competencia_4" id="competencia_4" class="form-control" style="width:95%" maxlength="55" placeholder="Máximo 55 caracteres">
                                <span id="error_competencia_4" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label>Quinta competencia:</label><br>
                                <input type="text" name="competencia_5" id="competencia_5" class="form-control" style="width:95%" maxlength="55" placeholder="Máximo 55 caracteres">
                                <span id="error_competencia_5" class="text-danger"></span>
                            </div>
                            <br />
                            <div align="center">
                                <button type="button" name="previous_btn_competencias_requi" id="previous_btn_competencias_requi" class="btn btn-secondary btn-lg">Anterior</button>
                                <button type="button" name="btn_competencias_requi" id="btn_competencias_requi" class="btn btn-primary btn-lg">Siguiente</button>
                            </div>
                        </div>
                        <br>
                    </div>
                    <br>
                </div>

                <!-- PRINCIPALES ACTIVIDADES-->
                <div class="tab-pane" id="actividades" role="tabpanel" aria-labelledby="principales_actividades-tab">
                    <div class="card">
                        <div class="card-header">Ingresa las principales actividades</div>
                        <div class="card-body" style="padding:40px 40px 0px 40px">
                            <div class="form-group">
                                <label>Primer actividad:</label><br>
                                <input type="text" name="actividad_1" id="actividad_1" class="form-control" style="width:95%" maxlength="55" placeholder="Máximo 55 caracteres">
                                <span id="error_actividad_1" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label>Segunda actividad:</label><br>
                                <input type="text" name="actividad_2" id="actividad_2" class="form-control" style="width:95%" maxlength="55" placeholder="Máximo 55 caracteres">
                                <span id="error_actividad_2" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label>Tercer actividad:</label><br>
                                <input type="text" name="actividad_3" id="actividad_3" class="form-control" style="width:95%" maxlength="55" placeholder="Máximo 55 caracteres">
                                <span id="error_actividad_3" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label>Cuarta actividad:</label><br>
                                <input type="text" name="actividad_4" id="actividad_4" class="form-control" style="width:95%" maxlength="55" placeholder="Máximo 55 caracteres">
                                <span id="error_actividad_4" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label>Quinta actividad:</label><br>
                                <input type="text" name="actividad_5" id="actividad_5" class="form-control" style="width:95%" maxlength="55" placeholder="Máximo 55 caracteres">
                                <span id="error_actividad_5" class="text-danger"></span>
                            </div>
                            <div align="center">
                                <button type="button" name="previous_btn_actividades" id="previous_btn_actividades" class="btn btn-secondary btn-lg">Anterior</button>
                                <!--<button type="button" name="btn_horarios_requi" id="btn_horarios_requi" class="btn btn-info btn-lg">Siguiente</button>-->
                                <button name="btn_actividades" id="btn_actividades" class="btn btn-success btn-lg">Guardar</button>
                            </div>
                        </div>
                        <br>
                    </div>
                    <br>
                </div>
            </div>
        </form>
    </div>

</body>

</html>

<script>
    $(document).ready(function() {

        //PRINCIPAL 
        $('#btn_principal_requi').click(function() {

            var error_empresa_solicitante = '';
            var error_centro_costos = '';
            var error_area_operativa = '';
            var error_tipo_de_personal = '';
            var error_puesto_solicitado = '';
            var error_personas_requeridas = '';
            var error_grado_estudios = '';
            var error_motivo_requisicion = '';

            if ($.trim($('#empresa_solicitante').val()).length == 0) {
                error_empresa_solicitante = 'La empresa solicitante es requerida';
                $('#error_empresa_solicitante').text(error_empresa_solicitante);
                $('#empresa_solicitante').addClass('has-error');
            } else {
                error_empresa_solicitante = '';
                $('#error_empresa_solicitante').text(error_empresa_solicitante);
                $('#empresa_solicitante').removeClass('has-error');
            }

            if ($.trim($('#centro_costos').val()).length == 0) {
                error_centro_costos = 'El centro de costos es requerido';
                $('#error_centro_costos').text(error_centro_costos);
                $('#centro_costos').addClass('has-error');

            } else {
                error_centro_costos = '';
                $('#error_centro_costos').text(error_centro_costos);
                $('#centro_costos').removeClass('has-error');
            }

            if ($.trim($('#area_operativa').val()).length == 0) {
                error_area_operativa = 'El área operativa es requerida';
                $('#error_area_operativa').text(error_area_operativa);
                $('.select2-selection--single').css({
                    "border": "1px solid #cc0000",
                    "backgroundColor": "#ffff99"
                });
            } else {
                error_area_operativa = '';
                $('#error_area_operativa').text(error_area_operativa);
                $('#area_operativa').removeClass('has-error');
                $('.select2-selection--single').css({
                    "border": "1px solid #ced4da",
                    "backgroundColor": "#fff"
                });
            }

            if ($.trim($('#tipo_de_personal').val()).length == 0) {
                error_tipo_de_personal = 'El tipo de personal requerido';
                $('#error_tipo_de_personal').text(error_tipo_de_personal);
                $('#tipo_de_personal').addClass('has-error');
            } else {
                error_area_operativa = '';
                $('#error_tipo_de_personal').text(error_tipo_de_personal);
                $('#tipo_de_personal').removeClass('has-error');
            }

            if ($.trim($('#puesto_solicitado').val()).length == 0) {
                error_puesto_solicitado = 'El puesto solicitado es requerido';
                $('#error_puesto_solicitado').text(error_puesto_solicitado);
                $('#puesto_solicitado').addClass('has-error');
            } else {
                error_puesto_solicitado = '';
                $('#error_puesto_solicitado').text(error_puesto_solicitado);
                $('#puesto_solicitado').removeClass('has-error');
            }

            if ($.trim($('#personas_requeridas').val()).length == 0) {
                error_personas_requeridas = 'El número de personas es requerido';
                $('#error_personas_requeridas').text(error_personas_requeridas);
                $('#personas_requeridas').addClass('has-error');
            } else if (+$('#personas_requeridas').val() < 1) {
                error_personas_requeridas = 'El número de personas requeridas no puede ser menor a 1';
                $('#error_personas_requeridas').text(error_personas_requeridas);
                $('#personas_requeridas').removeClass('has-error');
                $('#personas_requeridas').addClass('has-error');
            } else if (+$('#personas_requeridas').val() > 50) {
                error_personas_requeridas = 'El número de personas requeridas no puede ser mayor a 50';
                $('#error_personas_requeridas').text(error_personas_requeridas);
                $('#personas_requeridas').removeClass('has-error');
                $('#personas_requeridas').addClass('has-error');
            } else {
                error_personas_requeridas = '';
                $('#error_personas_requeridas').text(error_personas_requeridas);
                $('#personas_requeridas').removeClass('has-error');
            }

            if ($.trim($('#grado_estudios').val()).length == 0) {
                error_grado_estudios = 'El grado de estudios es requerido';
                $('#error_grado_estudios').text(error_grado_estudios);
                $('#grado_estudios').addClass('has-error');
            } else {
                error_grado_estudios = '';
                $('#error_grado_estudios').text(error_grado_estudios);
                $('#grado_estudios').removeClass('has-error');
            }

            if ($.trim($('#motivo_requisicion').val()).length == 0) {
                error_motivo_requisicion = 'El motivo de la requisición es requerido';
                $('#error_motivo_requisicion').text(error_motivo_requisicion);
                $('#motivo_requisicion').addClass('has-error');
            } else {
                error_motivo_requisicion = '';
                $('#error_motivo_requisicion').text(error_motivo_requisicion);
                $('#motivo_requisicion').removeClass('has-error');
            }

            if (error_empresa_solicitante != '' || error_centro_costos != '' || error_area_operativa != '' || error_tipo_de_personal != '' || error_puesto_solicitado != '' || error_personas_requeridas != '' || error_grado_estudios != '' || error_motivo_requisicion != '') {
                return false;
            } else {
                $('#list_principal_requi').removeClass('active active_tab1');
                $('#list_principal_requi').removeAttr('href data-toggle');
                $('#principal_requi').removeClass('active');
                $('#list_principal_requi').addClass('inactive_tab1');
                $('#list_salarios_requi').removeClass('inactive_tab1');
                $('#list_salarios_requi').addClass('active_tab1 active');
                $('#list_salarios_requi').attr('href', '#salarios_requi');
                $('#list_salarios_requi').attr('data-toggle', 'tab');
                $('#salarios_requi').addClass('active in');
            }
        });

        //SALARIOS
        $('#previous_btn_salarios_requi').click(function() {
            $('#list_salarios_requi').removeClass('active active_tab1');
            $('#list_salarios_requi').removeAttr('href data-toggle');
            $('#salarios_requi').removeClass('active in');
            $('#list_salarios_requi').addClass('inactive_tab1');
            $('#list_principal_requi').removeClass('inactive_tab1');
            $('#list_principal_requi').addClass('active_tab1 active');
            $('#list_principal_requi').attr('href', '#principal_requi');
            $('#list_principal_requi').tab('show');
            $('#principal_requi').addClass('active in');
        });

        $('#btn_salarios_requi').click(function() {
            var error_cotizacion = '';
            var error_periodo = '';
            var error_salario_inicial = '';
            var error_salario_final = '';

            if ($.trim($('#cotizacion').val()).length == 0) {
                error_cotizacion = 'La cotización es requerida';
                $('#error_cotizacion').text(error_cotizacion);
                $('#cotizacion').addClass('has-error');
            } else {
                error_cotizacion = '';
                $('#error_cotizacion').text(error_cotizacion);
                $('#cotizacion').removeClass('has-error');
            }

            if ($.trim($('#periodo').val()).length == 0) {
                error_periodo = 'El periodo es requerido';
                $('#error_periodo').text(error_periodo);
                $('#periodo').addClass('has-error');
            } else {
                error_periodo = '';
                $('#error_periodo').text(error_periodo);
                $('#periodo').removeClass('has-error');
            }

            if ($.trim($('#salario_inicial').val()).length == 0) {
                error_salario_inicial = 'El salario es requerido';
                $('#error_salario_inicial').text(error_salario_inicial);
                $('#salario_inicial').addClass('has-error');
            } else if (+$('#salario_inicial').val() < '$1.00') {
                error_salario_inicial = 'El salario no puede ser menor a $1';
                $('#error_salario_inicial').text(error_salario_inicial);
                $('#salario_inicial').removeClass('has-error');
            } else if (+$('#salario_inicial').val() > 999999) {
                error_salario_inicial = 'El salario no puede ser mayor a $999999';
                $('#error_salario_inicial').text(error_salario_inicial);
                $('#salario_inicial').removeClass('has-error');
            } else {
                error_salario_inicial = '';
                $('#error_salario_inicial').text(error_salario_inicial);
                $('#salario_inicial').removeClass('has-error');
            }

            if ($.trim($('#salario_final').val()).length == 0) {
                error_salario_final = 'El salario es requerido';
                $('#error_salario_final').text(error_salario_final);
                $('#salario_final').addClass('has-error');
            } else {
                error_salario_final = '';
                $('#error_salario_final').text(error_salario_final);
                $('#salario_final').removeClass('has-error');
            }

            if (error_cotizacion != '' || error_periodo != '' || error_salario_inicial != '' || error_salario_final != '') {
                return false;
            } else {
                $('#list_salarios_requi').removeClass('active active_tab1');
                $('#list_salarios_requi').removeAttr('href data-toggle');
                $('#salarios_requi').removeClass('active');
                $('#list_salarios_requi').addClass('inactive_tab1');
                $('#list_datos_generales').removeClass('inactive_tab1');
                $('#list_datos_generales').addClass('active_tab1 active');
                $('#list_datos_generales').attr('href', '#datos_generales');
                $('#list_datos_generales').attr('data-toggle', 'tab');
                $('#datos_generales').addClass('active in');
            }
        });

        //DATOS GENERALES
        $('#previous_btn_datos_generales').click(function() {
            $('#list_datos_generales').removeClass('active active_tab1');
            $('#list_datos_generales').removeAttr('href data-toggle');
            $('#datos_generales').removeClass('active in');
            $('#list_datos_generales').addClass('inactive_tab1');
            $('#list_salarios_requi').removeClass('inactive_tab1');
            $('#list_salarios_requi').addClass('active_tab1 active');
            $('#list_salarios_requi').attr('href', '#salarios_requi');
            $('#list_salarios_requi').tab('show');
            $('#salarios_requi').addClass('active in');
        });

        $('#btn_datos_generales').click(function() {

            var error_genero_requerido = '';
            var error_estado_civil = '';
            var error_edad_minima = '';
            var error_edad_maxima = '';
            var error_licencia_conducir = '';
            var error_anios_experiencia = '';
            var error_rolar_turno = '';
            var error_trato_cli_prov = '';
            var error_manejo_personal = '';

            if ($.trim($('#genero_requerido').val()).length == 0) {
                error_genero_requerido = 'El de género es requerido';
                $('#error_genero_requerido').text(error_genero_requerido);
                $('#genero_requerido').addClass('has-error');
            } else {
                error_genero_requerido = '';
                $('#error_genero_requerido').text(error_genero_requerido);
                $('#genero_requerido').removeClass('has-error');
            }

            if ($.trim($('#estado_civil').val()).length == 0) {
                error_estado_civil = 'El estado civil es requerido';
                $('#error_estado_civil').text(error_estado_civil);
                $('#estado_civil').addClass('has-error');
            } else {
                error_estado_civil = '';
                $('#error_estado_civil').text(error_estado_civil);
                $('#estado_civil').removeClass('has-error');
            }

            if ($.trim($('#edad_minima').val()).length == 0) {
                error_edad_minima = 'La edad mínima es requerida';
                $('#error_edad_minima').text(error_edad_minima);
                $('#edad_minima').removeClass('has-error');
                $('#edad_minima').addClass('has-error');
            } else if (+$('#edad_minima').val() > 75) {
                error_edad_minima = 'La edad mínima no puede ser mayor a 75 años';
                $('#error_edad_minima').text(error_edad_minima);
                $('#edad_minima').removeClass('has-error');
                $('#edad_minima').addClass('has-error');
            } else if (+$('#edad_minima').val() < 18) {
                error_edad_minima = 'La edad mínima no puede ser menor a 18 años';
                $('#error_edad_minima').text(error_edad_minima);
                $('#edad_minima').removeClass('has-error');
                $('#edad_minima').addClass('has-error');
            } else {
                error_edad_minima = '';
                $('#error_edad_minima').text(error_edad_minima);
                $('#edad_minima').removeClass('has-error');
            }

            if ($.trim($('#edad_maxima').val()).length == 0) {
                error_edad_maxima = 'La edad máxima es requerida';
                $('#error_edad_maxima').text(error_edad_maxima);
                $('#edad_maxima').addClass('has-error');
            } else if (+$('#edad_maxima').val() > 75) {
                error_edad_maxima = 'La edad máxima no puede ser mayor a 75 años';
                $('#error_edad_maxima').text(error_edad_maxima);
                $('#edad_maxima').removeClass('has-error');
                $('#edad_maxima').addClass('has-error');
            } else if (+$('#edad_maxima').val() < 18) {
                error_edad_maxima = 'La edad máxima no puede ser menor a 18 años';
                $('#error_edad_maxima').text(error_edad_maxima);
                $('#edad_maxima').removeClass('has-error');
                $('#edad_maxima').addClass('has-error');
            } else {
                error_edad_maxima = '';
                $('#error_edad_maxima').text(error_edad_maxima);
                $('#edad_maxima').removeClass('has-error');
            }

            if ($.trim($('#licencia_conducir').val()).length == 0) {
                error_licencia_conducir = 'El dato de licencia de conducir es requerido';
                $('#error_licencia_conducir').text(error_licencia_conducir);
                $('#licencia_conducir').addClass('has-error');
            } else {
                error_licencia_conducir = '';
                $('#error_licencia_conducir').text(error_licencia_conducir);
                $('#licencia_conducir').removeClass('has-error');
            }

            if ($.trim($('#anios_experiencia').val()).length == 0) {
                error_anios_experiencia = 'Los años de experiencia son requeridos';
                $('#error_anios_experiencia').text(error_anios_experiencia);
                $('#anios_experiencia').addClass('has-error');
            } else {
                error_anios_experiencia = '';
                $('#error_anios_experiencia').text(error_anios_experiencia);
                $('#anios_experiencia').removeClass('has-error');
            }

            if ($.trim($('#rolar_turno').val()).length == 0) {
                error_rolar_turno = 'El dato de rolar turnos es requerido';
                $('#error_rolar_turno').text(error_rolar_turno);
                $('#rolar_turno').addClass('has-error');
            } else {
                error_rolar_turno = '';
                $('#error_rolar_turno').text(error_rolar_turno);
                $('#rolar_turno').removeClass('has-error');
            }

            if ($.trim($('#trato_cli_prov').val()).length == 0) {
                error_trato_cli_prov = 'El trato con clientes o proveedores es requerido';
                $('#error_trato_cli_prov').text(error_trato_cli_prov);
                $('#trato_cli_prov').addClass('has-error');
            } else {
                error_trato_cli_prov = '';
                $('#error_trato_cli_prov').text(error_trato_cli_prov);
                $('#trato_cli_prov').removeClass('has-error');
            }

            if ($.trim($('#manejo_personal').val()).length == 0) {
                error_manejo_personal = 'El manejo de personal es requerido';
                $('#error_manejo_personal').text(error_manejo_personal);
                $('#manejo_personal').addClass('has-error');
            } else {
                error_manejo_personal = '';
                $('#error_manejo_personal').text(error_manejo_personal);
                $('#manejo_personal').removeClass('has-error');
            }

            if (error_genero_requerido != '' || error_estado_civil != '' || error_edad_minima != '' || error_edad_maxima != '' || error_licencia_conducir != '' || error_anios_experiencia != '' || error_rolar_turno != '' || error_trato_cli_prov != '' || error_manejo_personal != '') {
                return false;
            } else {
                $('#list_datos_generales').removeClass('active active_tab1');
                $('#list_datos_generales').removeAttr('href data-toggle');
                $('#datos_generales').removeClass('active');
                $('#list_datos_generales').addClass('inactive_tab1');
                $('#list_jornada_laboral').removeClass('inactive_tab1');
                $('#list_jornada_laboral').addClass('active_tab1 active');
                $('#list_jornada_laboral').attr('href', '#jornada_laboral');
                $('#list_jornada_laboral').tab('show');
                $('#jornada_laboral').addClass('active in');
            }
        });

        //JORNADA LABORAL
        $('#previous_btn_jornada_laboral').click(function() {
            $('#list_jornada_laboral').removeClass('active active_tab1');
            $('#list_jornada_laboral').removeAttr('href data-toggle');
            $('#jornada_laboral').removeClass('active in');
            $('#list_jornada_laboral').addClass('inactive_tab1');
            $('#list_datos_generales').removeClass('inactive_tab1');
            $('#list_datos_generales').addClass('active_tab1 active');
            $('#list_datos_generales').attr('href', '#salarios_requi');
            $('#list_datos_generales').attr('data-toggle', 'nav');
            $('#datos_generales').addClass('active in');
        });

        $('#btn_jornada_laboral').click(function() {
            var error_jornada = '';
            var error_horario_inicial = '';
            var error_horario_final = '';

            if ($.trim($('#jornada').val()).length == 0) {
                error_jornada = 'La jornada es requerida';
                $('#error_jornada').text(error_jornada);
                $('#jornada').addClass('has-error');
            } else {
                error_jornada = '';
                $('#error_jornada').text(error_jornada);
                $('#jornada').removeClass('has-error');
            }

            if ($.trim($('#horario_inicial').val()).length == 0) {
                error_horario_inicial = 'El dato de horario inicial es requerido';
                $('#error_horario_inicial').text(error_horario_inicial);
                $('#horario_inicial').addClass('has-error');
            } else {
                error_horario_inicial = '';
                $('#error_horario_inicial').text(error_horario_inicial);
                $('#horario_inicial').removeClass('has-error');
            }

            if ($.trim($('#horario_final').val()).length == 0) {
                error_horario_final = 'El dato de horario final es requerido';
                $('#error_horario_final').text(error_horario_final);
                $('#horario_final').addClass('has-error');
            } else {
                error_horario_final = '';
                $('#error_horario_final').text(error_horario_final);
                $('#horario_final').removeClass('has-error');
            }

            if (error_jornada != '' || error_horario_inicial != '' || error_horario_final != '') {
                return false;
            } else {
                $('#list_jornada_laboral').removeClass('active active_tab1');
                $('#list_jornada_laboral').removeAttr('href data-toggle');
                $('#jornada_laboral').removeClass('active');
                $('#list_jornada_laboral').addClass('inactive_tab1');
                $('#list_conocimientos').removeClass('inactive_tab1');
                $('#list_conocimientos').addClass('active_tab1 active');
                $('#list_conocimientos').attr('href', '#conocimientos');
                $('#list_conocimientos').attr('data-toggle', 'tab');
                $('#conocimientos').addClass('active in');
            }
        });

        //PRINCIPALES CONOCIMIENTOS
        $('#previous_btn_conocimientos').click(function() {
            $('#list_conocimientos').removeClass('active active_tab1');
            $('#list_conocimientos').removeAttr('href data-toggle');
            $('#conocimientos').removeClass('active in');
            $('#list_conocimientos').addClass('inactive_tab1');
            $('#list_jornada_laboral').removeClass('inactive_tab1');
            $('#list_jornada_laboral').addClass('active_tab1 active');
            $('#list_jornada_laboral').attr('href', '#jornada_laboral');
            $('#list_jornada_laboral').attr('data-toggle', 'tab');
            $('#jornada_laboral').addClass('active in');
        });

        $('#btn_conocimientos').click(function() {
            var error_conocimiento_1 = '';
            var error_conocimiento_2 = '';
            var error_conocimiento_3 = '';
            var error_conocimiento_4 = '';
            var error_conocimiento_5 = '';

            if ($.trim($('#conocimiento_1').val()).length == 0) {
                error_conocimiento_1 = 'Es necesario ingresar el primer conocimiento';
                $('#error_conocimiento_1').text(error_conocimiento_1);
                $('#conocimiento_1').addClass('has-error');
            } else {
                error_conocimiento_1 = '';
                $('#error_conocimiento_1').text(error_conocimiento_1);
                $('#conocimiento_1').removeClass('has-error');
            }

            if ($.trim($('#conocimiento_2').val()).length == 0) {
                error_conocimiento_2 = 'Es necesario ingresar el segundo conocimiento';
                $('#error_conocimiento_2').text(error_conocimiento_2);
                $('#conocimiento_2').addClass('has-error');
            } else {
                error_conocimiento_2 = '';
                $('#error_conocimiento_2').text(error_conocimiento_2);
                $('#conocimiento_2').removeClass('has-error');
            }

            if ($.trim($('#conocimiento_3').val()).length == 0) {
                error_conocimiento_3 = 'Es necesario ingresar el tercer conocimiento';
                $('#error_conocimiento_3').text(error_conocimiento_3);
                $('#conocimiento_3').addClass('has-error');
            } else {
                error_conocimiento_3 = '';
                $('#error_conocimiento_3').text(error_conocimiento_3);
                $('#conocimiento_3').removeClass('has-error');
            }

            if ($.trim($('#conocimiento_4').val()).length == 0) {
                error_conocimiento_4 = 'Es necesario ingresar el cuarto conocimiento';
                $('#error_conocimiento_4').text(error_conocimiento_4);
                $('#conocimiento_4').addClass('has-error');
            } else {
                error_conocimiento_4 = '';
                $('#error_conocimiento_4').text(error_conocimiento_4);
                $('#conocimiento_4').removeClass('has-error');
            }

            if ($.trim($('#conocimiento_5').val()).length == 0) {
                error_conocimiento_5 = 'Es necesario ingresar el quinto conocimiento';
                $('#error_conocimiento_5').text(error_conocimiento_5);
                $('#conocimiento_5').addClass('has-error');
            } else {
                error_conocimiento_5 = '';
                $('#error_conocimiento_5').text(error_conocimiento_5);
                $('#conocimiento_5').removeClass('has-error');
            }

            if (error_conocimiento_1 != '' || error_conocimiento_2 != '' || error_conocimiento_3 != '' || error_conocimiento_4 != '' || error_conocimiento_5 != '') {
                return false;
            } else {
                $('#list_conocimientos').removeClass('active active_tab1');
                $('#list_conocimientos').removeAttr('href data-toggle');
                $('#conocimientos').removeClass('active');
                $('#list_conocimientos').addClass('inactive_tab1');
                $('#list_competencias_requi').removeClass('inactive_tab1');
                $('#list_competencias_requi').addClass('active_tab1 active');
                $('#list_competencias_requi').attr('href', '#competencias_requi');
                $('#list_competencias_requi').attr('data-toggle', 'tab');
                $('#competencias_requi').addClass('active in');
            }
        });

        //COMPETENCIAS
        $('#previous_btn_competencias_requi').click(function() {
            $('#list_competencias_requi').removeClass('active active_tab1');
            $('#list_competencias_requi').removeAttr('href data-toggle');
            $('#competencias_requi').removeClass('active in');
            $('#list_competencias_requi').addClass('inactive_tab1');
            $('#list_conocimientos').removeClass('inactive_tab1');
            $('#list_conocimientos').addClass('active_tab1 active');
            $('#list_conocimientos').attr('href', '#conocimientos');
            $('#list_conocimientos').attr('data-toggle', 'tab');
            $('#conocimientos').addClass('active in');
        });

        $('#btn_competencias_requi').click(function() {
            var error_competencia_1 = '';
            var error_competencia_2 = '';
            var error_competencia_3 = '';
            var error_competencia_4 = '';
            var error_competencia_5 = '';

            if ($.trim($('#competencia_1').val()).length == 0) {
                error_competencia_1 = 'Es necesario ingresar la primer competencia';
                $('#error_competencia_1').text(error_competencia_1);
                $('#competencia_1').addClass('has-error');
            } else {
                error_competencia_1 = '';
                $('#error_competencia_1').text(error_competencia_1);
                $('#competencia_1').removeClass('has-error');
            }

            if ($.trim($('#competencia_2').val()).length == 0) {
                error_competencia_2 = 'Es necesario ingresar la segunda competencia';
                $('#error_competencia_2').text(error_competencia_2);
                $('#competencia_2').addClass('has-error');
            } else {
                error_competencia_2 = '';
                $('#error_competencia_2').text(error_competencia_2);
                $('#competencia_2').removeClass('has-error');
            }

            if ($.trim($('#competencia_3').val()).length == 0) {
                error_competencia_3 = 'Es necesario ingresar la tercer competencia';
                $('#error_competencia_3').text(error_competencia_3);
                $('#competencia_3').addClass('has-error');
            } else {
                error_competencia_3 = '';
                $('#error_competencia_3').text(error_competencia_3);
                $('#competencia_3').removeClass('has-error');
            }

            if ($.trim($('#competencia_4').val()).length == 0) {
                error_competencia_4 = 'Es necesario ingresar la cuarta competencia';
                $('#error_competencia_4').text(error_competencia_4);
                $('#competencia_4').addClass('has-error');
            } else {
                error_competencia_4 = '';
                $('#error_competencia_4').text(error_competencia_4);
                $('#competencia_4').removeClass('has-error');
            }

            if ($.trim($('#competencia_5').val()).length == 0) {
                error_competencia_5 = 'Es necesario ingresar la quinta competencia';
                $('#error_competencia_5').text(error_competencia_5);
                $('#competencia_5').addClass('has-error');
            } else {
                error_competencia_5 = '';
                $('#error_competencia_5').text(error_competencia_5);
                $('#competencia_5').removeClass('has-error');
            }

            if (error_competencia_1 != '' || error_competencia_2 != '' || error_competencia_3 != '' || error_competencia_4 != '' || error_competencia_5 != '') {
                return false;
            } else {
                $('#list_competencias_requi').removeClass('active active_tab1');
                $('#list_competencias_requi').removeAttr('href data-toggle');
                $('#competencias_requi').removeClass('active');
                $('#list_competencias_requi').addClass('inactive_tab1');
                $('#list_actividades').removeClass('inactive_tab1');
                $('#list_actividades').addClass('active_tab1 active');
                $('#list_actividades').attr('href', '#actividades');
                $('#list_actividades').attr('data-toggle', 'nav');
                $('#actividades').addClass('active in');
            }
        });

        //PRINCIPALES ACTIVIDADES
        $('#previous_btn_actividades').click(function() {
            $('#list_actividades').removeClass('active active_tab1');
            $('#list_actividades').removeAttr('href data-toggle');
            $('#actividades').removeClass('active in');
            $('#list_actividades').addClass('inactive_tab1');
            $('#list_competencias_requi').removeClass('inactive_tab1');
            $('#list_competencias_requi').addClass('active_tab1 active');
            $('#list_competencias_requi').attr('href', '#competencias_requi');
            $('#list_competencias_requi').attr('data-toggle', 'nav');
            $('#competencias_requi').addClass('active in');
        });

        $('#btn_actividades').click(function() {
            var error_actividad_1 = '';
            var error_actividad_2 = '';
            var error_actividad_3 = '';
            var error_actividad_4 = '';
            var error_actividad_5 = '';

            if ($.trim($('#actividad_1').val()).length == 0) {
                error_actividad_1 = 'Es necesario ingresar la primer actividad';
                $('#error_actividad_1').text(error_actividad_1);
                $('#actividad_1').addClass('has-error');
            } else {
                error_actividad_1 = '';
                $('#error_actividad_1').text(error_actividad_1);
                $('#actividad_1').removeClass('has-error');
            }

            if ($.trim($('#actividad_2').val()).length == 0) {
                error_actividad_2 = 'Es necesario ingresar la segunda actividad';
                $('#error_actividad_2').text(error_actividad_2);
                $('#actividad_2').addClass('has-error');
            } else {
                error_actividad_2 = '';
                $('#error_actividad_2').text(error_actividad_2);
                $('#actividad_2').removeClass('has-error');
            }

            if ($.trim($('#actividad_3').val()).length == 0) {
                error_actividad_3 = 'Es necesario ingresar la tercer actividad';
                $('#error_actividad_3').text(error_actividad_3);
                $('#actividad_3').addClass('has-error');
            } else {
                error_actividad_3 = '';
                $('#error_actividad_3').text(error_actividad_3);
                $('#actividad_3').removeClass('has-error');
            }

            if ($.trim($('#actividad_4').val()).length == 0) {
                error_actividad_4 = 'Es necesario ingresar la cuarta actividad';
                $('#error_actividad_4').text(error_actividad_4);
                $('#actividad_4').addClass('has-error');
            } else {
                error_actividad_4 = '';
                $('#error_actividad_4').text(error_actividad_4);
                $('#actividad_4').removeClass('has-error');
            }

            if ($.trim($('#actividad_5').val()).length == 0) {
                error_actividad_5 = 'Es necesario ingresar la quinta actividad';
                $('#error_actividad_5').text(error_actividad_5);
                $('#actividad_5').addClass('has-error');
            } else {
                error_actividad_5 = '';
                $('#error_actividad_5').text(error_actividad_5);
                $('#actividad_5').removeClass('has-error');
            }

            if (error_actividad_1 != '' || error_actividad_2 != '' || error_actividad_3 != '' || error_actividad_4 != '' || error_actividad_5 != '') {
                return false;
            } else {
                $('#btn_actividades').attr("disabled", "disabled");
                $(document).css('cursor', 'prgress');
                $("#register_form").submit();
            }
        });
    });

</script>

<script>
    function MASK(form, n, mask, format) {
        if (format == "undefined") format = false;
        if (format || NUM(n)) {
            dec = 0, point = 0;
            x = mask.indexOf(".") + 1;
            if (x) {
                dec = mask.length - x;
            }

            if (dec) {
                n = NUM(n, dec) + "";
                x = n.indexOf(".") + 1;
                if (x) {
                    point = n.length - x;
                } else {
                    n += ".";
                }
            } else {
                n = NUM(n, 0) + "";
            }
            for (var x = point; x < dec; x++) {
                n += "0";
            }
            x = n.length, y = mask.length, XMASK = "";
            while (x || y) {
                if (x) {
                    while (y && "#0.".indexOf(mask.charAt(y - 1)) == -1) {
                        if (n.charAt(x - 1) != "-")
                            XMASK = mask.charAt(y - 1) + XMASK;
                        y--;
                    }
                    XMASK = n.charAt(x - 1) + XMASK, x--;
                } else if (y && "$0".indexOf(mask.charAt(y - 1)) + 1) {
                    XMASK = mask.charAt(y - 1) + XMASK;
                }
                if (y) {
                    y--
                }
            }
        } else {
            XMASK = "";
        }
        if (form) {
            form.value = XMASK;
            if (NUM(n) < 0) {
                form.style.color = "#FF0000";
            } else {
                form.style.color = "#000000";
            }
        }
        return XMASK;
    }

    // Convierte una cadena alfanumérica a numérica (incluyendo formulas aritméticas)
    //
    // s   = cadena a ser convertida a numérica
    // dec = numero de decimales a redondear
    //
    // La función devuelve el numero redondeado
    function NUM(s, dec) {
        for (var s = s + "", num = "", x = 0; x < s.length; x++) {
            c = s.charAt(x);
            if (".-+/*".indexOf(c) + 1 || c != " " && !isNaN(c)) {
                num += c;
            }
        }
        if (isNaN(num)) {
            num = eval(num);
        }
        if (num == "") {
            num = 0;
        } else {
            num = parseFloat(num);
        }
        if (dec != undefined) {
            r = .5;
            if (num < 0) r = -r;
            e = Math.pow(10, (dec > 0) ? dec : 0);
            return parseInt(num * e + r) / e;
        } else {
            return num;
        }
    }

</script>

<script>
    function filterFloat(evt, input) {
        // Backspace = 8, Enter = 13, ‘0′ = 48, ‘9′ = 57, ‘.’ = 46, ‘-’ = 43
        var key = window.Event ? evt.which : evt.keyCode;
        var chark = String.fromCharCode(key);
        var tempValue = input.value + chark;
        if (key >= 48 && key <= 57) {
            if (filter(tempValue) === false) {
                return false;
            } else {
                return true;
            }
        } else {
            if (key == 8 || key == 13 || key == 0) {
                return true;
            } else if (key == 46) {
                if (filter(tempValue) === false) {
                    return false;
                } else {
                    return true;
                }
            } else {
                return false;
            }
        }
    }

    function filter(__val__) {
        var preg = /^([0-9]+\.?[0-9]{0,2})$/;
        if (preg.test(__val__) === true) {
            return true;
        } else {
            return false;
        }

    }

</script>

<script>
    function validaNumericos(event) {
        if (event.charCode >= 48 && event.charCode <= 57) {
            return true;
        }
        return false;
    }

</script>

<script>
    $(document).ready(function() {
        $('.area').select2().on('select2:opening', function(e) {
            $(this).data('select2').$dropdown.find(':input.select2-search__field').attr('placeholder', 'Escribe para buscar...')
        });
    });

</script>

<script>
    $(function() {
        $('[data-toggle="popover"]').popover({
            html: true
        })
    })

</script>

<script>
    $(document).ready(function() {
        $('.salario').on('keydown', function(e) {
            try {
                if ((e.keyCode == 8 || e.keyCode == 46))
                    return false;
                else
                    return true;
            } catch (Exception) {
                return false;
            }
        });
    });

</script>

<script>
    $(document).ready(function() {
        $('.clear').click(function() {
            $('#salario_inicial').val('');
        });
    });

    $(document).ready(function() {
        $('.clear2').click(function() {
            $('#salario_final').val('');
        });
    });

</script>
