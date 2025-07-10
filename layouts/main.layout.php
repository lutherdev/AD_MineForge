<?php
declare(strict_types=1);

require_once BASE_PATH . '/vendor/autoload.php';
require_once TEMPLATES_PATH . '/head.component.php';
require_once TEMPLATES_PATH . '/nav.component.php';
require_once TEMPLATES_PATH . '/foot.component.php';
require_once UTILS_PATH . "/envSetter.util.php";

$nav_config = require STATICDATAS_PATH . '/navConfig.staticData.php';

function renderMainLayout(callable $content, string $title, string $pageCss = ""): void
{
    global $headNavList, $user;
    head($title, $pageCss);
    require_once COMPONENTS_PATH . '/templates/nav.component.php';
    $content();
    footer();
}