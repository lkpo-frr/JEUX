<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>requete mysql</title>
</head>
   <body>
      <h3>Envoi des images dans la base de données</h3>
      <form action="#" method="get">
         <input type="submit" name="submit" value="Transférer les images" />
      </form>

    <?php
    //fonction de connexion et requete (requeteSQL) dans un script séparé
    include("connexion.php");

    //fonction qui tranfère les images
    function transfert(){
        $img_blob   = '';

        //on récupère le nombre d'images à transférer
        $data = getNbImages();
        $row = $data->fetch_assoc();
        $nb = $row['nombre'];

        for ($i=1; $i<=$nb; $i++) {
            $img_blob = file_get_contents ('./imagesBD/'.$i.'.jpg');

            $req = "UPDATE localisation SET image = "."'".addslashes($img_blob)."' WHERE numLocalisation = ".$i;
            requeteSQL($req);
        }
        return true;
    }

    function getNbImages() {
        $req = 'SELECT COUNT(*) AS nombre FROM localisation;';
        return requeteSQL($req);
    }
      
    //lorsqu'on appuie sur le bouton , transfère les images
    if ( isset($_GET['submit']) )
    {
        echo "<p>Début transfert...</p>";
        if (transfert())
        echo "<p>Transfert dans la base de données réalisé avec succès !</p>";
    }
      ?>

   </body>
</html>