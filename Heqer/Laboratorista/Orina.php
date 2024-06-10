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
    <link rel="stylesheet" href="../estilosCss/alert.css">
    <script src="../js/alert.js"></script>

<link rel="stylesheet" href="../estilosCss/estilos1.css">
</head>
<body>
    <div class="gradiente">
<a href="./">Regresar</a>
<a href="../exit/ExitSession.php">Cerrar sesión</a>
<center>
<h1>EGO</h1>

<form method="post">
<label for="CLAVE">Clave:</label>
<input type="text" id="CLAVE" name="CLAVE" required>
<input type="submit" id="Enviar" name="Enviar" value="Mostrar" class="boton">
</form>


<?php
require_once "../Database/Basedatos.php";
$CLAVE="";
$CLAVE1="";
$MONTO="";
$EMBARAZO1="";
$PH1="";
$COLOR1="";
$COM="";
if(ISSET($_POST["Enviar"])){
$conexionbd=mysqli_connect(server,user,password,database,port);
$CLAVE=$_POST["CLAVE"];
$query="SELECT * FROM `ORINA` WHERE CLAVE='".$CLAVE."'";
$RESULTADO=mysqli_query($conexionbd,$query);
if($registro=mysqli_fetch_assoc($RESULTADO)){
$CLAVE1=$registro["CLAVE"];
$EMBARAZO1=$registro["EMBARAZO"];
$PH1=$registro["PH"];
$COLOR1=$registro["COLOR"];
$COM=$registro["COMENTARIOS"];
}
}

?>
<form method='post'>
<input type='text' id='CLAVE1' name='CLAVE1' readonly="readonly" value='<?php echo $CLAVE1; ?>'required></input>
<label for="Embarazo">Emabarazo:</label>
<input type='text' id='Embarazo' name='Embarazo' value="<?php echo $EMBARAZO1; ?>" required></input>
<label for="ph">PH:</label>
<input type='text' id='ph' name='ph' value="<?php echo $PH1; ?>" required></input>
<label for="Color">Color:</label>
<input type='text' id='Color' name='Color' value="<?php echo $COLOR1; ?>" required></input>
<label for="Comentarios">Comentarios:</label>
<textarea id='Comentarios' name='Comentarios' required><?php echo $COM; ?></textarea>
<input type='submit' id='Registrar' name='Registrar' value='Registrar' class="boton">
</form>


<?php
if(ISSET($_POST['Registrar'])){

$CLAVE1=$_POST['CLAVE1'];
$MONTO1=$_POST['MONTO1'];
$conexionbd5=mysqli_connect(server,user,password,database,port);
$EMBARAZO=$_POST["Embarazo"];
$PH=$_POST["ph"];
$Color=$_POST["Color"];
$Comentarios=$_POST["Comentarios"];
$query6='UPDATE `ORINA` SET EMBARAZO="'.$EMBARAZO.'", PH="'.$PH.'", COLOR="'.$Color.'", COMENTARIOS="'.$Comentarios.'"  WHERE CLAVE="'.$CLAVE1.'";';
//echo $query6;
$resultado1=mysqli_query($conexionbd5,$query6);
if($resultado1>0){
echo"<script>
swal.fire({

    position:'center',
    title:'Buen trabajo',
    icon:'success',

});
</script>";
}
}
?>
</div>
</body>
</html>
