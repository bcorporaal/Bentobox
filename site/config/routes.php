<?php

/**
 * Theme switcher route (POST only).
 * Persists selected theme in content/site.txt and redirects back.
 * Writes the file directly so switching works without panel login.
 */
return [
    [
        'pattern' => 'toggle-shuffle',
        'method'  => 'POST',
        'action'  => function () {
            $kirby = \Kirby\Cms\App::instance();
            $site  = $kirby->site();

            $redirectUrl = $site->url();
            $referrer    = $_SERVER['HTTP_REFERER'] ?? '';
            if ($referrer !== '' && str_starts_with($referrer, $site->url()) && strpos($referrer, '/toggle-shuffle') === false) {
                $redirectUrl = $referrer;
            }

            $value = isset($_POST['shuffletheme']) ? trim((string) $_POST['shuffletheme']) : '';
            // Accept 'true','1','yes','on' as true
            $isTrue = in_array(strtolower($value), ['1', 'true', 'yes', 'on'], true);

            $contentRoot = $kirby->root('content');
            $siteFile    = rtrim($contentRoot, DIRECTORY_SEPARATOR) . '/site.txt';
            if (!is_file($siteFile) || !is_readable($siteFile) || !is_writable($siteFile)) {
                return go($redirectUrl);
            }

            try {
                $content   = file_get_contents($siteFile);
                $newVal = $isTrue ? 'true' : 'false';
                $newContent = preg_replace('/^Shuffletheme:\s*.*$/mi', 'Shuffletheme: ' . $newVal, $content, 1);
                if ($newContent !== null && $newContent !== $content) {
                    file_put_contents($siteFile, $newContent);
                }
            } catch (Throwable $e) {
                // ignore
            }

            return go($redirectUrl);
        }
    ],
    [
        'pattern' => 'switch-theme',
        'method'  => 'POST',
        'action'  => function () {
            $kirby = \Kirby\Cms\App::instance();
            $site  = $kirby->site();

            $redirectUrl = $site->url();
            $referrer    = $_SERVER['HTTP_REFERER'] ?? '';
            if ($referrer !== '' && str_starts_with($referrer, $site->url()) && strpos($referrer, '/switch-theme') === false) {
                $redirectUrl = $referrer;
            }

            $slug = isset($_POST['theme']) ? trim((string) $_POST['theme']) : '';
            if ($slug === '') {
                return go($redirectUrl);
            }

            $themesPage = $site->find('themes');
            if (!$themesPage) {
                return go($redirectUrl);
            }

            $themes = $themesPage->children()->filterBy('intendedTemplate', 'in', ['theme', 'theme-locked']);
            $valid  = $themes->pluck('slug');
            if (!in_array($slug, $valid, true)) {
                return go($redirectUrl);
            }

            $contentRoot = $kirby->root('content');
            $siteFile    = rtrim($contentRoot, DIRECTORY_SEPARATOR) . '/site.txt';
            if (!is_file($siteFile) || !is_readable($siteFile) || !is_writable($siteFile)) {
                return go($redirectUrl);
            }

            try {
                $content   = file_get_contents($siteFile);
                $newContent = preg_replace('/^Activetheme:\s*.*$/m', 'Activetheme: ' . $slug, $content, 1);
                // Turn off shuffle when a theme is explicitly selected
                $newContent = preg_replace('/^Shuffletheme:\s*.*$/mi', 'Shuffletheme: false', $newContent, 1);
                if ($newContent !== null && $newContent !== $content) {
                    file_put_contents($siteFile, $newContent);
                }
            } catch (Throwable $e) {
                // Redirect so user is not stuck on switch-theme; theme unchanged
            }

            return go($redirectUrl);
        }
    ]
];
