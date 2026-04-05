<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameVersions - Détail du jeu</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include('header.inc.php'); ?>

    <main class="jeu-detail">
        <div class="container">
            <a href="index.html" class="back-link">Retour à l'accueil</a>
            
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
            WHERE j.numJeu =$id) AS nbVer,

(SELECT COUNT(v.numVersion) AS nbver
            FROM jeu j INNER JOIN version v
            ON j.numJeu = v.numJeu
            INNER JOIN portage p
            ON v.numVersion = p.numVersion
            WHERE j.numJeu =$id) AS nbPorts
            
            FROM jeu j INNER JOIN version v
            ON j.numJeu = v.numJeu
            INNER JOIN portage p
            ON v.numVersion = p.numVersion
            INNER JOIN localisation l
            ON p.numPortage = l.numPortage
            WHERE v.original = 1
            AND p.original = 1
            AND l.original = 1
            AND j.numJeu =$id;";

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

    //début du formulaire qui permet d'ajouter une nouvelle version en récupérant automatiquement l'id du jeu
    echo '<form action="ajouter-version.php" method="GET">';
        echo '<input type="hidden" name="id" value='.$id.'>';

?>

                        <button class="btn-add-version" type="submit">Ajouter une Version</button>
                    </form>
                </div>
            </div>

            <div class="comparative-table glass">
                <h2>Tableau comparatif des versions</h2>
                <div class="table-responsive">
                    <table class="compare-table">
                        <thead>
                            <tr><th>Nom</th><th>Date sortie</th><th>Contenu additionnel ?</th><th>Difficulté comparé à l'original</th><th>Note /10 (5 = équivalent à l'original)</th><th>Description</th></tr>
                        </thead>
                        <tbody id="portageTableBody">

<?php 

