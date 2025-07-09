<?php
if (empty($_SERVER['PHP_AUTH_USER']) || empty($_SERVER['PHP_AUTH_PW'])) {
    header('WWW-Authenticate: Basic realm="Restricted Area"');
    header('HTTP/1.0 401 Unauthorized');
    echo json_encode(["status" => "error", "message" => "Unauthorized"]);
    exit;
}

// Ambil data username dan password dari header
$username = $_SERVER['PHP_AUTH_USER'];
$password = $_SERVER['PHP_AUTH_PW'];

if ($username != 'test') {
    header('WWW-Authenticate: Basic realm="Restricted Area"');
    header('HTTP/1.0 401 Unauthorized');
    echo json_encode(["status" => "error", "message" => "Unauthorized"]);
    exit;
} elseif ($password != '2fc24a43533f51de9a31ad05388d75aa') { //password = Saichul.95
    header('WWW-Authenticate: Basic realm="Restricted Area"');
    header('HTTP/1.0 401 Unauthorized');
    echo json_encode(["status" => "error", "message" => "Unauthorized"]);
    exit;
}
