<?php 

session_start();
unset($_SESSION['message']);
require_once 'modele.php';
if(isset($_POST['modele'], 
    $_POST['prix'],
    $_POST['stock'],
    $_POST['marque'],
    $_POST['categorie'])){
         $update = UpdateInstru($bdd, $_POST['modele'], $_POST['prix'], $_POST['stock'], $_POST['marque'], $_POST['categorie'], $_GET['id']);

        if($update){
            $_SESSION['message'] = 'Votre article a été modifié';
            header('Location: accueil.php');

        }
    }

$data=RetourneData($bdd, $_GET['id']);



?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Modifier un instrument</title>
</head>
<body>
<?php require 'header.php'; ?>
    <div class="sous_titre">
        Modifier un instrument
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
        <input type="text"  value ='<?= $data['modele']?>' name="modele"> <br>
        <?php $categories = ListerCategorie($bdd); ?>
        <label for="categorie">Catégorie</label> <br>
        <select name="categorie" id="categorie"><br>
        <?php foreach($categories as $categorie): ?>
            <option value="<?=$categorie['id'] ?>"><?= $categorie['categorie']; ?></option> 
        <?php endforeach; ?>
        </select> <br>
        <label for="prix">Prix (€)</label> <br>
        <input type="text"  value ='<?= $data['prix']?>' name="prix"> <br>
        <label for="quantite">Quantité</label> <br>
        <input type="text"  value ='<?= $data['stock']?>' name="stock"> <br>
        <label for="date">Date:</label> <br>
        <input type="date" id="start"
                value="2021-07-22"
                min="2018-01-01" max="2021-12-31"> <br>
        </div>
        <div class="button">
            <button type="submit">Modifier</button>
        </div>
        
    </form>
    
</body>
</html>