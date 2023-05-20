<?php
    session_start();
    include("db_connection.php");

    $knjiga = $_GET['knjiga_id'];

    $upit = $conn->prepare("select * from knjiga where knjiga_id = ?");
    $upit->bind_param("s", $knjiga);
    $upit->execute();
    $rez = $upit->get_result();
    $red = $rez->fetch_assoc();

    $_SESSION['knjiga_idPor'] = $red['knjiga_id'];
    $_SESSION['nazivPor'] = $red['naziv_knjige'];
    $_SESSION['nabCenaPor'] = $red['nabavna_cena'];
    $_SESSION['btnDodajDisabled'] = false;

    header("Location: ../stranice/narucivanje.php");