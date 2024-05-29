<?php

session_start();

define("RACINE_SITE","/colombie/"); // constante qui définit les dossiers dans lesquels se situe le site pour pouvoir déterminer des chemin absolus à partir de localhost (on ne prend pas locahost). Ainsi nous écrivons tous les chemins (exp : src, href) en absolus avec cette constante.
define("IMAGES", "/img/"); //Contants pour faire le lien avec les images de les produits

///////////////////////////// Fonction de débugage //////////////////////////

function debug($var)
{
    echo '<pre class="border border-dark bg-light text-primary w-50 p-3">';
       var_dump($var);
    echo '</pre>';
}

///////////////////////////  Fonction de connexion à la BDD //////////////////////////
define("DBHOST", "localhost");
define("DBUSER", "root");
define("DBPASS", "");
define("DBNAME", "colshop");

function connexionBdd()
{ $dsn = "mysql:host=" . DBHOST . ";dbname=" . DBNAME . ";charset=utf8";
 try {$pdo = new PDO($dsn, DBUSER, DBPASS);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die($e->getMessage());
    }
    return $pdo;
}
 connexionBdd();

 //////////////Fonction deconexion de la BDD//////////////////////
 function deconnexionBdd($pdo)
 {
     $pdo = null;
     return $pdo;
 }
 //////////////////////////Fonction pour finaliser la session/////////////
 function logOut() {
    if (isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == 'deconnexion') {
        unset($_SESSION['user_id']); // Modificar la variable de sesión a 'user_id'
        header("location:" . RACINE_SITE . "authentification.php");
    }
}


//  function logOut()
// {           if (isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == 'deconnexion') {
//                  unset($_SESSION['user']);
//                 header("location:" . RACINE_SITE . "authentification.php");
//     }
// }
 
// //logOut();

 ///////////////////// Fonction d'alert ////////////////////////////////////////

function alert(string $contenu, string $class)
{ return "<div class='alert alert-$class alert-dismissible fade show text-center w-50 m-auto mb-5' text-dark role='alert'>
                $contenu
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
}

  //////////Fonction pour voir les premieres 9 produits sur l'index///////////////////////
  function produitsIndex(): array
  { $pdo = connexionBdd();
    $sql = "SELECT * FROM produits ORDER BY id_produit DESC LIMIT 9";
    $request = $pdo->query($sql);
    $result = $request->fetchAll();
    return $result;
  }
 
 //////////////////////////Function pour voir tous les produits////////////////+

 function allProduits(): array
 { 
    $pdo = connexionBdd(); 
    $sql = "SELECT * FROM produits ORDER BY id_produit DESC"; 
    $request = $pdo->query($sql);
    $result = $request->fetchAll(); 
    return $result; 
}


////////////////////////Function pour voir un seule produit pour ID//////////////////////
function getProduitById($id_produit): array
{
    $pdo = connexionBdd();
    $sql = "SELECT * FROM produits WHERE id_produit = :id";
    $request = $pdo->prepare($sql);
    $request->execute(['id' => $id_produit]);
    $result = $request->fetch();

    return $result;
}

//////////////////// Fonction pour registrer les utilisateurs Users /////////////////////
function addUser($nom, $telephone, $email, $motPasse, $civility, $ville) {
    $pdo = connexionBdd();
    // Préparer la requête avec des paramètres (???) pour éviter les injections SQL
    $request = $pdo->prepare("INSERT INTO users (nom, telephone, email, motPasse, civility, ville) VALUES (?, ?, ?, ?, ?, ?)");
    // Exécuter une requête avec des valeurs liées (binde) c'est a dire liees a les parametres(???)
    $request->execute([$nom, $telephone, $email, $motPasse, $civility, $ville]);
    // fermer la conexion apres de ajouter l'utilisateur
    deconnexionBdd($pdo);
}

/////////////////Fonction pour verifier que l'email deja existe dans la base de donnees
function checkEmailUser(string $email): mixed
{
    $pdo = connexionBdd();
    $sql = "SELECT * FROM users WHERE email = :email";
    $request = $pdo->prepare($sql);
    $request->execute(array(
        ':email' => $email
    ));
    $resultat = $request->fetchColumn();
    return $resultat;
    deconnexionBdd($pdo);
}

