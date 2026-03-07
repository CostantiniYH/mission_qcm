<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QCM</title>
    <h1>Bienvenue sur le QCM</h1>
<form action="resultat.php" method="post">

    <?php
        // 1. Connexion BDD
        $id = mysqli_connect("localhost", "root", "", "db_qcm");
        
        // 2. Récupérer 10 questions et leur réponses associées avec 2 boucles
        $requete = "SELECT * FROM questions ORDER BY RAND() LIMIT 10";
        $resultat = mysqli_query($id,$requete);

        // 3. Compteur pour la numérotation
        $cpt = 1;

        // 4. Boucler les questions récupérées pour chaque ligne renvoyée par la requête
        // Mettre sous forme de tableau le résultat de la requête : 10 lignes avec les 2 colonnes (idq, libelleQ)
        while ($ligne = mysqli_fetch_assoc($resultat)) { 
            
            // 5. Extraire l'id de la question pour récupérer les réponses associées
            $idq = $ligne['idq'];

            // 6. Afficher la question avec sa numérotation
            echo "<h3>$cpt .".$ligne['libelleQ']."</h3>";

            // 7. Ajouter 1 au compteur
            $cpt += 1;

            // 8. Récupérer, à l'intérieur de la boucle, les 4 réponses de la question dans le désordre avec : ORDER BY RAND()
            $requete2 = "SELECT * FROM reponses WHERE idq = $idq ORDER BY RAND()";
            $resultat2 = mysqli_query($id, $requete2);

            // 9. Boucler ici l'affichage des 4 réponses
            // Mettre sous forme de tableau le résultat de la requête : 40 lignes avec les colonnes de chaque ligne
            while ($ligne2 = mysqli_fetch_assoc($resultat2)) { 
                
                // 10. Extraire l'id de chaque réponse car nous en avons besoin pour l'envoie des réponses
                $idr = $ligne2['idr'];

                // 11. Affichage de la réponse. 
                // Ainsi, ce qui va être envoyé par l'utilisateur sera le nom (name) de la radio et sa valeur (value)
                echo "<p>".$ligne2['libeller']."<input type='radio' name='$idq' value='$idr' checked></p>";
            }
        }
    ?>
    <input type="submit" name="" value="Envoyer" >

</form>

</head>
<body>
    
</body>
</html>