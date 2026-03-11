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
    ,
    [
        'pattern' => 'theme-debug',
        'method'  => 'GET',
        'action'  => function () {
            $kirby = \Kirby\Cms\App::instance();
            $site  = $kirby->site();
            $themesPage = $kirby->page('themes');

            $map = [
                'every-time' => 2,
                'hour'       => 3600,
                '4hours'     => 14400,
                'day'        => 86400,
            ];

            $intervalKey = $site->shuffleinterval()->value() ?? 'hour';
            $interval = $map[$intervalKey] ?? 3600;
            $bucket = (int) floor(time() / $interval);
            $hash = crc32((string)$bucket);

            $all = [];
            $candidates = [];
            if ($themesPage) {
                $all = $themesPage->children()->filterBy('intendedTemplate', 'in', ['theme', 'theme-locked'])->pluck('slug');
            }

            // parse shufflethemes field
            $raw = $site->shufflethemes()->value() ?? '';
            $selected = null;
            try {
                if (is_string($raw) && trim($raw) !== '') {
                    $sel = $site->shufflethemes()->yaml();
                    if (is_array($sel) && count($sel) > 0) {
                        $selected = $sel;
                    } else {
                        $parts = array_map('trim', array_filter(array_map('strval', explode(',', $raw)), fn($v) => $v !== ''));
                        if (count($parts) > 0) $selected = $parts;
                    }
                }
            } catch (Throwable $_) {
                $selected = null;
            }

            // Normalize single-element arrays that contain comma-separated values
            if (is_array($selected) && count($selected) === 1 && strpos((string)$selected[0], ',') !== false) {
                $selected = array_map('trim', explode(',', (string)$selected[0]));
            }
            if (is_array($selected) && count($selected) > 0) {
                $selected = array_values(array_filter(array_map('strval', array_map('trim', $selected)), fn($v) => $v !== ''));
                $candidates = array_values(array_intersect($all, $selected));
            } else {
                $candidates = $all;
            }

            $count = count($candidates);
            $index = $count > 0 ? ($hash % $count) : null;
            $chosen = $index !== null ? ($candidates[$index] ?? null) : null;

            $helper = function_exists('active_theme_page') ? active_theme_page() : null;
            $helperSlug = $helper ? $helper->slug() : null;

            return [
                'activetheme' => $site->activetheme()->value(),
                'shuffletheme' => $site->shuffletheme()->value(),
                'shuffleinterval' => $site->shuffleinterval()->value(),
                'shufflethemes_raw' => $raw,
                'shufflethemes_parsed' => $selected,
                'all_themes' => $all,
                'candidates' => $candidates,
                'interval_seconds' => $interval,
                'bucket' => $bucket,
                'hash' => (string)$hash,
                'count' => $count,
                'index' => $index,
                'computed_chosen' => $chosen,
                'helper_active_theme' => $helperSlug,
            ];
        }
    ]
];
