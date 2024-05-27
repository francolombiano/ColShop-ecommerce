<?php
    require_once "inc/functions.inc.php";
  
     $title = "Accueil";

    require_once "inc/header.inc.php";
    $produits = produitsIndex(); 
 
?>
    <main class="fond-index">
        <!--image de fond  -->
        <div class="affiche p-5">
            <div class="site-name text-center col-sm-12 col-md-12">
                <h1 class="display-4">ColShop - La colombie en Paris!</h1>
            </div>
        </div>

        <!-- produits -->
        <section class="index-img container articles col-sm-12 pt-5 pb-5 produits text-center">
          <div class="row">
               <?php
               //debug($produits); 
               foreach ($produits as $produit) {
               ?>
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                         <div class="card">
                              <img src="<?= RACINE_SITE ."assets/img/". $produit['image'] ?>" class="card-img-top" alt="image de <?= $produit['nom'] ?>">
                              <div class="card-body">
                                   <h5 class="card-title"><?= strtoupper($produit['nom']) ?></h5>
                                   <p class="card-text"><?= substr($produit['price'] . ' €', 0, 100)?></p>
                                   <p class="card-text"><?= substr($produit['description'], 0, 100) ?>...</p>
                                   <a href="<?= RACINE_SITE ?>voirProduit.php?produit=<?= $produit['id_produit'] ?>" class="add-to-cart btn btn-warning btn-sm">Voir le produit</a>
                                  
                                   <!-- revisar bien manana es el boton para anadir al carrito -->
                                   <a href="<?= RACINE_SITE ?>agregarAlCarrito.php?produit=<?= $produit['id_produit'] ?>" class="add-to-cart btn btn-warning btn-sm">Ajouter au panier</a>
                              </div>
                         </div>
                    </div>
               <?php
               }
               ?>
          </div>
     </section>

          </main>

    <?php
     require_once "inc/footer.inc.php";

     ?>
