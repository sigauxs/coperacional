<?php

include_once("./include/typeAdmin.php");

session_start();

if (!isset($_SESSION['usuarioId'])) {
    header('location: index.php');
}

$tipoUsuario = $_SESSION['tipoUsuario'];


?>


<!DOCTYPE html>
<html lang="es-CO">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control Operacional</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="./css/responsive.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/2dd4f6d179.js" crossorigin="anonymous"></script>
</head>

<body>

<?php include("./components/navbar.php") ?>
    <div class="container container-sm">
       
        <div class="row">
            <div class="offset-md-2 col-md-8">
                <div class="card mt-responsive mt-3 mx-auto div--center-border mb-3" style="z-index: 1;">

                    <div class="card-header">
                        
                    <h5 class="card-title mb-0">Registrar Inspección</h5>
                    </div>
                    <div class="card-body bg-transparent">

                        <form id="formInspeccion" action="./server/inspeccionRegister.php" method="POST" class="needs-validation" novalidate>

                            <div class="mb-3 row align-items-center ">
                                <div class="col-sm-12 col-md-3 text-center">
                                    <label> Fecha inspección </label>
                                </div>
                                <div class="col-sm-12 col-md-9 text-center">
                                    <input 
                                    type="date" 
                                    name="fechaInspeccion" 
                                    id="fechaInspeccion" 
                                    class="form-control text-center"
                                    required>
                                </div>

                            </div>




                            <div class="mb-3 row align-items-center">
                                <div class="col-sm-12 col-md-3 text-center">
                                    <label> Sede </label>
                                </div>
                                <div class="col-sm-12 col-md-9">
                                    <select class="form-select"  
                                            name="sede"  
                                            id="sedes" 
                                            aria-label="Default select example" 
                                            required>
                                        <option value="" selected>Escoger un Sede</option>
                                        <option value="1" >Mina</option>
                                        <option value="2" >Puertos</option>

                                    </select>
                                    <div class="invalid-feedback">
                                     Selecciona una Sede
                                    </div>
                                </div>
                               

                            </div>

                            

                            <div class="mb-3 row align-items-center">
                                <div class="col-sm-12 col-md-3 text-center">
                                    <label> Vicepresidencia </label>
                                </div>
                                <div class="col-sm-12 col-md-9">
                                    <select  
                                            class="form-select" 
                                            name="vp" 
                                            id="vp_idSede" 
                                            name="vicepresidencia" 
                                            aria-label="Default select example" 
                                            required>
                                        <option value="" selected>Escoger un Vicepresidencia</option>
                                    </select>
                                    <div class="invalid-feedback">
                                     Selecciona una vicepresidencia
                                    </div>
                                </div>

                            </div>

                            <div class="mb-3 row align-items-center">
                                <div class="col-sm-12 col-md-3 text-center">
                                    <label> Departamento </label>
                                </div>
                                <div class="col-sm-12 col-md-9">
                                    <select class="form-select" 
                                            id="dpto" 
                                            name="dpto"  
                                            name="departamento" 
                                            aria-label="Default select example"
                                            required>
                                        <option value="" selected>Escoger un Departamento</option>
                                    </select>
                                    <div class="invalid-feedback">
                                      Selecciona un Departamento
                                    </div>
                                </div>

                            </div>

                            <div class="mb-3 row align-items-center">
                                <div class="col-sm-12 col-md-3 text-center">
                                    <label> Área </label>
                                </div>
                                <div class="col-sm-12 col-md-9 ">
                                    <select class="form-select" 
                                            name="area" 
                                            id="area" 
                                            aria-label="Default select example" 
                                            required>
                                        <option value="" selected>Escoger un área</option>
                                    </select>
                                    <div class="invalid-feedback">
                                      Selecciona un Area
                                    </div>
                                </div>

                            </div>

                            <div class="mb-3 row align-items-center">
                                <div class="col-sm-12 col-md-3 text-center">
                                    <label> Inspeccionado </label>
                                </div>
                                <div class="col-sm-12 col-md-9">
                                    <select value="0" class="form-select" name="inspeccionado" aria-label="Default select example">
                                        <option value="0" selected>Escoger un Inspeccionado</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>

                            </div>


                            <div class="mb-3 row align-items-center">
                                <div class="col-sm-12 col-md-3 text-center">
                                    <label> Turno </label>
                                </div>
                                <div class="col-sm-12 col-md-9">
                                    <select value="0" class="form-select"  name="turno" aria-label="Default select example">
                                        <option selected>Escoger un Turno</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>

                            </div>

                            <div class="mb-3 row align-items-center">
                                <div class="col-sm-12 col-md-3 text-center">
                                    <label> Grupo </label>
                                </div>
                                <div class="col-sm-12 col-md-9">
                                    <select class="form-select" name="grupo" aria-label="Default select example">
                                        <option value="" selected>Escoger un grupo</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>

                            </div>

                            <div class="mb-3 row align-items-center">
                                <div class="col-sm-12 col-md-3 text-center">
                                    <label> Lider de Area </label>
                                </div>
                                <div class="col-sm-12 col-md-9">
                                    <select class="form-select" name="liderArea" aria-label="Default select example">
                                        <option value="" selected>Escoger un lider de area</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>

                            </div>


                            <div class="mb-3 row align-items-center">
                                <div class="col-sm-12 col-md-3 text-center">
                                    <label> Empresa </label>
                                </div>
                                <div class="col-sm-12 col-md-9">
                                    <select class="form-select" name="empresa" aria-label="Default select example">
                                        <option value="" selected>Escoger un área</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>

                            </div>


                            <div class="mb-3 row">
                                <div class="col-sm-12 col-md-3 text-center">
                                    <label> Descripción </label>
                                </div>
                                <div class="col-sm-12 col-md-9 mb-3">
                                    <textarea id="description_inspeccion"  
                                    class="form-control" name="descripcion" 
                                    id="descripcionInspeccion" cols="30" rows="5"></textarea>
                                </div>

                            </div>


                            
                            <div class="mb-3 row">
                                <div class="col-sm-12 mb-2">
                                    <div class="d-grid gap-2 col-sm-12 offset-md-6 col-md-6">

                                        <button class="btn btn-danger btn-login  btn-lg rounded-pill fw-bolder" type="submit">Ingresar</button>
                                        
                                        <!--<a class="btn btn-danger btn-login rounded-pill fw-bolder" href="./hallazgo.php">Ingresar  </a>-->

                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="./js/defaultValue.js"></script>
    <script src="./js/services_select.js"></script>
<script>
    (function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
</script>
</body>

</html>