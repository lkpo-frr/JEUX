<?php
    function requeteSQL($req) {
    //ouvre connexion
    //Penser à changer l'utilisateur !!!!
    $mysqli = new mysqli("127.0.0.1", "user", "Useruser:1", "projetweb"); 
    //en cas erreur
    if ($mysqli->connect_errno) { 
        $msg = "Echec lors connexion MySQL : (".$mysqli->connect_errno.") ";
        $msg .=  $mysqli->connect_error;
        die ($msg);

    } else {
        $data = $mysqli->query($req);
        return $data;
    }
}
?>