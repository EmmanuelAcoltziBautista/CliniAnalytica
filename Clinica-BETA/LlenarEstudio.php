<!--Seccion de el laborista-->
<html>
<head>
<title>Recopilacion</title>
</head>
<body>
<h1>General</h1>
<form method="post">
<label for="CLAVE">Clave:</label>
<input type="text" id="CLAVE" name="CLAVE" placeholder="Escribe aqui..." required>
<input type="submit" id="Seleccionar" name="Seleccionar" value="Seleccionar">
</form>
<?php
require_once './Basededatos.php';
if(ISSET($_POST["Seleccionar"])){
$conexionbd=mysqli_connect(server,user,password,database,port);
$CLAVE=$_POST["CLAVE"];
$query="SELECT * FROM `RESTUDIO` WHERE CLAVE='".$CLAVE."';";
$RESULTADO=mysqli_query($conexionbd,$query);

while($salida=mysqli_fetch_assoc($RESULTADO)){
echo "<input type='text' name='' id='' placeholder='Escribe aqui'>";
}

}
?>
</html>
