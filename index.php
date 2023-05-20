<?php
    session_start();
    $_SESSION['greskaEmailSignup'] = null;
    $_SESSION['greskaLogin'] = null;
    $_SESSION['korpa'] = [];
    $_SESSION['ukupnaCenaKorpe'] = 0;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Vladan Tešić | vladt.t33@gmail.com">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Početna</title>
</head>
<body>
    <header>
        <nav class="navbar fixed-top navbar-expand-lg bg-warning">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="img/logo.png" alt="Logo" width="50" height="50">
                    Strahor
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="stranice/prodavnica.php">
                                <i class="fa-solid fa-cart-shopping fa-lg bi d-block mx-auto mb-1"></i>
                                Prodavnica
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="stranice/about.php">
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
                                    <a type='button' class='btn btn-warning' href='stranice/nalog.php'>
                                        <i class='fa-solid fa-user fa-lg'></i>
                                    </a>
                                    <form action='php/izlogovanje.php' method='post'>
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
                                    <a type='button' class='btn btn-warning' href='stranice/admin.php'>
                                        <i class='fa-solid fa-user fa-lg'></i>
                                    </a>
                                    <form action='php/izlogovanje.php' method='post'>
                                        <input type='submit' class='btn btn-dark me-2' value='Izloguj se' onclick='izlogovanje()'>
                                    </form>
                                </div>
                            ";
                        }
                        else
                        {
                            echo 
                            "
                                <a type='button' class='btn btn-outline-dark' href='stranice/signup.php'>Napravi nalog</a>
                                <a type='button' class='btn btn-dark' href='stranice/login.php'>Uloguj se</a>
                            ";
                        }
                    ?>
                </div>
            </div>
        </nav>
        <nav class="navbar navbar-expand-lg bg-warning">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="img/logo.png" alt="Logo" width="50" height="50">
                    Strahor
                </a>
            </div>
        </nav>
    </header>
    <div id="carouselKnjige" class="carousel slide home-carousel" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselKnjige" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselKnjige" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselKnjige" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="row">
                    <div class="col-6">
                        <img src="img/Knjige/Budjenje svarogovo 2.png" class="rounded mx-auto d-block" height="350px" width="233px" alt="Kosingas Budjenje Svarogovo 2">
                    </div>
                    <div class="container">
                        <div class="carousel-caption text-end">
                            <h1>Završno poglavlje epskog serijala "Kosingas"</h1>
                            <p>"Samo mrtvi dočekaju kraj rata" - Platon</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="row">
                    <div class="col-6"></div>
                    <div class="col-6">
                        <img src="img/Knjige/Kletva kainova 3.png" class="rounded mx-auto d-block" height="350px" width="233px" alt="Kletva Kainova 3">
                    </div>
                    <div class="container">
                        <div class="carousel-caption text-start">
                            <h1>Poslednje poglavlje horor trilogije Aleksandra Tešića</h1>
                            <p>Po završetku krvavih događaja u Medveđi, Vukman Goršić kreće u poteru za hodočasnikom<br>koji šalje vojsku pošasti ne bi li probio sanitarni kordon.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="row">
                    <div class="col-4">
                        <img src="img/Knjige/Trilogija kosingas.png" class="rounded mx-auto d-block" height="350px" width="233px" alt="Kosingas Trilogija">
                    </div>
                    <div class="col-4">
                        <div class="container">
                            <div class="carousel-caption">
                                <h1>Ne znate odakle početi?</h1>
                                <p>Dve trilogije koje su započele najbolju epsku priču, zasnovanu na domaćoj mitologiji, u Srbiji.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <img src="img/Knjige/Trilogija Milos Obilic.png" class="rounded mx-auto d-block" height="350px" width="233px" alt="Miloš Obilić Trilogija">
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselKnjige" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselKnjige" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="container div-reklame-1">
        <div class="row">
            <div class="col-4">
                <img src="img/Knjige/Red zmaja.png" class="rounded mx-auto d-block" height="250px" width="166px" alt="Kosingas Red Zmaja">
                
                <h2 class="fw-normal">Kosingas</h2>
                <p>Prva knjiga koju je Aleksandar Tešić ikad napisao i početak priče koja je trajala 14 godina.</p>
                <p><a class="btn btn-warning" href="stranice/prodavnica.php">Poručite</a></p>
            </div>
            <div class="col-4">
                <img src="img/Knjige/Zmaj i zdral.png" class="rounded mx-auto d-block" height="250px" width="166px" alt="Miloš Obilić Zmaj i ždral">
                
                <h2 class="fw-normal">Miloš Obilić</h2>
                <p>Početak trilogije Miloš Obilić, koja se hronološki dešava pre Kosingasa.</p>
                <p><a class="btn btn-warning" href="stranice/prodavnica.php">Poručite</a></p>
            </div>
            <div class="col-4">
                <img src="img/Knjige/Kletva kainova 1.png" class="rounded mx-auto d-block" height="250px" width="166px" alt="Kletva Kainova 1">
                
                <h2 class="fw-normal">Kletva Kainova</h2>
                <p>Horor roman Kletva Kainova, je prvi od tri dela. Zasebna priča sama za sebe al koja nikako ne može da se propusti.</p>
                <p><a class="btn btn-warning" href="stranice/prodavnica.php">Poručite</a></p>
            </div>
        </div>
        
        <hr>
        
        <div class="row">
            <div class="col-7">
                <div class="div-reklame-2">
                    <h2 class="fw-normal lh-1 text-start">U Vrzinom Kolu</h2>
                    <p class="lead text-start">Zbirka priča Srpske epske fantastike i mitologije od 27 autora.</p>
                </div>
            </div>
            <div class="col-5">
                <img src="img/Knjige/U vrzinom kolu.png" class="rounded mx-auto d-block" height="400px" width="266px" alt="U vrzinom kolu">
            </div>
        </div>
        
        <hr>
        
        <div class="row">
            <div class="col-5">
                <img src="img/Knjige/U casu zmaja.png" class="rounded mx-auto d-block" height="400px" width="266px" alt="Konan U času zmaja">
            </div>
            <div class="col-7">
                <div class="div-reklame-2">
                    <h2 class="fw-normal lh-1 text-start">U Času Zmaja</h2>
                    <p class="lead text-start">Rodert E. Hauardov jedini roman o varvaru Konanu sada i kod nas prevedena na srpski.</p>
                </div>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-7">
                <div class="div-reklame-2">
                    <h2 class="fw-normal lh-1 text-start">Balkanski Gusar</h2>
                    <p class="lead text-start">Istinita priča o jednom našem hajduku napisana u Britaniji prvi put kod nas nakon više od 100 godina.</p>
                </div>
            </div>
            <div class="col-5">
                <img src="img/Knjige/Balkanski gusar.png" class="rounded mx-auto d-block" height="400px" width="266px" alt="Balkanski gusar">
            </div>
        </div>
        
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <div class="col-md-4 d-flex align-items-center">
                <p class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                    <img src="img/logo.png" alt="Logo" width="40" height="40">
                </p>
                <span class="mb-3 mb-md-0 text-muted">&copy; 2016 Strahor</span>
            </div>
            
            <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                <li class="ms-3"><a class="text-muted" href="https://www.facebook.com/i.k.Strahor/"><i class="fa-brands fa-facebook fa-2xl"></i></a></li>
                <li class="ms-3"><a class="text-muted" href="https://www.instagram.com/ik.strahor2016/"><i class="fa-brands fa-instagram fa-2xl"></i></a></li>
            </ul>
        </footer>
    </div>
    <script src="js/izlogovanje.js"></script>
    <script src="js/all.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
</body>
</html>