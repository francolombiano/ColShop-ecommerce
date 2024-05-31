<?php
require_once "inc/functions.inc.php";

$info = '';

if (!empty($_POST)) {
    // debug($_POST);
    $verif = true;
    foreach ($_POST as $value) {

        if (empty($value)) {

            $verif = false;
        }
    }

    if (!$verif) {
        // debug($_POST);

        $info = alert("Veuillez renseigner tout les champs", "danger");
    } else {
        // debug($_POST);
        if (isset($_POST['email']) && isset($_POST['motPasse'])) {
            $email = $_POST['email'];
            $motPasse = $_POST['motPasse'];

            $user = checkUser($email, $motPasse);
            // debug($user);

            if ($user) {

                if (password_verify($motPasse, $user['motPasse'])) {

                    $_SESSION['user'] = $user;

                    header("location:" . RACINE_SITE . "profil.php");
                } else {
                    $info = alert("Les identifiants sont incorrectes", "danger");
                }
            } else {
                $info = alert("Les identifiants sont incorrectes", "danger");
            }
        }
    }
}

$title = "Authentification";
require_once "inc/header.inc.php";
?>

<main class="bg-authentification">
    <!-- Image d'en-tête authentification -->
    <section class="affiche-authentification">
        <div class="text-center text-dark col-sm-12">
            <h1 class="titre-4 display-3 p-5">Se connecter!</h1>
            <i class="bi bi-chevron-down down"></i>
        </div>
    </section>

    <!-- Formulaire de authentification -->
    <!-- <div id="enrigestrement-reusi" class="error"></div> -->
    <section class="authentification-users p-5">

        <?php
        echo $info;
        // var_dump($info)
        ?>

        <form id="form-authetification" action="" method="POST" class="w-50 mx-auto p-3 text-dark rounded-5 formV border p-5 col-sm-12 col-md-8">

            <div class="p-3 inputs col-sm-12">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control rounded-pill input-custom" id="email" name="email">
                <div id="emailError" class="error"></div>
                <span class="inputError"></span>
            </div>

            <div class="p-3 inputs col-sm-12">
                <label for="motPasse" class="form-label">Mot de passe</label>
                <input type="password" class="form-control rounded-pill input-custom" id="motPasse" name="motPasse">
                <i class="bi bi-eye-slash ms-3 iconeye" id="toggleMotPasse"></i>
                <div id="passwordError" class="error"></div>
            </div>

            <!-- bouton pour envoier les donees de authentification -->
            <div>
                <button type="submit" class="btn btn-outline-dark rounded-start ms-4 bouton">Je me connecte</button>
            </div>

        </form>

    </section>


    <?php
    require_once "inc/footer.inc.php";
    ?>