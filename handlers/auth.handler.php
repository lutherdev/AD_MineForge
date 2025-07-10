<?php
require_once BASE_PATH . '/bootstrap.php';
require_once UTILS_PATH . '/envSetter.util.php';

$pgConfig = [
'host' => $dbConfig['pgHost'],
'port' => $dbConfig['pgPort'],
'db'   => $dbConfig['pgDB'],
'user' => $dbConfig['pgUser'],
'pass' => $dbConfig['pgPassword'],
];

$dsn = "pgsql:host={$pgConfig['host']};port={$pgConfig['port']};dbname={$pgConfig['db']}";

try {
        $pdo = new PDO($dsn, $pgConfig['user'], $pgConfig['pass'], [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ]);

    if (session_status() === PHP_SESSION_NONE) {  
            session_start(); 
    }
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'login') {
        $username = trim($_POST['username']);
        $password = $_POST['password'];

        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute([':username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (Auth) {
            if (password_verify($password, $user['password'])) {
                $_SESSION['user'] = $user;
                header("Location: /");
                exit;
            } else {
                header("Location: /login?error=Invalid+password");
                exit;
            }
        } else {
            header("Location: /login?error=Invalid+username");
            exit;
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'register') {
    
        $username = $_POST['username'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $role = $_POST['role'];
        $wallet = $_POST['wallet'];
        $rawPassword = $_POST['password'];
        if (!preg_match('/^[a-zA-Z0-9_]{3,20}$/', $username)) {
        header("Location: /register?error=invalid_username");
        exit;
        }       

        if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/', $password)) {
            header("Location: /register?error=weak_password");
            exit;
        }

        $hashedPassword = password_hash($rawPassword, PASSWORD_DEFAULT);

        $stmt = $pdo->prepare("INSERT INTO users (username, password, first_name, last_name, role, wallet) VALUES (:username, :password, :firstname, :lastname, :role, :wallet)");
        $stmt->execute([
            ':username' => $username,
            ':password' => $hashedPassword,
            ':firstname' => $firstname,
            ':lastname' => $lastname,
            ':role' => $role,
            ':wallet' => $wallet
        ]);

        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute([':username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        Auth::sessionSet($user);
        header("Location: /");
        exit;
    }

}   catch (Exception $e) {
echo "❌ ERROR: " . $e->getMessage() . "\n";
exit(255);
}

?>
