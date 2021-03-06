
<!DOCTYPE html>
<html>
<?php require "./reportepdf/conexion.php";
session_start();
$inspector = $_SESSION['usuarioId'];?>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 30%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}
</style>
</head>
<body>

<form method="post">
	<h2>¿Cuales inspecciones desea visualizar?</h2>
	<br>
	Todas
	<input type="radio" name="selc" value = 1>
	Solo mias
	<input type="radio" name="selc" value = 2>
	<br>
	Periodo:
	<input type="date" name="FechaInicio" value=""> - 
	<input type="date" name="FechaFinal" value="">
	<input type="submit" value="Consultar">
</form>

<h2>Listado de inspecciones</h2>

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar por área.." title="Type in a name">
<?php 

$fi = $_REQUEST['FechaInicio'];
$ff = $_REQUEST['FechaFinal'];
/*
$fi = '2022-05-01';
$ff = '2022-05-31';*/
if($_REQUEST['selc'] == 1){
		$sql2 = "Call Listado_Inspecciones('$fi', '$ff','1','')";
	}
	else{
		$sql2 = "Call Listado_Inspecciones('$fi', '$ff','2','$inspector')";
	}

$resultado2 = $mysqli->query($sql2);
 ?>
<table id="myTable">
  <tr class="header">
    <th style="width:5%;">ID</th>
    <th style="width:10%;">FECHA</th>
	<th style="width:40%;">ACTIVIDAD</th>
	<th style="width:10%;">LOCACIÓN</th>
	<th style="width:10%;">VICEPRESIDENCIA</th>
	<th style="width:10%;">DEPARTAMENTO</th>
	<th style="width:10%;">AREA</th>
	<th style="width:5%;"># HALLAZGOS</th>
  </tr>
  <tr>
    <?php echo var_dump($resultado2 -> fetch_assoc())?>
  <?php while($row = $resultado2 -> fetch_assoc()){ ?>
    <td><?php echo ($row['ID INSP']); ?></td>
    <td><?php echo ($row['FECHA']); ?></td>
	<td><?php echo ($row['ACTIVIDAD']); ?></td>
	<td><?php echo ($row['LOCACIÓN']); ?></td>
	<td><?php echo ($row['VICEPRESIDENCIA']); ?></td>
	<td><?php echo ($row['DEPARTAMENTO']); ?></td>
	<td><?php echo ($row['AREA']); ?></td>
	<td><?php echo ($row['# HALLAZGOS ASOCIADOS']); ?></td>
  </tr>
  <?php } ?>
</table>

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
