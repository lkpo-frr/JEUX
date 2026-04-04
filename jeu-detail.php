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

?>

                    <img id="jeuCoverImage" src="images/default.jpg" alt="Jeu">
                </div>
                <div class="jeu-info">
                    <h1 id="jeuNom">Chargement...</h1>
                    <div class="jeu-metadata">
                        <span id="jeuAnnee" class="badge">1999</span>
                        <span id="jeuGenre" class="badge">Plateforme</span>
                    </div>
                    <div class="jeu-stats">
                        <div class="stat">
                            <span id="jeuNbVersions" class="value">-</span>
                            <span class="label">Versions</span>
                        </div>
                        <div class="stat">
                            <span id="jeuNbPlateformes" class="value">-</span>
                            <span class="label">Plateformes</span>
                        </div>
                    </div>
                    

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