<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test intégration PHP/MySQL</title>
</head>
<body>
    <h2>Thèmes disponibles dans le catalogue des produits TeeTIM</h2>
    <ul>
    <?php
        // Se connecter au serveur MySQL
        // On utilise dans cet exemple la librairie PHP MySQLi
        
        // Étape 1 : se connecter au serveur MySQL
        $cnx = mysqli_connect("localhost", "root", "");

        // Étape 2 : sélectionner la BD
        mysqli_select_db($cnx, "teetim_gr2");

        // Étape 3 : on écrit une requête SQL dans une chaîne de caractères
        $requeteSql = "SELECT nom FROM theme";

        // Étape 4 : on exécute la requête sur la connexion disponible et 
        // on récolte le résultat ("jeu d'enregistrements")
        $resultat = mysqli_query($cnx, $requeteSql);

        // Étape 5 : travailler avec ce résultat
        // Méthode 1 : sortir toutes les lignes (enregistrement) d'un seul coup 
        // du jeu d'enregistrements et les mettre dans un tableau PHP
        $enregistrements = mysqli_fetch_all($resultat); 

        // print_r($enregistrements);
        foreach($enregistrements as $ligne) {
            echo "<li>";
                echo $ligne[0];
            echo "</li>";
        }

    ?>
    </ul>
</body>
</html>