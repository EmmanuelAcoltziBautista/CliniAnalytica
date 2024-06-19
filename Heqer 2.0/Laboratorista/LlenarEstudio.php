<?php
session_start();
$user = $_SESSION["user"];
$pass = $_SESSION["pass"];
if ($user == null and $pass == null) {
    header('Location:../');
}
?>
<!--Seccion de el laborista-->
<html>

<head>
    <title>Heqer</title>
    <link rel="icon" href="../images/usuario.png">
    <link rel="stylesheet" href="../estilosCss/estilos1.css">
    <link rel="stylesheet" href="../estilosCss/Iconos.css">
    <script src="../js/alert.js"></script>
    <link rel="stylesheet" href="../estilosCss/alert.css">
    <script>
        function accion(){
            swal.fire({
                position:'center',
                title:'Buen trabajo',
                icon:'success',
            });
        }
    </script>
</head>

<body>
    <div class="gradiente">
        <a href="./">Regresar</a>
        <a href="../exit/ExitSession.php">Cerrar seción</a>
        <center>
            <h1>General</h1>

            <form method="post">
                <label for="CLAVE">Clave:</label>
                <input type="text" id="CLAVE" name="CLAVE" placeholder="Escribe aqui..." required>
                <input type="submit" id="Buscar" name="Buscar" value="Seleccionar" class="boton">
            </form>

            <?php

            if (isset($_POST["Buscar"])) {
                require_once "../Database/Basedatos.php";


                $conexionbd = mysqli_connect(server, user, password, database, port);
                $CLAVE = $_POST["CLAVE"];
                $query = "SELECT * FROM `ALTAS` WHERE CLAVE='" . $CLAVE . "';";
                $RESULTADO = mysqli_query($conexionbd, $query);
                $estudio = "";
                if ($salida = mysqli_fetch_assoc($RESULTADO)) {
                    $estudio = $salida["ESTUDIO"];
                    //echo "<input type='text' name='' id='' placeholder='Escribe aqui'>";

                    $query2 = "SELECT * FROM `FESTUDIO` WHERE ESTUDIO='" . $estudio . "';";
                    $conexionbd2 = mysqli_connect(server, user, password, database, port);
                    $resultado2 = mysqli_query($conexionbd2, $query2);
            ?>
                    <form method="post" action="save.php">
                        <?php
                        $i = 0;
                        $preguntas = array();
                        $respuesta = array();
                        while ($fila = mysqli_fetch_assoc($resultado2)) {
                            $preguntas[] = $fila["PREGUNTA"];
                            $i = $i + 1;
                        ?>

                            <label for="<?php echo $fila['PREGUNTA']; ?>"><?php echo $fila['PREGUNTA']; ?></label><br>
                            <textarea id="<?php echo $fila['PREGUNTA']; ?>" name="<?php echo $fila['PREGUNTA']; ?>"></textarea><br><br>

                <?php
                        }
                        $_SESSION['PREGUNTAS'] = $preguntas;
                        $_SESSION["i"] = $i;
                        $_SESSION["CLAVE"]=$CLAVE;
                    }
                }
                ?>
                <input type="submit" id="subir1" name="subir1" value="subir" class="boton" onClick="accion()"> <br /><br /><br />

                    </form>

        </center>
    </div>
</body>

</html>