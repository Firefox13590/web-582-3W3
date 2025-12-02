<?php
// Librairie de fonctions pour gérer le catalogue des produits.

/**
 * Obtenir la liste des thèmes disponibles dans le catalogue.
 * 
 * @param mysqli $cnx Ressource de connexion à la base de données.
 */
function obtenirThemes($cnx){
    return read($cnx, "SELECT * FROM themes");
}

/**
 * Obtenir la liste des produits selon les critères spécifiés.
 * 
 * @param mysqli $cnx Ressource de connexion à la base de données.
 * @param int $categorieId Identifiant de la catégorie de produits.
 * @param string $filtre Critère de filtrage des produits.
 * @param string $tri Critère de tri des produits.
 * 
 * @return array Tableau des produits correspondant aux critères.
 */
function obtenirProduits($cnx, $categorieId, $filtre = 'tous', $tri = 'RAND()'){
    $clauseFiltre = ($filtre == 'tous') ? "" : " AND themeId=$filtre";
    return read($cnx, 
        "SELECT * 
        FROM produits 
        WHERE $categorieId $clauseFiltre 
        ORDER BY $tri");
}

// /**
//  * Obtenir le critère de tri choisi par l'utilisateur.
//  * 
//  * @return string Chaîne représentant le critère de tri.
//  */
// function obtenirCritereTri()
// {
//     if (isset($_GET["tri"]) && $_GET["tri"] != "aleatoire") {
//         return $_GET["tri"];
//     } else {
//         return "aleatoire";
//     }
// }

// /**
//  * Trier les produits selon le critère choisi.
//  * 
//  * @param array $produits Tableau des produits à trier.
//  * @param string $tri Critère de tri.
//  * 
//  * @return array Tableau des produits triés.
//  */
// function trierProduits($produits, $tri)
// {
//     if ($tri == "aleatoire") {
//         shuffle($produits);
//     } else {
//         usort($produits, $tri);
//     }
//     return $produits;
// }

// /************ Fonctions de comparaison ***************/
// /**
//  * Comparer deux produits selon le nombre de ventes (du plus grand au plus petit).
//  * 
//  * @param object $prd1 Premier produit à comparer.
//  * @param object $prd2 Deuxième produit à comparer.
//  * 
//  * @return int Résultat de la comparaison.
//  */
// function ventesDesc($prd1, $prd2)
// {
//     return $prd2->ventes - $prd1->ventes;
// }

// /**
//  * Comparer deux produits selon le prix (du plus petit au plus grand).
//  * 
//  * @param object $prd1 Premier produit à comparer.
//  * @param object $prd2 Deuxième produit à comparer.
//  * 
//  * @return int Résultat de la comparaison.
//  */
// function prixAsc($prd1, $prd2)
// {
//     if ($prd1->prix < $prd2->prix) {
//         return -1;
//     }else if ($prd1->prix > $prd2->prix) {
//         return 1;
//     }else {
//         return 0;
//     }
// }

// /**
//  * Comparer deux produits selon le prix (du plus grand au plus petit).
//  * 
//  * @param object $prd1 Premier produit à comparer.
//  * @param object $prd2 Deuxième produit à comparer.
//  * 
//  * @return int Résultat de la comparaison.
//  */
// function prixDesc($prd1, $prd2)
// {
//     return prixAsc($prd2, $prd1);
// }


// /* Les fonctions suivantes sont à implémenter plus tard... */
// /**
//  * Comparer deux produits selon le nom (ordre alphabétique croissant).
//  * 
//  * @param object $prd1 Premier produit à comparer.
//  * @param object $prd2 Deuxième produit à comparer.
//  * 
//  * @return int Résultat de la comparaison.
//  */
// function nomAsc($prd1, $prd2)
// {
//     global $langue;
//     $classificateur = new Collator($langue);
//     return $classificateur->compare($prd1->nom->$langue, $prd2->nom->$langue);
// }

// /**
//  * Comparer deux produits selon le nom (ordre alphabétique décroissant).
//  * 
//  * @param object $prd1 Premier produit à comparer.
//  * @param object $prd2 Deuxième produit à comparer.
//  * 
//  * @return int Résultat de la comparaison.
//  */
// function nomDesc($prd1, $prd2)
// {
//     global $langue;
//     return nomAsc($prd2, $prd1);
// }

// /**
//  * Comparer deux produits selon la date d'ajout au catalogue (du plus récent au plus ancien).
//  * 
//  * @param object $prd1 Premier produit à comparer.
//  * @param object $prd2 Deuxième produit à comparer.
//  * 
//  * @return int Résultat de la comparaison.
//  */
// function dacDesc($prd1, $prd2)
// {
//     global $langue;
//     return 0;
// }
