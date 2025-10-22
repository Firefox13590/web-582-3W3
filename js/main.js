// soumettre formulaire filtre et tri lorsqu'une des options change
document.querySelectorAll("form.controle select").forEach(
    (elem) => {
        elem.addEventListener("change", (e) => e.target.form.submit());
    }
);

