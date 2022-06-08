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
    $puesto_solicitado=addslashes(mb_convert_case($_REQUEST['puesto_solicitado'],MB_CASE_TITLE, "UTF-8"));
    $personas_requeridas=$_REQUEST['personas_requeridas'];
    $grado_estudios=$_REQUEST['grado_estudios'];
    $motivo_requisicion=$_REQUEST['motivo_requisicion'];
    $jefe_inmediato=addslashes(mb_convert_case($_REQUEST['jefe_inmediato'],MB_CASE_TITLE, "UTF-8"));
    $colaborador_reemplazo=addslashes(mb_convert_case($_REQUEST['colaborador_reemplazo'],MB_CASE_TITLE, "UTF-8"));
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
    $conocimiento_1=addslashes(mb_strtoupper($_REQUEST['conocimiento_1'], 'UTF-8'));
    $conocimiento_2=addslashes(mb_strtoupper($_REQUEST['conocimiento_2'], 'UTF-8'));
    $conocimiento_3=addslashes(mb_strtoupper($_REQUEST['conocimiento_3'], 'UTF-8'));
    $conocimiento_4=addslashes(mb_strtoupper($_REQUEST['conocimiento_4'], 'UTF-8'));
    $conocimiento_5=addslashes(mb_strtoupper($_REQUEST['conocimiento_5'], 'UTF-8'));
    $competencia_1=addslashes(mb_strtoupper($_REQUEST['competencia_1'], 'UTF-8'));
    $competencia_2=addslashes(mb_strtoupper($_REQUEST['competencia_2'], 'UTF-8'));
    $competencia_3=addslashes(mb_strtoupper($_REQUEST['competencia_3'], 'UTF-8'));
    $competencia_4=addslashes(mb_strtoupper($_REQUEST['competencia_4'], 'UTF-8'));
    $competencia_5=addslashes(mb_strtoupper($_REQUEST['competencia_5'], 'UTF-8'));
    $actividad_1=addslashes(mb_strtoupper($_REQUEST['actividad_1'], 'UTF-8'));
    $actividad_2=addslashes(mb_strtoupper($_REQUEST['actividad_2'], 'UTF-8'));
    $actividad_3=addslashes(mb_strtoupper($_REQUEST['actividad_3'], 'UTF-8'));
    $actividad_4=addslashes(mb_strtoupper($_REQUEST['actividad_4'], 'UTF-8'));
    $actividad_5=addslashes(mb_strtoupper($_REQUEST['actividad_5'], 'UTF-8'));
    
    $fecha_creacion = strtotime('NOW');
    $fecha_creacion = date('Y-m-d H:i:s',$fecha_creacion);
    
 sleep(2);
