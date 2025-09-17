<?php
/*********************** LECTURE DYNAMIQUE DES LANGUES DISPOS *********/
$languesDisponibles = [];
$contenuI18n = scandir("i18n");
// Améliorer ce code (à l'aide de Copilot ou vos propres idées).
foreach ($contenuI18n as $nomFichier) {
    if($nomFichier != "." && $nomFichier != "..") {
        $languesDisponibles[] = substr($nomFichier, 0, 2);
    }
}

/*********************** INTERACTIVITÉ DE CHANGEMENT DE LANGUE ********/
    // Récupérer le tableau qui contient tous les paramètres de la requête HTTP (QUERYSTRING)
    
    // Langue par défaut
    $langue = "fr";

    // Si l'utilisateur a fait un choix de langue dans le passé, il faut 
    // l'utiliser (donc il faut vérifier s'il y a un témoin HTTP nommé 
    // "langueChoisie")
    // Remarquez la condition additionnelle pour valider que la langue
    // choisie est bien dans la liste des langues disponibles.
    if(isset($_COOKIE["langueChoisie"]) && in_array($_COOKIE["langueChoisie"], $languesDisponibles)) {
        $langue = $_COOKIE["langueChoisie"];
    }

    // Si l'utilisateur clique un des boutons de langues disponibles
    // Remarquez la condition additionnelle pour valider que la langue
    // choisie est bien dans la liste des langues disponibles.
    if(isset($_GET["lan"]) && in_array($_GET["lan"], $languesDisponibles)) {
        $langue = $_GET["lan"];
        // Retenir le choix de langue dans un témoin HTTP (cookie)
        // Date d'expiration dans le futur (3 mois)
        setcookie("langueChoisie", $langue, time()+365*24*60*60);
    }

/********************** EXTERNALISATION DES TEXTES STATIQUES **********/
    // Lire le fichier JSON qui contient les textes.
    $textesChaineJson =  file_get_contents("i18n/".$langue.".json");
    // Test
    // echo $textesChaineJson;

    // Convertir la chaîne de caractères JSON en objet (ou autre structure de données) PHP.
    $textes = json_decode($textesChaineJson);
    // Test
    // echo $textes; // ERREUR : on ne peut pas "imprimer" une structure (comme un objet ou un tableau)
    // Utiliser les méthodes print_r() ou var_dump() à la place : 
    // print_r($textes);
    // var_dump($textes)

    // Quelques raccourcis utiles pour cet objet ($textes)
    $_ent = $textes->entete;
    $_pp = $textes->pied2page;

    $_ = $textes->$page;

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;500;900&family=Noto+Serif:ital,wght@0,400;0,900;1,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>teeTIM // fibre naturelle ... conception artificielle</title>
    <meta name="description" content="Page d'accueil du concepteur de vêtements 100% fait au Québec, conçus par les étudiants du TIM à l'aide de designs produits par intelligence artificielle, et fabriqués avec des fibres 100% naturelles et biologiques.">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="icon" type="image/png" href="images/favicon.png" />
</head>
<body>
    <div class="conteneur">
        <header>
            <nav class="barre-haut">
                <!-- Générer les boutons de choix de langue dynamiquement en PHP -->
                
                <?php
                    // Méthode 1 : moins désirable
                    // foreach ($languesDisponibles as $codeLangue) {
                    //     echo "<a href='?lan=$codeLangue'>$codeLangue</a>";
                    // }
                ?>
                <?php foreach($languesDisponibles as $codeLangue) :  ?>
                    <a 
                        <?= $langue==$codeLangue ? 'class="actif"' : '' ?>
                        href="?lan=<?= $codeLangue; ?>"
                    >
                        <?= $codeLangue; ?>
                    </a>
                <?php endforeach ?>
            </nav>
            <nav class="barre-logo">
                <label for="cc-btn-responsive" class="material-icons burger">menu</label>
                <a class="logo" href="index.php"><img src="images/logo.png" alt="<?= $_ent->logoAlt; ?>"></a>
                <a class="material-icons panier" href="panier.php">shopping_cart</a>
                <input class="recherche" type="search" name="motscles" placeholder="<?= $_ent->recherchePlaceholder; ?>">
            </nav>
            <input type="checkbox" id="cc-btn-responsive">
            <nav class="principale">
                <label for="cc-btn-responsive" class="menu-controle material-icons">close</label>
                <a <?= $page=="teeshirts" ? ' class="actif" ' : '' ?> href="teeshirts.php"><?= $_ent->menuTeeshirts; ?></a>
                <a <?= $page=="casquettes" ? ' class="actif" ' : '' ?> href="casquettes.php"><?= $_ent->menuCasquettes; ?></a>
                <a <?= $page=="hoodies" ? ' class="actif" ' : '' ?> href="hoodies.php"><?= $_ent->menuHoodies; ?></a>
                <span class="separateur"></span>
                <a <?= $page=="aide" ? ' class="actif" ' : '' ?> href="aide.php"><?= $_ent->menuAide; ?></a>
                <a <?= $page=="apropos" ? ' class="actif" ' : '' ?> href="apropos.php"><?= $_ent->menuNous; ?></a>
            </nav>
        </header>