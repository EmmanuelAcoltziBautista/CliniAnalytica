<?php
session_start();
$user=$_SESSION["user"];
$pass=$_SESSION["pass"];
if($user==null and $pass==null){
header('Location:../');
}
?>
<?php
require_once '../Database/Basedatos.php';
$conexionbd=mysqli_connect(server,user,password,database,port);
$db=database;
?>
<html>
<head>
<title>Heqer</title>
    <link rel="icon" href="../images/usuario.png">
    <link rel="stylesheet" href="../estilosCss/estilos1.css">
    <link rel="stylesheet" href="../estilosCss/Iconos.css">
    <link rel="stylesheet" href="../estilosCss/alert.css">
    <script src="../js/alert.js"></script>
    <style type="text/css">

select{
font-size:20px;
margin:3px;
padding:3px;

}
select{
font-size:20px;
margin:3px;
padding:3px;

}

table,th,td{
color:rgb(255,255,255);

}

.check{
    color:rgb(255,255,255);
    width:  20px;
    font-size: 20px;
    height: 20px;
}
</style>
</head>
<body>
    <div class="gradiente">
<a href="./">Regresar</a>
<a href="../exit/ExitSession.php">Cerrar seción</a>

<center>
<h1>Nuevo Estudio</h1>

<form method="post">
<label for="Estudio">Nombre del Estudio</label>
<input type="text" name="Estudio" id="Estudio" placeholder="Escribe aqui..." required>

<label for="Seccion">Nombre del campo</label>
<input type="text" id="Seccion" name="Seccion" placeholder="Escribe aqui..." required>
<br/>
<input type="checkbox" name="Existe" id="Existe" class="check"><label for="Existe">Ya existe el estudio</label>

<input type="submit" id="Enviar" name="Enviar" value="Agregar" class="boton">

</form>

</center>
<?php

if(ISSET($_POST["Enviar"])){
    $SO=$_POST["Existe"];
//    echo $SO;
    $Estudio=$_POST["Estudio"];
    $Campo=$_POST["Seccion"];

    $CONEXI=mysqli_connect(server,user,password,database,port);

    $query="INSERT INTO `$db`.`FESTUDIO` (`ID`,`ESTUDIO`,`PREGUNTA`) VALUES ('0','".$Estudio."','".$Campo."');";
//pregunto si ya existe el estudio
    if($SO==null){
        $queryPrecio="INSERT INTO `$db`.`PRECIOS` (`ID`,`ESTUDIO`,`PRECIO`) VALUES ('0','".$Estudio."','0');";
        $resultadoPrecio=mysqli_query($CONEXI,$queryPrecio);
        $resultadoQuery=mysqli_query($conexionbd,$query);
    
    }else{//si no existe
//        $queryPrecio="UPDATE `PRECIOS` SET `PRECIO`='' WHERE 1";
//solo agrego esto
$resultadoQuery=mysqli_query($conexionbd,$query);
   
    
    }
echo"<script>
swal.fire({
    position:'center',
    title:'Buen trabajo',
    icon:'success',


});
</script>";


}
?>

<form method="post">
<label for="">Estudio</label>
<select id="TextoBusqueda" name="TextoBusqueda" class="text">
<?php
$conexionbd5=mysqli_connect(server,user,password,database,port);
$query5="SELECT ESTUDIO FROM FESTUDIO GROUP BY ESTUDIO;";
$resultados=mysqli_query($conexionbd5,$query5);
while($ejecu=mysqli_fetch_assoc($resultados)){
echo "<option value='".$ejecu['ESTUDIO']."'>".$ejecu['ESTUDIO']."</option>";
}
?>
</select>
<input class="boton" type="submit" id="Buscar" name="Buscar" value="Seleccionar">
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
