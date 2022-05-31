<nav id="navbar-desktop">
    <div>
        <ul>
            <li><a href="menu.php">inicio</a></li>
            <li><a href="inspeccion.php">Registrar nueva inspeccion</a></li>
            <li><a href="listarinspeccion.php">Listar inspeccion</a></li>
            <li><a href="client\logout.php">Cerrar sesión</a></li>
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
        dataPerson( userId ).then( dataUser => {
            console.log( dataUser );
        })


    })
</script>