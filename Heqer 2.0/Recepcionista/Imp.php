<style>
    .AlineacionD {
        text-align: right;
        margin: 2px;
        padding: 2px;
    }

    .AlineacionI {
        text-align: left;
        margin: 2px;
        padding: 2px;
    }


</style>
<title>Heqer</title>
<link rel="icon" href="../images/usuario.png">
<link rel="icon" href="../images/usuario.png">

    <?php
    session_start();
    $user = $_SESSION["user"];
    $pass = $_SESSION["pass"];
    if ($user == null and $pass == null) {
        header('Location:../');
    }
    $arr = $_SESSION["arr"];
    $en = $_SESSION["en"];
    $con = $_SESSION["con"];
    echo $arr . $en . "<br/><br/>" . $con;
    echo "<script>window.print();</script>";
?>
