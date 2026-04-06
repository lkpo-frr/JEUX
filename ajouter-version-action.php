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
echo '<button type="button" class="btn-submit" onclick="window.location.href=\'index.php\'">Revenir à l\'accueil</button>';

?>

    </main>

    <?php include('footer.inc.php'); ?>

</body>
</html>