<?php

session_start();
require 'modele.php';

if(isset($_POST['modele'], 
    $_POST['prix'],
    $_POST['stock'],
    $_POST['marque'],
    $_POST['categorie'])){
        if(!empty($_POST['modele']) && 
            !empty($_POST['prix']) && 
            !empty($_POST['stock']) && 
            !empty($_POST['marque']) &&
            !empty($_POST['categorie'])){
              $ajouterInstru = addInstru($bdd);
            }
            if($ajouterInstru){
                $_SESSION['message'] = 'Vous avez bien ajouter un instrument';
                header('Location: accueil.php');
            }
    }
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Ajouter un instrument</title>
</head>
<body>
<?php require 'header.php'; ?>
    <div class="sous_titre">
        Ajouter un instrument
    </div>
    <div class="button">
        <button type="submit"><a href="accueil.php">Accueil</a></button>
    </div>
    <form action="" method="post">
        <div class="formulaire">
            <?php $marques = ListerMarque($bdd); ?>
        <label for="marque">Marque</label> <br>
        <select id="marque" name="marque">
            <?php foreach($marques as $marque): ?>
            <option value="<?=$marque['id'] ?>"><?= $marque['marque']; ?></option> 
            <?php endforeach; ?>
        </select> <br>
        <label for="modele"> Modèle</label> <br>
        <input type="text" id="modele" name="modele"> <br>
        <?php $categories = ListerCategorie($bdd); ?>
        <label for="categorie">Catégorie</label> <br>
        <select name="categorie" id="categorie"><br>
        <?php foreach($categories as $categorie): ?>
            <option value="<?=$categorie['id'] ?>"><?= $categorie['categorie']; ?></option> 
        <?php endforeach; ?>
        </select> <br>
        <label for="prix">Prix (€)</label> <br>
        <input type="text" id="prix" name="prix"> <br>
        <label for="quantite">Quantité</label> <br>
        <input type="text" id="stock" name="stock"> <br>
        <label for="date">Date:</label> <br>
        <input type="date" id="start"
                value="2021-07-22"
                min="2018-01-01" max="2021-12-31"> <br>
        </div>
        <div class="button">
            <button type="submit">Ajouter</button>
        </div>
        
    </form>
    
</body>
</html>