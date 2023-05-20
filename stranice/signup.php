<?php
    session_start();
    $_SESSION['greskaLogin'] = null;
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
    <title>Sign Up</title>
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
                    <a type="button" class="btn btn-dark me-2" href="login.php">Uloguj se</a>
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
            <div class="col-2"></div>
            <div class="col-8">
                <fieldset class="form-login">
                    <legend>Pravljenje naloga</legend>
                    <form action="../php/pravljenje_naloga.php" method="post" class="row">
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control input-boja" id="floatingIme" name="inputIme" placeholder="Ime" required>
                                <label for="floatingIme" class="text-muted">Ime</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control input-boja" id="floatingPrezime" name="inputPrezime" placeholder="Prezime" required>
                                <label for="floatingPrezime" class="text-muted">Prezime</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control input-boja" id="floatingGrad" name="inputGrad" placeholder="Grad" required>
                                <label for="floatingGrad" class="text-muted">Grad</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control input-boja" id="floatingAdresa" name="inputAdresa" placeholder="Adresa" required>
                                <label for="floatingAdresa" class="text-muted">Adresa</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control input-boja" id="floatingZip" name="inputZip" placeholder="Zip" required>
                                <label for="floatingZip" class="text-muted">Zip</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <input type="tel" class="form-control input-boja" id="floatingBrojTelefona" name="inputBrojTel" placeholder="Broj telefona" required>
                                <label for="floatingBrojTelefona" class="text-muted">Broj telefona</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control input-boja <?php if(isset($_SESSION['greskaEmailSignup'])) echo "is-invalid"; ?>" id="floatingEmail" name="inputEmail" placeholder="E-mail" <?php if(isset($_SESSION['greskaEmailSignup'])) echo "aria-describedby='ValidacijeEmail'"; ?> required>
                                <label for="floatingEmail" class="text-muted">E-mail</label>
                                <?php
                                    if(isset($_SESSION['greskaEmailSignup']))
                                    {
                                        echo "
                                            <div id='validacijaEmail' class='invalid-feedback'>
                                                Email već postoji!
                                            </div>";
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control input-boja" id="inputSifra" name="inputSifra" placeholder="Šifra" required>
                                <label for="inputSifra" class="text-muted">Šifra</label>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="mb-3">
                                <label for="inputDatum" class="form-label">Datum rodjenja</label>
                                <input type="date" class="form-control input-boja input-datum" id="inputDatum" name="inputDatum" required>
                            </div>
                        </div>
                        <div class="col-7"></div>
                        <div class="form-check form-switch col">
                            <input class="form-check-input switch-password" type="checkbox" role="switch" id="prikazSifre">
                            <label class="form-check-label" for="prikazSifre">Prikaži šifru</label>
                        </div>
                        <div class="col-12 btn-login">
                            <input type="submit" class="btn btn-warning" value="Napravi nalog">
                        </div>
                    </form>
                </fieldset>
            </div>
            <div class="col-2"></div>
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
    <script src="../js/prikazSifre.js"></script>
    <script src="../js/all.js"></script>
    <script src="../js/bootstrap.bundle.js"></script>
</body>
</html>