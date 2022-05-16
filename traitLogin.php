<?php
	include('Connexion.php');

	try{
        $mysqlClient = new PDO('mysql:host=localhost;dbname=webS6;charset=utf8', 'root','root');
    }
    catch(Exception $e){
            die('Erreur : '.$e->getMessage());
    }

    $nom=$_POST['nom'];
    $mdp=$_POST['mdp'];
    $valLog=toDoLogin($mysqlClient,$nom,$mdp);
    
	if($valLog==1)
	{
		header("location:insert.php");
	}
    else{
        header("location:login.php");    
    }
    
?>