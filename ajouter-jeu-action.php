<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameVersions - Ajouter un jeu</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="particles-canvas"></div>
    
    <nav class="glass-nav">
        <div class="nav-container">
            <div class="logo" id="easterEggTrigger">
                <div class="logo-3d">
                    <span>Game<span class="highlight">Versions</span></span>
                </div>
            </div>
            <div class="nav-links">
                <a href="index.html">Accueil</a>
                <a href="ajouter-jeu.html" class="active">Ajouter</a>
                <a href="contact.html">Contact</a>
                <a href="mentions-legales.html">Mentions</a>
            </div>
            <div class="mobile-menu-btn">
            </div>
        </div>
    </nav>

    <main class="form-page">

<?php 
//fonction de connexion et requete (requeteSQL) dans un script séparé
include("connexion.php");

//insère un jeu dans la base, avec toutes les valeurs en arguments
function insereJeu($id, $nom, $date, $genre, $difficulte) {
    if ($difficulte > 0)
        $req = "INSERT INTO jeu VALUES
                ($id, '".$nom."', '".$date."', '".$genre."', $difficulte);";
    else 
        $req = "INSERT INTO jeu VALUES
                ($id, '".$nom."', '".$date."', '".$genre."', NULL);";

    requeteSQL($req);
    return true;
}

//renvoie vrai s'il esxiste au moins un jeu avec cet id
function idPresent($id) {
    $req = "SELECT * FROM jeu
            WHERE numJeu = $id";

    $data = requeteSQL($req);
    if ($data->num_rows >0)
        return true;
    return false;
}

//on récupère les informations du formulaire 
$nom = $_POST['nom'];
$date = $_POST['dateSortie'];
$genre = $_POST['genre'];
$difficulte = $_POST['difficulte'];

//on génère un id aléatoire et on vérifie qu'il n'y a pas déjà un jeu avec cet id
do {
    $id = rand(1,100000);
} while (idPresent($id));

//on insère le jeu et on affiche un message
if (insereJeu($id, $nom, $date, $genre, $difficulte)) {
    echo '<h1>Jeu inséré dans la base !</h1>';
} else {
    echo '<h1>Erreur lors de l\'insertion du jeu dans la base de données</h1>';
}
echo '<p>Appuyer sur le bouton pour revenir à la page d\'accueil</p>';
echo '<button type="button" class="btn-submit" onclick="window.location.href=\'index.html\'">Revenir à l\'accueil</button>';

?>

    </main>

    <footer class="footer">
        <div class="footer-container">
            <div class="footer-col">
                <div class="footer-logo">
                    <span>Game<span>Versions</span></span>
                </div>
                <p>Le comparateur de versions de jeux vidéo.</p>
            </div>
            <div class="footer-col">
                <h4>Liens rapides</h4>
                <ul>
                    <li><a href="index.html">Accueil</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Légal</h4>
                <ul>
                    <li><a href="mentions-legales.html">Mentions légales</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2026 GameVersions - Tous droits réservés</p>
        </div>
    </footer>

</body>
</html>