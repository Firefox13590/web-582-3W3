// Soumettre le formulaire de filtre et tri lorsqu'une option 
// dans l'une ou l'autre des listes change.
document.querySelectorAll("form.controle select").forEach(
    eltSelect => eltSelect.addEventListener("change", 
        evt => evt.target.form.submit()
    )
);


                                                // Gestion du panier d'achats 

// Géreré affichage des sommaires et du détail
function affichageActionsPanier(detailPanier){
    console.log("detail panier:", detailPanier);
}



// Ajouter 1 article
const listeBtnsProduits = document.querySelectorAll(".page-produits .btn-ajouter");
console.log(listeBtnsProduits);

listeBtnsProduits.forEach(elem => {
    elem.addEventListener("click", ajouterArticle);
});

/**
 * Ajouter un article au panier d'achats.
 * 
 * @param {Event} e 
 * 
 * @return {void}
 */
async function ajouterArticle(e){
    // console.log("Ajouter produit avec id: " + e.target.closest("div.produit").dataset.produitId);
    const produitId = e.target.closest("div.produit").dataset.produitId;

    // req async pour ajouter srticle dans panier user
    const req = await fetch("async/panier.async.php?action=ajouter&produitId=" + produitId);
    // console.log(req);
    const rep = await req.json();
    // console.log(rep);
    affichageActionsPanier(rep);
}


// Modifier la qty d'un article



// Supprimer 1 article


