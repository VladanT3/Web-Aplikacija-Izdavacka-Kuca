<?php
    session_start();
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
    <title>Prodavnica</title>
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
                            <a class="nav-link active" aria-current="page" href="#">
                                <i class="fa-solid fa-cart-shopping fa-lg bi d-block mx-auto mb-1"></i>
                                Prodavnica
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">
                                <i class="fa-solid fa-info fa-lg bi d-block mx-auto mb-1"></i>
                                O nama
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="text-end">
                    <div class="btn-group dropstart">
                        <button type="button" <?php if(count($_SESSION['korpa']) == 0) echo "disabled"; ?> class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                            <i class="fa-solid fa-basket-shopping fa-xl cart-icon"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark dropdown-korpa">
                            <li><h6 class="dropdown-header">Korpa</h6></li>
                            <?php
                                if(count($_SESSION['korpa']) > 0)
                                {
                                    $ukupnaCena = 0;
                                    foreach($_SESSION['korpa'] as $s)
                                    {
                                        echo 
                                        "
                                            <li class='dropdown-item-text dropdown-artikal'>
                                                <div class='row'>
                                                    <div class='col'>
                                                        <p class='float-start p-korpa-artikli'>" . $s['kolicina'] . "x " . $s['naziv'] . "</p>
                                                        <p class='float-end p-korpa-artikli'>RSD " . number_format($s['cena'] * $s['kolicina'], 2) . "</p>
                                                    </div>
                                                </div>
                                            </li>
                                        ";
                                        $ukupnaCena += $s['cena'] * $s['kolicina'];
                                        $_SESSION['ukupnaCenaKorpe'] = $ukupnaCena;
                                    }
                                    
                                    echo 
                                    "
                                        <li><hr class='dropdown-divider'></li>
                                        <li class='dropdown-item-text'>
                                            <div class='row'>
                                                <div class='col'>
                                                    <p class='float-start p-korpa-artikli'>Ukupna cena</p>
                                                    <p class='float-end p-korpa-artikli'>RSD " . number_format($ukupnaCena, 2) . "</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li><hr class='dropdown-divider'></li>
                                        <li class='dropdown-item-text'>
                                            <div class='row'>
                                                <div class='col'>
                                                    <p class='float-start p-korpa-artikli'>Izbaci poslednji artikal</p>
                                                    <a href='../php/izbaci_stavku_racuna.php'><i class='fa-solid fa-circle-minus fa-xl cart-izbaci float-end'></i></a>
                                                </div>
                                            </div>
                                        </li>
                                        <li><hr class='dropdown-divider'></li>
                                        <li class='dropdown-item-text'>
                                            <div class='row'>
                                                <div class='col btn-korpa'>
                                                    <a type='button' class='btn btn-warning' href='checkout.php'>Kupi</a>
                                                </div>
                                            </div>
                                        </li>
                                    ";
                                }
                            ?>
                        </ul>
                    </div>
                    <?php
                        if(isset($_SESSION['idKupac']))
                        {
                            echo 
                            "
                                <div class='btn-group'>
                                    <a type='button' class='btn btn-warning' href='nalog.php'>
                                        <i class='fa-solid fa-user fa-lg'></i>
                                    </a>
                                    <form action='../php/izlogovanje.php' method='post'>
                                        <input type='submit' class='btn btn-dark me-2' value='Izloguj se' onclick='izlogovanje()'>
                                    </form>
                                </div>
                            ";
                        }
                        elseif(isset($_SESSION['idRadnik']))
                        {
                            echo 
                            "
                                <div class='btn-group'>
                                    <a type='button' class='btn btn-warning' href='admin.php'>
                                        <i class='fa-solid fa-user fa-lg'></i>
                                    </a>
                                    <form action='../php/izlogovanje.php' method='post'>
                                        <input type='submit' class='btn btn-dark me-2' value='Izloguj se' onclick='izlogovanje()'>
                                    </form>
                                </div>
                            ";
                        }
                        else
                        {
                            echo 
                            "
                                <a type='button' class='btn btn-outline-dark' href='signup.php'>Napravi nalog</a>
                                <a type='button' class='btn btn-dark' href='login.php'>Uloguj se</a>
                            ";
                        }
                    ?>
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
            <?php
                include("../php/db_connection.php");
                
                $upit = $conn->prepare("select * from knjiga where kolicina > 0");
                $upit->execute();
                $rez = $upit->get_result();
                
                while($red = $rez->fetch_assoc())
                {
                    echo "
                    <form action='../php/stavka_racuna.php' method='post' class='col-3 div-pomocni'>
                        <div class='div-artikal'>
                            <img src='../img/Knjige/" . $red['slika'] . ".png' class='rounded mx-auto d-block' height='250px' width='166px' alt='" . $red['naziv_knjige'] . "'>
                            <div class='div-naziv-cena'>
                                <p>" . $red['naziv_knjige'] . "</p>
                                <br>
                                <p>RSD " . number_format($red['prodajna_cena'], 2) . "</p>
                            </div>
                            <div class='div-kolicina'>
                                <div class='row'>
                                    <div class='col-5'><i class='fa-solid fa-circle-minus fa-xl prodavnica-kolicina float-end' onclick='smanjiKolicinu(\"" . $red['knjiga_id'] . "\")'></i></div>
                                    <div class='col-2'><input type='text' readonly class='form-control-plaintext input-kolicina-prodavnica' id='" . $red['knjiga_id'] . "' name='" . $red['knjiga_id'] . "' value='1'></div>
                                    <div class='col-5'><i class='fa-solid fa-circle-plus fa-xl prodavnica-kolicina float-start' onclick='povecajKolicinu(\"" . $red['knjiga_id'] . "\")'></i></div>
                                </div>
                                <input type='hidden' name='idKnjige' value='" . $red['knjiga_id'] . "'>
                                <input type='submit' name='dodajUKorpu' class='btn btn-warning btn-dodaj-u-korpu' value='Dodaj u korpu'>
                            </div>
                        </div>
                    </form>";
                }
            ?>
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
    <script src="../js/kontrolaKolicine.js"></script>
    <script src="../js/izlogovanje.js"></script>
    <script src="../js/all.js"></script>
    <script src="../js/bootstrap.bundle.js"></script>
</body>
</html>