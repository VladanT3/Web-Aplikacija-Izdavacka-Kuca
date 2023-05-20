<?php
    session_start();

    $_SESSION['racun_id'] = $_GET['racun_id'];

    header("Location: ../stranice/racuni.php");