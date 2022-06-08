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

/*$usuario=$conectar->query("SELECT * FROM usuarios s INNER JOIN roles u ON s.rol_id=u.id
INNER JOIN departamentos d ON s.departamento_id=d_id_depto");
$nr=$usuario->num_rows;
$arrayu=$usuario->fetch_assoc();*/

$usuario=$conectar->query("SELECT usuarios.*, roles.*, departamentos.* FROM usuarios 
INNER JOIN roles ON usuarios.rol_id= roles.id
INNER JOIN departamentos ON usuarios.departamento_id = departamentos.id_depto ORDER BY id_user DESC");
$nr=$usuario->num_rows;
$arrayu=$usuario->fetch_assoc();

if(isset($_REQUEST['e']) && !empty($_REQUEST['e'])){
    $n=rtrim(mb_convert_case($_REQUEST['name'], MB_CASE_TITLE, "UTF-8"));
    $ape=rtrim(mb_convert_case($_REQUEST['ap'], MB_CASE_TITLE, "UTF-8"));
    $pt=rtrim(mb_convert_case($_REQUEST['departamento'], MB_CASE_TITLE, "UTF-8"));
    $r=$_REQUEST['rol'];
    $em=rtrim(mb_convert_case($_REQUEST['e'], MB_CASE_LOWER, "UTF-8"));
    $p=rtrim($_REQUEST['pass']);
    $rp=rtrim($_REQUEST['rpass']);
    $checkemail=$conectar->query("SELECT * FROM usuarios WHERE email='$em'");
    $checar=$checkemail->num_rows;
    if($p==$rp){
      if($checar>0){
        $_SESSION['error']='toastr.warning("Ya existe un usuario designado con ese email, verifique sus datos", "Atención",{  "closeButton": true,"progressBar": true,"positionClass": "toast-top-center", "timeOut": "7000","hideMethod": "slideUp","extendedTimeOut": "500"})';
        header("Location: usuarios.php");
        exit();
      }else{
        $conectar->query("INSERT INTO usuarios VALUES(NULL,'$n','$ape','$pt','$em','$p','$r')");
        $_SESSION['success']='toastr.success("¡Usuario registrado!", "Éxito",{ "progressBar": true, "positionClass": "toast-top-center","hideMethod": "slideUp","extendedTimeOut": "500"})';
        header("Location: usuarios.php");
        exit();
        mysql_close($link);
      }
      
    }else{
    $_SESSION['error']='toastr.warning("Las contraseñas no coinciden, inténtalo de nuevo", "Atención",{  "closeButton": true,"progressBar": true,"positionClass": "toast-top-center", "timeOut": "7000","hideMethod": "slideUp","extendedTimeOut": "500"})';
    header("Location:usuarios.php");
    exit();
    }
  }

if(isset($_POST['editar'])){
    $id = $_GET['id'];
    $n=rtrim(mb_convert_case($_POST['n'], MB_CASE_TITLE, "UTF-8"));
    $apellidos=rtrim(mb_convert_case($_POST['apellidos'], MB_CASE_TITLE, "UTF-8"));
    $departamento=$_POST['depto'];
    $email=rtrim(mb_convert_case($_POST['email'], MB_CASE_LOWER, "UTF-8"));
    $password=rtrim($_POST['password']);
    
    $conectar->query("UPDATE usuarios SET nombre='$n', apellidos='$apellidos', departamento_id='$departamento', email='$email', password='$password' WHERE id_user= '$id'");

    $_SESSION['success']='toastr.success("¡Información de usuario actualizada!", "Éxito",{ "progressBar": true, "positionClass": "toast-top-center","hideMethod": "slideUp","extendedTimeOut": "500"})';
    header("Location:usuarios.php");
    exit();
}

if(isset($_POST['editar_rol'])){
    $id = $_GET['id'];
    $rol_edit = $_POST['rol_edit'];
    
    $conectar->query("UPDATE usuarios SET rol_id='$rol_edit' WHERE id_user= '$id'");

    $_SESSION['success']='toastr.success("¡Rol de usuario actualizado!", "Éxito",{ "progressBar": true, "positionClass": "toast-top-center","hideMethod": "slideUp","extendedTimeOut": "500"})';
    header("Location:usuarios.php");
    exit();
}

if(isset($_POST['eliminar'])){
    $id = $_GET['id'];
    
    $conectar->query("DELETE FROM usuarios WHERE id_user= '$id'");
    $_SESSION['success']='toastr.success("¡Se ha eliminado el registro!", "Éxito",{ "progressBar": true, "positionClass": "toast-top-center","hideMethod": "slideUp","extendedTimeOut": "700"})';
    header("Location:usuarios.php");
    exit();
}

date_default_timezone_set('America/Mexico_City');
setlocale(LC_ALL, 'es_MX');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Administrar usuarios</title>
    <style>
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

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">

</head>

<body>
    <?php 
        include('../includes/head.php');    
        include('../jquery/alerts.php');
    ?>

    <div class="modal fade agregar" id="add_<?php echo md5($key.$arrayu['id_user']); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 700px !important;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Agregar usuario</h5>
                    <button type="button" class="close clear" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <form method="POST" action="usuarios.php?id=<?php echo $arrayu['id_user']; ?>">
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row form-group">
                                <label for="nombre" class="col-sm-4 col-form-label">
                                    <strong>Nombre(s):</strong>
                                </label>
                                <div class="col-sm-8">
                                    <input type="text" name="name" class="form-control" placeholder="Nombre(s)" id="nombre" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="apellidos" class="col-sm-4 col-form-label">
                                    <strong>Apellidos:</strong>
                                </label>
                                <div class="col-sm-8">
                                    <input type="text" name="ap" id="apellidos" class="form-control" placeholder="Apellidos" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="dept" class="col-sm-4 col-form-label"><strong>Departamento:</strong></label>
                                <div class="col-sm-8">
                                    <select name="departamento" class="selectpicker depto_add" id="dept" required style="width:100%;">
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
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="em" class="col-sm-4 col-form-label"><strong>Email:</strong></label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control no_space" name="e" placeholder="Ejemplo: alguien@gmail.com" required autocomplete="off">
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="pass" class="col-sm-4 col-form-label"><strong>Contraseña:</strong></label>
                                <div class="input-group col-sm-8">
                                    <input class="form-control password no_space" type="password" name="pass" placeholder="Contraseña" autocomplete="off" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <input class="ShowPassword" type="checkbox">
                                            <span class="msj">&nbsp; Ver</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="rp" class="col-sm-4 col-form-label"><strong>Repite la contraseña:</strong></label>
                                <div class="input-group col-sm-8">
                                    <input name="rpass" type="password" class="form-control password no_space" placeholder="Repite la contraseña" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="rol" class="col-sm-4 col-form-label"><strong>Rol:</strong></label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="rol" id="rol" style="cursor:pointer" required>
                                        <option value="" selected disabled>Selecciona una opción...</option>
                                        <?php $roles=$conectar->query("SELECT * FROM roles ORDER BY rol ASC");
                                                while($rol_user=$roles->fetch_array()){
                                                    $hidden = ($rol_user['id'] == '5') ? 'hidden':'';
                                                    echo "<option $hidden value='".$rol_user['id']."'>".$rol_user['rol']."</option>"; }?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="agregar" class="btn btn-success" id="add_user" style="margin-right:auto">Guardar</button>
                        <button type="button" class="btn btn-danger clear" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="cont">
        <div class="encabezado">
            <h3>Administrar usuarios</h3>
            <a href="home_admin.php" class="btn btn-light btn-lg inicio"><i class="fas fa-home"></i></a>
        </div>

        <div class="tabla">
            <table id="tablax" class="display table-striped table-bordered dataTable">
                <div class="float-right">
                    <a href="#add_<?php echo md5($key.$arrayu['id_user']); ?>" class="btn btn-info btn-sm" data-toggle="modal">Agregar &nbsp;<i class="fas fa-plus"></i></a>
                </div>
                <thead>
                    <th>NOMBRE</th>
                    <th>DEPARTAMENTO</th>
                    <th>EMAIL</th>
                    <th>ROL</th>
                    <th>EDITAR</th>
                    <th>ELIMINAR</th>
                </thead>

                <tbody>
                    <?php if($nr>0){
                    do{ ?>

                    <div class="modal fade editar" id="edit_<?php echo md5($key.$arrayu['id_user']); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog modal-dialog-centered" style="max-width: 700px !important;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="myModalLabel">Editar datos de usuario</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <form method="POST" action="usuarios.php?id=<?php echo $arrayu['id_user']; ?>">
                                    <?php 

                                    ?>
                                    <div class="modal-body">
                                        <div class="container-fluid">
                                            <div class="row form-group">
                                                <label class="col-sm-4 col-form-label">
                                                    <strong>Nombre(s):</strong>
                                                </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="n" value="<?php echo $arrayu['nombre']; ?>" required>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <label class="col-sm-4 col-form-label"><strong>Apellidos:</strong>
                                                </label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" name="apellidos" type="text" value="<?php echo $arrayu['apellidos']; ?>" required>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <label for="" class="col-sm-4 col-form-label"><strong>Departamento:</strong></label>
                                                <div class="col-sm-8">
                                                    <select name="depto" class="selectpicker depto_edit" required style="width:100%;">
                                                        <?php $deptos=$conectar->query("SELECT * FROM departamentos ORDER BY tipo_depto ASC, depto ASC");
                                                    while($fila = mysqli_fetch_assoc($deptos)) {
                                                        $groups[$fila['tipo_depto']][$fila['id_depto']] = $fila['depto'];}?>
                                                        <?php foreach($groups as $label => $opt){ ?>
                                                        <optgroup label="<?php echo $label; ?>">
                                                            <?php foreach ($opt as $id => $name){?>
                                                            <option value="<?php echo $id ?>" <?php if ($arrayu['depto'] == $name) {
                                                            echo 'selected';} ?>><?php echo $name ?></option>
                                                            <?php } ?>
                                                        </optgroup>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <label class="col-sm-4 col-form-label"><strong>Email:</strong></label>
                                                <div class="col-sm-8">
                                                    <input class="form-control no_space" name="email" type="email" value="<?php echo $arrayu['email']; ?>" required>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <label for="pass" class="col-sm-4 col-form-label"><strong>Contraseña:</strong></label>
                                                <div class="input-group col-sm-8">
                                                    <input class="form-control password no_space" type="password" name="password" placeholder="Contraseña" autocomplete="off" value="<?php echo $arrayu['password']; ?>" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <input class="ShowPassword" type="checkbox">
                                                            <span class="msj">&nbsp; Ver</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="editar" class="btn btn-success" style="margin-right:auto">Actualizar</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal fade" id="delete_<?php echo md5($key.$arrayu['id_user']); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog modal-dialog-centered" style="max-width: 600px !important;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="myModalLabel" style="font-size:18px">Eliminar usuario</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <form method="POST" action="usuarios.php?id=<?php echo $arrayu['id_user']; ?>">
                                    <div class="modal-body">
                                        <div class=" text-center">
                                            <label for="" style="font-size:18px">
                                                <strong>¿Estás seguro de eliminar este usuario?</strong>
                                            </label>
                                        </div><br>
                                        <div class="container-fluid">
                                            <div class="row form-group">
                                                <div class="col-sm-3">
                                                    <label class="control-label" style="position:relative; top:7px;"><strong>Nombre:</strong></label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" value="<?php echo $arrayu['nombre'].' '.$arrayu['apellidos']; ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-sm-3">
                                                    <label class="control-label" style="position:relative; top:7px;"><strong>Departamento:</strong></label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" value="<?php echo $arrayu['depto']; ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-sm-3">
                                                    <label class="control-label" style="position:relative; top:7px;"><strong>Rol:</strong></label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" value="<?php echo $arrayu['rol']; ?>" disabled>
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

                    <div class="modal fade rol" id="rol_<?php echo md5($key.$arrayu['id_user']); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog modal-dialog-centered" style="max-width: 600px !important;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="myModalLabel" style="font-size:18px">Editar rol de usuario</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <form method="POST" action="usuarios.php?id=<?php echo $arrayu['id_user']; ?>">
                                    <div class="modal-body">
                                        <div class=" text-center">
                                            <label for="" style="font-size:25px">
                                                <strong>Roles:</strong>
                                            </label>
                                            <div class="row form-group">
                                                <div class="col-sm-12 p-3 align-middle">
                                                    <button tabindex="0" class="m-2 btn btn-sm btn-info" type="button" data-toggle="popover" data-trigger="focus" title="Rol Administrador" data-content="Agrega, elimina, edita usuarios y requisiciones.">Administrador <i class="fas fa-info-circle"></i></button>
                                                    <button tabindex="0" class="m-2 btn btn-sm btn-info" type="button" data-toggle="popover" data-trigger="focus" title="Rol Dirección General" data-content="Autoriza todas las requisiciones de todos los departamentos, alta de requisición, requisiciones autorizadas y rechazadas, eliminar requisiciones y requisiciones generadas.(Solicitar a sistemas este tipo de rol)">Dirección General <i class="fas fa-info-circle"></i></button>
                                                    <button tabindex="0" class="m-2 btn btn-sm btn-info" type="button" data-toggle="popover" data-trigger="focus" title="Rol Director/Gerente" data-content="Autoriza todas las requisiciones del departamento al que pertenezca, alta de requisición, eliminar requisiciones, requisiciones autorizadas y rechazadas y autorizaciones generadas.">Director/Gerente <i class="fas fa-info-circle"></i></button><br>
                                                    <button tabindex="0" class="m-2 btn btn-sm btn-info" type="button" data-toggle="popover" data-trigger="focus" title="Rol Recursos Humanos" data-content="Apartado de Listar RH, alta de requisición y requisiciones generadas.">Recursos Humanos <i class="fas fa-info-circle"></i></button>
                                                    <button tabindex="0" class="m-2 btn btn-sm btn-info" type="button" data-toggle="popover" data-trigger="focus" title="Rol Usuario" data-content="Alta de requisición y requisiciones generadas.">Usuario <i class="fas fa-info-circle"></i></button>
                                                </div>
                                            </div>
                                            <div class="container-fluid text-left">
                                                <div class="row form-group">
                                                    <div class="col-sm-3">
                                                        <label class="control-label" style="position:relative; top:7px;"><strong>Nombre:</strong></label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="text" value="<?php echo $arrayu['nombre'].' '.$arrayu['apellidos']; ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col-sm-3">
                                                        <label class="control-label" style="position:relative; top:7px;"><strong>Departamento:</strong></label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="text" value="<?php echo $arrayu['depto']; ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <label class="col-sm-3 col-form-label"><strong>Rol:</strong></label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" name="rol_edit" style="cursor:pointer">
                                                            <?php 
                                                    $roles=$conectar->query("SELECT * FROM roles ORDER BY rol ASC");
                                                    while($rol_user=$roles->fetch_array()){
                                                    $hidden = ($rol_user['id'] == '5') ? 'hidden':'';
                                                    $selected_rep = ($rol_user['id'] == $arrayu['rol_id']) ? 'selected="selected" disabled':'';
                                                        echo "<option $hidden $selected_rep value='". $rol_user['id']."'>" . $rol_user['rol']. "</option>\n";
                                                    }?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="editar_rol" class="btn btn-success" style="margin-right:auto">Actualizar</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <tr>
                        <td><?php echo $arrayu['nombre'].' '.$arrayu['apellidos'];?></td>
                        <td><?php echo $arrayu['depto'];?></td>
                        <td><?php echo $arrayu['email'];?></td>
                        <td><a href="#rol_<?php echo md5($key.$arrayu['id_user']);?>" class="btn btn-block btn btn-secondary btn-sm" data-toggle="modal"><?php echo $arrayu['rol']; ?></a></td>
                        <td><a href="#edit_<?php echo md5($key.$arrayu['id_user']); ?>" class="btn btn-success btn-sm" data-toggle="modal"><i class="fas fa-user-edit"></i></a></td>
                        <!--<td><a href="#view_<?php echo md5($key.$arrayu['id_user']); ?>" class="btn btn-info btn-sm" data-toggle="modal"><i class="fas fa-eye"></i></a></td>-->
                        <td><a href="#delete_<?php echo md5($key.$arrayu['id_user']); ?>" class="btn btn-danger btn-sm" data-toggle="modal"><i class="fas fa-trash-alt"></i></a></td>
                    </tr>
                    <?php }while($arrayu=$usuario->fetch_assoc());
            }else{ 
             echo "<tr><td colspan=12>No hay ningún registro</td></tr>";
            }?>
                </tbody>
            </table>
        </div>
    </div>
    <?php include('../includes/footer.php'); ?>

</body>

</html>

<!-- -----------------TABLA----------------- -->
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready(function() {
        $('#tablax').DataTable({
            language: {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "No hay ningún registro",
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
                    width: "28%",
                    targets: 0
                },
                {
                    width: "21%",
                    targets: 1
                },
                {
                    width: "36%",
                    targets: 2
                },
                {
                    width: "13%",
                    targets: 3
                },
                {
                    width: "5%",
                    targets: 4,
                    sortable: false
                },
                {
                    width: "6%",
                    targets: 5,
                    sortable: false
                }
            ]
        });
    });

</script>

<script>
    $(function() {
        $('.no_space').on('keypress', function(e) {
            if (e.which == 32)
                return false;
        });
    });

</script>

<script>
    $(document).ready(function() {
        $('.depto_add').select2().on('select2:opening', function(e) {
            $(this).data('select2').$dropdown.find(':input.select2-search__field').attr('placeholder', 'Escribe para buscar...')
        });
    });

    $(document).ready(function() {
        $('.depto_edit').select2().on('select2:opening', function(e) {
            $(this).data('select2').$dropdown.find(':input.select2-search__field').attr('placeholder', 'Escribe para buscar...')
        });
    });

</script>

<script>
    $(document).ready(function() {
        //CheckBox mostrar contraseña
        $('.ShowPassword').click(function() {
            $('.password').attr('type', $(this).is(':checked') ? 'text' : 'password');
        })
        $('.ShowPassword').change(function() {
            if (!$(this).prop('checked')) {
                $('.msj').show();
            } else {
                $('.msj').hide();
            }
        })
    });

</script>

<script type="text/javascript">
    $('.agregar').on('hidden.bs.modal', function() {
        $(this).find('form').trigger('reset');
        $('#dept').val('').trigger('change.select2');
        $('.password').attr('type', 'password');
        $('.password2').attr('type', 'password');
        $('.msj').show();

    });
    $('.editar').on('hidden.bs.modal', function() {
        $(this).find('form').trigger('reset');
        $('.depto_edit').trigger('change.select2');
        $('.password').attr('type', 'password');
        $('.msj').show();
    });
    $('.rol').on('hidden.bs.modal', function() {
        $(this).find('form').trigger('reset');
    });

</script>

<script>
    $(function() {
        $('[data-toggle="popover"]').popover({
            html: true
        })
    });

</script>
