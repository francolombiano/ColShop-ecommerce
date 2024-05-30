<?php

require_once "../inc/functions.inc.php";

$panier = getPanier();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['produit']) && is_numeric($_POST['produit'])) {
    $idProduit = $_POST['produit'];
    // Obtenir des informations sur les produits
    $produit = getProduitParId($idProduit);
    //vérifier si le produit est déjà dans le panier
    $cantidad = 1;
    foreach ($panier as $item) {
        if ($item['id_produit'] == $idProduit) {
            $cantidad++;
        }
    }
    // Ajouter le produit au panier
    ajouterProduitAuPanier($idProduit, $produit['nom'], $produit['price'], $produit['image'], $cantidad);
}

if (isset($_GET['supprimer']) && is_numeric($_GET['supprimer'])) {
    $idProduit = $_GET['supprimer'];
    // Retirer le produit du panier
    supprimerProduitDuPanier($idProduit);
    // Rediriger l'utilisateur vers la page du panier
    header('Location: ' . RACINE_SITE . 'achats/panier.php');
    exit;
}

$panier = getPanier();
$total = calculerTotalPanier($panier);
$totalProduits = count($panier);

$title = "Panier";
require_once "../inc/header.inc.php";
?>

<main class="container panier">
    <h2 class="text-center text-muted my-4">Mon Panier - <?= $totalProduits?> produit(s)</h2>

    <div class="row bg-primary p-3">
        <?php foreach ($panier as $produit):?>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="card">
                    <img src="<?= RACINE_SITE."assets/img/". $produit['image']?>" class="card-img-top" alt="image de <?= $produit['nom']?>">
                    <div class="card-body">
                        <h5 class="card-title text-muted"><?= $produit['nom']?></h5>
                        <p class="card-text text-danger"><?= $produit['quantite']?>x <?= $produit['price']?> €</p>
                        <a href="<?= RACINE_SITE?>achats/panier.php?supprimer=<?= $produit['id_produit']?>" class="btn btn-danger text-warning">Supprimer</a>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
    </div>

    <div class="text-center mt-4 p-5 text-danger">
        <p>Total: <?= $total?> €</p>
        <a href="<?= RACINE_SITE?>achats/paiement.php" class="btn btn-warning btn-lg text-danger">Paiement</a>
    </div>
</main>


<?php
require_once "../inc/footer.inc.php";
?> 


