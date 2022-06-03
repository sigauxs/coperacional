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
    :root {
      font-family: Arial, Helvetica, sans-serif;
      font-size: 15px;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    * {
      text-decoration: none;
      color: white;
      list-style: none;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      background: #555;
      overflow: hidden;
    }

    .menu {
      width: 300px;
      height: auto;
      background: #162447;
      overflow: hidden;
      box-shadow: 0 0 10px rgba(0, 0, 0, .5);
    }

    .menu .btn {
      display: block;
      padding: 1rem;
      border-bottom: solid 1px #1b1b2f;
      border-top: solid 1px #1f4068;
      position: relative;
    }

    .menu .submenu {
      background: #1b1b2f;
      overflow: hidden;
      max-height: 0;
      transition: max-height .8s ease-out;
    }

    .menu .submenu a {
      display: block;
      padding: 1rem;
      position: relative;
    }

    .menu .submenu a::before {

      content: '';
      display: block;
      position: absolute;
      top: 0;
      left: 0;
      height: 100%;
      width: 5px;
      background: #e43f5a;
      opacity: 0;
      transition: all .5s;
    }

    .menu .submenu a:hover {
      padding-left: calc(1rem + 5px);
    }

    .menu .submenu a:hover::before {
      opacity: 1;
    }

    .item:target .submenu {
      max-height: 20rem;
    }
  </style>
</head>

<body>

  <div class="container">
    <div class="row">
      <div class="div--center">


        <div class="menu" id="menu">
          <li class="item" id="mn1">
            <a class="btn" href="#mn1">item</a>
            <div class="submenu">
                <li class="item" id="mn1">
                  <a class="btn" href="#mn1">item</a>
                  <div class="submenu">
                    <a href="#">item1</a>
                    <a href="#">item2</a>
                    <a href="#">item3</a>
                  </div>
                </li>
        </div>
        </li>
        <li class="item" id="mn2">
          <a class="btn" href="#mn2">item</a>
          <div class="submenu">
            <a href="#">item1</a>
            <a href="#">item2</a>
            <a href="#">item3</a>
          </div>
        </li>
        <li class="item" id="mn3">
          <a class="btn" href="#mn3">item</a>
          <div class="submenu">
            <a href="#">item1</a>
            <a href="#">item2</a>
            <a href="#">item3</a>
          </div>
        </li>
      </div>


    </div>

  </div>
  </div>

  <script src="./js/hallazgo_server.js">

  </script>
</body>

</html>