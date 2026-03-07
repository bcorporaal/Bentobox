# Claude Rules for Bentobox Kirby CMS Project

## Project Overview

Bentobox is a **Kirby CMS 5.0** project - a customizable link portal for organizing and displaying categorized content with theme switching capabilities. The project uses PHP 8.1+, Tailwind CSS for styling, and custom Kirby plugins for theme management.

**Key Structure:**

-   `/site/` - All custom project code, templates, blueprints, and plugins
-   `/content/` - Website content, pages, and theme configurations
-   `/assets/` - Frontend styling (Tailwind CSS) and web assets
-   `/kirby/` - Kirby CMS framework (read-only)
-   `/media/` - Generated panel assets (read-only)

---

## Protected & Read-Only Files

⛔ **NEVER MODIFY** these directories and files:

-   **`/kirby/`** - The Kirby CMS framework core. It's installed via Composer and managed by the package manager. Never edit framework files directly.
-   **`/media/`** - Auto-generated Panel UI assets and cache files. Can be deleted but will be regenerated. Always treat as temporary/generated.
-   **`/index.php`** - Entry point for the application. Never edit.
-   **`/.htaccess`** - Apache server configuration for URL rewriting. Never edit.
-   **`/composer.json`** and **`/composer.lock`** - Dependency management only. Changes should be discussed first.

---

## Configuration & Critical Files

⚠️ **ASK BEFORE MODIFYING:**

-   **`/site/config/config.php`** - Main site configuration. Always ask the user before making changes to enable/disable debug mode, caching, authentication, or other settings.

---

## Preferred Work Areas

✅ **SAFE TO EDIT** - These are the areas where Claude typically works:

### Templates & Blueprints

-   **`/site/templates/`** - PHP page templates (e.g., `default.php`, `category.php`)

    -   Use Kirby template syntax (`$page`, `$site`, `$kirby` variables)
    -   Template files render page content and call snippets

-   **`/site/blueprints/`** - YAML content structure definitions

    -   `blueprints/pages/` - Page type definitions
    -   `blueprints/fields/` - Custom field definitions
    -   Use 2-space indentation
    -   Reference existing blueprints (e.g., `default.yml`) as templates

-   **`/site/snippets/`** - Reusable PHP template components
    -   Keep snippets focused and single-purpose
    -   Follow existing snippet naming conventions

### Plugins

-   **`/site/plugins/`** - Custom Kirby plugins that extend functionality
    -   Can modify existing plugins: `bentobox-theme/` or `theme-color-selector/`
    -   Do not modify or delete `staticache/`
    -   Each plugin has an `index.php` entry point
    -   Follow existing plugin architecture patterns
    -   ❌ **Don't delete existing plugins**
    -   ⚠️ **Ask before adding external Composer dependencies**

### Styling & Frontend Assets

-   **`/assets/css/`** - Tailwind CSS compiled output

    -   `main.css` - Development version
    -   `main.min.css` - Minified production version

