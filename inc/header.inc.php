<?php
require_once "functions.inc.php";


// déconnexion ($_SESSION)
// logOut();


// $categories =  allCategories();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Link for google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100..900&display=swap" rel="stylesheet">
    <!-- link for Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- link for Bootstrap icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <!-- Link for CSS -->
    <link rel="stylesheet" href="./assets/style/style.css">
    <!-- favicon -->
    <link rel="icon" type="image/png" href="./assets/img/favicon.jpg">
    <title><?= $title ?></title>
</head>

<body>
    <header class="container-fluid">
        <section class="en-tete row">
            <!-- Navbar --> <!-- Logo -->
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <a class="navbar-brand col-sm-12 col-md-1 p-2" href="./index.php">
                        <img src="./assets/img/logo.png" class="img-rounded" alt="Logo" height="100">
                    </a>
                    <!-- Menu Navigation -->
                    <ul class="navbar-nav col-sm-12 d-flex col-md-7 mx-auto">
                        <li class="nav-item p-1">
                            <a class="nav-link text-menu" href="./index.php">ACCUEIL</a>
                        </li>
                        <li class="nav-item p-1">
                            <a class="nav-link text-menu" href="#">A PROPOS</a>
                        </li>
                        <li class="nav-item p-1">
                            <a class="nav-link text-menu" href="#">EXPEDITION ET RETOUR</a>
                        </li>
                        <li class="nav-item p-1">
                            <a class="nav-link text-menu" href="./voirProduit.php">TOUS LES PRODUITS</a>
                        </li>
                    </ul>
                    <!-- button Registre -->
                    <button type="button" class="btn btn-warning btn-sm d-flex col-12 col-md-1 btn-registre text-center">Register</button>
                    <!-- button pur se conecter -->
                    <button type="button" class="btn btn-warning btn-sm d-flex col-12 col-md-1 btn-login text-center">Se connecter</button>
                    <!-- Cart -->
                    <a class="nav-link mx-auto col-sm-12 col-md-1 d-flex p-1" href="#">
                        <i class="bi bi-cart-fill col-sm-12 col-md-1 display-5 text-warning"></i>
                    </a>
                </div>
        </section>
        <!-- title -->
    </header>

