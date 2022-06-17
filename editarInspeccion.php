<?php

include("./include/typeAdmin.php");

session_start();

if (!isset($_SESSION['usuarioId'])) {
    header('location: index.php');
}

$idInspeccion = $_GET['idInspeccion'];

$fullname = $_SESSION['primerNombre'] . " " . $_SESSION['segundoNombre'] . " " . $_SESSION['primerApellido'] . " " . $_SESSION['segundoApellido'];
$_SESSION['fullname'] = $fullname;
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    
    <?php include("./components/navbar-movil.php") ?>
    <div class="container-fluid container-fluid-sm">

        <div class="row">
            <div class="offset-md-3 col-md-8">
                <div class="card mt-responsive mt-3 mx-auto div--center-border mb-3" style="z-index: 1;">

                    <div class="card-header">

                        <h5 class="card-title mb-0">Editar Inspección</h5>
                    </div>
                    <div class="card-body bg-transparent">

                        <form id="formInspeccion" action="" method="POST" class="needs-validation" novalidate>

                            <div class="mb-3 row align-items-center ">
                                <div class="col-sm-12 col-md-9 text-center">
                                    <input disabled type="hidden" value="<?php echo $idInspeccion; ?>" name="idInspector" id="idInspector" class="form-control text-center" required>
                                </div>
                            </div>

                            <div class="mb-3 row align-items-center ">
                                <div class="col-sm-12 col-md-3 text-center">
                                    <label> Fecha inspección </label>
                                </div>
                                <div class="col-sm-12 col-md-9 text-center">
                                    <input type="date" name="fechaInspeccion" id="fechaInspeccion" class="form-control text-center" required>
                                </div>
                            </div>




                            <div class="mb-3 row align-items-center">
                                <div class="col-sm-12 col-md-3 text-center">
                                    <label> Sede </label>
                                </div>
                                <div class="col-sm-12 col-md-9">
                                    <select class="form-select" name="sede" id="sedes" aria-label="Default select example" required>
                                        <option value="" selected>Escoger un Sede</option>
                                        <option value="1">Mina</option>
                                        <option value="2">Puertos</option>

                                    </select>
                                    <div class="invalid-feedback">
                                        Selecciona una Sede
                                    </div>
                                </div>


                            </div>

                            <div class="mb-3 row align-items-center">
                                <div class="col-sm-12 col-md-3 text-center">
                                    <label> Locacion </label>
                                </div>
                                <div class="col-sm-12 col-md-9">
                                    <select class="form-select" name="locacion" id="locacion" aria-label="Default select example" required>
                                        <option value="" selected>Escoger un locacion</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Selecciona una locacion
                                    </div>
                                </div>


                            </div>




                            <div class="mb-3 row align-items-center">
                                <div class="col-sm-12 col-md-3 text-center">
                                    <label> Vicepresidencia </label>
                                </div>
                                <div class="col-sm-12 col-md-9">
                                    <select class="form-select" name="vp" id="vp_idSede" name="vicepresidencia" aria-label="Default select example" required>
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
                                    <select class="form-select" id="dpto" name="dpto" name="departamento" aria-label="Default select example" required>
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
                                    <select class="form-select" name="area" id="area" aria-label="Default select example" required>
                                        <option value="" selected>Escoger un área</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Selecciona un Area
                                    </div>
                                </div>

                            </div>

                            <div class="mb-3 row align-items-center">

                                <div class="col-sm-12 col-md-3 text-center">
                                    <label> Inspector </label>
                                </div>
                                <div class="col-sm-12 col-md-9">
                                    <select id="inspector" class="form-select" name="inspector" aria-label="Default select example" required>
                                        <option <?php echo "value='" . $_SESSION['usuarioId']; ?> <?php echo "'" ?> selected><?php echo $fullname ?></option>
                                    </select>
                                </div>

                            </div>


                            <div class="mb-3 row align-items-center">
                                <div class="col-sm-12 col-md-3 text-center">
                                    <label> Turno </label>
                                </div>
                                <div class="col-sm-12 col-md-9">
                                    <select value="" class="form-select" id="turno" name="turno" aria-label="Default select example" required>
                                        <option selected value="">Escoger un Turno</option>
                                        <option value="1">Dia</option>
                                        <option value="2">Noche</option>

                                    </select>
                                </div>

                            </div>

                            <div class="mb-3 row align-items-center">
                                <div class="col-sm-12 col-md-3 text-center">
                                    <label> Delegado del Area </label>
                                </div>
                                <div class="col-sm-12 col-md-9">
                                    <select class="form-select" id="delegado" name="delegado" aria-label="Default select example" required>
                                        <option value="" selected>Escoger un delegado de area</option>
                                    </select>
                                </div>

                            </div>

                            <div class="mb-3 row align-items-center">
                                <div class="col-sm-12 col-md-3 text-center">
                                    <label> Responsable del Area </label>
                                </div>
                                <div class="col-sm-12 col-md-9">
                                    <select class="form-select" id="responsable" name="responsable" aria-label="Default select example" required>
                                        <option value="" selected>Escoger un responsable de area</option>
                                    </select>
                                </div>

                            </div>

                            <div class="mb-3 row">
                                <div class="col-sm-12 col-md-3 text-center">
                                    <label> Descripción </label>
                                </div>
                                <div class="col-sm-12 col-md-9 mb-3">
                                    <textarea id="description_inspeccion" class="form-control" name="descripcion" id="descripcionInspeccion" cols="30" rows="5" required></textarea>
                                </div>

                            </div>



                            <div class="mb-3 row">
                                <div class="col-sm-12 mb-2">
                                    <div class="d-grid gap-2 col-sm-12 offset-md-6 col-md-6">

                                        <button id="registrarInspeccion" class="btn btn-danger btn-login  btn-lg rounded-pill fw-bolder" type="submit">Registrar</button>
                                        <button type="button">Enviar</button>
                                        <!--<a class="btn btn-danger btn-login rounded-pill fw-bolder" href="./hallazgo.php">Ingresar  </a>-->

                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
        <div class="row">
       <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 bg-danger">
            <?php  include("./ListaHallazgos.php")?>
            </div>
            <div class="col-md-2"></div>
        </div>
       </div>
          
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="./js/defaultValue.js"></script>
    <script src="./js/services_select.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            let idInspeccion = <?php echo $idInspeccion ?>;
            
            getinspeccion(idInspeccion)
                .then(resp => {
                    console.log(resp);
                })
        })

        const getinspeccion = async (idInspeccion) => {
            const options = {
                method: "GET",
                headers: {
                    "Content-Type": "application/json",
                },
            };

            var url_get_inspeccion = new URL("http://localhost/cp/server/getinspeccion.php");
            var params = { idInspeccion: idInspeccion };

            url_get_inspeccion.search = new URLSearchParams(params).toString();
            console.log(url_get_inspeccion);

            let response = await fetch(url_get_inspeccion, options);
            let data = await response.json();
            return data;

        };


        let rgInspeccion = document.querySelector("#formInspeccion");
        rgInspeccion.addEventListener("change", (e) => {

            let area = rgInspeccion.elements['area'].value;
            let sedes = rgInspeccion.elements['sedes'].value;
            let locacion = rgInspeccion.elements['locacion'].value;
            let turno = rgInspeccion.elements['turno'].value;
            let delegado = rgInspeccion.elements['delegado'].value;
            let responsable = rgInspeccion.elements['responsable'].value;
            let descripcion = rgInspeccion.elements['description_inspeccion'].value;

            if (descripcion != "" && area != "" && sedes != "" && locacion != "" && turno != "" && delegado != "" && responsable != "") {
                console.log("llenaste los campos")
                $('#registrarInspeccion').attr('disabled', false);
            }

        })

        let formInspeccion = document.getElementById("formInspeccion");
        const url_registro_inspeccion = "http://localhost/cp/server/inspeccionRegister.php";

        const RegistrarHallazgo = async () => {
            let response = await fetch(url_registro_inspeccion, {
                method: 'POST',
                body: new FormData(formInspeccion)
            });
            let data = await response.json();
            return data;
        }

        let btnregistrar = document.getElementById("registrarInspeccion");

        btnregistrar.addEventListener("click", (e) => {
            e.preventDefault();
            RegistrarHallazgo().then(response => {
                if (response == "success") {
                    Swal.fire({
                        title: 'Inspeccion registrada',
                        text: "Deseas ingresar hallazgo a la inspección registrada.",
                        icon: 'success',
                        showCancelButton: true,
                        cancelButtonText: 'No',
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Si'
                    }).then((result) => {
                        if (!result.isConfirmed) {
                            location.href = "http://localhost/cp/menu.php";
                        } else {
                            location.href = "http://localhost/cp/hallazgo2.php"
                        }
                    })
                }
            })


        })
    </script>
    <script>
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
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