<?php
session_start();
$user=$_SESSION["user"];
$pass=$_SESSION["pass"];
if($user==null and $pass==null){
header('Location:../');
}
?>
<?php
require_once "../Database/Basedatos.php";
$conexionbd=mysqli_connect(server,user,password,database,port);
$query="SELECT * FROM `USUARIOS`;";
$resultado=mysqli_query($conexionbd,$query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heqer</title>
    <link rel="stylesheet" href="../estilosCss/alert.css">
    <script src="../js/alert.js"></script>
    <link rel="icon" href="../images/usuario.png">

<style type="text/css">
select{
font-size:20px;
margin:3px;
padding:3px;

}

</style>
<link rel="stylesheet" href="../estilosCss/estilos1.css">
</head>
<body>
    <div class="gradiente">
<a href="./">Regresar</a>
<a href="../exit/ExitSession.php">Cerrar sesión</a>
<center>
<h1>Eliminar empleados</h1>
<form method="post">
<select id="Empleado" name="Empleado">
<?php
while($res=mysqli_fetch_assoc($resultado)){
echo"<option value='".$res["NOMBRE"]."'>".$res["NOMBRE"]."</option>";
}
?>
</select>
<select id="Sector" name="Sector">
<?php
$conexio=mysqli_connect(server,user,password,database,port);
$result=mysqli_query($conexio,$query);
while($resulta=mysqli_fetch_assoc($result)){
echo"<option value='".$resulta["SECTOR"]."'>".$resulta["SECTOR"]."</option>";
}
?>
</select>
<input type="submit" id="Enviar" name="Enviar" value="Eliminar" class="boton">
</form>
<?php
if(ISSET($_POST["Enviar"])){
$conex=mysqli_connect(server,user,password,database,port);
$NOMBRE=$_POST["Empleado"];
$sector=$_POST["Sector"];
$que="DELETE FROM `USUARIOS` WHERE NOMBRE='".$NOMBRE."' AND SECTOR='".$sector."';";
$resu=mysqli_query($conex,$que);

if($resu>0){
    echo"<script>
        swal.fire(
            {
                position:'center',
                title:'Buen trabajo',
                icon:'success',
            }
        );

    </script>";
}
}
?>
</div>
</body>
</html>
