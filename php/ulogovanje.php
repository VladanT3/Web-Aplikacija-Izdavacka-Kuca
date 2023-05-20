<?php
    session_start();
    include("db_connection.php");

    function loginRadnik($email, $sifra)
    {
        include("db_connection.php");
        
        $upit = $conn->prepare("select * from radnik where email = ? and sifra = password(?)");
        $upit->bind_param("ss", $email, $sifra);
        $upit->execute();
        $rez = $upit->get_result();
        $red = $rez->fetch_assoc();

        $_SESSION['idRadnik'] = $red['radnik_id'];
        $_SESSION['imePrezimeRadnik'] = $red['ime'] . " " . $red['prezime'];
        $_SESSION['emailRadnik'] = $red['email'];
        $_SESSION['datumRodjRadnik'] = $red['datum_rodjenja'];
        $_SESSION['adresaRadnik'] = $red['adresa'];
        $_SESSION['brojTelRadnik'] = $red['broj_telefona'];
        $_SESSION['datumZapRadnik'] = $red['datum_zaposlenja'];

        header("Location: ../stranice/admin.php");
    }
    function loginKupac($email, $sifra)
    {
        include("db_connection.php");

        $upit = $conn->prepare("select * from kupac where email = ? and sifra = password(?)");
        $upit->bind_param("ss", $email, $sifra);
        $upit->execute();
        $rez = $upit->get_result();
        $red = $rez->fetch_assoc();

        $_SESSION['idKupac'] = $red['kupac_id'];
        $_SESSION['imePrezimeKupac'] = $red['ime'] . " " . $red['prezime'];
        $_SESSION['emailKupac'] = $red['email'];
        $_SESSION['datumRodjKupac'] = $red['datum_rodjenja'];
        $_SESSION['gradKupac'] = $red['grad'];
        $_SESSION['adresaKupac'] = $red['adresa'];
        $_SESSION['zipKupac'] = $red['zip'];
        $_SESSION['brojTelKupac'] = $red['broj_telefona'];

        header("Location: ../stranice/nalog.php");
    }

    $email = $_POST['inputEmail'];
    $sifra = $_POST['inputSifra'];

    $upitRadnik = $conn->prepare("select count(*) as provera from radnik where email = ? and sifra = password(?)");
    $upitRadnik->bind_param("ss", $email, $sifra);
    $upitRadnik->execute();
    $rezRadnik = $upitRadnik->get_result();
    $proveraRadnik = $rezRadnik->fetch_assoc();

    $upitKupac = $conn->prepare("select count(*) as provera from kupac where email = ? and sifra = password(?)");
    $upitKupac->bind_param("ss", $email, $sifra);
    $upitKupac->execute();
    $rezKupac = $upitKupac->get_result();
    $proveraKupac = $rezKupac->fetch_assoc();

    if($proveraRadnik['provera'] == 1)
    {
        $_SESSION['greskaLogin'] = null;
        loginRadnik($email, $sifra);
    }
    elseif($proveraKupac['provera'] == 1)
    {
        $_SESSION['greskaLogin'] = null;
        loginKupac($email, $sifra);
    }
    else
    {
        $_SESSION['greskaLogin'] = 1;
        header("Location: ../stranice/login.php");
    }