<?php
include('../includes/connect.php');
session_start();
if (!isset($_SESSION['id_user']) && !isset($_SESSION['rol'])) {
	header("Location:../index.php");
    } else {
        if($_SESSION['rol'] != 5 && $_SESSION['rol']!=1){
            header("Location:../usuario/home.php");
        }
    }

$key = '5973C777%B7673309895AD%FC2BD1962C1062B9?3890FC277A04499¿54D18FC13677';

if($_SESSION['rol'] == 1){
$requis=$conectar->query("SELECT * FROM usuarios WHERE id_user='".$_SESSION['id_user']."'");
    $nr=$requis->num_rows;
    $arrayr=$requis->fetch_assoc();
    $depto =  $arrayr['departamento_id'];
    $_SESSION['departamento'] = $depto;
    $req=$conectar->query("SELECT usuarios.*, solicitudes.*, departamentos.* FROM solicitudes 
    INNER JOIN usuarios ON solicitudes.id_user= usuarios.id_user
    INNER JOIN departamentos ON usuarios.departamento_id = departamentos.id_depto WHERE (departamento_id='".$_SESSION['departamento']."') AND estatus='Pendiente' ORDER BY fecha_creacion DESC");
    $arrayr=$req->fetch_assoc();
    $nr=$req->num_rows;
} else{
    $req=$conectar->query("SELECT usuarios.*, solicitudes.*, departamentos.* FROM solicitudes 
    INNER JOIN usuarios ON solicitudes.id_user= usuarios.id_user
    INNER JOIN departamentos ON usuarios.departamento_id = departamentos.id_depto ORDER BY fecha_creacion DESC");
    $nr=$req->num_rows;
    $arrayr=$req->fetch_assoc();
}
if(isset($_REQUEST['folio'])){ 
$qaut=$conectar->query("SELECT * FROM solicitudes WHERE MD5(concat('".$key."',id_folio))='".$_REQUEST['folio']."'");
$aaut=$qaut->fetch_assoc();
}
                               
if(isset($_POST['editar'])){
    $id = $_GET['id'];
    $estatus=$_POST['estatus'];
    
    $conectar->query("UPDATE solicitudes SET estatus='$estatus' WHERE id_folio= '$id'");

    echo
    $_SESSION['success']='toastr.success("¡Estatus de requisición actualizado!", "Éxito",{ "progressBar": true, "positionClass": "toast-top-center","hideMethod": "slideUp","extendedTimeOut": "500"})';
    header("Location:autorizar.php");
    exit();
}

date_default_timezone_set('America/Mexico_City');
setlocale(LC_ALL, 'es_MX');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Autorizar</title>

    <?php include('../includes/head_links.php'); ?>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
</head>

<body>
    <?php 
        include('../includes/head.php');    
        include('../jquery/alerts.php');
    ?>

    <div class="cont">
        <div class="encabezado">
            <h3>Autorizar requisiciones</h3>
            <a href="home.php" class="btn btn-light btn-lg inicio"><i class="fas fa-home"></i></a>
        </div>

        <div class="tabla">
            <table id="tablax" class="display table-striped table-bordered dataTable">
                <thead>
                    <th>FOLIO</th>
                    <th>FECHA Y HORA DE CREACIÓN</th>
                    <th>USUARIO</th>
                    <th>DEPARTAMENTO</th>
                    <th>ESTATUS</th>
                    <th>CAMBIAR ESTATUS</th>
                    <th>VER</th>
                </thead>

                <tbody>
                    <?php if($nr>0){
                    do{ ?>
                    <!-- Ventana Editar Registros -->
                    <div class="modal fade edit" id="edit_<?php echo $arrayr['id_folio']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">Editar estatus de requisición</h4>
                                    <button type="button" class="close clear" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        <form method="POST" action="autorizar.php?id=<?php echo $arrayr['id_folio']; ?>">
                                            <div class="row form-group">
                                                <div class="col-sm-2">
                                                    <label class="control-label" style="position:relative; top:7px;"><strong>Folio:</strong></label>
                                                </div>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="text" value="<?php echo $arrayr['id_folio'];?>" disabled>
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
                                                    <label class="control-label" style="position:relative; top:7px;"><strong>Estatus:</strong></label>
                                                </div>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="estatus" required id="estatus">
                                                        <?php $estatus = array('Pendiente','Rechazada', 'Autorizada'); 
                                                    sort($estatus, SORT_NATURAL | SORT_FLAG_CASE);
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
                                    <button type="submit" name="editar" class="btn btn-success" style="margin-right:auto">Actualizar</button>
                                    <button type="button" class="btn btn-danger clear" data-dismiss="modal">Cancelar</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <tr>
                        <td><?php echo $arrayr['id_folio'];?> </td>
                        <td><?php echo strftime("%d/%b/%Y",strtotime($arrayr['fecha_creacion']));?><br><?php echo date('H:i', strtotime($arrayr['fecha_creacion']));?></td>
                        <td hi><?php echo $arrayr['nombre'].' '.$arrayr['apellidos'];?> </td>
                        <td><?php echo $arrayr['depto'];?></td>
                        <td><?php echo $arrayr['estatus']; ?></td>
                        <td><?php if($arrayr['id_user'] == $_SESSION['id_user']){?>
                            <span></span>
                            <?php }else{?>
                            <a href="#edit_<?php echo $arrayr['id_folio']; ?>" class="btn btn-success btn-sm" data-toggle="modal"><i class="fas fa-user-edit"></i></a><?php } ?>
                        </td>
                        <td><a href="../html2pdf/requisicion.php?refd=<?php echo md5($key.$arrayr['id_folio']); ?>" target="_blank" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a></td>
                    </tr>
                    <?php }while($arrayr=$req->fetch_assoc());
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
                    width: "8%",
                    targets: 0
                },
                {
                    width: "12%",
                    targets: 1
                },
                {
                    width: "36%",
                    targets: 2
                },
                {
                    width: "25%",
                    targets: 3
                },
                {
                    width: "9%",
                    targets: 4
                },
                {
                    width: "5%",
                    targets: 5,
                    sortable: false
                },
                {
                    width: "5%",
                    targets: 6,
                    sortable: false
                }
            ]
        });
    });

</script>

<script type="text/javascript">
    $('.edit').on('hidden.bs.modal', function() {
        $(this).find('form').trigger('reset');
    });

</script>
