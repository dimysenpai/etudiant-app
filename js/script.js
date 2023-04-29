const addEtudiant = document.getElementById("add_etudiant");
const annuler = document.getElementById("annuler");
const formApp = document.getElementById("form_app");

addEtudiant.addEventListener("click", function () {
  formApp.classList.remove("hide");
});
annuler.addEventListener("click", function () {
  console.log(annuler);
  formApp.classList.add("hide");
});
