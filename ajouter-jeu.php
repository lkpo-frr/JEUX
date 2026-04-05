<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameVersions - Ajouter un jeu</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include('header.inc.php'); ?>

    <main class="form-page">
        <div class="container">
            <div class="form-container glass">
                <h1>Ajouter un nouveau jeu</h1>
                <p class="form-subtitle">Complétez les informations ci-dessous pour ajouter un jeu à notre base</p>

                <form action="ajouter-jeu-action.php" method="POST" id="addJeuForm">
                    <div class="form-section">
                        <h2>Informations du jeu</h2>
                        
                        <div class="form-group">
                            <label>Nom du jeu *</label>
                            <input type="text" name="nom" placeholder="Ex: Final Fantasy VII" required>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label>Date de sortie originale *</label>
                                <input type="date" name="dateSortie" required>
                            </div>
                            <div class="form-group">
                                <label>Genre *</label>
                                <input type="text" name="genre" placeholder="Ex: Simulation" minlength="2" pattern="[A-Z0-9]([A-Za-z0-9 ]*)" title="Le nom du genre doit commencer par une majuscule et ne pas contenir de caractères spéciaux" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Difficulté</label>
                            <select name="difficulte">
                                <option value="0">Sélectionner</option>
                                <option value="1">Facile</option>
                                <option value="2">Normal</option>
                                <option value="3">Difficile</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="reset" class="btn-cancel" >Annuler</button>
                        <button type="submit" class="btn-submit">Ajouter le jeu</button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <?php include('footer.inc.php'); ?>

</body>
</html>