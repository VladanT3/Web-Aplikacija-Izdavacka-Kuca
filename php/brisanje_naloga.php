<?php
    session_start();
    include("db_connection.php");

    $upit = $conn->prepare("delete from kupac where kupac_id = ?");
    $upit->bind_param("i", $_SESSION['id']);
    if($upit->execute())
    {
        include("izlogovanje.php");
    }