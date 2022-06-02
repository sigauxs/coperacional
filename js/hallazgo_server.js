document.addEventListener("DOMContentLoaded",()=>{
    const options = {
        method: "GET",
        headers: {
          "Content-Type": "application/json",
        },
      };
    
    
      var url = new URL("http://localhost/cp/api/hallazgo.php");
    
      var params = {};
      
      url.search = new URLSearchParams(params).toString();
    
      const sedes = fetch(url, options)
        .then((response) => response.json())
        .then((data) => renderlvl1(data));
})
let menu = document.getElementById("#menu");
function renderlvl1(values) {
  for (valor of values) {
    const lvl1 = document.createElement("li");
    let data = Object.values(valor);
    console.log(data);
    lvl1.setAttribute("id",`${data[1]}`)
    menu.appendChild(lvl1);
    /*lvl1.value = data[0];
    lvl1.text = data[1];
    let menu = document.getElementById("#menu");
    menu.appendChild(lvl1);*/
  }
}