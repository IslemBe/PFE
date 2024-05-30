<?php
if(!isset($_SESSION)){
session_start();
}
require("../config/connexion.php");

if(!isset($_SESSION['aDmjhguhjvjhjjhh']))
{
    header("Location: ../admin/connexion.php");
}
if(empty($_SESSION['aDmjhguhjvjhjjhh']))
{
    header("Location: ../admin/connexion.php");
}



if(isset($_POST['valider']))
{
    if (!empty($_POST['name']) AND !empty($_POST['prenom']) AND !empty($_POST['email']) AND !empty($_POST['password'])){
        $nom = htmlspecialchars($_POST['name']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $email = htmlspecialchars($_POST['email']);
        $mdp = sha1($_POST['password']);
        if (strlen($mdp <7)) {
            echo "<strong style='color:red;'>Votre mot de passe est trop court.</strong>";
        }elseif(strlen($nom)>18 || strlen($prenom)>18){
            echo "<strong style='color:red;'>Votre nom ou prénom est trop long.</strong>";
        }else{
            $testmail=$access->prepare("SELECT * FROM users WHERE email=?");
            $testmail->execute(array($email));
            $controlmail= $testmail->rowCount();
            if ($controlmail==0){
                $inscreption=$access->prepare("INSERT INTO users (name, prenom, email, password) VALUES (?,?,?,?)");
                $inscreption->execute(array($nom, $prenom, $email, $mdp));
                echo "<strong style='color:red;'>votre compte a bien été créé.</strong>";
            }else{
                echo "<strong style='color:red;'>Désolé mais cette addresse existe déja.</strong>";
            }
            
        }
    }else{
        echo "<strong style='color:red;'>Remplissez tous les champs.</strong>";
    }

}

?>



<!DOCTYPE html>
<html lang="fr">

<head><script src="/docs/5.3/assets/js/color-modes.js"></script>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
<meta name="generator" content="Hugo 0.122.0">

<title>inscription</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="
stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="
sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

</head>

<header data-bs-theme="dark">

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Ajouter un Administrateur</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../admin/index.php">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../admin/demande.php" style="font-weight:blod">Commandes</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Fonction
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="../admin/demande.php" style="font-weight:blod">Commandes</a></li>
            <li><a class="dropdown-item" href="../admin/ajoute.php">Ajoute une Voiture</a></li>
            <li><a class="dropdown-item" href="../admin/inscription.php" style="font-weight:blod">Ajoute un Administrateur</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="../admin/archive.php">Archive</a></li>
            <li><a class="dropdown-item" href="../admin/logout.php">Déconnecter</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-disabled="true"href="../admin/logout.php">Déconnecter</a>
        </li>
      </ul>
      
    </div>
  </div>
</nav>

</header>






<body class="bg-light">
    <div class="container ">
        <div class="row mt-5">
            <div class="col-lg-4 bg-white m-auto rounded-top">
                <h2 class="text-center"> Inscription</h2>
                <p class="text-center text-muted lead"> Juste pour l'administration </p>

                <form method="POST" action="">
                    <div class="input-group  mb-3">
                        <span class="input-group-text">
                            <i class="fa fa-user">
                            </i> 
                        </span>
                        <input type="text" name="name" class="form-control" placeholder="Nom ">
                    </div>
                    <div class="input-group  mb-3">
                        <span class="input-group-text">
                            <i class="fa fa-user">
                            </i> 
                        </span>
                        <input type="text" name="prenom" class="form-control" placeholder="Prénom ">
                    </div>
                    <div class="input-group  mb-3">
                        <span class="input-group-text">
                            <i class="fa fa-envelope">
                            </i> 
                        </span>
                        <input type="email" name="email" class="form-control" placeholder="Email ">
                    </div>
                    <div class="input-group  mb-3">
                        <span class="input-group-text">
                            <i class="fa fa-lock">
                            </i> 
                        </span>
                        <input type="password" name="password" class="form-control" placeholder="Mot de passe ">
                    </div>
                    <div class="d-grid">
                        <button type="buton" name="valider" class="btn btn-success">S’inscrire</button>
                        <p class="text-center text-muted mt-3">
<i style="color:red">
<?php
    if(isset($message))
    {
        echo $message ,"</br>";
    }
?></i>
                            En cliquant sur S’inscrire, vous acceptez nos <a href="#">  Conditions générales</a>, notre <a href=""> Politique de confidentialité </a> et notre <a href="#">  Politique d’utilisation</a> des cookies. 
                        </p>
                        <p class="text-center">
                             Avez vous déjà un compte ?<a href="../admin/connexion.php"> Connexion </a>
                        </p>
                    </div>
                </form>

            </div>
        </div>
    </div>
    
</body>
</html> 
