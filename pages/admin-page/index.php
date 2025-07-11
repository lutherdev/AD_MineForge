<?php
require_once BASE_PATH . '/bootstrap.php';

if ($_SESSION['user']['role'] !== 'admin') {
    header('Location: /');
    exit;
}
?>
<link rel="stylesheet" href="/pages/admin-page/assets/css/admin-page.css">
<main class="admin-page">
    <div class="admin-container">
        <div class="admin-grid">
            <div class="admin-card" onclick="location.href='create-item.php'">
                <h3>Create Item</h3>
                <div class="admin-icon">⛏</div>
            </div>

            <div class="admin-card" onclick="location.href='read-item.php'">
                <h3>Read Item</h3>
                <div class="admin-icon">📜</div>
            </div>

            <div class="admin-card" onclick="location.href='update-item.php'">
                <h3>Update Item</h3>
                <div class="admin-icon">🛠</div>
            </div>

            <div class="admin-card" onclick="location.href='delete-item.php'">
                <h3>Delete Item</h3>
                <div class="admin-icon">💀</div>
            </div>
        </div>
    </div>
</main>