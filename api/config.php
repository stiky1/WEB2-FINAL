<?php
    $servername = "localhost:3306";
    $usernameDbs = "xbacal";
    $password = "12345";

    try
    {
        $connect= new PDO("mysql:host=$servername;dbname=final", $usernameDbs, $password);
        // set the PDO error mode to exception
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $connect->exec("set names utf8");
    }

    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }

    // pripojenie na databazu