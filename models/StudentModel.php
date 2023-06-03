<?php

class StudentModel {
    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function addStudent($name, $age, $grade) {
        $sql = "INSERT INTO students (name, age, grade) VALUES ('$name', '$age', '$grade')";
        return $this->connection->query($sql);
    }

    public function getAllStudents() {
        $sql = "SELECT * FROM students";
        $result = $this->connection->query($sql);

        $students = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $students[] = $row;
            }
        }

        return $students;
    }

    public function deleteStudent($studentId) {
        $sql = "DELETE FROM students WHERE id = $studentId";
        return $this->connection->query($sql);
    }

    public function updateStudent($studentId, $name, $age, $grade) {
        $updateFields = [];

        if ($name !== null) {
            $updateFields[] = "name = '$name'";
        }

        if ($age !== null) {
            $updateFields[] = "age = '$age'";
        }

        if ($grade !== null) {
            $updateFields[] = "grade = '$grade'";
        }

        if (!empty($updateFields)) {
            $updateQuery = implode(", ", $updateFields);
            $sql = "UPDATE students SET $updateQuery WHERE id = $studentId";
            return $this->connection->query($sql);
        } else {
            return false;
        }
    }
}
?>
