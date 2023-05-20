<?php
    session_start();
    include("db_connection.php");

    $stamparija = $_POST['stamparija'];

    $upit = $conn->prepare("insert into porudzbenica(iznos_porudzbenice, radnik_id, stamparija_id) values(?, ?, ?)");
    $upit->bind_param("dss", $_SESSION['ukupnaCena'], $_SESSION['idRadnik'], $stamparija);
    if($upit->execute())
    {
        $upit = $conn->prepare("select max(porudzbenica_id) as poslednjaPorudzbenica from porudzbenica");
        $upit->execute();
        $rez = $upit->get_result();
        $red = $rez->fetch_assoc();
        $porudzbenica_id = $red['poslednjaPorudzbenica'];

        foreach($_SESSION['noveStavke'] as $s)
        {
            $upitStavka = $conn->prepare("insert into stavka_porudzbenice(porudzbenica_id, knjiga_id, naziv_stavke, cena_stavke, kolicina) values(?, ?, ?, ?, ?)");
            $upitStavka->bind_param("issdi", $porudzbenica_id, $s['id'], $s['naziv'], $s['cena'], $s['kolicina']);
            $upitStavka->execute();

            $upitUpdateKnjige = $conn->prepare("update knjiga set kolicina = kolicina + ? where knjiga_id = ?");
            $upitUpdateKnjige->bind_param("is", $s['kolicina'], $s['id']);
            $upitUpdateKnjige->execute();
        }
        header("Location: ../stranice/admin.php");
    }