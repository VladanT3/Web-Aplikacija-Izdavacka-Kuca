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
    <title>Plaćanje</title>
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
                            <a class="nav-link" href="prodavnica.php">
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
                if(isset($_SESSION['greskaCheckout']))
                {
                    echo 
                    "
                        <div class='col-12 div-checkout-greska'>
                            <h3>Ne možete izvršiti naručivanje ako niste ulogovani, ulogujte se pa probajte ponovo!</h3>
                        </div>
                    ";
                }
            ?>
            <div class="col-6">
                <fieldset class="form-checkout">
                    <legend>Plaćanje</legend>
                    <form action="../php/napravi_racun.php" method="post" class="row">
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control input-boja" name="imePrezime" id="imePrezime" placeholder="Ime i Prezime" value="<?php if(isset($_SESSION['idKupac'])) echo $_SESSION['imePrezimeKupac']; ?>" required>
                                <label for="imePrezime" class="text-muted">Ime i Prezime</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control input-boja" name="grad" id="grad" placeholder="Grad" value="<?php if(isset($_SESSION['idKupac'])) echo $_SESSION['gradKupac']; ?>" required>
                                <label for="grad" class="text-muted">Grad</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control input-boja" name="adresa" id="adresa" placeholder="Adresa" value="<?php if(isset($_SESSION['idKupac'])) echo $_SESSION['adresaKupac']; ?>" required>
                                <label for="adresa" class="text-muted">Adresa</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control input-boja" name="zip" id="zip" placeholder="Zip" value="<?php if(isset($_SESSION['idKupac'])) echo $_SESSION['zipKupac']; ?>" required>
                                <label for="zip" class="text-muted">Zip</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <input type="tel" class="form-control input-boja" name="brojTel" id="brojTel" placeholder="Broj telefona" value="<?php if(isset($_SESSION['idKupac'])) echo $_SESSION['brojTelKupac']; ?>" required>
                                <label for="brojTel" class="text-muted">Broj telefona</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control input-boja" name="email" id="email" placeholder="E-mail" value="<?php if(isset($_SESSION['idKupac'])) echo $_SESSION['emailKupac']; ?>" required>
                                <label for="email" class="text-muted">E-mail</label>
                            </div>
                        </div>
                        <div class="col-12 btn-checkout">
                            <input type="submit" class="btn btn-warning" value="Naruči">
                        </div>
                    </form>
                </fieldset>
            </div>
            <div class="col-6">
                <fieldset class="list-korpa">
                    <legend>Izabrane knjige</legend>
                    <ol class="list-group">
                        <?php
                            foreach($_SESSION['korpa'] as $s)
                            {
                                echo 
                                "
                                    <li class='list-group-item d-flex justify-content-between align-items-start list-korpa-li'>
                                        <div class='ms-2 me-auto'>
                                            <div class='fw-bold'>" . $s['naziv'] . "</div>
                                            RSD " . number_format($s['cena'] * $s['kolicina'], 2) . "
                                        </div>
                                        <h5><span class='badge text-bg-warning rounded-pill'>" . $s['kolicina'] . "</span></h5>
                                    </li>
                                ";
                            }

                            echo 
                            "
                                <li class='list-group-item d-flex justify-content-between align-items-start text-bg-warning'>
                                    <div class='ms-2 me-auto'>
                                        <div class='fw-bold'>Ukupna cena</div>
                                        RSD " . number_format($_SESSION['ukupnaCenaKorpe'], 2) . "
                                    </div>
                                </li>
                            ";
                        ?>
                    </ol>
                </fieldset>
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
    <script src="../js/all.js"></script>
    <script src="../js/bootstrap.bundle.js"></script>
</body>
</html>