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



// Insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO commentaires (id_billet, auteur, commentaire) VALUES(?, ?, ?)');


$req->execute(array($_POST['id_billet'], $_POST['auteur'], $_POST['commentaire']));
// Redirection du visiteur vers la page des commentaires
header('Location: commentaires.php?billet='.$_POST['id_billet']);
?>





