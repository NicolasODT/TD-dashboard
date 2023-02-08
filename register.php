<?php
    // isset() permet de vérifier qu'une variable est initialisée (is set)
    // retourne un booléen :
    // - vrai/true si la variable a été initialisée (et existe donc)
    // - faux/false dans le cas contraire
    // Nous testons ici successivement les trois champs obligatoires
    if (isset($_POST["email"]) && isset($_POST["password1"]) && isset($_POST["password2"])) {
        // Les deux mots de passes sont identiques ?
        if ($_POST["password1"] == $_POST["password2"]) {
            // Si les deux mots de passes sont bien identiques,
            // nous pouvons continuer ...
            $email = $_POST["email"];

            // Il n'est absolument pas nécessaire de stocker
            // le mot de passe de confirmation
            $password = $_POST["password1"];
            // A remplacer pour hasher le mot de passe par:
            $options = [
                'cost' => 12,
            ];
            $password = password_hash($_POST["password1"], PASSWORD_BCRYPT, $options);

            // Traitement des données facultatives du formulaire
            // Cette façon de faire est vraiment simpliste et mal vue
            if (isset($_POST["first-name"])) {
                $firstName = $_POST["first-name"];
            } else {
                $firstName = "";
            }
            
            if (isset($_POST["last-name"])) {
                $lastName = $_POST["last-name"];
            } else {
                $lastName = "";
            }

            /** Nous pouvons maintenant stocker les données en base de données */ 

            // Connexion à la base de données
            $dsn = "mysql:host=localhost;port=3306;dbname=dashboard;charset=utf8";
            $dbUser = "root";
            $dbPassword = "";
            $lienDB = new PDO($dsn, $dbUser, $dbPassword);

            // Requête SQL
            $sql = "INSERT INTO users (email, hash_pwd, first_name, last_name) VALUES ('$email', '$password', '$firstName', '$lastName');";
            // devient, notez la disparition des guillemets simples
            $sql = "INSERT INTO users (email, hash_pwd, first_name, last_name) VALUES (:email, :password, :first_name, :last_name);";
            
            // Préparer la requête
            $query = $lienDB-> prepare($sql);

            // Liaison des paramètres de la requête préparée
            $query-> bindParam(":email", $email, PDO::PARAM_STR);
            $query-> bindParam(":password", $password, PDO::PARAM_STR);
            $query-> bindParam(":first_name", $firstName, PDO::PARAM_STR);
            $query-> bindParam(":last_name", $lastName, PDO::PARAM_STR);

            // Exécution de la requête
            if ($query-> execute()) {
                echo "<p>Le compte a bien été créé</p>";
            } else {
                echo "<p>Une erreur s'est produite</p>";
            }


        } else {
            // Les deux mots de passes saisis sont différents
            echo "<p>mots de passe différents</p>";
        }
    } else {
        //echo "<p>Champs obligatoires absents</p>";
    }
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard - Créez votre compte</title>

        <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
        
        <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
        
        <link rel="stylesheet" href="css/main.css">
        <script src="js/app.js" defer></script>
    </head>
    <body>
        <header class="container-fluid bg-dark text-white py-2">
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="./">Dashboard Project</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navigation">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="./">Accueil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="register.php">Créer un compte</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="login.php">Se connecter</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        
        <main class="container py-5">
            <!-- Formulaire de création de compte -->
            <div class="row">
                <div class="col-12">
                    <h1 class="h3">Créez votre compte !</h1>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-6">
                    <form action="" method="post">
                        <div class="form-group mb-3">
                            <input type="email" name="email" id="email" class="form-control"
                            placeholder="Votre adresse email *" required>
                        </div>

                        <div class="form-group mb-3">
                            <input type="password" name="password1" id="password1" class="form-control"
                            placeholder="Entrez un mot de passe *" required>
                        </div>

                        <div class="form-group mb-3">
                            <input type="password" name="password2" id="password2" class="form-control"
                            placeholder="Confirmez le mot de passe *" required>
                        </div>

                        <div class="form-group mb-3">
                            <input type="text" name="first-name" id="first-name" class="form-control"
                            placeholder="Entrez votre prénom">
                        </div>

                        <div class="form-group mb-3">
                            <input type="text" name="last-name" id="last-name" class="form-control"
                            placeholder="Entrez votre nom">
                        </div>

                        <div class="form-group mb-3">
                            <button class="btn btn-dark w-100">Créer !</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    </body>
</html>