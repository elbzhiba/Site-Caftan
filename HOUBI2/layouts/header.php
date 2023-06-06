<?php require $_SERVER['DOCUMENT_ROOT'].'/HOUBI2/inc/function.php'; ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Houbi Caftan</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="./assets/css/bootstrap" rel="stylesheet" />
        <link href="./assets/css/style.css" rel="stylesheet" /> 
        
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light py-3 bg-custom">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="index.php">Houbi Caftan</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="apropos.php">A propos</a></li>
                    </ul>
                    <?php if(!is_connected()) { ?>
                    <a class="btn btn-outline-dark" href="inscription.php" >
                    <i class="bi bi-person-plus-fill"></i>
                            S'inscrire
                    </a>
                   
                    <?php } ?>

                    <?php if(!is_connected()) { ?>
                        <a class="btn btn-outline-dark" href="connexion.php" >
                        <i class="bi bi-box-arrow-in-right"></i>
                                Se connecter
                        </a>
                    <?php } ?>
                    <?php if(is_connected()) { ?>
                        <a class="btn btn-outline-dark" href="account.php" >
                        <i class="bi bi-person-circle"></i> <?php echo $_SESSION["login"] ?>
                            
                        </a>
                    <?php } ?>
                    <a class="btn btn-outline-dark" href="logout.php">
                        <i class="bi bi-door-closed"></i> Déconnexion
                        </a>
                        <a href ="cart.php" class="btn btn-outline-dark" >
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <span class="badge bg-dark text-white ms-1 rounded-pill"><?php if(!empty($_SESSION['cart'])){ 
                             echo count($_SESSION['cart'] );
                             } else{echo'0';
                                }?></span>
                    </a>

                </div>
            </div>
        </nav>