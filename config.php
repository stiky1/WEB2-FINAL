<?php
    session_start();
    if (!isset($_SESSION['lang'])) {
        $_SESSION['lang'] = "svk";
    } else if ($_GET['lang'] && $_SESSION['lang'] != $_GET['lang'] && !empty($_GET['lang'])) {
        if($_GET['lang'] == "svk") {
            $_SESSION['lang'] = "svk";
        } else if ($_GET['lang'] == "eng") {
            $_SESSION['lang'] = "eng";
        }
    }

    require_once "languages/".$_SESSION['lang'].".php";