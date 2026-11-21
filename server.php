<?php

/**
 * Custom Server Router for Laravel's Built-in Web Server (php artisan serve).
 * Emulates Apache/Nginx mod_expires & Cache-Control for static assets in localhost.
 */

$publicPath = getcwd();

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? ''
);

$filePath = $publicPath . $uri;

// If file exists as a static asset, serve it with high-performance cache headers
if ($uri !== '/' && file_exists($filePath) && !is_dir($filePath)) {
    $extension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));

    $contentTypes = [
        'png'   => 'image/png',
        'jpg'   => 'image/jpeg',
        'jpeg'  => 'image/jpeg',
        'webp'  => 'image/webp',
        'gif'   => 'image/gif',
        'svg'   => 'image/svg+xml',
        'ico'   => 'image/x-icon',
        'css'   => 'text/css; charset=utf-8',
        'js'    => 'application/javascript; charset=utf-8',
        'woff2' => 'font/woff2',
        'woff'  => 'font/woff',
        'ttf'   => 'font/ttf',
        'eot'   => 'application/vnd.ms-fontobject',
        'json'  => 'application/json',
    ];

    if (isset($contentTypes[$extension])) {
        header('Content-Type: ' . $contentTypes[$extension]);
        // Hanya aset Vite (/build/, nama ber-hash) yang immutable 1 tahun; sisanya 1 minggu.
        $maxAge = str_starts_with($uri, '/build/') ? 31536000 : 604800;
        header('Cache-Control: public, max-age=' . $maxAge . ($maxAge === 31536000 ? ', immutable' : ''));
        header('Expires: ' . gmdate('D, d M Y H:i:s \G\M\T', time() + $maxAge));
        header('Access-Control-Allow-Origin: *');

        // Check 304 Not Modified
        $lastModified = filemtime($filePath);
        $etag = '"' . md5_file($filePath) . '"';
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s \G\M\T', $lastModified));
        header('ETag: ' . $etag);

        if (
            (isset($_SERVER['HTTP_IF_NONE_MATCH']) && trim($_SERVER['HTTP_IF_NONE_MATCH']) === $etag) ||
            (isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) && strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']) >= $lastModified)
        ) {
            http_response_code(304);
            exit;
        }

        readfile($filePath);
        return true;
    }

    return false;
}

$formattedDateTime = date('D M j H:i:s Y');
$requestMethod = $_SERVER['REQUEST_METHOD'] ?? 'GET';
$remoteAddress = ($_SERVER['REMOTE_ADDR'] ?? '127.0.0.1') . ':' . ($_SERVER['REMOTE_PORT'] ?? '0');

file_put_contents('php://stdout', "[$formattedDateTime] $remoteAddress [$requestMethod] URI: $uri\n");

require_once $publicPath . '/index.php';
