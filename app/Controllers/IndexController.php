<?php
namespace App\Controllers;
use App\Config\Database;
use PDO;

class IndexController {
    
    public function index() {
        // 1. Connexion BDD
        $pdo = Database::connect();

        // 2. On récupère les 10 questions de façon aléatoire 
        $sqlQ = "SELECT * FROM questions ORDER BY RANDOM() LIMIT 10"; // RAND() pour MySQL et RANDOM() pour PostgreSQL
        $stmt = $pdo->prepare($sqlQ); // Requêtes préparées pour protéger des injections SQL
        $stmt->execute();

        // 3. Compteur de numérotation
        $cpt = 1;
       
        ob_start();
        require dirname(__DIR__) . '/Views/index.php';
        $content = ob_get_clean();
        require dirname(__DIR__) . '/Views/partials/layout.php';
    }

    public function resultat() {
        ob_start();
        echo "<div class='container p-5'>";
        echo "<div class='container p-5 bg-white rounded-4'>";
        echo "<h3 class='text-center p-3'>Vos résultats :</h3>";

        if ($_SERVER['REQUEST_METHOD']) {
        
            // 1. Connexion BDD
            $pdo = Database::connect();
            
            // 2. Compteur de points pour la note
            $note = 0;
            // 3. Compteur de numérotation
            $cpt = 1;

            // 4. Récupérer les réponses postées et les extraire sous forme de tableau clé/valeur
            foreach ($_POST as $key => $value) {      

                // 5. Récupérer les cellules de la ligne correspondante à l'id de la réponse
                $requete = "SELECT * FROM reponses WHERE idr = $value";
                $resultat = $pdo->prepare($requete);
                $resultat->execute();
                // 6. Mette sous forme de tableau la ligne récupérée avec ses colonnes (idr, idq, libeller, verite)
                $ligne = $resultat->fetch(PDO::FETCH_ASSOC);

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
                                AND verite = true";
                    $resultat2 = $pdo->prepare($requete2);
                    $resultat2->execute();
                    $ligne2 = $resultat2->fetch(PDO::FETCH_ASSOC);

                    require dirname(__DIR__) . "/Views/components/incorrectes.php" ;
                    
                    $cpt += 1;          
                }
            }


        }

        require dirname(__DIR__) . '/Views/resultat.php';
        echo "</div>";
        echo "</div>";
        $content = ob_get_clean();
        require dirname(__DIR__) . '/Views/partials/layout.php';

    }
}