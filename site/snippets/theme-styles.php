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
$contentArr = $themePage->content()->toArray();
$lower = array_change_key_case($contentArr, CASE_LOWER);
foreach ($colorFields as $name) {
  $key = strtolower($name);
  $value = $lower[$key] ?? null;
  if ($value === null) {
    $field = $themePage->content()->get($name);
    $value = $field ? $field->value() : null;
  }
  if ($value !== null && $value !== '') {
    $themeVars[$name] = $value;
  }
}
if ($themeVars === []) {
    return;
}
$backgroundGradient = trim((string) ($themePage->content()->get('backgroundgradient')->value() ?? ''));
$stripeGradient = trim((string) ($themePage->content()->get('stripegradient')->value() ?? ''));
$bg = $themeVars['background'] ?? '';
$stripe = $themeVars['stripe'] ?? '';
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
  --color-stripe: <?= esc($stripe) ?>;
  --color-link: <?= esc($link) ?>;
  --color-link-hover: <?= esc($linkhover) ?>;
  --color-logo-fill: <?= esc($logo) ?>;
  --color-panel-title: <?= esc($stripe) ?>;
  --color-panel-title-highlight: <?= esc($linkhover) ?>;
  --stripe-height: <?= esc($stripeheight) ?>px;
  --stripe-background: <?= esc($stripe) ?>;
<?php if ($backgroundGradient !== ''): ?>
  --theme-background-image: <?= esc($backgroundGradient) ?>;
<?php endif; ?>
<?php if ($stripeGradient !== ''): ?>
  --stripe-background-image: <?= esc($stripeGradient) ?>;
<?php endif; ?>
}

<?php foreach ($titleColorFields as $name): ?>
.theme-<?= $name ?> {
  color: var(--theme-<?= $name ?>);
}
<?php endforeach ?>
</style>
