/*document.addEventListener("DOMContentLoaded", () => {
  const fetchData = async () => {
    const options = {
      method: "GET",
      headers: {
        "Content-Type": "application/json",
      },
    };

    const sedes = await fetch(
      "http://localhost/cp/server/inspeccion-server.php",
      options
    )
      .then((response) => response.json())
      .then((data) => {  renderSelectSede(data, "#sedes")} );
  };

  function renderSelectSede(values, selector) {
    const sedes = document.querySelector(selector);
    for (option of values) {
      const newOption = document.createElement("option");
      newOption.value = option.idSede;
      newOption.text = option.NombreSede;
      sedes.appendChild(newOption);
    }
  }

  fetchData();
});*/


const resetValue = 0;


const sedes = document.getElementById("sedes");
let form = document.querySelector("#formInspeccion");

$( "#area" ).prop( "disabled", true );
$( "#dpto" ).prop( "disabled", true );
$( "#vp_idSede").prop( "disabled", true );


sedes.addEventListener("change",()=>{
  $("#sedes option:selected").each(function () {

    let VP_idSede = $(this).val();

    if(vp_idSede){
      fetchDataSelect(VP_idSede,"","","#vp_idSede");
      $( "#area" ).prop( "disabled", false );
      $( "#dpto" ).prop( "disabled", false );
      $( "#vp_idSede").prop( "disabled", false );

     
      form.elements[2].value = 0;
      form.elements[3].value = 0;
      form.elements[4].value = 0;
    }else{
      form.elements[2].value = 0;
      form.elements[3].value = 0;
      form.elements[4].value = 0;

      $( "#area" ).prop( "disabled", true );
      $( "#dpto" ).prop( "disabled", true );
      $( "#vp_idSede").prop( "disabled", true );
    }

   
  });
 
})

const vp = document.getElementById("vp_idSede");	
vp.addEventListener("change",()=>{
  $("#vp_idSede option:selected").each(function () {
    let dpto_idVP = $(this).val();
    

    if(dpto_idVP != 0){

      fetchDataSelect("",dpto_idVP,"","#dpto");
      $( "#area" ).prop( "disabled", false );
      $( "#dpto" ).prop( "disabled", false );
      }else{
 
      form.elements[3].value = 0;
      form.elements[4].value = 0;

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
      form.elements[4].value = 0;
      $( "#area" ).prop( "disabled", true );
    }
  });
})


/*
function changevp(select) {


  let VP_idSede = select.value;

  
  
  let sedes = document.getElementById("sedes"); 
  console.log(sedes.selectedIndex);
  

}*/
  

/*
function changeDpto(select){

    let dpto_idVP = select.value;
    fetchDataSelect("",dpto_idVP,"","#dpto");
    let dpto = document.getElementById("dpto").value;
  
   
  
}

function changeArea(select){
    let area_id = select.value;
    fetchDataSelect("","",area_id,"#area")
  }

*/
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
  defaultOption.value = 0;
  defaultOption.text = textSelect;
  select.appendChild(defaultOption);

  for (option of values) {
    const newOption = document.createElement("option");
    let data = Object.values(option);
    newOption.value = data[0];
    newOption.text = data[1];
    select.appendChild(newOption);
  }
}


