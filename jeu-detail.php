<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameVersions - Détail du jeu</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="particles-canvas"></div>
    
    <nav class="glass-nav">
        <div class="nav-container">
            <div class="logo" id="easterEggTrigger">
                <div class="logo-3d">
                    <i class="fas fa-gamepad"></i>
                    <span>Game<span class="highlight">Versions</span></span>
                </div>
            </div>
            <div class="nav-links">
                <a href="index.html"><i class="fas fa-home"></i> Accueil</a>
                <a href="ajouter-jeu.html"><i class="fas fa-plus-circle"></i> Ajouter</a>
                <a href="contact.html"><i class="fas fa-envelope"></i> Contact</a>
                <a href="mentions-legales.html"><i class="fas fa-gavel"></i> Mentions</a>
            </div>
            <div class="mobile-menu-btn">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </nav>

    <main class="jeu-detail">
        <div class="container">
            <a href="index.html" class="back-link"><i class="fas fa-arrow-left"></i> Retour à l'accueil</a>
            
            <div class="jeu-header glass" id="jeuHeader">
                <div class="jeu-image">

<?php 

//fonction de connexion et requete (requeteSQL) dans un script séparé
include("connexion.php");

//recupère le nom, le genre, la date, l'image + le nombre de versions et de portages à partir id du jeu
function getInfosJeu($id) {
    $req = "SELECT j.nom, YEAR(j.dateSortie) AS annee, j.genre, l.image, 

(SELECT COUNT(v.numVersion) AS nbver 
            FROM jeu j INNER JOIN version v
            ON j.numJeu = v.numJeu
            WHERE j.numJeu =".$id.") AS nbVer,

(SELECT COUNT(v.numVersion) AS nbver
            FROM jeu j INNER JOIN version v
            ON j.numJeu = v.numJeu
            INNER JOIN portage p
            ON v.numVersion = p.numVersion
            WHERE j.numJeu =".$id.") AS nbPorts
            
            FROM jeu j INNER JOIN version v
            ON j.numJeu = v.numJeu
            INNER JOIN portage p
            ON v.numVersion = p.numVersion
            INNER JOIN localisation l
            ON p.numPortage = l.numPortage
            WHERE v.original = 1
            AND p.original = 1
            AND l.original = 1
            AND j.numJeu =".$id;

    $data = requeteSQL($req);
    return $data;
}

$id = $_GET['id'];
$data = getInfosJeu($id);
$row = $data->fetch_assoc();
$image = $row['image'];

//affiche l'image et les infos sur le jeu en haut de page
    echo '<img id="jeuCoverImage" src="data:image/jpg;base64,'.base64_encode($image) .'" alt="Jeu">';
echo '</div>';
echo '<div class="jeu-info">';
    echo '<h1 id="jeuNom">'.$row['nom'].'</h1>';
    echo '<div class="jeu-metadata">';
        echo '<span id="jeuAnnee" class="badge">'.$row['annee'].'</span>';
        echo '<span id="jeuGenre" class="badge">'.$row['genre'].'</span>';
    echo '</div>';
    echo '<div class="jeu-stats">';
        echo '<div class="stat">';
            echo '<span id="jeuNbVersions" class="value">'.$row['nbVer'].' Versions</span>';
        echo '</div>';
        echo '<div class="stat">';
            echo '<span id="jeuNbPlateformes" class="value">'.$row['nbPorts'].' Portages</span>';
        echo '</div>';
    echo '</div>';

?>



                    <button class="btn-add-version" onclick="window.location.href='ajouter-version.html'">
                        <i class="fas fa-plus"></i> Ajouter une Version
                    </button>
                </div>
            </div>

            <div class="comparative-table glass">
                <h2><i class="fas fa-table-list"></i> Tableau comparatif des versions</h2>
                <div class="table-responsive">
                    <table class="compare-table">
                        <thead>
                            <tr><th>Nom</th><th>Date sortie</th><th>Contenu additionnel ?</th><th>Difficulté comparé à l'original</th><th>Note</th><th>Description</th></tr>
                        </thead>
                        <tbody id="portageTableBody">

<?php 
//fonction de connexion et requete (requeteSQL) dans un script séparé
include_once("connexion.php");

