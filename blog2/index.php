<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon blog</title>
	<link href="style.css" rel="stylesheet" /> 
    </head>
        
    <body>

	<nav>
                    <ul>
                        
                        <li><a href="http://u100222708.hostingerapp.com/site_web/"> Retour au site !</a></li>
                        <li><a href="http://u100222708.hostingerapp.com/site_perso_cv/indext.html">CV</a></li>
                        <li><a  href="http://u100222708.hostingerapp.com/siteweb_contact/contact.php">Contact</a></li>
                    </ul>
	</nav>
        <h1>Mon super blog !</h1>         	
        <h2 class="h21">Derniers billets du blog :</h2>
 	<h4 class="h41"><a href="billet.php"> nouveau billets </a></p>
<?php
// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// On récupère les 5 derniers billets
$req = $bdd->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT 0, 5');

while ($donnees = $req->fetch())
{
?>
<div class="news">
    <h3>
        <?php echo htmlspecialchars($donnees['titre']); ?>
        <em>le <?php echo htmlspecialchars($donnees['date_creation_fr']); ?></em>
    </h3>
    
    <p id="p1">
    <?php
    // On affiche le contenu du billet
    echo nl2br(htmlspecialchars($donnees['contenu']));
    ?>
    <br />
    <em><a href="commentaires.php?billet=<?php echo $donnees['id']; ?>">Commentaires</a></em>
    </p>
</div>

<?php

} // Fin de la boucle des billets
$req->closeCursor();
?>
<div class="pdp"><?php include("includes/pieddepage.php"); ?></div>
</body>
</html>
