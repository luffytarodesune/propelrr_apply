<?php

$host = "localhost";
$db = "propelrr_dev";
$username = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo json_encode(array("status" => "error", "message" => "Database connection failed."));
    exit;
}

function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function isValidDate($date) {
    $d = DateTime::createFromFormat('Y-m-d', $date);
    return $d && $d->format('Y-m-d') === $date;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = sanitizeInput($_POST["fullName"]);
    $contact_no = sanitizeInput($_POST["mobileNumber"]);
    $bday = sanitizeInput($_POST["dateOfBirth"]);
    $age = sanitizeInput($_POST["age"]);
    $gender = intval($_POST["gender"]);
    $address = sanitizeInput($_POST["address"]);
    $civil_status = intval($_POST["civilStatus"]);

    try {
        $stmt = $pdo->prepare("INSERT INTO profile (name, contact_no, bday, age, gender, address, civil_status) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$name, $contact_no, $bday, $age, $gender, $address, $civil_status]);

        echo json_encode(array("status" => "success"));
        exit;
    } catch (PDOException $e) {
        echo json_encode(array("status" => "error", "message" => "Error inserting data into the database."));
        exit;
    }
} else {
    echo json_encode(array("status" => "error", "message" => "Invalid request method."));
    exit;
}