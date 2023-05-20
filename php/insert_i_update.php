<?php
    include("db_connection.php");

    $id = $_POST['id'];
    $naziv = $_POST['naziv'];
    $autor = $_POST['autor'];
    $proCena = $_POST['proCena'];
    $nabCena = $_POST['nabCena'];
    $slika = $_POST['slika'];

    if(isset($_POST['btnUnos']))
    {   
        $upitProvera = $conn->prepare("select count(*) as broj from knjiga where knjiga_id = ?");
        $upitProvera->bind_param("s", $id);
        $upitProvera->execute();
        $rezProvera = $upitProvera->get_result();
        $redProvera = $rezProvera->fetch_assoc();

        if($redProvera['broj'] == 0)
        {
            $_SESSION['greskaID'] = null;
            $upit = $conn->prepare("insert into knjiga values(?, ?, ?, 0, ?, ?, ?)");
            $upit->bind_param("sssdds", $id, $naziv, $autor, $nabCena, $proCena, $slika);
            if($upit->execute())
                header("Location: ../stranice/magacin.php");
            else
                die("Doslo je do greske pri unosu nove knjige!");
        }
        else
        {
            $_SESSION['greskaID'] = 1;
            header("Location: ../stranice/unos_izmena.php");
        }
    }

    elseif(isset($_POST['btnIzmena']))
    {
        $upit = $conn->prepare("
            update knjiga 
            set naziv_knjige = ?, autor = ?, nabavna_cena = ?, prodajna_cena = ?, slika = ?
            where knjiga_id = ?");
        $upit->bind_param("ssddss", $naziv, $autor, $nabCena, $proCena, $slika, $id);
        if($upit->execute())
            header("Location: ../stranice/magacin.php");
        else
            die("Doslo je do greske pri menjanju izabrane knjige!");
    }

