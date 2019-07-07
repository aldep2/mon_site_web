<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <title>Alain Dépré - Carnets de voyage</title>
    </head>

<body>
<div id="bloc_page">
<header>
                <div id="titre_principal">
                    <div id="logo">
                        <img src="zozor_logo.png" alt="Logo de Zozor" />
                        <h1>Alain Dépré</h1>    
                    </div>
                    <h2>Carnets de voyage</h2>
                </div>
                
                <nav>
                    <ul>
                        <li><a href="http://localhost/www/html/web/site_web/">Accueil</a></li>
                        <li><a href="http://localhost/www/html/web/site_web/blog2/index.php">Blog</a></li>
                        <li><a href="http://localhost/www/html/web/site_web/cv/cv.html">CV</a></li>
                        
                    </ul>
                </nav>
            </header> 
<div id="form"> 
<div class="form"><form action="contacts_post.php"method="post">
        
        <label for="nom">nom</label> : <input type="text" name="nom" id="nom" /><br />
        <label for="adresse_email">adresse_email</label> :  <input type="text" name="adresse_email" id="adresse_email" /><br />
	<div class="row">
    <label class="required" for="message">Your message:</label><br />
    <textarea id="message" class="input" name="message" rows="7" cols="30"></textarea><br />
    <span id="message_validation" class="error_message"></span>
  </div>
	
        <input type="submit" value="Envoyer" />
	</form>
	</div>
</div>
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
$reponse = $bdd->query('SELECT ID,date, nom, adresse_email, message FROM contacts ORDER BY ID  LIMIT 0, 100');
?>
</body>
</div>
</html>
