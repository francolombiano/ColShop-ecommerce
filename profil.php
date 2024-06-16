<?php
require_once "inc/functions.inc.php";

if (empty($_SESSION['user'])) {
    header("location:" . RACINE_SITE . "authentification.php");
} else if ($_SESSION['user']['role'] == 'ROLE_ADMIN') {

    header("location:" . RACINE_SITE . "admin/dashboard.php?dashboard_php");
}


$title = "Profil";
require_once "inc/header.inc.php";
?>

<main>

<div class="container bg-light p-3 rounded">
<h2 class="text-center p-3 text-secondary">Bienvenue! vous êtes connecté <?= $_SESSION['user']['nom'] ?></h2>

    <div class="row text-center d-flex">
        <div class="produit-promo col-6">
        <img src="./assets/img/choclitos.jpg" alt="choclitos">
        </div>

        <div class="description-promo col-6 p-5">
            <h3 class="text-danger">Choclitos c'est notre produit du mois!</h3>
            <h4 class="text-secondary">Réclamez-en un gratuitement dans notre boutique
                    avec votre e-mail, valable une seule fois.</h4>
                    <p>Nous vous en proposons d'autres allez à: <a href="tousProduits.php" class="text-danger"> TOUS LES PRODUITS</a></p>
                              
        </div>
    </div>


</div>

</main>


<?php
require_once "inc/footer.inc.php";

?>