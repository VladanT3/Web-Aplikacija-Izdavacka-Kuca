<?php
    session_start();
    $_SESSION['greskaEmailSignup'] = null;
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
    <title>Log In</title>
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
                    <a type="button" class="btn btn-outline-dark me-2" href="signup.php">Napravi nalog</a>
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
            <div class="col-4"></div>
            <div class="col-4">
                <fieldset class="form-login">
                    <legend>Ulogovanje</legend>
                    <form method="post" action="../php/ulogovanje.php" class="row">
                        <div class="col-12">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control input-boja <?php if(isset($_SESSION['greskaLogin'])) echo "is-invalid"; ?>" id="floatingEmail" name="inputEmail" placeholder="E-mail" <?php if(isset($_SESSION['greskaLogin'])) echo "aria-describedby='ValidacijeEmail'"; ?> required>
                                <label for="floatingEmail" class="text-muted">E-mail</label>
                                <?php
                                    if(isset($_SESSION['greskaLogin']))
                                    {
                                        echo "
                                            <div id='validacijaEmail' class='invalid-feedback'>
                                                Email ili šifra nisu prepoznati!
                                            </div>";
                                    }
                                    
                                ?>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control input-boja <?php if(isset($_SESSION['greskaLogin'])) echo "is-invalid"; ?>" id="inputSifra" name="inputSifra" placeholder="Šifra" <?php if(isset($_SESSION['greskaLogin'])) echo "aria-describedby='ValidacijaSifra'"; ?> required>
                                <label for="inputSifra" class="text-muted">Šifra</label>
                                <?php
                                    if(isset($_SESSION['greskaLogin']))
                                    {
                                        echo "
                                            <div id='validacijaSifra' class='invalid-feedback'>
                                                Email ili šifra nisu prepoznati!
                                            </div>";
                                    }
                                    
                                ?>
                            </div>
                        </div>
                        <div class="col-1"></div>
                        <div class="form-check form-switch col">
                            <input class="form-check-input switch-password" type="checkbox" role="switch" id="prikazSifre">
                            <label class="form-check-label" for="prikazSifre">Prikaži šifru</label>
                        </div>
                        <div class="col-12 btn-login">
                            <input type="submit" class="btn btn-warning" value="Uloguj se">
                        </div>
                    </form>
                </fieldset>
            </div>
            <div class="col-4"></div>
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