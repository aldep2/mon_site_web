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
// Insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO contacts (nom, adresse_email, message) VALUES(?, ?, ?)');
$req->execute(array($_POST['nom'], $_POST['adresse_email'], $_POST['message']));
// Redirection du visiteur vers la page des commentaires
header('Location: contact.php');
?>


