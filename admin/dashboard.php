<?php
require_once "../inc/functions.inc.php";
 

$title = "Administrateur";
require_once "../inc/header.inc.php";
?>

<main>
    <div class="administration">
    <h2 class="text-center p-3 text-muted">Bonjour administrateur, <?=$_SESSION['user']['nom']?></h2>
    <p class="text-center text-muted">Ce que vous voulez faire aujourd'hui</p>
    </div>

    <div class="row justify-content-center">
    <div class="col-sm-6 col-md-12 col-lg-12">

        <div class="d-flex flex-column text-bg-dark p-3 sidebarre text-center bg-secondary">
            <hr>

            <ul class="nav nav-pills flex-column mb-auto">
                <li>
                    <a href="?produits_php" class="nav-link text-light">Produits</a>
                </li>
                <li>
                    <a href="?dashboard_php" class="nav-link text-light">Administrateur</a>
                </li>
                
                
            </ul>
            <hr>
        </div>
    </div>

   
    <?php
            if ( !empty( $_GET ) ) {   //si ma variable $_GET n'est pas vide, cela veut dire que j'ai cliqué sur un lien de la sidebar ( l'indice de la variable $_GET change selon le lien indiqué dans la balise a)

                if ( isset( $_GET['produits_php'] ) ){
                    require_once "produits.php";

                }else{
                    require_once "dashboard.php";
                }
            }
            ?>
</div>

</main>


<?php
      require_once "../inc/footer.inc.php";

      /** $_GET représente les données qui transitent par l'URL. Il s'agit d'une Super Globale et comme toutes les superglobales elle sont de type array
             * 'superglobale' signifie que cette variable est disponible partout dans le script, y compris au sein des fonctions (pas besoin de faire global $_GET)
             * Les informations transitent dans l'URL selon la syntaxe suivante: 
             * 
             * ex: page.php?indice1=valeur1&indice2=valeur2&indiceN=valeurN
             * Quand on receptionne les données, $_GET est rempli selon le schéma suivant: 
             * 
             *                  $_GET = array(
             *                    'indice1' => 'valeur1',
             *                    'indice2' => 'valeur2',
             *                    'indiceN' => 'valeurN'
             *                   );
            */
?>

