<?php
namespace App\Controllers;
use App\Config\Database;
use PDO;
use PDOException;

class AuthController 
{
    public function formRegister() {
        $titre = "Inscription";
        ob_start();
        require dirname(__DIR__) . '/Views/auth/register.php';
        $content = ob_get_clean();
        require dirname(__DIR__) . '/Views/partials/layout.php';
    }

    public function register() {
        $_SESSION['flash'] = [];
        if (isset($_POST['register'])) {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password2 = $_POST['password2'];

            if (!isset($nom, $prenom) || empty($nom | $prenom)) {
                $_SESSION['flash']['erreur'] = "Le nom et le prénom doivent contenir au moins 3 carractères !";
                header("Location: " . BASE_URL . "register");
            }

            if (isset($email)) {
                if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
                    $_SESSION['flash']['erreur'] = "L'email est invalide !";
                    header("Location: " . BASE_URL . "login");
                }
            }

            if (!isset($password) || empty($password) || !isset($password2) || empty($password2)) {
                $_SESSION['flash']['erreur'] = "Veuillez entrer un mot de passe correcte";
                header("Location: " . BASE_URL . "register");
            }

            if ($password !== $password2) {
                $_SESSION['flash']['erreur'] = "Les mots de passes ne correspondent pas !";
                header("Location: " . BASE_URL . "register");
            } else {
                $password_hash = password_hash($password, PASSWORD_ARGON2ID);
            }

            // var_dump($password_hash);
            // var_dump($_POST);

            $data = [$nom, $prenom, $email, $password_hash];

            // Eviter de faire : $data = implode("', '", $data);
            // Cela peut laisser la porte ouverte aux injections SQL
            // Préférer à la place execute([$data]) et éventuellement des paramètres
            // nommés dans la requête SQL
            // var_dump($data);

            $pdo = Database::connect();

            try {
                $sql = "INSERT INTO users (nom, prenom, mail, mdp) VALUES (?, ?, ?, ?)";
                var_dump($sql);
                $stmt = $pdo->prepare($sql);
                $stmt->execute($data);
                // var_dump($stmt);exit;

                $_SESSION['flash']['success'] = "Votre comte a bien été créé !";
                header("Location: " . BASE_URL . "login");
                exit;
            } catch (PDOException $e) {
                $erreur = new PDOException($e->getMessage(), $e->getCode());  
                $_SESSION['flash']['erreur'] = $erreur . "ta grand mère, ça marche pas, zut !!!";
                header("Location: " . BASE_URL . "register");                              
            }
        }

    }

    public function formLogin() {
        $titre = "Connexion";
        ob_start();
        require dirname(__DIR__) . '/Views/auth/login.php';
        $content = ob_get_clean();
        require dirname(__DIR__) . '/Views/partials/layout.php';
    }

    public function login() {
        
    }
}