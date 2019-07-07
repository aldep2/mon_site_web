<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>commentaires</title>
	<link href="style.css" rel="stylesheet" /> 
    </head>
    <style>
    
    
    </style>
    <body>
    <h4 class="h41"><a href="index.php."> liste des billets </a></p>
    
	<div class="form"><form action="Commentaires.php" method="post">
        
        <label for="auteur">auteur</label> : <input type="text" name="auteur" id="auteur" /><br />
        <label for="commentaire">commentaire</label> :  <input type="text" name="commentaire" id="commentaire" /><br />

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





// Récupération du billet
$req = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets WHERE id = ?');
$req->execute(array($_GET['billet']));
$donnees = $req->fetch();?>

<div class="news">
    <h3 class="h31">
        <em><?php echo htmlspecialchars($donnees['titre']); ?>......</em>
        <em>le <?php echo $donnees['date_creation_fr']; ?></em>
	<em>billet n° :  <?php echo $donnees['id']; ?></em>
    </h3>
    
    <p>
    <?php
    echo nl2br(htmlspecialchars($donnees['contenu']));
    ?>
    </p>
</div>
<div class="com">
<?php
$req->closeCursor(); // Important : on libère le curseur pour la prochaine requête




// Récupération des commentaires
$req = $bdd->prepare('SELECT id_billet, auteur, commentaire, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM commentaires WHERE id_billet = ? ORDER BY date_creation_fr');
$req->execute(array($_GET['billet']));

while ($donnees = $req->fetch())
{
?>
<p><strong><?php echo htmlspecialchars($donnees['id_billet']); ?></strong>
<p><strong><?php echo htmlspecialchars($donnees['auteur']); ?></strong> le <?php echo $donnees['date_creation_fr']; ?></p>
<p><?php echo nl2br(htmlspecialchars($donnees['commentaire'])); ?></p>
<?php
} // Fin de la boucle des commentaires
$req->closeCursor();
?>
</div>
<div class="pdp"><?php include("includes/pieddepage.php"); ?></div>
    </body>
</html>
