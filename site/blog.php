<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Blog - exercice</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>

    <h1>Mon super blog !</h1>
    <p>Derniers billets du blog :</p>

    <?php include 'config.php';


// requète visant à récupère dans la table billets les 5 premiers articles
$reponse = $bdd->query('SELECT id, titre, contenu, date_creation FROM billets LIMIT 0, 5');

while ($data = $reponse->fetch()){ // tant qu'il y a des entrées à lire alors 
?>

<div class="article">

    <h2>
        <?php echo htmlspecialchars($data['titre']).' le ';
        echo htmlspecialchars($data['date_creation']).'<br>';?>
    </h2>

    <p>
        <?php echo htmlspecialchars($data['contenu']).'<br>';?>
    </p>
    <p> 
        <a href="commentaires.php?billet=<?php echo $data['id']?>">Commentaires</a>
    </p>

</div>
<?php
} 
 $reponse -> closeCursor();
?>
</body>
</html>