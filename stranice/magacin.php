<?php
    session_start();
    $_SESSION['noveStavke'] = [];
    $_SESSION['stareStavke'] = [];
    $_SESSION['btnDodajDisabled'] = true;
    $_SESSION['ukupnaCena'] = 0;
    $_SESSION['racun_id'] = null
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
    <title>Magacin</title>
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
                            <a class="nav-link active" aria-current="page" href="#">
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
            <div class="col-8">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-4">
                            <div class="input-group mb-3 select-pretraga">
                                <label class="input-group-text select-pretraga-label" for="inputGroupSelect01">Pretraga po:</label>
                                <select class="form-select select-pretraga-izbor" name="pretragaPo" id="inputGroupSelect01">
                                    <option value="naziv_knjige" class="select-pretraga-option">Naziv</option>
                                    <option value="autor">Autor</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-2"></div>
                        <div class="col-6">
                            <div class="input-group mb-3 pretraga-knjiga">
                                <input type="text" class="form-control input-boja" name="pretraga" placeholder="Pretraga..." aria-describedby="button-addon2">
                                <input class="btn btn-outline-warning" type="submit" name="btnPretrazi" value="Pretraži" id="button-addon2">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-4">
                <a type="button" class="btn btn-warning btn-unos-knjiga float-end" href="unos_izmena.php?update_id=0">Unesite novu knjigu</a>
            </div>
            <div class="col-12">
                <table class="table table-dark table-striped table-hover table-stil">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ID</th>
                            <th scope="col">Naziv</th>
                            <th scope="col">Autor</th>
                            <th scope="col">Prodajna cena</th>
                            <th scope="col">Nabavna cena</th>
                            <th scope="col">Količina</th>
                            <th scope="col">Obriši</th>
                            <th scope="col">Izmeni</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php
                            include("../php/db_connection.php");
                            
                            if(isset($_POST['btnPretrazi']))
                            {
                                $pretragaPo = $_POST['pretragaPo'];
                                $pretraga = $_POST['pretraga'];
                                $upit = $conn->prepare("select * from knjiga where $pretragaPo like '%" . $pretraga . "%'");
                                $upit->execute();
                                $rez = $upit->get_result();
                            }
                            else
                            {
                                $upit = $conn->prepare("select * from knjiga");
                                $upit->execute();
                                $rez = $upit->get_result();
                            }
                            
                            $i = 0;
                            
                            while($red = $rez->fetch_assoc())
                            {
                                $i++;
                                echo "
                                <tr>
                                    <th scope='row'>$i</th>
                                    <td>" . $red['knjiga_id'] . "</td>
                                    <td>" . $red['naziv_knjige'] . "</td>
                                    <td>" . $red['autor'] . "</td>
                                    <td>" . number_format($red['prodajna_cena'], 2) . "</td>
                                    <td>" . number_format($red['nabavna_cena'], 2) . "</td>
                                    <td>" . $red['kolicina'] . "</td>
                                    <td class='table-akcija'><a class='link-warning' href='../php/brisanje.php?delete_id=" . $red['knjiga_id'] . "'><i class='fa-solid fa-trash-can fa-lg ikonica'></i></a></td>
                                    <td class='table-akcija'><a class='link-warning' href='unos_izmena.php?update_id=" . $red['knjiga_id'] . "' onclick='pokreniIzmenu()'><i class='fa-solid fa-pen fa-lg ikonica'></i></a></td>
                                </tr>";
                            }
                        ?>
                    </tbody>
                </table>
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
    <script src="../js/kontrolaIzmene.js"></script>
    <script src="../js/izlogovanje.js"></script>
    <script src="../js/all.js"></script>
    <script src="../js/bootstrap.bundle.js"></script>
</body>
</html>