<?php
/**
 * Embeds slug → full theme CSS for transient preview (see theme-selector script).
 */
require_once __DIR__ . '/../helpers/theme-css.php';

$themesPage = $site->find('themes');
if (!$themesPage) {
    return;
}
$themes = $themesPage->children()->filterBy('intendedTemplate', 'in', ['theme', 'theme-locked']);
if ($themes->count() === 0) {
    return;
}

$map = [];
foreach ($themes as $theme) {
    $css = theme_css_for_page($theme);
    if ($css !== null) {
        $map[$theme->slug()] = $css;
    }
}
if ($map === []) {
    return;
}

$json = json_encode(
    $map,
    JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_UNESCAPED_UNICODE
);
if ($json === false) {
    return;
}
?>
<script type="application/json" id="bentobox-theme-preview-data"><?= $json ?></script>