function getInfosVer($id) {
    $req = "SELECT v.nom, v.dateSortie, v.contenuAdditionnel AS addi, 
            v.difficulteRelative AS diff, v.noteVersion AS note, v.description, v.original
            FROM jeu j INNER JOIN version v
            ON j.numJeu = v.numJeu
            WHERE j.numJeu =".$id;

    $data = requeteSQL($req);
    return $data;
} 

$id = $_GET['id'];
$data = getInfosVer($id);
//remplit le tableau comparant les versions
while ($row = $data->fetch_assoc()) {
    echo '<tr><td>'.$row['nom'].'</td><td>'.$row['dateSortie'].'</td><td>';
    //affiche s'il y a du contenu additionnel
    if ($row['addi'] ==1)
        echo 'Oui</td><td>';
    else 
        echo 'Non</td><td>';

    //affiche la difficulté relative
    if ($row['diff'] ==1)
        echo 'Plus difficile</td><td>';
    else if ($row['diff'] == -1)
        echo 'Moins difficile</td><td>';
    else
        echo 'Identique</td><td>';

    //affiche note si n'est pas l'original
    if ($row['original'] ==1)
        echo 'Original</td><td>';
    else 
        echo $row['note'].'</td><td>';

    //affiche description si n'est pas l'original
    if ($row['original'] ==1)
        echo 'Original</td></tr>';
    else 
        echo $row['description'].'</td></tr>';
}

?>

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="changes-section glass">
                <h2><i class="fas fa-language"></i> Détails des changements</h2>
                <div id="changesGrid" class="changes-grid">
                    <div class="loading-spinner"><i class="fas fa-spinner fa-spin"></i> Chargement...</div>
                </div>
            </div>

            <div class="comparative-table glass">
                <h2><i class="fas fa-table-list"></i> Tableau comparatif des portages</h2>
                <div class="table-responsive">
                    <table class="compare-table">
                        <thead>
                            <tr><th>Plateforme</th><th>Résolution</th><th>Framerate</th><th>Stabilité</th><th>Latence</th><th>Date sortie</th><th>Note</th></tr>
                        </thead>
                        <tbody id="portageTableBody">
                            <tr><td colspan="7" class="loading-spinner">Chargement...</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="changes-section glass">
                <h2><i class="fas fa-language"></i> Détails des changements</h2>
                <div id="changesGrid" class="changes-grid">
                    <div class="loading-spinner"><i class="fas fa-spinner fa-spin"></i> Chargement...</div>
                </div>
            </div>

            <div class="comparative-table glass">
                <h2><i class="fas fa-table-list"></i> Tableau comparatif des localisations</h2>
                <div class="table-responsive">
                    <table class="compare-table">
                        <thead>
                            <tr><th>Plateforme</th><th>Résolution</th><th>Framerate</th><th>Stabilité</th><th>Latence</th><th>Date sortie</th><th>Note</th></tr>
                        </thead>
                        <tbody id="portageTableBody">
                            <tr><td colspan="7" class="loading-spinner">Chargement...</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="changes-section glass">
                <h2><i class="fas fa-language"></i> Détails des changements</h2>
                <div id="changesGrid" class="changes-grid">
                    <div class="loading-spinner"><i class="fas fa-spinner fa-spin"></i> Chargement...</div>
                </div>
            </div>

        </div>
    </main>

    <footer class="footer">
        <div class="footer-container">
            <div class="footer-col">
                <div class="footer-logo"><i class="fas fa-gamepad"></i><span>Game<span>Versions</span></span></div>
                <p>Le comparateur de versions de jeux vidéo.</p>
            </div>
            <div class="footer-col">
                <h4>Liens rapides</h4>
                <ul><li><a href="index.html">Accueil</a></li><li><a href="contact.html">Contact</a></li></ul>
            </div>
            <div class="footer-col">
                <h4>Légal</h4>
                <ul><li><a href="mentions-legales.html">Mentions légales</a></li></ul>
            </div>
        </div>
        <div class="footer-bottom"><p>&copy; 2026 GameVersions - Tous droits réservés</p></div>
    </footer>

</body>
</html>    