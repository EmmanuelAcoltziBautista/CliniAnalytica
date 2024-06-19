<?php
session_start();
$user=$_SESSION["user"];
$pass=$_SESSION["pass"];
if($user==null and $pass==null){
header('Location:../');
}
?>
<html>

<head>
    <title>Heqer</title>
    <link rel="stylesheet" href="estilos.css">
    <link rel="icon" href="../images/usuario.png">

    <style type="text/css">
        .Caja {
            border: 3px solid #000000;
            background: #ffffff;
            width: 20%;
            margin: 3px;
            padding: 3px;
            font-size: 15px;
            font-family: Arial;
            color: rgb(0, 0, 0);
            font-weight: bold;

        }

        select {
            font-size: 20px;
            margin: 3px;
            padding: 3px;

        }

        .che {
            font-size: 20px;
            font-family: Arial;
        }
    </style>
</head>

<body>
    <a href="./">Regresar</a>
    <a href="../exit/ExitSession.php">Cerrar sesión</a>
    <center>
        <h1>Altas</h1>


        <form method="post" action="">

            <label for="Nombre">Nombre:</label>
            <input type="text" id="Nombre" name="Nombre" required>
            <br />
            <label for="Edad">Edad:</label>
            <input type="number" id="Edad" name="Edad" required>
            <br />
            <label for="Direccion">Direccion:</label>
            <textarea id="Direccion" name="Direccion" required></textarea>
            <br />
            <label for="Sexo">Sexo:</label>
            <select id="Sexo" name="Sexo">
                <option value="M">Masculino</option>
                <option value="F">Femenino</option>
            </select>
            <br />

            <input type="checkbox" class="che" id="ESangre" name="ESangre" value="si">ES<img
                src="images/prueba.png"></input>
            <input type="checkbox" class="che" id="EPopo" name="EPopo" value="si">EMF<img src="images/popo.png"></input>
            <input type="checkbox" class="che" id="EOrina" name="EOrina" value="si">EGO<img
                src="images/orina.png"></input>
            <br />


            <input type="submit" id="En" name="En" value="Registrar" class="boton">
        </form>
        <?php
        date_default_timezone_set('America/Mexico_City');
        //echo "hola1";
        $IMPRESION = "";
        require_once "./Basedatos.php";
        $db = database;
        if (isset($_POST["En"])) {
            //echo"entre";
        
            $NOMBRE = $_POST["Nombre"];
            $EDAD = $_POST["Edad"];
            $DIRECCION = $_POST["Direccion"];
            $SEXO = $_POST["Sexo"];
            $SANGRE = $_POST["ESangre"];
            $ORINA = $_POST["EOrina"];
            $POPO = $_POST["EPopo"];






            $CONEX = mysqli_connect(server, user, password, database, port);
            $qi = "SELECT * FROM `ALTAS`;";
            $res = mysqli_query($CONEX, $qi);
            $id = 0;
            while ($re = mysqli_fetch_assoc($res)) {

                $id = $re["ID"] + 1;
            }


            $FECHA = date('d-m-Y');
            $hour = date('H');
            //echo $hour;
            $HORA = date('H:i.s');


            $conexionbd = mysqli_connect(server, user, password, database, port);
            $clave = $id . "" . $EDAD . "" . $SEXO;
            $q1 = "INSERT INTO `$db`.`ALTAS`(`ID`,`CLAVE`,`NOMBRE`,`EDAD`,`SEXO`,`DIRECCION`,`ESTUDIO`,`FECHA`,`HORA`) VALUES 
('0','" . $clave . "','" . $NOMBRE . "','" . $EDAD . "','" . $SEXO . "','" . $DIRECCION . "','" . $ESTUDIO . "','" . $FECHA . "','" . $HORA . "');";
            echo $q1;
            $resultado = mysqli_query($conexionbd, $q1);
            $PRECIOTOTAL = 0;
            if ($resultado) {
                //echo "agregado";
        
                $CONEXIONDINERO = mysqli_connect(server, user, password, database, port);


                /*SOP*/

                //POPO
                if ($POPO == "si") {
                    $queryDinero = "SELECT * FROM `PRECIOS` WHERE ID=3;";
                    $RESULTADODINERO = mysqli_query($CONEXIONDINERO, $queryDinero);

                    while ($salidaDinero = mysqli_fetch_assoc($RESULTADODINERO)) {
                        $PRECIOTOTAL = $PRECIOTOTAL + $salidaDinero["PRECIO"];
                    }

                    $qSangre = "INSERT INTO `$db`.`POPO`(`ID`,`CLAVE`,`COLOR`,`CONSISTENCIA`,`CANTIDAD`,`OLOR`,`PH`,`COMENTARIOS`) VALUES('0','" . $clave . "',' ',' ',' ',' ',' ',' ');";
                    echo $qSangre;
                    $cSangre = mysqli_connect(server, user, password, database, port);
                    $salidaSangre = mysqli_query($cSangre, $qSangre);
                }
                //ORINA
                if ($ORINA == "si") {
                    $queryDinero = "SELECT * FROM `PRECIOS` WHERE ID=2;";
                    $RESULTADODINERO = mysqli_query($CONEXIONDINERO, $queryDinero);

                    while ($salidaDinero = mysqli_fetch_assoc($RESULTADODINERO)) {
                        $PRECIOTOTAL = $PRECIOTOTAL + $salidaDinero["PRECIO"];
                    }

                    $qSangre = "INSERT INTO `$db`.`ORINA`(`ID`,`CLAVE`,`EMBARAZO`,`PH`,`COLOR`,`COMENTARIOS`) VALUES('0','" . $clave . "',' ',' ',' ',' ');";
                    $cSangre = mysqli_connect(server, user, password, database, port);
                    $salidaSangre = mysqli_query($cSangre, $qSangre);
                }

                //echo "EL PRECIO ES: ".$PRECIOTOTAL;
        
                $coneTicket = mysqli_connect(server, user, password, database, port);
                $qTicket = "INSERT INTO `$db`.`TICKET`(`ID`,`CLAVE`,`MONTO`,`CONCEPTO`) VALUES ('0','" . $clave . "','" . $PRECIOTOTAL . "','No pagado');";
                $salidaTicket = mysqli_query($coneTicket, $qTicket);
                $IMPRESION = "Fecha: " . $FECHA .
                    "<br/> Hora: " . $HORA .
                    "<br/> Su clave es: " . $clave .
                    "<br/> El total a pagar es: $" . $PRECIOTOTAL . " MXN" .
                    "<br/> Concepto: No pagado";
                echo "<script>function Imprimir(){
print();
}</script>";
                ?>
                <p class="Caja">
                    <?php echo $IMPRESION; ?>
                </p>
                <?php
                //echo"<br/><input type='button' onClick='Imprimir()' value='Imprimir'>";
            } else {
                echo "no se agrego";
            }
        }
        ?>
        </br>
        <a href='Imp.php?RECIBO=<?php echo $IMPRESION; ?>' target="_blank" class="boton">Imprimir</a>
</body>

</html>