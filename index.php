
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Link for google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100..900&display=swap" rel="stylesheet">
    <!-- link for Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- link for Bootstrap icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <!-- Link for CSS -->
    <link rel="stylesheet" href="./assets/style/style.css">
    <title>Accueil</title>
</head>

<body>
    <header class="container-fluid">
        <section class="en-tete row">
            <!-- Navbar --> <!-- Logo -->
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <a class="navbar-brand col-sm-12 col-md-1 p-2" href="#">
                        <img src="./assets/img/logo.png" class="img-rounded" alt="Logo" height="100">
                    </a>
                    <!-- Menu Navigation -->
                    <ul class="navbar-nav col-sm-12 d-flex col-md-8 mx-auto">
                        <li class="nav-item p-1">
                            <a class="nav-link text-menu" href="./index.php">ACCUEIL</a>
                        </li>
                        <li class="nav-item p-1">
                            <a class="nav-link text-menu" href="#">LES LIVRES</a>
                        </li>
                        <li class="nav-item p-1">
                            <a class="nav-link text-menu" href="#">A PROPOS</a>
                        </li>
                        <li class="nav-item p-1">
                            <a class="nav-link text-menu" href="#">PAIEMENT SECURISE</a>
                        </li>
                        <li class="nav-item p-1">
                            <a class="nav-link text-menu" href="#">EXPEDITION ET RETOUR</a>
                        </li>
                        <li class="nav-item p-1">
                            <a class="nav-link text-menu" href="./contactez_nous.php">CONTACT NOUS</a>
                        </li> 
                    </ul>
                    <!-- button Registre -->
                    <button type="button" class="btn btn-warning btn-sm d-flex col-12 col-md-1 btn-registre text-center">Register</button>
                    <!-- button pur se conecter -->
                    <button type="button" class="btn btn-warning btn-sm d-flex col-12 col-md-1 btn-login text-center">Se connecter</button>
                        <!-- Cart -->
                        <a class="nav-link mx-auto" class= "col-sm-12 col-md-1 d-flex" href="#">
                            <i class="bi bi-cart-fill col-sm-12 col-md-1 display-5 text-warning"></i>
                        </a>  
                </div>
        </section>
        <!-- title -->
    </header>


    <main>
        <!--image de fond  -->
        <div class="affiche p-5"><br><br><br><br><br>
            <div class="site-name text-center col-sm-12 col-md-12 p-5"><br><br><br><br><br><br>
                <h1 class="display-4 text-danger p-5">ColShop La colombie en la France!</h1> 
             </div> 
        </div> 

        <!-- introductory phrase -->
        <div class="phrase text-center mx-auto p-5 d-sm-none d-lg-block col-md-8">
            <h3>Acheter des livres n'est pas une dépense, c'est un investissement qui libère l'esprit, le corps et
                réjouit l'âme.</h3>
        </div>
        <!-- products to market -->
        <section class="container-fluid produits">
            <div class="container-fluid livres col-sm-12 p-3">
                <div class="row justify-content-center">
                    <article class="col-sm-12 col-md-4">
                        <div>
                            <figure>
                                <img src="./assets/img/livre1.jpg" alt="">
                                <div class="pretitre">
                                    <h3>LIFESTYLE</h3>
                                </div>
                                <div class="titre">
                                    <h2>More than just a music festival</h2>
                                </div>
                                <figcaption>Morbi vitae arcu id libero hendrerit congue.
                                    Phasellus mattis volutpat finibus. Nam tellus metus, sollicitudin
                                    id lacinia vel, scelerisque vitae ligula. Nulla eu lobortis nisl.
                                    Nulla eu leo a mi dignissim vestibulum. Morbi sit amet massa bibendum,
                                </figcaption>
                            </figure>
                        </div>
                    </article>

                    <article class="col-sm-12 col-md-4">
                        <div>
                            <figure>
                                <img src="./assets/img/livre2.jpg" alt="">
                                <div class="pretitre">
                                    <h3>LIFESTYLE</h3>
                                </div>
                                <div class="titre">
                                    <h2>Life tastes better with coffee</h2>
                                </div>
                                <figcaption>Morbi vitae arcu id libero hendrerit congue.
                                    Phasellus mattis volutpat finibus. Nam tellus metus, sollicitudin
                                    id lacinia vel, scelerisque vitae ligula. Nulla eu lobortis nisl.
                                    Nulla eu leo a mi dignissim vestibulum. Morbi sit amet massa bibendum,
                                </figcaption>
                            </figure>
                        </div>
                    </article>

                    <article class="col-sm-12 col-md-4">
                        <div>
                            <figure>
                                <img src="./assets/img/livre3.jpg" alt="">
                                <div class="pretitre">
                                    <h3>LIFESTYLE</h3>
                                </div>
                                <div class="titre">
                                    <h2>Life tastes better with coffee</h2>
                                </div>
                                <figcaption>Morbi vitae arcu id libero hendrerit congue.
                                    Phasellus mattis volutpat finibus. Nam tellus metus, sollicitudin
                                    id lacinia vel, scelerisque vitae ligula. Nulla eu lobortis nisl.
                                    Nulla eu leo a mi dignissim vestibulum. Morbi sit amet massa
                                </figcaption>
                            </figure>
                        </div>
                    </article>

                    <article class="col-sm-12 col-md-4">
                        <div>
                            <figure>
                                <img src="./assets/img/livre4.jpg" width="150" alt="">
                                <div class="pretitre">
                                    <h3>LIFESTYLE</h3>
                                </div>
                                <div class="titre">
                                    <h2>Life tastes better with coffee</h2>
                                </div>
                                <figcaption>Morbi vitae arcu id libero hendrerit congue.
                                    Phasellus mattis volutpat finibus. Nam tellus metus, sollicitudin
                                    id lacinia vel, scelerisque vitae ligula. Nulla eu lobortis nisl.
                                    Nulla eu leo a mi dignissim vestibulum. Morbi sit amet massa
                                </figcaption>
                            </figure>
                        </div>
                    </article>

                    <article class="col-sm-12 col-md-4">
                        <div>
                            <figure>
                                <img src="./assets/img/livre1.jpg" alt="">
                                <div class="pretitre">
                                    <h3>LIFESTYLE</h3>
                                </div>
                                <div class="titre">
                                    <h2>Life tastes better with coffee</h2>
                                </div>
                                <figcaption>Morbi vitae arcu id libero hendrerit congue.
                                    Phasellus mattis volutpat finibus. Nam tellus metus, sollicitudin
                                    id lacinia vel, scelerisque vitae ligula. Nulla eu lobortis nisl.
                                    Nulla eu leo a mi dignissim vestibulum. Morbi sit amet massa
                                </figcaption>
                            </figure>
                        </div>
                    </article>

                    <article class="col-sm-12 col-md-4">
                        <div>
                            <figure>
                                <img src="./assets/img/livre2.jpg" alt="">
                                <div class="pretitre">
                                    <h3>LIFESTYLE</h3>
                                </div>
                                <div class="titre">
                                    <h2>Life tastes better with coffee</h2>
                                </div>
                                <figcaption>Morbi vitae arcu id libero hendrerit congue.
                                    Phasellus mattis volutpat finibus. Nam tellus metus, sollicitudin
                                    id lacinia vel, scelerisque vitae ligula. Nulla eu lobortis nisl.
                                    Nulla eu leo a mi dignissim vestibulum. Morbi sit amet massa
                                </figcaption>
                            </figure>
                        </div>
                    </article>

                    <article class="col-sm-12 col-md-4">
                        <div>
                            <figure>
                                <img src="./assets/img/livre3.jpg" alt="">
                                <div class="pretitre">
                                    <h3>LIFESTYLE</h3>
                                </div>
                                <div class="titre">
                                    <h2>Life tastes better with coffee</h2>
                                </div>
                                <figcaption>Morbi vitae arcu id libero hendrerit congue.
                                    Phasellus mattis volutpat finibus. Nam tellus metus, sollicitudin
                                    id lacinia vel, scelerisque vitae ligula. Nulla eu lobortis nisl.
                                    Nulla eu leo a mi dignissim vestibulum. Morbi sit amet massa
                                </figcaption>
                            </figure>
                        </div>
                    </article>

                    <article class="col-sm-12 col-md-4">
                        <div>
                            <figure>
                                <img src="./assets/img/livre4.jpg" alt="">
                                <div class="pretitre">
                                    <h3>LIFESTYLE</h3>
                                </div>
                                <div class="titre">
                                    <h2>Life tastes better with coffee</h2>
                                </div>
                                <figcaption>Morbi vitae arcu id libero hendrerit congue.
                                    Phasellus mattis volutpat finibus. Nam tellus metus, sollicitudin
                                    id lacinia vel, scelerisque vitae ligula. Nulla eu lobortis nisl.
                                    Nulla eu leo a mi dignissim vestibulum. Morbi sit amet massa
                                </figcaption>
                            </figure>
                        </div>
                    </article>

                    <article class="col-sm-12 col-md-4">
                        <div>
                            <figure>
                                <img src="./assets/img/livre1.jpg" alt="">
                                <div class="pretitre">
                                    <h3>LIFESTYLE</h3>
                                </div>
                                <div class="titre">
                                    <h2>Life tastes better with coffee</h2>
                                </div>
                                <figcaption>Morbi vitae arcu id libero hendrerit congue.
                                    Phasellus mattis volutpat finibus. Nam tellus metus, sollicitudin
                                    id lacinia vel, scelerisque vitae ligula. Nulla eu lobortis nisl.
                                    Nulla eu leo a mi dignissim vestibulum. Morbi sit amet massa
                                </figcaption>
                            </figure>
                        </div>
                    </article>

                </div>
            </div>
        </section>
    </main>

    <footer>
        <section class="final d-flex">
            <div class="marque col-6">
                <div class="retrait col-12 d-flex p-4">
                    <a class="sm col-12 col-md-4 logo-retrait" href="#">
                        <img src="./assets/img/logo_livres.png" alt="Logo" height="150">
                    </a>
                    <div class="texte-final col-sm-12 col-md-6 text-white">
                        <h3>Livres pour tous!</h3>
                    </div>
                </div>

                <div class="reseaux col-12 pb-3">
                    <i class="bi bi-instagram display-6 p-3 text-white"></i>
                    <i class="bi bi-facebook display-6 p-3 text-white"></i>
                    <i class="bi bi-twitter-x display-6 p-3 text-white"></i>
                </div>
            </div>

            <div class="donees col-sm-12 col-md-6 pt-4 text-white">
                <h4>Informations sur le magasin</h4>
                <i class="bi bi-geo-alt-fill"></i>
                <p>LIVRES POUR TOUS, 10 rue de terrage, 75010. Paris-France</p>
                <i class="bi bi-telephone-fill"></i>
                <p>Attention au client: 605 235 698</p>
                <i class="bi bi-envelope-at-fill"></i>
                <p>e-mail: Livrespourtous@gmail.com</p>
            </div>
        </section>

    </footer>

    <!--Lien pour script de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <!-- lien vers son propre script -->
<script src="../Foodies/assets/js/script.js"></script>
</body>

</html>
