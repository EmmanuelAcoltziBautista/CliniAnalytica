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
<form method="post">
<label for="CLAVE">Clave</label>
<input type="text" id="CLAVE" name="CLAVE" placeholder="Clave:" required>
<input type="submit" id="enviar" name="enviar" value="Mostrar">
<form>
<?php
require_once './Basedatos.php';
if(ISSET($_POST["enviar"])){
$conexionbd=mysqli_connect(server,user,password,database,port);
$CLAVE=$_POST["CLAVE"];
$query="SELECT * FROM `ALTAS` WHERE CLAVE='".$CLAVE."';";
$RESULTADO=mysqli_query($conexionbd,$query);
if($REGISTRO=mysqli_fetch_assoc($RESULTADO)){

$sangre=$REGISTRO["SANGRE"];
$orina=$REGISTRO["ORINA"];
$popo=$REGISTRO["POPO"];

if($sangre=="si"){

}
if($orina=="si"){
$coneOrina=mysqli_connect(server,user,password,database,port);
$qOrina="SELECT * FROM ORINA WHERE CLAVE='".$CLAVE."'";
$rOrina=mysqli_query($coneOrina,$qOrina);
if($reOrina=mysqli_fetch_assoc($rOrina)){

}
}
if($popo=="si"){

}



}
}
?>
</body>
</html>
