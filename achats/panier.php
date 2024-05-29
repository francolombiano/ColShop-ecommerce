<?php
require_once "../inc/functions.inc.php";

$title = "Panier";

require_once "../inc/header.inc.php";

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['produit']) && is_numeric($_POST['produit'])) {
    $idProduit = $_POST['produit'];

    // Obtener información del producto
    $produit = getProduitParId($idProduit);
  
    // Añadir producto al carrito
    ajouterProduitAuPanier($idProduit, $produit['nom'], $produit['price'], $produit['image']);
}

if(isset($_GET['supprimer']) && is_numeric($_GET['supprimer'])) {
    $idProduit = $_GET['supprimer'];

    // Eliminar producto del carrito
    supprimerProduitDuPanier($idProduit);
}

$panier = getPanier();
$total = calculerTotalPanier($panier);
?>

<main class="container">
    <h2 class="text-center my-4">Mon Panier</h2>

    <div class="row">
        <?php foreach ($panier as $produit): ?>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="card">
                    <img src="<?= RACINE_SITE ."assets/img/". $produit['image'] ?>" class="card-img-top" alt="image de <?= $produit['nom'] ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $produit['nom'] ?></h5>
                        <p class="card-text"><?= $produit['price'] ?> €</p>
                        <a href="<?= RACINE_SITE ?>achats/panier.php?supprimer=<?= $produit['id_produit'] ?>" class="btn btn-danger">Supprimer</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="text-center mt-4">
        <p>Total: <?= $total ?> €</p>
        <a href="<?= RACINE_SITE ?>achats/paiement.php" class="btn btn-primary">Paiement</a>
    </div>
</main>

<?php
require_once "../inc/footer.inc.php";
?>
