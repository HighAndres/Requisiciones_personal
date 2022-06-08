<?php
include('../includes/connect.php');
session_start();
if (!isset($_SESSION['id_user']) && !isset($_SESSION['rol'])) {
	header("Location:../index.php");
} else {
    if($_SESSION['rol'] != 2){
        header("Location:home.php");
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

date_default_timezone_set('America/Mexico_City');
setlocale(LC_ALL, 'es_MX');
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Listar RH</title>

    <?php include('../includes/head_links.php'); ?>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
</head>

<body>
    <?php include('../includes/head.php'); 
        include('../jquery/alerts.php');?>

    <div class="cont">
        <div class="encabezado">
            <h3>Listar RH</h3>
            <a href="home.php" class="btn btn-light btn-lg inicio"><i class="fas fa-home"></i></a>
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
                </thead>

                <tbody>
                    <?php 
            if($nr>0){
                do{?>
                    <tr>
                       <td><?php echo $arrayr['id_folio'];?></td>
                        <td><?php echo strftime("%d/%b/%Y",strtotime($arrayr['fecha_creacion']));?><br><?php echo date('H:i', strtotime($arrayr['fecha_creacion']));?></td>
                        <td><?php echo $arrayr['nombre'].' '.$arrayr['apellidos'];?></td>
                        <td><?php echo $arrayr['depto'];?></td>
                        <td><?php echo $arrayr['estatus'];?></td>
                        <td><a href="../html2pdf/requisicion.php?refd=<?php echo md5($key.$arrayr['id_folio']); ?>" target="_blank" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a></td>
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
                [5, 10, 20, -1],
                [5, 10, 20, "Todo"]

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
                    width: "38%",
                    targets: 2
                },
                {
                    width: "28%",
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
                }
            ]
        });
    });

</script>