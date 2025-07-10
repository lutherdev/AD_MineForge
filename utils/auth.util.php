<?php

class Auth{
    public static function init(): void {
    if (session_status() === PHP_SESSION_NONE) { 
        session_start();      
        }
    }

    public static function sessionSet($user){
        $_SESSION['user'] = [
            'id' => $user['id'],
            'username' => $user['username'],
            'role' => $user['role'],
            'firstname' => $user['first_name'],
            'lastname' => $user['last_name'],
        ]; 
    }
    public static function attempt(PDO $pdo, string $username, string $password){
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute([':username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$user) {
            return 'invalid_username';
        }
        if (!password_verify($password, $user['password'])){
            return 'invalid_password';
        }
        self::sessionSet($user);
        return 'success';
    }

    public static function logout(): void
    {
        $_SESSION = [];
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }
        session_destroy();
    }

    public static function user(): ?array
    {
        return $_SESSION['user'] ?? null;
    }

    public static function check()
    {
        return isset($_SESSION['user']);
    }
}