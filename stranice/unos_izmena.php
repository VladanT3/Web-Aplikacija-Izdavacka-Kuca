<?php
    include("../php/db_connection.php");
    
    $izmenaPro = 0;
    $update_id = $_GET['update_id'];

    if($update_id != 0)
    {
        $upit = $conn->prepare("select * from knjiga where knjiga_id = ?");
        $upit->bind_param("s", $update_id);
        $upit->execute();
        $rez = $upit->get_result();
        $red = $rez->fetch_assoc();

        $izmenaPro = 1;
    }
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
    <title>Unos i Izmena</title>
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
                            <a class="nav-link active" aria-current="page" href="magacin.php">
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
            <div class="col-4"></div>
            <div class="col-4">
                <fieldset class="form-stil">
                    <legend>Unos i izmena knjiga</legend>
                    <form action="../php/insert_i_update.php" method="post" class="row">
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control input-boja <?php if(isset($_SESSION['greskaID'])) echo "is-invalid"; ?>" id="knjigaID" placeholder="ID" name="id" <?php if(isset($_SESSION['greskaID'])) echo "aria-describedby='ValidacijeID'"; ?> value="<?php if($izmenaPro == 1) echo $red['knjiga_id']; ?>" required>
                                <label for="knjigaID" class="text-muted">ID Knjige</label>
                                <?php
                                    if(isset($_SESSION['greskaID']))
                                    {
                                        echo 
                                        "
                                        <div id='validacijaID' class='invalid-feedback'>
                                            Uneti ID već postoji u bazi!
                                        </div>
                                        ";
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control input-boja" id="floatingNaziv" placeholder="Naziv" name="naziv" value="<?php if($izmenaPro == 1) echo $red['naziv_knjige']; ?>" required>
                                <label for="floatingNaziv" class="text-muted">Naziv</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control input-boja" id="floatingAutor" placeholder="Autor" name="autor" value="<?php if($izmenaPro == 1) echo $red['autor']; ?>" required>
                                <label for="floatingAutor" class="text-muted">Autor</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control input-boja" id="floatingProCena" placeholder="Prodajna Cena" name="proCena" value="<?php if($izmenaPro == 1) echo $red['prodajna_cena']; ?>" required>
                                <label for="floatingProCena" class="text-muted">Prodajna Cena</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control input-boja" id="floatingNabCena" placeholder="Nabavna Cena" name="nabCena" value="<?php if($izmenaPro == 1) echo $red['nabavna_cena']; ?>" required>
                                <label for="floatingNabCena" class="text-muted">Nabavna Cena</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control input-boja" id="slika" placeholder="ID" name="slika" value="<?php if($izmenaPro == 1) echo $red['slika']; ?>" required>
                                <label for="slika" class="text-muted">Naziv slike bez ekstenzije</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <input type="submit" class="btn btn-warning" value="Unesi" name="btnUnos" id="btnUnos">
                        </div>
                        <div class="col-6">
                            <input type="submit" disabled class="btn btn-warning float-end" value="Izmeni" name="btnIzmena" id="btnIzmena">
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
    <script src="../js/proveraIzmene.js"></script>
    <script src="../js/izlogovanje.js"></script>
    <script src="../js/all.js"></script>
    <script src="../js/bootstrap.bundle.js"></script>
</body>
</html>