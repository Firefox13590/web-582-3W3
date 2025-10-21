// Soumettre le formulaire de filtre et tri lorsqu'une option 
// dans l'une ou l'autre des listes change.
document.querySelectorAll("form.controle select").forEach(
    eltSelect => eltSelect.addEventListener("change", 
        evt => evt.target.form.submit()
    )
);