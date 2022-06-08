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
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Inicio</title>
    <link rel="stylesheet" href="../css/estilos.css">
    <?php include('../includes/head_links.php'); ?>
</head>

<body style="background-color:#E0E0E0">

    <?php 
        include('../includes/head.php');    
        include('../jquery/alerts.php');
    ?>
    
        <div class="modal fade" id="requisiciones" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">ELIGE UNA OPCIÓN</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <center>
                        <a class="btn btn-success btn-lg" href="autorizadas.php">Autorizadas</a><br><br>
                        <a class="btn btn-success btn-lg" href="rechazadas.php">Rechazadas</a>
                    </center>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <?php if($auser['rol_id']=='1') { ?>
    <div class="head_cab">
        <h3>MENÚ PRINCIPAL</h3>
    </div>
    <div class="wrap">
        <a href="autorizar.php">
            <div class="menu_opc">
                <div class="panel1">
                    <h1>Autorizar<br> Requisición</h1>
                </div>
                <div class="ico1">
                    <img src="../img/stamp.png" alt="Autorizar Requisición" style="">
                </div>
            </div>
        </a>

        <a href="alta_requisicion.php">
            <div class="menu_opc">
                <div class="panel1">
                    <h1>Generar<br> Requisición</h1>
                </div>
                <div class="ico1">
                    <img src="../img/curriculum_vitae_icon_129369.png" alt="Generar Requisición" style="">
                </div>
            </div>
        </a>

        <a href="#" data-toggle="modal" data-target="#requisiciones">
            <div class="menu_opc">
                <div class="panel1">
                    <h1>Requisiciones</h1><br>
                </div>
                <div class="ico1">
                    <img src="../img/checklist_icon_129185.png" alt="Autorizadas">
                </div>
            </div>
        </a>

        <a href="requisiciones_generadas.php">
            <div class="menu_opc">
                <div class="panel1">
                    <h1>Requisiciones Generadas</h1>
                </div>
                <div class="ico1">
                    <img src="../img/checklist_icon_129180.png" alt="Requisiciones Generadas" style="">
                </div>
            </div>
        </a>
    </div>

    <?php }elseif($auser['rol_id']=='2') { ?>

   
    <div class="head_cab">
        <h3>MENÚ PRINCIPAL</h3>
    </div>
    <div class="wrap">
        <a href="alta_requisicion.php">
            <div class="menu_opc">
                <div class="panel1">
                    <h1>Generar<br> Requisición</h1>
                </div>
                <div class="ico1">
                    <img src="../img/curriculum_vitae_icon_129369.png" alt="Generar Requisición">
                </div>
            </div>
        </a>

        <a href="listar_rh.php">
            <div class="menu_opc">
                <div class="panel1">
                    <h1>Listar RH<br>&nbsp;</h1>
                </div>
                <div class="ico1">
                    <img src="../img/checklist_icon_129185.png" alt="Listar RH">
                </div>
            </div>
        </a>

        <a href="requisiciones_generadas.php">
            <div class="menu_opc">
                <div class="panel1">
                    <h1>Requisiciones<br> Generadas</h1>
                </div>
                <div class="ico1">
                    <img src="../img/checklist_icon_129180.png" alt="Autorizadas">
                </div>
            </div>
        </a>
    </div>


    <?php } elseif($auser['rol_id']=='3') { ?>

           <div class="head_cab">
        <h3>MENÚ PRINCIPAL</h3>
    </div>
    <div class="wrap">
        <a href="alta_requisicion.php">
            <div class="menu_opc">
                <div class="panel1">
                    <h1>Generar <br>Requisición</h1>
                </div>
                <div class="ico1">
                    <img src="../img/curriculum_vitae_icon_129369.png" alt="Generar Requisición">
                </div>
            </div>
        </a>
        <a href="requisiciones_generadas.php">
            <div class="menu_opc">
                <div class="panel1">
                    <h1>Requisiciones<br> Generadas</h1>
                </div>
                <div class="ico1">
                    <img src="../img/checklist_icon_129180.png" alt="Requisiciones">
                </div>
            </div>
        </a>
    </div>

    <?php } else { ?>
    
    <div class="head_cab">
        <h3>MENÚ PRINCIPAL DIRECCIÓN</h3>
    </div>
    <div class="wrap">
        <a href="autorizar.php">
            <div class="menu_opc">
                <div class="panel1">
                    <h1>Autorizar<br> Requisición</h1>
                </div>
                <div class="ico1">
                    <img src="../img/stamp.png" alt="Autorizar Requisición" style="">
                </div>
            </div>
        </a>

        <a href="alta_requisicion.php">
            <div class="menu_opc">
                <div class="panel1">
                    <h1>Generar<br> Requisición</h1>
                </div>
                <div class="ico1">
                    <img src="../img/curriculum_vitae_icon_129369.png" alt="Generar Requisición" style="">
                </div>
            </div>
        </a>

        <a href="#" data-toggle="modal" data-target="#requisiciones">
            <div class="menu_opc">
                <div class="panel1">
                    <h1>Requisiciones</h1><br>
                </div>
                <div class="ico1">
                    <img src="../img/checklist_icon_129185.png" alt="Autorizadas">
                </div>
            </div>
        </a>

        <a href="requisiciones_generadas.php">
            <div class="menu_opc">
                <div class="panel1">
                    <h1>Requisiciones Generadas</h1>
                </div>
                <div class="ico1">
                    <img src="../img/checklist_icon_129180.png" alt="Requisiciones Generadas" style="">
                </div>
            </div>
        </a>
    </div>

    <?php } ?>

    <?php include('../includes/footer.php'); ?>
</body>

</html>
