<?php
    try{
        $mysqlClient = new PDO('mysql:host=localhost;dbname=webS6;charset=utf8', 'root','root');
    }
    catch(Exception $e){
            die('Erreur : '.$e->getMessage());
    }


    function listeCategorie($mysqlClient){
        $sqlQuery = 'SELECT * FROM Categorie';
        $recipesStatement = $mysqlClient->prepare($sqlQuery);
        $recipesStatement->execute();
        $recipes = $recipesStatement->fetchAll();
        return $recipes;
    }

    function listeSolution($mysqlClient){
        $sqlQuery = 'SELECT * FROM Solution';
        $recipesStatement = $mysqlClient->prepare($sqlQuery);
        $recipesStatement->execute();
        $recipes = $recipesStatement->fetchAll();
        return $recipes;
    }

    function listeCause($mysqlClient){
        $sqlQuery = 'SELECT Cause.id,motif,nomC,Lieu,nomS,url FROM Cause join Categorie on Categorie.id=Cause.idCat join Solution on Solution.id=Cause.idSolution';
        $recipesStatement = $mysqlClient->prepare($sqlQuery);
        $recipesStatement->execute();
        $recipes = $recipesStatement->fetchAll();
        return $recipes;
    }

    function toDoLogin($mysqlClient,$nom,$mdp)
    { 
        $liste=array();
        $sqlQuery = 'SELECT * FROM Admin';
        $recipesStatement = $mysqlClient->prepare($sqlQuery);
        $recipesStatement->execute();
        $liste = $recipesStatement->fetchAll();
        $valiny=0;
        for($i=0;$i<count($liste);$i++)
        {
          if($liste[$i]['nomA']==$nom && $liste[$i]['mdp']==sha1($mdp))
          {
            $valiny=1;
          }
          return $valiny;
        }
    }

    function detailAjout($mysqlClient,$url){
        $sqlQuery = "SELECT motif,Lieu,Cause.detail as detailC,Solution.detail as detailS FROM Cause join Categorie on Categorie.id=Cause.idCat join Solution on Solution.id=Cause.idSolution where url='".$url."'";
        $recipesStatement = $mysqlClient->prepare($sqlQuery);
        $recipesStatement->execute();
        $recipes = $recipesStatement->fetchAll();
        return $recipes;
    }

    function fixForUri($string){
        $slug = trim($string); // trim the string
        $slug= preg_replace('/[^a-zA-Z0-9 -]/','',$slug ); // only take alphanumerical characters, but keep the spaces and dashes too...
        $slug= str_replace(' ','_', $slug); // replace spaces by dashes
        $slug= strtolower($slug);  // make it lowercase
        return $slug;
    }

    function getIdUri($mysqlClient){
        $sqlQuery = 'SELECT id FROM Cause ORDER BY id DESC LIMIT 1';
        $recipesStatement = $mysqlClient->prepare($sqlQuery);
        $recipesStatement->execute();
        $recipes = $recipesStatement->fetchAll();
        return $recipes;
    }
    function ajouterCategorie($mysqlClient,$nomC)
    {
        $data = ( array(
                        'nomC' => $nomC
                    )
        );
        $sql = "INSERT INTO Categorie(nomC) values (:nomC)";
        $recipesStatement = $mysqlClient->prepare($sql);
        $recipesStatement->execute($data);
    }
    function ajouterSolution($mysqlClient,$nomS,$detail)
    {
        $data = ( array(
                        'nomS' => $nomS,
                        'detail' => $detail
                    )
        );
        $sql = "INSERT INTO Solution(nomS,detail) values (:nomS,:detail)";
        $recipesStatement = $mysqlClient->prepare($sql);
        $recipesStatement->execute($data);
    }

    function ajouter($mysqlClient,$motif,$idCat,$detail,$Lieu,$idSolution,$url)
    {
        $data = ( array(
                        'motif' => $motif,
                        'idCat' => $idCat,
                        'detail' => $detail,
                        'Lieu' => $Lieu,
                        'idSolution' => $idSolution,
                        'url' => $url
                    )
        );
        $sql = "INSERT INTO Cause(motif,idCat,detail,Lieu,idSolution,url) values (:motif,:idCat,:detail,:Lieu,:idSolution,:url)";
        $recipesStatement = $mysqlClient->prepare($sql);
        $recipesStatement->execute($data);
    }
?>