<?php
session_start();
$user = $_SESSION["user"];
$pass = $_SESSION["pass"];
if ($user == null and $pass == null) {
    header('Location:../');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heqer</title>
    <link rel="icon" href="../images/usuario.png">



    <link rel="stylesheet" href="../estilosCss/estilos.css">
    <link rel="stylesheet" href="../estilosCss/Iconos.css">
    <link rel="stylesheet" href="../estilosCss/estilos1.css">
    <style type="text/css">
        .BoxSalida {
            background: rgb(255, 255, 255);
            border: 3px solid rgb(0, 0, 0);
            font-size: 14px;
            font-family: Arial;
            font-weight: normal;
            width: 50%;
        }

        .AlineacionD {
            text-align: right;
            margin: 2px;
            padding: 2px;
        }

        .AlineacionI {
            text-align: left;
            margin: 2px;
            padding: 2px;
        }
    </style>
    <script src="../js/Imprimir.js">
    </script>

</head>

<body>
    <div class="gradiente">
        <a href="./">Regresar</a>
        <a href="../exit/ExitSession.php">Cerrar sesión</a>
        <p>
            <center>
                <h1>Resultados ES</h1>
                <form method="post">
                    <label for="CLAVE">Clave</label>
                    <input type="text" id="CLAVE" name="CLAVE" placeholder="Clave:">
                    <input type="submit" id="enviar" name="enviar" value="Mostrar" class="boton">
                </form>
                <?php
                $SALIDAout = "";
                $CLAVE = "";
                require_once '../Database/Basedatos.php';

                date_default_timezone_set('America/Mexico_City');
                $encabezado = "";
                $SALIDAout1 = "";
                $contenido = "";
                if (isset($_POST["enviar"])) {


                    $conexionbd1 = mysqli_connect(server, user, password, database, port);

                    $db = database;
                    $CLAVE = $_POST["CLAVE"];
                    $queryInformacion = "SELECT * FROM `ALTAS` WHERE CLAVE='$CLAVE';";

                    $informacion = mysqli_query($conexionbd1, $queryInformacion);


                    if ($info = mysqli_fetch_assoc($informacion)) {
                        $SALIDAout1 = '<br/>
                <p class="AlineacionD">
                Fecha de impresion:<b>&emsp; &emsp; ' . date("d-m-Y") . '</b> 
                <br/>
                Hora de impresion:<b>&emsp; &emsp; ' . date("H:i:s") . '</b>
                <br/></br>
                Fecha de muestras: <b>&emsp; ' . $info["FECHA"] . '</b><br/>
                Hora de muestras:<b>&emsp; ' . $info["HORA"] . '</b>
                </p>';

                        $uno = "<p class='AlineacionI'><b>Nombre: &emsp; &emsp; </b>" . $info["NOMBRE"] . "<br/>";
                        $dos = "<b>Edad: &emsp;  &emsp; &emsp; </b>" . $info["EDAD"] . "<br/>";
                        $tres = "<b>Sexo: &emsp; &emsp; &emsp; </b>" . $info["SEXO"] . "<br/>";
                        $cuatro = "<b>Direccion: &emsp; &emsp; </b>" . $info["DIRECCION"] . "<br/></p>";
                        $encabezado = $uno . $dos . $tres . $cuatro;
                    }

                    $conexionbd = mysqli_connect(server, user, password, database, port);
                    $query = "SELECT * FROM `RESTUDIO` WHERE CLAVE='$CLAVE';";
                    $search = mysqli_query($conexionbd, $query);
                ?>

                    <?php

                    $contenido = "<p class='AlineacionI'>";
                    while ($registro = mysqli_fetch_assoc($search)) {
                    ?>

                        <?php

                        $contenido .= "<b>" . $registro['PREGUNTA'] . "</b>: &emsp; &emsp; " . $registro['RESPUESTA'] . "<br/>";
                        ?>


                    <?php

                    }
                    $contenido .= "</p>";

                    $SALIDAoUT = $SALIDAout1 . $encabezado . $contenido;
                    //   echo $SALIDAout;
                    $_SESSION["arr"] = $SALIDAout1;
                    $_SESSION["en"] = $encabezado;
                    $_SESSION["con"] = $contenido;

                    ?>
                <?php
                    echo "<script>
            window.open('Imp.php',target='_blank');
            </script>";
                }

                ?>

            </center>
    </div>
</body>

</html>