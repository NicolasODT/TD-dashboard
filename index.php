<?php
    // code PHP ici...
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
                                <a class="nav-link active" aria-current="page" href="./">Accueil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="register.php">Créer un compte</a>
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
            <!-- Mon tableau de bord -->
            <div class="row">
                <div class="col-12">
                    <h1 class="h3">Mon tableau de bord !</h1>
                </div>
            </div>
        </main>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    </body>
</html>