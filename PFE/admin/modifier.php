<?php
session_start();
if(!isset($_SESSION['aDmjhguhjvjhjjhh']))
{
    header("Location: ../admin/connexion.php");
}
if(empty($_SESSION['aDmjhguhjvjhjjhh']))
{
    header("Location: ../admin/connexion.php");
}

if (!isset($_GET['sup'])){
    header("Location: ../admin/index.php");
  }
if (empty ($_GET['sup']) AND !is_numeric($_GET['sup'])){
    header("Location: ../admin/index.php");
  }
$id = $_GET['sup'];
    
require("../config/commandes.php");

$cars = getcar ($id);

foreach($cars as $car){
    $image = $car->image;
    $nom = $car->nom;
    $prix = $car->prix;
    $quant = $car->quantite;
    $desc = $car->description;
}



if(isset($_POST['valider']))
{
    if(isset($_POST['image']) AND isset($_POST['nom']) AND isset($_POST['prix']) AND isset($_POST['quantite'])
     AND isset($_POST['description']))
    {
    if(!empty($_POST['image']) AND !empty($_POST['nom']) AND !empty($_POST['prix']) AND !empty($_POST['quantite'])
     AND !empty($_POST['description']))
    {
        $image = htmlspecialchars(strip_tags($_POST['image']));
        $nom = htmlspecialchars(strip_tags($_POST['nom']));
        $prix = htmlspecialchars(strip_tags($_POST['prix']));
        $quant = htmlspecialchars(strip_tags($_POST['quantite']));
        $desc = htmlspecialchars(strip_tags($_POST['description']));
        try{
        modifier ($image, $nom, $prix, $quant, $desc, $id);
        header("Location:../admin/index.php");
        }
        catch (Exception $e)
        {
            $e->getMessage();
        }
    }
    }
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="
    stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
    crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="
    sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <title>Modifier</title>

</head>
<body>
    
<header data-bs-theme="dark">

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Modifier</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../admin/index.php">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../admin/demande.php" style="font-weight:blod"> Commandes</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Fonction
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="../admin/demande.php" style="font-weight:blod">Commandes</a></li>
            <li><a class="dropdown-item" href="../admin/ajoute.php" style="font-weight:blod">Ajoute une Voiture</a></li>
            <li><a class="dropdown-item" href="../admin/inscription.php">Ajoute un Administrateur</a></li>
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



<div class="album py-5 bg-body-tertiary">
<div class="container">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

        <form method="POST">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">L'image</label>
            <input type="name" class="form-control" name="image" value="<?= $image; ?>" required>
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Nom de la voiture</label>
            <input type="name" class="form-control" name="nom" value="<?= $nom; ?>" required>
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Prix</label>
            <input type="number" class="form-control" name="prix" value="<?= $prix; ?>" required>
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Quantité</label>
            <input type="number" class="form-control" name="quantite" value="<?= $quant; ?>" required>
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Déscription</label>
            <textarea <?php ob_start(); ?> class="form-control" name="description" value= "" required><?= substr($desc, 0, 100); ?></textarea>
        </div>


        <button type="submit" name="valider" class="btn btn-primary">Enregister</button>
        </form>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div>
          <img <?php ob_start(); ?>src="<?= $car->image; ?>" alt=""style="width: 170%">
        </div>
    </div>
</div>

</div>


</body>
</html>

