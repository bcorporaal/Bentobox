# Theme Color Selector — Setup Guide

## File structure

```
site/
  plugins/
    theme-color-selector/
      index.php          ← registers the API route
      index.js           ← registers the custom panel field (Vue 3)

blueprints/
  pages/
    theme.yml            ← blueprint for a single theme (new)
    themes.yml           ← blueprint for the themes container page (new)
    category.yml         ← updated: uses the custom color selector field
  site.yml               ← updated: activetheme field + themes tab
```

---

## One-time panel setup

1. In the panel, create a new **unlisted** page with:
   - Title: `Themes`
   - Slug: `themes`
   - Template: `themes`

   This is the container that holds all your theme subpages.

2. Inside the Themes page (or via the Themes tab in Site), add your first theme.

3. Go to **Site → Settings → Active theme** and select it.

---

## How it works

- Each theme is a subpage of `/themes/` with color fields for background, accent, link, link-hover, title-1, title-2, and title-3.
- The `activetheme` field in site settings stores the slug of the active theme page.
- The plugin registers a `/api/theme-colors` route that reads the active theme and returns its three title colors.
- The custom `theme-color-selector` field in `category.yml` calls this route and displays the three colors as clickable swatches. It stores only the role name (`title-1`, `title-2`, or `title-3`), never the raw hex value.
- When the active theme is changed, all category color pickers automatically show the new theme's colors on next load — no content updates required.

---

## PHP template integration

### In your header snippet — output CSS variables from the active theme

```php
<?php
$themeslug = site()->activetheme()->value();
$theme     = page('themes')?->find($themeslug);
?>
<?php if ($theme): ?>
<style>
  :root {
    --color-background: <?= $theme->background()->escape('css') ?>;
    --color-accent:     <?= $theme->accent()->escape('css') ?>;
    --color-link:       <?= $theme->link()->escape('css') ?>;
    --color-link-hover: <?= $theme->linkhover()->escape('css') ?>;
    --color-title-1:    <?= $theme->title1()->escape('css') ?>;
    --color-title-2:    <?= $theme->title2()->escape('css') ?>;
    --color-title-3:    <?= $theme->title3()->escape('css') ?>;
  }
</style>
<?php endif ?>
```

### In your category template — apply the selected color role as a class

```php
<div class="category <?= $page->titlecolor()->escape('attr') ?>">
  <h2>...</h2>
</div>
```

### In your CSS — wire the class to the CSS variable

```css
.category.title-1 h2 { color: var(--color-title-1); }
.category.title-2 h2 { color: var(--color-title-2); }
.category.title-3 h2 { color: var(--color-title-3); }
```

---

## Caching note

Kirby's API routes in plugins are authenticated (panel session required), so they won't be accidentally cached or publicly exposed. If you add page caching to your site, make sure the header snippet (which outputs the CSS variables) is either excluded from cache or regenerated when the active theme changes. You can hook into `site.update:after` to clear the cache when site settings are saved.
