<!DOCTYPE html>
<html lang="es-CO">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>


<button id="mostrar">
    hola
</button>
<!-- Modal HTML -->

  
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
<script>


let mostrar = document.getElementById("mostrar");

mostrar.addEventListener("click",()=>{
    RegistrarHallazgo(1,"hola mundo desde la web",1,1,"https://www.llll.com");
})
  


  const url_registro_hallazgo = "http://localhost/cp/api/desviaciones.php"; 
                              const RegistrarHallazgo = async (idDesviacion, descripcion, idempresas, idInspeccion, rutaEvidencia) => {
                                const registro = await fetch(url_registro_hallazgo, {
                                    method: "POST",
                                    headers: {
                                      "Content-Type": "application/json"
                                    },
                                    body: JSON.stringify({
                                      "idDesviacion":idDesviacion,
                                      "descripcion":descripcion, 
                                      "idempresas":idempresas,
                                      "idInspeccion":idInspeccion,
                                      "rutaEvidencia":rutaEvidencia
                                    })
                                  })
                                 

                              }
</script>
<script>


   
</script>
</html>