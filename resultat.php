<?php

if ($_SERVER['REQUEST_METHOD']) {
    var_dump($_POST);
    $id = mysqli_connect("localhost", "root", "", "db_qcm");


      foreach ($_POST as $key => $value) {
        echo "Question ID : $key, ID réponse sélectionnée : $value<br>";
      }

      $note = 0;
      foreach ($_POST as $key => $value) {
        $requete = "SELECT * FROM reponses WHERE idr = $value";
        $resultat = mysqli_query($id, $requete);
        $ligne = mysqli_fetch_assoc($resultat);
        if ($ligne['verite'] == 1) {
            $note = $note+2;
        } else {
            
        }
      }
      echo "Votre note est de : $note / 20";
}