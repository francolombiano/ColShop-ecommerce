<?php
require_once "inc/functions.inc.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $_POST['email'];
  // Verifier si l'email exist deja
  $resultat = checkEmailUser($email);
  if ($resultat) {
    // Si l'email existe déjà, rediriger l'utilisateur vers la page authentification.php.
  
    header("Location: authentification.php");
    exit;
  } else {
    // Si l'adresse électronique n'existe pas dans la base de données, poursuivez la procédure d'enregistrement. 
    // $_SERVER['REQUEST_METHOD'] == 'POST',vérifie si la méthode de requête pour accéder à la page de script est POST.  Cette méthode est utilisée pour traiter les formulaires et les données soumises à partir d'un formulaire HTML utilisant la méthode POST.
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $nom = $_POST['nom'];
      $telephone = $_POST['telephone'];
      $email = $_POST['email'];
      $motPasse = $_POST['motPasse'];
      $confirmMotPasse = $_POST['confirmMotPasse'];
      $civility = $_POST['civility'];
      $ville = $_POST['ville'];
      // J'ai utilise la fonction password_hash de PHP est utilisée pour hacher le mot de passe, elle prend deux arguments le mot de passe donné $motPasse et l'algorithme qui effectue le hachage PASSWORD_DEFALUT recommandé par PH
      $hashedMotPasse = password_hash($motPasse, PASSWORD_DEFAULT);
      addUser($nom, $telephone, $email, $hashedMotPasse, $civility, $ville);
    }
  }
}

$title = "Registre";
require_once "inc/header.inc.php";
?>

<main>

  <section class="titre-inscription">
    <div class="text-center col-sm-12">
      <h1 class="display-5 text-secondary p-4">Registre!</h1>
      <i class="bi bi-chevron-down down text-danger display-3"></i>
    </div>
  </section>

  <!-- Formulaire de registre -->

  <section class="p-5 container-fluid bg-light">

    <form id="form1" action="register.php" method="POST" class="w-50 mx-auto bg-primary p-3 rounded-5 formV border p-5 col-md-8">
      
    <div class="p-3 inputs col-sm-12">
        <label for="nom" class="form-label text-warning">Nom complet</label>
        <input type="text" class="form-control rounded-pill input-custom" id="nom" name="nom" placeholder="Inscrivez ici votre nom complet">
        <div id="nomError" class="error bg-warning text-secondary rounded"></div>
      </div>

      <div class="p-3 inputs col-sm-12">
        <label for="telephone" class="form-label text-warning">Téléphone</label>
        <input type="number" class="form-control rounded-pill input-custom" id="telephone" name="telephone" placeholder="Inscrivez ici votre numéro de téléphone">
        <div id="telephoneError" class="error bg-warning text-secondary rounded"></div>
      </div>

      <div class="p-3 inputs col-sm-12">
        <label for="email" class="form-label text-warning">Email</label>
        <input type="text" class="form-control rounded-pill input-custom" id="email" name="email" placeholder="Inscrivez ici votre email">
        <div id="emailError" class="error bg-warning text-secondary rounded"></div>
      </div>

      <div class="p-3 inputs col-sm-12">
        <label for="motPasse" class="form-label text-warning">Mot de passe</label>
        <input type="password" class="form-control rounded-pill input-custom" id="motPasse" name="motPasse" placeholder="Inscrivez ici votre Mot de Passe">
        <i class="bi bi-eye-slash ms-3 iconeye text-warning" id="toggleMotPasse"></i>
        <div id="motPasseError" class="error bg-warning text-secondary rounded"></div>
        
      </div>

      
      <div class="p-3 inputs col-sm-12">
        <label for="confirmMotPasse" class="form-label text-warning">Confirmer mot de passe</label>
        <input type="password" class="form-control rounded-pill input-custom" id="confirmMotPasse" name="confirmMotPasse" placeholder="Inscrivez ici votre Mot de Passe encore">
        <i class="bi bi-eye-slash ms-3 iconeye1 text-warning" id="toggleConfirmMotPasse"></i>
        <div id="confirmMotPasseError" class="error bg-warning text-secondary rounded"></div>

      </div>

      <div class="p-3 civilite col-sm-12">
        <label for="civility" class="form-label text-warning">Civilite</label>
        <select name="civility" id="civility" class="form-select rounded-pill input-custom">
          <option value="" selected>--- Choisir une option ---</option>
          <option value="femme">Femme</option>
          <option value="homme">Homme</option>
          <option value="autre">Autre</option>
        </select>
        <div id="civilityError" class="error bg-warning text-secondary rounded"></div>
      </div>
    


     

      <div class="p-3 inputs col-sm-12">
        <label for="ville" class="form-label text-warning">Ville</label>
        <input type="text" class="form-control rounded-pill input-custom" id="ville" name="ville">
        <div id="villeError" class="error bg-warning text-secondary rounded"></div>
      </div>

      </div>
      <!-- bouton pour envoier les dones d'inscription -->
      <div>
        <button type="submit" class="btn btn-warning text-danger rounded-start ms-4 bouton">Registre</button>
      </div>
    </form>
  </section>

</main>

<?php
require_once "inc/footer.inc.php";
?>