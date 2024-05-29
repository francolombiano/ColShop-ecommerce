<?php
require_once "inc/functions.inc.php";

// on va vérifie s'il a reçu un paramètre appelé 'produit' via la méthode GET
if (isset($_GET['produit'])) {    
    $id_produit = $_GET['produit'];
    $produit = getProduitById($id_produit);
} else {
    header("Location: index.php");
}

$title = "Voir Produit - " . $produit['nom'];
require_once "inc/header.inc.php";
?>

<main>
    <div class="container">
        <div class="row p-5">
            <div class="col-lg-6">
                <img src="<?= RACINE_SITE ."assets/img/" . $produit['image'] ?>" class="img-fluid" alt="image de <?= $produit['nom'] ?>">
            </div>
            <div class="col-lg-6">
                <h2><?= strtoupper($produit['nom']) ?></h2>
                <p>Prix: <?= $produit['price'] . ' €'?> </p>
                <p><?= $produit['description'] ?></p>

                <form method="post" action="<?= RACINE_SITE ?>achats/panier.php">
                                        <input type="hidden" name="produit" value="<?= $produit['id_produit'] ?>">
                                        <button type="submit" class="add-to-cart btn btn-warning btn-sm">Ajouter au panier</button>
                </form>
            </div>
        </div>
    </div>
</main>

<?php
require_once "inc/footer.inc.php";
?>