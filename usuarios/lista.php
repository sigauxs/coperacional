<!DOCTYPE html>
<html lang="es-CO">

<?php

$title = "Lista de usuarios";
$style = "lista.css";
include("../components/header.php");


?>

<body>
  <?php include("../components/brand.php") ?>
  <?php include("../components/navbar.php") ?>

  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <h3 class="text-center encabezado_listado fw-bolder mt-5" onclick="">Lista de usuarios </h3>
        <hr class="hr_red mx-auto">
        <br>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4" id="busquedas">
        <input type="text" 
               id="myInput" 
               class="form-control ms-4 mb-3"
               onkeyup="myFunction()" 
               title="Ingresar numero de identificación"
               placeholder="&#xF002; Buscar por numero de identificación....." 
               style="font-family:Arial, FontAwesome"
               >
      </div>

    </div>

    <div class="row">
      <div>
        <div class="container">
          <table class="table table-fixed table-hover table-striped">
            <thead>
              <tr>
                <th class="col-md-1">ID</th>
                <th class="col-md-2">USUARIO</th>
                <th class="col-md-3">NUMERO DOCUMENTO</th>
                <th class="col-md-3">LOCACIÓN</th>
                <th class="col-md-2">ÁREA</th>
                <th class="col-md-1">&</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="col-md-1">John</td>
                <td class="col-md-2">John</td>
                <td class="col-md-3">John</td>
                <td class="col-md-3">Doe</td>
                <td class="col-md-2">johndoe@email.com</td>
                <td class="col-md-1"><i class='fas fa-edit'></i></td>
              </tr>
              <tr>
                <td class="col-md-1">John</td>
                <td class="col-md-2">John</td>
                <td class="col-md-3">John</td>
                <td class="col-md-3">Doe</td>
                <td class="col-md-2">johndoe@email.com</td>
                <td class="col-md-1"><i class='fas fa-edit'></i></td>
              </tr>
              <tr>
                <td class="col-md-1">John</td>
                <td class="col-md-2">John</td>
                <td class="col-md-3">John</td>
                <td class="col-md-3">Doe</td>
                <td class="col-md-2">johndoe@email.com</td>
                <td class="col-md-1"><i class='fas fa-edit'></i></td>
              </tr>
              <tr>
                <td class="col-md-1">John</td>
                <td class="col-md-2">John</td>
                <td class="col-md-3">John</td>
                <td class="col-md-3">Doe</td>
                <td class="col-md-2">johndoe@email.com</td>
                <td class="col-md-1"><i class='fas fa-edit'></i></td>
              </tr>
              <tr>
                <td class="col-md-1">John</td>
                <td class="col-md-2">John</td>
                <td class="col-md-3">John</td>
                <td class="col-md-3">Doe</td>
                <td class="col-md-2">johndoe@email.com</td>
                <td class="col-md-1"><i class='fas fa-edit'></i></td>
              </tr>
              <tr>
                <td class="col-md-1">John</td>
                <td class="col-md-2">John</td>
                <td class="col-md-3">John</td>
                <td class="col-md-3">Doe</td>
                <td class="col-md-2">johndoe@email.com</td>
                <td class="col-md-1"><i class='fas fa-edit'></i></td>
              </tr>



            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

</body>

</html>