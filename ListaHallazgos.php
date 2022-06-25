


<?php require "./reportepdf/conexion.php"; ?>


<p class="head-listado">Listado de hallazgos: </p>

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar por descripción.." title="Type in a name">
<?php 
$idInspeccion = $_GET['idInspeccion']; 
$sql2 = "Call ReporteHallazgos($idInspeccion)";
$resultado2 = $mysqli->query($sql2);
?>
<table id="myTable" class="table table-hover">

  <thead class="thead">
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

  <tbody id="tbody">
  <tr>
  <?php while($row = $resultado2 -> fetch_assoc()){ /*$idH = $idH + 1;*/?>
  <td><?php echo ($row['ID HALL']); ?></td>
	<td><?php echo ($row['DESCRIPCIÓN DEL HALLAZGO']); ?></td>
	<td><a title="<?php echo ("Imagen del hallazgo #".$row['ID HALL']); ?>" href="<?php echo "http://localhost/cp/".substr($row['EVIDENCIA'],2); ?>" target="_BLANK">
  <img id="myImg" width="100" height="100" src="<?php echo "http://localhost/cp/".substr($row['EVIDENCIA'],2); ?>"></a></td>
	<td><?php echo ($row['FECHA']); ?></td>
	<td><?php echo ($row['FACTORES DE RIESGO']); ?></td>
	<td><?php echo ($row['AREA']); ?></td>
  <td>
    <span><i class="fa-solid fa-pen-to-square icon_edit me-2"></i></span> 
    <span><i class="fa-solid fa-eye icon_edit me-2"></i></span>
    <button class="btn btnBorrar"><span><i class="fa-solid fa-trash-can icon_edit"></i></span></button>
  </td>
  </tr>
	  <?php } ?>
  </tbody>
  
</table>

<div class="div">
  <div class="row">
     <div class="col-md-12">
     <button id="nuevoHallazgo" class="btn btn-danger btn-login  btn-lg  fw-bolder" type="button" style="border-radius: 10px;">Nuevo Hallazgo</button>
     </div>
  </div>
</div>

<div id="modalArticulo" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="exampleModalLabel">Articulo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="descripcion" class="col-form-label">Descripción:</label>
            <input id="descripcion" type="text" class="form-control" autofocus>
          </div>
          <div class="mb-3">
            <label for="precio" class="col-form-label">Precio</label>
            <input id="precio" type="number" class="form-control">
          </div>
          <div class="mb-3">
            <label for="stock" class="col-form-label">Stock</label>
            <input id="stock" type="number" class="form-control">
          </div>      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </form>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script>

const contenedor = document.querySelector('#tbody');
const modalArticulo = new bootstrap.Modal(document.getElementById('modalArticulo'))
console.log(contenedor);


const on = (element, event, selector, handler) => {
    element.addEventListener(event, e => {
        if(e.target.closest(selector)){
            handler(e)
        }
    })
}


on(document, 'click', '.btnBorrar', e => {
    const fila = e.target.parentNode.parentNode
    const id = fila.firstElementChild.innerHTML

    console.log(id);
   /* alertify.confirm("This is a confirm dialog.",
    function(){
        fetch(url+id, {
            method: 'DELETE'
        })
        .then( res => res.json() )
        .then( ()=> location.reload())
        //alertify.success('Ok')
    },
    function(){
        alertify.error('Cancel')
    })*/
})



</script>



<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1]; // Jorge, Aqui colocas la columna que tendra el filtro.
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






