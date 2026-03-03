<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QCM</title>
    <h1>Bienvenue sur le QCM</h1>
<form action="resultat.php" method="post">

    <?php
    // Commençons par récupérer 10 questions et leur réponses associées avec 2 boucles
        $id = mysqli_connect("localhost", "root", "", "db_qcm");
        $requete = "SELECT * FROM questions ORDER BY RAND() LIMIT 10";
        $resultat = mysqli_query($id,$requete);
        $cpt = 1;
        while ($ligne = mysqli_fetch_assoc($resultat)) {
            $idq = $ligne['idq'];
            echo "<h3>$cpt .".$ligne['libelleQ']."</h3>";
            $cpt += 1;
            $requete2 = "SELECT * FROM reponses WHERE idq = $idq ORDER BY RAND()";
            $resultat2 = mysqli_query($id, $requete2);
            while ($ligne2 = mysqli_fetch_assoc($resultat2)) {
                $idr = $ligne2['idr'];
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