<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heqer</title>
    <script src="./js/alert.js"></script>
    <link rel="stylesheet" href="./estilosCss/alert.css">
    <link rel="icon" href="./images/usuario.png">
    <link rel="stylesheet" href="./estilosCss/estilos1.css">
<style>
    @media(max-width:767px) {
        img{
        width: 200px;
        height: 200px;
        
    }}
</style>
</head>
<body>

<div class="gradiente">
<center>




<h1>Heqer</h1>
<img src="images/usuario.png">
    <form method="post">
    <label for="Usuario"><b>N. Usuario</b></label>
    <input type="number" id="Usuario" name="Usuario" placeholder="Usuario:" required>
<br/>
  
  <label for="Contrasena"><b>Contrasena</b></label>
    <input type="password" id="Contrasena" name="Contrasena" placeholder="Contraseña:" required>
<br/>
 
   <input type="submit" class="boton" id="Enviar" name="Enviar" value="Ingresar">
    </form >
    <?php
    //En esta seccion pregunto si toco el boton
    
    if(ISSET($_POST["Enviar"])){

    require_once "./Database/Basedatos.php";
    $conexionbd=mysqli_connect(server,user,password,database,port);
    $Usuario=$_POST["Usuario"];
    $Contrasena=$_POST["Contrasena"];

    $query="SELECT * FROM `USUARIOS` WHERE ID=".$Usuario." AND CONTRASENA='".$Contrasena."';";
    $ConsultaUsuarios=mysqli_query($conexionbd,$query);
        if($res=mysqli_fetch_assoc($ConsultaUsuarios)){
            $query2="SELECT `SECTOR` FROM `USUARIOS` WHERE ID=$Usuario";
            $ConsultaSector=mysqli_query($conexionbd,$query2);
		$r=mysqli_fetch_assoc($ConsultaSector);
		if($r["SECTOR"]=="Administrador"){
		header('Location: ./Administrador');
		}
		if($r["SECTOR"]=="Laboratorista"){
		header('Location: ./Laboratorista');
	}
		if($r["SECTOR"]=="Recepcion"){
		header('Location: ./Recepcionista');
	}
            	if($r["SECTOR"]=="Contador"){
		header('Location: Contador.php');
	}
        }else{
            echo"<script>swal.fire(
                {
                    position:'center',
                    title:'Error',
                    icon:'warning',

            }
        );</script>";

        }

    }
    ?>
<!--footer>
 
</footer-->
</div>
</body>
</html>
