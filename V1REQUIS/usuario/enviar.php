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

$requis=$conectar->query("SELECT * FROM solicitudes s INNER JOIN usuarios u ON s.id_user=u.id_user ORDER BY fecha_creacion DESC");
$nr=$requis->num_rows;
$arrayr=$requis->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Envío de Requisición</title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <?php include('../includes/head_links.php'); ?>
</head>

<body>
    <?php include('../includes/head.php'); 
          include('../jquery/alerts.php');?>
    <?php 
        if (isset($_GET["id_folio"])){
        $id=(int)$_GET['id_folio'];
        }
    ?>
    <div class="msg">
        <div class="head_pdf">
            <?php echo "<label class='name_pdf'> ".$arrayr['nombre'].", tu información ha sido guardada con éxito.</label></br>"; ?>

            <?php echo "<label class='id_pdf'> Tu requisición se generó con el folio ".$id." </label>";  ?>
        </div>
        <div class="img_pdf">
            <img src="../img/check.gif" alt="">
        </div>
        <div class="bottom_pdf">
            <?php
               //echo "<a href='../pdf/pdf_requisicion.php?id_folio=".$id."' class='finalizar_pdf' target=_blank>Finalizar y enviar requisición</a>";
               echo "<a href='home.php' class='btn btn-success btn-lg'>Finalizar</a>";
	       ?>
        </div>
    </div>

    <?php include('../includes/footer.php'); ?>


</body>

</html>
