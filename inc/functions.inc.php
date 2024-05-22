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
{
    $dsn = "mysql:host=" . DBHOST . ";dbname=" . DBNAME . ";charset=utf8";

    try {

        $pdo = new PDO($dsn, DBUSER, DBPASS);

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    } catch (PDOException $e) {

        die($e->getMessage());
    }

    return $pdo;
}
 connexionBdd();

 //////////////Fonction deconexion de la BDD//////////////////////
//  function deconnexionBdd($pdo)
// {
//     $pdo = null;
// }

  //////////Fonction produits index pour voir les premieres 9///////////////////////
  function produitsIndex(): array
  {
  
      $pdo = connexionBdd();
      $sql = "SELECT * FROM produits ORDER BY id_produit DESC LIMIT 9";
      $request = $pdo->query($sql);
      $result = $request->fetchAll();
      return $result;
  }
 
 //////////////////////////Function pour voir les produits////////////////+

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

 //////////////////////function para agregar al carrito /////////////////////////
//  ojo revisar bien esto manana y considerar el hecho de anadi y quitar ///////
 
//  $producto_id = $_GET['producto'];

// if (!isset($_SESSION['carrito'])) {
//     $_SESSION['carrito'] = [];
// }

// array_push($_SESSION['carrito'], $producto_id);

// header('Location: ' . $_SERVER['HTTP_REFERER']);

?>