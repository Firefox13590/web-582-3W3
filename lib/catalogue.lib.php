<?php
// Fonctions pour gérer le catalogue des produits.

function obtenirCritereTri()
{
    if (isset($_GET["tri"]) && $_GET["tri"] != "aleatoire") {
        return $_GET["tri"];
    } else {
        return "aleatoire";
    }
}

function trierProduits($produits, $tri)
{
    if ($tri == "aleatoire") {
        shuffle($produits);
    } else {
        usort($produits, $tri);
    }
    return $produits;
}



/************ Fonctions de comparaison ***************/
function ventesDesc($prd1, $prd2)
{
    return $prd2->ventes - $prd1->ventes;
}

function prixAsc($prd1, $prd2)
{
    return $prd1->prix - $prd2->prix;
}

function prixDesc($prd1, $prd2)
{
    return $prd2->prix - $prd1->prix;
}


/* Les fonctions suivantes sont à implémenter plus tard... */
function nomAsc($prd1, $prd2)
{
    global $langue;
    return 0;
}

function nomDesc($prd1, $prd2)
{
    global $langue;
    return 0;
}

function dacDesc($prd1, $prd2)
{
    global $langue;
    return 0;
}