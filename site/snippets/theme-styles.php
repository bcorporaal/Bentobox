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
$bg = $themeVars['background'] ?? '';
$accent = $themeVars['accent'] ?? '';
$logo = $themeVars['logo'] ?? 'currentColor';
$link = $themeVars['link'] ?? 'inherit';
$linkhover = $themeVars['linkhover'] ?? 'inherit';
$stripeheight = $themeVars['stripeheight'] ?? '';
if ($stripeheight === '') {
    $shField = $themePage->content()->get('stripeheight');
    if ($shField) {
        $v = $shField->value();
        $stripeheight = $v !== null ? (string) $v : '';
    }
}
?>
<style>
:root {
<?php foreach ($themeVars as $name => $hex): ?>
  --theme-<?= $name ?>: <?= esc($hex) ?>;
<?php endforeach ?>
  /* Legacy vars for Tailwind/input.css (from active theme page) */
  --color-bg: <?= esc($bg) ?>;
  --color-stripe: <?= esc($accent) ?>;
  --color-link: <?= esc($link) ?>;
  --color-link-hover: <?= esc($linkhover) ?>;
  --color-logo-fill: <?= esc($logo) ?>;
  --color-panel-title: <?= esc($accent) ?>;
  --color-panel-title-highlight: <?= esc($linkhover) ?>;
  --stripe-height: <?= esc($stripeheight) ?>px;
  --stripe-background: <?= esc($accent) ?>;
}

<?php foreach ($titleColorFields as $name): ?>
.theme-<?= $name ?> {
  color: var(--theme-<?= $name ?>);
}
<?php endforeach ?>
</style>
