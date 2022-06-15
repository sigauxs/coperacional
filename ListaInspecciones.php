<!DOCTYPE html>
<html>
<?php
require "./reportepdf/conexion.php";
session_start();
$inspector = $_SESSION['usuarioId'];

?>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="./css/style.css" rel="stylesheet" >
  <script src="https://kit.fontawesome.com/2dd4f6d179.js" crossorigin="anonymous"></script>
</head>

<body>
  <div class="container">
    <div class="row">
      <form method="post">
        <h2>¿Cuales inspecciones desea visualizar?</h2>
        <br>
        Todas <input type="radio" name="selc" value=1>
        Solo mias <input type="radio" name="selc" value=2>
        <br>
        Periodo:
        <input type="date" name="FechaInicio" value="" id="ini"> -
        <input type="date" name="FechaFinal" value="" id="final">
        <input type="submit" value="Consultar">
      </form>
    </div>

    <div class="row">
        
    <h2>Listado de inspecciones</h2>

    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar por área.." title="Type in a name">

<?php

$fi = $_REQUEST['FechaInicio'];
$ff = $_REQUEST['FechaFinal'];

if ($_REQUEST['selc'] == 1) {
  $sql2 = "Call Listado_Inspecciones('$fi', '$ff', '2','')";
} else {
  $sql2 = "Call Listado_Inspecciones('$fi', '$ff','1','$inspector')";
}



$resultado2 = $mysqli->query($sql2);
?>

<table id="myTable" class="table">
<thead>
    <th scope="col">#</th>
    <th scope="col">Fecha</th>
    <th scope="col">Actividad</th>
    <th scope="col">Locación</th>
    <th scope="col">Vicepresidencia</th>
    <th scope="col">Departamento</th>
    <th scope="col">Area</th>
    <th scope="col"># Hallazgos</th>
    <th scope="col">Accion</th>
  </thead>

  <tbody>

    <?php while ($row = $resultado2->fetch_assoc()) { ?>
      <tr class="text-center">
      <td><?php echo ($row['ID INSP']); ?></td>
      <td><?php echo ($row['FECHA']); ?></td>
      <td><?php echo ($row['ACTIVIDAD']); ?></td>
      <td><?php echo ($row['LOCACIÓN']); ?></td>
      <td><?php echo ($row['VICEPRESIDENCIA']); ?></td>
      <td><?php echo ($row['DEPARTAMENTO']); ?></td>
      <td><?php echo ($row['AREA']); ?></td>
      <td><?php echo ($row['# HALLAZGOS ASOCIADOS']); ?></td>
      <td><a href="<?php echo "http://localhost/cp/editarInspeccion.php?idInspeccion=".$row['ID INSP'] ?>"><span><i class="fas fa-edit"></i></span></a></td>
      </tr>
    <?php } ?>

    </tbody>


</table>
</div>
    </div>


  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <script>
    function myFunction() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[6]; // Jorge, Aqui colocas la columna que tendra el filtro.
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }
  </script>

</body>

</html>