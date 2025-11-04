<?php
// fonctions pour gerer catalogue produits

/**
 * Obtenir critères tri avec GET.
 * 
 * @return string Critère tri
 */
function obtenirCritereTri()
{
    if (isset($_GET["tri"]) && $_GET["tri"] != "aleatoire") {
        return $_GET["tri"];
    } else {
        return "aleatoire";
    }
}

/**
 * Obtenir critères filtre avec GET.
 * 
 * @return string Critère filtre
 */
function obtenirCritereFiltre()
{
    if (isset($_GET["filtre"]) && $_GET["filtre"] != "tous") {
        return $_GET["filtre"];
    } else {
        return "tous";
    }
}

/**
 * Trier produits selon critère.
 * 
 * @param array $produits Tableau produits
 * @param string $tri Critère tri
 * 
 * @return array Produits triés
 */
function trierProduits($produits, $tri)
{
    if ($tri == 'aleatoire') {
        shuffle($produits);
    } else {
        usort($produits, $tri);
    }

    return $produits;
}



/* fonctions comparaison */
/**
 * Comparer ventes ordre décroissant.
 * 
 * @param object $prd1 Premier produit
 * @param object $prd2 Deuxième produit
 * 
 * @return int Résultat comparaison
 */
function ventesDesc($prd1, $prd2)
{
    return $prd2->ventes - $prd1->ventes;
}

/**
 * Comparer prix ordre croissant.
 * 
 * @param object $prd1 Premier produit
 * @param object $prd2 Deuxième produit
 * 
 * @return int Résultat comparaison
 */
function prixAsc($prd1, $prd2)
{
    return $prd1->prix - $prd2->prix;
}

/**
 * Comparer prix ordre décroissant.
 * 
 * @param object $prd1 Premier produit
 * @param object $prd2 Deuxième produit
 * 
 * @return int Résultat comparaison
 */
function prixDesc($prd1, $prd2)
{
    return prixAsc($prd2, $prd1);
}

/**
 * Comparer nom ordre croissant.
 * 
 * @param object $prd1 Premier produit
 * @param object $prd2 Deuxième produit
 * 
 * @return int Résultat comparaison
 */
function nomAsc($prd1, $prd2)
{
    global $langue;
    $collateur = new Collator($langue);

    return $collateur->compare($prd1->nom->$langue, $prd2->nom->$langue);
}

/**
 * Comparer nom ordre décroissant.
 * 
 * @param object $prd1 Premier produit
 * @param object $prd2 Deuxième produit
 * 
 * @return int Résultat comparaison
 */
function nomDesc($prd1, $prd2)
{
    return nomAsc($prd2, $prd1);
}

/**
 * Comparer date d'ajout ordre décroissant.
 * 
 * @param object $prd1 Premier produit
 * @param object $prd2 Deuxième produit
 * 
 * @return int Résultat comparaison
 */
function dacDesc($prd1, $prd2)
{
    return strcmp($prd2->dac, $prd1->dac);
}
