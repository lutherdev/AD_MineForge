<?php
require_once BASE_PATH . 'bootstrap.php';
$homePageCss = PAGES_PATH . '/home-page/assets/css/home-page.css';
?>

<link rel="stylesheet" href="<?= htmlspecialchars($homePageCss) ?>">
<main class="homepage-container">
  <section class="hero-section">
    <div class="hero-content">
      <h1>KINGDOM OF WYRMFORGE</h1>
      <p>Mine the most exquisite, high-grade veins beneath the Sword Coast mountains.</p>
      <div class="hero-btn">
        <a href="store" class="btn-gold">Browse Our Wares</a>
        <a href="aboutUs" class="btn-outline">Learn Our History</a>
      </div>
    </div>
  </section>
</main>