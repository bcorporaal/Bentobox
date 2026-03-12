<?php
/**
 * Outputs <style> blocks so each theme can be previewed by adding body.theme-preview-SLUG.
 * Used by theme-selector hover; same variables as theme-styles (DRY with theme blueprint).
 */
$themesPage = $site->find('themes');
if (!$themesPage) {
    return;
}
$themes = $themesPage->children()->filterBy('intendedTemplate', 'in', ['theme', 'theme-locked']);
if ($themes->count() === 0) {
    return;
}

$blueprint = function_exists('theme_blueprint') ? theme_blueprint() : [];
$colorFields = $blueprint['colorFields'] ?? ['background', 'stripe', 'stripeheight', 'logo', 'link', 'linkhover', 'basetitle', 'highlighttitle1', 'highlighttitle2'];
if ($colorFields === []) {
    return;
}
?>
<style>
<?php foreach ($themes as $theme):
    $slug = $theme->slug();
    $themeVars = [];
    foreach ($colorFields as $name) {
        $value = $theme->content()->get($name)->value();
        if ($value !== null && $value !== '') {
            $themeVars[$name] = $value;
        }
    }
    if ($themeVars === []) {
        continue;
    }
    $backgroundGradient = trim((string) ($theme->content()->get('backgroundgradient')->value() ?? ''));
    $stripeGradient = trim((string) ($theme->content()->get('stripegradient')->value() ?? ''));
    $bg = $themeVars['background'] ?? '';
    $stripe = $themeVars['stripe'] ?? '';
    $logo = $themeVars['logo'] ?? 'currentColor';
    $link = $themeVars['link'] ?? 'inherit';
    $linkhover = $themeVars['linkhover'] ?? 'inherit';
    $stripeheight = $themeVars['stripeheight'] ?? '';
    if ($stripeheight === '') {
        $shField = $theme->content()->get('stripeheight');
        if ($shField) {
            $v = $shField->value();
            $stripeheight = $v !== null ? (string) $v : '';
        }
    }
?>
body.theme-preview-<?= esc($slug) ?> {
<?php foreach ($themeVars as $name => $hex): ?>
  --theme-<?= $name ?>: <?= esc($hex) ?>;
<?php endforeach ?>
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
<?php endforeach; ?>
</style>
