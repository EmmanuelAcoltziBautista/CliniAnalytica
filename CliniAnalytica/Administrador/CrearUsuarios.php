<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CliniAnalytica</title>
<style type="text/css">
select{
font-size:20px;
margin:3px;
padding:3px;

}

</style>
<link rel="stylesheet" href="../estilosCss/estilos1.css">
<link rel="icon" href="../images/usuario.png">

</head>
<body>
    <div class="gradiente">
<a href="index.php">Regresar</a>
<a href="../">Cerrar secion</a>
<center>
<h1>Crear usuarios</h1>

    <form method="post">
        <label for="Nombre">Ingresa el nombre:</label>
        <input type="text" id="Nombre" name="Nombre" required>
        <br/>
        <label for="Contrasena">Ingresa la contraseña:</label>
        <input type="password" id="Contrasena" name="Contrasena">
        <br/>
	<label for="Sector">Area:</label>
	<select id="Sector" name="Sector">
	<option value="Administrador">Administrador</option>
	<option value="Laboratorista">Laboratorista</option>
	<option value="Recepcion">Recepcion</option>
	<!--option value="Contador">Contador</option-->
	</select>
	<br/>
	<input type="submit" id="Enviar" name="Enviar" class="boton" value="Registrar empleado">
</form>


<?php

require_once '../Database/Basedatos.php';
$conexionbd=mysqli_connect(server,user,password,database,port);
$conexion=mysqli_connect(server,user,password,database,port);
$q1="SELECT * FROM `USUARIOS`;";
$RESULT=mysqli_query($conexion,$q1);
$VAR1=0;
while($salida=mysqli_fetch_assoc($RESULT)){
$VAR1=$salida["ID"]+1;
}
if(ISSET($_POST["Enviar"])){

$NOMBRE=$_POST["Nombre"];
$CONTRASENA=$_POST["Contrasena"];
$SECTOR=$_POST["Sector"];

$query="INSERT INTO `CLINICA`.`USUARIOS` (`ID`,`NOMBRE`,`CONTRASENA`,`SECTOR`)
 VALUES('0','".$NOMBRE."','".$CONTRASENA."','".$SECTOR."');";

$resultado=mysqli_query($conexionbd,$query);
if($resultado){

echo"<script>
alert('El usuario se agrego de forma exitosa. El numero de usuario es: '+$VAR1);
</script>";
}else{
echo"<script>
alert('El usuario no se registro');

</script>";
}

}
?>
</center>
</div>
</body>
</html>
