<?php
session_start();
$user=$_SESSION["user"];
$pass=$_SESSION["pass"];
if($user==null and $pass==null){
header('Location:../');
}
?>
<style type="text/css">
.Caja{
border:3px solid #000000;
background:#ffffff;
width:20%;
margin:3px;
padding:3px;
font-size:15px;
font-family:Arial;
color:rgb(0,0,0);
font-weight:bold;

}

</style>
<title>Heqer</title>
<?php
if(!empty($_GET["RECIBO"])){
$SALIDA=$_GET["RECIBO"];

echo "<p class='Caja'>".$SALIDA."</p>";
echo"<script>window.print();</script>";
}

?>
