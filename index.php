<?php
include( 'includes/connect.php' );

session_start();
if (isset( $_SESSION['id_user'] ) && isset( $_SESSION['rol'] )) {
    switch( $_SESSION['rol'] ) {
        case 1:
            header( "Location:usuario/home.php" );
            break;
            
        case 2:
            header( "Location:usuario/home.php" );
            break;

        case 3:
            header( "Location:usuario/home.php" );
            break;
            
        case 4:
            header( "Location:administrador/home_admin.php" );
            break;
            
        case 5:
            header( "Location:usuario/home.php" );
            break;
        
        default:
    }
}
if ( isset( $_POST['e']) && isset( $_POST['p'])) {
    $e = $_POST['e'];
    $p = $_POST['p'];
    $resultado = $conectar->query( "SELECT * FROM usuarios WHERE email='$e' AND password='$p' LIMIT 1" );
    $arrayp=$resultado->fetch_assoc();
    $siesta = $resultado->num_rows;
    if ( $siesta == 1 ) {
    $id_user = $arrayp['id_user'];
    $_SESSION['id_user']=$id_user;
    $rol = $arrayp['rol_id'];
    $_SESSION['rol'] = $rol;
        switch( $_SESSION['rol'] ) {
                case 1:
                    header( "Location:usuario/home.php" );
                    break;

                case 2:
                    header( "Location:usuario/home.php" );
                    break;

                case 3:
                    header( "Location:usuario/home.php" );
                    break;

                case 4:
                    header( "Location:administrador/home_admin.php" );
                    break;
                
                case 5:
                    header( "Location:usuario/home.php" );
                    break;

                default:
                }
        $_SESSION['success'] = 'toastr.success("¡Bienvenido!", "Acceso exitoso",{ "progressBar": true, "timeOut": "2000", "positionClass": "toast-top-center","hideMethod": "slideUp","extendedTimeOut": "700"})';
        exit();
    } else {
        $_SESSION['error'] = 'toastr.error("Error en el correo o contraseña", "Verifica tus datos",{  "closeButton": true,"progressBar": true,"positionClass": "toast-top-center", "timeOut": "7000", "hideMethod": "slideUp","extendedTimeOut": "900"})';
        header( "Location:index.php" );
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head><meta charset="euc-jp">
    <title>Login</title>

    
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
    <link rel="icon" type="image/png" href="img/favicon.ico">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/toast/toastr.min.css">
    <script src="css/toast/toastr.min.js"></script>
</head>

<body>
    <?php include('jquery/alerts.php');?>
    <div class="container-portada">
        <div class="capa-gradient"></div>
    </div>

    <div class="login">
        <div class="img_wal">
            <img class="logo_cont" src="./img/GWVertical.jpg" alt="Walworth">
        </div>

        <div class="acceso">
            <div class="superior">
                <h1 class="titulo">Requisiciones</h1>
            </div>
            <div class="frm">
                <form method="POST" action="">
                    <div data-validate="Usuario incorrecto">
                        <label class="usuario">Correo:</label>
                        <input type="email" name="e" class="mail" placeholder="Escribe tu correo..." required>
                    </div>

                    <div>
                        <label class="contra">Contraseña:</label>
                        <input type="password" name="p" class="pass" placeholder="Escribe tu contraseña..." required>
                    </div><br>

                    <div class="entrar">
                        <button class="btn btn-success btn-lg btn-block" type="submit" name="submit">Entrar</button>
                    </div>                
                </form>
            </div>
        </div>
    </div>
</body>

</html>
