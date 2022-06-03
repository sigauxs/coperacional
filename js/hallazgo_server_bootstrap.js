document.addEventListener("DOMContentLoaded",()=>{
   
    
      const body = document.body;
      const factoresRiesgo = 1;
      const peligroRiesgo = 2;
      const controles = 3;
      const desviaciones = 4;
   

      const fetchDataHallazgo = async (factorRiesgo,peligroRiesgo,controles,desviaciones) =>{

        const options = {
          method: "GET",
          headers: {
            "Content-Type": "application/json",
          },
        };

        var url = new URL("http://localhost/cp/api/hallazgo.php");
        var params = {factorRiesgo:factorRiesgo, peligroRiesgo:peligroRiesgo, controles:controles,desviaciones:desviaciones};
        url.search = new URLSearchParams(params).toString();

        const response = await fetch(url, options);
        const data =  await response.json();
        return data;
      }

   
      fetchDataHallazgo(factoresRiesgo,"","","","")
              .then( dataHallazgo => {
                localStorage.setItem("factoresRiesgo",JSON.stringify(dataHallazgo));
                /*<div class="accordion accordion-flush" id="accordionFlushExample"></div>*/

                let divAccordion = document.createElement("div");
                divAccordion.classList.add("accordion","accordion-flush");

                body.appendChild(divAccordion);
                console.log(dataHallazgo);
      })


});