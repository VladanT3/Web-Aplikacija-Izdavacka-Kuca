<?php
    session_start();
    include("db_connection.php");

    $knjiga = $_POST['idKnjige'];
    $kolicina = $_POST[$knjiga];

    if($kolicina == 0)
    {
        header("Location: ../stranice/prodavnica.php");
        die();
    }

    $upit = $conn->prepare("select * from knjiga where knjiga_id = ?");
    $upit->bind_param("s", $knjiga);
    $upit->execute();
    $rez = $upit->get_result();
    $red = $rez->fetch_assoc();

    $_SESSION['stavka'] = ["id" => $red['knjiga_id'], "naziv" => $red['naziv_knjige'], "cena" => $red['prodajna_cena'], "kolicina" => $kolicina];
    array_push($_SESSION['korpa'], $_SESSION['stavka']);
    //$_SESSION['knjiga_idRacun'] = $red['knjiga_id'];
    //$_SESSION['nazivRacun'] = $red['naziv_knjige'];
    //$_SESSION['proCenaRacun'] = $red['prodajna_cena'];
    //$_SESSION['kolicinaRacun'] = $_POST[$knjiga];

    header("Location: ../stranice/prodavnica.php");