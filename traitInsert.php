<?php
	include('Connexion.php');

	try{
        $mysqlClient = new PDO('mysql:host=localhost;dbname=S6;charset=utf8', 'root','root');
    }
    catch(Exception $e){
            die('Erreur : '.$e->getMessage());
    }

    $listeCat=listeCategorie($mysqlClient);
    $rep="";
    for($i=0;$i<count($listeCat);$i++){
    	if($listeCat[$i]['id']==$_GET['categorie'])
    	{
    		$rep=$listeCat[$i]['nomC'];
    	}
    }

    $getId=getIdUri($mysqlClient);
    $url="";
    for ($i=0; $i < count($getId); $i++) 
    {
        echo $getId[$i]['id'];
        $getId[$i]['id']=$getId[$i]['id']+1;
        $url=strtolower($rep)."/".fixForUri($_GET['Lieu'])."-".$getId[$i]['id'];
    }
    if($getId==null)
    {
        $getId[0]['id']=count($getId)+1;  
        $url=strtolower($rep)."/".fixForUri($_GET['Lieu'])."-".$getId[0]['id'];;
    }

    //echo $url;
    $ajout=ajouter($mysqlClient,$_GET['motif'],$_GET['categorie'],$_GET['detail'],$_GET['Lieu'],$_GET['solution'],$url);
    
    header("location:insert.php");
?>