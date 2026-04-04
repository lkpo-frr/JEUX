<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>GameVersions - Comparez toutes les versions de vos jeux vidéo</title>
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
                <a href="index.html" class="active"><i class="fas fa-home"></i> Accueil</a>
                <a href="ajouter-jeu.html"><i class="fas fa-plus-circle"></i> Ajouter</a>
                <a href="contact.html"><i class="fas fa-envelope"></i> Contact</a>
                <a href="mentions-legales.html"><i class="fas fa-gavel"></i> Mentions</a>
            </div>
            <div class="mobile-menu-btn">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </nav>

    <header class="hero-3d">
        <div class="hero-content">
            <h1 class="glitch-text" data-text="COMPAREZ TOUTES LES VERSIONS">COMPAREZ TOUTES LES VERSIONS</h1>
        </div>
    </header>

    <section class="description-section">
        <div class="container">
            <div class="description-card glass">
                <form action="#" method="GET" id="rechercheNom">
                    <div class="form-row">
                        <div class="form-group">
                            <input type="text" name="nom" placeholder="Rechercher un jeu..." required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn-submit"> Valider</button>
                        </div>
                    </div>
                </form>
            </div>

            <fieldset name="categories" class="description-card glass">
                <legend>
                    <b>Ou rechercher par catégories :</b>
                </legend>

                <form action="indexfiltre.php" method="GET" id="rechercheCat">
                    <div class="form-row">
                        <div class="form-group">
                            <label><i class="fas fa-tag"></i> Genre</label>
                            <select name="genre">
                                <option value="0">Sélectionner</option>
                                <option value="JRPG">JRPG</option>
                                <option value="Aventure">Aventure</option>
                                <option value="TPS">TPS</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label><i class="fas fa-tag"></i> Difficulté</label>
                            <select name="difficulte">
                                <option value="0">Sélectionner</option>
                                <option value="1">Facile</option>
                                <option value="2">Normal</option>
                                <option value="3">Difficile</option>
                            </select>
                        </div>

                        <div class="form-group">
                                <label><i class="fas fa-calendar"></i> Année de sortie originale</label>
                                <input type="number" name="dateSortie">
                        </div>

                        <div class="form-group">
                                <label><i class="fas fa-calendar"></i> Nombre total de versions</label>
                                <input type="number" name="nbVersions" maxlength="2">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn-submit"> Valider</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <section id="ici" class="games-section">
        <div class="container">
            <div class="section-header">
                <h2><i class="fas fa-gamepad"></i> Jeux</h2>
            </div>
            <div class="games-grid" id="gamesGrid">
                
<?php 

//fonction de connexion et requete (requeteSQL) dans un script séparé
include("connexion.php");

//fonction pour écrire la requete SQL
function getNomImage($recherche) {
    $req = "SELECT j.nom, j.numJeu, l.image
            FROM jeu j INNER JOIN version v
            ON j.numJeu = v.numJeu
            INNER JOIN portage p
            ON v.numVersion = p.numVersion
            INNER JOIN localisation l
            ON p.numPortage = l.numPortage
            WHERE LOWER(j.nom) LIKE LOWER('%".$recherche."%')
            AND v.original = 1
            AND p.original = 1
            AND l.original = 1;";
    $data = requeteSQL($req);
    return $data;
}

//on récupère le nom rentré par l'utilisateur et on le transforme en lowercase
$recherche = $_GET['nom'];
$recherche = strtolower($recherche);

//récupère résultat requete
$data = getNomImage($recherche);

//affichage pour chaque jeu qui matche la recherche
//j'ai récupéré le contenu de la fonction generateGamesGrid dans le fichier js
while ($row = $data->fetch_assoc()) {
    $image = $row['image'];
    echo '<div class="game-card" onclick="window.location.href=\'jeu-detail.html?id="'.$row['numJeu'].'\'">';
        echo '<div class="game-card-image"><img src="data:image/jpg;base64,'.base64_encode($image) .'" alt="'.$row['nom'].'" style="width:100%; height:100%; object-fit:cover;"></div>';
        echo '<div class="game-card-content">';
            echo '<h3>'.$row['nom'].'</h3>';
            echo '<div class="game-footer">';
                echo '<button class="btn-detail">Voir détails</button>';
            echo '</div>';
        echo '</div>';
    echo '</div>';
}

?>

            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="footer-container">
            <div class="footer-col">
                <div class="footer-logo">
                    <i class="fas fa-gamepad"></i>
                    <span>Game<span>Versions</span></span>
                </div>
                <p>Le comparateur de versions de jeux vidéo. Trouvez la meilleure version de vos jeux préférés.</p>
                <div class="social-links">
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-discord"></i></a>
                    <a href="#"><i class="fab fa-github"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="footer-col">
                <h4>À propos</h4>
                <ul>
                    <li><a href="#">Qui sommes-nous ?</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    <li><a href="#">FAQ</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Légal</h4>
                <ul>
                    <li><a href="mentions-legales.html">Mentions légales</a></li>
                    <li><a href="#">CGU</a></li>
                    <li><a href="#">RGPD</a></li>
                    <li><a href="#">Cookies</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Newsletter</h4>
                <p>Recevez les dernières comparaisons</p>
                <div class="newsletter-form">
                    <input type="email" placeholder="Votre email">
                    <button><i class="fas fa-paper-plane"></i></button>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2026 GameVersions - Tous droits réservés</p>
            <p class="disclaimer">Les marques et jeux cités sont la propriété de leurs détenteurs respectifs.</p>
        </div>
    </footer>

</body>
</html>