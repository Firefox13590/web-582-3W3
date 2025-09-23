<?php

/**
 * Librairie des fonctions associes au module d'internationnalisation (i18n)
 */


/**
 * Retourne un array avec les codes des langues disponibles
 * en lisant les fichiers json dans le dossier i18n
 * 
 * @return array Tableau des codes (2 lettres) de langues disponibles.
 */
function obtenirLanguesDisponibles()
{
    // dossier i18n
    $i18nFolder = scandir("i18n");
    // print_r($i18nFolder);
    $langues = [];

    for ($i = 2; $i < count($i18nFolder); $i++) {
        $langueFichier = basename($i18nFolder[$i], '.json');
        array_push($langues, $langueFichier);
    }

    return $langues;
}


/**
 * Determine le code de la langue a utiliser
 * en fonction des langues disponibles, du cookie et de la querystring
 * 
 * @param array $languesDisponibles Tableau des codes de langues disponibles
 * 
 * @return string String du code de la langue (2 lettres)
 */
function determinerCodeLangue($languesDisponibles)
{
    // $languesDisponibles = obtenirLanguesDisponibles();
    // langue par défaut
    $langue = "fr";

    // recupere array assosiatif (index nommes) avec tous param requete http (querystring)
    if (isset($_COOKIE["lan"]) && in_array($_COOKIE["lan"], $languesDisponibles)) {
        $langue = $_COOKIE["lan"];
    }

    // langue dynamique (apres clique sur btn de langue)
    if (isset($_GET["lan"]) && in_array($_GET["lan"], $languesDisponibles)) {
        $langue = $_GET['lan'];
        // echo 'updated language';
        // retenir choix de langue dans temoin HTTP (cookie)
        setcookie("lan", $langue, time() + 60 * 60 * 24 * 30);
    }

    return $langue;
}


/**
 * Obtenir les textes statiques pour l'entete, le pied de page et la page specifique
 * 
 * @param string $codeLangue Code (2 lettres) de la langue
 * @param string $indicePage Etiquette associe avec la page affichee
 * 
 * @return array Tableau avec 3 objets (entete, pied, page specifique)
 */
function obtenirTextesStatiques($codeLangue, $indicePage)
{
    // lire fichier json
    $json = file_get_contents("i18n/$codeLangue.json");
    // convertir en objet (ou autre structure) php
    $obj = json_decode($json);
    // formattage indice page pour acceder a la propriete dynamique
    $propertyPageName = "page" . ucfirst($indicePage);

    return [$obj->moduleEntete, $obj->modulePied, $obj->$propertyPageName];
}
