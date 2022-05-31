<?php

session_start();


?>

<nav id="navbar">
    <div>
        <ul>
            <li><a href="">inicio</a></li>
            <li><a href="">Registrar nueva inspeccion</a></li>
            <li><a href="">Listar inspeccion</a></li>
            <p><?php echo $_SESSION['usuarioId'] ?></p>
        </ul>
    </div>
</nav>

<script>
    document.addEventListener("DOMContentLoaded", (e) => {

        console.log("<?php echo $_SESSION['usuarioId'] ?>")

        const options = {
            method: "GET",
            headers: {
                "Content-Type": "application/json",
            }
        }
    

        const dataPerson = async ( idUsuario ) => {

            let url = new URL("http://localhost/cp/api/user.php");
            let params = {
                idUsuario: idUsuario
            };
            url.search = new URLSearchParams(params).toString();
            console.log(url);
            const response = await fetch(url, options);
            const data = await response.json();
            return data;
        }

        const userId= "<?php echo $_SESSION['usuarioId'] ?>";
console.log(userId);
        dataPerson( userId ).then( dataUser => {
            console.log( dataUser );
        })


    })
</script>