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
      width: 40%;
      min-width: 300px;
      max-width: 400px;
      margin: 1.5em auto;
      color: #333;
    }

    h1 {
      font-family: 'Pacifico', cursive;
      font-weight: 400;
      font-size: 2.5em;
    }

    ul {
      list-style: none;
      padding: 0;
    }

    ul .inner {
      padding-left: 1em;
      overflow: hidden;
      display: none;
    }

    ul li {
      margin: .5em 0;
    }

    ul li a.toggle {
      width: 100%;
      display: block;
      background: rgba(0, 0, 0, 0.78);
      color: #fefefe;
      padding: .75em;
      border-radius: 0.15em;
      transition: background .3s ease;
    }

    ul li a.toggle:hover {
      background: rgba(0, 0, 0, 0.9);
    }

    ul li a.toggle2 {
      width: 100%;
      display: block;
      background: rgba(0, 0, 0, 0.78);
      color: #fefefe;
      padding: .75em;
      border-radius: 0.15em;
      transition: background .3s ease;
    }

    ul li a.toggle2:hover {
      background: rgba(0, 0, 0, 0.9);
    }
  </style>
</head>

<body>

  <div class="container">
    <div class="row">
      <div class="div--center">


        <div class="card mt-responsive mx-auto div--center-border w-card mb-3" style="z-index: 1;">
          <div class="card-body" id="card-body">




            <ul class="accordion">
              <li>
                <a class="toggle" href="javascript:void(0);">Item 4</a>
                <ul class="inner">
                  <li>
                    <a href="#" class="toggle">Technically any number of nested elements</a>
                    <ul class="inner">
                      <li>
                        <a href="#" class="toggle">Another nested element</a>
                        <div class="inner">
                          <p>
                            As long as the inner element has inner as one of its classes then it will be toggled.
                          </p>
                          <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tempus placerat fringilla. Duis a elit et dolor laoreet volutpat. Aliquam ultrices mauris id mattis imperdiet. Aenean cursus ultrices justo et varius. Suspendisse aliquam orci id dui dapibus
                            blandit. In hac habitasse platea dictumst. Sed risus velit, pellentesque eu enim ac, ultricies pretium felis.
                          </p>
                        </div>
                      </li>



                      <li>
                        <a href="#" class="toggle">Another nested element</a>
                        <div class="inner">
                          <p>
                            As long as the inner element has inner as one of its classes then it will be toggled.
                          </p>
                          <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tempus placerat fringilla. Duis a elit et dolor laoreet volutpat. Aliquam ultrices mauris id mattis imperdiet. Aenean cursus ultrices justo et varius. Suspendisse aliquam orci id dui dapibus
                            blandit. In hac habitasse platea dictumst. Sed risus velit, pellentesque eu enim ac, ultricies pretium felis.
                          </p>
                        </div>
                      </li>



                      <li>
                        <a href="#" class="toggle">Another nested element</a>
                        <div class="inner">
                          <p>
                            As long as the inner element has inner as one of its classes then it will be toggled.
                          </p>
                          <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tempus placerat fringilla. Duis a elit et dolor laoreet volutpat. Aliquam ultrices mauris id mattis imperdiet. Aenean cursus ultrices justo et varius. Suspendisse aliquam orci id dui dapibus
                            blandit. In hac habitasse platea dictumst. Sed risus velit, pellentesque eu enim ac, ultricies pretium felis.
                          </p>
                        </div>
                      </li>
                    </ul>
                  </li>
                </ul>
              </li>
            </ul>


          </div>
        </div>







        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


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
                      ulSubLiLvl2.setAttribute("id",`${idCleanLvl2.split(',').join('')}`);

                      fetchDataHallazgo("","",peligro.id_Peligro,"").then( controles =>{
                        let ulSubLiLvl3M = document.querySelector(`#${idCleanLvl2.split(',').join('')}`);
                    
                        controles.map(control => {
                          
                      let lilvl3 = document.createElement("li");
                      let alvl3 = document.createElement("a");
                      let ulSubLvl3 = document.createElement("ul");
                      let ulSubLiLvl3 = document.createElement("li");

                      alvl3.classList.add("toggle");
                      alvl3.setAttribute("href", "javascript:void(0);");
                      alvl3.textContent = control.Descripcion_Control;

                      ulSubLvl3.classList.add("inner");
                        fetchDataHallazgo("","","",control.idControl).then( desviaciones => {
                          console.log(desviaciones);
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
        </script>
        <script>
         window.addEventListener('DOMContentLoaded', (event) => {
          setTimeout(function(){
            console.log('2s');
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
}, 7000);

   })
        </script>


</html>