if(
 $conectar->query ("INSERT INTO solicitudes
 VALUES(NULL,'$u','$fecha_creacion', '$empresa_solicitante', '$centro_costos', '$area_operativa', '$tipo_de_personal', '$puesto_solicitado', '$personas_requeridas', '$grado_estudios', '$motivo_requisicion', '$jefe_inmediato', '$colaborador_reemplazo','$cotizacion', '$periodo', '$salario_inicial', '$salario_final', '$genero_requerido', '$estado_civil', '$edad_minima', '$edad_maxima', '$licencia_conducir', '$anios_experiencia', '$rolar_turno', '$trato_cli_prov', '$manejo_personal', '$jornada', '$horario_inicial', '$horario_final', '$conocimiento_1', '$conocimiento_2', '$conocimiento_3', '$conocimiento_4', '$conocimiento_5', '$competencia_1',  '$competencia_2', '$competencia_3', '$competencia_4', '$competencia_5', '$actividad_1', '$actividad_2', '$actividad_3', '$actividad_4', '$actividad_5', default)"))
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
                                        <input type="" name="fecha_creacion" id="fecha_creacion" class="form-control" value="<?=date('d/m/Y')?>" style="width:80%" readonly="readonly" tabindex="-1">
                                    </div>
                                    <div class="form-group">
                                        <label>Empresa solicitante:</label>
                                        <select class="form-control" name="empresa_solicitante" id="empresa_solicitante" style="cursor:pointer; width:80%;" tabindex="1">
                                            <option value="" selected disabled>Selecciona una opción...</option>
                                            <option value="AXONE">AXONE</option>
                                            <option value="BIAS">BIAS</option>
                                            <option value="WALWORTH">WALWORTH</option>
                                        </select>
                                        <span id="error_empresa_solicitante" class="text-danger"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Centro de costos:</label>
                                        <input type="number" name="centro_costos" id="centro_costos" class="form-control" style="width:80%" onkeypress="return validaNumericos(event)" min="1" tabindex="3">
                                        <span id="error_centro_costos" class="text-danger"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Área operativa:</label> <br>
                                        <select name="area_operativa" class="selectpicker area" id="area_operativa" style="width:80%; border: 1px solid #ced4da;" tabindex="5">
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
                                        <select class="form-control" name="tipo_de_personal" id="tipo_de_personal" style="cursor:pointer; width:80%;" tabindex="7">
                                            <option value="" selected disabled>Selecciona una opción...</option>
                                            <option value="Administrativo">Administrativo</option>
                                            <option value="Sindicalizado">Sindicalizado</option>
                                        </select>
                                        <span id="error_tipo_de_personal" class="text-danger"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Jefe inmediato:</label>
                                        <input type="text" name="jefe_inmediato" id="jefe_inmediato" class="form-control" style="width:80%" maxlength="80" tabindex="9">
                                        <span id="error_jefe_inmediato" class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-sm-6" style="padding-left:35px; padding-top:10px">
                                    <div class="form-group">
                                        <label>Hora:</label>
                                        <input type="" name="fecha_creacion" class="form-control" value="<?= date('H:i');?>" style="width:80%" readonly="readonly" tabindex="-1">
                                    </div>
                                    <div class="form-group">
                                        <label>Puesto solicitado:</label>
                                        <input type="text" name="puesto_solicitado" id="puesto_solicitado" class="form-control" style="width:80%" maxlength="20" tabindex="2">
                                        <span id="error_puesto_solicitado" class="text-danger"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Número de personas requeridas:</label>
                                        <input type="number" name="personas_requeridas" id="personas_requeridas" class="form-control" style="width:80%" onkeypress="return validaNumericos(event)" tabindex="4">
                                        <span id="error_personas_requeridas" class="text-danger"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Último grado de estudios:</label>
                                        <select class="form-control" name="grado_estudios" id="grado_estudios" style="cursor:pointer; width:80%;" required tabindex="6">
                                            <option value="" selected disabled>Selecciona una opción...</option>
                                            <option value="Bachillerato">Bachillerato</option>
                                            <option value="Licenciatura/Ingeniería">Licenciatura/Ingeniería</option>
                                            <option value="Secundaria">Secundaria</option>
                                        </select>
                                        <span id="error_grado_estudios" class="text-danger"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Motivo de la requisición:</label>
                                        <select class="form-control" name="motivo_requisicion" id="motivo_requisicion" style="cursor:pointer; width:80%;" tabindex="8">
                                            <option value="" selected disabled>Selecciona una opción...</option>
                                            <option value="Baja/Renuncia">Baja/Renuncia</option>
                                            <option value="Incremento de Actividad">Incremento de Actividad</option>
                                            <option value="Promoción Interna">Promoción interna</option>
                                            <option value="Puesto de Nueva Creación">Puesto de nueva creación</option>
                                        </select>
                                        <span id="error_motivo_requisicion" class="text-danger"></span>
                                    </div>
                                     <div class="form-group">
                                        <label>Nombre del colaborador a reemplazar:</label>
                                        <input type="text" name="colaborador_reemplazo" id="colaborador_reemplazo" class="form-control" style="width:80%" maxlength="80" tabindex="10">
                                    </div>
                                </div>
                            </div>
                            <br />
                            <div align="center">
                                <button type="button" name="btn_principal_requi" id="btn_principal_requi" class="btn btn-primary btn-lg" tabindex="11">Siguiente</button>
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
                                                <button tabindex="0" class="btn btn-sm btn-dark" type="button" data-toggle="popover" data-trigger="focus" title="Salario" data-content="En el salario sólo se podrán ingresar números.<br>Las cifras se separarán automáticamente, con un máximo de 6 enteros y 2 decimales ($999,999.99)."><i class="fas fa-info-circle"></i></button>
                                            </div>
                                            <input type="text" name="salario_inicial" id="salario_inicial" class="form-control salario" onclick="ValidateDecimalInputs(this)" onchange="MASK(this,this.value,'-$##,###,##0.00',1)" placeholder="Ej. 10000.99" tabindex="12">
                                            <div class="input-group-append">
                                                <button class="btn btn-sm btn-danger clear" type="button" title="Borrar"><i class="fas fa-backspace"></i></button>
                                            </div>
                                        </div>
                                        <span id="error_salario_inicial" class="text-danger"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Cotización:</label>
                                        <select class="form-control" name="cotizacion" id="cotizacion" style="cursor:pointer; width:80%;" tabindex="14">
                                            <option value="" selected disabled>Selecciona una opción...</option>
                                            <option value="Neto">Neto</option>
                                            <option value="Bruta">Bruta</option>
                                        </select>
                                        <span id="error_cotizacion" class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-sm-6" style="padding-left:35px; padding-top:10px">
                                    <div class="form-group">
                                        <label for="">Hasta:</label><br>
                                        <div class="input-group" style="width:80%">
                                            <div class="input-group-prepend">
                                                <button tabindex="0" class="btn btn-sm btn-dark" type="button" data-toggle="popover" data-trigger="focus" title="Salario" data-content="En el salario sólo se podrán ingresar números.<br>Las cifras se separarán automáticamente, con un máximo de 6 enteros y 2 decimales ($999,999.99)."><i class="fas fa-info-circle"></i></button>
                                            </div>
                                            <input type="text" name="salario_final" id="salario_final" class="form-control salario" onclick="ValidateDecimalInputs(this)" onchange="MASK(this,this.value,'-$##,###,##0.00',1)" placeholder="Ej. 10000.99" tabindex="13">
                                            <div class="input-group-append">
                                                <button class="btn btn-sm btn-danger clear2" type="button" title="Borrar"><i class="fas fa-backspace"></i></button>
                                            </div>
                                        </div>
                                        <span id="error_salario_final" class="text-danger"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Periodo:</label>
                                        <select class="form-control" name="periodo" id="periodo" style="cursor:pointer; width:80%;" tabindex="15">
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
                                <button type="button" name="btn_salarios_requi" id="btn_salarios_requi" class="btn btn-primary btn-lg" tabindex="16">Siguiente</button>
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
                                        <select class="form-control" name="genero_requerido" id="genero_requerido" style="cursor:pointer; width:80%;" tabindex="17">
                                            <option value="" selected disabled>Selecciona una opción...</option>
                                            <option value="Masculino">Masculino</option>
                                            <option value="Femenino">Femenino</option>
                                            <option value="Indistinto">Indistinto</option>
                                        </select>
                                        <span id="error_genero_requerido" class="text-danger"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Estado civil:</label>
                                        <select class="form-control" name="estado_civil" id="estado_civil" style="cursor:pointer; width:80%;" tabindex="19">
                                            <option value="" selected disabled>Selecciona una opción...</option>
                                            <option value="Soltero/a">Soltero/a</option>
                                            <option value="Casado/a">Casado/a</option>
                                            <option value="Indistinto">Indistinto</option>
                                        </select>
                                        <span id="error_estado_civil" class="text-danger"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Edad mínima:</label>
                                        <input type="number" name="edad_minima" id="edad_minima" class="form-control" style="width:80%" min="18" max="75" tabindex="21">
                                        <span id="error_edad_minima" class="text-danger"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Edad máxima:</label>
                                        <input type="number" name="edad_maxima" id="edad_maxima" class="form-control" style="width:80%" min="18" max="75" tabindex="23">
                                        <span id="error_edad_maxima" class="text-danger"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Licencia de conducir:</label>
                                        <select class="form-control" name="licencia_conducir" id="licencia_conducir" style="cursor:pointer; width: 80%;" tabindex="25">
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
                                        <select class="form-control" name="anios_experiencia" id="anios_experiencia" style="cursor:pointer; width: 80%;" tabindex="18">
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
                                        <select class="form-control" name="rolar_turno" id="rolar_turno" style="cursor:pointer; width: 80%;" tabindex="20">
                                            <option value="" selected disabled>Selecciona una opción...</option>
                                            <option value="Si">Si</option>
                                            <option value="No">No</option>
                                        </select>
                                        <span id="error_rolar_turno" class="text-danger"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Trato con clientes o proveedores:</label><br>
                                        <select class="form-control" name="trato_cli_prov" id="trato_cli_prov" style="cursor:pointer; width: 80%;" tabindex="22">
                                            <option value="" selected disabled>Selecciona una opción...</option>
                                            <option value="Si">Si</option>
                                            <option value="No">No</option>
                                        </select>
                                        <span id="error_trato_cli_prov" class="text-danger"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Manejo de personal:</label><br>
                                        <select class="form-control" name="manejo_personal" id="manejo_personal" style="cursor:pointer; width: 80%;" tabindex="24">
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
                                <button type="button" name="btn_datos_generales" id="btn_datos_generales" class="btn btn-primary btn-lg" tabindex="26">Siguiente</button>
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
                                <input type="text" name="conocimiento_1" id="conocimiento_1" class="form-control" style="width:95%" maxlength="100" placeholder="Máximo 100 caracteres">
                                <span id="error_conocimiento_1" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label>Segundo conocimiento:</label><br>
                                <input type="text" name="conocimiento_2" id="conocimiento_2" class="form-control" style="width:95%" maxlength="100" placeholder="Máximo 100 caracteres">
                                <span id="error_conocimiento_2" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label>Tercer conocimiento:</label><br>
                                <input type="text" name="conocimiento_3" id="conocimiento_3" class="form-control" style="width:95%" maxlength="100" placeholder="Máximo 100 caracteres">
                                <span id="error_conocimiento_3" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label>Cuarto conocimiento:</label><br>
                                <input type="text" name="conocimiento_4" id="conocimiento_4" class="form-control" style="width:95%" maxlength="100" placeholder="Máximo 100 caracteres">
                                <span id="error_conocimiento_4" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label>Quinto conocimiento:</label><br>
                                <input type="text" name="conocimiento_5" id="conocimiento_5" class="form-control" style="width:95%" maxlength="100" placeholder="Máximo 100 caracteres">
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
                                <input type="text" name="competencia_1" id="competencia_1" class="form-control" style="width:95%" maxlength="100" placeholder="Máximo 100 caracteres">
                                <span id="error_competencia_1" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label>Segunda competencia:</label><br>
                                <input type="text" name="competencia_2" id="competencia_2" class="form-control" style="width:95%" maxlength="100" placeholder="Máximo 100 caracteres">
                                <span id="error_competencia_2" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label>Tercer competencia:</label><br>
                                <input type="text" name="competencia_3" id="competencia_3" class="form-control" style="width:95%" maxlength="100" placeholder="Máximo 100 caracteres">
                                <span id="error_competencia_3" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label>Cuarta competencia:</label><br>
                                <input type="text" name="competencia_4" id="competencia_4" class="form-control" style="width:95%" maxlength="100" placeholder="Máximo 100 caracteres">
                                <span id="error_competencia_4" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label>Quinta competencia:</label><br>
                                <input type="text" name="competencia_5" id="competencia_5" class="form-control" style="width:95%" maxlength="100" placeholder="Máximo 100 caracteres">
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
                                <input type="text" name="actividad_1" id="actividad_1" class="form-control" style="width:95%" maxlength="100" placeholder="Máximo 100 caracteres">
                                <span id="error_actividad_1" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label>Segunda actividad:</label><br>
                                <input type="text" name="actividad_2" id="actividad_2" class="form-control" style="width:95%" maxlength="100" placeholder="Máximo 100 caracteres">
                                <span id="error_actividad_2" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label>Tercer actividad:</label><br>
                                <input type="text" name="actividad_3" id="actividad_3" class="form-control" style="width:95%" maxlength="100" placeholder="Máximo 100 caracteres">
                                <span id="error_actividad_3" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label>Cuarta actividad:</label><br>
                                <input type="text" name="actividad_4" id="actividad_4" class="form-control" style="width:95%" maxlength="100" placeholder="Máximo 100 caracteres">
                                <span id="error_actividad_4" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label>Quinta actividad:</label><br>
                                <input type="text" name="actividad_5" id="actividad_5" class="form-control" style="width:95%" maxlength="100" placeholder="Máximo 100 caracteres">
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

<script src="../jquery/form-step.js"></script>

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
    };

function ValidateDecimalInputs(e) {

    var beforeDecimal = 6;
    var afterDecimal = 2;
   
    $('.salario').on('input', function () {
        this.value = this.value
          .replace(/[^\d.]/g, '')            
          .replace(new RegExp("(^[\\d]{" + beforeDecimal + "})[\\d]", "g"), '$1') 
          .replace(/(\..*)\./g, '$1')         
          .replace(new RegExp("(\\.[\\d]{" + afterDecimal + "}).", "g"), '$1');   
    });
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
