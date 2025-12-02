<?php
// Libraire de fonctions pour gérer panier d'achats

// Étape 1: distribution "chariot" (panier utilisateur)
function validerPanierSession($cnx){
    if(!isset($_SESSION["idPanier"])){
        $idPanier = 0;
    
        // Étape 1: distribution "chariot" (panier utilisateur)
        if(isset($_COOKIE["teetim-panier"])){
            $codePanier = $_COOKIE["teetim-panier"];
            // Vérifier si le code correspond a un code de panier dans BD
            $verifPanier = read($cnx, "SELECT id FROM panier WHERE codePanier='$codePanier'");
            if(count($verifPanier) > 0){
                $idPanier = $verifPanier[0]["id"];
            }
        }
        if($idPanier === 0){
            // Générer code unique
            $codePanier = uniqid("teetim", true);
            // Enregistrer dans cookie
            setcookie("teetim-panier", $codePanier, time()+180*24*3600);
            // Insérer codePanier dans table panier
            $idPanier = create($cnx, "INSERT INTO panier VALUES (NULL, '$codePanier', NOW())");    
        }
        
        // Ajouter id panier dans session PHP
        $_SESSION["idPanier"] = $idPanier;
    }

    return $_SESSION["idPanier"];
}


// Étape 2: ajouter un article
function ajouterArticle($cnx, $idPanier, $idProduit){
    return create($cnx, 
        "INSERT INTO panier_articles VALUES (0, '$idProduit', 1, '$idPanier')");
}




// Étape 3: afficher sommaire panier (nb articles, sous-total)
// Étape 4: afficher detail panier
// Étape 5: supprimer un article
// Étape 6: modifier qty d'un article

