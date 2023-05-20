<?php
    include("db_connection.php");
    
    $brisanje_id = $_GET['delete_id'];

    $upit = $conn->prepare("delete from knjiga where knjiga_id = ?");
    $upit->bind_param("s", $brisanje_id);

    if($upit->execute())
        header("Location: ../stranice/magacin.php");
    else
        die("Doslo je do greske pri brisanju knjige!");