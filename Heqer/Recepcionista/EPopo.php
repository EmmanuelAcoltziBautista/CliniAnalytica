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
<style type="text/css">
.BoxSalida{
background:rgb(255,255,255);
border:3px solid rgb(0,0,0);
font-size:14px;
font-family:Arial;
font-weight:normal;
width:50%;
}
.AlineacionD{
text-align:right;
margin:2px;
paddin:2px;
}
.AlineacionI{
text-align:left;
margin:2px;
padding:2px;
}



</style>
<script src="../js/Imprimir.js">
</script>

</head>
<body>
    <div class="gradiente">
<a href="./">Regresar</a>
<a href="../exit/ExitSession.php">Cerrar sesión</a>
<center>
<h1>Resultados EMF</h1>
<form method="post">
<label for="CLAVE">Clave</label>
<input type="text" id="CLAVE" name="CLAVE" placeholder="Clave:" required>
<input type="submit" id="enviar" name="enviar" value="Mostrar" class="boton">
<form>
<?php
$SALIDAout="";
$CLAVE="";
require_once '../Database/Basedatos.php';
if(ISSET($_POST["enviar"])){
$conexionbd=mysqli_connect(server,user,password,database,port);
$CLAVE=$_POST["CLAVE"];
$query="SELECT * FROM `POPO` WHERE CLAVE='".$CLAVE."';";
$RESULTADO=mysqli_query($conexionbd,$query);

$query2="SELECT * FROM `ALTAS` WHERE CLAVE='".$CLAVE."';";
$conexionbd2=mysqli_connect(server,user,password,database,port);
$Resultado2=mysqli_query($conexionbd2,$query2);

$REGISTRO=mysqli_fetch_assoc($RESULTADO);
$DATOS=mysqli_fetch_assoc($Resultado2);
if($REGISTRO && $DATOS){
$FECHA=$DATOS["FECHA"];
$HORA=$DATOS["HORA"];
$NOMBRE=$DATOS["NOMBRE"];
$EDAD=$DATOS["EDAD"];
$SEXO=$DATOS["SEXO"];

$COLOR=$REGISTRO["COLOR"];
$CONSISTENCIA=$REGISTRO["CONSISTENCIA"];
$CANTIDAD=$REGISTRO["CANTIDAD"];
$OLOR=$REGISTRO["OLOR"];
$PH=$REGISTRO["PH"];
$COMENTARIOS=$REGISTRO["COMENTARIOS"];

date_default_timezone_set('America/Mexico_City');

$SALIDAout="
<br/>
<p class='AlineacionD'>
Fecha de impresion:<b>.".date('d-m-Y')."</b>
<br/>
Hora de impresion:<b>".date('H:i:s')."</b>
<br/></br>
Fecha de muestras: <b>".$FECHA."</b><br/>
Hora de muestras:<b>".$HORA."</b>
</p>

<p class='AlineacionI'>
<br/>

Nombre: <b>".$NOMBRE."</b> Edad: <b>".$EDAD."</b> Sexo biologico: <b>".$SEXO."</b>
<br/>
<br/>
Color: <b>".$COLOR."</b>
<br/>

Consistencia: <b>".$CONSISTENCIA."</b>
<br/>
Cantidad: <b>".$CANTIDAD."</b>
<br/>
Olor: <b>".$OLOR."</b>
<br/>
PH: <b>".$PH."</b>
<br/>
<br/>
Comentarios:<br/>
<b>".$COMENTARIOS."
</b>
</p>

";

}
}
?>
<div class="BoxSalida">
<?php echo $SALIDAout; ?>

</div>
<?php
$conexion=mysqli_connect(server,user,password,database);
$q2='INSERT INTO `IMPRIMIR`(`ID`,`CLAVE`,`ESTUDIO`,`TEXTO`) VALUES("0","'.$CLAVE.'","2","'.$SALIDAout.'");';
$resultado5=mysqli_query($conexion,$q2);
?>
<a href="Imprimir.php?CLAVE=<?php echo $CLAVE; ?>&ESTUDIO=2" target="_blank"><img src="../images/impresora.png" class="print"></a>

</div>
</body>
</html>
