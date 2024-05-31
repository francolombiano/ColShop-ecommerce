<?php

session_start();

define("RACINE_SITE","/colombie/"); // constante qui définit les dossiers dans lesquels se situe le site pour pouvoir déterminer des chemin absolus à partir de localhost (on ne prend pas locahost). Ainsi nous écrivons tous les chemins (exp : src, href) en absolus avec cette constante.

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
 function logOut() 
 {
    if (isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == 'deconnexion') {
        unset($_SESSION['user_id']); // Modificar la variable de sesión a 'user_id'
        header("location:" . RACINE_SITE . "authentification.php");
    }
}


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

//////////////////// Fonction pour registrer les utilisateurs /////////////////////
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
    // Les deux points indiquent un espace réservé nommé en SQL. Le caractère générique « :id_produit » sera alors remplacé par une valeur lors de l'exécution de la requête. Je l'utilise pour prévenir les attaques par injection SQL.
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


function updateProduit(int $idProduit, string $nom, string $image,  float $price, string $description, int $stock) : void 
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

// Fonction pour ajouter un produit du côté de l'administrateur

function addProduit(string $nom, string $image, float $price, string $description, int $stock): void
{

    $pdo = connexionBdd();

    $sql = "INSERT INTO produits (image, nom, description, price, stock) VALUES (:image, :nom, :description, :price, :stock)";
    $request = $pdo->prepare($sql);
    $request->execute(array(
        ':image' => $image,
        ':nom' => $nom,
        ':description' => $description,
        ':price' => $price,
        ':stock' => $stock
       
    ));
}

/////Fonction pour supprimer un produit (côté administratif)

function deleteProduit(int $id): void
{
    $pdo = connexionBdd();
    $sql = "DELETE FROM produits WHERE id_produit = :id";
    $request = $pdo->prepare($sql);
    $request->execute([':id' => $id]);

    header('Location: produits.php?deleted=true');
    exit;
}

////////////////panier//////////////////////////////////////////////////

// ///////////  Fonction pour ajouter un produit  ////////////
// Je vais ajouter un produit au panier stocké dans la session. Si le produit existe déjà, elle augmente la quantité. S'il n'existe pas, elle crée un nouvel article dans le panier avec les informations relatives au produit.
function ajouterProduitAuPanier($idProduit, $nom, $price, $image) {
    // Je vérifie s'il existe un produit avec le même $idProduit dans le panier d'achat stocké dans la session.
    if(isset($_SESSION['panier'][$idProduit])) {
        // Si le produit existe déjà dans le panier, la quantité du produit est augmentée de 1.
        $_SESSION['panier'][$idProduit]['quantite']++;
    } else {
        // Si le produit n'existe pas dans le panier:je crée un nouvel article dans le panier avec la clé $idProduit et un tableau avec les attributs est assigné :
        $_SESSION['panier'][$idProduit] = [
            'id_produit' => $idProduit,
            'quantite' => 1,
            'nom' => $nom,
            'price' => $price,
            'image' => $image
        ];
    }
}

// Fonction permettant de retirer un produit du panier
function supprimerProduitDuPanier($idProduit) {
    if(isset($_SESSION['panier'][$idProduit])) {
        // la fonction unset() est utilisée pour supprimer une variable ou un élément spécifique d'un tableau.
        //  Je supprime l'élément correspondant à l'index $idProduit dans le tableau $_SESSION['panier']. Cela signifie que le produit dont l'ID est $idProduit sera supprimé du panier stocké dans la session de l'utilisateur.
        unset($_SESSION['panier'][$idProduit]);
    }
}

// Fonction d'obtention du panier
function getPanier() {
    if(isset($_SESSION['panier'])) {
        return $_SESSION['panier'];
    } else {
        return [];
    }
}

//  Fonction pour calculer le total du panier
function calculerTotalPanier($panier) {
    $total = 0;
    foreach ($panier as $produit) {
        // J'utilise l'accumulateur 
        $total += $produit['price'] * $produit['quantite']; 
    }
    return $total;
}

//Fonction permettant d'obtenir un produit par ID
function getProduitParId($idProduit) {
    $pdo = connexionBdd();
    $sql = "SELECT * FROM produits WHERE id_produit = :id_produit";
    $request = $pdo->prepare($sql);
// J'utilise la fonction bindParam pour lier les paramètres de la requête préparée. Pour éviter les attaques par injection SQL :)
    $request->bindParam(':id_produit', $idProduit);
    $request->execute();

    $produit = $request->fetch();

    // fermer la conexion
     deconnexionBdd($pdo);

    return $produit;
}




?>