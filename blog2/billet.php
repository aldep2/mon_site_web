<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>billets</title>
	<link href="style.css" rel="stylesheet" /> 	
    </head>
    
    <body>
    <p><a href="index.php">Retour à la liste des billets</a></p>
    
    

	<div class="form"><form action="billet_post.php" method="post">
        <p>
        <label for="titre">titre</label> : <input type="text" name="titre" id="titre" /><br />
        <label for="contenu">contenu</label> :  <input type="text" name="contenu" id="contenu" /><br />

        <input type="submit" value="Envoyer" />
	</p>
    </form></div>

<?php
// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// Récupération des 10 derniers messages
$reponse = $bdd->query('SELECT * FROM billets WHERE 1 ORDER BY ID DESC LIMIT 0, 10');



$reponse->closeCursor();

?>
<div class="pdp"><?php include("includes/pieddepage.php"); ?></div>
    </body>
</html>
