<?php
// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=nouveaux_contacts;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
// Récupération des contacts
$reponse = $bdd->query('SELECT ID, nom, adresse_email, message FROM contacts ORDER BY ID  LIMIT 0, 1000');
while ($donnees = $reponse->fetch())
{
?>
<p><strong><?php echo htmlspecialchars($donnees['nom']); ?></strong> <?php echo $donnees['adresse_email']; ?></p>
<p><?php echo nl2br(htmlspecialchars($donnees['message'])); ?></p>
<?php
} // Fin de la boucle des commentaires
$reponse->closeCursor();
?>
