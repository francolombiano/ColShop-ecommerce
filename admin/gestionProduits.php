<?php

require_once "../inc/functions.inc.php";

if (!isset($_SESSION['user'])) {
    header("location:" . RACINE_SITE . "authentification.php");
} else {
    if ($_SESSION['user']['role'] == 'ROLE_USER') {
        header("location:" . RACINE_SITE . "index.php");
    }
}

if (isset($_GET['action']) && isset($_GET['id_produit'])) {

    if (!empty($_GET['action']) && $_GET['action'] == 'update' && !empty($_GET['id_produit'])) {

        $idProduit = $_GET['id_produit'];
        $produit = getProduitParId($idProduit);
    }
}


if (isset($_GET['action']) && isset($_GET['id_produit'])) {
        if (!empty($_GET['action']) && $_GET['action'] == 'delete' && !empty($_GET['id_produit'])) {
    
            $idProduit = $_GET['id_produit'];
            $produit = deleteProduit($idProduit);
        }
    }

// ///////////////////////////////////////////////////

$info = '';
$verif ='';

if (!empty($_POST)) {
    // debug($_POST);

    $verif = true;

    foreach ($_POST as $value) {

        if (empty(trim($value))) {
            $verif = false;
        }
    }
}

    if (!empty($_FILES['image']['name'])) { // si le nom du fichier en cours de téléchargement n'est pas vide, alors c'est qu'on est entrain de télécharger une photo
        // debug($_FILES);

        $image = $_FILES['image']['name']; // $image contient le chemin relatif de la photo et sera enregistré en BDD. On utilise ce chemin pour les "src" des balises <img>.

    }

    if (!$verif || empty($image)) {
        $info = alert("Tous les champs sont requis", "danger");
    } else {
        if ($_FILES['image']['error'] != 0 || $_FILES['image']['size'] == 0 || !isset($_FILES['image']['type'])) {
            $info = alert("L'image n'est pas valide", "danger");
        }

        if (!isset($_POST['nom']) || (strlen($_POST['nom']) < 3 && trim($_POST['nom'])) || preg_match('/[0-9]+/', $_POST['nom'])) {
            $info .= alert("Le champ nom n'est pas valide", "danger");
        }
            
        if (!isset($_POST['description']) || strlen($_POST['description']) < 30) {
             $info .= alert("Le champs description n'est pas valide", "danger");
        }
            
        if (!isset($_POST['price']) || floatval($_POST['price']) === false) {
            $info.= alert("Le prix n'est pas valide", "danger");
            // .= « signifie que la valeur de la fonction alert( »Le prix n'est pas valide", “danger”) est concaténée à la valeur actuelle de la variable $info. En d'autres termes, le résultat de la fonction alert est ajouté à la variable $info.
        }
            
        if (!isset($_POST['stock'])) {
             $info .= alert("Le stock n'est pas valide", "danger");
        }

        //S'il n y a pas d'erreur sur le formulaire
        if (empty($info)) {

            if (empty($info)) {
            $nom = htmlentities(trim($_POST['nom']));
            $price = (float) htmlentities(trim($_POST['price']));
            $description = htmlentities(trim($_POST['description']));
            // htmlentities en PHP convertit les caractères spéciaux en entités HTML, ce qui signifie qu'il convertit les caractères tels que <, >, &, « , ' en leur équivalent HTML. 
            $stock = (int) $_POST['stock'];

            // La super global $_FILES à un indice "image" qui correspond au 'name' de l'input type"file" du formulaire ainsi qu'un indice "name" qui contient le nom du fichier en cours de télechargement  
            $image = $_FILES['image']['name'];

             // On enregistre le fichier image qui se trouve à l'adresse contenue dans $_FILES['image']['tmp_name'] vers la destination qui est le dossier "img" à l'adresse "../assets/nom_du_fichier.jpg".
            copy($_FILES['image']['tmp_name'], '../assets/img/' . $image);
            //debug($image)
            // copie le fichier image téléchargé par l'utilisateur dans le répertoire « assets/img » sur le serveur avec un nom de fichier spécifié par la variable $image.

            if (isset($_GET['action']) && $_GET['action'] == 'update' && isset($_GET['id_produit'])) {
                // $id = $_GET['id_produit'];

                move_uploaded_file($_FILES['image']['tmp_name'], '../assets/img/' . $image); // copy
                    //  La fonction move_uploaded_file() copie le fichier de l'emplacement temporaire à l'emplacement final sur le serveur.
                updateProduit($idProduit, $nom, $image, $price, $description, $stock);

             } else {
            copy($_FILES['image']['tmp_name'], '../assets/img/' . $image);
            
            addProduit($nom, $image, $price, $description, $stock);
            }

        header('location:dashboard.php?produits_php');
        }
    }       
       
}
  
$title = 'Gestion des produits';
require_once "../inc/header.inc.php";
?>

<main class="bg-secondary">

    <h2 class="text-center mb-5 text-warning p-5"><?= isset($produit) ? 'Modifier un produit' : 'Ajouter un produit' ?></h2>
    <?php
    echo $info;
    ?>
    <form action="" method="post" class="container-fluid col-sm-12 col-md-8" enctype="multipart/form-data">
<!-- multipart/form-dataes est utilisé pour envoyer des fichiers d'un formulaire HTML à un serveur. Il est utilisé lorsqu'un formulaire comprend des entrées de fichiers, telles que <input type=« file »> et que le formulaire est soumis au serveur. -->
        <div class="row">
            <div class="col-md-6 mb-5">
                <label for="nom" class="text-warning fw-bolder fs-5">Nom</label>
                <input type="text" id="nom" name="nom" class="form-control fs-5" value="<?= $produit['nom'] ?? '' ?>">
            </div>
            <div class="col-md-6 mb-5">
                <label for="image" class="text-warning fw-bolder fs-5">Photo</label>
                <input class="form-control fs-5" type="file" id="image" name="image" value="<?= $produit['image'] ?? '' ?>">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-5">
                <label for="price" class="text-warning fw-bolder fs-5">Prix</label>
                <div class="input-group">
                    <input type="text" class="form-control fs-5" id="price" name="price" value="<?= $produit['price'] ?? '' ?>" aria-label="Euros amount(with dot and two decimal places">
                    <span class="input-group-text">€</span>
                </div>
            </div>
            <div class="col-md-6 mb-5">
                <label for="stock" class="text-warning fw-bolder fs-5">Stock</label>
                <input type="number" name="stock" id="stock" class="form-control fs-5" min="0" value="<?= $produit['stock'] ?? '' ?>">
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <label for="description" class="text-warning fw-bolder fs-5">Description</label>
                <textarea name="description" id="description" cols="30" rows="10" class="form-control fs-5"><?= $produit['description'] ?? '' ?></textarea>
            </div>
        </div>

        <div class="row p-4">
            <button type="submit" class="btn btn-warning text-danger w-50 mx-auto fs-3 mt-5"><?= isset($produit) ? 'Modifier' : 'Ajouter' ?></button>
        </div>
      
    </form>

</main>

<?php

require_once "../inc/footer.inc.php";

?>