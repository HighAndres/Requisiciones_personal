<?php
include('../includes/connect.php');
session_start();
if (!isset($_SESSION['id_user']) && !isset($_SESSION['rol'])) {
	header("Location:../index.php");
} else {
    if($_SESSION['rol'] != 4){
        header("Location:../usuario/home.php");
    }
}

$key = '5973C777%B7673309895AD%FC2BD1962C1062B9?3890FC277A04499¿54D18FC13677';

$requis=$conectar->query("SELECT usuarios.*, solicitudes.*, departamentos.* FROM solicitudes 
INNER JOIN usuarios ON solicitudes.id_user= usuarios.id_user
INNER JOIN departamentos ON usuarios.departamento_id = departamentos.id_depto ORDER BY fecha_creacion DESC");
$nr=$requis->num_rows;
$arrayr=$requis->fetch_assoc();

if(isset($_REQUEST['folio'])){ 
$qaut=$conectar->query("SELECT * FROM solicitudes WHERE MD5(concat('".$key."',id_folio))='".$_REQUEST['folio']."'");
$aaut=$qaut->fetch_assoc();
}

if(isset($_POST['editar'])){
    $id = $_GET['id'];
    $estatus=$_POST['estatus'];
    
    $conectar->query("UPDATE solicitudes SET estatus='$estatus' WHERE id_folio= '$id'");

    $_SESSION['success']='toastr.success("¡Estatus de requisición actualizado!", "Éxito",{ "progressBar": true, "positionClass": "toast-top-center","hideMethod": "slideUp","extendedTimeOut": "500"})';
    header("Location:requisiciones.php");
    exit();
}

if(isset($_POST['eliminar'])){
    $id = $_GET['id'];
    
    $conectar->query("DELETE FROM solicitudes WHERE id_folio= '$id'");
    $_SESSION['success']='toastr.success("¡Se ha eliminado la requisición!", "Éxito",{ "progressBar": true, "positionClass": "toast-top-center","hideMethod": "slideUp","extendedTimeOut": "700"})';
    header("Location:requisiciones.php");
    exit();
}

date_default_timezone_set('America/Mexico_City');
setlocale(LC_ALL, 'es_MX');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Administración de requisiciones</title>

    <?php include('../includes/head_links.php'); ?>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
</head>

<body>
    <?php include('../includes/head.php'); 
        include('../jquery/alerts.php');?>

    <div class="cont">
        <div class="encabezado">
            <h3>Administración de requisiciones</h3>
            <a href="home_admin.php" class="btn btn-light btn-lg inicio"><i class="fas fa-home"></i></a>
        </div>

        <div class="tabla">
            <table id="tablax" class="display table-striped table-bordered dataTable no-footer">
                <thead>
                    <th>FOLIO</th>
                    <th>FECHA Y HORA DE CREACIÓN</th>
                    <th>USUARIO</th>
                    <th>DEPARTAMENTO</th>
                    <th>ESTATUS</th>
                    <th>VER</th>
                    <th>ELIMINAR</th>
                </thead>

                <tbody>
                    <?php 
            if($nr>0){
                do{?>
                    <div class="modal fade" id="edit_<?php echo md5($key.$arrayr['id_folio']); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" style="max-width: 500px !important;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">Editar usuario</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        <form method="POST" action="requisiciones.php?id=<?php echo $arrayr['id_folio']; ?>">
                                            <div class="row form-group">
                                                <div class="col-sm-2">
                                                    <label class="control-label" style="position:relative; top:7px;"><strong>Folio:</strong></label>
                                                </div>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="text" value="<?php echo $arrayr['id_folio']; ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-sm-2">
                                                    <label class="control-label" style="position:relative; top:7px;"><strong>Usuario:</strong></label>
                                                </div>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="text" value="<?php echo $arrayr['nombre'].' '.$arrayr['apellidos']; ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-sm-2">
                                                    <label class="control-label" style="position:relative; top:7px;"><strong>Fecha:</strong></label>
                                                </div>
                                                <div class="col-sm-10">
                                                    <input type="" class="form-control" value="<?php echo strftime("%d/%b/%Y",strtotime($arrayr['fecha_creacion']));?>" name="fecha_solicitada" disabled>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-sm-2">
                                                    <label class="control-label" style="position:relative; top:7px;"><strong>Estatus:</strong></label>
                                                </div>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="estatus" required>
                                                        <?php $estatus = array('Pendiente','Rechazada', 'Autorizada'); 
                                                    sort($estatus, SORT_NATURAL | SORT_FLAG_CASE);
                                                    $selected= $arrayr['estatus'];
                                                    foreach($estatus as $estatus){
                                                    echo "<option value=\"$estatus\"";  
                                                    if ($estatus==$arrayr['estatus']) { 
                                                    echo "disabled selected"; } 
                                                    echo ">$estatus</option>";}?>
                                                    </select>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal" style="margin-right:auto">Cancelar</button>
                                    <button type="submit" name="editar" class="btn btn-success">Actualizar</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="delete_<?php echo md5($key.$arrayr['id_folio']); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" style="max-width: 600px !important;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="myModalLabel" style="font-size:18px">Eliminar requisición</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class=" text-center">
                                                <label for="" style="font-size:18px">
                                                   <strong>¿Estás seguro de eliminar la requisición con el folio <?php echo $arrayr['id_folio'];?>?</strong>
                                                </label>
                                    </div><br>
                                    <div class="container-fluid">
                                        <form method="POST" action="requisiciones.php?id=<?php echo $arrayr['id_folio']; ?>">
                                            <div class="row form-group">
                                                <div class="col-sm-3">
                                                    <label class="control-label" style="position:relative; top:7px;"><strong>Nombre:</strong></label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" value="<?php echo $arrayr['nombre'].' '.$arrayr['apellidos']; ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-sm-3">
                                                    <label class="control-label" style="position:relative; top:7px;"><strong>Departamento:</strong></label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" value="<?php echo $arrayr['depto']; ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-sm-3">
                                                    <label class="control-label" style="position:relative; top:7px;"><strong>Estatus:</strong></label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" value="<?php echo $arrayr['estatus']; ?>" disabled>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="eliminar" class="btn btn-success" style="margin-right:auto">Eliminar</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <tr>
                        <td><?php echo $arrayr['id_folio']; ?></td>
                        <td><?php echo strftime("%d/%b/%Y",strtotime($arrayr['fecha_creacion']));?><br><?php echo date('H:i', strtotime($arrayr['fecha_creacion']));?></td>
                        <td><?php echo $arrayr['nombre']." ".$arrayr['apellidos']; ?></td>
                        <td><?php echo $arrayr['depto']; ?></td>
                        <td class="td_estatus">
                            <?php if($arrayr['estatus'] == 'Autorizada'){?><a href="#edit_<?php echo md5($key.$arrayr['id_folio']); ?>" data-toggle="modal" role="button" class="btn btn-success btn-sm" value="<?php echo $arraya['estatus']; ?>"><?php echo $arrayr['estatus']; ?></a>
                            <?php }elseif($arrayr['estatus'] == 'Pendiente'){?>
                            <a href="#edit_<?php echo md5($key.$arrayr['id_folio']); ?>" data-toggle="modal" role="button" class="btn btn-secondary btn-sm" value="<?php echo $arraya['estatus']; ?>"><?php echo $arrayr['estatus']; ?></a>
                            <?php }else {?>
                            <a href="#edit_<?php echo md5($key.$arrayr['id_folio']); ?>" data-toggle="modal" role="button" class="btn btn-warning btn-sm" value="<?php echo $arraya['estatus']; ?>"><?php echo $arrayr['estatus']; ?></a>
                            <?php }?>
                        </td>
                        <td><a href="../html2pdf/requisicion.php?refd=<?php echo md5($key.$arrayr['id_folio']); ?>" target="_blank" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a></td>
                        <td><a href="#delete_<?php echo md5($key.$arrayr['id_folio']); ?>" class="btn btn-danger btn-sm" data-toggle="modal"><i class="fas fa-trash-alt"></i></a></td>
                    </tr>

                    <?php }while($arrayr=$requis->fetch_assoc());
            }else{ 
             echo "<tr><td colspan=12>No hay ninguna requisición registrada</td></tr>";
            }?>
                </tbody>
            </table>
        </div>
    </div>
    <?php include('../includes/footer.php'); ?>
</body>

</html>

<!-- -----------------TABLA----------------- -->
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js">
</script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js">
</script>
<script>
    $(document).ready(function() {
        $('#tablax').DataTable({
            language: {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "No hay ninguna requisición registrada",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "Buscar:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                "buttons": {
                    "copy": "Copiar",
                    "colvis": "Visibilidad"
                }
            },
            scrollY: 450,
            scrollCollapse: true,
            lengthMenu: [
                [5, 10, -1],
                [5, 10, "Todo"]

            ],
            "aaSorting": [],
            columnDefs: [{
                    width: "5%",
                    targets: 0
                },
                {
                    width: "12%",
                    targets: 1
                },
                {
                    width: "34%",
                    targets: 2
                },
                {
                    width: "34%",
                    targets: 3
                },
                {
                    width: "10%",
                    targets: 4
                },
                {
                    width: "5%",
                    targets: 5,
                    sortable: false
                },
                {
                    width: "7%",
                    targets: 6,
                    sortable: false
                }
            ]
        });
    });

</script>

<script>
    $('.modal').on('hidden.bs.modal', function() {
        $(this).find('form').trigger('reset');
    });

</script>
