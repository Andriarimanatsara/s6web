<?php
	include('Connexion.php');

	try{
        $mysqlClient = new PDO('mysql:host=localhost;dbname=webs6;charset=utf8', 'root','root');
    }
    catch(Exception $e){
            die('Erreur : '.$e->getMessage());
    }

    $ajout=ajouterSolution($mysqlClient,$_GET['solution'],$_GET['detail']);
    
    header("location:insert.php");
?>