<?php
session_start();
$user=$_SESSION["user"];
$pass=$_SESSION["pass"];
if($user==null and $pass==null){
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
<link rel="stylesheet" href="estilos.css">
</head>
<body>
<a href="./">Regresar</a>
<a href="../exit/ExitSession.php">Cerrar secion</a>
<center>
<h1>Resultados</h1>
<a href="ESangre.php"><img src="">ES</a>
<a href="EOrina.php"><img src="">EGO</a>
<a href="EPopo.php"><img src="">EMF</a>

</body>
</html>
