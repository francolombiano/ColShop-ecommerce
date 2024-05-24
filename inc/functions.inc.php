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
 function logOut()
{if (isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == 'deconnexion') {
    unset($_SESSION['user']);
    header("location:" . RACINE_SITE . "index.php");
    }
}
 logOut();

 ///////////////////// Fonction d'alert ////////////////////////////////////////

function alert(string $contenu, string $class)
{ return "<div class='alert alert-$class alert-dismissible fade show text-center w-50 m-auto mb-5' text-dark role='alert'>
                $contenu
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
}

  //////////Fonction produits index pour voir les premieres 9///////////////////////
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
// function authentification($email, $motPasse)
// {
//     $pdo = connexionBdd();
//     $sql = "SELECT * FROM users WHERE email = :email"; 
//     $request = $pdo->prepare($sql);
//     $request->execute(array(
//         ':email' => $email
//     ));

//     $user = $request->fetch();

//     if (password_verify($motPasse, $user['motPasse'])) {
//         $_SESSION['user'] = $user;
//         header("location:" . RACINE_SITE . "profil.php");
//     } else {
//         $info = alert("Les identifiants sont incorrectes", "danger");
//     }
// }


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

 //////////////////////function para agregar al carrito /////////////////////////
//  ojo revisar bien esto manana y considerar el hecho de anadi y quitar ///////
 
//  $producto_id = $_GET['producto'];

// if (!isset($_SESSION['carrito'])) {
//     $_SESSION['carrito'] = [];
// }

// array_push($_SESSION['carrito'], $producto_id);

// header('Location: ' . $_SERVER['HTTP_REFERER']);

?>