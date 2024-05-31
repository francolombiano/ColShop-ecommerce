<?php
    require_once "../inc/functions.inc.php";
    $panier = getPanier();
    $total = calculerTotalPanier($panier);

    // Simulation de la mise en place d'une passerelle de paiement avec Paypal
    // Ici, vous pouvez ajouter le code nécessaire pour intégrer Paypal comme passerelle de paiement.
    //Une fois que le paiement a été traité avec succès, vous pouvez vider votre panier.
    $_SESSION['panier'] = [];

    $title = "Paiement";
    require_once "../inc/header.inc.php";
?>

<main class="container paiement">
    <h2 class="text-center text-primary my-4">Paiement</h2>
    <h3 class="text-center text-danger">Page en cours de développement! Nous nous efforçons de vous offrir le meilleur service, ne tardez pas.</3>

    

    <div class="text-center mt-4 p-5 text-primary">
        <p>Votre paiement a été traité avec succès!</p>
        <p>Merci pour votre achat.</p>
    </div>
</main>

<?php
    require_once "../inc/footer.inc.php";
?>