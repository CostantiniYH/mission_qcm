<div class="container">

    <h1 class="text-center mt-5">Questionnaire à choix multiples</h1>
    <div class="row p-5">
        <section class="p-5 text-black">
            <form class="p-5 bg-white" action="<?= BASE_URL ?>resultat" method="post">
                
                <?php  
                // 4. Boucler les questions renvoyées sous forme de ligne dans un tableau
                // Tableau associatif pour récupérer les champs et les valeurs
                while ($ligne = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    // 5. Extraire l'id de la question pour récupérer les réponses associées
                    $idq = $ligne['idq'];
                    
                    // 6. Afficher la question avec sa numérotation
                    echo "<h3 class='label-question'>$cpt." . $ligne['libelleQ'] . "</h3>";
                    
                    // 7. Ajouter 1 au compteur
                    $cpt += 1;
                    
                    // 8. Récupérer, à l'intérieur de la boucle, les 4 réponses de la question dans le désordre avec : ORDER BY RAND()
                    $sqlR = "SELECT * FROM reponses WHERE idq = $idq ORDER BY RANDOM()";
                    $stmt2 = $pdo->prepare($sqlR);
                    $stmt2->execute();
                    
                    // 9. Boucler ici l'affichage des 4 réponses
                    // Mettre sous forme de tableau le résultat de la requête : 40 lignes avec les colonnes de chaque ligne
                    while ($ligne2 = $stmt2->fetch(PDO::FETCH_ASSOC)) { 
                        // 10. Extraire l'id de chaque réponse car nous en avons besoin pour l'envoie des réponses
                        $idr = $ligne2['idr'];
                        
                        // 11. Affichage de la réponse. 
                        // Ainsi, ce qui va être envoyé par l'utilisateur sera le nom (name) de la radio et sa valeur (value)
                        echo "<p class='radio-q'><input type='radio' name='$idq' value='$idr' checked> " . $ligne2['libeller'] . "</p>";
                        }
                        
                        }
                        
                        ?>
            
                <input class="shadow btn btn-envoie d-block mx-auto w-100 p-2" type="submit" value="Envoyer">
            </form>
        </section>
    </div>
</div>