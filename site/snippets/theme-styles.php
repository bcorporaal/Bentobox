<?php
/**
 * Outputs a single <style> block that sets CSS variables from the active theme
 * and rules for body + .theme-titleN classes. Driven by theme blueprint (DRY).
 */
require_once __DIR__ . '/../helpers/theme-css.php';

$themePage = function_exists('theme_page_for_styles')
    ? theme_page_for_styles($page ?? null)
    : active_theme_page();
$css = theme_css_for_page($themePage);
if ($css === null) {
    return;
}
?>
<style id="bentobox-theme-active">
<?= $css ?>

</style>
