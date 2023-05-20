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
    <title>O nama</title>
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
                            <a class="nav-link active" aria-current="page" href="#">
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
        <div class="row div-about">
            <div class="col-6">
                <p>
                    Izdavačka kuća "Strahor" počela je sa radom tek nedavno, aprila 2016. To je porodična firma čiji je cilj samostalno izdavanje starih i novih romana Aleksandra Tešića, 
                    njihov plasman i promovisanje.
                </p>
                <br>
                <p>
                    Trilogije Kosingas i Miloš Obilić mogu se i odvojeno čitati jer predstavljaju zasebne celine. Ukoliko, pak, čitalac želi da pročita ceo serijal, onda, 
                    svakako predlažemo da se najpre pročita trilogija Kosingas (ovim redosledom: Red zmaja, Bezdanj, Smrtovanje), zatim trilogija Miloš Obilić 
                    (Zmaj i ždral, Koplje sv. Georgija, Vitez zatočnik).<br>Zatim sledi kao sedmi nastavak, "Kosingas - Kroz oganj i vodu", 
                    osmi "Onaj što nauči mrak da sija" i kraj serijala "Budjenje Svarogovo" prvi i drugi deo.
                </p>
                <br>
                <p>
                    Iako nam je prvenstveno cilj objavljivanje dela Aleksandra Tešića, želja nam je i da izdajemo stranu književnost sa sličnom tematikm, kako najnoviju, 
                    tako i staru koja je zaboravljena i koja se još može u antikvarnicama pronaći.<br>Osim toga, kao u slučaju "Balkanskog gusara" Jana Gordona, 
                    želja nam je da pronalazimo i strane autore koji su pisali o Srbiji, a nisu nikad kod nnas objavljivani.<br>Zalagaćemo se bez kompromisa za 
                    <strong>kvalitet</strong> i pristupačne cene, razne popuste i akcije.
                </p>
                <br>
                <p>
                    Matični broj: 64164872<br>
                    PIB: 109427562<br>
                    <strong>
                        Adresa: Španskih boraca 34, Novi Beograd<br>
                        Telefon: 0693002252<br>
                        E-mail: kosingas@strahor.com<br>
                    </strong>
                </p>
            </div>
            <div class="col-6 div-map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2830.4035303118962!2d20.414152015750904!3d44.813343184655245!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a65e2b02170c5%3A0xfb230b26e273e6a2!2sIzdava%C4%8Dka%20ku%C4%87a%20Strahor!5e0!3m2!1sen!2srs!4v1675963572765!5m2!1sen!2srs" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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