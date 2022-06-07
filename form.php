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
<div id="myModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            
        </div>
    </div>
</div>
  
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
<script>
    $( "#mostrar" ).click(function() {
        $("#myModal").modal("show");
});
  
</script>
<script>


    let body = document.body;
    
    let form = document.createElement("form");
    form.setAttribute("id","desviaciones");

    let textarea = document.createElement("textarea");
    textarea.setAttribute("name","descripcion");
    textarea.setAttribute("rows","5");
    textarea.setAttribute("cols","40");

    let select = document.createElement("select");
    select.setAttribute("name","desviacion")

    let option_1 =  document.createElement("option");
    option_1.setAttribute("value","valor 1");
    option_1.textContent = "valor 1";

    let option_2 =  document.createElement("option");
    option_2.setAttribute("value","valor 2");
    option_2.textContent = "valor 2";

   form.appendChild(select);
   form.appendChild(textarea);
   select.appendChild(option_1);
   select.appendChild(option_2);
   body.append(form);
      
</script>
</html>