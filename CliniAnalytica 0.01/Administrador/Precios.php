<?php
require_once '../Database/Basedatos.php';
$conexionbd=mysqli_connect(server,user,password,database,port);
$query="SELECT * FROM `PRECIOS`;";
$resultado=mysqli_query($conexionbd,$query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../images/usuario.png">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CliniAnalytica</title>
<link rel="stylesheet" href="../estilosCss/estilos1.css">
<style type="text/css">
select{
font-size:20px;
margin:3px;
padding:3px;

}

table,th,td{
color:rgb(255,255,255);

}
</style>
</head>
<body>
    <div class="gradiente">
<a href="./">Regresar</a>
<a href="../">Cerrar sesión</a>
<center>
<h1>Precios</h1>
<table border="1">
<tr>
<th>Estudio</th>
<th>Precio</th>
</tr>
<ul>
<?php
while($r1=mysqli_fetch_assoc($resultado)){
echo"<tr><td>".$r1["ESTUDIO"]."</td><td>".$r1["PRECIO"]."</td>";
}
?>

<br/>

<form method="post">
<select id="Estudio" name="Estudio">
<?php
$cone=mysqli_connect(server,user,password,database,port);
$RESU=mysqli_query($cone,$query);
while($r2=mysqli_fetch_assoc($RESU)){
echo"<option value=".$r2["ESTUDIO"].">".$r2["ESTUDIO"]."</option>";
}
?>
</select>
<label for="Precio"></label>
<input type="text" id="Precio" name="Precio" placeholder="Precio">
<input type="submit" id="Enviar" name="Enviar" value="Actualizar" class="boton">

</form>
<?php
$conexion11=mysqli_connect(server,user,password,database,port);
if(ISSET($_POST["Enviar"])){
$PRECIO=$_POST["Precio"];
$ESTUDIO=$_POST["Estudio"];
$query2="UPDATE `PRECIOS` SET PRECIO=".$PRECIO." WHERE ESTUDIO='".$ESTUDIO."';";
//echo $query2;
$SALIDA=mysqli_query($conexion11,$query2);
//if($SALIDA){
echo"<script>alert('La actualizacion se realizo con exito');document.location.href='Precios.php';</script>";
//}
}
?>
</center>
</div>
</body>
</html>
