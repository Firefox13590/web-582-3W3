<?php
// Librairie pour géreré l'intégration MySQL.

/**
 * Établir une connexion à la base de données MySQL.
 * 
 * @return mysqli Ressource de connexion à la base de données.
 */
function connexion(){
    // Intégrer la BD MySQL
    $cnx = mysqli_connect('localhost', 'root', ''); // Pas sécuritaire : à mettre caché ailleurs (plus tard)
    mysqli_set_charset($cnx, 'utf8mb4');
    mysqli_select_db($cnx, 'teetim');
    return $cnx;
}

/**
 * Soumettre une requête SQL à la base de données.
 * 
 * @param mysqli $cnx Ressource de connexion à la base de données.
 * @param string $requeteSql Requête SQL à exécuter.
 * 
 * @return mysqli_result|bool Résultat de la requête ou false en cas d'échec.
 */
function soumettreRequete($cnx, $requeteSql){
    $resultat = mysqli_query($cnx, $requeteSql);
    return $resultat;
}



// Implémentation opérations CRUD.


/**
 * Créer une nouvelle entrée dans la base de données.
 * 
 * @param mysqli $cnx Ressource de connexion à la base de données.
 * @param string $requete Requête SQL pour créer l'entrée.
 * 
 * @return int Identifiant de la nouvelle entrée créée.
 */
function create($cnx, $requete){
    $resultat = soumettreRequete($cnx, $requete);
    return mysqli_insert_id($cnx);
}

/**
 * Lire des entrées dans la base de données.
 * 
 * @param mysqli $cnx Ressource de connexion à la base de données.
 * @param string $requete Requête SQL pour lire les entrées.
 * 
 * @return array Tableau des entrées lues.
 */
function read($cnx, $requete){
    $resultat = soumettreRequete($cnx, $requete);
    return mysqli_fetch_all($resultat, MYSQLI_ASSOC);
}

/**
 * Mettre à jour une entrée dans la base de données.
 * 
 * @param mysqli $cnx Ressource de connexion à la base de données.
 * @param string $requete Requête SQL pour mettre à jour l'entrée.
 * 
 * @return int Nombre de lignes affectées.
 */
function update($cnx, $requete){
    $resultat = soumettreRequete($cnx, $requete);
    return mysqli_affected_rows($cnx);
}

/**
 * Supprimer une entrée dans la base de données.
 * 
 * @param mysqli $cnx Ressource de connexion à la base de données.
 * @param string $requete Requête SQL pour supprimer l'entrée.
 * 
 * @return int Nombre de lignes affectées.
 */
function delete($cnx, $requete){
    $resultat = soumettreRequete($cnx, $requete);
    return mysqli_affected_rows($cnx);
}

