<?php
require_once "inc/functions.inc.php";







$title = "Registre";
require_once "inc/header.inc.php";
?>

<main class="bg-register">
<!-- Image d'en-tête contactez-nous -->   
<section class="affiche-inscription">
            <div class="text-center text-white col-sm-12">
                 <h1 class="titre-3 display-3">Registre!</h1> 
                 <i class="bi bi-chevron-down down"></i>
            </div>
        </section>

<!-- Formulaire de contact -->
<div id="enrigestrement-reusi" class="error"></div>
<section class="ecrivez-nous p-5">



<form id="form" action="register.php" method="POST" class="w-50 mx-auto p-3 text-white rounded-5 formV border p-5 col-sm-12 col-md-8">
  
  <div class="p-3 inputs col-sm-12">
      <label for="prenom" class="form-label">Prenom</label>
      <input type="text" class="form-control rounded-pill input-custom" id="prenom" name="prenom">
      <div id="prenomError" class="error"></div>
      <span class="inputError"></span>
  </div>

  <div class="p-3 inputs col-sm-12">
      <label for="nom" class="form-label">Nom</label>
      <input type="text" class="form-control rounded-pill input-custom" id="nom" name="nom">
      <div id="nomError" class="error"></div>
      <span class="inputError"></span>
  </div>
  

  <div class="p-3 inputs col-sm-12"> 
  <label for="tel" class="form-label">Téléphone</label> 
  <input type="number" class="form-control rounded-pill input-custom" id="tel" name="tel"> 
  <div id="telephoneError" class="error"></div>
  <span class="inputError"></span> 
</div>

  <div class="p-3 inputs col-sm-12">
      <label for="email" class="form-label">Email</label>
      <input type="text" class="form-control rounded-pill input-custom" id="email" name="email">
      <div id="emailError" class="error"></div>
      <span class="inputError"></span>
  </div>

  <div class="p-3 inputs col-sm-12">
        <label for="password" class="form-label">Mot de passe</label> 
        <input type="password" class="form-control rounded-pill input-custom" id="password" name="password">
        <i class="bi bi-eye-slash ms-3 iconeye" id="togglePassword"></i>
        <div id="passwordError" class="error"></div>
        <!-- <span class="inputError"></span> -->
       
  </div>

  <div class="p-3 inputs col-sm-12">
        <label for="confirmPassword" class="form-label">Confirmer mot de passe</label> 
        <input type="password" class="form-control rounded-pill input-custom" id="confirmPassword" name="confirmPassword">
        <i class="bi bi-eye-slash ms-3 iconeye1" id="toggleConfirmPassword"></i>
        <div id="confirmPwdError" class="error"></div>
        <!-- <span class="inputError"></span> -->
  </div>

  <div class="p-3 civilite col-sm-12">
                            <label for="choice" class="form-label">Civilite</label>
                            <select name="choice" id="choice" class="form-select rounded-pill input-custom">
                                <option value="" selected>--- Choisir une option ---</option>
                                <option value="femme">Femme</option>
                                <option value="homme">Homme</option>
                                <option value="autre">Autre</option>
                            </select>
                            <div id="choiceError" class="error"></div> 
                        </div>

<div class="p-3 inputs col-sm-12"> 
  <label for="cpostal" class="form-label">Code postal</label> 
  <input type="number" class="form-control rounded-pill input-custom" id="cpostal" name="cpostal">
  <div id="cpostalerror" class="error"></div>  
  <span class="inputError"></span> 
</div>

<div class="p-3 inputs col-sm-12"> 
  <label for="ville" class="form-label">Ville</label> 
  <input type="text" class="form-control rounded-pill input-custom" id="ville" name="ville"> 
  <div id="villerror" class="error"></div>  
  <span class="inputError"></span> 
</div>

<div class="p-3 inputs col-sm-12"> 
  <label for="ville" class="form-label">Pays</label> 
  <input type="text" class="form-control rounded-pill input-custom" id="pays" name="pays"> 
  <div id="payserror" class="error"></div>  
  <span class="inputError"></span> 
</div>

<!-- bouton -->
  <button type="submit" class="btn btn-outline-dark rounded-start ms-4 bouton">Registre</button>
  <!-- </div> -->
</form>
</section>



<?php
require_once "inc/footer.inc.php";

?>
