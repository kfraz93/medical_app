<?php
require_once '../includes/db.php';

// Set content type to JSON
header('Content-Type: application/json');

// Get the HTTP method
$method = $_SERVER['REQUEST_METHOD'];

// Handle HTTP methods
if ($method === 'GET') {
    if (isset($_GET['user_id'])) {
        getUserById($_GET['user_id']);
    } else {
        getAllUsers();
    }
} elseif ($method === 'POST') {
    if (!empty($_POST['user_id']) && !empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        createUser($_POST);
    } else {
        http_response_code(400);
        echo json_encode(["error" => "Missing required fields"]);
    }
} elseif ($method === 'PUT') {
    $input = json_decode(file_get_contents('php://input'), true);
    if (!empty($input['user_id']) && !empty($input['current_password']) && !empty($input['new_password'])) {
        updatePassword($input);
    } else {
        http_response_code(400);
        echo json_encode(["error" => "Missing required fields for update"]);
    }
} elseif ($method === 'DELETE') {
    if (!empty($_GET['user_id'])) { // Extract user_id from the query string
        deleteUser($_GET['user_id']);
    } else {
        http_response_code(400);
        echo json_encode(["error" => "User ID is required"]);
    }
}
else {
    http_response_code(405);
    echo json_encode(["error" => "Method not allowed"]);
}

// Functions to handle database operations

function getAllUsers() {
    global $pdo;
    try {
        $stmt = $pdo->query("SELECT * FROM users");
        echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(["error" => $e->getMessage()]);
    }
}

function getUserById($id) {
    global $pdo;
    try {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE user_id = :user_id");
        $stmt->execute(['user_id' => $id]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            echo json_encode($user);
        } else {
            http_response_code(404);
            echo json_encode(["error" => "User not found"]);
        }
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(["error" => $e->getMessage()]);
    }
}

function createUser($input) {
    global $pdo;
    try {
        $sql = "INSERT INTO users (user_id, username, password, email) VALUES (:user_id, :username, :password, :email)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'user_id' => htmlspecialchars($input['user_id']),
            'username' => htmlspecialchars($input['username']),
            'password' => password_hash($input['password'], PASSWORD_DEFAULT),
            'email' => htmlspecialchars($input['email']),
        ]);
        http_response_code(201);
        echo json_encode(["success" => "User created successfully"]);
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(["error" => $e->getMessage()]);
    }
}

function updatePassword($input) {
    global $pdo;

    // Debugging: Log received data
    error_log('Password update request received: ' . print_r($input, true));

    try {
        // Validate required fields
        if (!isset($input['user_id'], $input['current_password'], $input['new_password'])) {
            throw new Exception("Missing required fields: user_id, current_password, or new_password.");
        }

        $userId = htmlspecialchars($input['user_id']);
        $currentPassword = $input['current_password'];
        $newPassword = $input['new_password'];

        // Fetch user details
        $sql = "SELECT password FROM users WHERE user_id = :user_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['user_id' => $userId]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            throw new Exception("User not found.");
        }

        // Verify current password
        if (!password_verify($currentPassword, $user['password'])) {
            throw new Exception("Current password is incorrect.");
        }

        // Hash new password
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        // Update the password
        $sql = "UPDATE users SET password = :password WHERE user_id = :user_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'password' => $hashedPassword,
            'user_id' => $userId,
        ]);

        // Debugging: Log query success
        error_log('Password update query executed successfully');

        echo json_encode(["success" => "Password updated successfully"]);
    } catch (Exception $e) {
        // Debugging: Log the error
        error_log('Error during password update: ' . $e->getMessage());
        http_response_code(400);
        echo json_encode(["error" => $e->getMessage()]);
    }
}


function deleteUser($id) {
    global $pdo;
    try {
        $stmt = $pdo->prepare("DELETE FROM users WHERE user_id = :user_id");
        $stmt->execute(['user_id' => htmlspecialchars($id)]);
        echo json_encode(["success" => "User deleted successfully"]);
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(["error" => $e->getMessage()]);
    }
}
?>
