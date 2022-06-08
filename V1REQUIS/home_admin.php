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

    <div class="head_cab">
        <h3>MENÚ ADMINISTRADOR</h3>
    </div>
    <div class="wrap">
        <a href="requisiciones.php">
            <div class="menu_opc">
                <div class="panel1">
                    <h1>Requisiciones <br><br>&nbsp;</h1>
                </div>
                <div class="ico1">
                    <img src="../img/archives_icon_129343.png" alt="Requisiciones">
                </div>
            </div>
        </a>
        <a href="usuarios.php">
            <div class="menu_opc">
                <div class="panel1">
                    <h1>Usuarios<br><br>&nbsp;</h1>
                </div>
                <div class="ico1">
                    <img src="../img/people_users_icon_145877.png" alt="Usuarios">
                </div>
            </div>
        </a>
    </div>
    <?php include('../includes/footer.php'); ?>
</body>

</html>
