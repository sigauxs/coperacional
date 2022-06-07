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
  <link href="./css/responsive.css" rel="stylesheet">
  <link href="./css/style.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/2dd4f6d179.js" crossorigin="anonymous"></script>


  <style>
    * {
      box-sizing: border-box;
      font-family: 'Open Sans', sans-serif;
      font-weight: 300;
    }

    a {
      text-decoration: none;
      color: inherit;
    }

    p {
      font-size: 1.1em;
      margin: 1em 0;
    }

    .description {
      margin: 1em auto 2.25em;
    }

    body {
      /*
      width: 40%;
      min-width: 300px;
      max-width: 400px;
      margin: 1.5em auto;
      color: #333;*/
    }

    h1 {
      font-family: 'Pacifico', cursive;
      font-weight: 400;
      font-size: 2.5em;
    }

    .card ul {
      list-style: none;
      padding: 0;
    }

    .card ul .inner {
      padding-left: 1em;
      overflow: hidden;
      display: none;
    }

    .card ul li {
      margin: .5em 0;
    }

    .card ul li a.toggle {
      width: 100%;
      display: block;
      background: rgba(0, 0, 0, 0.78);
      color: #fefefe;
      padding: .75em;
      border-radius: 0.15em;
      transition: background .3s ease;
    }

    .card ul li a.toggle:hover {
      background: rgba(0, 0, 0, 0.9);
    }

    .modalContainer {
      display: none;
      position: fixed;
      z-index: 1;
      padding-top: 100px;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgb(0, 0, 0);
      background-color: rgba(0, 0, 0, 0.4);
    }

    .modalContainer .modal-content {
      background-color: #fefefe;
      margin: auto;
      padding: 20px;
      border: 1px solid lightgray;
      border-top: 10px solid #58abb7;
      width: 60%;
    }

    .modalContainer .close {
      color: #aaaaaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }

    .modalContainer .close:hover,
    .modalContainer .close:focus {
      color: #000;
      text-decoration: none;
      cursor: pointer;
    }
  </style>
</head>

<body>

  <div class="container">
    <div class="row">
      <div class="div--center">


        <div class="card mt-responsive mx-auto div--center-border w-card mb-3" style="z-index: 1;">
          <div class="card-body" id="card-body">

            <select name="" id="empresas"></select>





            <ul class="accordion">

            </ul>

            <div id="myModal" class="modal fade" tabindex="-1">
              <div class="modal-dialog">
                <div class="modal-content">
                  <p>hoal mundo</p>
                </div>
              </div>
            </div>


            <div class="m-4">
              <!-- Button HTML (to Trigger Modal) -->

            </div>

          </div>
        </div>


        <button type="button" id="btnModal" class="btn btn-info btn-lg" data-toggle="modal" data-target="#miModal">Abrir Modal</button>
<!-- Modal -->
<div id="miModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Contenido del modal -->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <p>Texto del modal</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>




        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
<script>
  

  

  
</script>

        <script>
          const accordion = document.querySelector('.accordion');
          const factoresRiesgo = 1;
          const peligroRiesgo = 2;
          const controles = 3;
          const desviaciones = 4;



          const fetchDataHallazgo = async (factorRiesgo, peligroRiesgo, controles, desviaciones) => {

            const options = {
              method: "GET",
              headers: {
                "Content-Type": "application/json",
              },
            };

            var url = new URL("http://localhost/cp/api/hallazgo.php");
            var params = {
              factorRiesgo: factorRiesgo,
              peligroRiesgo: peligroRiesgo,
              controles: controles,
              desviaciones: desviaciones
            };
            url.search = new URLSearchParams(params).toString();

            const response = await fetch(url, options);
            const data = await response.json();
            return data;
          }


          const fechDataEmpresa = async () => {

            const options = {
              method: "GET",
              headers: {
                "Content-Type": "application/json",
              },
            };

            var url = new URL("http://localhost/cp/api/empresas.php");
            var params = {};
            url.search = new URLSearchParams(params).toString();

            const response = await fetch(url, options);
            const data = await response.json();
            return data;

          }


          let company = document.getElementById("empresas");

          fechDataEmpresa().then(empresas => {
            empresas.map((empresa) => {
              const newOption = document.createElement("option");
              let data = Object.values(empresa);
              newOption.value = data[0];
              newOption.text = data[1];
              company.appendChild(newOption);
            })
          })

          fetchDataHallazgo(factoresRiesgo, "", "", "", "")
            .then(dataHallazgo => {
              console.log("123");
              dataHallazgo.map((factorRiesgo) => {


                let lilvl1 = document.createElement("li");
                let alvl1 = document.createElement("a");
                let ulSubLvl1 = document.createElement("ul");
                let ulSubLiLvl1 = document.createElement("li");



                alvl1.classList.add("toggle");
                alvl1.setAttribute("href", "javascript:void(0);");
                alvl1.textContent = factorRiesgo.NombreFactor;

                ulSubLvl1.classList.add("inner");
                ulSubLiLvl1.setAttribute("id", `${factorRiesgo.NombreFactor.split(' ').join('')}`)


                fetchDataHallazgo("", factorRiesgo.idFactor, "", "")
                  .then(peligroRiesgoS => {
                    let ulSubLiLvl2M = document.querySelector(`#${factorRiesgo.NombreFactor.split(' ').join('')}`);
                    peligroRiesgoS.map((peligro) => {

                      let lilvl2 = document.createElement("li");
                      let alvl2 = document.createElement("a");
                      let ulSubLvl2 = document.createElement("ul");
                      let ulSubLiLvl2 = document.createElement("li");

                      let idCleanLvl2 = peligro.Nombre_Peligro.split(' ').join('');
                      idCleanLvl2.split(',').join('');

                      alvl2.classList.add("toggle");
                      alvl2.setAttribute("href", "javascript:void(0);");
                      alvl2.textContent = peligro.Nombre_Peligro;

                      ulSubLvl2.classList.add("inner");
                      ulSubLiLvl2.setAttribute("id", `${idCleanLvl2.split(',').join('')}`);

                      fetchDataHallazgo("", "", peligro.id_Peligro, "").then(controles => {
                        let ulSubLiLvl3M = document.querySelector(`#${idCleanLvl2.split(',').join('')}`);

                        controles.map(control => {

                          let lilvl3 = document.createElement("li");
                          let alvl3 = document.createElement("a");
                          let ulSubLvl3 = document.createElement("ul");
                          let ulSubLiLvl3 = document.createElement("li");

                          let idCleanLvl3 = control.Descripcion_Control.split(' ').join('');
                          idCleanLvl3.split(',').join('');

                          ulSubLvl3.setAttribute("style", "padding-left:0");

                          alvl3.classList.add("toggle");
                          alvl3.setAttribute("href", "javascript:void(0);");
                          alvl3.textContent = control.Descripcion_Control;

                          ulSubLvl3.classList.add("inner");

                          /*================  Create Modal  ===============================*/

                          let buttonRegister = document.createElement("button");
                          buttonRegister.setAttribute("id", "btnModal");
                          buttonRegister.textContent = "Registrar Desviacion";

                          let divModal = document.createElement("div");
                          divModal.setAttribute("id", "myModal");
                          divModal.classList.add("modalContainer");

                          let divContent = document.createElement("div");
                          divContent.classList.add("modal-content");

                          let spanClose = document.createElement("span");
                          spanClose.classList.add("close");
                          spanClose.textContent = "x";

                          /* ======================== End Modal ============================ */





                          let form = document.createElement("form");
                          form.setAttribute("id", "desviaciones");

                          let textarea = document.createElement("textarea");
                          textarea.setAttribute("name", "descripcion");
                          textarea.setAttribute("rows", "5");
                          textarea.setAttribute("cols", "40");

                          let select = document.createElement("select");
                          select.setAttribute("name", `desviacion`);
                          select.setAttribute("id", `${idCleanLvl3.split(',').join('')}`);


                          ulSubLiLvl3.appendChild(buttonRegister);
                          ulSubLiLvl3.appendChild(divModal);
                          divModal.appendChild(divContent);
                          divContent.appendChild(spanClose);
                          divContent.appendChild(form);

                          form.appendChild(select);
                          form.appendChild(textarea);


                          fetchDataHallazgo("", "", "", control.idControl).then(desviaciones => {

                            desviaciones.map((desviacion) => {
                              const newOption = document.createElement("option");
                              let data = Object.values(desviacion);
                              newOption.value = data[0];
                              newOption.text = data[1];
                              select.appendChild(newOption);
                            })

                          })
                          /*lilvl3.setAttribute("id",`${idCleanLvl2.split(',').join('')}`);*/

                          ulSubLiLvl3M.appendChild(lilvl3);
                          lilvl3.appendChild(alvl3);
                          lilvl3.append(ulSubLvl3);
                          ulSubLvl3.appendChild(ulSubLiLvl3);



                        })
                      });

                      ulSubLiLvl2M.appendChild(lilvl2);
                      lilvl2.appendChild(alvl2);
                      lilvl2.append(ulSubLvl2);
                      ulSubLvl2.appendChild(ulSubLiLvl2);


                    })

                  })










                accordion.appendChild(lilvl1);
                lilvl1.appendChild(alvl1);
                lilvl1.append(ulSubLvl1);
                ulSubLvl1.appendChild(ulSubLiLvl1);






              });


              /*  */





            })

          function renderSelect(values, selector) {

            const select = document.querySelector(selector);

            for (option of values) {
              const newOption = document.createElement("option");
              let data = Object.values(option);
              newOption.value = data[0];
              newOption.text = data[1];
              select.appendChild(newOption);
            }
          }
        </script>
        <script>
          window.addEventListener('DOMContentLoaded', (event) => {
            setTimeout(function() {
              $('.toggle').click(function(e) {
                e.preventDefault();

                var $this = $(this);

                if ($this.next().hasClass('show')) {
                  $this.next().removeClass('show');
                  $this.next().slideUp(350);
                } else {
                  $this.parent().parent().find('li .inner').removeClass('show');
                  $this.parent().parent().find('li .inner').slideUp(350);
                  $this.next().toggleClass('show');
                  $this.next().slideToggle(350);
                }
              });
console.log(document.getElementById("btnModal"));
              if (document.getElementById("btnModal")) {
                var modal = document.getElementById("myModal");
                var btn = document.getElementById("btnModal");
                var span = document.getElementsByClassName("close")[0];
                var body = document.getElementsByTagName("body")[0];

                btn.onclick = function() {
                  modal.style.display = "block";

                  body.style.position = "static";
                  body.style.height = "100%";
                  body.style.overflow = "hidden";
                }

                span.onclick = function() {
                  modal.style.display = "none";

                  body.style.position = "inherit";
                  body.style.height = "auto";
                  body.style.overflow = "visible";
                }

                window.onclick = function(event) {
                  if (event.target == modal) {
                    modal.style.display = "none";

                    body.style.position = "inherit";
                    body.style.height = "auto";
                    body.style.overflow = "visible";
                  }
                }
              }
            }, 5000);

          })
        </script>



</html>