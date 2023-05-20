<?php
    session_start();
    $_SESSION['racun_id'] = null;
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
    <title>Naručivanje</title>
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
                            <a class="nav-link active" aria-current="page" href="#">
                                <i class="fa-solid fa-truck fa-lg bi d-block mx-auto mb-1"></i>
                                Naručivanje
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="racuni.php">
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
                            <th scope="col">#</th>
                            <th scope="col">Naziv</th>
                            <th scope="col">Nabavna cena</th>
                            <th scope="col">Količina</th>
                            <th scope="col">Izaberi</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php
                        include("../php/db_connection.php");
                        
                        $upit = $conn->prepare("select * from knjiga");
                        $upit->execute();
                        $rez = $upit->get_result();
                        
                        $i = 0;
                        
                        while($red = $rez->fetch_assoc())
                        {
                            $i++;
                            
                            echo "
                            <tr>
                                <th scope='row'>$i</th>
                                <td>" . $red['naziv_knjige'] . "</td>
                                <td>" . number_format($red['nabavna_cena'], 2) . "</td>
                                <td>" . $red['kolicina'] . "</td>
                                <td class='table-akcija'><a class='link-warning' href='../php/stavka_porudzbenice.php?knjiga_id=" . $red['knjiga_id'] . "'><i class='fa-solid fa-arrow-right fa-lg ikonica-narucivanje'></i></a></td>
                            </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="col-6">
                <div class="form-narucivanje">
                    <form action="" method="post" class="row">
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control input-boja" id="floatingKolicina" name="inputKolicina" placeholder="Kolicina" required>
                                <label for="floatingKolicina" class="text-muted">Kolicina</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <input type="submit" <?php if($_SESSION['btnDodajDisabled']) echo "disabled"; ?> class="btn btn-warning btn-dodaj-stavku" value="Dodaj stavku" name="dodajStavku" id="dodajStavku">
                        </div>
                    </form>
                </div>
                <table class="table table-dark table-sm table-stil">
                    <thead>
                        <tr>
                            <th scope="col">Naziv</th>
                            <th scope="col">Nabavna cena</th>
                            <th scope="col">Količina</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php
                            function popuniTabeluStavki()
                            {
                                if(count($_SESSION['noveStavke']) == 0)
                                {
                                    $_SESSION['btnDodajDisabled'] = true;
                                    $_SESSION['ukupnaCena'] = 0;
                                    return;
                                }
                                
                                foreach($_SESSION['noveStavke'] as $s)
                                {
                                    echo "
                                        <tr>
                                            <td scope='row'>" . $s['naziv'] . "</td>
                                            <td>" . number_format($s['cena'], 2) . "</td>
                                            <td>" . $s['kolicina'] . "</td>
                                        </tr>";
                                }

                                $_SESSION['stareStavke'] = $_SESSION['noveStavke'];
                                $_SESSION['btnDodajDisabled'] = true;
                                $_SESSION['ukupnaCena'] += $s['cena'] * $s['kolicina'];
                            }

                            if(isset($_SESSION['stareStavke']) && !isset($_POST['dodajStavku']) && !isset($_POST['izbaciStavku']))
                            {
                                foreach($_SESSION['stareStavke'] as $s)
                                {
                                    echo "
                                        <tr>
                                            <td scope='row'>" . $s['naziv'] . "</td>
                                            <td>" . number_format($s['cena'], 2) . "</td>
                                            <td>" . $s['kolicina'] . "</td>
                                        </tr>";
                                }
                                $_SESSION['btnDodajDisabled'] = true;
                            }
                            if(isset($_POST['dodajStavku']))
                            {
                                $kolicina = $_POST['inputKolicina'];

                                $stavka = ["id" => $_SESSION['knjiga_idPor'], "naziv" => $_SESSION['nazivPor'], "cena" => $_SESSION['nabCenaPor'], "kolicina" => $kolicina];
                                
                                array_push($_SESSION['noveStavke'], $stavka);
                                
                                popuniTabeluStavki();
                            }
                            if(isset($_POST['izbaciStavku']) && count($_SESSION['noveStavke']) > 0)
                            {
                                array_pop($_SESSION['noveStavke']);

                                popuniTabeluStavki();
                            }
                        ?>
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-4">
                        <form action="" method="post">
                            <input type="submit" class="btn btn-warning" value="Izbaci stavku" name="izbaciStavku">
                        </form>
                        <div class="form-floating mb-3 ukupna-cena">
                            <input type="text" readonly class="form-control input-boja" id="floatingUkupnaCena" placeholder="Ukupna Cena" value="<?php if(isset($_SESSION['ukupnaCena']) || isset($_POST['dodajStavku']) || isset($_POST['izbaciStavku'])) echo $_SESSION['ukupnaCena']; ?>">
                            <label for="floatingUkupnaCena" class="text-muted">Ukupna Cena</label>
                        </div>
                    </div>
                </div>
                <form action="../php/napravi_porudzbenicu.php" method="post" class="row">
                    <div class="col-8">
                        <div class="input-group mb-3 select-stamparija">
                            <label class="input-group-text select-stamparija-label" for="inputGroupSelect01">Štamparija:</label>
                            <select class="form-select select-stamparija-izbor" name="stamparija" id="inputGroupSelect01">
                                <?php 
                                    include("../php/db_connection.php");
                                    
                                    $upit = $conn->prepare("select * from stamparija");
                                    $upit->execute();
                                    $rez = $upit->get_result();
                                    
                                    while($red = $rez->fetch_assoc())
                                    {
                                        echo "
                                            <option value='" . $red['stamparija_id'] . "'>" . $red['naziv_stamparije'] . "</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-grid gap-2 btn-naruci">
                            <input type="submit" <?php if(count($_SESSION['noveStavke']) == 0) echo "disabled"; ?> class="btn btn-warning" value="Naruči">
                        </div>
                    </div>
                </form>
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