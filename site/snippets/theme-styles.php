<?php
/**
 * Outputs a single <style> block that sets CSS variables from the active theme
 * and rules for body + .theme-titleN classes. Driven by theme blueprint (DRY).
 */
$themePage = active_theme_page();
if ($themePage === null) {
    return;
}
$blueprint = theme_blueprint();
$colorFields = $blueprint['colorFields'];
$titleColorFields = $blueprint['titleColorFields'];

$themeVars = [];
foreach ($colorFields as $name) {
    $value = $themePage->content()->get($name)->value();
    if ($value !== null && $value !== '') {
        $themeVars[$name] = $value;
    }
}
if ($themeVars === []) {
    return;
}
?>
<style>
:root {
<?php foreach ($themeVars as $name => $hex): ?>
  --theme-<?= $name ?>: <?= esc($hex) ?>;
<?php endforeach ?>
}
body {
  background-color: var(--theme-background);
}
<?php foreach ($titleColorFields as $name): ?>
.theme-<?= $name ?> {
  color: var(--theme-<?= $name ?>);
}
<?php endforeach ?>
</style>
