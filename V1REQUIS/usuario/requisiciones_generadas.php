<?php
include('../includes/connect.php');
session_start();
if (!isset($_SESSION['id_user'])) {
	header("Location:../index.php");
}

$key = '5973C777%B7673309895AD%FC2BD1962C1062B9?3890FC277A04499¿54D18FC13677';

$email=$conectar->query("SELECT * FROM usuarios WHERE id_user='".$_SESSION['id_user']."' ");
$auser=$email->fetch_assoc();

$requis=$conectar->query("SELECT * FROM solicitudes WHERE id_user='".$_SESSION['id_user']."' ORDER BY fecha_creacion DESC");
$arrayr=$requis->fetch_assoc();
$nr=$requis->num_rows;

date_default_timezone_set('America/Mexico_City');
setlocale(LC_ALL, 'es_MX');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Autorizadas</title>

    <?php include('../includes/head_links.php'); ?>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
</head>

<body>
    <?php include('../includes/head.php'); ?>

    <div class="cont">
        <div class="encabezado">
            <h3>Requisiciones generadas</h3>
            <a href="home.php" class="btn btn-light btn-lg inicio"><i class="fas fa-home"></i></a>
        </div>

        <div class="tabla">
            <table id="tablax" class="display table-striped table-bordered dataTable no-footer">
                <thead>
                    <th>FOLIO</th>
                    <th>FECHA Y HORA DE CREACIÓN</th>
                    <th>ESTATUS</th>
                    <th>IMPRIMIR</th>
                </thead>

                <tbody>
                    <?php 
            if($nr>0){
                do{?>
                    <tr>
                        <td><?php echo $arrayr['id_folio'];?></td>
                        <td><?php echo strftime("%d/%b/%Y",strtotime($arrayr['fecha_creacion']));?><br><?php echo date('H:i', strtotime($arrayr['fecha_creacion']));?></td>
                        <td><?php echo $arrayr['estatus'];?></td>
                        <?php if($arrayr['estatus']=='Autorizada'){?>
                        <td><a href="../pdf/pdf_requisicion.php?ref=<?php echo md5($key.$arrayr['id_folio']); ?>" target='_blank' class='btn btn-success btn-sm'><i class='fas fa-eye'></i></a></td>
                        <?php } else {?>
                        <td></td>
                        <?php }?>
                    </tr>
                    <?php }while($arrayr=$requis->fetch_assoc());
                    }else{
                    echo "<tr>
                            <td colspan=12>No hay ninguna requisición registrada</td>
                          </tr>";
                    }?>
                </tbody>

            </table>
        </div>
    </div>

    <?php include('../includes/footer.php'); ?>
</body>

</html>


<!-- -----------------TABLA----------------- -->
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js">
</script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js">
</script>
<script>
    $(document).ready(function() {
        $('#tablax').DataTable({
            language: {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
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
                [10, 20, -1],
                [10, 20, "Todo"]
            ],
            "aaSorting": [],
            columnDefs: [{
                    width: "18%",
                    targets: 0
                },
                {
                    width: "37%",
                    targets: 1
                },
                {
                    width: "35%",
                    targets: 2
                },
                {
                    width: "10%",
                    targets: 3,
                    sortable: false
                }
            ]
        });
    });

</script>
