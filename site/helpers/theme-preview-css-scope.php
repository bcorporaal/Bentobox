<?php

declare(strict_types=1);

/**
 * Scope arbitrary theme custom CSS so it only applies while
 * body.theme-preview-{slug} is present (hover preview in theme menu).
 */
if (!function_exists('bentobox_find_matching_brace')) {
    /**
     * @return int Index of the first character after the closing `}` that matches $openPos.
     */
    function bentobox_find_matching_brace(string $s, int $openPos): int
    {
        $depth = 1;
        $i = $openPos + 1;
        $len = strlen($s);
        $inStr = false;
        $strChar = '';
        while ($i < $len && $depth > 0) {
            $c = $s[$i];
            if ($inStr) {
                if ($c === '\\' && $i + 1 < $len) {
                    $i += 2;
                    continue;
                }
                if ($c === $strChar) {
                    $inStr = false;
                }
                $i++;
                continue;
            }
            if ($c === '"' || $c === "'") {
                $inStr = true;
                $strChar = $c;
                $i++;
                continue;
            }
            if ($c === '{') {
                $depth++;
            } elseif ($c === '}') {
                $depth--;
            }
            $i++;
        }
        return $i;
    }
}

if (!function_exists('bentobox_scope_selectors_for_theme_preview')) {
    function bentobox_scope_selectors_for_theme_preview(string $selectors, string $class): string
    {
        $parts = array_map('trim', explode(',', $selectors));
        $out = [];
        foreach ($parts as $part) {
            if ($part === '') {
                continue;
            }
            if (preg_match('/\bbody\b/', $part) === 1) {
                $out[] = preg_replace(
                    '/(^|[>+~\s,])body(?=\.|#|:|\[|\s|,|\{|$)/',
                    '$1body.' . $class,
                    $part
                );
            } else {
                $out[] = 'body.' . $class . ' ' . $part;
            }
        }
        return implode(', ', $out);
    }
}

if (!function_exists('bentobox_scope_theme_preview_css')) {
    function bentobox_scope_theme_preview_css(string $css, string $slug): string
    {
        $safeSlug = preg_replace('/[^a-z0-9_-]/i', '', $slug);
        if ($safeSlug === '') {
            return '';
        }
        $class = 'theme-preview-' . $safeSlug;
        $css = trim($css);
        if ($css === '') {
            return '';
        }
        $css = preg_replace('/\/\*[\s\S]*?\*\//', '', $css);

        $result = '';
        $pos = 0;
        $len = strlen($css);
        while ($pos < $len) {
            while ($pos < $len && ctype_space($css[$pos])) {
                $pos++;
            }
            if ($pos >= $len) {
                break;
            }

            if ($css[$pos] === '@') {
                $open = strpos($css, '{', $pos);
                $semi = strpos($css, ';', $pos);
                if ($open === false) {
                    $result .= substr($css, $pos);
                    break;
                }
                if ($semi !== false && $semi < $open) {
                    $result .= substr($css, $pos, $semi - $pos + 1);
                    $pos = $semi + 1;
                    continue;
                }
                $header = substr($css, $pos, $open - $pos);
                $innerEnd = bentobox_find_matching_brace($css, $open);
                $inner = substr($css, $open + 1, $innerEnd - $open - 2);
                $pos = $innerEnd;
                $headerTrim = trim($header);
                if (
                    preg_match('/^@media\b/i', $headerTrim) === 1
                    || preg_match('/^@supports\b/i', $headerTrim) === 1
                ) {
                    $result .= $header . '{' . bentobox_scope_theme_preview_css($inner, $slug) . '}';
                } else {
                    $result .= $header . '{' . $inner . '}';
                }
                continue;
            }

            $open = strpos($css, '{', $pos);
            if ($open === false) {
                break;
            }
            $selectors = trim(substr($css, $pos, $open - $pos));
            $innerEnd = bentobox_find_matching_brace($css, $open);
            if ($innerEnd <= $open) {
                break;
            }
            $declarations = trim(substr($css, $open + 1, $innerEnd - $open - 2));
            $pos = $innerEnd;
            if ($selectors !== '') {
                $result .= bentobox_scope_selectors_for_theme_preview($selectors, $class)
                    . '{' . $declarations . '}';
            }
        }
        return trim($result);
    }
}
