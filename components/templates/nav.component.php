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
        <?php if (is_array($url)): ?>
            <div class="navbar-item dropdown">
                <span class="dropdown-title"><?php echo htmlspecialchars($title); ?></span>
                <div class="dropdown-content">
                    <?php foreach ($url as $subTitle => $subUrl): ?>
                        <a href="<?php echo htmlspecialchars($subUrl); ?>"><?php echo htmlspecialchars($subTitle); ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php else: ?>

        <?php endif; ?>
    <?php endforeach; ?>
</div>
    </div>
</nav>