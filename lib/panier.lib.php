<?php
// Libraire de fonctions pour gérer panier d'achats



// Étape 1: distribution "chariot" (panier utilisateur)
/**
 * Valider l'existence d'un panier dans la session PHP.
 * Si pas de panier, en créer un nouveau et l'associer à la session.
 * 
 * @param mysqli $cnx Ressource de connexion à la base de données.
 * 
 * @return int Identifiant du panier.
 */
function validerPanierSession(mysqli $cnx): int{
    if(!isset($_SESSION["panierId"])){
        $panierId = 0;
    
        // Étape 1: distribution "chariot" (panier utilisateur)
        if(isset($_COOKIE["teetim-panier"])){
            $codePanier = $_COOKIE["teetim-panier"];
            // Vérifier si le code correspond a un code de panier dans BD
            $verifPanier = read($cnx, "SELECT id FROM panier WHERE codePanier='$codePanier'");
            if(count($verifPanier) > 0){
                $panierId = $verifPanier[0]["id"];
            }
        }
        if($panierId === 0){
            // Générer code unique
            $codePanier = uniqid("teetim", true);
            // Enregistrer dans cookie
            setcookie("teetim-panier", $codePanier, time()+180*24*3600);
            // Insérer codePanier dans table panier
            $panierId = create($cnx, "INSERT INTO panier VALUES (NULL, '$codePanier', NOW())");    
        }
        
        // Ajouter id panier dans session PHP
        $_SESSION["panierId"] = $panierId;
    }

    return $_SESSION["panierId"];
}



// Étape 2: ajouter un article
/**
 * Ajouter un article au panier.
 * 
 * @param mysqli $cnx Ressource de connexion à la base de données.
 * @param int $panierId Identifiant du panier.
 * @param int $produitId Identifiant du produit à ajouter.
 * 
 * @return int Identifiant de l'article ajouté.
 */
function ajouterArticle(mysqli $cnx, int $panierId, int $produitId): int{
    try{
        return create($cnx, 
            "INSERT INTO panier_articles VALUES (0, '$produitId', 1, '$panierId')");
    }catch(Exception $e){
        return update($cnx, 
            "UPDATE panier_articles SET qty = qty + 1 WHERE produitId = '$produitId'");
    }

    // return create($cnx, 
    //     "INSERT INTO panier_articles VALUES (0, '$produitId', 1, '$panierId')");
}



// Étape 3: afficher sommaire panier (nb articles, sous-total)
function obtenirDetailPanier($cnx, $panierId){
    // obtenir detail panier d'un user (un navigateur), aka:
    // pour un panierId donné, get (produitId, nom, prix, qty panier_articles, image, produitId panier_articles)
    return read($cnx, 
        "SELECT panier_articles.*, prix, nom, fichierImage
        FROM panier_articles
        JOIN produits ON produits.id = produitId
        WHERE panierId = '$panierId'");
}



// Étape 4: afficher detail panier
// fonction obtenir nb articles dans panier a partir tableau deja obtenu via sql
// attention: nb articles est somme qty articles dans panier user

// fonction obtenir sous-total dans panier a partir tableau deja obtenu via sql



// Étape 5: supprimer un article
// Étape 6: modifier qty d'un article

