<?php
require_once "inc/functions.inc.php";

$title = "Tous les produits";

require_once "inc/header.inc.php";

 $produits = allProduits();

?>

<main>
     <!--Image de fond  -->
     <div class="affiche"></div>
 
     <!-- Titre, slogan et offres -->
     <div class="general col-sm-12 col-md-12 col-lg-12 container-fluid bg-light p-5">
          <div class="row">
               <div class="info col-sm-12 col-md-12 text-center mb-5">
                    <h1 class="display-4 text-primary">ColShop - Tous les produits!</h1>
                    <p class="lead text-danger">Livraison gratuite à partir de 50 €</p>
                    <h4 class="text-primary">S'inscrire pour recevoir des offres et des réductions!</h4>
               </div>
          </div>

          <!-- produits -->
          <section class="container-fluid articles col-sm-12 pt-3 pb-3 text-center">
               <div class="row">

                    <?php
                    //debug($produits); 
                    foreach ($produits as $produit) {
                    ?>
                         <div class="produits col-lg-4 col-md-6 col-sm-12 mb-4">
                              <div class="card">
                                   <img src="<?= RACINE_SITE . "assets/img/" . $produit['image'] ?>" class="card-img-top" alt="image de <?= $produit['nom'] ?>">
                                   <div class="card-body">
                                        <h5 class="card-title"><?= strtoupper($produit['nom']) ?></h5>
                                        <p class="card-text text-danger"><?= substr($produit['price'] . ' €', 0, 100) ?></p>
                                        <p class="card-text text-left"><?= substr($produit['description'], 0, 100) ?>...</p>

                                        <div class="d-flex justify-content-between boutons-produits ml-3 mr-3">
                                             <a href="<?= RACINE_SITE ?>voirProduit.php?produit=<?= $produit['id_produit'] ?>" class="add-to-cart btn btn-warning btn-sm">Voir le produit</a>
                                             <form method="post" action="<?= RACINE_SITE ?>achats/panier.php">
                                                  <input type="hidden" name="produit" value="<?= $produit['id_produit'] ?>">
                                                  <button type="submit" class="add-to-cart btn btn-warning btn-sm">Ajouter au panier</button>
                                             </form>
                                        </div>

                                   </div>
                              </div>
                         </div>
                    <?php
                    }
                    ?>
               </div>
   </div>
     </section>

</main>





<?php
require_once "inc/footer.inc.php";
?>