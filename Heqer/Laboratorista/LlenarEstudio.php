<?php
session_start();
$user=$_SESSION["user"];
$pass=$_SESSION["pass"];
if($user==null and $pass==null){
header('Location:../');
}
?>
<!--Seccion de el laborista-->
<html>
<head>
<title>Heqer</title>
    <link rel="icon" href="../images/usuario.png">
</head>
<body>

<a href="./">Regresar</a>
<a href="../exit/ExitSession.php">Cerrar seción</a>

<h1>General</h1>
<form method="post">
<label for="CLAVE">Clave:</label>
<input type="text" id="CLAVE" name="CLAVE" placeholder="Escribe aqui..." required>
<input type="submit" id="Seleccionar" name="Seleccionar" value="Seleccionar">
</form>
<?php
require_once '../Database/Basededatos.php';
if(ISSET($_POST["Seleccionar"])){
$conexionbd=mysqli_connect(server,user,password,database,port);
$CLAVE=$_POST["CLAVE"];
$query="SELECT * FROM `ALTAS` WHERE CLAVE='".$CLAVE."';";
$RESULTADO=mysqli_query($conexionbd,$query);
$estudio="";
if($salida=mysqli_fetch_assoc($RESULTADO)){
$estudio=$salida["ESTUDIO"];
    //echo "<input type='text' name='' id='' placeholder='Escribe aqui'>";

    $query2="SELECT * FROM `FESTUDIO` WHERE ESTUDIO='".$estudio."';";
    $conexionbd2=mysqli_connect(server,user,password,database,port);
    $resultado2=mysqli_query( $conexionbd2,$query2);
    while($fila=mysqli_fetch_assoc($resultado2)){
        echo "<input type='text' name='".$fila["PREGUNTA"]."' id='' placeholder='Escribe aqui'>";
  

}

}
}
?>
</body>
</html>
