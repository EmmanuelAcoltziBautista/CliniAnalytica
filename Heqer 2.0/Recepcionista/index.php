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
    <style>
        .gradiente {
            position: fixed;
            width: 100%;
            top: 0px;
            left: 0px;
            height: 100%;
            background: linear-gradient(#000000, transparent);
        }

        body {
            background: url("../images/pruebas.png");
            background-size: 100% 100%;
            background-attachment: fixed;
            background-repeat: no-repeat;
        }

        h1 {
            color: rgb(255, 255, 255);
        }

        input {
            font-size: 20px;
            margin: 3px;
            padding: 3px;
        }

        .boton {
            background: rgb(0, 116, 161);
            color: rgb(255, 255, 255);
            transition: 0.20s;
            border: 1px solid rgb(0, 0, 0);
        }

        .boton:hover {

            border: 1px solid rgb(255, 255, 255);

            background-color: rgb(0, 0, 0);
        }

        label {
            color: rgb(255, 255, 255);
            font-size: 20px;
            font-weight: bold;
        }

        footer {
            background: rgb(255, 255, 255);
            bottom: 25;
            width: 100%;
            height: 10%;
            position: fixed;
            text-aling: center;
        }

        /*PC*/
        @media(max-width:991px) {}

        img {
            /*    width:28%;
        height:28%;
    */
            width: 155px;
            height: 155px;
        }

        @media(max-width:767px) {

            img {
                width: 125px;
                height: 125px;

            }
        }

        a {
            color: rgb(255, 255, 255);
            text-decoration: none;
            font-size: 18px;
        }

        a:hover {
            text-decoration: underline;
            font-weight: bold;
            font-size: 20px;
        }
    </style>

</head>

<body>
    <div class="gradiente">
        <a href="../exit/ExitSession.php">Cerrar sesión</a>
        <center>
            <h1>Recepcion</h1>
            <div class="contenedor">
                <a href="Altas1.php"><img src="../images/addUser.png">Agregar registro</a>
                <a href="Ticket.php"><img src="../images/editar.png">Ticket</a>

                <a href="Result.php"><img src="../images/result.png">Resultados</a>
                </divcla>
            </div>
</body>

</html>