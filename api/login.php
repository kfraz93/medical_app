<?php
require_once '../vendor/autoload.php';

use Firebase\JWT\JWT;

include '../includes/db.php';
header("Content-Type: application/json");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

error_log("API Hit: login.php");

// Read and parse the incoming JSON data
$input = file_get_contents('php://input');
error_log("Raw Input: " . $input);

$data = json_decode($input, true);

// Check for JSON parsing errors
if (json_last_error() !== JSON_ERROR_NONE) {
    error_log("JSON Decode Error: " . json_last_error_msg());
    echo json_encode(["success" => false, "message" => "Invalid JSON format."]);
    exit;
}

error_log("Parsed Input: " . print_r($data, true));

// Validate if user_id and password are provided
if (!isset($data['user_id']) || !isset($data['password'])) {
    echo json_encode(["success" => false, "message" => "User ID and password are required."]);
    exit;
}

$userId = $data['user_id'];
$password = $data['password'];

// Prepare and execute the query to find the user
$query = "SELECT * FROM users WHERE user_id = :user_id";
$stmt = $pdo->prepare($query);
$stmt->execute(['user_id' => $userId]);

// Fetch the user data
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if the user exists and the password matches
if ($user) {
    if (password_verify($password, $user['password'])) {
        // Generate the JWT token for the user
        $key = 'asdasgf232gzvsdgv23tgvbsbn234t13rfw';
        $token = JWT::encode([
            'iat' => time(),
            'nbf' => time(),
            'exp' => time() + 3600,
            'data' => [
                'user_id' => $user['user_id'],
                'user_name' => $user['username'],
            ]
        ], $key, 'HS256');

        // Respond with the success and token in JSON format
        echo json_encode(["success" => true, "token" => $token]);
    } else {
        // If the password doesn't match, send an error response
        echo json_encode(["success" => false, "message" => "Incorrect password."]);
    }
} else {
    // If the user doesn't exist, send an error response
    echo json_encode(["success" => false, "message" => "User not found."]);
}
?>
