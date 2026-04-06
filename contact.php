<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameVersions - Contact</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include('header.inc.php'); ?>

    <main class="contact-page">
        <div class="container">
            <div class="contact-header glass">
                <h1>Contactez-nous</h1>
                <p>Une question ? Une suggestion ? N'hésitez pas à nous écrire</p>
            </div>

            <div class="contact-grid">
                <div class="contact-form glass">
                    <h2>Envoyez-nous un message</h2>
                    <form action="#" method="POST" id="contactForm" >
                        <div class="form-group">
                            <label>Nom complet</label>
                            <input type="text" placeholder="Jean Dupont" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" placeholder="jean@email.com" title="L'adresse doit etre de la forme jean@email.com" pattern="^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z]{2,}$" required>
                        </div>
                        <div class="form-group">
                            <label>Sujet</label>
                            <select required>
                                <option>Question sur le site</option>
                                <option>Suggestion de jeu</option>
                                <option>Signalement d'erreur</option>
                                <option>Partenariat</option>
                                <option>Autre</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Message</label>
                            <textarea rows="5" placeholder="Votre message..." required></textarea>
                        </div>
                        <button type="submit" class="btn-submit">Envoyer le message</button>
                    </form>
                </div>

                <div class="contact-info glass">
                    <h2>Statistiques</h2>
                    <div class="stats-grid">
                        <div class="stat-card">

<?php
//fonction de connexion et requete (requeteSQL) dans un script séparé
include("connexion.php");

//fonctions pour récupérer les statistiques
function getNbJeux() {
    $req = "SELECT COUNT(*) AS nb FROM jeu;";
    $data = requeteSQL($req);
    return $data;
}

function getNbVer() {
    $req = "SELECT COUNT(*) AS nb FROM version;";
    $data = requeteSQL($req);
    return $data;
}

function getNbPorts() {
    $req = "SELECT COUNT(*) AS nb FROM portage;";
    $data = requeteSQL($req);
    return $data;
}

$nbJeux = getNbJeux();
$nbJeux = $nbJeux->fetch_assoc();
$nbJeux = $nbJeux['nb'];

$nbVer = getNbVer();
$nbVer = $nbVer->fetch_assoc();
$nbVer = $nbVer['nb'];

$nbPorts = getNbPorts();
$nbPorts = $nbPorts->fetch_assoc();
$nbPorts = $nbPorts['nb'];

//affichage des statistiques
    echo '<span class="stat-num" >'.$nbJeux.'</span>';
    echo '<span>Jeux</span>';
echo '</div>';
echo '<div class="stat-card">';
    echo '<span class="stat-num">'.$nbVer.'</span>';
    echo '<span>Versions</span>';
echo '</div>';
echo '<div class="stat-card">';
    echo '<span class="stat-num">'.$nbPorts.'</span>';
?>

                            <span>Portages</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="social-section glass">
                <h2>Suivez-nous</h2>
                <div class="social-grid">
                    <a href="#" class="social-card twitter"><i class="fab fa-twitter"></i> Twitter</a>
                    <a href="#" class="social-card discord"><i class="fab fa-discord"></i> Discord</a>
                    <a href="#" class="social-card github"><i class="fab fa-github"></i> GitHub</a>
                    <a href="#" class="social-card instagram"><i class="fab fa-instagram"></i> Instagram</a>
                </div>
            </div>

            <div class="faq-section glass">
                <h2>Foire aux questions</h2>
                <div class="faq-item">
                    <div class="faq-question">
                        <span>Comment sont calculées les notes ?</span>
                    </div>
                    <div class="faq-answer">
                        Les notes sont toujours calculées par rapport à l'original. 
                        Une note inférieure à 5 signifie que la version est globalement moins bonne que l'original, et une note supérieure à 5 signifie que la version est globalement meilleure que l'original. 
                        Un très mauvais jeu peut donc avoir une très bonne note, et inversement; les notes ne reflètent pas la qualité du jeu, seulement celle de la version.
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <span>Puis-je suggérer un jeu manquant ?</span>
                    </div>
                    <div class="faq-answer">
                        Oui ! Utilisez le formulaire de contact ou la page "Ajouter un jeu".
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <span>Différence entre Remake et Remaster ?</span>
                    </div>
                    <div class="faq-answer">
                        Un Remake reconstruit le jeu de zéro, un Remaster améliore graphismes et performances.
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include('footer.inc.php'); ?>

</body>
</html>