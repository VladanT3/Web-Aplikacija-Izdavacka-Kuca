<?php
    session_start();
    $_SESSION['greskaCheckout'] = null;
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
    <title>Nalog</title>
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
                    <div class="btn-group">
                        <a type="button" class="btn btn-warning" href="#">
                            <i class="fa-solid fa-user fa-lg"></i>
                        </a>
                        <form action="../php/izlogovanje.php" method="post">
                            <input type="submit" class="btn btn-dark me-2" value="Izloguj se" onclick="izlogovanje()">
                        </form>
                    </div>
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
        <form action="../php/brisanje_naloga.php" method="post" class="row">
            <div class="col-8 form-admin">
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3 row">
                            <label for="staticImePrezime" class="col-5 col-form-label text-muted">Ime i Prezime:</label>
                            <div class="col">
                                <input type="text" readonly class="form-control-plaintext input-boja input-admin" id="staticImePrezime" value="<?php echo $_SESSION['imePrezimeKupac']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3 row">
                            <label for="staticGrad" class="col-5 col-form-label text-muted">Grad:</label>
                            <div class="col">
                                <input type="text" readonly class="form-control-plaintext input-boja input-admin" id="staticGrad" value="<?php echo $_SESSION['gradKupac']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-5 col-form-label text-muted">Email:</label>
                            <div class="col">
                                <input type="email" readonly class="form-control-plaintext input-boja input-admin" id="staticEmail" value="<?php echo $_SESSION['emailKupac']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3 row">
                            <label for="staticAdresa" class="col-5 col-form-label text-muted">Adresa:</label>
                            <div class="col">
                                <input type="text" readonly class="form-control-plaintext input-boja input-admin" id="staticAdresa" value="<?php echo $_SESSION['adresaKupac']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3 row">
                            <label for="staticDatumRodj" class="col-5 col-form-label text-muted">Datum Rodjenja:</label>
                            <div class="col">
                                <input type="date" readonly class="form-control-plaintext input-boja input-admin" id="staticDatumRodj" value="<?php echo $_SESSION['datumRodjKupac']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3 row">
                            <label for="staticZip" class="col-5 col-form-label text-muted">Zip:</label>
                            <div class="col">
                                <input type="text" readonly class="form-control-plaintext input-boja input-admin" id="staticZip" value="<?php echo $_SESSION['zipKupac']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3 row">
                            <label for="staticTelefon" class="col-5 col-form-label text-muted">Broj Telefona:</label>
                            <div class="col">
                                <input type="tel" readonly class="form-control-plaintext input-boja input-admin" id="staticTelefon" value="<?php echo $_SESSION['brojTelKupac']; ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="admin-buttons mb-3">
                    <input type="submit" class="btn btn-warning" value="Obriši nalog">
                </div>
            </div>
        </form>
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
    <script src="../js/ulogovanKupac.js"></script>
    <script src="../js/izlogovanje.js"></script>
    <script src="../js/all.js"></script>
    <script src="../js/bootstrap.bundle.js"></script>
</body>
</html>