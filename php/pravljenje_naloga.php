<?php
    session_start();
    include("db_connection.php");

    $ime = $_POST['inputIme'];
    $prezime = $_POST['inputPrezime'];
    $grad = $_POST['inputGrad'];
    $adresa = $_POST['inputAdresa'];
    $zip = $_POST['inputZip'];
    $brojTel = $_POST['inputBrojTel'];
    $email = $_POST['inputEmail'];
    $sifra = $_POST['inputSifra'];
    $datumRodj = $_POST['inputDatum'];

    $upitProveraEmailKupac = $conn->prepare("select count(*) as brojEmail from kupac where email = '$email'");
    $upitProveraEmailKupac->execute();
    $rezKupac = $upitProveraEmailKupac->get_result();
    $redKupac = $rezKupac->fetch_assoc();

    $upitProveraEmailRadnik = $conn->prepare("select count(*) as brojEmail from radnik where email = '$email'");
    $upitProveraEmailRadnik->execute();
    $rezRadnik = $upitProveraEmailRadnik->get_result();
    $redRadnik = $rezRadnik->fetch_assoc();

    if($redKupac['brojEmail'] > 0 || $redRadnik['brojEmail'] > 0)
    {
        $_SESSION['greskaEmailSignup'] = 1;
        header("Location: ../stranice/signup.php");
    }
    else
    {
        $_SESSION['greskaEmailSignup'] = null;

        $upit = $conn->prepare("insert into kupac values('', ?, ?, ?, password(?), ?, ?, ?, ?, ?)");
        $upit->bind_param("sssssssss", $ime, $prezime, $email, $sifra, $datumRodj, $grad, $adresa, $zip, $brojTel);
        if($upit->execute())
        {
            include("ulogovanje.php");
            loginKupac($email, $sifra);
        }
    }