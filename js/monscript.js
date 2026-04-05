//cache le formulaire avec tous les filtres sur la page d'accueil
$("#rechercheCat").hide();

//quand on appuie sur le texte qui parle des catégories, le formulaire apparait ou disparait
$("legend").click(function() {
    $("#rechercheCat").toggle();
})