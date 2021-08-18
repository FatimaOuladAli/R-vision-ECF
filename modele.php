<?php

require 'try.php';

    function returntableau($bdd){
        $sql = 'SELECT modele.id, modele.modele, modele.prix, modele.stock, modele.date_creation, marque.marque, categorie.categorie 
        FROM modele 
        INNER JOIN marque 
        ON modele.marque_id = marque.id 
        INNER JOIN categorie 
        ON modele.categorie_id = categorie.id';
        $q = $bdd->query($sql);
        $data = $q-> fetchAll(PDO::FETCH_ASSOC);
        return $data; 
    }

    function RetourneData($bdd, $id){
        $sql = 'SELECT modele.id, modele.modele, modele.prix, modele.stock, modele.date_creation, marque.marque, categorie.categorie 
        FROM modele 
        INNER JOIN marque 
        ON modele.marque_id = marque.id 
        INNER JOIN categorie 
        ON modele.categorie_id = categorie.id
        WHERE modele.id = :id';
        $q = $bdd->prepare($sql);
        $q -> execute(array('id' => $id));
        $data = $q-> fetch(PDO::FETCH_ASSOC);
        return $data; 
    }

    function deleteinstru($bdd, $id){
       $sql = 'DELETE FROM modele WHERE modele.id=:id';
       $q = $bdd->prepare($sql);
        $lignes = $q->execute(array(
            //on reseigne le tableau
            //ex 'variable' => $_POST['variable'],
            'id' => $id,
        ));
        return $lignes;
    }

    function addInstru($bdd){
        $sql = 'INSERT INTO modele(modele.modele, modele.prix, modele.date_creation, modele.stock, modele.marque_id, modele.categorie_id) 
        VALUES (:modele, :prix, NOW(), :stock, :marque_id, :categorie_id)';
        $q = $bdd->prepare($sql);
        return $q->execute(array(
            //on reseigne le tableau
            //ex 'variable' => $_POST['variable'],
            'modele' => htmlspecialchars($_POST['modele']),
            'prix' => htmlspecialchars($_POST['prix']),
            'stock' => htmlspecialchars($_POST['stock']),
            'marque_id' => htmlspecialchars($_POST['marque']),
            'categorie_id' => htmlspecialchars($_POST['categorie']),
        ));
    }
    function ListerMarque($bdd){
        $sql= 'SELECT id, marque FROM marque';
        $q = $bdd->query($sql);
        return $q->fetchAll(PDO::FETCH_ASSOC);
    }
    function ListerCategorie($bdd){
        $sql= 'SELECT id, categorie FROM categorie';
        $q = $bdd->query($sql);
        return $q->fetchAll(PDO::FETCH_ASSOC);
    }

    function UpdateInstru($bdd, $modele, $prix, $stock, $marque, $categorie, $id){
        $sql = 'UPDATE modele 
        SET modele.modele = :modele, modele.prix = :prix, modele.stock = :stock, modele.date_creation = NOW(), modele.marque_id = :marque_id, modele.categorie_id = :categorie_id
        WHERE modele.id = :id';
        $q = $bdd->prepare($sql);
        $ligne = $q->execute(array(
            'modele' => htmlspecialchars($modele),
            'prix' => htmlspecialchars($prix),
            'stock' => htmlspecialchars($stock),
            'marque_id' => htmlspecialchars($marque),
            'categorie_id' => htmlspecialchars($categorie),
            'id' => $id,
        ));
        return $ligne;
    }