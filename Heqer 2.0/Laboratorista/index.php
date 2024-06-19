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
<link rel="stylesheet" href="../estilosCss/estilos1.css">
<link rel="stylesheet" href="../estilosCss/Iconos.css">
</head>
<body>
    <div class="gradiente">
<a href="../exit/ExitSession.php">Cerrar sesión</a>
<center>
<h1>Laboratorista</h1>
<!--a href="./Sangre.php"><img src="../images/prueba.png">ES</a>
<a href="./Popo.php"><img src="../images/popo.png">EMF</a>
<a href="./Orina.php"><img src="../images/orina.png">EGO</a-->
<a href="./NuevoEstudio.php"><img src="../images/orina.png">Nuevo Estudio</a>
<a href="./LlenarEstudio.php"><img src="../images/orina.png">Llenar estudio</a>

</center>
</div>
</body>
</html>
