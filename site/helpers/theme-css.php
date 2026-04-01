<?php

declare(strict_types=1);

/**
 * Build the same CSS string as the former theme-styles body (without <style> tags).
 */
if (!function_exists('theme_css_for_page')) {
    function theme_css_for_page($themePage): ?string
    {
        if ($themePage === null || !function_exists('theme_blueprint')) {
            return null;
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
            return null;
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
        $customCSS = trim((string) ($themePage->content()->get('customcss')->value() ?? ''));

        ob_start();
        ?>
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

<?= $customCSS ?>

<?php
        return rtrim(ob_get_clean());
    }
}
