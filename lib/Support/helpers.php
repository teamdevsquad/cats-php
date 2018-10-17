<?php

if (!function_exists('format_date')) {
    function format_date(\Carbon\Carbon $date, $default = null)
    {
        if (!$date) return $default;

        return $date->format('Y-m-d\TH:i:sP');
    }
}

if (!function_exists('parse_uri')) {
    function parse_uri($uri, $values = [])
    {
        preg_match_all('/\{([^\}]*)\}/', $uri, $matches);

        $replace = $matches[0];
        $keys    = $matches[1];

        $parsedUri = $uri;

        foreach ($keys as $i => $key) {
            if (!isset($values[$key])) continue;

            $parsedUri = str_replace($replace[$i], $values[$key], $parsedUri);
        }

        return $parsedUri;
    }
}