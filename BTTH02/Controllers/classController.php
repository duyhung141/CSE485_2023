<?php
include_once "../Models/ConnectDatabase.php";
class ClassController{
    public function getAll($id)
    {
        $pdo = new ConnectDatabase();
        $conn=$pdo->getConnection();
        $sql = "SELECT * from classes where course_id = $id";
        $stmt=$conn->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function getClassesByStudentId($studentId)
    {
        $pdo = new ConnectDatabase();
        $conn=$pdo->getConnection();
        $sql = "SELECT classes.* FROM classes INNER JOIN student_classes ON classes.id = student_classes.class_id WHERE student_classes.student_id = $studentId";
        $stmt=$conn->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
}
?>
