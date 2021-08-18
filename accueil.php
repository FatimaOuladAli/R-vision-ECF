<?php 
session_start();


    require 'modele.php';
    $data=returntableau($bdd);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Accueil</title>
</head>
<body>
    <?php require 'header.php'; ?>
    <div class="sous_titre">
        Liste des instruments
    </div>
    <div class="button">
        <button>Catégorie</button>
        <button type="submit"><a href="ajouter.php">Ajouter</a></button>
    </div>
    <?php 
    if(isset($_SESSION['message'])) echo $_SESSION['message'];
    ?>
    <table>
        <thead>
            <tr>
                <th>Modèle</th>
                <th>Marque</th>
                <th>Catégorie</th>
                <th>Prix (€)</th>
                <th>Date</th>
                <th>Stock</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($data as $ligne) : ?>
            <tr>
                <td><?= $ligne['modele'] ?></td>
                <td><?= $ligne['marque'] ?></td>
                <td><?= $ligne['categorie'] ?></td>
                <td><?= $ligne['prix'] ?></td>
                <td><?= $ligne['date_creation'] ?></td>
                <td><?= $ligne['stock'] ?></td>
                <td>
                    <div>
                        <a href="modifier.php?id=<?= $ligne['id'] ?>">
                            <img src="images/modifier.png" alt="">
                        </a>
                        <a href="supprimer.php?id=<?= $ligne['id'] ?>" onclick="return confirm('Voulez vous supprimer ? ')" >
                            <img src="images/supprimer.png" alt="">
                        </a>
                        
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
            
        </tbody>
    </table>
    
</body>
</html>