<?php

require_once "../inc/functions.inc.php";

if (!isset($_SESSION['user'])) {
    header("location:" . RACINE_SITE . "authentification.php");
} else {
    if ($_SESSION['user']['role'] == 'ROLE_USER') {
        header("location:" . RACINE_SITE . "index.php");
    }
}

require_once "../inc/header.inc.php";
$title = "Produits";

?>

<body>
    <main class="container-fluid p-0">
        <div class="d-flex flex-column m-auto mt-3 bg-secondary p-3">
            <h2 class="text-center fw-bolder mb-5 text-muted">Liste des produits</h2>
            <a href="gestionProduits.php" class="btn btn-warning btn-md col-md-2 mx-auto d-flex justify-content-center text-danger align-items-center mb-3"> Ajouter un produit</a>
            <div class="table-responsive">
                <table class="table table-secondary table-bordered mb-0">
                    <thead>
                        <tr>
                            <th class="text-nowrap">ID</th>
                            <th>Nom</th>
                            <th>Photo</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Stock</th>
                            <th>Supprimer</th>
                            <th> Modifier</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $produits = allProduits();
                        foreach ($produits as $produit) {
                        ?>
                            <tr>
                                <td><?= $produit['id_produit'] ?></td>
                                <td><?= $produit['nom'] ?></td>
                                <td> <img src="<?= RACINE_SITE . "assets/img/" . $produit['image'] ?>" alt="Photo du produit" class="img-administration img-fluid"></td>
                                <td><?= $produit['price'] . ' €' ?> </td>
                                <td><?= substr($produit['description'], 0, 50) ?>...</td>
                                <td><?= $produit['stock'] ?></td>
                                <td class="text-center">
                                    <a href="gestionProduits.php?action=delete&id_produit=<?= $produit['id_produit'] ?>">
                                        <!--  crée un lien HTML qui redirige vers la page gestionProduits.php avec l'action supprimer et l'ID du produit dans la variable id_produit.  -->
                                        <i class="bi bi-trash3-fill text-danger"></i>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a href="gestionProduits.php?action=update&id_produit=<?= $produit['id_produit'] ?>">
                                        <i class="bi bi-pen-fill"></i>
                                    </a>
                                </td>

                            </tr>
                        <?php
                        }

                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
<?php
require_once "../inc/footer.inc.php";
?>