-   **`/assets/src/input.css`** - Tailwind CSS configuration input

    -   Add custom styles and Tailwind directives here
    -   Use Tailwind utility classes for styling (don't hard-code CSS in templates)

-   **Build scripts** (in `/assets/package.json`):
    -   `npm run build` - One-time production CSS build
    -   `npm run watch` - Watch for CSS changes during development

### Content

-   **`/content/`** - Website pages and content
    -   Top-level directories use **numbered prefixes** (`1_`, `2_`, etc.) to control menu order
    -   Each category folder contains ordered content pages
    -   **`/content/themes/`** - Theme configuration pages (don't reorganize without understanding numbering)
    -   ❌ **Don't reorganize content structure without understanding the numbering/ordering system**

---

## Task-Specific Best Practices

### Theme Development

**Files:** `/site/plugins/bentobox-theme/`, `/content/themes/`

-   Modify theme switching logic in `/site/plugins/bentobox-theme/index.php`
-   Update theme color selectors and customizations
-   Add new themes by creating new configuration folders in `/content/themes/`
-   Follow existing theme plugin architecture
-   ❌ **Don't add external dependencies without asking**

### Template & Blueprint Editing

**Files:** `/site/templates/`, `/site/blueprints/`, `/site/snippets/`

-   Blueprints use **YAML format** with 2-space indentation
-   Templates use **PHP with Kirby template syntax**
-   Use the Kirby API for accessing page data:
    -   `$page` - Current page object
    -   `$site` - Site object with global data
    -   `$kirby` - Kirby app instance
-   Reference [Kirby CMS 5.0 documentation](https://getkirby.com/docs) for available methods
-   Extract repeated template code into `/site/snippets/` for reusability

### Frontend Styling with Tailwind

**Files:** `/assets/css/`, `/assets/src/input.css`

-   Use **Tailwind CSS utility classes** for all styling
-   Avoid inline styles or hard-coded CSS
-   Customize Tailwind in `/assets/src/input.css` using `@apply` for component styles
-   After updating CSS source, run `npm run build` or `npm run watch`
-   Build tools are in `/assets/package.json`
-   For custom fonts: Check existing font implementations in `/site/snippets/` (fontselection.php, customfont.php, etc.)

---

## Plugin Rules

**Creating & Modifying Plugins:**

-   ✅ Create new plugins in `/site/plugins/` when adding new functionality
-   ✅ Fix bugs in existing plugins
-   ✅ Modify existing plugin logic (`bentobox-theme`, `theme-color-selector`, `staticache`)
-   ❌ **Don't delete existing plugins**
-   ❌ **Don't add Composer dependencies without asking first**

**Plugin Structure:**

-   Each plugin needs an `index.php` entry point
-   Follow Kirby plugin registration patterns
-   Include a `composer.json` if the plugin has dependencies

---

## Content Structure Rules

**Content Organization:**

-   Pages are organized in `/content/` with **numbered prefixes** that control display order
-   Example: `1_top/`, `2_international-news/`, `3_news/` (numbers set menu order)
-   ❌ **Don't reorganize folders without understanding the ordering system**

**Theme Configurations:**

-   Themes are stored in `/content/themes/`
-   Each theme has its own configuration folder
-   Existing themes: default, 2077, city-lights, dracula, monokai-classic, outrun-contrast, tokyo-night-storm, etc.

---

## File Creation Guidelines

-   ✅ **Only create files when necessary** for the current task
-   ✨ **Prefer editing existing files** over creating new ones
-   ✅ Group related functionality in existing directories
-   ✅ Clean up temporary or unnecessary files before completing tasks
-   ❌ **Don't create clutter** or leave unused files behind

---

## PHP Code Standards

**Language & Version:**

-   Project supports PHP 8.1+ (up to 8.4)
-   Use modern PHP 8.1+ syntax and features

**Code Style:**

-   Follow **PSR-12 coding standards** for PHP
-   Use **Kirby's built-in helper functions** wherever available
-   Respect **Kirby's namespacing conventions** (classes in `\Kirby` namespace)
-   Write clean, readable code with clear variable names

**Kirby-Specific:**

-   Use Kirby's page/site API for data access
-   Leverage Kirby's built-in methods for queries and data manipulation
-   Follow existing plugin and template patterns in the codebase

---

## YAML Standards (Blueprints)

-   ✅ Use **2-space indentation** (not tabs)
-   ✅ Follow existing blueprint structure (reference `default.yml`)
-   ✅ Use correct Kirby field type definitions
-   ✅ Add helpful labels and descriptions for fields
-   ❌ **Don't add custom field types without clear purpose**
-   ❌ **Don't create overly complex blueprint structures**

**Reference existing blueprints** for correct structure and patterns.

---

## Summary of Do's & Don'ts

| Do ✅                                                                      | Don't ❌                                   |
| -------------------------------------------------------------------------- | ------------------------------------------ |
| Edit `/site/templates/`, `/site/blueprints/`, `/site/snippets/`            | Modify `/kirby/` or `/media/`              |
| Modify existing plugins (bentobox-theme, theme-color-selector, staticache) | Delete existing plugins                    |
| Ask before changing `/site/config/config.php`                              | Hard-code styles instead of using Tailwind |
| Create new files only when necessary                                       | Modify `/index.php` or `/.htaccess`        |
| Use Tailwind utility classes for styling                                   | Add dependencies without asking            |
| Follow PHP 8.1+ and PSR-12 standards                                       | Edit `/composer.json` without discussion   |
| Reference Kirby documentation                                              | Create unnecessary files or clutter        |
| Use 2-space indentation in YAML                                            | Reorganize `/content/` structure blindly   |

---

## Resources

-   [Kirby CMS 4.0 Documentation](https://getkirby.com/docs)
-   [Tailwind CSS Documentation](https://tailwindcss.com/docs)
-   Reference existing templates: `/site/templates/default.php`
-   Reference existing blueprints: `/site/blueprints/pages/default.yml`
-   Reference existing plugins: `/site/plugins/bentobox-theme/index.php`
