<?php
require '../vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

use Dotenv\Dotenv;

// Load environment variables
$dotenv = Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

$key = $_ENV['JWT_SECRET'];

// Skip authentication check for specific pages
$current_page = basename($_SERVER['PHP_SELF']);
if ($current_page === 'login.php' || $current_page === 'signup.php') {
    return; // Skip the authentication process
}

// Check for the token in cookies
if (!isset($_COOKIE['token'])) {
    error_log("Token not set in cookie. Redirecting to login.");
    header('location:../public/login.php');
    exit;
}

try {
    $token = $_COOKIE['token'];
    error_log("Token found: " . $token);
    $decoded = JWT::decode($token, new Key($key, 'HS256'));
    error_log("Token decoded successfully: " . print_r($decoded, true));
} catch (Exception $e) {
    error_log("Token decoding failed: " . $e->getMessage());
    header('location:../public/login.php');
    exit();
}
