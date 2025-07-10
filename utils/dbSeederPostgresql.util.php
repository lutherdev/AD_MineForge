<?php
declare(strict_types=1);

require_once BASE_PATH . '/bootstrap.php';

$users = require_once DUMMIES_PATH . '/users.staticData.php';

$dsn = "pgsql:host={$dbConfig['pgHost']};port={$dbConfig['pgPort']};dbname={$dbConfig['pgDB']}";

try {
    $pdo = new PDO($dsn, $dbConfig['pgUser'], $dbConfig['pgPassword'], [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);

    echo "Connected to PostgreSQL!\n";

    $checkStmt = $pdo->query("SELECT to_regclass('public.users')");
    $tableExists = $checkStmt->fetchColumn();

    if (!$tableExists) {
        throw new Exception("Table 'users' does not exist. Please run migrations first.");
    }

    echo "Seeding users…\n";

    $pdo->beginTransaction();

    $stmt = $pdo->prepare("
        INSERT INTO users (username, password, first_name, last_name, role, wallet)
        VALUES (:username, :password, :first_name, :last_name, :role, :wallet)
    ");

    foreach ($users as $u) {
        try {
            $stmt->execute([
                ':username' => $u['username'],
                ':role'     => $u['role'],
                ':first_name'       => $u['first_name'],
                ':last_name'       => $u['last_name'],
                ':password'       => password_hash($u['password'], PASSWORD_DEFAULT),
                ':wallet'       => $u['wallet'],
            ]);
            echo "Inserted user: {$u['username']}\n";
        } catch (PDOException $e) {
            echo "Failed to insert {$u['username']}: " . $e->getMessage() . "\n";
        }
    }

    $pdo->commit();

    echo "All users seeded.\n\n";

    $stmt = $pdo->query("SELECT * FROM users");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($users as $user) {
        echo "---------------------------\n";
        echo "User ID:    {$user['id']}\n";
        echo "Username:   {$user['username']}\n";
        echo "First Name: {$user['first_name']}\n";
        echo "Last Name:  {$user['last_name']}\n";
        echo "Role:       {$user['role']}\n";
        echo "---------------------------\n";
    }

} catch (Exception $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
    exit(255);
}