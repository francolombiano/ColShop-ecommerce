
<?php

require_once "../inc/functions.inc.php";

if (!isset($_SESSION['user'])) {
    header("location:" . RACINE_SITE . "authentification.php");
} else {
    if ($_SESSION['user']['role'] == 'ROLE_USER') {
        header("location:" . RACINE_SITE . "index.php");
    }
}

// Vérifier si le dossier de destination est accessible en écriture
$target_dir = "./assets/img/"; // Chemin d'accès au dossier dans lequel les images doivent être téléchargées

if (is_writable($target_dir)) {
    echo "La carpeta es escribible. Puedes cargar las imágenes.";
} else {
    echo "La carpeta no es escribible. Por favor, verifica los permisos de la carpeta.";
}

$idProduit = NULL;

if (isset($_GET['action']) && isset($_GET['id_produit'])) {

    if (!empty($_GET['action']) && $_GET['action'] == 'update' && !empty($_GET['id_produit'])) {

        $idProduit = $_GET['id_produit'];
        $produit = allProduits($idProduit);
    }
}

if (isset($_GET['action']) && isset($_GET['id_produit'])) {
    if (!empty($_GET['action']) && $_GET['action'] == 'delete' && !empty($_GET['id_produit'])) {

        $idProduit = $_GET['id_produit'];
        $produit = deleteProduit($idProduit);
    }
}

$info = '';

if (!empty($_POST)) {

    $verif = true;

    foreach ($_POST as $value) {
        if (empty(trim($value))) {
            $verif = false;
        }
    }

    if (!empty($_FILES['image']['name'])) {

        $image = $_FILES['image']['name'];
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

        if (!isset($_POST['price']) || !is_numeric($_POST['price'])) {
            $info .= alert("Le prix n'est pas valide", "danger");
        }

        if (!isset($_POST['stock'])) {
            $info .= alert("Le stock n'est pas valide", "danger");
        }

        if (empty($info)) {
            $nom = htmlentities(trim($_POST['nom']));
            $description = htmlentities(trim($_POST['description']));
            $price = (float) htmlentities(trim($_POST['price']));
            $stock = (int) $_POST['stock'];
            $image = $_FILES['image']['name'];

            move_uploaded_file($_FILES['image']['tmp_name'], './assets/img/' . $image);

            if (isset($_GET['action']) && $_GET['action'] == 'update' && isset($_GET['id_produit'])) {
                updateProduit($idProduit, $image, $nom, $description, $price, $stock);
            } else {
                addProduit($image, $nom, $description, $price, $stock);
            }

            header('location:dashboard.php?produits_php');
        }                
    }
}   
  
$title = 'Gestion des produits';
require_once "../inc/header.inc.php";
?>

<main>

    <h2 class="text-center fw-bolder mb-5 text-danger"><?= isset($produit) ? 'Modifier un produit' : 'Ajouter un produit' ?></h2>
    <?php
    echo $info;
    ?>
    <form action="" method="post" enctype="multipart/form-data">

        <div class="row">
            <div class="col-md-6 mb-5">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" class="form-control fs-3" value="<?= $produit['nom'] ?? '' ?>">
            </div>
            <div class="col-md-6 mb-5">
                <label for="image">Photo</label>
                <input class="form-control fs-3" type="file" id="image" name="image" value="<?= $produit['image'] ?? '' ?>">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-5">
                <label for="price">Prix</label>
                <div class="input-group">
                    <input type="text" class="form-control fs-3" id="price" name="price" value="<?= $produit['price'] ?? '' ?>" aria-label="Euros amount(with dot and two decimal places">
                    <span class="input-group-text">€</span>
                </div>
            </div>
            <div class="col-md-6 mb-5">
                <label for="stock">Stock</label>
                <input type="number" name="stock" id="stock" class="form-control fs-3" min="0" value="<?= $produit['stock'] ?? '' ?>">
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="30" rows="10" class="form-control fs-3"><?= $produit['description'] ?? '' ?></textarea>
            </div>
        </div>

        <div class="row">
            <button type="submit" class="btn btn-danger w-50 p-3 mx-auto fs-3 mt-5"><?= isset($produit) ? 'Modifier' : 'Ajouter' ?></button>
        </div>
      
    </form>

</main>


<?php

require_once "../inc/footer.inc.php";

?>






