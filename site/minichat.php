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

<h1>Mini Chat</h1>
    <form action="minichat_post.php" method="post">
        <div class="form-group" id="userinput">
            <label for="user">Pseudo</label>
            <input type="text" class="form-control" id="user" name="pseudo" aria-describedby="emailHelp" placeholder="Entrez votre pseudo">
        </div>
        <div class="form-group" id="msginput">
            <label for="message">Message</label>
            <input type="text" class="form-control" id="message" name="message" placeholder="Message">
        </div>
        <button type="submit" class="sub">Submit</button>
    </form>


    <?php
try
{
	// On se connecte à MySQL
	$bdd = new PDO('mysql:host=mysql;dbname=minichat;charset=utf8', 'root', 'mysecretpassword');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

// Si tout va bien, on peut continuer

// On récupère tout le contenu de la table message
$reponse = $bdd->query('SELECT * FROM message ORDER BY ID DESC LIMIT 0, 10');

// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{
?>
    <p>
        <?php echo $donnees['pseudo']; ?> :
        <?php echo $donnees['message']; ?>
    </p>
    <?php
}

$reponse->closeCursor(); // Termine le traitement de la requête

?>
</body>

</html>
