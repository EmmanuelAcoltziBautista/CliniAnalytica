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
<?php
require_once "./Basedatos.php";
if(!empty($_GET["CLAVE"]) && !empty($_GET["ESTUDIO"])){
$conexionbd=mysqli_connect(server,user,password,database,port);
$CLAVE=$_GET["CLAVE"];
$ESTUDIO=$_GET["ESTUDIO"];
$query="SELECT * FROM `IMPRIMIR` WHERE CLAVE='".$CLAVE."' AND ESTUDIO='".$ESTUDIO."';";
$salida=mysqli_query($conexionbd,$query);
if($si=mysqli_fetch_assoc($salida)){
echo $si["TEXTO"];
echo "<script>
window.print();
</script>";
}

}
?>
