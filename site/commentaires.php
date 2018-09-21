<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Commentaires</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>

<h1>Mon super blog !</h1>
    <a href='blog.php'>Retour à la liste des articles</a>

<?php include 'config.php';

// affichage du dernier billet
$req = $bdd->prepare('SELECT titre, contenu, date_creation FROM billets WHERE id = ?'); // va me cherche titre contenu et date de creation dans la table billets ou l'id est égal au get
$req->execute(array($_GET['billet']));
$data = $req->fetch();

?>
<h2>
    <?php echo htmlspecialchars($data['titre']).' le ';
          echo htmlspecialchars($data['date_creation']).'<br>';?>
</h2>

<p>
    <?php echo htmlspecialchars($data['contenu']).'<br>';?>
</p>

<?php

$req -> closeCursor(); // fermer la requète pour pouvoir en lancer une autre

// affichage des commentaires du billet

$req = $bdd->prepare('SELECT auteur, commentaire, date_commentaire FROM commentaires WHERE id_billet = ? ORDER BY date_commentaire'); // va me chercher x,x,x dans la table commentaires ou l'id du billet est égale à celui du get
$req->execute(array($_GET['billet']));

while ($commentaire = $req->fetch()){
?>

    <h2><?php echo htmlspecialchars($commentaire['auteur']) . ' le ' . htmlspecialchars($commentaire['date_commentaire'])?></h2>
    <p><?php echo htmlspecialchars($commentaire['commentaire'])?></p>
<?php
}
$req -> closeCursor();
?>

</body>
</html>