////////////////Fonction pour verifier l'authentification d'email et mot de passe

function checkUser(string $email, string $motPasse): mixed
{
    $pdo = connexionBdd();
    $sql = "SELECT * FROM users WHERE email = :email";
    $request = $pdo->prepare($sql);
    $request->execute(array(
        ':email' => $email
    ));

    $user = $request->fetch();

    if ($user && password_verify($motPasse, $user['motPasse'])) {
        return $user;
    } else {
        return null;
    }
}

// /////////////////  Fonction pour recupereer un seul utilisateur  //////////////////////
function showUser(int $id): array {
    $pdo = connexionBdd();
    $sql = "SELECT * FROM users WHERE id_user = :id_user";
    $request = $pdo->prepare($sql);
    $request->execute(array(':id_user' => $id));
    $result = $request->fetch();
    return $result ? $result : array(); 
}

///////////////////////////Fonction pour modifier un produit///////////
function updateProduit(int $idProduit, string $image, string $nom, string $description, float $price, int $stock) : void 
{
    $pdo = connexionBdd();
    $target_dir = "./assets/img/"; // Dossier de destination pour l'enregistrement de l'image
    //  Vérifier si un fichier image a été correctement téléchargé, le déplacer à l'endroit souhaité et enregistrer le nom de l'image dans une variable.
    //  Je vérifie qu'il n'y a pas eu d'erreur lors du téléchargement du fichier image. La constante UPLOAD_ERR_OK indique qu'il n'y a pas eu d'erreur lors du téléchargement du fichier.
    if ($_FILES['image']['error'] === UPLOAD_ERR_OK) { 
    // J'ai crée le chemin complet du fichier image à l'emplacement souhaité. $target_dir est le dossier de destination dans lequel le fichier sera stocké.
        $target_file = $target_dir . basename($_FILES['image']['name']);
    // Je déplacer le fichier image de son emplacement temporaire (stocké dans $_FILES['image']]['tmp_name']) vers l'emplacement final dans $target_file.
        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
    // Je stocke le nom de l'image dans une variable appelée $image.
        $image = basename($_FILES['image']['name']);
    }

    $sql = "UPDATE produits SET 
                nom = :nom,
                image = :image,
                description = :description,
                price = :price,
                stock = :stock 
                WHERE id_produit = :id";

    $request = $pdo->prepare($sql);
    $request->execute(array (
        ':id' => $idProduit,
        ':nom' => $nom,
        ':image' => $image,
        ':description' => $description,
        ':price' => $price,
        ':stock' => $stock
    ));
}

////////////////panier///////////////////////
// ///////////  Fonction pour ajouter un produit  ////////////

function ajouterProduitAuPanier($idProduit, $nom, $price, $image) {
    if(isset($_SESSION['panier'][$idProduit])) {
        $_SESSION['panier'][$idProduit]['quantite']++;
    } else {
        $_SESSION['panier'][$idProduit] = [
            'id_produit' => $idProduit,
            'quantite' => 1,
            'nom' => $nom,
            'price' => $price,
            'image' => $image
        ];
    }
}

// Función para eliminar un producto del carrito
function supprimerProduitDuPanier($idProduit) {
    if(isset($_SESSION['panier'][$idProduit])) {
        unset($_SESSION['panier'][$idProduit]);
    }
}

// Función para obtener el carrito
function getPanier() {
    if(isset($_SESSION['panier'])) {
        return $_SESSION['panier'];
    } else {
        return [];
    }
}

// Función para calcular el total del carrito

function calculerTotalPanier($panier) {
    $total = 0;
    foreach ($panier as $produit) {
        $total += $produit['price'] * $produit['quantite'];
    }
    return $total;
}

function getProduitParId($idProduit) {
    // Conectar a la base de datos
    $pdo = connexionBdd();

    // Preparar la consulta
    $query = "SELECT * FROM produits WHERE id_produit = :id_produit";

    // Ejecutar la consulta
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id_produit', $idProduit);
    $stmt->execute();

    // Obtener el resultado
    $produit = $stmt->fetch();

    // Cerrar la conexión
    $pdo = null;

    return $produit;
}


?>