<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameVersions - Ajouter une version</title>
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
                <a href="comparer.html"><i class="fas fa-chart-line"></i> Comparateur</a>
                <a href="ajouter-jeu.html"><i class="fas fa-plus-circle"></i> Ajouter</a>
                <a href="contact.html"><i class="fas fa-envelope"></i> Contact</a>
                <a href="mentions-legales.html"><i class="fas fa-gavel"></i> Mentions</a>
            </div>
            <div class="mobile-menu-btn">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </nav>

    <main class="form-page">
        <div class="container">
            <div class="form-container glass">
                <h1><i class="fas fa-code-branch"></i> Ajouter une version</h1>
                <p class="form-subtitle">Ajoutez une nouvelle version (remake, remaster) à un jeu existant</p>

                <form action="ajouter-version-action.php" method="POST" id="addVersionForm">
                    <div class="form-section">
                        <h2><i class="fas fa-gamepad"></i> Nom du jeu</h2>
                        <div class="form-group">

<?php 
//fonction de connexion et requete (requeteSQL) dans un script séparé
include("connexion.php");
//pour récupérer le nom du jeu à partir de son id
function getNomJeu($id) {
    $req = "SELECT nom FROM jeu WHERE numJeu = $id;";

    $data = requeteSQL($req);
    return $data;
}

$id = $_GET['id'];
$data = getNomJeu($id);
$row = $data->fetch_assoc();
$nom = $row['nom'];

//permet d'afficher le nom du bon jeu
echo '<input type="text" name="nomJeu" value="'.$nom.'" disabled>';
//permet d'envoyer l'id du jeu avec le form
echo '<input type="hidden" name="id" value='.$id.'>';

?>

                            
                        </div>
                    </div>

                    <div class="form-section">
                        <h2><i class="fas fa-info-circle"></i> Informations de la version</h2>
                        
                        <div class="form-group">
                            <label>Nom de la version *</label>
                            <input type="text" name="nomVer" placeholder="Ex: Remake 3D" minlength="3" 
                            pattern="[A-Z]([A-Za-z0-9' ]*)" title="Le nom doit commencer par une majuscule et ne pas avoir de caractères spéciaux" required>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label>Type de version</label>
                                <select name="original" required>
                                    <option value="1">Original</option>
                                    <option value="0" selected>Autre</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Date de sortie *</label>
                                <input name="dateSortie" type="date" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label>Contenu additionnel ?</label>
                                <select name="addi">
                                        <option value="1">Oui</option>
                                        <option value="0" selected>Non</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Difficulté par rapport à l'original ?</label>
                                <select name="diff">
                                        <option value="1">Plus difficile</option>
                                        <option value="0" selected>Identique</option>
                                        <option value="-1">Moins difficile</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Note /10 (5 = équivalent à l'original)</label>
                            <input name="note" type="number" step="1" min="0" max="10" placeholder="5">
                        </div>

                        <div class="form-group">
                            <label>Description (moins de 200 caractères)</label>
                            <textarea name="description" rows="3" placeholder="Description de cette version..."></textarea>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="reset" class="btn-cancel"><i class="fas fa-times"></i> Annuler</button>
                        <button type="submit" class="btn-submit"><i class="fas fa-save"></i> Ajouter la version</button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <footer class="footer">
        <div class="footer-container">
            <div class="footer-col">
                <div class="footer-logo">
                    <i class="fas fa-gamepad"></i>
                    <span>Game<span>Versions</span></span>
                </div>
                <p>Le comparateur de versions de jeux vidéo.</p>
            </div>
            <div class="footer-col">
                <h4>Liens rapides</h4>
                <ul>
                    <li><a href="index.html">Accueil</a></li>
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