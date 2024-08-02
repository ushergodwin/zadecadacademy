<?php
// Get the requested URL path
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$base = $_SERVER['DOCUMENT_ROOT'];

// Serve static files directly if they exist
$file = __DIR__ . $path;
if (file_exists($file) && !is_dir($file)) {
    return false; // Serve the requested resource as-is.
}

// Remove leading slash from path
$path = ltrim($path, '/');
// handle calling admin login page
if ($path === 'admin/') {
    $path = 'admin/index';
}

// Check if the path corresponds to a PHP file without the extension
if (file_exists(__DIR__ . '/' . $path . '.php')) {
    require __DIR__ . '/' . $path . '.php';
} else {
    // Optionally handle 404 errors
    http_response_code(404);
    echo '404 Not Found';
}