


document.addEventListener('DOMContentLoaded', ()=>{
    
    
    /*function fetchData() {

        const options = {
                method: 'GET',
                headers: {
                    "Content-Type": "application/json",
                }
        }
    fetch('http://localhost/coperacional/server/inspeccion-server.php',options)
    .then(resp => resp.json())
    .then(data => renderSelect(data,"#sedes"))
    .then( data =>console.log(data));

    console.log("esteo se repite")
   


  
   

  } */
  
 const fetchData =   async () => {

    const options = {
        method: 'GET',
        headers: {
            "Content-Type": "application/json",
        }
}


    const sedes = await fetch('http://localhost/coperacional/server/inspeccion-server.php',options)
                        .then(response => response.json())
                        .then(data => renderSelect(data,"#sedes"))
                                              

 } 


  function renderSelect(values,selector) {     
      const sedes = document.querySelector(selector);
      for (option of values) {
        const newOption = document.createElement("option");
        newOption.value = option.idSede;
        newOption.text = option.NombreSede;
        sedes.appendChild(newOption);
      }
   }  


   fetchData();
}


)

function changeSede(select){
    console.log( select.id );
    let idSede = select.value;
    document.querySelector("#Locacion").disabled = true; 
    fetchDataSelect(idSede,"#Locacion")
    document.querySelector("#Locacion").disabled = false; 
    
}





const fetchDataSelect  = async (
    
    idSede = "",selector
    
    ) => {

    const options = {
        method: 'GET',
        headers: {
            "Content-Type": "application/json",
        },   
    } 

    var url = new URL('http://localhost/coperacional/server/inspeccion-server.php');


var params = {idSede:idSede} 

console.log(selector);

url.search = new URLSearchParams(params).toString();
   console.log(url);
    const sedes = await fetch(url,options)
    .then(response => response.json())
    .then(data => renderSelect(data,selector));

}







function renderSelect(values,selector) {     
    const select = document.querySelector(selector);
    $(`${selector} option`).remove();
  
   let defaultOption = document.createElement("option");
   defaultOption.value = "";
   defaultOption.text = `Escoger ${selector.slice(1)}`;
   select.appendChild(defaultOption);

    for (option of values) {    
     const newOption = document.createElement("option");
     let data = Object.values(option)
      newOption.value = data[0];
      newOption.text = data[1];
      select.appendChild(newOption);
    }
 }  




