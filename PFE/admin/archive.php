<?php
session_start();

if(!isset($_SESSION['aDmjhguhjvjhjjhh']))
{
    header("Location: connexion.php");
}
if(empty($_SESSION['aDmjhguhjvjhjjhh']))
{
    header("Location: connexion.php");
}

require("../config/commandes.php");

$archive= archiveVend();

?>

<!doctype html>
<html lang="fr">
    <head><script src="/docs/5.3/assets/js/color-modes.js"></script>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.122.0">

        <title>Bahloul Auto</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="
        stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
        crossorigin="anonymous">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="
        sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>


        <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
            font-size: 3.5rem;
            }
        }

        .b-example-divider {
            width: 100%;
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        .btn-bd-primary {
            --bd-violet-bg: #712cf9;
            --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

            --bs-btn-font-weight: 600;
            --bs-btn-color: var(--bs-white);
            --bs-btn-bg: var(--bd-violet-bg);
            --bs-btn-border-color: var(--bd-violet-bg);
            --bs-btn-hover-color: var(--bs-white);
            --bs-btn-hover-bg: #6528e0;
            --bs-btn-hover-border-color: #6528e0;
            --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
            --bs-btn-active-color: var(--bs-btn-hover-color);
            --bs-btn-active-bg: #5a23c8;
            --bs-btn-active-border-color: #5a23c8;
        }

        .bd-mode-toggle {
            z-index: 1500;
        }

        .bd-mode-toggle .dropdown-menu .active .bi {
            display: block !important;
        }
        </style>

        
    </head>
    <body>








<header data-bs-theme="dark">

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Bienvenu Monsieur Bahloul</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../admin/index.php" style="font-weight:blod">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../admin/demande.php" style="font-weight:blod">Commandes</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Fonction
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="demande.php" style="font-weight:blod">Commandes</a></li>
            <li><a class="dropdown-item" href="ajoute.php">Ajoute une Voiture</a></li>
            <li><a class="dropdown-item" href="inscription.php">Ajoute un Administrateur</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="archive.php">Archive</a></li>
            <li><a class="dropdown-item" href="logout.php">Déconnecter</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-disabled="true"href="logout.php">Déconnecter</a>
        </li>
      </ul>
      <form class="GET" role="search">
        <input class="form-control me-2" name="recherche" type="search" placeholder="Recherche" aria-label="Search">
        <button class="btn btn-outline-success" name="valider" type="submit">Envoyer</button>
      </form>
    </div>
  </div>
</nav>

</header>


<main>
<table class="table table-striped">
  <thead>
    <tr class="table-dark">
      <th scope="col">ID</th>
      <th scope="col">ID Client</th>
      <th scope="col">Nom Client</th>
      <th scope="col">Prenom Client</th>
      <th scope="col">E-mail Client</th>
      <th scope="col">Numero Client</th>
      <th scope="col">Adresse Client</th>
      <th scope="col">ID Voiture</th>
      <th scope="col">Nom Voiture</th>
      <th scope="col">Prix Voiture</th>
      <th scope="col">Descreption Voiture</th>
      <th scope="col">Image Voiture</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
<?php foreach($archive as $arc): ?>
    <tr>
      <th scope="row"><?= $arc->idH; ?></th>
      <td><?= $arc->id_clients; ?></td>
      <td><?= $arc->nomC; ?></td>
      <td><?= $arc->prenomC; ?></td>
      <td><?= $arc->emailC; ?></td>
      <td><?= $arc->numeroC; ?></td>
      <td><?= $arc->adressC; ?></td>
      <td><?= $arc-> id_cars; ?></td>
      <td><?= $arc->nomV; ?></td>
      <td><?= $arc->prixV; ?></td>
      <td><?= $arc->descriptionV; ?></td>
      <td> <img src="<?= $arc->imageV; ?>" alt="" style="width: 50%; border-radius: 40%;"></td>
    </tr>
<?php endforeach ?>
  </tbody>
</table>
    </main>
        </body>
</html>

