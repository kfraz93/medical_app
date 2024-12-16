<?php
require_once 'db.php';

$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true);

switch ($method) {
    case 'GET':
        if (isset($_GET['appointment_id'])) {
            $stmt = $pdo->prepare("SELECT * FROM appointments WHERE appointment_id = :appointment_id");
            $stmt->execute(['appointment_id' => $_GET['appointment_id']]);
            echo json_encode($stmt->fetch(PDO::FETCH_ASSOC));
        } else {
            $stmt = $pdo->query("SELECT * FROM appointments");
            echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        }
        break;

    case 'POST':
        $sql = "INSERT INTO appointments (user_id, doctor_name, date_time) VALUES (:user_id, :doctor_name, :date_time)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'user_id' => $input['user_id'],
            'doctor_name' => $input['doctor_name'],
            'date_time' => $input['date_time']
        ]);
        echo json_encode(["success" => "Appointment created successfully"]);
        break;

    case 'PUT':
        $sql = "UPDATE appointments SET doctor_name = :doctor_name, date_time = :date_time WHERE appointment_id = :appointment_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'doctor_name' => $input['doctor_name'],
            'date_time' => $input['date_time'],
            'appointment_id' => $input['appointment_id']
        ]);
        echo json_encode(["success" => "Appointment updated successfully"]);
        break;

    case 'DELETE':
        $stmt = $pdo->prepare("DELETE FROM appointments WHERE appointment_id = :appointment_id");
        $stmt->execute(['appointment_id' => $_GET['appointment_id']]);
        echo json_encode(["success" => "Appointment deleted successfully"]);
        break;

    default:
        http_response_code(405);
        echo json_encode(["error" => "Method not allowed"]);
        break;
}
?>
