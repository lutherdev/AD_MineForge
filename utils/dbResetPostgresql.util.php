<?php
declare(strict_types=1);
require_once BASE_PATH . '/bootstrap.php';
require_once UTILS_PATH . '/envSetter.util.php';

$dsn = "pgsql:host={$dbConfig['pgHost']};port={$dbConfig['pgPort']};dbname={$dbConfig['pgDB']}";

try {
$pdo = new PDO($dsn, $dbConfig['pgUser'], $dbConfig['pgPassword'], [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
]);

echo "Connected to PostgreSQL!\n";

$dbfiles = ['database/users.model.sql', 'database/items.model.sql', 'database/customer-messages.model.sql', 'database/item-orders.sql'];

foreach ($dbfiles as $dbfile){
$sql = file_get_contents($dbfile);
if (!$sql) {
    throw new RuntimeException("❌ Could not read the SQL file" . $dbfile);
}
echo "✅ Tables $dbfile is created.\n";
$pdo->exec($sql);
}

echo "✅ All Tables created successfully.\n";

echo "Truncating tables…\n";
foreach (['users', 'roles', 'groups'] as $table) {
    $pdo->exec("TRUNCATE TABLE {$table} RESTART IDENTITY CASCADE;");
    echo "the table $table has been truncated. \n";
}

echo "✅ All Tables truncated.\n";

} catch (Exception $e) {
echo "❌ ERROR: " . $e->getMessage() . "\n";
exit(255);
}