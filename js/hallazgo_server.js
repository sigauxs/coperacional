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

      const factor = async () =>{
        const response = await  fetch(url, options);
        const data =  await response.json();
        return data;
      }

   
      factor()
              .then( dataUser => {
                const menu = document.querySelector("#menu");
                const factores = dataUser.map(function(factor) {
                 

                  const lvl1 = document.createElement("li");
                  lvl1.setAttribute("id",`${factor.NombreFactor}`);
                  lvl1.setAttribute("class","item");

                  const lvl1Btn = document.createElement("a");
                  lvl1Btn.setAttribute("class","btn");
                  lvl1Btn.setAttribute("href",`#${factor.NombreFactor}`)
                  lvl1Btn.textContent = factor.NombreFactor;

                  const lvl1subMenu = document.createElement("div");
                  lvl1subMenu.setAttribute("class","submenu");
                  const lvl1subMenuA = document.createElement("a");
                  lvl1subMenuA.setAttribute("href","#");
                  lvl1subMenuA.textContent = "item"



                  menu.appendChild(lvl1);
                  lvl1.appendChild(lvl1Btn);
                  lvl1.appendChild(lvl1subMenu);
                  lvl1subMenu.appendChild(lvl1subMenuA);
              });
               
                console.log(factores);
              })

      
})
     /* let menu = document.getElementById("#menu");
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