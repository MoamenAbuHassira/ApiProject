<?php

header("Content-Type: application/json");


spl_autoload_register(function ($className) {
    include_once __DIR__ . '/controllers/' . $className . '.php';
});


$connection = require_once 'config/database.php';


if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["name"], $_POST["age"], $_POST["grade"])) {
    $data = $_POST;

    $studentController = new StudentController($connection);
    $studentController->addStudent($data);
}


if ($_SERVER["REQUEST_METHOD"] === "GET" && $_SERVER["REQUEST_URI"] === "/students") {
    $studentController = new StudentController($connection);
    $studentController->getAllStudents();
}


if ($_SERVER["REQUEST_METHOD"] === "DELETE" && preg_match("/\/students\/(\d+)/", $_SERVER["REQUEST_URI"], $matches)) {
    $studentId = $matches[1];

    $studentController = new StudentController($connection);
    $studentController->deleteStudent($studentId);
}


if ($_SERVER["REQUEST_METHOD"] === "PUT" && preg_match("/\/students\/(\d+)/", $_SERVER["REQUEST_URI"], $matches)) {
    $studentId = $matches[1];
    parse_str(file_get_contents("php://input"), $requestData);
    $data = $requestData;

    $studentController = new StudentController($connection);
    $studentController->updateStudent($studentId, $data);
}


$connection->close();
?>
