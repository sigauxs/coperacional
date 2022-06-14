
<!DOCTYPE html>
<html>
<?php require "./reportepdf/conexion.php"; ?>
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

#myTable th {
  text-align: center;
  padding: 12px;
}

#myTable td {
  text-align: justify;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}

/* Estilos para el modal */
#myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

.modal {
    display: none; 
    position: fixed; 
    z-index: 1; 
    padding-top: 100px; 
    left: 0;
    top: 0;
    width: 100%; 
    height: 100%; 
    overflow: auto; 
    background-color: rgb(0,0,0); 
    background-color: rgba(0,0,0,0.9); 
}

.modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}

#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}

.modal-content, #caption { 
    animation-name: zoom;
    animation-duration: 0.6s;
}

@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}

.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
}
</style>
</head>
<body>

<h2>Listado de hallazgos</h2>

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar por descripción.." title="Type in a name">
<?php 

$sql2 = "Call ReporteHallazgos(12)";
$resultado2 = $mysqli->query($sql2);

 ?>
<table id="myTable">
  <tr class="header">
    <th style="width:3%;">ID INSPECCIÓN</th>
    <th style="width:3%;">ID HALLAZGO</th>
	<th style="width:40%;">DESCRIPCIÓN DEL HALLAZGO</th>
	<th style="width:10%;">EVIDENCIA</th>
	<th style="width:10%;">FECHA</th>
	<th style="width:3%;">FACTORES DE RIESGO</th>
	<th style="width:7%;">PELIGROS</th>
	<th style="width:5%;">CONTROLES</th>
	<th style="width:7%;">JERARQUIA DEL CONTROL</th>
	<th style="width:5%;">DESVIACIONES</th>
	<th style="width:10%;">AREA</th>
  </tr>
  <tr>
  <?php while($row = $resultado2 -> fetch_assoc()){ /*$idH = $idH + 1;*/?>
    <td><?php echo ($row['ID INSP']); ?></td>
    <td><?php echo ($row['ID HALL']); ?></td>
	<td><?php echo ($row['DESCRIPCIÓN DEL HALLAZGO']); ?></td>
	<td><a title="<?php echo ("Imagen del hallazgo #".$row['ID HALL']); ?>" href="<?php echo "http://localhost/cp/".substr($row['EVIDENCIA'],2); ?>" target="_BLANK"><img id="myImg" src="<?php echo "http://localhost/cp/".substr($row['EVIDENCIA'],2); ?>" width="300" height="200"></a></td>
	<td><?php echo ($row['FECHA']); ?></td>
	<td><?php echo ($row['FACTORES DE RIESGO']); ?></td>
	<td><?php echo ($row['PELIGROS']); ?></td>
	<td><?php echo ($row['CONTROLES']); ?></td>
	<td><?php echo ($row['JERARQUIA DEL CONTROL']); ?></td>
	<td><?php echo ($row['DESVIACIONES']); ?></td>
	<td><?php echo ($row['AREA']); ?></td>
  </tr>
	<div id="popUp" class="modal">
	  <span class="close">&times;</span>
	  <img class="modal-content" id="img01" src="<?php echo ($row['EVIDENCIA']); ?>">
	  <div id="caption"></div>
	</div>

  <script>
  /*
	var modal = document.getElementById('popUp');

	var img = document.getElementById('myImg');
	var modalImg = document.getElementById("img01");
	var captionText = document.getElementById("caption");
	img.onclick = function(){
		modal.style.display = "block";
		modalImg.src = this.src;
		captionText.innerHTML = this.alt;
	}

	var span = document.getElementsByClassName("close")[0];

	span.onclick = function() { 
	  modal.style.display = "none";
	}
	
	
	function openImg(){
		var image = document.getElementById('image');
		var source = image.src;
		window.open(source);
	}
	*/
</script>
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

</body>
</html>
