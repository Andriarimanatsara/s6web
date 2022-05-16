<?php
	include('Connexion.php');

	try{
        $mysqlClient = new PDO('mysql:host=localhost;dbname=webs6;charset=utf8', 'root','root');
    }
    catch(Exception $e){
            die('Erreur : '.$e->getMessage());
    }

    $ajout=ajouterCategorie($mysqlClient,$_GET['categorie']);
    
    header("location:insert.php");
?>