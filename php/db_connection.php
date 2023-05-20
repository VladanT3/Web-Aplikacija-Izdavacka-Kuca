<?php
    $conn = new mysqli("localhost", "root", "", "izdavacka_kuca");

    if($conn->connect_error)
        die("Doslo je do greske " . $conn->connect_errno . ": " . $conn->connect_error);