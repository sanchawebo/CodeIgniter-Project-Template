<?php

/**
 * The goal of this file is to allow developers a location
 * where they can overwrite core procedural functions and
 * replace them with their own. This file is loaded during
 * the bootstrap process and is called during the framework's
 * execution.
 *
 * This can be looked at as a `master helper` file that is
 * loaded early on, and may also contain additional functions
 * that you'd like to use throughout your entire application
 *
 * @see: https://codeigniter.com/user_guide/extending/common.html
 */

use CodeIgniter\HTTP\Files\UploadedFile;
use CodeIgniter\I18n\Time;
use CodeIgniter\Router\Exceptions\RouterException;

if (! function_exists('svgUrlEncode')) {
    function svgUrlEncode($svgPath)
    {
        $data = \file_get_contents($svgPath);
        $data = \preg_replace('/\v(?:[\v\h]+)/', ' ', $data);
        $data = \str_replace('"', "'", $data);
        $data = \rawurlencode($data);
        // re-decode a few characters understood by browsers to improve compression
        $data = \str_replace('%20', ' ', $data);
        $data = \str_replace('%3D', '=', $data);
        $data = \str_replace('%3A', ':', $data);

        return \str_replace('%2F', '/', $data);
    }
}

if (! function_exists('csrf_field_with_wrapper')) {
    function csrf_field_with_wrapper($id = 'csrfTokenWrapper')
    {
        return sprintf('<div id="%s">
            <input type="hidden" name="%s" value="%s"%s>
        </div>', $id, csrf_token(), csrf_hash(), _solidus());
    }
}

if (! function_exists('createUniqueFilename')) {
    function createUniqueFilename(UploadedFile $file)
    {
        $filename = pathinfo($file->getName(), PATHINFO_FILENAME);
        $filename = empty($filename) ? $file->getBasename() : $filename;

        $extension = $file->guessExtension();
        $extension = empty($extension) ? '' : '.' . $extension;

        $escaped = preg_replace('/[^A-Za-z0-9_\-]/', '_', $filename);
        $date    = Time::now(setting('App.appTimezone'))->toDateString();
        $uid     = uniqid();

        return $date . '_' . $uid . '_' . $escaped . $extension;
    }
}

if (! function_exists('log_exception')) {
    function log_exception(Throwable $th)
    {
        log_message('critical', '[CRITICAL] {exception}', ['exception' => $th]);
    }
}

if (! function_exists('array_multisum')) {
    function array_multisum(array $array): float
    {
        $sum = 0;

        foreach ($array as $value) {
            if (is_array($value)) {
                $sum += array_multisum($value); // Recursively sum nested arrays
            } elseif (is_numeric($value)) {
                $sum += $value; // Add numeric values to the sum
            }
        }

        return $sum;
    }
}

if (! function_exists('isExactUriSelected')) {
    /**
     * Returns bool or '-selected' if the $routeTo-param matches the current uri exactly.
     */
    function isExactUriSelected(string $routeTo, bool $returnString = true): bool|string
    {
        helper('url');
        // Current uri
        $uriString = uri_string();
        // Add slash to beginning
        $uriString = (substr($uriString, 0, 1) !== '/') ? ('/' . $uriString) : $uriString;

        // Route to test against
        $routeTo = route_to($routeTo);

        $result = ($uriString === $routeTo);

        if (! $returnString) {
            return $result;
        }

        return $result ? 'active' : '';
    }
}

if (! function_exists('isPartialUriSelected')) {
    /**
     * Returns bool or '-selected' if the $routeTo-param
     * matches the current uri partially from the beginning.
     */
    function isPartialUriSelected(string $routeTo, bool $returnString = true, ?string $ignoreRouteTo = null): bool|string
    {
        helper('url');
        // Current uri
        $uriString = uri_string();
        // Add slash to beginning
        $uriString = (substr($uriString, 0, 1) !== '/') ? ('/' . $uriString) : $uriString;

        // Route to test against
        $routeTo = route_to($routeTo);

        $result = (str_starts_with($uriString, $routeTo));

        if ($ignoreRouteTo !== null) {
            if (str_starts_with($uriString, route_to($ignoreRouteTo))) {
                return false;
            }
        }

        if (! $returnString) {
            return $result;
        }

        return $result ? 'active' : '';
    }
}

if (! function_exists('site_offline')) {
    /**
     * Determines whether the site is offline.
     */
    function site_offline(): bool
    {
        return empty(setting('Site.siteOnline'));
    }
}

/**
 * Given a route name or controller/method string and any params,
 * will attempt to build the relative URL to the
 * matching route.
 *
 * NOTE: This requires the controller/method to
 * have a route defined in the routes Config file.
 *
 * @param string     $method    Route name or Controller::method
 * @param int|string ...$params One or more parameters to be passed to the route.
 *                              The last parameter allows you to set the locale.
 *
 * @return string The route (URI path relative to baseURL) or throws exception when not found.
 *
 * @throws RouterException
 */
if (ENVIRONMENT === 'development') {
    function route_to(string $method, ...$params)
    {
        $route = service('routes')->reverseRoute($method, ...$params);
        if (! $route) {
            throw RouterException::forInvalidRoute($method . ((! empty([...$params])) ? '/' : '') . implode('/', [...$params]));
        }

        return $route;
    }
}
