<?php
require_once "functions.inc.php";

$id = isset($_SESSION['user_id']) ? (int)$_SESSION['user_id'] : 0;
$isUserConnected = false;
if ($id > 0) {
$user = showUser($id);
$isUserConnected = isset($user['id']) && !empty($user['id']);
}

if (isset($_GET['action']) && $_GET['action'] == 'deconnexion') {
logOut();
$_SESSION['user_id'] = 0; // Actualizar la sesión para indicar que el usuario está desconectado
$isUserConnected = false; // Actualizar la variable $isUserConnected
header("location:" . RACINE_SITE . "authentification.php");
exit;
}


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
    <link rel="stylesheet" href="<?= RACINE_SITE ?>/assets/style/style.css">
    <!-- favicon -->
    <link rel="icon" type="image/png" href="<?= RACINE_SITE ?>/assets/img/favicon.jpg">
    <title><?= $title ?></title>
</head>

<body>
    <header class="container-fluid">
        <section class="en-tete row">
            <!-- Navbar --> <!-- Logo -->
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <a class="navbar-brand col-sm-12 col-md-1 p-2" href="<?= RACINE_SITE ?>index.php">
                        <img src="<?= RACINE_SITE ?>assets/img/logo.png" class="img-rounded" alt="Logo" height="100">
                    </a>
                    <!-- Menu Navigation -->
                    <ul class="navbar-nav col-sm-12 d-flex col-md-7 mx-auto">
                        <li class="nav-item p-1">
                            <a class="nav-link text-menu" href="<?= RACINE_SITE ?>/index.php">ACCUEIL</a>
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
                    <a href="<?= RACINE_SITE ?>/register.php" class="btn btn-warning btn-sm d-flex justify-content-center align-items-center col-12 col-md-1 btn-registre">
                        Register
                    </a>

                    <!-- button conecter -->

                    <a href="<?php echo $isUserConnected ? 'index.php?action=deconnexion' : RACINE_SITE . '/authentification.php'; ?>" class="btn btn-warning btn-sm d-flex justify-content-center align-items-center col-12 col-md-1 btn-login">
                    <?php echo $isUserConnected ? 'Deconecter' : 'Conec/Deconec'; ?>
                    </a>
<!--                   

                    <!-- Cart -->
                    <a class="nav-link mx-auto col-sm-12 col-md-1 d-flex p-1" href="#">
                        <i class="bi bi-cart-fill col-sm-12 col-md-1 display-5 text-warning"></i>
                    </a>
                </div>
        </section>
        <!-- title -->
    </header>