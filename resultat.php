<?php

if ($_SERVER['REQUEST_METHOD']) {
  // Vérifier ce que contient le $_POST
  // var_dump($_POST);
  
  // 1. Connexion BDD
  $id = mysqli_connect("localhost", "root", "", "db_qcm");
  
  // 2. Compteur de points pour la note
  $note = 0;
  // 3. Compteur de numérotation
  $cpt = 1;

  
  // 4. Récupérer les réponses postées et les extraire sous forme de tableau clé/valeur
  foreach ($_POST as $key => $value) {      

      // 5. Récupérer les cellules de la ligne correspondante à l'id de la réponse
      $requete = "SELECT * FROM reponses WHERE idr = $value";
      $resultat = mysqli_query($id, $requete);
      // 6. Mette sous forme de tableau la ligne récupérée avec ses colonnes (idr, idq, libeller, verite)
      $ligne = mysqli_fetch_assoc($resultat);

      // 7. Condition : si la réponse est juste (1 = vraie)
      if ($ligne['verite'] == 1) {
          // 8. Ajouter 2 au compteur de points
          $note += 2;
          // 9. Ajouter 1 au compteur de numérotation
          $cpt += 1;
      } else {
        // 7 Bis. Sinon, récupérer la question, et la bonne réponse : requête avec 3 conditions
        $requete2 = "SELECT q.libelleQ, r.libeller FROM questions q, reponses r
                    WHERE q.idq = r.idq
                    AND q.idq = $key
                    AND verite = 1";
        $resultat2 = mysqli_query($id, $requete2);
        $ligne2 = mysqli_fetch_assoc($resultat2);

        // 8 Bis. Réafficher la question
        echo $cpt. ". A la question : " . $ligne2['libelleQ'] . "<br>";
        // 9 Bis. Réafficher les erreurs de l'utilisateur
        echo "Vous avez répondu : " . $ligne['libeller'] . "<br>";
        // 10 Bis. Enfin, afficher la réponse correcte
        echo "la réponse était :"  . $ligne2['libeller'] . "<br>";
        $cpt += 1;          
      }
    }
    echo "Votre note est de : $note / 20";
}