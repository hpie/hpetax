<?php

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$r = $_SERVER['SCRIPT_NAME'];
$subdomain = explode('/', $r);
array_pop($subdomain);
define('BASE_URL', $protocol . $_SERVER['HTTP_HOST'] . implode('/', $subdomain) . '/');
define('BASE_URL_API', 'http://' . $_SERVER['HTTP_HOST'] . implode('/', $subdomain) . '/');
define('IMG_URL', BASE_URL . 'uploads/');
define('IMG_DIR', 'uploads/');
define('FILE_URL', "/assets/front/fileupload/server/php/files");
?>