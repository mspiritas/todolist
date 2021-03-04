<?php
    $dsn = 'mysql:host=qz8si2yulh3i7gl3.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=eo9ucrauoxsy638f';
    $username = 'nbvkk02kqtfkhzro';
    $password = 'wtw69ilw9pfius2d';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error = "Database Error: ";
        $error .= $e->getMessage();
        include('view/error.php');
        exit();
    }
