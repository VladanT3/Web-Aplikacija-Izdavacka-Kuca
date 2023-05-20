<?php
    session_start();

    array_pop($_SESSION['korpa']);
    header("Location: ../stranice/prodavnica.php");