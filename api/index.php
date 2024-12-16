<?php

require_once 'users.php';           // Make sure users.php is included
// Get the HTTP method (GET, POST, PUT, DELETE)
$method = $_SERVER['REQUEST_METHOD'];

// Get the URI and split it into segments
$uri = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
$resource = $uri[1] ?? null;
$id = $uri[2] ?? null;

switch ($resource) {
    case 'users':
        handleUsersRequest($_SERVER['REQUEST_METHOD'], $id);  // Ensure this matches the method signature in users.php
        break;
    // case 'appointments':
    //     require_once 'appointments.php';
    //     handleAppointmentsRequest($_SERVER['REQUEST_METHOD'], $id); // Ensure appointments.php has this function
    //     break;
    // case 'medical_records':
    //     require_once 'medical_records.php';
    //     handleRecordsRequest($_SERVER['REQUEST_METHOD'], $id); // Ensure medical_records.php has this function
    //     break;
    default:
        http_response_code(404);
        echo json_encode(["error" => "Resource not found"]);
        break;
}
?>