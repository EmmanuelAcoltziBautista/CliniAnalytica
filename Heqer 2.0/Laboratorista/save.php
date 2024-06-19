
<?php
require_once "../Database/Basedatos.php";

session_start();
$querys = array();
$i = $_SESSION["i"];
$CLAVE = $_SESSION["CLAVE"];
$preguntas = $_SESSION["PREGUNTAS"];
$respuestas = array();
for ($i0 = 0; $i0 <= $i; $i0++) {
    $pregunta = $preguntas[$i0];
//    echo "<br/>" . $_POST[$pregunta];
    $respuestas[] = $_POST[$pregunta];
}

for ($i1 = 0; $i1 <= $i-1; $i1++) {
    $query = "INSERT INTO `RESTUDIO` (`ID`,`CLAVE`,`PREGUNTA`,`RESPUESTA`) VALUES 
    ('0','$CLAVE','$preguntas[$i1]','$respuestas[$i1]')";
    $conexionbd = mysqli_connect(server, user, password, database, port);
    $result = mysqli_query($conexionbd, $query);
    $cerrar=mysqli_close($conexionbd);
}

header('Location:./LlenarEstudio.php');
?>
