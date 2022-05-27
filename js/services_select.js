const resetValue = 0;


const sedes = document.getElementById("sedes");
let form = document.querySelector("#formInspeccion");

$( "#area" ).prop( "disabled", true );
$( "#dpto" ).prop( "disabled", true );
$( "#vp_idSede").prop( "disabled", true );


sedes.addEventListener("change",()=>{
  $("#sedes option:selected").each(function () {

    let VP_idSede = $(this).val();
  
    if(VP_idSede != 0){
      fetchDataSelect(VP_idSede,"","","#vp_idSede");
      $( "#area" ).prop( "disabled", false );
      $( "#dpto" ).prop( "disabled", false );
      $( "#vp_idSede").prop( "disabled", false );

      form.elements[2].value = "";
      form.elements[3].value = "";
      form.elements[4].value = "";

    }else if(VP_idSede == "" || VP_idSede ==  undefined || VP_idSede ==  0 ){

      form.elements[2].value = "";
    

      form.elements[3].value = "";
    
      form.elements[4].value = "";

      $( "#area" ).prop( "disabled", true );
      $( "#dpto" ).prop( "disabled", true );
      $( "#vp_idSede").prop( "disabled", true );
    }

   
  });
 
})

const vicepresidencia = document.getElementById("vp_idSede");	
vicepresidencia.addEventListener("change",()=>{

  area = form.elements[4].value = "";

  $("#vp_idSede option:selected").each(function () {

    let idVicepresidencia = $(this).val();
  
    if(idVicepresidencia != 0){

      fetchDataSelect("",idVicepresidencia,"","#dpto");
      $( "#area" ).prop( "disabled", false );
      $( "#dpto" ).prop( "disabled", false );

      const dptoSelectIndex = document.getElementById("dpto").selectedIndex;

      if( dptoSelectIndex == 1){
        $( "#area" ).prop( "disabled", true );
      }

    }else if(idVicepresidencia == 0){
 
      form.elements[3].value = "";
      form.elements[4].value = "";

      $( "#area" ).prop( "disabled", true );
      $( "#dpto" ).prop( "disabled", true );

    }

    

    
  });





})

const dpto = document.getElementById("dpto");
dpto.addEventListener("change",()=>{
 $("#dpto option:selected").each(function () {
    let area_idDpto = $(this).val();

    if(area_idDpto != 0){  
      fetchDataSelect("","",area_idDpto,"#area");
      $( "#area" ).prop( "disabled", false );
      }else{
      form.elements[4].value = "";
      $( "#area" ).prop( "disabled", true );
    }


  });
})




function changeDpto(select){

    let dpto_idVP = select.value;
    fetchDataSelect("",dpto_idVP,"","#dpto");
    let dpto = document.getElementById("dpto").value;
  
   
  
}

function changeArea(select){
    let area_id = select.value;
    fetchDataSelect("","",area_id,"#area")
  }


const fetchDataSelect = async (vp_idsede,dpto,area,selector) => {
  const options = {
    method: "GET",
    headers: {
      "Content-Type": "application/json",
    },
  };


  var url = new URL("http://localhost/cp/server/inspeccion-server.php");

  var params = { vp_idsede: vp_idsede, dpto:dpto, area:area };
  
  url.search = new URLSearchParams(params).toString();

  const sedes = await fetch(url, options)
    .then((response) => response.json())
    .then((data) => renderSelect(data, selector));
  
};

function renderSelect(values, selector) {
  
  const select = document.querySelector(selector);
  const textSelect = select.children[0].text
  

  $(`${selector} option`).remove();

  let defaultOption = document.createElement("option");
  defaultOption.value = "";
  defaultOption.text = textSelect;
  defaultOption.selected = true;
  select.appendChild(defaultOption);

  for (option of values) {
    const newOption = document.createElement("option");
    let data = Object.values(option);
    newOption.value = data[0];
    newOption.text = data[1];
    select.appendChild(newOption);
  }
}


