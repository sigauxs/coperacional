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
function changevp(select) {


  let VP_idSede = select.value;

  
  fetchDataSelect(VP_idSede,"","","#vp_idSede");
  let sedes = document.getElementById("sedes"); 
  console.log(sedes.selectedIndex);
  


}
  


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


