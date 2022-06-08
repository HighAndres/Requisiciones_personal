<?php 
    session_start();
    session_destroy();
    unset($_SESSION['id_user']);
    unset($_SESSION['rol_id']);
    session_start();
    $_SESSION['log_out']='toastr.info("¡Hasta luego!", "Sesión cerrada",{  "closeButton": true,"progressBar": true,"positionClass": "toast-top-center", "timeOut": "5000","hideMethod": "slideUp","extendedTimeOut": "900"})';
    header("Location: ../index.php");
    exit();
    session_destroy();
?>