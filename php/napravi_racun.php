<?php
    session_start();
    include("db_connection.php");

    if(isset($_SESSION['idKupac']))
    {
        $_SESSION['greskaCheckout'] = null;

        $upit = $conn->prepare("insert into racun(iznos_racuna, kupac_id) values(?, ?)");
        $upit->bind_param("di", $_SESSION['ukupnaCenaKorpe'], $_SESSION['idKupac']);
        if($upit->execute())
        {
            $upit = $conn->prepare("select max(racun_id) as poslednjiRacun from racun");
            $upit->execute();
            $rez = $upit->get_result();
            $red = $rez->fetch_assoc();
            $racun_id = $red['poslednjiRacun'];

            foreach($_SESSION['korpa'] as $s)
            {
                $upitStavka = $conn->prepare("insert into stavka_racuna(racun_id, knjiga_id, naziv_stavke, cena_stavke, kolicina) values(?, ?, ?, ?, ?)");
                $upitStavka->bind_param("issdi", $racun_id, $s['id'], $s['naziv'], $s['cena'], $s['kolicina']);
                $upitStavka->execute();

                $upitUpdateKnjige = $conn->prepare("update knjiga set kolicina = kolicina - ? where knjiga_id = ?");
                $upitUpdateKnjige->bind_param("is", $s['kolicina'], $s['id']);
                $upitUpdateKnjige->execute();
            }
            header("Location: ../index.php");
        }
    }
    else
    {
        $_SESSION['greskaCheckout'] = 1;
        header("Location: ../stranice/checkout.php");
    }