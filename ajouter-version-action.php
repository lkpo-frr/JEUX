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

//insère une version dans la base, avec toutes les valeurs en arguments
function insereVer($nom, $date, $description, $difficulte, $addi, $note, $original, $id) {
    if ($note == NULL && $description == NULL)
        $req = "INSERT INTO version (nom, dateSortie, description, difficulteRelative, contenuAdditionnel, noteVersion, original, numJeu)
                VALUES ('".$nom."', '".$date."', NULL, $difficulte, $addi, NULL, $original, $id);";
    else if ($note == NULL)
        $req = "INSERT INTO version (nom, dateSortie, description, difficulteRelative, contenuAdditionnel, noteVersion, original, numJeu)
                VALUES ('".$nom."', '".$date."', '".$description."', $difficulte, $addi, NULL, $original, $id);";
    else if ($description == NULL)
        $req = "INSERT INTO version (nom, dateSortie, description, difficulteRelative, contenuAdditionnel, noteVersion, original, numJeu)
                VALUES ('".$nom."', '".$date."', NULL, $difficulte, $addi, $note, $original, $id);";
    else 
        $req = "INSERT INTO version (nom, dateSortie, description, difficulteRelative, contenuAdditionnel, noteVersion, original, numJeu)
                VALUES ('".$nom."', '".$date."', '".$description."', $difficulte, $addi, $note, $original, $id);";

    requeteSQL($req);
    return true;
}

//on récupère les informations du formulaire 
$id = $_POST['id'];
$nom = $_POST['nomVer'];
$original = $_POST['original'];
$date = $_POST['dateSortie'];
$addi = $_POST['addi'];
$difficulte = $_POST['diff'];
if (isset($_POST['note']))
    $note = $_POST['note'];
else
    $note = NULL;

if (isset($_POST['description']))
    $description = $_POST['description'];
else
    $description = NULL;

//on insère la version et on affiche un message
if (insereVer($nom, $date, $description, $difficulte, $addi, $note, $original, $id)) {
    echo '<h1>Version insérée dans la base !</h1>';
} else {
    echo '<h1>Erreur lors de l\'insertion de la version dans la base de données</h1>';
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