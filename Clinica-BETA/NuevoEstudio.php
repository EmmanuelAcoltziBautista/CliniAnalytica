<?php
require_once './Basedatos.php';
$conexionbd=mysqli_connect(server,user,password,database,port);
$db=database;
?>
<html>
<head>
<title>NuevoEstudio</title>
<link rel="text/css" href=""></link>
</head>
<body>
<a href="index.php">Cerrar seción</a>
<a href="">Regresar</a>
<center>
<h1>Nuevo Estudio</h1>

<form method="post">
<label for="Estudio">Nombre del Estudio</label>
<input type="text" name="Estudio" id="Estudio" placeholder="Escribe aqui..." required>

<label for="Seccion">Nombre del campo</label>
<input type="text" id="Seccion" name="Seccion" placeholder="Escribe aqui..." required>
<input type="submit" id="Enviar" name="Enviar" value="Agregar">

</form>

</center>
<?php
if(ISSET($_POST["Enviar"])){
$Estudio=$_POST["Estudio"];
$Campo=$_POST["Seccion"];
$query="INSERT INTO `$db`.`FESTUDIO` (`ID`,`ESTUDIO`,`PREGUNTA`) VALUES ('0','".$Estudio."','".$Campo."');";
$resultadoQuery=mysqli_query($conexionbd,$query);
if($resultadoQuery){
echo"nice";
}

}
?>

<form method="post">
<label for="">Estudio</label>
<select id="TextoBusqueda" name="TextoBusqueda">
<?php
$conexionbd5=mysqli_connect(server,user,password,database,port);
$query5="SELECT * FROM FESTUDIO;";
$resultados=mysqli_query($conexionbd5,$query5);
while($ejecu=mysqli_fetch_assoc($resultados)){
echo "<option value='".$ejecu['ESTUDIO']."'>".$ejecu['ESTUDIO']."</option>";
}
?>
</select>
<input type="submit" id="Buscar" name="Buscar" value="Seleccionar">
</form>



<table border="1">
<tr>
<th>Estudio</th>
<th>Campo</th>
<th>Eliminar</th>
</tr>
<ul>


<?php
$conexion=mysqli_connect(server,user,password,database,port);
if(ISSET($_POST["Buscar"])){
$TextoBusqueda=$_POST["TextoBusqueda"];
$query1="SELECT * FROM `FESTUDIO` WHERE ESTUDIO='".$TextoBusqueda."';";
$resultadoBusqueda=mysqli_query($conexion,$query1);


while($registro=mysqli_fetch_assoc($resultadoBusqueda)){
$eli="EliminarCampo.php?ID=".$registro['id'];
echo "<tr><td>".$registro["ESTUDIO"]."</td><td>".$registro["PREGUNTA"]."</td><td><a href='".$eli."'>Eliminar</a></td>";

}

}
?>


</body>
</html>
