<?php
    $email=$conectar->query("SELECT * FROM usuarios INNER JOIN departamentos ON usuarios.departamento_id = departamentos.id_depto WHERE id_user='".$_SESSION['id_user']."'");
    $auser=$email->fetch_assoc();

        echo "<header>";
        echo "<img class='img_head' src='../img/icon.png' alt=''><label class='top_head'><label class='upper_head'> S</label><label class='inc_head'>ISTEMA DE REQUISICIONES</label></label>";
        echo "<nav>";
        echo "<div class='dropdown'>
              <button class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                  <p style='margin-bottom:7px;'><b> BIENVENIDO:</b></p>
                  <span><b>".$auser['nombre']." ". $auser['apellidos']."</b></span><br>
                  <span><b>".$auser['depto']."</b></span>
              </button>
              <div class='dropdown-menu dropdown-menu-right' aria-labelledby='dropdownMenuButton'>
                <a class='dropdown-item' href='#' data-toggle='modal' data-target='#logout'>Cerrar sesión</a>
              </div>
            </div>";
        echo "</nav>";
        echo "</header>";
?>

<div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle" style="font-size:17px">ATENCIÓN</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <center>
                    <label for="" style="font-size:18px"><strong>¿Desear salir del sistema de requisiciones?</strong></label><br>
                </center>
            </div>
            <div class="modal-footer">
                <a href="../includes/log_out.php" type="submit" name="editar" class="btn btn-success" style="margin-right:auto">Aceptar</a>
                <button type="button" class="btn btn-danger clear" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>