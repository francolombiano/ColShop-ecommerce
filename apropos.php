<?php
require_once "inc/functions.inc.php";

$title = "A propos";

require_once "inc/header.inc.php";
?>

<main>
<!--Image de fond  -->
<div class="affiche-apropos"></div>

<div class="container bg-light p-3 rounded">
<h2 class="text-center p-3 text-secondary">Qui sommes-nous?</h2>

    <div class="row d-flex">
        <div class="directeur col-4">
        <img  class="rounded" src="./assets/img/directeur.jpg" alt="directeur-colshop">
        </div>

        <div class="description-promo col-6 ">
            <h3 class="text-danger">ColShop, connexion avec notre pays!</h3>
            <p class="text-secondary">ColShop est une entreprise individuelle d'un 
            habitant colombien de la ville de Paris.<br> <br>Sa principale mission est d'offrir
             aux clients qui visitent le site une expérience de connexion avec leur 
             culture à travers des produits de qualité largement connus dans 
             leurs pays, et à des prix abordables. Visiter le site et stimuler 
             vos sens avec les couleurs, les produits et les images de votre pays, 
             plus qu'une simple possibilité d'achat, c'est un voyage au coeur de nos
              origines.</p>

              <p class="text-secondary">Elle a été créée et dirigée par Fernando FLOREZ, Communicateur social 
                et journaliste, Développeur web-mobile. Voyageur infatigable, citoyen 
                du monde, esprit libre. Vivre est la seule chose importante!</p>
                              
        </div>
    </div>



</main>



<?php
require_once "inc/footer.inc.php";

?>