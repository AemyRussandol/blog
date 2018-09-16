<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Minichat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
   </head>

<body>

<h1>Mon premier blog</h1>

    <?php
try
{
	// On se connecte à MySQL
	$bdd = new PDO('mysql:host=mysql;dbname=Blog;charset=utf8', 'root', 'mysecretpassword');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

// Si tout va bien, on peut continuer

// On récupère tout le contenu de la table message
$reponse = $bdd->query('SELECT * FROM billets ORDER BY ID DESC LIMIT 0, 10');

// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{
?>
    <h2>
        <?php echo $donnees['titre']; ?> :
        <?php echo $donnees['date_creation']; ?>
    </h2>

    <p>
    <?php echo $donnees['contenu'];?>
    </p>

    <p>
    <a href="commentaires.php?billets="<?php echo $donnees['id']; ?>">Commentaires</a>
    </p>


    <?php
}

$reponse->closeCursor(); // Termine le traitement de la requête

?>
</body>

</html>
