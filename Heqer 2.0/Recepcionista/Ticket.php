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
<h1>Ticket</h1>

<form method="post">
<label for="CLAVE">Clave:</label>
<input type="text" id="CLAVE" name="CLAVE" placeholder="CLAVE" required>
<input type="submit" id="Enviar" name="Enviar" value="Mostrar" class="boton">
</form>


<?php
require_once "../Database/Basedatos.php";
$CLAVE="";
$MONTOS="";
if(ISSET($_POST["Enviar"])){
$conexionbd=mysqli_connect(server,user,password,database,port);
$CLAVE=$_POST["CLAVE"];
$query="SELECT * FROM `TICKET` WHERE CLAVE='".$CLAVE."'";
$RESULTADO=mysqli_query($conexionbd,$query);
if($registro=mysqli_fetch_assoc($RESULTADO)){
$MONTOS=$registro["MONTO"];
$concepto=$registro["CONCEPTO"];
//echo "<p class >El registro de ".$registro["CLAVE"]." tiene un monto de ".$registro["MONTO"]." CONCEPTO:".$registro["CONCEPTO"];
if($concepto=="Pagado"){
    echo"<script>
    swal.fire({
        position:'center',
        title:'Pagado',
        icon:'success',
    
    
    });
    </script>";
$MONTOS=0;
}

}
}

?>
<form method='post'>
<label for="CLAVE1">Clave:</label>

<input type='text' id='CLAVE1' name='CLAVE1' readonly="readonly" value='<?php echo $CLAVE; ?>'required></input>
<label for="MONTO1">Monto:</label>
<input type='text' id='MONTO1' name='MONTO1' readonly="readonly" value='<?php echo $MONTOS; ?>' required></input>
<input type='submit' id='PAGO' name='PAGO' value='Acreditar pago' class="boton">
</form>


<?php
if(ISSET($_POST['PAGO'])){
$CLAVE1=$_POST['CLAVE1'];
$MONTO1=$_POST['MONTO1'];
$conexionbd5=mysqli_connect(server,user,password,database,port);
$query6='UPDATE `TICKET` SET CONCEPTO="Pagado" WHERE CLAVE="'.$CLAVE1.'";';
//echo $query6;
$resultado1=mysqli_query($conexionbd5,$query6);
$conexion6=mysqli_connect(server,user,password,database,port);
$query7='UPDATE `GANANCIAS` SET GANANCIAS=GANANCIAS+'.$MONTO1.' WHERE ID=1';
$SALIDAG=mysqli_query($conexion6,$query7);
if($SALIDAG && $resultado1){
    echo"<script>
    swal.fire({
        position:'center',
        title:'Pago acreditado',
        icon:'success',
    
    
    });
    </script>";
}
}
?>
</div>
</body>
</html>
