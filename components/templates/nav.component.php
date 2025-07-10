<nav class="navbar">
    <div class="navbar-container">
        <div class="navbar-logo">
            <a href="homepage">
                <img src="<?php echo htmlspecialchars($logo); ?>"
                     alt="<?php echo htmlspecialchars($alt_logo); ?>"
                     class="logo-img">
                <span class="logo-text">MineForge</span>
            </a>
        </div>

        <div class="navbar-menu">
    <?php foreach ($navbar_items as $title => $url): ?>
        <?php if (!is_array($url)): ?>
            <a href="<?php echo htmlspecialchars($url); ?>"
               class="navbar-item <?php echo ($current_page === $url) ? 'is-active' : ''; ?>">
                <?php echo htmlspecialchars($title); ?>
            </a>
        <?php endif; ?>
    <?php endforeach; ?>
</div>
    </div>
</nav>