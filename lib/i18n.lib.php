<?php

/**
 * Librairie des fonctions associées au module d'internationnalisation (i18n)
 */

/**
 * Obtenir les langues disponibles.
 * 
 * @return array Tableau des codes (2 lettres) de langues disponibles.
 */
function obtenirLanguesDisponibles(): array
{
    $langues = [];
    $contenuI18n = scandir("i18n");
    // Améliorer ce code (à l'aide de Copilot ou vos propres idées).
    foreach ($contenuI18n as $nomFichier) {
        if ($nomFichier != "." && $nomFichier != "..") {
            $langues[] = substr($nomFichier, 0, 2);
        }
    }
    return $langues;
}

/**
 * Déterminer le code de la langue active dans le site.
 * 
 * @param array $codeLangues Tableau des codes de langues disponibles.
 * 
 * @return string Chaîne représentant le code de la langue.
 */
function determinerCodeLangue(array $codesLangues): string
{
    // Langue par défaut
    $langue = "fr";

    // Langue présélectionnée dans un cookie
    if (isset($_COOKIE["langueChoisie"]) && in_array($_COOKIE["langueChoisie"], $codesLangues)) {
        $langue = $_COOKIE["langueChoisie"];
    }
    // Langue choisie par l'utilisateur dans la barre de navigation
    if (isset($_GET["lan"]) && in_array($_GET["lan"], $codesLangues)) {
        $langue = $_GET["lan"];
        setcookie("langueChoisie", $langue, time() + 365 * 24 * 60 * 60);
    }

    return $langue;
}

/**
 * Obtenir les textes statiques pour l'entête, le pied de page et la page spécifique.
 * 
 * @param string $codeLangue Code de la langue dans laquelle on veut les textes.
 * @param string $page Étiquette associée avec la page affichée.
 * 
 * @return array Tableau contenant 3 objets (entête, pied de page, page spécifique).
 */
function recupererTextesStatiques(string $codeLangue, string $page): array
{
    $textesChaineJson =  file_get_contents("i18n/" . $codeLangue . ".json");
    $textes = json_decode($textesChaineJson);
    return [
        $textes->entete,
        $textes->pied2page,
        $textes->$page,
        $textes->catalogue
    ];
}

// Méthode 1 (plus complète, mais remplacée par une façon plus rapide en une ligne)
/*
function obtenirFormatteurNombre($locale) {
    return new NumberFormatter($locale, NumberFormatter::CURRENCY);
}
*/
