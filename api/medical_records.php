<?php
require_once 'db.php';

$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true);

switch ($method) {
    case 'GET':
        if (isset($_GET['record_id'])) {
            $stmt = $pdo->prepare("SELECT * FROM medical_records WHERE record_id = :record_id");
            $stmt->execute(['record_id' => $_GET['record_id']]);
            echo json_encode($stmt->fetch(PDO::FETCH_ASSOC));
        } else {
            $stmt = $pdo->query("SELECT * FROM medical_records");
            echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        }
        break;

    case 'POST':
        $sql = "INSERT INTO medical_records (user_id, diagnosis, prescription) VALUES (:user_id, :diagnosis, :prescription)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'user_id' => $input['user_id'],
            'diagnosis' => $input['diagnosis'],
            'prescription' => $input['prescription']
        ]);
        echo json_encode(["success" => "Medical record created successfully"]);
        break;

    case 'PUT':
        $sql = "UPDATE medical_records SET diagnosis = :diagnosis, prescription = :prescription WHERE record_id = :record_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'diagnosis' => $input['diagnosis'],
            'prescription' => $input['prescription'],
            'record_id' => $input['record_id']
        ]);
        echo json_encode(["success" => "Medical record updated successfully"]);
        break;

    case 'DELETE':
        $stmt = $pdo->prepare("DELETE FROM medical_records WHERE record_id = :record_id");
        $stmt->execute(['record_id' => $_GET['record_id']]);
        echo json_encode(["success" => "Medical record deleted successfully"]);
        break;

    default:
        http_response_code(405);
        echo json_encode(["error" => "Method not allowed"]);
        break;
}
?>
