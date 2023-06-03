<?php

require_once 'StudentModel.php';

class StudentController {
    private $model;

    public function __construct($connection) {
        $this->model = new StudentModel($connection);
    }

    public function addStudent($data) {
        $name = $data['name'];
        $age = $data['age'];
        $grade = $data['grade'];

        $result = $this->model->addStudent($name, $age, $grade);

        if ($result) {
            echo json_encode(["message" => "Student added successfully"]);
        } else {
            echo json_encode(["error" => "Error adding student"]);
        }
    }

    public function getAllStudents() {
        $students = $this->model->getAllStudents();
        include '../views/students.php';
    }

    public function deleteStudent($studentId) {
        $result = $this->model->deleteStudent($studentId);

        if ($result) {
            echo json_encode(["message" => "Student deleted successfully"]);
        } else {
            echo json_encode(["error" => "Error deleting student"]);
        }
    }

    public function updateStudent($studentId, $data) {
        $name = $data['name'] ?? null;
        $age = $data['age'] ?? null;
        $grade = $data['grade'] ?? null;

        $result = $this->model->updateStudent($studentId, $name, $age, $grade);

        if ($result) {
            echo json_encode(["message" => "Student updated successfully"]);
        } else {
            echo json_encode(["error" => "Error updating student"]);
        }
    }
}
?>
