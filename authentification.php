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
            // la function checkUser verifie si l'email et le mdp exist sur la BBD apres il verifie le hash du le moot de pase sur la BDD

            if ($user) {

                if (password_verify($motPasse, $user['motPasse'])) {
                // password_verify, verifie si le motPasse c'est le meme avec le has sur la BDD
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
// Le « else » à la fin du code est répété parce qu'il y a deux conditions dans le « if » qui peuvent générer le même résultat en termes d'affectation de la variable $info. Il est répété pour l'adresse électronique et le mot de passe
// motPasse est le mot de passe saisi par l'utilisateur.$user['motPasse'] est le hachage du mot de passe stocké dans la base de données pour l'utilisateur en question.La fonction password_verify renvoie un message vrai si le mot de passe correspond au hachage stocké, et un message faux dans le cas contraire.


$title = "Authentification";
require_once "inc/header.inc.php";
?>

<main>
    <section class="titre-authentification">
        <div class="text-center col-sm-12">
            <h1 class="display-5 text-secondary p-3">Se connecter!</h1>
            <i class="bi bi-chevron-down down text-danger display-3"></i>
        </div>
    </section>

    <!-- Formulaire de authentification -->
    <!-- <div id="enrigestrement-reusi" class="error"></div> -->
    <section class="authentification-users bg-light p-5">

        <?php
        echo $info;
        // var_dump($info)
        ?>

        <form id="form-authetification" action="" method="POST" class="w-50 mx-auto p-3 bg-primary rounded-5 formV border p-5 col-md-8">

            <div class="p-3 inputs col-sm-12">
                <label for="email" class="form-label text-warning">Email</label>
                <input type="text" class="form-control rounded-pill input-custom" id="email" name="email">
                <div id="emailError" class="error"></div>
                <span class="inputError"></span>
            </div>

            <div class="p-3 inputs col-sm-12">
                <label for="motPasse" class="form-label text-warning">Mot de passe</label>
                <input type="password" class="form-control rounded-pill input-custom" id="motPasse" name="motPasse">
                <i class="bi bi-eye-slash ms-3 iconeye text-warning" id="toggleMotPasse"></i>
                <div id="passwordError" class="error"></div>
            </div>

            <!-- bouton pour envoier les donees de authentification -->
            <div>
                <button type="submit" class="btn btn-warning text-danger rounded-start ms-4 bouton">Je me connecte</button>
            </div>

        </form>

    </section>


    <?php
    require_once "inc/footer.inc.php";
    ?>