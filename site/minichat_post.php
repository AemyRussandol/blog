<?php

// tentative de connexion a la BDD
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

// On envoie notre message a la BDD
$req = $bdd->prepare('INSERT INTO message (pseudo, message) VALUES(?,?)'); // ici on ne connait pas encore les valeurs, on met donc des "?"

// il faut le recupérer avec le post
$req->execute(array(
    $_POST['pseudo'],
    $_POST['message'],
	));

// on redirige l'utilisateur sur la page minichat
header('Location: minichat.php');
?>