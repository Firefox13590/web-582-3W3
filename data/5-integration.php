<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test intégration PHP/MySQL</title>
</head>
<body>
    <h1>Thèmes disponibles dans le catalogue des produits TeeTIM</h1>
    <?php
        // Se connecter au serveur MySQL
        // Utilisation librairie MySQLi

        // Étape 1: se connecter au serveur MySQL
        $cnx = mysqli_connect("localhost", "root", "");
        // Définir l'encodage de caractères
        mysqli_set_charset($cnx, "utf8mb4");

        // Étape 2: sélectionner la BD
        mysqli_select_db($cnx, "teetim");

        // Étape 3: écrire requête SQL dans un string
        $sqlReq = "SELECT * FROM produits";

        // Étape 4: execution requête via connexion et récolte résultat
        $sqlRes = mysqli_query($cnx, $sqlReq);
        // print_r($sqlRes);

        // Étape 5: travailler avec résultat
        // Méthode 1: get toutes les lignes d'une shot
        $records = mysqli_fetch_all($sqlRes, MYSQLI_ASSOC);

        // print_r($records);
        echo "<ul>";
        foreach($records as $ligne){
            echo "<li>";
            echo "$ligne[nom], $ligne[id], $ligne[prix]";
            echo "</li>";
        }
        echo "</ul>";
    ?>
</body>
</html>