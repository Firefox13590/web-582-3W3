<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test intégration PHP/MySQL</title>
</head>
<body>
    <h2>Thèmes disponibles dans le catalogue des produits TeeTIM</h2>
    <ol>
    <?php
        // Se connecter au serveur MySQL
        // On utilise dans cet exemple la librairie PHP MySQLi
        
        // Étape 1 : se connecter au serveur MySQL
        $cnx = mysqli_connect("127.0.0.1", "root", "");
        // Définir l'encodage de caractères
        mysqli_set_charset($cnx, 'utf8mb4');

        // Étape 2 : sélectionner la BD
        mysqli_select_db($cnx, "teetim_gr2");

        // Étape 3 : on écrit une requête SQL dans une chaîne de caractères
        $requeteSql = "SELECT * FROM produit";

        // Étape 4 : on exécute la requête sur la connexion disponible et 
        // on récolte le résultat ("jeu d'enregistrements")
        $jeuEnregistrements = mysqli_query($cnx, $requeteSql);
        // print_r($jeuEnregistrements);

        // Étape 5 : travailler avec ce résultat
        // Méthode 1 : sortir toutes les lignes (enregistrement) d'un seul coup 
        // du jeu d'enregistrements et les mettre dans un tableau PHP
        $tabLignes = mysqli_fetch_all($jeuEnregistrements, MYSQLI_ASSOC); 
        // print_r($tabLignes);

        // print_r($enregistrements);
        foreach($tabLignes as $ligne) {
            echo "<li>";
                echo $ligne["nom"];
                echo ", ".$ligne["prix"];
                echo ", ".$ligne["id"];
            echo "</li>";
        }

    ?>
    </ol>
</body>
</html>