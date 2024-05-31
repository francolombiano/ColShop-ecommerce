<?php
require_once "inc/functions.inc.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $_POST['email'];
  // Verifier si l'email exist deja
  $resultat = checkEmailUser($email);
  if ($resultat) {
    // Si l'email existe déjà, rediriger l'utilisateur vers la page authentification.php.
    // echo "El email ya existe. Por favor, elija otro email";
    header("Location: authentification.php");
    exit;
  } else {
    // Si l'adresse électronique n'existe pas dans la base de données, poursuivez la procédure d'enregistrement. 
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

<main class="bg-register">
  <!-- Image d'en-tête pour site register -->
  <section class="affiche-inscription">
    <div class="text-center text-white col-sm-12">
      <h1 class="titre-3 display-3">Registre!</h1>
      <i class="bi bi-chevron-down down"></i>
    </div>
  </section>

  <!-- Formulaire de registre -->
  <!-- Ojo revisar poraue no funciona -->

  <section class="ecrivez-nous p-5">

    <form id="form1" action="register.php" method="POST" class="w-50 mx-auto p-3 rounded-5 formV border p-5 col-sm-12 col-md-8">

      <div class="p-3 inputs col-sm-12">
        <label for="nom" class="form-label">Nom complet</label>
        <input type="text" class="form-control rounded-pill input-custom" id="nom" name="nom" placeholder="Inscrivez ici votre nom complet">
        <div id="nomError" class="error"></div>
        <span class="inputError"></span>
      </div>

      <div class="p-3 inputs col-sm-12">
        <label for="telephone" class="form-label">Téléphone</label>
        <input type="number" class="form-control rounded-pill input-custom" id="telephone" name="telephone" placeholder="Inscrivez ici votre numéro de téléphone">
        <div id="telephoneError" class="error"></div>
        <span class="inputError"></span>
      </div>

      <div class="p-3 inputs col-sm-12">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control rounded-pill input-custom" id="email" name="email" placeholder="Inscrivez ici votre email">
        <div id="emailError" class="error"></div>
        <span class="inputError"></span>
      </div>

      <div class="p-3 inputs col-sm-12">
        <label for="motPasse" class="form-label">Mot de passe</label>
        <input type="password" class="form-control rounded-pill input-custom" id="motPasse" name="motPasse" placeholder="Inscrivez ici votre Mot de Passe">
        <i class="bi bi-eye-slash ms-3 iconeye" id="toggleMotPasse"></i>
        <div id="motPasseError" class="error"></div>
        
      </div>

      <div class="p-3 inputs col-sm-12">
        <label for="confirmMotPasse" class="form-label">Confirmer mot de passe</label>
        <input type="password" class="form-control rounded-pill input-custom" id="confirmMotPasse" name="confirmMotPasse" placeholder="Inscrivez ici votre Mot de Passe encore">
        <i class="bi bi-eye-slash ms-3 iconeye1" id="toggleConfirmMotPasse"></i>
        <div id="confirmMotPasseError" class="error"></div>

      </div>

      <div class="p-3 civilite col-sm-12">
        <label for="civility" class="form-label">Civilite</label>
        <select name="civility" id="civility" class="form-select rounded-pill input-custom">
          <option value="" selected>--- Choisir une option ---</option>
          <option value="femme">Femme</option>
          <option value="homme">Homme</option>
          <option value="autre">Autre</option>
        </select>
        <div id="civilityError" class="error"></div>
      </div>

      <div class="p-3 inputs col-sm-12">
        <label for="ville" class="form-label">Ville</label>
        <input type="text" class="form-control rounded-pill input-custom" id="ville" name="ville">
        <div id="villeError" class="error"></div>
      </div>

      </div>
      <!-- bouton pour envoier les dones d'inscription -->
      <div>
        <button type="submit" class="btn btn-outline-dark rounded-start ms-4 bouton">Registre</button>
      </div>
    </form>
  </section>

</main>

<?php
require_once "inc/footer.inc.php";
?>