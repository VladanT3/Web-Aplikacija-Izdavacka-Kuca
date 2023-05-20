<?php
    session_start();
    $_SESSION['noveStavke'] = [];
    $_SESSION['stareStavke'] = [];
    $_SESSION['btnDodajDisabled'] = true;
    $_SESSION['ukupnaCena'] = 0;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Vladan Tešić | vladt.t33@gmail.com">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Računi</title>
</head>
<body>
    <header>
        <nav class="navbar fixed-top navbar-expand-lg bg-warning">
            <div class="container-fluid">
                <a class="navbar-brand" href="../index.php">
                    <img src="../img/logo.png" alt="Logo" width="50" height="50">
                    Strahor
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="admin.php">
                                <i class="fa-solid fa-display fa-lg bi d-block mx-auto mb-1"></i>
                                Admin panel
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="magacin.php">
                                <i class="fa-solid fa-warehouse fa-lg bi d-block mx-auto mb-1"></i>
                                Magacin
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="narucivanje.php">
                                <i class="fa-solid fa-truck fa-lg bi d-block mx-auto mb-1"></i>
                                Naručivanje
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">
                                <i class="fa-solid fa-receipt fa-lg bi d-block mx-auto mb-1"></i>
                                Računi
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="text-end">
                    <form action="../php/izlogovanje.php" method="post">
                        <input type="submit" class="btn btn-dark me-2" value="Izloguj se" onclick="izlogovanje()">
                    </form>
                </div>
            </div>
        </nav>
        <nav class="navbar navbar-expand-lg bg-warning">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="../img/logo.png" alt="Logo" width="50" height="50">
                    Strahor
                </a>
            </div>
        </nav>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <table class="table table-dark table-striped table-hover table-stil">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Datum Kreiranja</th>
                            <th scope="col">Iznos Racuna</th>
                            <th scope="col">Kupac</th>
                            <th scope="col">Prikaži stavke</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php
                            include("../php/db_connection.php");

                            $upit = $conn->prepare("select * from racun");
                            $upit->execute();
                            $rez = $upit->get_result();
                            
                            while($red = $rez->fetch_assoc())
                            {
                                echo 
                                "
                                    <tr>
                                        <th scope='row'>" . $red['racun_id'] . "</th>
                                        <td>" . $red['datum_kreiranja'] . "</td>
                                        <td>" . number_format($red['iznos_racuna'], 2) . "</td>
                                        <td>" . $red['kupac_id'] . "</td>
                                        <td class='table-akcija'><a class='link-warning' href='../php/prikazi_stavke.php?racun_id=" . $red['racun_id'] . "'><i class='fa-solid fa-arrow-right fa-lg ikonica-racuni'></i><a></td>
                                    </tr>
                                ";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="col-6">
                <div class="row">
                    <div class="col-3"></div>
                    <div class="col-9">
                        <table class="table table-dark table-sm table-stil">
                            <thead>
                                <tr>
                                    <th scope="col">Naziv</th>
                                    <th scope="col">Cena</th>
                                    <th scope="col">Količina</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <?php
                                    if(isset($_SESSION['racun_id']))
                                    {
                                        include("../php/db_connection.php");

                                        $upit = $conn->prepare("select * from stavka_racuna where racun_id = ?");
                                        $upit->bind_param("i", $_SESSION['racun_id']);
                                        $upit->execute();
                                        $rez = $upit->get_result();
                                        
                                        while($red = $rez->fetch_assoc())
                                        {
                                            echo 
                                            "
                                                <tr>
                                                    <th scope='row'>" . $red['naziv_stavke'] . "</th>
                                                    <td>" . number_format($red['cena_stavke'], 2) . "</td>
                                                    <td>" . $red['kolicina'] . "</td>
                                                </tr>
                                            ";
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <div class="col-md-4 d-flex align-items-center">
                <p class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                    <img src="../img/logo.png" alt="Logo" width="40" height="40">
                </p>
                <span class="mb-3 mb-md-0 text-muted">&copy; 2016 Strahor</span>
            </div>
            <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                <li class="ms-3"><a class="text-muted" href="https://www.facebook.com/i.k.Strahor/"><i class="fa-brands fa-facebook fa-2xl"></i></a></li>
                <li class="ms-3"><a class="text-muted" href="https://www.instagram.com/ik.strahor2016/"><i class="fa-brands fa-instagram fa-2xl"></i></a></li>
            </ul>
        </footer>
    </div>
    <script src="../js/izlogovanje.js"></script>
    <script src="../js/all.js"></script>
    <script src="../js/bootstrap.bundle.js"></script>
</body>
</html>