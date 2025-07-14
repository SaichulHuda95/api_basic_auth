<?php
require_once "config.php";
require_once "function.php";

if (empty($_SERVER['PHP_AUTH_USER']) || empty($_SERVER['PHP_AUTH_PW'])) {
    header('WWW-Authenticate: Basic realm="Restricted Area"');
    header('HTTP/1.0 401 Unauthorized');
    echo json_encode(["status" => "error", "message" => "Unauthorized"]);
    exit;
}

// Ambil data username dan password dari header
$username = $_SERVER['PHP_AUTH_USER'];
$password = $_SERVER['PHP_AUTH_PW'];

$validate = validate($username, $password);

if (!$validate) {
    header('WWW-Authenticate: Basic realm="Restricted Area"');
    header('HTTP/1.0 401 Unauthorized');
    echo json_encode(["status" => "error", "message" => "Unauthorized"]);
    exit;
}
