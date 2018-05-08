<?php
session_start();

require ("connexion_bdd.php");

$bdd = getBDD();
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Re:Monster</title>
        <link rel="stylesheet" href="ciao.css">
    </head>
    <body>
        <h1>Re:Monster</h1>

        <?php
        include("menu.php");
        include("menuRe.php");
        $reponse = $bdd->query('SELECT * FROM competences ORDER BY nom') or die(print_r($bdd->errorInfo()));

        while ($donnees = $reponse->fetch())
        {
        ?>
        <p>
            <strong><?php echo $donnees['nom']; ?> : </strong><br /><?php echo $donnees['description']; ?><br /> Avec niveau : <?php echo $donnees['avec_niveau']; ?>
        </p>
        <?php
        }


        $reponse->closeCursor(); // Termine le traitement de la requête

        ?>

    </body>
</html>