function getInfosVer($id) {
    $req = "SELECT v.numVersion, v.nom, v.dateSortie, v.contenuAdditionnel AS addi, 
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
        echo '✅Oui</td><td>';
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
                <h2>Détails des changements</h2>
                <form action="jeu-detail.php" method="GET">

<?php 

//récupère la liste des changements d'une version d'un certain type
function getChangeVer($version, $type) {
    $req = "SELECT c.type, c.description, c.important 
            FROM `changeVersion` c INNER JOIN version v
            ON c.numVersion = v.numVersion
            WHERE v.numVersion =".$version;

    $req = $req." AND c.type ='".$type."'
            ORDER BY important DESC;";

    $data = requeteSQL($req);
    return $data;
}

$id = $_GET['id'];
$data = getInfosVer($id);
//on conserve la valeur de l'id du jeu
echo '<input type="hidden" name="id" value='.$id.'>';
//crée un bouton radio pour chaque version, de valeur 0 si c'est l'original ou égale à numVersion sinon
while ($row = $data->fetch_assoc()) {
    if ($row['original'] == 1)
        echo '<label><input type="radio" name="choixVer" value="0"';
    else
        echo '<label><input type="radio" name="choixVer" value="'.$row['numVersion'].'"';
    //permet de cocher automatiquement la version qui a été sélectionnée
    //submitVer permet de savoir si on a coché une version
    if (!isset($_GET['submitVer']) && $row['original'] == 1)
        echo ' checked >'.$row['nom'].'     '.'</label>';
    else if (isset($_GET['submitVer']) && $_GET['choixVer'] == 0 && $row['original'] == 1)
        echo ' checked >'.$row['nom'].'     '.'</label>';
    else if (isset($_GET['submitVer']) && $row['numVersion'] == $_GET['choixVer'])
        echo ' checked >'.$row['nom'].'     '.'</label>';
    else
        echo ' >'.$row['nom'].'     '.'</label>';
}
echo '<button type="submit" name="submitVer" class="btn-add-version">Valider</button>';
echo '</form>';

echo '<div id="changesGrid" class="changes-grid">';
//affichage de la liste des changements pour chaque catégories
if (!isset($_GET['submitVer']) || $_GET['choixVer'] == 0 )
    echo '<div class="loading-spinner">Version Originale</div>';
else {
    $version = $_GET['choixVer'];

    $data = getChangeVer($version, 'Gameplay');
    echo '<div class="change-card censorship"><h3>Gameplay</h3><ul class="change-card">';
    while ($row = $data->fetch_assoc()) {
        if ($row['important'] == 1)
            echo '<li>'.$row['description'].'</li>';
        else
            echo '<li><em>'.$row['description'].'</em></li>';
    }
    echo '</ul></div>';

    $data = getChangeVer($version, 'Graphismes');
    echo '<div class="change-card restored"><h3>Graphismes</h3><ul class="change-card">';
    while ($row = $data->fetch_assoc()) {
        if ($row['important'] == 1)
            echo '<li>'.$row['description'].'</li>';
        else
            echo '<li><em>'.$row['description'].'</em></li>';
    }
    echo '</ul></div>';
}
?>
                
                    
                </div>
            </div>

            <div class="comparative-table glass">
                <h2>Tableau comparatif des portages</h2>
                <div class="table-responsive">
                    <table class="compare-table">
                        <thead>
                            <tr><th>Plateforme</th><th>Résolution</th><th>Framerate</th><th>Stabilité</th><th>Latence supplémentaire</th><th>Contenu modifié ?</th><th>Date sortie</th><th>Note /10</th></tr>
                        </thead>
                        <tbody id="portageTableBody">

<?php 
//récupère les infos sur les portages de la version originale du jeu
function getInfosPortOriginal($id) {
    $req = "SELECT numPortage, p.dateSortie, p.resolution, p.framerate, p.stable, 
    p.lagSup, p.modifContenu, p.original, pla.nom, p.notePortage, v.numVersion AS ver
            FROM jeu j INNER JOIN version v
            ON j.numJeu = v.numJeu
            INNER JOIN portage p
            ON v.numVersion = p.numVersion
            INNER JOIN plateforme pla
            ON p.numPlateforme = pla.numPlateforme
            WHERE v.original = 1
            AND j.numJeu = ".$id;

    $data = requeteSQL($req);
    return $data;
} 

//récupère les infos sur les portages de la version en argument
function getInfosPort($version) {
    $req = "SELECT numPortage, p.dateSortie, p.resolution, p.framerate, p.stable, 
    p.lagSup, p.modifContenu, p.original, pla.nom, p.notePortage
            FROM version v INNER JOIN portage p
            ON v.numVersion = p.numVersion
            INNER JOIN plateforme pla
            ON p.numPlateforme = pla.numPlateforme
            WHERE v.numVersion = ".$version;

    $data = requeteSQL($req);
    return $data;
} 

if (!isset($_GET['submitVer']) || $_GET['choixVer'] == 0 ) {
    $id = $_GET['id'];
    $data = getInfosPortOriginal($id);
} else {
    $version = $_GET['choixVer'];
    $data = getInfosPort($version);
}

//remplit le tableau comparant les ports
while ($row = $data->fetch_assoc()) {
    echo '<tr><td>'.$row['nom'].'</td><td>'.$row['resolution'].'</td><td>'.$row['framerate'].'</td><td>';
    //affiche si le jeu est stable
    if ($row['stable'] ==1)
        echo 'Oui</td><td>';
    else 
        echo '⚠️Non</td><td>';

    //affiche s'il a de la latence en plus
    if ($row['lagSup'] ==1)
        echo '⚠️Oui</td><td>';
    else
        echo 'Non</td><td>';

    //affiche s'i a du contenu en plus
    if ($row['modifContenu'] ==1)
        echo '✅Oui</td><td>';
    else
        echo 'Non</td><td>';

    echo $row['dateSortie'].'</td><td>';
    //affiche note si n'est pas l'original
    if ($row['original'] ==1)
        echo 'Original</td></tr>';
    else 
        echo $row['notePortage'].'</td></tr>';
}

?>

                        </tbody>
                    </table>
                </div>
            </div>

            <div id="ici" class="changes-section glass">
                <h2>Détails des changements</h2>
                <form action="#" method="GET">

<?php 

//récupère la liste des changements d'un port d'un certain type
function getChangePort($port, $type) {
    $req = "SELECT c.type, c.description, c.important 
            FROM `changePortage` c INNER JOIN portage p
            ON c.numPortage = p.numPortage
            WHERE p.numPortage = ".$port;

    $req = $req." AND c.type ='".$type."'
            ORDER BY important DESC;";

    $data = requeteSQL($req);
    return $data;
}

$id = $_GET['id'];

if (!isset($_GET['submitVer']) || $_GET['choixVer'] == 0 ) {
    $data = getInfosPortOriginal($id);
    $version = 0;
} else {
    $version = $_GET['choixVer'];
    $data = getInfosPort($version);
}

//on conserve la valeur de l'id du jeu et de la version
echo '<input type="hidden" name="id" value='.$id.'>';
echo '<input type="hidden" name="choixVer" value='.$version.'>';
echo '<input type="hidden" name="submitVer" value="">';
//crée un bouton radio pour chaque port, de valeur 0 si c'est l'original ou égale à numPortage sinon
while ($row = $data->fetch_assoc()) {
    if ($row['original'] == 1)
        echo '<label><input type="radio" name="choixPort" value="0"';
    else
        echo '<label><input type="radio" name="choixPort" value="'.$row['numPortage'].'"';
    //permet de cocher automatiquement le port qui a été sélectionné
    //submitPort permet de savoir si on a coché un port
    if (!isset($_GET['submitPort']) && $row['original'] == 1)
        echo ' checked >'.$row['nom'].'     '.'</label>';
    else if (isset($_GET['submitPort']) && $_GET['choixPort'] == 0 && $row['original'] == 1)
        echo ' checked >'.$row['nom'].'     '.'</label>';
    else if (isset($_GET['submitPort']) && $row['numPortage'] == $_GET['choixPort'])
        echo ' checked >'.$row['nom'].'     '.'</label>';
    else
        echo ' >'.$row['nom'].'     '.'</label>';
}
echo '<button type="submit" name="submitPort" class="btn-add-version">Valider</button>';
echo '</form>';

echo '<div id="changesGrid" class="changes-grid">';
//affichage de la liste des changements pour chaque catégorie
if (!isset($_GET['submitPort']) || $_GET['choixPort'] == 0 )
    echo '<div class="loading-spinner">Portage Original</div>';
else {
    $port = $_GET['choixPort'];
    //catégorie Gameplay
    $data = getChangePort($port, 'Gameplay');
    echo '<div class="change-card censorship"><h3>Gameplay</h3><ul class="change-card">';
    while ($row = $data->fetch_assoc()) {
        if ($row['important'] == 1)
            echo '<li>'.$row['description'].'</li>';
        else
            echo '<li><em>'.$row['description'].'</em></li>';
    }
    echo '</ul></div>';
    //catégorie Contenu additionnel
    $data = getChangePort($port, 'Contenu additionnel');
    echo '<div class="change-card restored"><h3>Contenu additionnel</h3><ul class="change-card">';
    while ($row = $data->fetch_assoc()) {
        if ($row['important'] == 1)
            echo '<li>'.$row['description'].'</li>';
        else
            echo '<li><em>'.$row['description'].'</em></li>';
    }
    echo '</ul></div>';
    //catégorie Bugs
    $data = getChangePort($port, 'Bugs');
    echo '<div class="change-card easter"><h3>Bugs</h3><ul class="change-card">';
    while ($row = $data->fetch_assoc()) {
        if ($row['important'] == 1)
            echo '<li>'.$row['description'].'</li>';
        else
            echo '<li><em>'.$row['description'].'</em></li>';
    }
    echo '</ul></div>';
}
    
?>

                </div>
            </div>

            <div class="comparative-table glass">
                <h2>Tableau comparatif des localisations</h2>
                <div class="table-responsive">
                    <table class="compare-table">
                        <thead>
                            <tr><th>Région</th><th>Date de sortie</th><th>Contenu modifié ?</th></tr>
                        </thead>
                        <tbody id="portageTableBody">

<?php 
//récupère les infos sur les localisations de la version originale et du portage original du jeu
function getInfosLocaOriginal($id) {
    $req = "SELECT numLocalisation, l.region, l.dateSortie, l.modifContenu, l.original
            FROM jeu j INNER JOIN version v
            ON j.numJeu = v.numJeu
            INNER JOIN portage p
            ON v.numVersion = p.numVersion
            INNER JOIN localisation l
            ON p.numPortage = l.numPortage
            WHERE v.original = 1
            AND p.original = 1
            AND j.numJeu = ".$id;

    $data = requeteSQL($req);
    return $data;
} 

//récupère les infos sur les localisations de la version en argument
function getInfosLocaVer($version) {
    $req = "SELECT numLocalisation, l.region, l.dateSortie, l.modifContenu, l.original
            FROM version v INNER JOIN portage p
            ON v.numVersion = p.numVersion
            INNER JOIN localisation l
            ON p.numPortage = l.numPortage
            AND p.original = 1
            AND v.numVersion = ".$version;

    $data = requeteSQL($req);
    return $data;
} 

//récupère les infos sur les localisations du portage en argument
function getInfosLoca($port) {
    $req = "SELECT numLocalisation, l.region, l.dateSortie, l.modifContenu, l.original
            FROM portage p INNER JOIN localisation l
            ON p.numPortage = l.numPortage
            AND p.numPortage = ".$port;

    $data = requeteSQL($req);
    return $data;
} 

//on récupère les données de localisation en fonction soit du numéro du port , de la version ou du jeu
if (isset($_GET['submitPort']) && $_GET['choixPort'] != 0 ) {
    $port = $_GET['choixPort'];
    $data = getInfosLoca($port);
} else if (isset($_GET['submitVer']) && $_GET['choixVer'] != 0) {
    $version = $_GET['choixVer'];
    $data = getInfosLocaVer($version);
} else {
    $id = $_GET['id'];
    $data = getInfosLocaOriginal($id);
}

//remplit le tableau comparant les localisations
while ($row = $data->fetch_assoc()) {
    echo '<tr><td>'.$row['region'].'</td><td>'.$row['dateSortie'].'</td><td>';

    //affiche si la localisation a modifié le contenu
    if ($row['modifContenu'] ==1)
        echo '⚠️Oui</td></tr>';
    else
        echo 'Non</td></tr>';
}

?>

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="changes-section glass">
                <h2>Détails des changements</h2>
                <form action="#" method="GET">

<?php 

//récupère la liste des changements d'une localisation d'un certain type
function getChangeLoca($loca, $type) {
    $req = "SELECT c.type, c.description, c.important 
            FROM `changeLocale` c INNER JOIN localisation l
            ON c.numLocalisation = l.numLocalisation
            WHERE l.numLocalisation = ".$loca;

    $req = $req." AND c.type ='".$type."'
            ORDER BY important DESC;";

    $data = requeteSQL($req);
    return $data;
}

$id = $_GET['id'];
$version = 0;
$port = 0;

//on récupère les données de localisation en fonction soit du numéro du port , de la version ou du jeu
if (isset($_GET['submitPort']) && $_GET['choixPort'] != 0 ) {
    $port = $_GET['choixPort'];
    $version = $_GET['choixVer'];
    $data = getInfosLoca($port);
} else if (isset($_GET['submitVer']) && $_GET['choixVer'] != 0) {
    $version = $_GET['choixVer'];
    $data = getInfosLocaVer($version);
} else {
    $data = getInfosLocaOriginal($id);
}

//on conserve la valeur de l'id du jeu, de la version et du port
echo '<input type="hidden" name="id" value='.$id.'>';
echo '<input type="hidden" name="choixVer" value='.$version.'>';
echo '<input type="hidden" name="submitVer" value="">';
echo '<input type="hidden" name="choixPort" value='.$port.'>';
echo '<input type="hidden" name="submitPort" value="">';
//crée un bouton radio pour chaque localisation, de valeur 0 si c'est l'original ou égale à numPortage sinon
while ($row = $data->fetch_assoc()) {
    if ($row['original'] == 1)
        echo '<label><input type="radio" name="choixLoca" value="0"';
    else
        echo '<label><input type="radio" name="choixLoca" value="'.$row['numLocalisation'].'"';
    //permet de cocher automatiquement la localisation qui a été sélectionnée
    //submitLoca permet de savoir si on a coché une localisation
    if (!isset($_GET['submitLoca']) && $row['original'] == 1)
        echo ' checked >'.$row['region'].'     '.'</label>';
    else if (isset($_GET['submitLoca']) && $_GET['choixLoca'] == 0 && $row['original'] == 1)
        echo ' checked >'.$row['region'].'     '.'</label>';
    else if (isset($_GET['submitLoca']) && $row['numLocalisation'] == $_GET['choixLoca'])
        echo ' checked >'.$row['region'].'     '.'</label>';
    else
        echo ' >'.$row['region'].'     '.'</label>';
}
echo '<button type="submit" name="submitLoca" class="btn-add-version">Valider</button>';
echo '</form>';

echo '<div id="changesGrid" class="changes-grid">';
//affichage de la liste des changements pour chaque catégorie
if (!isset($_GET['submitLoca']) || $_GET['choixLoca'] == 0 )
    echo '<div class="loading-spinner">Localisation Originale</div>';
else {
    $loca = $_GET['choixLoca'];
    //catégorie Gameplay
    $data = getChangeLoca($loca, 'Gameplay');
    echo '<div class="change-card censorship"><h3>Gameplay</h3><ul class="change-card">';
    while ($row = $data->fetch_assoc()) {
        if ($row['important'] == 1)
            echo '<li>'.$row['description'].'</li>';
        else
            echo '<li><em>'.$row['description'].'</em></li>';
    }
    echo '</ul></div>';
    //catégorie Traduction
    $data = getChangeLoca($loca, 'Traduction');
    echo '<div class="change-card restored"><h3>Traduction</h3><ul class="change-card">';
    while ($row = $data->fetch_assoc()) {
        if ($row['important'] == 1)
            echo '<li>'.$row['description'].'</li>';
        else
            echo '<li><em>'.$row['description'].'</em></li>';
    }
    echo '</ul></div>';
    //catégorie Censure
    $data = getChangeLoca($loca, 'Censure');
    echo '<div class="change-card easter"><h3>Censure</h3><ul class="change-card">';
    while ($row = $data->fetch_assoc()) {
        if ($row['important'] == 1)
            echo '<li>'.$row['description'].'</li>';
        else
            echo '<li><em>'.$row['description'].'</em></li>';
    }
    echo '</ul></div>';
}
    
?>

                </div>
            </div>

            <div class="changes-section glass">
                <h2>Image de la boite de jeu</h2>
                <div id="changesGrid" class="change-card">

<?php 
//récupère l'image du jeu à partir de son Id uniquement
function getImageId($id) {
    $req = "SELECT l.image
            FROM jeu j INNER JOIN version v
            ON j.numJeu = v.numJeu
            INNER JOIN portage p
            ON v.numVersion = p.numVersion
            INNER JOIN localisation l
            ON p.numPortage = l.numPortage
            WHERE v.original = 1
            AND p.original = 1
            AND l.original = 1
            AND j.numJeu = $id";

    $data = requeteSQL($req);
    return $data;
}

//récupère l'image du jeu à partir de son numéro de version
function getImageVer($version) {
    $req = "SELECT l.image
            FROM version v INNER JOIN portage p
            ON v.numVersion = p.numVersion
            INNER JOIN localisation l
            ON p.numPortage = l.numPortage
            WHERE p.original = 1
            AND l.original = 1
            AND v.numVersion = $version;";

    $data = requeteSQL($req);
    return $data;
}

//récupère l'image du jeu à partir de son numéro de portage
function getImagePort($port) {
    $req = "SELECT l.image
            FROM portage p INNER JOIN localisation l
            ON p.numPortage = l.numPortage
            WHERE l.original = 1
            AND p.numPortage = $port;";

    $data = requeteSQL($req);
    return $data;
}

//récupère l'image du jeu à partir de son numéro de localisation
function getImageLoca($loca) {
    $req = "SELECT l.image
            FROM localisation l
            WHERE l.numLocalisation = $loca;";

    $data = requeteSQL($req);
    return $data;
}

//on récupère l'image en fonction soit du numéro de localisation, du port , de la version ou du jeu
if (isset($_GET['submitLoca']) && $_GET['choixLoca'] != 0 ) {
    $loca = $_GET['choixLoca'];
    $data = getImageLoca($loca);
} else if (isset($_GET['submitPort']) && $_GET['choixPort'] != 0 ) {
    $port = $_GET['choixPort'];
    $data = getImagePort($port);
} else if (isset($_GET['submitVer']) && $_GET['choixVer'] != 0) {
    $version = $_GET['choixVer'];
    $data = getImageVer($version);
} else {
    $id = $_GET['id'];
    $data = getImageId($id);
}

$row = $data->fetch_assoc();
$image = $row['image'];

echo '<img src="data:image/jpg;base64,'.base64_encode($image) .'" alt="boxart" style="width:80%; height:80%; object-fit:cover;">';
?>

                </div>
            </div>

        </div>
    </main>

    <?php include('footer.inc.php'); ?>

</body>
</html>    