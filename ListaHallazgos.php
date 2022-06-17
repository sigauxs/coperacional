


<?php require "./reportepdf/conexion.php"; ?>

    <h2>Listado de hallazgos</h2>

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar por descripción.." title="Type in a name">
<?php 
$idInspeccion = $_GET['idInspeccion']; 
$sql2 = "Call ReporteHallazgos($idInspeccion)";
$resultado2 = $mysqli->query($sql2);
?>
<table id="myTable" class="table">

  <thead>
    <tr>
    <th >Id Hallazgo</th>
	  <th >Descripción</th>
	  <th >Evidencia</th>
    <th >Fecha </th>
	  <th >Factores de riesgos</th>
	  <th >Area</th>
    <th></th>
    </tr>
  </thead>

  <tr>
  <?php while($row = $resultado2 -> fetch_assoc()){ /*$idH = $idH + 1;*/?>
  <td><?php echo ($row['ID HALL']); ?></td>
	<td><?php echo ($row['DESCRIPCIÓN DEL HALLAZGO']); ?></td>
	<td><a title="<?php echo ("Imagen del hallazgo #".$row['ID HALL']); ?>" href="<?php echo "http://localhost/cp/".substr($row['EVIDENCIA'],2); ?>" target="_BLANK">
  <img id="myImg" width="100" height="100" src="<?php echo "http://localhost/cp/".substr($row['EVIDENCIA'],2); ?>" width="300" height="200"></a></td>
	<td><?php echo ($row['FECHA']); ?></td>
	<td><?php echo ($row['FACTORES DE RIESGO']); ?></td>
	<td><?php echo ($row['AREA']); ?></td>
  <td>
    <span><i class="fa-solid fa-pen-to-square"></i></span> 
    <span><i class="fa-solid fa-eye"></i></span>
    <span><i class="fa-solid fa-trash-can"></i></span>
  </td>
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
    td = tr[i].getElementsByTagName("td")[2]; // Jorge, Aqui colocas la columna que tendra el filtro.
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





