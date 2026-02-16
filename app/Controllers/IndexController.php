<?php
namespace App\Controllers;
use App\Config\Database;
use PDO;

class IndexController {
    
    public function index() {
                $pdo = Database::connect();

                // On récupère les questions de façon aléatoire 
                $sqlQ = "SELECT * FROM questions ORDER BY RANDOM() LIMIT 10";
                $stmt = $pdo->prepare($sqlQ) ;
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $questionsIds = $result;

                $ids = array_column($questionsIds, 'idq');
                $inQuery = implode(',', $ids);
                         
                // On récupère les questions et leurs réponses pour les 10 ids récupérés plus haut
                $sqlR = "SELECT q.idq, q.libelleq, r.idr, r.libeller
                        FROM questions q
                        LEFT JOIN reponses r ON q.idq = r.idq
                        WHERE q.idq IN ($inQuery)";
                $stmt = $pdo->query($sqlR);
                $data =  $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                // On restructure pour avoir les questions et les réponses associées directement 
                // dans le même tableau
                $tableauQuestions = [];
                foreach ($data as $row) {
                    $idq = $row['idq'];
                    if (!isset($tableauQuestions[$idq])) {
                        $tableauQuestions[$idq] = [
                            'libelleq' => $row['libelleq'],
                            'reponses' => []
                        ];
                    }
                    if ($row['idr']) {
                        $tableauQuestions[$idq]['reponses'][] = [
                            'idr' => $row['idr'],
                            'libeller' => $row['libeller']
                        ];
                    }
                }

        ob_start();
        require dirname(__DIR__) . '/Views/index.php';
        $content = ob_get_clean();
        require dirname(__DIR__) . '/Views/partials/layout.php';
    }

    public function contact() {

        ob_start();
        require_once dirname(__DIR__) . '/Views/contact.php';
        $content = ob_get_clean();
        require dirname(__DIR__) . '/Views/partials/layout.php';

    }
}