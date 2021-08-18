<?php

    require 'model.php';

    if(isset($_GET['id'])){
	
        $lignes = deleteinstru($bdd, $_GET['id']);
     
    }
    header('Location: accueil.php');

?>
