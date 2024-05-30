<?php
    function histoVend ($nomC, $prenomC, $emailC, $numeroC, $adressC, $imageV, $nomV, $prixV, $descV, $id_cars, $id_clients)
    {
        if(require("../config/connexion.php"))
        {
            $req = $access->prepare("INSERT INTO historiquevente(`nomC`, `prenomC`, `emailC`, `numeroC`, `adressC`, `imageV`, `nomV`, `prixV`, `descriptionV`, `id_cars`, `id_clients`) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
            $req->execute(array($nomC, $prenomC, $emailC, $numeroC, $adressC, $imageV, $nomV, $prixV, $descV, $id_cars, $id_clients));
            $req->closeCursor();
        }
    }




    function achete ($nom, $prenom, $email, $numero, $adress, $id_cars)
    {
        if(require("../config/connexion.php"))
        {
            $req = $access->prepare("INSERT INTO achat (`nomClient`, `prenomClient`, `emailClient`, `numeroClient`, `adressClient`, `id_cars`) VALUES (?,?,?,?,?,?)");
            $req->execute(array($nom, $prenom, $email, $numero, $adress, $id_cars));
            $req->closeCursor();
        }
    }

    function modifier ($image, $nom, $prix, $quant, $desc, $id)
    {
        if(require("../config/connexion.php"))
        {
            $req = $access->prepare("UPDATE cars SET image=?, nom=?, prix=?, quantite=?, description=? WHERE id=?");
            $req->execute(array($image, $nom, $prix, $quant, $desc, $id));
            $req->closeCursor();
        }
    }

    function getcar ($id)
    {
        if(require("../config/connexion.php"))
        {
            $req=$access->prepare("SELECT * FROM cars WHERE id=?");
                $req->execute(array($id));
                if ($req -> rowCount() == 1){
                    $data = $req->fetchAll(PDO::FETCH_OBJ);
                    return $data;
                }else{
                    return false;
                }
        $req->closeCursor();
        }
    }
    
    function getAdmin ($email,$password)
    {
        if(require("../config/connexion.php"))
        {
            $req=$access->prepare("SELECT * FROM users WHERE email=? AND password=? ");
                $req->execute(array($email, $password));
                
                if ($req -> rowCount() == 1){
                    $data = $req->fetch();
                    
                    return $data;
                }else{
                    return false;
                }
        $req->closeCursor();
        }
    }

    function ajouter ($image, $nom, $prix, $quant, $desc)
    {
        if(require("../config/connexion.php"))
        {
            $req = $access->prepare("INSERT INTO cars (image, nom, prix, quantite, description) VALUES (?,?,?,?,?)");
            $req->execute(array($image, $nom, $prix, $quant, $desc));
            $req->closeCursor();
        }
    }

    function afficher()
    {
        if(require("../config/connexion.php"))
        {
            $req=$access->prepare ("SELECT * FROM cars ORDER BY id DESC");
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
            $req->closeCursor();
           
        }
    }

    function afficherClient()
    {
        if(require("../config/connexion.php"))
        {
            $req=$access->prepare ("SELECT * FROM achat ORDER BY idC DESC");
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
            $req->closeCursor();
           
        }
    }

    function afficherCommandes()
    {
        if(require("../config/connexion.php"))
        {   
            $req=$access->prepare ("SELECT achat.*, cars.* FROM achat, cars WHERE cars.id=achat.id_cars AND achat.nouvelle_commande=1");
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
            $requ->closeCursor();
        }
    }

    function supprimer($id)
    {
        if(require("../config/connexion.php"))
        {
            $req=$access->prepare("DELETE FROM cars WHERE id=?");
            $req->execute(array($id));
            $req->closeCursor();
        }
    }

    function ModifClient($idC)
    {
        if(require("../config/connexion.php"))
        {
            $req=$access->prepare("UPDATE achat SET nouvelle_commande = 0 WHERE idC=?");
            $req->execute(array($idC));
            $req->closeCursor();
        }
    }

    function Modifquantite($idv)
    {
        if(require("../config/connexion.php"))
        {
            $req=$access->prepare("UPDATE cars SET quantite = quantite-1 WHERE id=?");
            $req->execute(array($idv));
            $req->closeCursor();
        }
    }

    function archiveVend ()
    {
        if(require("../config/connexion.php"))
        {
            $req=$access->prepare ("SELECT * FROM historiquevente ORDER BY idH DESC");
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
            $req->closeCursor();
        }
    }
    


































    function notification($id)
    {
        if(require("../PFE/config/connexion.php"))
        { 
            $sql = $access->prepare ("SELECT * FROM achat WHERE achat.nouvelle_commande = 1");
            $result = $access->query($sql);
            
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $admin_email = "lahiouelridha1@gmail.com";
                    $subject = "Nouvelle commande";
                    $message = "Une nouvelle commande a été passée. Numéro de commande : " . $row["numero_commande"];
                    mail($admin_email, $subject, $message);
                }
            } else {
                echo "Aucune nouvelle commande.";
            }
            $sql->closeCursor();
        }
    }

































    function afficheAdmin($recherche){
        if(require("../config/connexion.php"))
        {
        $allcar=$access->query('SELECT * FROM cars ORDER BY id DESC');
        $allcar= $access->query('SELECT nom FROM cars WHERE nom LIKE "%'.$recherche.'%" ORDER BY id DESC');
        $data = $allcar->fetchAll(PDO::FETCH_OBJ);
            return $data;
        }
    }
?>
